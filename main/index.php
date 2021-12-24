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
    <script src="Resources/lightbox.js?v=1" type="text/javascript" charset="utf-8"></script>

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
          <p>Welcome to my website.</p>
          <p>Here are pictures I have taken throughout the past</p>
          <h1>Pictures:</h1>
        </div>
        <div id="movegallery">
            <img src="Resources/prev.png" height="44px" onclick="changeimage(false,true);">
            <div style="width:30%;"></div>
            <img src="Resources/next.png" height="44px" onclick="changeimage(true,false);">
        </div>

        <div class="imggrid">
        <?php
        $num = 1;
        for($num;$num<=13;$num++){
          echo ' <a class="gallery" href="Resources/Pictures/',$num,'.jpeg" data-lightbox="image" style="display: none;"><img src="Resources/Pictures/c/',$num,'s.jpg"style="display: none;"></a> ';
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
    <script src="js/index.js?v=1.2"></script>
  </body>
</html>
