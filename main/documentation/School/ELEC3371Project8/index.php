<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="Expires" content="-1" />
        <title>Space Invaders Game</title>
        <link rel="stylesheet" type="text/css" href="../../style.css">
        <link rel="icon" type="image/x-icon" href="https://electro707.com/Resources/webicon.ico" />

        <script src="https://cdn.jsdelivr.net/npm/@webcomponents/webcomponentsjs@2/webcomponents-loader.min.js"></script>
        <script type="module" src="https://cdn.jsdelivr.net/gh/zerodevx/zero-md@1/src/zero-md.min.js"></script>

        <style>
            #NoBorder > tbody > tr > td{
                border: none;
            }
        </style>
    </head>

    <body>
        <h1 class="intro">Embedded Systems Final Project: Space Invaders Game</h1>
        <h2 class="intro">By Jamal Bouajjaj</h2>

        <h3>Introduction:</h3>
        <p>
            This project, which was my final project for my Emmbedded Systems Class, required that I recreate the infamouse Space Invaders game. The dev board we were given is the <a href="https://www.mikroe.com/easymx-pro-stm32">MikroE for ARM V7</a>. Altough the company does make an IDE which was used/tough throuout the class, I though it was utter shit (both the IDE and the compiler) and instead opted to use ST's CubeIDE. As a bonus, that IDE is able to run on Linux. But that meant that I would have to write my own drivers for the LCD and EEPROM, which I took as a challenge.<br>
            The game was to be shown on an ILI9341 driven LCD module. Sound was to be generated with a passive buzzer with PWM. The top score was stored on a 24AA01 1k EEPROM.  <br>
            If you are intrested in this project, I recommend that you check out the report below, as I won't be typing the same context twice.
        </p>

        <h3>Python Helper</h3>
        <p>
            As mentioned in the report, there is a Python program that I created to make the bitmaps in-game. One of them takes an image file and convert it to an array in which the microcontroller is able to directly send to the LCD to display a bitmap. Another program generates text based on a font and created an array so they can be displayed in game.
        </p>

        <h3>Images:</h3>
        <h4 style='color:red'>Coming Soon!</h4>
        
        <h3>Report and Source Code</h3>
        <p>The report on this project can be found below, as well as the report's source code (made in LaTeX) and the project's source code:</p>
        <a href="tex_source/Report.pdf"><img src="https://www.electro707.com/Resources/Icons/pdf.png"\
                 alt="Report PDF File" width="50em"></a> <p style='display:inline'>Report</p><br>
        <a href="tex_source"><img src="https://www.electro707.com/Resources/Icons/source_code.png"\
                 alt="LaTeX Source Code" width="50em"></a> <p style='display:inline'>Report Source Code</p><br>
        <a href="source_code"><img src="https://www.electro707.com/Resources/Icons/source_code.png"\
                 alt="Project Source Code" width="50em"></a> <p style='display:inline'>LaTeX Source Code</p><br>

    </body>
</html>
