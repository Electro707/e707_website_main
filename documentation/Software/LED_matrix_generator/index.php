<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="Expires" content="-1" />
		<title>LED Matrix Array Generator</title>
		<link rel="stylesheet" type="text/css" href="../../style.css">
		<link rel="icon" type="image/x-icon" href="https://electro707.com/Resources/webicon.ico" />
		<style>
			#NoBorder > tbody > tr > td{
				border: none;
			}
		</style>
	</head>

	<body>
		<h1 class="intro">Arduino Simple LED Matrix Library</h1>
		<h2 class="intro">By Jamal Bouajjaj</h2>

		<h3>Introduction:</h3>
		<p>
			<?php
			$file = fopen("Intro.txt", "r");
			echo file_get_contents("Intro.txt");
			fclose($file);
			?>
		</p>

		<h3>To-Do:</h3>
		<ul>
				<li>Create software for a theoratical unlimited columns (to be scrolled by the Arduino software)</li>
		</ul>

		<h3>GitHub Repository:</h3>
		<p>Click in the icon below to direct you to the Github repository, where you can download the library from:</p>
		<a href="https://github.com/Electro707/LED_Matrix_Generator"><img src="https://www.electro707.com/Resources/GitHub_Logo.png"\
				 alt="GitHub Repository Link" width="15%"></a>


		<h3>Software Description:</h3>
		<p style="font-weight:bold;">Note: Python3 and the Python libraries Tkinter and pyperclip are required in order for the software to run.</p>
		<p>Current there are 2 python software published with this library which can be found in the GitHub repository(Python software is under each folder):</p>
		<ul>
			<li>"4 Matrix Software" ← This software is to provide a GUI to create a custom bitmap for 4 8x8 LED matrices (A good chunk of Amazon/Ebay LED Matrix modules come as 4 8x8 matrices).</li>
			<li>"Single Matrix Software" ← This software is to provide a GUI to create a custom bitmap for a single 8x8 LED Matrix.</li>
		</ul>
		<p>Here are a screenshot of both software:</p>
		<table cellspacing="0" cellpadding="0" id="NoBorder" style="max-width: 1200px;">
			<tr style="vertical-align: bottom;">
				<td><img src="ImageResources/Screenshot2.png" alt="Single Matrix Screenshot" style="width: 100%; max-width: 1200px;"></img></td>
				<td><img src="ImageResources/Screenshot3.png" alt="4 Matrix Screenshot" style="width: 100%; max-width: 1200px;"></img></td>
			</tr>
			<tr>
				<td><p>Screenshot of 'Simple Matrix.py'</p></td>
				<td><p>Screenshot of '4-Matrix.py' with example PNG bitmap imported with "Import Picture" button</p></td>
			</tr>
		</table>

		<p>In order to 'draw' a matrix, click on a 'pixel' to toggle it on or off (red is off, blue is on).
			The entry on top of the software will determine the name of the array that will be copied.
		<br>In order to copy the generated array, click on the "Copy Array" button. The array then can be pasted unto the corresponding Arduino example to test your design.
		<br>The "Fill Display" and "Clear Display" are used to completely turn on or off all 'pixels' in the array.
		<br>In the 4-Matrix.py software, there is a button named "Import Picture". This is to import a 32x8 image that will be then intepreted and used to determine which pixel is on or off.
		An example image has been provided in the same folder as the software, titled "4-Matrix Test Image.png".
		<br>If you want to import your own image, make sure it's 32x8, or else the software will reject it. For best outcome, make sure the 'pixels' to be turned on are black and the 'pixels' to be turned off are white in whichever image edition software you are using.
		Also, for best outcome, make sure you create the bitmap as a PNG, so that there is no loss/misintepretation of data through JPEG's compression.
		</p>

    <h3>Arduino Software:</h3>
    <p>Altough the software can be used with any library that can take a column-addressed array. With that said, this software has been currently only tested with my own software</p>
    <p>My LED Matrix library's documentation page can be found <a href="https://www.electro707.com/documentation/Libraries/simple_led_library/index.php">HERE</a>.
      The section "Python Matrix Generators" on that page describes which example to use for whichever software you used.</p>
		<h3 id="warning">Warnings/Issues:</h3>
		<ul>
			<li>None at this time</li>
		</ul>

	</body>
</html>
