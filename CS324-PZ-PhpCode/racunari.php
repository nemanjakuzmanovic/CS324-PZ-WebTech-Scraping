<?php

include('functions.php');
require('simple_html_dom.php');
$racunar_naziv = array();
$racunar_url = array();
$racunar_desc = array();
$racunar_img = array();
izbrisi_racunar();

for($x = 1; $x < 2; $x++) {

    $html = file_get_html('http://www.eponuda.com/racunari-cene'.'/'.$x);

    foreach ($html->find('div div h2 span') as $element) {
        array_push($racunar_naziv,$element->plaintext);

    }

    foreach ($html->find('div div div div div div div h2 a') as $element) {
        array_push($racunar_url,$element->href);
    }

    foreach ($html->find('div.descr') as $element) {
        array_push($racunar_desc,$element->plaintext);
    }

    foreach ($html->find('img.pr_pics') as $element) {
        array_push($racunar_img,$element->src);
    }



}
$arr_len = count($racunar_naziv);
for($y = 0; $y < $arr_len; $y++){
    add_racunar($racunar_naziv[$y],$racunar_url[$y],$racunar_desc[$y],$racunar_img[$y]);

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
        <h1><strong>Računari</strong></h1>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php
            getRacunar();
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
