<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style.css">	
        <title>Valentines Cupid Soldering Kit V2</title>
    </head>
    
    <body>
        <div id="intro">
            <h1>Valentines Cupid Soldering Kit V2</h1>
            <h2>Designed by Electro707, Soldered by you!</h2>
        </div>

        <h3>GitHub Repository</h3>
        <p>Coming Soon!</p>
<!--         <p>Click on the icon bellow to be directed to this kit's source code (including the instruction's SVGs, KiCad files, etc.)</p> -->
<!--         <a alt="Github Link" href="https://github.com/Electro707/valentines_cupid_v2"><img src='../Resources/Icons/github.png' class='github_icon'></a> -->

        <h3>Instructions:</h3>
        <p>Here are the different soldering instructions (Click on one to open it in a new tab):</p>

        <?php
            $fh = fopen('Resources/Instructions/OpenOrder.txt','r') or die("Unable to open file!");
            while (!feof($fh)) {
                $filename = fgets($fh);
                $filename = rtrim($filename, "\r\n");
                if($filename == ""){continue;}
                echo "<a alt='Instruction SVG' target='_blank' href='Resources/Instructions/pdf/".$filename .".pdf'><img src='Resources/Instructions/png/".$filename.".png' class='technical_diagrams'></a>";
            }
            fclose($fh);
        ?>

        <h3>Schematic:</h3>
        <!-- <img src='Resources/Schematic.svg' class='technical_diagrams'> -->
        <a alt='Schematic SVG' target='_blank' href="Resources/Schematic.pdf"><img src='Resources/Schematic.svg' class='technical_diagrams'></a>"

        <h3>Custom Holder</h3>
        <p>The custom holder for this kit is designed to be laser-engravable. It's available in the project's repo (coming soon).</p>
        <p>The holder is made out of a minimal of 3 parts, with 2 optional pieces. This is what the final assembly looks like:</p>
        <img src='Resources/CadScreenshot.png' class='showcase_image' style='max-width: 600px;'>

        <h3>Pictures:</h3>
        <p>Comming Soon!</p>

    </body>
</html>
