<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="Expires" content="-1" />
		<title>Simple LED Matrix Library</title>
		<link rel="stylesheet" type="text/css" href="../../style.css">

		<link rel="icon" type="image/x-icon" href="https://electro707.com/Resources/webicon.ico" />
		<style>
			#NoBorder > tbody > tr > td{
				border: none;
			}
			ul#library_function {
				list-style: none;
				margin-left: -1em;
			}
		</style>
	</head>

	<body>
		<h1 class="intro">Arduino Simple LED Matrix Library v1.3</h1>
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
				<li>Create more examples</li>
				<li>Publish pictures</li>
				<li>Have scrolling be able to be done from left to right</li>
		</ul>

		<h3>Library's GitHub page:</h3>
		<p>Click in the icon below to direct you to the Github repository, where you can download the library from:</p>
		<a href="https://github.com/Electro707/Simple-LED-Matrix-Library"><img src="https://www.electro707.com/Resources/Icons/github_full.png"\
				 alt="GitHub Repository Link" width="15%"></a>

		<h3>Library functions:</h3>
		<p>Here are the available functions that the library provides (Click on each function to expand it's documentation):</p>
		<ul id='library_function'>
			<?php
				$f = fopen("functions_text.txt", "r");
				$found_newline = false;		// Store if found a new line
				$i = 0;				// Use i to give each <li> and <p> and ID so JS can hide/unhide each p
				while ( !feof($f) ){
					$line = fgets($f);		// Read each line
					if($line[0] == "\r" || $line[0] == "\n"){		// if found newline, continue and set variable to true
						echo "</p>";
						$found_newline = true;
						$i = $i+1;
                    	continue;
					}
					if($found_newline == true){
						echo "<a href=\"javascript:void(0)\"><li class='library_function' id=", $i, " style=\"color:blue;\">";
						echo "⯈ ";
						echo $line;
						echo "</li></a>";
						$found_newline = false;

						echo "<p style=\"display: none;\" class='library_function' id=", $i, ">";
					}
					else{
						//echo "<p style=\"display: none;\" class='library_function' id=", $i, ">";
						echo $line;
						//echo "</p>";
					}
				}
			?>
		</ul>

		<h3>Build Parts:</h3>
		<p>The only required parts is an Arduino Uno or Nano, and a MAX7219 driven LED Matrix. Currently, the library is set for 4 LEDs
		chained together, but this will be changed in the future to allow any amount of LED matrices. <br>
		If you do now know where to get the parts,
		here is a link to the parts thru some distributors to get started: </p>
		<ul>
			<li>4x LED Matrix:
				<ul>
					<li><a href="https://www.amazon.com/HiLetgo-MAX7219-Arduino-Microcontroller-Display/dp/B07FFV537V/ref=sr_1_3?keywords=max7219+4&qid=1569378055&s=gateway&sr=8-3">Amazon</a></li>
					<li><a href="https://www.ebay.com/itm/MAX7219-Microcontroller-4-In-1-Display-LED-5P-Line-Dot-Matrix-Module-Arduino-US/222658956460?epid=12025019231&hash=item33d7820cac:g:3IsAAOSwsTZZzBiO">Ebay</a></li>
				</ul>
			</li>
			<li>Arduino Nano:
				<ul>
					<li><a href="https://www.amazon.com/KAILEDI-Arduino-Board-ATmega328P-Micro-Controller/dp/B07X5VQ9XH/ref=sr_1_10?keywords=arduino+nano&qid=1569378321&s=gateway&sr=8-10">Amazon</a></li>
					<li><a href="https://www.ebay.com/itm/For-arduino-Nano-V3-0-controller-ATMEGA328P-ATMEGA328-original-CH340-USB-cable/192911330822?hash=item2cea694e06:m:m3ipLrIn8kdJTTob6Rah19w">Ebay</a></li>
				</ul>
			</li>
		</ul>

		<h3>Wiring</h3>
		<p>Once you have all the parts, you can use any wires to hook up the pins of the Arduino to the pins of the LED matrix as follows:</p>
		<table>
			<tr style="font-weight:bold;">
				<td>Arduino Pins</td>
				<td>LED Matrix Pins</td>
			</tr>
			<tr>
				<td>VCC</td>
				<td>VCC</td>
			</tr>
			<tr>
				<td>GND</td>
				<td>GND</td>
			</tr>
			<tr>
				<td>D13</td>
				<td>CLK</td>
			</tr>
			<tr>
				<td>D11</td>
				<td>DIN</td>
			</tr>
			<tr>
				<td>D4 (Adjustable by software)</td>
				<td>CS</td>
			</tr>
		</table>
		<h3>Python Matrix Generators:</h3>
		<p>I have released a Python application which allows you to visually create a custom array which can be copied and pasted unto one of the provided examples</p>
		<p>If using the "4 Matrix" software, use the example "4_Matrix_Bitmap"</p>
		<p>If using the "Single Matrix" sofware, use the example "Single_Matrix_Bitmap"</p>
		<a href="https://www.electro707.com/documentation/Software/LED_matrix_generator">Click here to go to the software's documentation page</a>

		<h3>Pictures:</h3>
		<p>Comming Soon !</p>

		<h3 id="warning">Warnings/Issues:</h3>
		<ul>
			<li>This library at the moment is only meant to drive 4 MAX7219-controlled 8x8 LED matrices</li>
		</ul>
		<script src="functions.js"></script>
	</body>
</html>
