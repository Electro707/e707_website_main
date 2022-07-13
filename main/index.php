<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
      $file = fopen("Resources/head.txt", "r");
      echo file_get_contents("Resources/head.txt");
      fclose($file);
    ?>
    <link rel="stylesheet" type="text/css" href="css/index.css?v=1.2">
    <link href="Resources/lightbox.css?v=1" type="text/css" rel="stylesheet" />

    <title>Jamal Bouajjaj</title>
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
        <div id="introp">
          <p>Welcome to my website (Now JS free!)</p>
          <p>Here are pictures I have taken throughout the past (very old pictures, they are here to fill up space :P)</p>
        </div>

        <div class="imggrid">
        <?php
        $num = 1;
        for($num;$num<=13;$num++){
          echo '<a class="gallery" href="Resources/Pictures/',$num,'.jpeg"><img src="Resources/Pictures/c/',$num,'s.jpg"style="display: block;"></a> ';
        }
        ?>
        </div>

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
