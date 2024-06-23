---
layout: post
title:  "Arduino and Composite Video, part 1: Composite and DAC"
date:   2024-06-18
categories: electronics
--- 

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

Preface: This page loads MaxJax with the following code.
```html
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
```
<br><br>

Welcome back to Part 2 of my Arduino Composite video adventures!

Last time, in [Part 1](https://blogs.electro707.com/electronics/2024/06/18/Arduino-Composite-Video.html), I went over a little bit over composite video and the analog circuitry (just a DAC) and pin mapping.
In this post, I will be going over my firmware adventures.

Something to keep in mind when reading this is I had to a lot of debugging, troubleshooting, and research to even get to the first code. This blog simply describes everything at a high level. <!-- , and only from code snippets I made a local copy of. -->

I also am going off memory and code backups I made, which where spurious. This is why you might notice "jumps" in this blog post.

# Build Setup

In order to build the code and upload it, I used a custom makefile that builds the C program (a single C file) and upload it using AVRDUDE.
The reason I didn't use the Arduino IDE is primarily because I wanted full control over the build process, and because I prefer it over the IDE route for simple programs like this. Plus I already had it from another project I could re-use.

By default with the Arduino IDE, with `void setup` and `void loop`, the Arduino sets up some periferals in ways that may be undesirable in this case, such as the usage of Timer0 for the `millis()` and `delay()` functions. While I did go with the bare-C and makefile route, I also could have used the Arduino IDE by simply directly calling `void main`, which will skip all of Arduino's initializations.

Below is the makefile I used:
```makefile
PORT=/dev/ttyUSB0
MCU=atmega328p
TARGET=main

LDFLAGS=-Wl,-gc-sections -Wl,-relax -Wl,-Map=$(TARGET).map,--cref
CFLAGS=-g -Wall -mmcu=$(MCU) -O3

default: compile size

compile:
	avr-gcc $(CFLAGS) $(TARGET).c -o $(TARGET).elf
	avr-objcopy -j .text -j .data -O ihex $(TARGET).elf $(TARGET).hex

quick: compile size program

size:
	avr-size -C --mcu=$(MCU) $(TARGET).elf

program:
prog:
	avrdude -v -P usb -p $(MCU) -cusbasp -U flash:w:$(TARGET).hex

clean:
	rm -rf *.hex *.bin *.o *.elf doxygen_out/

asm:
	avr-objdump main.elf -d > main.d

```

# Composite Signal: More Details

Typing this post, I realized I left out many details in the previous post about composite signaling that will help to understand what I am doing.

The composite signal is made up of "horizonal lines" (H), that each take up 63.5uS.
An entire image scan with interlancing takes 525 lines to draw, drawing 262.5 lines per scan (we will address the 0.5 line).

When I learned about composite signaling, I looked at the entire signal as made up of horizonal lines. This thinking may not be appropriate for other implementations, as some "lines" aren't really lines and including things like half a like and half an equalization and sync pulse.
For me though, it worked, especially when later on architecturing the firmware as will see.

For a normal horizonal line, we start with a horizonal font-porch, sync, and back-porch signal.
Note that technically we ough to treat the front-porch as part of the previous line, but treat it part of the current line also works when building up this system.

The porchs and sync signals are as follows:



After this signal is the horizonal data, which is between black (7.5IRE) and white (100IRE) for the rest of the horizonal line.

<!-- Part of those horizonal lines sent are non-image data. They include the vertical sync pulse, equalization pulses, and blank signals. -->

At the start of an image scan, a v.sync and equalization pulses are sent. Six equalization pulses are sent, followed by 6 v.sync pulses, then 6 equalization pulses.

A v.sync and equalization pulse is make up with the following wavefroms:


So a v.sync and equalization pulse is half the duration of a horizonal line. This allows us to think of two of those signals as a single horizona line, timing wise.

After this, 10 blank horizonal lines are sent. They are the same as regular drawn horizonal line, but instead of a lightness the output is held at Blanking level.



When the screen reaches the 262th line, a normal horizonal line is sent, but only half of the line is drawn. In the middle of the horizonal line, an equalization pulse is sent for the rest of that horizonal line. This is followed by another 5 equalization pulses, 6 sync pulses, and 5 equalization pulses. Then 10 blanking lines, and then the image data again until the 525's line, in which we repeat the image scan again.


# Humble Firmware Start

When I started with this project, my first goal was to just get vertical black and white strips displayed. This is because each horizonal scan can use exactly the same code, so I could focus on troubleshooting and timing.

There was a lot of code and debugging that came before what I am about to show, mostly in troubleshooting and understanding composite video myself. For example, initially I did an entire 525 lines per scan before I realized I needed to interlace the video. This is just the first saved copy.

I initially opted to have an infinite loop draw the entire display over and over. The following I did:
- Send out a vertical sync, equalization pulses, and 10 blank horizonal lines
- Send 242 horizonal lines
- Send a half a horizonal line with a sync pulse (at the 263th horizonal scan)
- Send a vertical sync pulse again
- Send 242 horizonal lines again
- Rinse and repeat

If every function, for example the horizonal drawing function, take the exactly time (or close) that it is required, it should all align up. This isn't ideal, and we'll fix that later.

The main of my application looked as follows:
```c
int main(void){
    uint16_t horizN;
    // setup PortD to be the main GPIO out
    DDRD = 0xFF;

    for(EVER){
        horizN = 242;

        verticalSync();
        while(horizN--){
            horizonalLine();
        }
        horizVideoHalf();

        horizN = 240;
        verticalSync2();
        while(horizN--){
            horizonalLine();
        }
    }

    return 0;
}
```
First was initiazing PORTD to all be outputs, then in an infinite loop draw the screen as I described above.

Each of the functions sends out the signal and controls for it's own delays.


## Delay Functions
I used the `#include <util/delay.h>` function `_delay_loop_1(n)`. The function use bare metal assembly to delay the application by 3*n clock cycles, plus 2 clock cycles for their setup. I also used `_delay_loop_2(n)` when needed, the only difference is using allowing a 16-bit delay value, and a higher clock cycle per `n`, which looking back now I did not take into account at all.

To calculate a delay number, I took the time I needed to delay for, divide that by the MCU clock period `(1/16E6)`, then divide that by 3 clock cycles. I discounted the 2 clock cycle setup as tollerance, or when I needed to round the delay number.

For the small delays required, it is better to use those delay functions than something more complicated with timers.

## Horizonal Sync and Porch

So I made a `horizFontPorch` function that sends out that exact desired signal:
```c
void horizFontPorch(void){
    // delay of 1.5uS
    PORT_SET = VOLTAGE_BLANKING;
    _delay_loop_1(8);       // delay for 1.5uS, 8*3 instructions
    PORT_SET = VOLTAGE_SYNC;
    _delay_loop_1(25);       // delay for 4.7uS, 25*3 instructions
    PORT_SET = VOLTAGE_BLANKING;
    _delay_loop_1(25);       // delay for 4.7uS, 25*3 instructions
}
```

## Horizonal Data

Each horizonal line must take 63.5uS per line. Including the horizonal sync and back porch, that means we need to draw our line in 52.6uS.

With 10 black and white stripes, I calculated the delays between switching the black and white brightness, and came up with the function as follows. The function also sends the horizonal porch and sync for convinience.

```c
void horizonalLine(void){
    uint8_t n = 10;
    horizFontPorch();
    while(n--){
        PORT_SET = COLOR_BLACK;
        _delay_loop_1(14);
        PORT_SET = COLOR_WHITE;
        _delay_loop_1(14);
    }
}
```

## Vertical Sync and Porch

For the vertical sync, I needed to send 6 equalization pulses, 6 sync pulses, 6 equalization pulses, then 10 empty lines. The function below handled it

```c
void verticalSync(void){
    uint8_t n;
    n = 6;
    while(n--){
        horizFontPorch();
        _delay_loop_1(140);
    }

    n = 3*2;
    while(n--){
        PORT_SET = VOLTAGE_SYNC;
        _delay_loop_1(90);       // delay for 1.5uS, 8*3 instructions
        PORT_SET = VOLTAGE_BLANKING;
        _delay_loop_1(50);       // delay for 4.7uS, 25*3 instructions
    }

    n = 6;
    while(n--){
        horizFontPorch();
        _delay_loop_1(140);
    }

    n = 10;
    while(n--){
        horizFontPorch();
        PORT_SET = VOLTAGE_BLANKING;
        _delay_loop_1(28);
    }
}
```

## Half Horizonal High Equalization

On the 262th scan, we need to draw half a horizonal line, then send out an equalization pulse. So I made a special function that did exactly that.

```c
void horizVideoHalf(void){
    uint8_t n = 5;
    horizFontPorch();
    while(n--){
        PORT_SET = COLOR_BLACK;
        _delay_loop_1(14);
        PORT_SET = COLOR_WHITE;
        _delay_loop_1(14);
    }

    horizFontPorch();
    PORT_SET = VOLTAGE_BLANKING;
    _delay_loop_2(140);
}
```

# Issue: Timing
As you might realize, there is a massive issue with how I initially architectured the firmware.
If any of the drawing functions don't draw in the correct timing, for example if the horizonal image line took too long, the entire image would be out of spec.


# Solution: Timers

To fix the timing issue, I opted to use a timer interrupt. As we know each line is drawn every 63.5uS, I could have the timer trigger on that time and draw the current line. I kept the current line (not physical line, but an incremeter between 1 and 525) stored in memory, then used a state machine to determine what sort of output to draw:

```c
ISR(TIMER0_COMPA_vect){
    static uint16_t horizN = 1;
    static uint16_t lineN = 0;          // actual number number

    switch(horizN){
        case 1 ... 3:
        case 7 ... 9:
        case 264:
        case 265:
        case 270:
        case 271:
            equalizationLine();
            break;
        case 266:
            equalization();
            _delay_loop_1(157);
            VSync();
            break;
        case 269:
            VSync();
            _delay_loop_1(25);
            equalization();
            lineN = 0;
            break;
        case 10 ... 20:
        case 272 ... 282:
            horizonalLineBlank();
            break;
        case 4:
        case 5:
        case 6:
        case 267:
        case 268:
            VSyncLine();
            break;
        case 263:
            horizVideoHalf();
            break;
        case 525:
            horizN = 0;
            lineN = 0;
            currentPattern = colorPattern[0];
            currPattIdx = 0;
            horizonalLine();
            break;
        default:
            lineN += 2;
            horizonalLine();
            break;
    }

    if((lineN & 0x0F) == 0){
        currentPattern = colorPattern[currPattIdx++];
        currPattIdx &= 0x01;
    }

    // if(!horizN){
        // _delay_ms(500);
    // }
    horizN++;
}
```

We still have the issue of a line taking too long. So what I did was remove the last delay in many of the functions above, allowing the function to always be shorter than the horizonal line duration. This way, each line trigger is consistant.
This also meant I had to reduce how much the `horizonalLine` is actually drawing on screen for this reason.

I also took this opporitnuty to draw a checker pattern than just vertical stripes.

After some more troubleshooting, I came to the following display


# Image

Next, I decided it would be cool to draw an actual image, and what better image to draw than the ***iconic*** Among Us. For some reason I though the resolution was required was 720x480 (rather than the convenstional 640x480 for a 4:3 aspect ratio), so that is why I mention that resolution in this section.

Displaying an image brough up a unique issue: Space. A 480x720 image, using one byte per pixel, 345600 bytes of data. The Atmega only has 32k of flash and 8k of ram, so that is not an option. So I had to downside everything by 4x, resulting in a 180x120 image (I actually used 122 pixels for the vertical resolution so part of the vertical backporch has some data, although unessesary). The image now can be stored in 21960 bytes, which is enough for Flash but not RAM memory.

Why am I mentioning RAM for constant storage?
On an AVR architecture, when you declare `const uint8 VAR = x;`, the compiler actually places the variable in RAM on startup. This is due to AVR's harvard architecture, where accessing Flash memory is different from accessing RAM, and for some C operations the compiler is designed to work around RAM stored variable, so as part of the startup routing all global variables are copied from Flash to RAM.

For what we want though, this will not work as we want all variables to be stored in Flash. The AVR solution for that is using the PROGMEM attribute, part of `<avr/pgmspace.h>` library. Then we use the `pgm_read_byte` function to read a variable stored in Flash.

# Image Generation

To general the image data, I made a Python program that will open an image in greyscale mode (so no color), generate a byte array where the image data is stored back-to-back (so every 180 bytes is a new line), then dump it into a header file. Because I wanted it to be easy on the processor, I had the Python application calculate the DAC level to set to based off the image's 0-255 lightness value. See my previous blog post for that equation.

Below is the Python application.
```python
#!/bin/python3
from PIL import Image

file_path = 'image1.png'
out_name = '../image.h'

i = Image.open(file_path).convert(mode='L')

to_print = f"#include <stdint.h>\n#include <avr/pgmspace.h>\nconst uint8_t PROGMEM image[{122*180}] = {{"
for y in range(122):
    for x in range(180):
        # print(i.getpixel((x, y)))
        v = i.getpixel((x, y))

        v = int(((255-87) * (v / 255)) + 87)
        v = max(v, 87)
        if v < 87:
            raise UserWarning()
        to_print += f"{v},"

to_print = to_print[:-1]
to_print += "};"

with open('../image.h', 'w') as f:
    f.write(to_print)

```

# Result, and Disapointment

I initially thought pmg_read would only take up 1 clock cycle, so I added some NOPs to control the pixel timing. Below is the new `horizonalLine` function, the NOP and delay commented out (I also added some global variables to keep track of where we are in the image).

```c
void horizonalLine(void){
    uint8_t n = 65;
    uint16_t temp = currImgPtr;     // make a copy of the global variable so that C can optimize loop instructions

    horizFontPorch();
    while(n--){
        PORT_SET = pgm_read_byte_near(temp);
        // imageData = pgm_read_byte_near(image + imageXYcounter);
        // _delay_loop_1(1);      // 14
        // _NOP();
        // _NOP();
        // _NOP();
        temp++;
    }
    currImgPtr = temp;
}
```

Initially programming with this change, I noticed the display would not work. This was because the `horizonalLine` was taking too long, so I experimentally reduced the number of horizonal pixels and removed all delays to draw before returning from the function. I got 65 pixels that it can draw, even with placing the image pointer to a temporary location.

Why am I making a copy of the global variable `currImgPtr`, then setting it at the end? While this seems like a waste, it actually is more efficient. I noticed, in the dis-assembly of the application, that if the global variable is directly used, the compiler will try to access the variable in RAM per every operation, which was costly. Making it into a temporary variable caused the compiler to place `temp` as a register, as it no longer has update the variable in RAM until we do so at the end.

# More Assembly

I wasn't satisfied with 65 pixels alone, and as I've already done a dis-assembly of the C application, I figured I might as well try and making part of the `horizonalLine` function in assembly. I started by copying the C disassembly into an `asm volatile` block, then analyzing and understanding what it's doing to simplify it.

This is the result I came up with (the one I had a backup copy of the code for):

```c
// draws 2 lines, as we want a checkmark
void horizonalLine(void){
    horizFontPorch();
    asm volatile(
        "ldi r25, 100"       "\n\t"
        "lds r30, %0"       "\n\t"
        "lds r31, %0+1"     "\n\t"
        "lpm r24, Z+"       "\n\t"
        "out 0x0b, r24"     "\n\t"
        "dec r25"           "\n\t"
        "brne .-8"           "\n\t"
        : "=m" (currImgPtr)
    );
}
```

Here is what it does:
- `ldi r25, 100` <- Loads 100 into R25, used to count the number of pixels to draw
- `lds r30, %0` <-  Loads the low 8-bit address of currImgPtr (%0) into R30 (Z register)
- `lds r31, %0+1` <-  Loads the high 8-bit address of currImgPtr (%0) into R31 (Z register)
- `lpm r24, Z+` <- Reads from flash and loads the content into R24, while incrementing the Z pointer
- `out 0x0b, r24` <- Sets PORTD to R24
- `dec r25` <- Decrement R25, our pixel counter
- `brne .-8` <- If the previous instruction did not raise a zero flag, which it will when R25 is equal to zero, then go back 3 instructions to the `lpm` instruction.

The Z register is just R30 and R31 combined to make a 16-bit word, and is used with the `lpm` instruction

You might noticed I am also not storing currImgPtr back. This is because I realized that variable can be set before the `horizonalLine` function is called in the interrupt switch-case block, as it's the same for a particular image line, which I am already keeping track of. The equation for the pointer to the image location in Flash is:
```c
imageXYcounter = (lineN >> 2)*180;
currImgPtr = (uint16_t)image+imageXYcounter;
```
Where `image` is the image array stored in flash.

# More improvment

I knew that `horizFontPorch` had delays for the sync and porch periods, so I though "what if I used those delay to execute some loading instructions

```c
// draws 2 lines, as we want a checkmark
void horizonalLine(void){
    asm volatile(
        // horizonal porch, send a blank signal
        "ldi r25, %[cont1]"     "\n\t"
        "out 0x0b, r25"         "\n\t"
        // delay for 1.5uS (24 clock cycles) , let's do some math!
        // take the current line number, then divide by 4 (right shift 2)
        "lds r18, %0"       "\n\t"      // 2 clk
        "lds r19, %0+1"     "\n\t"      // 2 clk (4)
        "lsr r19"           "\n\t"      // 1 clk (5)
        "ror r18"           "\n\t"      // 1 clk (6)
        "lsr r19"           "\n\t"      // 1 clk (7)
        "ror r18"           "\n\t"      // 1 clk (8)
        // now that we shifted out line number by 2, our abs max value is 131 for a 525 lines (not possible, but the max vertical scan lines)
        // so R19 should be zero, which frees us to use it
        "ldi r20, 180"      "\n\t"      // 1 clk (9)
        "mul r18, r20"      "\n\t"      // 2 clk (11)
        // move the contents of r0:r1 back to r18-r19
        "movw r18, r0"      "\n\t"      // 1 clk (12)
        // now we add out image pointer to the image XY counter
        "ldi r30, %1"       "\n\t"      // 1 clk (13)
        "ldi r31, 0"     "\n\t"         // 1 clk (14)
        "add r30, r18"      "\n\t"      // 1 clk (18)
        "adc r31, r19"      "\n\t"      // 1 clk (16)
        // now currImgPtr lives in r30:r31 (Z register)
        // we have 8 instructions left, with two to load value, so 7 NOP
        "NOP\n\t" "NOP\n\t" "NOP\n\t" "NOP\n\t"
        // "NOP\n\t" "NOP\n\t" "NOP\n\t"
        // now we
        "ldi r25, %[cont2]"     "\n\t"
        "out 0x0b, r25"         "\n\t"
        // now we wait for 75 instructions, so we make a loop
        // 1 instruction for loading value, and 1 to exit, 1 after to load next port value, so 72 wait states. 3 cycles each, so 24 instructions
        "ldi r25, 24"     "\n\t"
        "dec r25"         "\n\t"
        "brne .-4"        "\n\t"
        // second blanking pulse
        "ldi r25, %[cont1]"     "\n\t"
        "out 0x0b, r25"         "\n\t"
        // same delay as above
        "ldi r25, 24"     "\n\t"
        "dec r25"         "\n\t"
        "brne .-4"        "\n\t"
        // sending the image itself
        "ldi r25, 100"       "\n\t"
        // "lds r30, %0"       "\n\t"
        // "lds r31, %0+1"     "\n\t"
        "lpm r24, Z+"       "\n\t"
        "out 0x0b, r24"     "\n\t"
        "dec r25"           "\n\t"
        "brne .-8"           "\n\t"
        : // no output
        : "m" (lineN), "m" (image), [cont1] "i" (VOLTAGE_BLANKING), [cont2] "i" (VOLTAGE_SYNC)
    );
}
```

# Current Issues and Project's Future

One issue still with the firmware is the `horizonalLine` function must end before the next interrupt is started. This means that part of right side of the image would not be drawn, and will look streched. What I can do is to move the horizonal front porch over to the code that draws the horizonal line, giving me a 1.xxx uS leeway.


As I said, I am new to composite video, so I may be wrong in the way I go about some things. I am hoping though that you were able to take something away from my post.

# Sources, References, and Good Resources
1. https://www.nongnu.org/avr-libc/user-manual/group__avr__pgmspace.html
