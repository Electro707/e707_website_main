<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
			$file = fopen("../Resources/head.txt", "r");
			echo file_get_contents("../Resources/head.txt");
			fclose($file);
		?>
		<link rel="stylesheet" type="text/css" href="LCD_single_character.css?ver=1">

		<title>LCD Custom Character Code Generator</title>
	</head>

	<body>

		<div id="navbardiv">
			<?php
			$file = fopen("../Resources/header.txt", "r");
			echo file_get_contents("../Resources/header.txt");
			fclose($file);
			?>
		</div>

		<div id="mainbodydiv">

			<h2>LCD Custom Character Code Generator</h2>
			<p>This tool is to generate a custom character for a single LCD character that can be imported and used in the Arduino's LCD Library</p>
			<br>
				<?php
			$text = "<div class=\"buttonsarea\">";
			for($k=0; $k<8; $k++){
				$text .= "<div class=\"row\">";
				$text .= "<button type=\"button\" id=\"x0y$k\"></button>";
				$text .= "<button type=\"button\" id=\"x1y$k\"></button>";
				$text .= "<button type=\"button\" id=\"x2y$k\"></button>";
				$text .= "<button type=\"button\" id=\"x3y$k\"></button>";
				$text .= "<button type=\"button\" id=\"x4y$k\"></button>";
				$text .= "</div>";
			}
			$text .= "</div>";
			echo $text;
			?>
			<br>
			<div class="code">
			<p>
			<span>uint8_t NAME[8] = {</span>
			<span id="binary0">0b00000 ,</span>
			<span id="binary1">0b00000 ,</span>
			<span id="binary2">0b00000 ,</span>
			<span id="binary3">0b00000 ,</span>
			<span id="binary4">0b00000 ,</span>
			<span id="binary5">0b00000 ,</span>
			<span id="binary6">0b00000 ,</span>
			<span id="binary7">0b00000</span>
			<span>};</span>
			</p>
			</div>
		</div>
		<div class="footer">
			<?php
				$file = fopen("../Resources/footer.txt", "r");
				echo file_get_contents("../Resources/footer.txt");
				fclose($file);
			?>
		</div>
		<script src="LCD_single_character.js?ver=1"></script>
	</body>
</html>
