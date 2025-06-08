<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
      $file = fopen("Resources/head.txt", "r");
      echo file_get_contents("Resources/head.txt");
      fclose($file);
    ?>
    <link rel="stylesheet" type="text/css" href="css/about.css?v=1.2">

    <title>About me</title>
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
        <p class="description" style="margin-top: 50px;">
          <?php
          $file = fopen("Resources/about_me_text.txt", "r");
          $stuff = file_get_contents("Resources/about_me_text.txt");
          fclose($file);
          $stuff = str_replace("\n\n", "<br>", $stuff);
          echo $stuff
          ?>
        </p>
        
        <p class="description">
          If you want to contact me for any reason, including question and inquiries, please contact me at&nbsp;<a style="color:blue; text-decoration: none;" href="mailto:general@electro707.com">general@electro707.com</a>
        </p>
        
        <p class="description" style="margin-top: 50px; margin-bottom: 5px;">
          I have a public resume available below:
        </p>
        <div id="ResumeStuff">
          <a href="Resources/Resume_Stuff/Resume.pdf" target="_blank" style="grid-column: 2; grid-row: 1"><img alt="Resume" src="Resources/Icons/pdf.png"></a>
          <p style="grid-column: 2; grid-row: 2">Resume</p>
        </div>
        
        <p class="description" style="margin-top: 10px; margin-bottom: 5px;">
          Here are links to some of my socials:
        </p>
        <div id="SocialMedia">
          <a href="https://www.linkedin.com/in/jamal-bouajjaj-93755514a/" target="_blank" style="grid-column: 2; grid-row: 1"><img alt="Linkedin Profile Link" src="Resources/Icons/linkedin.png"></a>
          <a href="https://github.com/Electro707" target="_blank" style="grid-column: 3; grid-row: 1"><img alt="GitHub Profile Link" src="Resources/Icons/github.png"></a>
          <a href="https://gitlab.com/Electro707" target="_blank" style="grid-column: 4; grid-row: 1"><img alt="GitLab Profile Link" src="Resources/Icons/gitlab.png"></a>
          <a href="https://bsky.app/profile/electro707.com" target="_blank" style="grid-column: 5; grid-row: 1"><img alt="Bluesky Profile Link" src="Resources/Icons/bluesky.png"></a>
        </div>
        
        <p class="description" style="margin-top: 10px; margin-bottom: 5px;">
          My public GPG key can be found below:
        </p>
        <div class="SingleImage">
          <a href="Resources/Other_PDF/main_gpg.asc" target="_blank" style="grid-column: 2; grid-row: 1"><img alt="Cool Vaccine" src="Resources/Icons/gpg.png"></a>
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
