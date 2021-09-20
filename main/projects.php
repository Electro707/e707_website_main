<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
      $file = fopen("Resources/head.txt", "r");
      echo file_get_contents("Resources/head.txt");
      fclose($file);
    ?>
    <link rel="stylesheet" type="text/css" href="css/project.css?v=1.2">

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
        <p class="centerp">Click on the name to direct to the project's site.</p>
        <p class="centerp">These are only the currently documented project, so more are comming in the future!</p>
        <br>
        <table>
          <tr class="toprow">
            <td style="width: 30%;">Type</td>
            <td>Name + Link</td>
          </tr>
          <tr>
            <td>Library</td>
            <td><a href="documentation/Libraries/simple_led_library/index.html" >Simple LED Matrix Arduino Library</a></td>
          </tr>
          <tr>
            <td>Soldering Kit PCB</td>
            <td><a href="documentation/PCB/2019_Ghost/index.php">Ghost Soldering Kit - 2019</a></td>
          </tr>
          <tr>
            <td>Soldering Kit PCB</td>
            <td><a href="documentation/PCB/2019_Pumpkin/index.php">Pumpkin Soldering Kit - 2019</a></td>
          </tr>
          <tr>
            <td>Project (PCB+Code)</td>
            <td><a href="documentation/PCB/Connect4_V1/index.php">Digital Connect 4</a></td>
          </tr>
          <tr>
            <td>Soldering Kit PCB</td>
            <td><a href="documentation/PCB/2019_3DChristmasTree/index.php">3D Christmas Tree - 2019</a></td>
          </tr>
          <tr>
            <td>Soldering Kit PCB</td>
            <td><a href="documentation/PCB/2019_Menorah/index.php">Menorah - 2019</a></td>
          </tr>
          <tr>
            <td>Soldering Kit PCB</td>
            <td><a href="documentation/PCB/2019_Ornament/index.php">Ornament - 2019</a></td>
          </tr>
          <tr>
            <td>Software</td>
            <td><a href="documentation/Software/LED_matrix_generator">LED Matrix Array Generator</a></td>
          </tr>
          <tr>
            <td>Soldering Kit PCB</td>
            <td><a href="documentation/PCB/2020_pierced_heart/index.php">Pierced Heart - 2020</a></td>
          </tr>
          <tr>
            <td>Software</td>
            <td><a href="documentation/Software/STM32_SSD1351_video_player/index.php">STM32 SSD1351 Video/Audio Player</a></td>
          </tr>
          <tr>
            <td>School Project</td>
            <td><a href="documentation/School/ELEC3371Project8/index.php">Final Project - Space Invaders</a></td>
          </tr>
          <tr>
            <td>Library</td>
            <td><a href="documentation/Libraries/e707_b_nodemcu_shield_library/index.html" >E707 Basic NodeMCU-V2 Shield Library</a></td>
          </tr>
        </table>
      </div>
      <br>
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
