<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="style.css?v=1.0">
        <script type="text/javascript" src="../Resources/jquery-3.5.1.min.js"></script>
        <title>Blinky Lights Kit</title>
    </head>
    
    <body>
        <div id="intro">
            <h1>Blinky Lights Kit</h1>
            <h2>Designed by Electro707, Soldered by you!</h2>
        </div>

        <h3>Tindie Link:</h3>
        <p>The soldering kit is available <a href="https://www.tindie.com/products/20887/">HERE!</a><p>

        <h3>GitHub Repository</h3>
        <p>Click on the icon bellow to be directed to this kit's source code (including the instruction's SVGs, KiCad files, etc.)</p>
        <a alt="Github Link" href="https://github.com/Electro707/blinky_lights_kit"><img src='../Resources/Icons/github.png' class='github_icon'></a>

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
        <p>If you have access to a 3D printer, you could print a nice enclosure for this kit (as a nice finishing touch). The design files are on GitHub, but they have NOT been tested yet. I will update this paragraph once I have printed it and tested that it fits.</p>

        <h3>Pictures:</h3>
        <p>Here are some nice images I took for the kit, which could be used as a reference while troubleshooting(Click on the image to load a high-res version of it):</p>
        <?php
        foreach (glob('Resources/Pictures/low_res/*.jpg') as $filename) {
            echo "<a alt='Image' href='Resources/Pictures/high_res/". basename($filename) ."'><img class='showcase_img' src='" . $filename . "'></a>";
        }
        ?>

    </body>
</html>
