<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="style.css?v=1.0">
        <script type="text/javascript" src="../Resources/jquery-3.5.1.min.js"></script>
        <title>Snowflake V2</title>
    </head>
    
    <body>
        <div id="intro">
            <h1>Snowflake oldering Kit V2</h1>
            <h2>Designed by Electro707, Soldered by you!</h2>
        </div>

        <h3>GitHub Repository</h3>
        <p>Coming Soon!</p>
<!--         <p>Click on the icon bellow to be directed to this kit's source code (including the instruction's SVGs, KiCad files, etc.)</p> -->
<!--         <a alt="Github Link" href="https://github.com/Electro707/snowflake_solderkit_v2"><img src='../Resources/Icons/github.png' class='github_icon'></a> -->

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


        <h3>Pictures:</h3>
        <p>Comming Soon!</p>

    </body>
</html>
