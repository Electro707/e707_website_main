---
layout: page
title:  "Embedded Tips"
categories: programming
date: 2025-03-03
--- 

<style type="text/css">
    .codeGrid {
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
    }
    .codeGrid td{
        border: 1px dashed;
    }
    .codeGrid td{
        vertical-align: top;
        width: 120px;
    }
    .codeGrid figure {
        overflow-x: scroll;
        text-align: left;
        white-space: nowrap;
    }
    .codeGrid figure pre {
        font-size: 12px;
    }
</style>

> Updated on {{page.date}}

This page represents some general info, tips and tricks, and other knowledge I have gain over the years specifically in developing embedded system firmware.

By embedded systems I refer to microcontrollers, think Attinys and PICs.
I will not be covering any "high level" embedded systems like a Raspberry PI system, as I think of those as closer to a general computer when developing firmware/software.

This page will be very opinionated (it is my site after all). Be warned!

---
Table of Contents:
<!-- todo: look into having only # header, or have a hierarchy -->
* Do not remove this line (it will not be displayed)
{:toc}
---

# Don't pre-optimize, but be cautious

The general programming tip of "Don't pre-optimize" is also applicable to embedded systems.

If you aren't familiar, a good practice is when you are developing a piece of software (firmware or PC software), don't spent a lot of time optimizing code without it being necessary.
For example if you are software floating math, don't try to convert it to fixed point (more on that [here](#floatingPoint)) until the math is too slow for your application

BUT, you should try to use good design programming paradigms in your code, which is both good practice and can make your code run better.
You should also be somewhat weary of what can be an obvious bottleneck, so that if your firmware needs to be optimized you know what to work on first.

# Learn the instruction set

When you are dealing with a new CPU architecture, especially for a larger/professional project, I would have a quick glance at the instruction set.

While for the most part you will let the compiler handle things, you might have a project that directly can be solved by 1 or a couple of instructions.
For example if you are dealing with a ARM Cortex M0 processor, to reverse bits of a word, you *can* do a C implementation, or you can use the built-in `REV` instruction.

It will also give you a better idea of what the processor is capable of, and you will be better positioned if you *have* to optimize things in assembly due to constraints.

# Fixed Variable Size

We all know the C types `int`, `byte`, etc.

I try not to use the pre-defined C types in my firmware.
I instead use fixed width types like `uint8_t`, `int32_t`, etc for the most part.

My reasoning is as follows:
- You cannot trust C type length types across different architectures.
  For example, in an STM32 processor `int` is 32-bits, while in AVR it is 16-bits.
- In some uses of variables, you purposefully want to overflow, like for an 8-bit checksum
- You know the architecture you are working with, so you can easily know to use uint8_t for AVR systems or uint32_t for ARM systems when possible for non-critical variables (like in a for loop)
- It is more readable to know what variable size you are working with explicitly.
- On some architectures, `int` isn't the ideal CPU bit size to allow for a wider programming compatibility (most wouldn't expect an `int` for example to be only 8-bits)

## uint8_t vs int in AVR

To see the danger of the last point, the following two assemblies are of these two same function, but one with i set to `uint8_t`, the other to `int`. Both are compiled with `-Ofast`.
```c
void doLoop(char *text, uint8_t n){
    for(int i=0;i<n;i++){
        doSomething();
    }
}
```

<table class="codeGrid">
<tr>
    <td>uint8_t</td>
    <td>int</td>
</tr>

<tr>
    <td>
    {% highlight nasm %}
    {% include_relative EmbeddedCTips/varSize/avr_dump_for_uint8_t.asm %}
    {% endhighlight %}
    </td>
    <td>
    {% highlight nasm %}
    {% include_relative EmbeddedCTips/varSize/avr_dump_for_int.asm %}
    {% endhighlight %}
    </td>
</tr>
</table>

# Try to avoid floats if unnecessary, and no FPU {#floatingPoint}

*Generally*, low-end microcontroller doesn't come with a FPU (floating point unit) with it's CPU.
The FPU is a hardware block that assists in doing floating point (think decimal/fractional numbers) math.
Without this FPU, the toolchain will include software floating point, which is ***painfully slow***, at least compared to integer arithmetic.

If you don't need floating point, I would just avoid them in cases where it's easy to use decimal arithmetic.
With that said, if your application is not bottle necked with software floating point, by all means use those. Remember, don't pre-optimize until needed.

With that said, if you need to apply fractional math, and software floating point is too slow for your application, you can always use fixed point math. I will leave [the Wikipedia article](https://en.wikipedia.org/wiki/Fixed-point_arithmetic) on it if you want to do further reading.

# Looping N times {#loopNTimes}
If you have a function that loops around `n` times which is passed, an initial implementation would be to use the for loop:
```c
void doLoop(char *text, uint8_t n){
    for(uint8_t i=0;i<n;i++){
        doSomething();
    }
}
```

But I prefer another method: the while loop. We use `n` as the condition for the while loop while decrementing it per itteration. The while statement loops until the condition is false (which is 0), so it will exit when `n=0`. The following is a C implementation:
```c
void doLoop(char *text, uint8_t n){
    while(n--){
        doSomething();
    }
}
```

This method in my opinion is more readable, and *should* save on instructions as one doesn't need to create an `i` variable and keep track of that. Plus CPUs are good as checking if a value is zero, versus having to compare two values then check the result.

Below is the dis-assembly of both functions, compiled with `-Ofast` optimization for an AVR system, allowing the compiler to go to town. 

*note: Each code block is scroll-able, you may have to scroll to view more details*

<table class="codeGrid">
<tr>
    <td>For Loop</td>
    <td>While Loop</td>
    <td>Do While Loop</td>
</tr>

<tr>
    <td>
    {% highlight nasm %}
    {% include_relative EmbeddedCTips/loops/avr_dump_for.asm %}
    {% endhighlight %}
    </td>
    <td>
    {% highlight nasm %}
    {% include_relative EmbeddedCTips/loops/avr_dump_while.asm %}
    {% endhighlight %}
    </td>
    <td>
    {% highlight nasm %}
    {% include_relative EmbeddedCTips/loops/avr_dump_doWhile.asm %}
    {% endhighlight %}
    </td>
</tr>
</table>

You might notice another method I added: `do while`. As I was typing this up, I figured I try it out, and it turns out it is more efficient than the while loop. This makes sense thinking about it: the while loop requires an initial check to see if `i == 0`, versus the `do-while` which just checks at the end, where it branches off anyways.
It is implemented as follows:
```c
void doLoopDoWhile(char *text, uint8_t n){
    do{
        doSomething();
    }while(--n);
}
```

I will post an ARM comparison soon (need to document the generated assembly)

<!--I also ran the same test with an ARM Cortex M0 architecture, and got the following results:-->

<!-- It surprised me that the for loop has less instructions than the while loop. This is probably the arm-gcc compiler catching on to the for loop and optimizing for it. The `do-while` still wins. -->

If your function used the incrementing variable `i`, this method is not that applicable.
With that said, if all you are using `i` for is to step through an array (for example to print text), a better way of doing so can be found [in the section below](#arrayIncrement)


# Stepping through arrays inside function {#arrayIncrement}
Let's say you have an array, like a string, to increment in a function (this can also apply outside of a function, but not as common). Let's say the function is as follows:
```c
void doLoop(char *text, uint8_t n){
    for(int i=0;i<n;i++){
        print(text[i]);
    }
}
```

Instead of getting the value of the array at offset `i`, I prefer think of the array passed as a pointer, which is what it really is.

So I would get the value of the current pointer location through the `*` operator, then increment the pointer itself.
```c
void doLoop(char *text, uint8_t n){
    do{
        // *text returns the value at the pointer location,
        // and text++ increments the pointer
        print(*text++);
    }while(--n);
}
```

This is useful if the contents of `text` only needs to be used once, otherwise you loose the original pointer location, making this trick a bit mute.

# for(Ever) (main loop)

The following is a cool way of defining your main loop.
While it can be used for any `while(1)` loop, I reserve it only for the main loop.

```c
#define EVER    ;;

int main(void){
    // init stuff
    for(EVER){
        // main stuff
    }
}

```

# Modulus of 2^n

If you are applying a modulus (`%`, which is a division remainder operation) of a power of two as the divisor, for example to limit a buffer size, you can instead AND the dividend by 1 minus the divisor, for example:
```c
buff[idx++] = r;        // some operation
// the following two are equivalent
idx %= 64;
idx &= 0x3f;    // 63
```

This works because we are dealing with a binary system, a modulus of a power of two inherently limits the number of bits (a modulus of 64 would limit the result to 0 to 63, 0 to 0b111111), which is binary-equivalent of ANDing by the maximum 0b111111, as the rest of the bits will be zero.

If the divisor is part of the design you construct, for example a buffer size you define, I would limit it to power of twos for this reason.

Why do this?
Well a modulus, if the compiler did not optimize for it (which it should if the divisor is a constant), will be an expensive division operation. Many low-end processors don't come with a division instruction, so you are spending time doing software division. Even if the processor comes with hardware division, it may take a couple or more instruction cycles to complete.
Compare that to the AND operation, which is common for all processors, and tends to take only a single instruction cycle.

# Utilize #define for substitution constants

If you have a constant variable that is used to define a single data type, such as an integer for a IO pin, you are better off using the C processor to substitute in the desired value. An easy example is defining the IO pin number for an Arduino program.

Defining the variable as a const reserves it in flash with all other constants, requires the instruction to fetch the constant value from memory to use it, and depending on the architecture and compiler it will be copied to RAM on startup.

Compare this to a define, where the value it will be merely substitute in-place before the compilation step. This saves a memory allocation when the value can easily by substituted with a single load-immediate instruction, which tends to be cheaper than reading from memory.

Below are an example of both using the pre-processor and using a constant variable.
```c
#define LED_IO  5

const uint8_t led_io = 5;

void setup(){
    // both functions to exactly the same thing, but the define saves on a variable.
    pinMode(LED_IO, OUTPUT);
    pinMode(led_io, OUTPUT);
}
```

