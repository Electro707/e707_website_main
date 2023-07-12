<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="../style.css?v=2.1">
        <title>4-In-A-Row Kit</title>
    </head>
    
    <body>
        <?php
            echo file_get_contents("../Resources/html_top.txt");
        ?>

        <div id="intro">
            <h1>4-In-A-Row Kit</h1>
            <h3>v1.0</h3>
            <h2>Designed by Electro707, Soldered by you!</h2>
        </div>

        <a alt='Image' href='Resources/Pictures/high_res/DSC05956.jpg'><img class='showcase_img' style="width: 50%; max-width: 600px;" src='Resources/Pictures/low_res/DSC05956.jpg'></a>

        <h3>Tindie Link:</h3>
        <p>The soldering kit is available <a href="https://www.tindie.com/products/28121/">HERE!</a><p>

        <h3>PCB Gerber Files</h3>
        <p>The Gerber file can be found on GitHub as a Release:</p>
        <a alt="GitHub Release Page" href="https://github.com/Electro707/PCB-4-In-A-Row/releases/"><img src='../Resources/Icons/ZipFile.png' class='icon'></a>
        <p><span style='font-weight: bold; color:#F00;'>NOTE:</span> The latest Gerber, and thus the design, includes a JLCJLCJLCJLC silkscreen label. This is used by me when ordering from JLCPCB (no endorsement nor recommendation, just what I use). If you are to use a different manufacturer, I recommend you change or remove this label in the KiCAD file or Gerber file directly.</p>

        <h3>GitHub Repository</h3>
        <p>Click on the icon bellow to be directed to this kit's source code (including the instruction's SVGs, KiCad files, etc.)</p>
        <a alt="Github Link" href="https://github.com/Electro707/PCB-4-In-A-Row"><img src='../Resources/Icons/github.png' class='icon'></a>

        <h3 id='warning', style='line-height: 0.0;'>Errata:</h3>
        <p><span style='font-weight: bold;'>Main board Rev 1.0:</span> A hardware bug exists where if the CH340C is soldered, due to the CH340 pulling it's pin 2 high nominally, 
        it conflicts when a button is pressed (which drives the pin low). This can be either mitigated by not installing the CH340, or fixed by bending CH340's pin upwards and installing a 1k resistor between the 
        pin and the pad as shown below (image coming soon!):</p>
        <img src='Resources/Pictures/DSC05958.jpg' class='showcase_image', style='width: 30%'>

        <h3>Instructions:</h3>
        <p>Here are the different soldering instructions (Click on one to open the svg in a new tab):</p>
        
        <a alt='Instruction SVG' target='_blank' href='Resources/Instructions/Soldering Instructions.svg'><img src='Resources/Instructions/Soldering Instructions.png' class='technical_diagrams'></a>
        <!-- smaller width for the LED instruction as it isn't that big-->
        <a alt='Instruction SVG' target='_blank' href='Resources/Instructions/LED_Instructions.svg'><img src='Resources/Instructions/LED_Instructions.png' class='technical_diagrams' style='width: 50%;'></a>

        <h3>Schematic:</h3>
        <p>Here are the schematics for the 2 boards. Click on one for a PDF version in a new tab</p>
        <a alt='Schematic SVG' target='_blank' href="Resources/Schematics/Driver_Schematic.pdf"><img src='Resources/Schematics/Driver_Schematic.png' class='technical_diagrams'></a>
        <a alt='Schematic SVG' target='_blank' href="Resources/Schematics/LED_Schematic.pdf"><img src='Resources/Schematics/LED_Schematic.png' class='technical_diagrams'></a>
        
        <h3>Pictures:</h3>
        <p>Here are some nice images I took for the kit, which could be used as a reference while troubleshooting(Click on the image to load a high-res version of it):</p>
        <?php
        foreach (glob('Resources/Pictures/low_res/*.jpg') as $filename) {
            echo "<a alt='Image' href='Resources/Pictures/high_res/". basename($filename) ."'><img class='showcase_img' src='" . $filename . "'></a>";
        }
        ?>

    </body>
</html>
