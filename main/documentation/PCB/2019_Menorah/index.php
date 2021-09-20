<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="Expires" content="-1" />
		<title>Menorah Soldering Kit</title>
		<link rel="stylesheet" type="text/css" href="../../style.css">
		<link rel="icon" type="image/x-icon" href="https://electro707.com/Resources/webicon.ico" />
	</head>

	<body>
		<h1 class="intro">Menorah Soldering Kit - 2019</h1>
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
			The same applies for all CAD drawings made in Autodesk Inventor 2018.
			</li>
		</ul>

		<h3>Note:</h3>
			<ul><li>The 5V regulator can be bypassed by shorting the jumper JP1 on the back of the PCB.
				In that case, only a maximum of 5V should be provided to the circuit</li></ul>

		<h3>Project's folder:</h3>
		<p>Click the GitHub folder below to access the project's files, which include the KiCad PCB files, the Gerber files, and the Autodesk Inventor CAD files.</p>
		<a href="https://drive.google.com/drive/folders/1pPQ6wZN-cz4HXKuyum1Wqg5v5d99_tr0?usp=sharing"><img src="https://www.electro707.com/Resources/G_Drive_Logo.png"\
				 alt="Google Drive Link" width="30%"></a>

		<h3>Pictures:</h3>
		<img src="Resources/Image1.jpg" alt="Image 1" class="showcase_image" style="width:70%">

		<h3>PCB Parts:</h3>
		<p>This kit has some THT and SMD parts to be soldered (THT means through-hole, and SMD means surface-mount).</p>
		<?php
			echo "<table>";
			$f = fopen("Resources/Parts.csv", "r");
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
			$f = fopen("Resources/Theory.txt","r");
			echo file_get_contents("Resources/Theory.txt");
			fclose($f);
			?>
		</p>

		<h3>Schematic:</h3>
		<p>Here is the PCB's schematic:</p>
		<img src="Resources/Schematic.svg" alt="Schematic of Project" class="technical_diagrams"/>

		<h3>Technical Diagrams:</h3>
		<p>Here is some diagrams relating to the project:</p>
		<img src="Resources/Drawing1.svg" alt="PCB Drawing" class="technical_diagrams"/>
		<img src="Resources/Drawing2.svg" alt="PCB Drawing" class="technical_diagrams"/>
		<img src="Resources/Drawing3.svg" alt="PCB Drawing" class="technical_diagrams"/>
		<img src="Resources/Drawing4.svg" alt="PCB Drawing" class="technical_diagrams"/>

		<h3>Base:</h3>
		<p>The PCB is designed to be screwed or tight-fitted into a case at the buttom of the board. I have designed such case, which you can find the
				STL and STEP for it in the project's GitHub repository.</p>

		<h3>Arduino Software:</h3>
		<p>For the board to be functional, the Attiny84 must be pre-programmed or programmed thru the Tag-Connect connector(J1).
		The software can found in the GitHub repository.</p>

	</body>
</html>
