<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
			$file = fopen("../Resources/head.txt", "r");
			echo file_get_contents("../Resources/head.txt");
			fclose($file);
		?>
		<link rel="stylesheet" type="text/css" href="LCDcustom2.css?ver=1">

		<title>LCD Custom Character Code Generator</title>
	</head>

	<body onload="loadfunction();">

		<div id="navbardiv">
			<?php
			$file = fopen("../Resources/header.txt", "r");
			echo file_get_contents("../Resources/header.txt");
			fclose($file);
			?>
		</div>

		<div id="mainbodydiv">

		<h2>16x2 LCD Custom Character Code Generator</h2>
		<h3>Remember, you only have up to <span style="font-size: 150%;">8</span> custom characters</h3>
		<h3>I have the whole LCD displayed for arrengment purposes</h3>
		<label id="segmentcheckbox_label"><input type="checkbox" id="segmentcheckbox" name="showsegment" onchange="checkboxchange()">Show segment number</label>
		<br>
		<div id="wrapperbutton">
			<?php
				$alltext = "";
				for($i=0;$i<16*2;$i++){
				$alltext .= "<div id=\"buttonsarea{$i}\">";
				$alltext .= "<span class=\"segmenttext\" style=\"display: none;\">Segment{$i}</span>";
					for($k=0;$k<8;$k++){
					$alltext .= "<div class=\"row\">";
					$alltext .= "<button type=\"button\" class=\"x0y{$k}\"></button>";
					$alltext .= "<button type=\"button\" class=\"x1y{$k}\"></button>";
					$alltext .= "<button type=\"button\" class=\"x2y{$k}\"></button>";
					$alltext .= "<button type=\"button\" class=\"x3y{$k}\"></button>";
					$alltext .= "<button type=\"button\" class=\"x4y{$k}\"></button>";
					$alltext .= "</div>";
					}
				$alltext .= "</div>";
				}
				echo $alltext;
			?>
		</div>

			<br>

			<div id="code">
			<?php
			$alltext = "";
			for($i=0;$i<16*2;$i++){
				$alltext .= "<div class=\"insidecode\"> <p>";
				$alltext .= "<span>uint8_t SEGMENT{$i}[8] = {</span>";
				$alltext .= "<span id=\"{$i}binary0\">0b00000 ,</span>";
				$alltext .= "<span id=\"{$i}binary1\">0b00000 ,</span>";
				$alltext .= "<span id=\"{$i}binary2\">0b00000 ,</span>";
				$alltext .= "<span id=\"{$i}binary3\">0b00000 ,</span>";
				$alltext .= "<span id=\"{$i}binary4\">0b00000 ,</span>";
				$alltext .= "<span id=\"{$i}binary5\">0b00000 ,</span>";
				$alltext .= "<span id=\"{$i}binary6\">0b00000 ,</span>";
				$alltext .= "<span id=\"{$i}binary7\">0b00000</span>";
				$alltext .= "<span>};</span>";
				$alltext .= "</p></div>";
			}
			echo $alltext;
			?>
			</div>

		</div>
		<div class="footer">
		<?php
			$file = fopen("../Resources/footer.txt", "r");
			echo file_get_contents("../Resources/footer.txt");
			fclose($file);
		?>
		</div>
		<script src="LCDcustom2.js?ver=1"></script>
	</body>
</html>
