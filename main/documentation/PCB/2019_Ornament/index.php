<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="Expires" content="-1" />
		<title>Ornament Soldering Kit</title>
		<link rel="stylesheet" type="text/css" href="../../style.css">
		<link rel="icon" type="image/x-icon" href="https://electro707.com/Resources/webicon.ico" />
	</head>

	<body>
		<h1 class="intro">Ornament Soldering Kit - 2019</h1>
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
		<ul><li>
			D1-D6 are connected together, and D7-D12 are seperatly connected together. This allows, thru the 2 jumpers on board, to either make D7-D12 blink with D1-D6 or inverse them.
			<br><span style="font-weight:bold">Just make sure that you don't modify the jumpers in a way that will cause the 555 or power to short out.</span> See schematic for details.
		</li></ul>

		<h3>Project's folder:</h3>
		<p>Click the GitHub folder below to access the project's files, which include the KiCad PCB files, the Gerber files, and the Autodesk Inventor CAD files.</p>
		<a href="https://drive.google.com/drive/folders/16rTC0dvtwdwlaQlDZsrVhHRzyHycse8C?usp=sharing"><img src="https://www.electro707.com/Resources/G_Drive_Logo.png"\
				 alt="Google Drive Link" width="30%"></a>

		<h3>Pictures:</h3>
		<!--  <img src="Resources/Image1.jpg" alt="Image 1" class="showcase_image"> -->
		<p>Comming Soon!</p>

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
		<img src="Resources/Schematic.svg" width="75%" alt="Schematic of Project" class="technical_diagrams"/>

		<h3>Technical Diagrams:</h3>
		<p>Here is some diagrams relating to the project:</p>
		<img src="Resources/Drawing1.svg" alt="PCB Drawing" class="technical_diagrams"/>
		<img src="Resources/Drawing2.svg" alt="PCB Drawing" class="technical_diagrams"/>
		<img src="Resources/Drawing3.svg" alt="PCB Drawing" class="technical_diagrams"/>
		<img src="Resources/Drawing4.svg" alt="PCB Drawing" class="technical_diagrams"/>

		<h3>Case:</h3>
		<p>The PCB is designed to be screwed into a bettery holder and to be hung on a Christmas Tree.
				The STEP and STL files for the battery holder for the ornament can be found in the GitHub page.</p>

	</body>
</html>
