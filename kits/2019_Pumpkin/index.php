<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="Expires" content="-1" />
		<title>2019 Pumpkin PCB Soldering Kit</title>
		<link rel="stylesheet" type="text/css" href="../style.css">	
		<link rel="icon" type="image/x-icon" href="https://electro707.com/Resources/webicon.ico" />
	</head>

	<body>
		<div id="intro">
			<h1>PCB Pumpkin Soldering Kit - 2019</h1>
			<h2>By Jamal Bouajjaj</h2>
		</div>

		<h3>Introduction:</h3>
		<p>
			<?php
			$f = fopen("Intro.txt","r");
			echo file_get_contents("Intro.txt");
			fclose($f);
			?>
		</p>
		
		<h3 id="warning">Warnings/Issues:</h3>
		<ul>
			<li>Due to the original intent of this kit, it will have many reference to the University of New Haven and it's makerspace.
			<br> If you plan to use this kit for your own purpose, it is recommeded to update the PCB in Kicad to remove such marks. 
			The same applies for all CAD drawings made in Autodesk Inventor 2018.
			</li>
		</ul>


		<h3>Project's folder:</h3>
		<p>Click the GitHub folder below to access the project's files, which include the KiCad PCB files, the Gerber files, and the Autodesk Inventor CAD files.</p>
		<a href="https://drive.google.com/drive/folders/1fnTpsoBRysS-dV7MKdh9diH9cMcoCfCn?usp=sharing"><img src="https://www.electro707.com/Resources/G_Drive_Logo.png"\
				 alt="Google Drive Link" width="30%"></a>

		<h3>Pictures:</h3>
		<img src="Resources/Image1.jpg" alt="Image 1" class="showcase_image">

		<h3>PCB Parts:</h3>
		<p>This kit has some THT and SMD parts to be soldered (THT means through-hole, and SMD means surface-mount).</p>
		<?php
			echo "<table>";
			$f = fopen("Parts.csv", "r");
			$count = 0;
			while (($line = fgetcsv($f)) !== false) {
					if($count === 0){
					echo "<tr style=\"font-weight:bold;\">";
					}
					else{
					echo "<tr>";
					}
					foreach ($line as $cell) {
							echo "<td>" . htmlspecialchars($cell) . "</td>";
					}
					echo "</tr>";
					$count += 1;
			}
			fclose($f);
			echo "</table>";
		?>

		<h3>Theory of Operation:</h3>
		<p>
			<?php
			$f = fopen("Theory.txt","r");
			echo file_get_contents("Theory.txt");
			fclose($f);
			?>
		</p>

		<h3>Schematic:</h3>
		<p>Here is the PCB's schematic:</p>
		<img src="Resources/Schematic.svg" width="75%" alt="Schematic of Project" class="technical_diagrams"/>

		<h3>Technical Diagrams:</h3>
		<p>Here is some diagrams relating to the project:</p>
		<img src="Resources/Hand Soldering Assembly.svg" width="100%" alt="Hand Soldering Assembly" class="technical_diagrams"/>
		<img src="Resources/PCB Drawing.svg" width="100%" alt="PCB Drawing" class="technical_diagrams"/>

		<h3>Mounting:</h3>
		<p>The PCB is designed to be hanged from the hole at the tip of the pumpkin.</p>

		<h3>Programming:</h3>
		<p>The PCB is designed to be programed either by A) Pre-programming the Attiny85 in any means you like before placing
			it on the DIP socket, or B) use a Tag-Connect 6-pin pogo-pin connector following the pinout of J1 for reference (The pads are located at the stem of the pumpkin).
			The software can be found in the GitHub folder.
			</p>
	</body>
</html>
