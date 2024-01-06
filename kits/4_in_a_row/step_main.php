<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style.css?v=2.1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>4-In-A-Row Kit</title>
    </head>
    
    <body>
        <div id="top_home_div">
            <a href=".">Back</a>
        </div>

        <div class="content_md">
            <h1>Soldering Guide - Main Driver</h1>
            <p>This page guides you through soldering a 4-in-a-row kit's main board, step by step.</p>
            <p>These steps are my recommendation, but feel free to deviate of a certain order is easier for you!</p>
        </div>

        <div id="step_step">
            <figure class="figure">
                <img src="step_drawings/populating_1.png" class="figure-img img-fluid rounded">
                <figcaption class="figure-caption"> We get the empty board</figcaption>
            </figure>
            <figure class="figure">
                <img src="step_drawings/populating_2.png" class="figure-img img-fluid rounded">
                <figcaption class="figure-caption"> I recommend to solder all resistors first, as they are the thinest component and thus you can lay the board down with the resistors populated while soldering. I started with 1kΩ resistors, but you can choose any order</figcaption>
            </figure>
            <figure class="figure">
                <img src="step_drawings/populating_3.png" class="figure-img img-fluid rounded">
                <figcaption class="figure-caption"> Then we solder the next set of resistor values, which are 100Ω</figcaption>
            </figure>
            <figure class="figure">
                <img src="step_drawings/populating_4.png" class="figure-img img-fluid rounded">
                <figcaption class="figure-caption"> Then we solder The top 330Ω resistor</figcaption>
            </figure>
            <figure class="figure">
                <img src="step_drawings/populating_5.png" class="figure-img img-fluid rounded">
                <figcaption class="figure-caption"> Then we populate all 2N3904 transistors</figcaption>
            </figure>
            <figure class="figure">
                <img src="step_drawings/populating_6.png" class="figure-img img-fluid rounded">
                <figcaption class="figure-caption"> We populate the 12pF capacitors for the crystal</figcaption>
            </figure>
            <figure class="figure">
                <img src="step_drawings/populating_7.png" class="figure-img img-fluid rounded">
                <figcaption class="figure-caption"> And then the crystal itself</figcaption>
            </figure>
            <figure class="figure">
                <img src="step_drawings/populating_8.png" class="figure-img img-fluid rounded">
                <figcaption class="figure-caption"> Then we populate the ICs. In this drawing, the ICs are directly shown. THIS IS NOT RECOMMENDED. Instead, use the pin headers, and then push the component into them.</figcaption>
            </figure>
            <figure class="figure">
                <img src="step_drawings/populating_9.png" class="figure-img img-fluid rounded">
                <figcaption class="figure-caption"> Then we populate the switch</figcaption>
            </figure>
            <figure class="figure">
                <img src="step_drawings/populating_10.png" class="figure-img img-fluid rounded">
                <figcaption class="figure-caption"> And the main indicator diode</figcaption>
            </figure>
            <figure class="figure">
                <img src="step_drawings/populating_11.png" class="figure-img img-fluid rounded">
                <figcaption class="figure-caption"> The USB connector</figcaption>
            </figure>
            <figure class="figure">
                <img src="step_drawings/populating_12.png" class="figure-img img-fluid rounded">
                <figcaption class="figure-caption"> Then finally, the side pin sockets that will interconnect to the main board</figcaption>
            </figure>
            <figure class="figure">
                <img src="step_drawings/populating_13.png" class="figure-img img-fluid rounded">
                <figcaption class="figure-caption"> OPTIONALLY, solder U1 if you intend to use an external 7-12v source (such as a 9v battery)</figcaption>
            </figure>
        </div>
    </body>
</html>
