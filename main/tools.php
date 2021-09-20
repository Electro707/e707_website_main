<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
			$file = fopen("Resources/head.txt", "r");
			echo file_get_contents("Resources/head.txt");
			fclose($file);
		?>
		<link rel="stylesheet" type="text/css" href="../css/project.css?v=1.2">

		<title>Projects</title>
	</head>
	<body>
		<div id="wrap">
			<div id="navbardiv">
				<?php
				$file = fopen("Resources/header.txt", "r");
				echo file_get_contents("Resources/header.txt");
				fclose($file);
				?>
			</div>

			<div id="mainbodydiv">
				<p style="text-align:center;">Click on the name to direct to the project's site.</p>
				<br>
				<table>
					<tr class="toprow">
						<td>Tools</td>
					</tr>
					<tr>
						<td><p><a href="onlinetools/LCD_single_character.php" >LCD Custom Character Code Generator(single segment)</a></p></td>
					</tr>
					<tr>
						<td><p><a href="onlinetools/LCDcustom2.php" >16x2 LCD Custom Character Code Generator(whole display)</a></p></td>
					</tr>
					<tr>
						<td><p><a href="onlinetools/LCDcustom3.php" >SSD1306 OLED Display Byte Array Generator(whole display)</a></p></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="footer">
		<?php
			$file = fopen("Resources/footer.txt", "r");
			echo file_get_contents("Resources/footer.txt");
			fclose($file);
		?>
		</div>
	</body>
</html>
