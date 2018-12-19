<?php

include('functions.php');
require('simple_html_dom.php');
$laptop_naziv = array();
$laptop_url = array();
$laptop_desc = array();
$laptop_img = array();
izbrisi_laptopovi();

for($x = 1; $x < 2; $x++) {

    $html = file_get_html('http://www.eponuda.com/laptopovi-cene'.'/'.$x);

    foreach ($html->find('div div h2 span') as $element) {
        array_push($laptop_naziv,$element->plaintext);

    }

    foreach ($html->find('div div div div div div div h2 a') as $element) {
        array_push($laptop_url,$element->href);
    }

    foreach ($html->find('div.descr') as $element) {
        array_push($laptop_desc,$element->plaintext);
    }

    foreach ($html->find('img.pr_pics') as $element) {
        array_push($laptop_img,$element->src);
    }



}
$arr_len = count($laptop_naziv);
for($y = 0; $y < $arr_len; $y++){
    add_laptopovi($laptop_naziv[$y],$laptop_url[$y],$laptop_desc[$y],$laptop_img[$y]);

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
        <h1><strong>Laptopovi</strong></h1>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php
            get_laptopovi();
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
