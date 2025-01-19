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
            <p class="centerp">Click on a project name to go to the project's page.</p>
            <p class="centerp">Some project start with a part number Pxxxx</p>
            <p class="centerp">Note that all soldering projects are not in this list, and are instead hosted on <a style='text-decoration: underline;' href="https://kits.electro707.com">my kits site!</a></p>
            <br>
            <table>
                <tr>
                    <th style="width: 30%;">Type</th>
                    <th>Name</th>
                </tr>
                <?php
                    $projectFile = "Resources/projectList.csv";
                    $file = fopen($projectFile, "r");
                    while(!feof($file)){
                        $row = fgetcsv($file);
                        if($row == false){continue;}
                        if(count($row) != 3){continue;}
                        echo "<tr>";
                        echo "<td style=\"width: 30%;\">" . $row[1] . "</td>";
                        echo "<td><a href=\"" . $row[2] . "\"><div>" . $row[0] ."</div></a></td>";
                        echo "</tr>";
                    }
                    fclose($file);
                ?>
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
