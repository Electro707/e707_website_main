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
        <p class="centerp">Note that all soldering projects are in my <a href="https://kits.electro707.com">kits site!</a></p>
        <br>
        <table>
          <tr class="toprow">
            <td style="width: 30%;">Type</td>
            <td>Name + Link</td>
          </tr>
          <tr>
            <td>Library</td>
            <td><a href="documentation/Libraries/simple_led_library/stable/index.html" >Simple LED Matrix Arduino Library</a></td>
          </tr>
          <tr>
            <td>Python Application</td>
            <td><a href="https://e7epd.readthedocs.io" >E707 Parts Database Project</a></td>
          </tr>
          <tr>
            <td>Software</td>
            <td><a href="documentation/Software/STM32_SSD1351_video_player/index.php">STM32 SSD1351 Video/Audio Player</a></td>
          </tr>
          <tr>
            <td>School Project</td>
            <td><a href="documentation/School/ELEC3371Project8/index.php">Embedded Systems Final Project - Space Invaders</a></td>
          </tr>
          <tr>
            <td>School Project</td>
            <td><a href="documentation/School/JuniorDesignProject/index.php">Junior Design Project - LIFI Transmission</a></td>
          </tr>
          <tr>
            <td>Library</td>
            <td><a href="documentation/Libraries/e707_b_nodemcu_shield_library/index.html">E707 Basic NodeMCU-V2 Shield Library</a></td>
          </tr>
          <tr>
            <td>Software</td>
            <td><a href="https://e7epd.readthedocs.io">E707 Electronics Parts Management Database</a></td>
          </tr>
          <tr>
            <td>Software</td>
            <td><a href="https://pynec-utilities.readthedocs.io">PyNEC Utilities</a></td>
          </tr>
          <tr>
            <td>Project</td>
            <td><a href="https://github.com/Electro707/camera_remote_shutter">Remote Camera Shutter</a></td>
          </tr>
          <tr>
            <td>Project</td>
            <td><a href="https://github.com/Electro707/eink_name_tag">E-Ink Name Tag</a></td>
          </tr>
          <tr>
            <td>School Project</td>
            <td><a href="documentation/School/SeniorDesign/index.php">Senior Design Project: HF Band Characterization</a></td>
          </tr>
          <tr>
            <td>Project</td>
            <td><a href="https://github.com/Electro707/arcade_led_matrix_enclosure">Stacker Game Arcade</a></td>
          </tr>
          <tr>
            <td>Project</td>
            <td><a href="https://github.com/Electro707/addressable_led_controller">Addressable LED Strip Controller</a></td>
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
