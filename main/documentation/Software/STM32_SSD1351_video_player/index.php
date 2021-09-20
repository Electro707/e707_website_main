<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="Expires" content="-1" />
		<title>STM32 Video Player</title>
		<link rel="stylesheet" type="text/css" href="../../style.css">
		<link rel="icon" type="image/x-icon" href="https://electro707.com/Resources/webicon.ico" />

		<script src="https://cdn.jsdelivr.net/npm/@webcomponents/webcomponentsjs@2/webcomponents-loader.min.js"></script>
		<script type="module" src="https://cdn.jsdelivr.net/gh/zerodevx/zero-md@1/src/zero-md.min.js"></script>

		<style>
			#NoBorder > tbody > tr > td{
				border: none;
			}
		</style>
	</head>

	<body>
		<h1 class="intro">STM32 SSD1351 Video Player</h1>
		<h2 class="intro">By Jamal Bouajjaj</h2>

		<h3>Introduction:</h3>
		<p>
			This software is for an STM32F103RCT6 (commmonly found on the "Blue-Pill" boards) to display video on an SSD1351 OLED module and to play
			back audio. The video and audio is read from an SD-Card, where the audio file is in an 8-bit WAV file and the video is a custom .hex file
			create by a Python program that is discussed later down this page. From my testing, even with a 3:4 aspect ratio video (128x96 pixels on
			the screen), the video is able to get about >30FPS.
		</p>

		<h3>To-Do:</h3>
		<ul>
			<li>Update documentation.</li>
			<li>There is a mi-sync between the video and audio that needs to be fixed.</li>
		</ul>

		<h3>GitHub Repository:</h3>
		<p>Click in the icon below to direct you to the Github repository, where you can download the library from:</p>
		<a href="https://github.com/Electro707/stm32_ssd1351_video_audio_player"><img src="https://www.electro707.com/Resources/GitHub_Logo.png"\
				 alt="GitHub Repository Link" width="250em"></a>

		<h3>Build Materials:</h3>
		<ul>
			<li>STM32F103RCT6 "Blue-Pill" Board</li>
			<li>SD Card Module</li>
			<li>SD Card</li>
			<li>SSD1351 OLED Module</li>
			<li>Low Pass filter + Speaker Amplifier</li>
			<li>Speaker</li>
		</ul>

		<zero-md
		css-urls='["../../style.css"]'
		src="https://raw.githubusercontent.com/Electro707/stm32_ssd1351_video_audio_player/master/Documentation/text.md">
		</zero-md>


	</body>
</html>
