<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" type="text/css" href="style.css?v=1.0">
        <title>Blinky Lights Kit</title>
    </head>
    
    <body>
        <?php
            echo file_get_contents("../Resources/html_top.txt");
        ?>

        <div id="intro">
            <h1>Blinky Lights Kit</h1>
            <h3>v1.1</h3>
            <h2>Designed by Electro707, Soldered by you!</h2>
        </div>

        <h3>Tindie Link:</h3>
        <p>The soldering kit is available <a href="https://www.tindie.com/products/20887/">HERE!</a><p>

        <h3>PCB Gerber Files</h3>
        <p>The Gerber file can be found on GitHub as a Release:</p>
        <a alt="GitHub Release Page" href="https://github.com/Electro707/blinky_lights_kit/releases/"><img src='../Resources/Icons/ZipFile.png' class='icon'></a>
        <p><span style='font-weight: bold; color:#F00;'>NOTE:</span> The latest Gerber, and thus the design, includes a JLCJLCJLCJLC silkscreen label. This is used by me when ordering from JLCPCB (no endorsement nor recommendation, just what I use). If you are to use a different manufacturer, I recommend you change or remove this label in the KiCAD file.</p>

        <h3>GitHub Repository</h3>
        <p>Click on the icon bellow to be directed to this kit's source code (including the instruction's SVGs, KiCad files, etc.)</p>
        <a alt="Github Link" href="https://github.com/Electro707/blinky_lights_kit"><img src='../Resources/Icons/github.png' class='icon'></a>

        <h3>Instructions:</h3>
        <p>Here are the different soldering instructions (Click on one to open it in a new tab):</p>

        <?php
            $fh = fopen('Resources/Instructions/OpenOrder.txt','r') or die("Unable to open file!");
            while (!feof($fh)) {
                $filename = fgets($fh);
                $filename = rtrim($filename, "\r\n");
                if($filename == ""){continue;}
                echo "<a alt='Instruction SVG' target='_blank' href='Resources/Instructions/pdf/".$filename .".pdf'><img src='Resources/Instructions/png/".$filename.".png' class='instructions_svg'></a>";
            }
            fclose($fh);
        ?>

        <h3>Schematic:</h3>
        <!-- <img src='Resources/Schematic.svg' class='instructions_svg'> -->
        <a alt='Schematic SVG' target='_blank' href="Resources/Schematic.pdf"><img src='Resources/Schematic.svg' class='instructions_svg'></a>"

        <h3>Theory of Operations:</h3>
        <p>This circuit is based off of a jellybean transistor astable multivibrator circuit. I recomment you check out the following explanations to lean about how it works (a better explanation than what I could come up with)<p>
        <p><a href="https://www.electronics-tutorials.ws/waveforms/astable.html">Explanation by electronics-tutorials.com</a></p>
        <p><a href="https://electrosome.com/astable-multivibrator-transistors/">Explanation by electrosome.com</a></p>
        <p>I am connecting 2 LED's cathods to each transistor with a series current limiting resistor (without the resistor, the LEDs would cease to light, maybe even release the magic smoke if you're lucky). Which 2 of the 4 LEDs that are connected to a particular transistor (and thus will blink together) is dependent on the jumper configuration. This is also why the intructions specify to make the LEDs that are blinking simoltanously the same color, as if a blue and red LED for example are connected to the same current-lmiting resistor, the blue LED will not light up but the red one will (due to the LED's different fowards voltage drop, ~2.2v for a red LED and ~3.2v for a blue LED).

        <h3>Custom Case</h3>
        <p>If you have access to a 3D printer, you could print a nice enclosure for this kit (as a nice finishing touch). There are currently two models: A rectangular enclosure and a car enclosure. Pictures of them are coming soon!</p>
        <p>Click on the coresponding ZIP icon below to download the STL file</p>
        <table id='icon_and_table'>
            <tr>
                <th><a alt="STL ZIP Archive" href="Resources/Rectangular Enclosure STL.zip"><img src='../Resources/Icons/ZipFile.png' class='icon_no_margin'></a></th>
                <th><a alt="Car STL ZIP Archive" href="Resources/Car Enclosure STL.zip"><img src='../Resources/Icons/ZipFile.png' class='icon_no_margin'></a></th>
            </tr>
            <tr>
                <td>Rectangular STL</td>
                <td>Car STL</td>
            </tr>
        </table> 
        <p>Click on the first page of the instructions below to open the full instruction PDF for the enclosure. Currently there is only one for the car assembly</p>
        <a alt='Car Instruction SVG' target='_blank' href='Resources/Instructions/pdf/CarAssembly.pdf'><img src='Resources/Instructions/png/CarAssemblyPage1.png' class='instructions_svg' style="max-width: 750px;"></a>

        <h3>Pictures:</h3>
        <p>Here are some nice images I took for the kit, which could be used as a reference while troubleshooting(Click on the image to load a high-res version of it):</p>
        <?php
        foreach (glob('Resources/Pictures/low_res/*.jpg') as $filename) {
            echo "<a alt='Image' href='Resources/Pictures/high_res/". basename($filename) ."'><img class='showcase_img' src='" . $filename . "'></a>";
        }
        ?>

    </body>
</html>
