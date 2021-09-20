<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="Expires" content="-1" />
		<title>Digital Connect 4 - V1</title>
		<link rel="stylesheet" type="text/css" href="../../style.css">	
		<link rel="icon" type="image/x-icon" href="https://electro707.com/Resources/webicon.ico" />
		<style>
			.technical{
				width: 100%;
				max-width: 1200px;
				background: white;
			}
		</style>
	</head>

	<body>
		<h1 class="intro">Digital Connect 4 - V1</h1>
		<h2 class="intro">By Jamal Bouajjaj</h2>

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
			<li>The case for this project has been released yet</li>
			<li>This documentation at the moment isn't complete. Feel free tough to browse around</li>
		</ul>


		<h3>Project's folder:</h3>
		<p>Click the GitHub folder below to access the project's files, which include the KiCad PCB files, the Gerber files, and the Autodesk Inventor CAD files.</p>
		<a href="https://github.com/Electro707/PCBConnect4"><img src="https://www.electro707.com/Resources/GitHub_Logo.png"\
				 alt="GitHub Repository Link" width="15%"></a>

		<h3>Pictures:</h3>
		<img src="Resources/Picture 1.jpg" alt="Image 1" class="showcase_image">
		<img src="Resources/Picture 2.jpg" alt="Image 2" class="showcase_image">
		<img src="Resources/Picture 3.jpg" alt="Image 3" class="showcase_image">

		<h3>PCB Parts:</h3>
		<p>Here are the parts you will need to solder this project</p>
		<p>SW1 and R1 are completely optional, as they are used for the in-board reset button for the ST microcontroller</p>
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
			$f = fopen("Theory.txt","r");
			echo file_get_contents("Theory.txt");
			fclose($f);
			?>
		</p>

		<h3>Schematic:</h3>
		<p>Here is the PCB's schematic:</p>
		<img src="Resources/Schematic.svg" width="75%" alt="Schematic of Project" class="technical"/>

		<h3>Technical Diagrams:</h3>
		<p>Comming Soon!</p>

		<h3>Case:</h3>
		<p>The PCB has 4 M3 mounting holes to be screwed on to a case. I have designed a case for this board in Fusion360. The STEP and STL files will
				be released soon in the page's GitHub repository.</p>

		<h3>Programming:</h3>
		<p>The PCB is designed to be programed by using the pin headers at the top of the board (J1). The pinout for the connector can be found in the schematic.
			You could use any STM32 programmer, including the popular ST-Link 2, to program the board.
		</p>
		<p>The programming software used (AC6 for STM32 Workbench) can be found <a href="https://www.st.com/en/development-tools/sw4stm32.html">here!</a></p>
	</body>
</html>
