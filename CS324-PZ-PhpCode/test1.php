<?php
include_once('functions.php');
require_once('simple_html_dom.php');
$maticna_naziv = array();
$maticna_url = array();
$maticna_desc = array();
$maticna_img = array();


    $html = file_get_html('http://www.eponuda.com/maticne-ploce/msi-z270-gaming-m5-maticna-ploca-cena-401412');

    foreach ($html->find('img.sl') as $element) {
        echo '<img src="'.$element->src.'">';

    }

    foreach ($html->find('div div div #csksv #SpecCont ul#krkt') as $element) {
        echo $element->plaintext . "</br></br>";

    }

    foreach ($html->find('td.cpc a img') as $element) {
        echo '<img src="'.$element->src.'"></br></br>';

    }


    foreach ($html->find('div#con div div div div#csksv div table tbody tr td b') as $element) {
        echo $element->plaintext. " din </br></br>";
    }

    foreach ($html->find('span.LP a') as $element) {
        echo 'http://www.eponuda.com'.$element->href .'</br></br>';

    }

    ?>
