<?php

include('functions.php');
require('simple_html_dom.php');
$ram_memorija_naziv = array();
$ram_memorija_url = array();
$ram_memorija_desc = array();
$ram_memorija_img = array();
izbrisi_ram_memorija();

for($x = 1; $x < 2; $x++) {

    $html = file_get_html('http://www.eponuda.com/ram-memorija-cene'.'/'.$x);

    foreach ($html->find('div div h2 span') as $element) {
        array_push($ram_memorija_naziv,$element->plaintext);

    }

    foreach ($html->find('div div div div div div div h2 a') as $element) {
        array_push($ram_memorija_url,$element->href);
    }

    foreach ($html->find('div.descr') as $element) {
        array_push($ram_memorija_desc,$element->plaintext);
    }

    foreach ($html->find('img.pr_pics') as $element) {
        array_push($ram_memorija_img,$element->src);
    }



}
$arr_len = count($ram_memorija_naziv);
for($y = 0; $y < $arr_len; $y++){
    add_ram_memorija($ram_memorija_naziv[$y],$ram_memorija_url[$y],$ram_memorija_desc[$y],$ram_memorija_img[$y]);

}



?>
<!DOCTYPE html>
<html>
<head>
    <title>CS324 - Website</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="jumbotron text-center bck">
    <a href="index.php"><h1>Dobrodošli</h1></a>
    <div class="container">
        <div class="row">

        </div>
    </div>
</div>

<div class="container">
    <div class="row text-center">
        <h1><strong>Ram memorija</strong></h1>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php
            getRam_memorija();
            ?>
        </div>

    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
