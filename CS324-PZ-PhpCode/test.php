<?php
require('simple_html_dom.php');



    echo '&nbsp;&nbsp; |&nbsp;&nbsp; <button class="btn btn-info" data-toggle="collapse" data-target="#demo">Specifikacije</button><div id="demo" class="collapse"> LOL </div>';

    $html = file_get_html('http://www.eponuda.com/maticne-ploce/msi-z270-gaming-m5-maticna-ploca-cena-401412');
    foreach ($html->find('div div div div#csksv div table tbody tr') as $element) {
        print_r($element->plaintext);
    }




?>