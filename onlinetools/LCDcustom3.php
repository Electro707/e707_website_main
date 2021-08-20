<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
			$file = fopen("../Resources/head.txt", "r");
			echo file_get_contents("../Resources/head.txt");
			fclose($file);
		?>
		<link rel="stylesheet" type="text/css" href="LCDcustom3.css?ver=1.1">

		<title>128*64 OLED display code generator</title>
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

		<h2>OLED display code generator</h2>
		<h3>For horizontal addressing on the SSD1306 IC</h3>
		<h3>Enter in the size of your display in the boxes below</h3>

		<div id="textboxdiv">
			<label>Width: <input type="text" id="displaywidth" value="128" onfocusout="changedisplaysize()"></label>
			<label>Height: <input type="text" id="displayheight" value="64" onfocusout="changedisplaysize()"></label>
			<button onclick="cleardisplay()" style="margin-left:20px;">Clear Display </button>
		</div>

		<br>
			<div id="wrapperbutton">
			<?php
			$alltext = "";
			for($y=0;$y<64;$y++){
				$alltext .= "<div class=\"row\">";
				for($x=0;$x<128;$x++){
					$alltext .= "<button type=\"button\" class=\"displaybutton\" id=\"x{$x}y{$y}\"></button>";
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
			$alltext .= "<div class=\"insidecode\"> <p>";
			$alltext .= "name[] = {";
			for($i=0;$i<(128*64)/8;$i++){

				$alltext .= "<span id=\"binary{$i}\">0x00</span>";
				if($i != ((128*64)/8)-1){$alltext .= "<span>, </span>";}
			}
			$alltext .= "};";
			$alltext .= "</p></div>";
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
		<script src="LCDcustom3.js?ver=1"></script>
	</body>
</html>
