<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="Expires" content="-1" />
		<title>Pierced Heart Soldering Kit</title>
		<link rel="stylesheet" type="text/css" href="../../style.css">
		<link rel="icon" type="image/x-icon" href="https://electro707.com/Resources/webicon.ico"/>
		<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
		<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
	</head>

	<body>
		<h1 class="intro">Peired Heart Soldering Kit- 2020</h1>
		<h2 class="intro">By Jamal Bouajjaj</h2>

		<h3>Introduction:</h3>
		<p>
			<?php
			$f = fopen("Resources/Intro.txt","r");
			echo file_get_contents("Resources/Intro.txt");
			fclose($f);
			?>
		</p>

		<h3 id="warning">Warnings/Issues:</h3>
		<ul>
			<li>Due to the original intent of this kit, it will have many reference to the University of New Haven and it's makerspace.
			<br> If you plan to use this kit for your own purpose, it is recommeded to update the PCB in Kicad to remove such marks.
			The same applies for all CAD drawings made in Solidworks 2020.
			</li>
		</ul>

		<h3>Project's folder:</h3>
		<p>Click the Google Drive Logo below to access the project's files, which include the KiCad PCB files, the Gerber files, and the Autodesk Inventor CAD files.</p>
		<a href="https://drive.google.com/drive/folders/1RUmLneuWU_-0xwMjEcCLwAP9C9QgELw2?usp=sharing"><img src="https://www.electro707.com/Resources/G_Drive_Logo.png"\
				 alt="Google Drive Link" width="30%"></a>

		<h3>Theory of Operation:</h3>
		<p>
			<?php
			$f = fopen("Resources/Theory.txt","r");
			echo file_get_contents("Resources/Theory.txt");
			fclose($f);
			?>
		</p>

		<h3>Pictures:</h3>
		<!-- <img src="Resources/Image1.jpg" alt="Image 1" class="showcase_image" style="width:70%"> -->
		<p>Comming Soon!</p>

		<h3>PCB Parts:</h3>
		<p>This kit has some THT and SMD parts to be soldered (THT means through-hole, and SMD means surface-mount).</p>
		<?php
			echo "<table>";
			$f = fopen("Resources/Parts.csv", "r");
			while (($line = fgetcsv($f)) !== false) {
					if($line[0]=="PCB Reference"){echo "<tr style=\"font-weight:bold;\">";}else{echo "<tr>";}
					foreach ($line as $cell) {
							echo "<td>" . $cell . "</td>";
					}
					echo "</tr>";
			}
			fclose($f);
			echo "</table>";
		?>

		<h3>Schematic:</h3>
		<p>Here is the PCB's schematic (The first one is for the main tree, the second is for the auxilary tree):</p>
		<img src="Resources/Schematic.svg" width="75%" alt="Schematic of Project 1" class="technical_diagrams"/>

		<h3>Technical Diagrams:</h3>
		<p>Here is some diagrams relating to the project:</p>
		<img src="Resources/cad_exploded.svg" width="100%" alt="Exploded View CAD" class="technical_diagrams"/>
		<img src="Resources/cad_tht.svg" width="100%" alt="THT Soldering Assembly CAD" class="technical_diagrams"/>
		<img src="Resources/cad_base.svg" width="100%" alt="Base CAD" class="technical_diagrams"/>


		<h3>Case:</h3>
		<p>The PCB is designed to be screwed a case at the buttom of the board. I have designed such case, which you can find in the
				project's Google Drive folder.</p>

	</body>
</html>
