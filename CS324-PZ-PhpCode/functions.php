<?php
include("config.php");


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
    die();
}

function add_mat_ploce($naziv,$url,$desc,$img){

    global $conn;
    $rarray = array();
        $stmt = $conn->prepare("INSERT INTO mat_ploce (naziv,url,descr,img) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$naziv,$url,$desc,$img);
        if($stmt->execute()){
            $rarray['success'] = 'ok';
        }else{
            $rarray['error'] = "Databse connection error";
        }
    return $rarray;

}

function add_laptopovi($naziv,$url,$desc,$img){

    global $conn;
    $rarray = array();
        $stmt = $conn->prepare("INSERT INTO laptopovi (naziv,url,descr,img) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$naziv,$url,$desc,$img);
        if($stmt->execute()){
            $rarray['success'] = 'ok';
        }else{
            $rarray['error'] = "Databse connection error";
        }
    return $rarray;

}
function izbrisi_laptopovi(){
	global $conn;
	$query = "TRUNCATE TABLE laptopovi";
	$res = mysqli_query($conn, $query);
	if($res){

	}else{

	}

}
function get_laptopovi(){
    require_once('simple_html_dom.php');

    global $conn;
    $sql = "SELECT * FROM laptopovi";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $a = str_replace("specifikacija"," ",$row['descr']);
            echo "<h4 class='bg-primary'>&nbsp;".$row["naziv"]."</h4>";
            echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
            echo '<span>'. $a ."</span><br>";
            echo "<div class='col-sm-12'>";
            echo '<img src="'.$row["img"].'"><br/>';
            echo "<div class='col-sm-4'>";
            echo "<p><strong>Prodavnica</strong></p></div> <div class='col-sm-4'><p><strong>Cena</strong></p></div><div class='col-sm-4'><p><strong>Link ka prodavnici</strong></p></div>";
            echo "<div class='col-sm-4'>";

            $html = file_get_html("http://www.eponuda.com".$row['url']);

            foreach ($html->find('td.cpc a img') as $element) {
                echo '<img src="'.$element->src.'" class="oop"></br>';

            }
            echo "</div>";

            echo "<div class='col-sm-4'>";
            foreach ($html->find('div#con div div div div#csksv div table tbody tr td b') as $element) {
                echo $element->plaintext. " din </br></br>";
            }
            echo "</div>";
            echo "<div class='col-sm-4'>";

            foreach ($html->find('span.LP a') as $element) {
                echo '<a href="http://www.eponuda.com'.$element->href .'"> Link </a></br></br>';

            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();

}

function izbrisi_mat_ploce(){
	global $conn;
	$query = "TRUNCATE TABLE mat_ploce";
	$res = mysqli_query($conn, $query);
	if($res){

	}else{

	}

}



/*
echo '&nbsp;&nbsp; |&nbsp;&nbsp; <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Specifikacije</button>&nbsp;&nbsp; |&nbsp;&nbsp; <button type="button" class="btn btn-danger">Cene</button>';
echo '<div id="demo" class="collpse"'
*/
function getMat_ploce()
{
    require_once('simple_html_dom.php');

    global $conn;
    $sql = "SELECT * FROM mat_ploce";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $a = str_replace("specifikacija"," ",$row['descr']);
            echo "<h4 class='bg-primary'>&nbsp;".$row["naziv"]."</h4>";
            echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
            echo '<span>'. $a ."</span><br>";
            echo "<div class='col-sm-12'>";
            echo '<img src="'.$row["img"].'"><br/>';
            echo "<div class='col-sm-4'>";
            echo "<p><strong>Prodavnica</strong></p></div> <div class='col-sm-4'><p><strong>Cena</strong></p></div><div class='col-sm-4'><p><strong>Link ka prodavnici</strong></p></div>";
            echo "<div class='col-sm-4'>";
			
            $html = file_get_html("http://www.eponuda.com".$row['url']);

            foreach ($html->find('td.cpc a img') as $element) {
                echo '<img src="'.$element->src.'" class="oop"></br>';
				
            }
            echo "</div>";

            echo "<div class='col-sm-4'>";
            foreach ($html->find('div#con div div div div#csksv div table tbody tr td b') as $element) {
                echo $element->plaintext. " din </br></br>";
            }
            echo "</div>";
            echo "<div class='col-sm-4'>";

            foreach ($html->find('span.LP a') as $element) {
                echo '<a href="http://www.eponuda.com'.$element->href .'"> Link </a></br></br>';

            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();



}
function add_procesor($naziv,$url,$desc,$img){

    global $conn;
    $rarray = array();
        $stmt = $conn->prepare("INSERT INTO procesori (naziv,url,descr,img) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$naziv,$url,$desc,$img);
        if($stmt->execute()){
            $rarray['success'] = 'ok';
        }else{
            $rarray['error'] = "Databse connection error";
        }
    return $rarray;

}
function izbrisi_procesori(){
	global $conn;
	$query = "TRUNCATE TABLE procesori";
	$res = mysqli_query($conn, $query);
	if($res){

	}else{

	}

}
function getProcesor()
{
    require_once('simple_html_dom.php');

    global $conn;
    $sql = "SELECT * FROM procesori";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $a = str_replace("specifikacija"," ",$row['descr']);
            echo "<h4 class='bg-primary'>&nbsp;".$row["naziv"]."</h4>";
            echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
            echo '<span>'. $a ."</span><br>";
            echo "<div class='col-sm-12'>";
            echo '<img src="'.$row["img"].'"><br/>';
            echo "<div class='col-sm-4'>";
            echo "<p><strong>Prodavnica</strong></p></div> <div class='col-sm-4'><p><strong>Cena</strong></p></div><div class='col-sm-4'><p><strong>Link ka prodavnici</strong></p></div>";
            echo "<div class='col-sm-4'>";

            $html = file_get_html("http://www.eponuda.com".$row['url']);

            foreach ($html->find('td.cpc a img') as $element) {
                echo '<img src="'.$element->src.'" class="oop"></br>';

            }
            echo "</div>";

            echo "<div class='col-sm-4'>";
            foreach ($html->find('div#con div div div div#csksv div table tbody tr td b') as $element) {
                echo $element->plaintext. " din </br></br>";
            }
            echo "</div>";
            echo "<div class='col-sm-4'>";

            foreach ($html->find('span.LP a') as $element) {
                echo '<a href="http://www.eponuda.com'.$element->href .'"> Link </a></br></br>';

            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();



}

function add_hard_disk($naziv,$url,$desc,$img){

    global $conn;
    $rarray = array();
        $stmt = $conn->prepare("INSERT INTO hard_disk (naziv,url,descr,img) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$naziv,$url,$desc,$img);
        if($stmt->execute()){
            $rarray['success'] = 'ok';
        }else{
            $rarray['error'] = "Databse connection error";
        }
    return $rarray;

}
function izbrisi_hard_disk(){
	global $conn;
	$query = "TRUNCATE TABLE hard_disk";
	$res = mysqli_query($conn, $query);
	if($res){

	}else{

	}

}
function getHard_disk()
{
    require_once('simple_html_dom.php');

    global $conn;
    $sql = "SELECT * FROM hard_disk";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $a = str_replace("specifikacija"," ",$row['descr']);
            echo "<h4 class='bg-primary'>&nbsp;".$row["naziv"]."</h4>";
            echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
            echo '<span>'. $a ."</span><br>";
            echo "<div class='col-sm-12'>";
            echo '<img src="'.$row["img"].'"><br/>';
            echo "<div class='col-sm-4'>";
            echo "<p><strong>Prodavnica</strong></p></div> <div class='col-sm-4'><p><strong>Cena</strong></p></div><div class='col-sm-4'><p><strong>Link ka prodavnici</strong></p></div>";
            echo "<div class='col-sm-4'>";

            $html = file_get_html("http://www.eponuda.com".$row['url']);

            foreach ($html->find('td.cpc a img') as $element) {
                echo '<img src="'.$element->src.'" class="oop"></br>';

            }
            echo "</div>";

            echo "<div class='col-sm-4'>";
            foreach ($html->find('div#con div div div div#csksv div table tbody tr td b') as $element) {
                echo $element->plaintext. " din </br></br>";
            }
            echo "</div>";
            echo "<div class='col-sm-4'>";

            foreach ($html->find('span.LP a') as $element) {
                echo '<a href="http://www.eponuda.com'.$element->href .'"> Link </a></br></br>';

            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();



}

function add_graf_kartice($naziv,$url,$desc,$img){

    global $conn;
    $rarray = array();
        $stmt = $conn->prepare("INSERT INTO graf_kartice (naziv,url,descr,img) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$naziv,$url,$desc,$img);
        if($stmt->execute()){
            $rarray['success'] = 'ok';
        }else{
            $rarray['error'] = "Databse connection error";
        }
    return $rarray;

}
function izbrisi_graf_kartice(){
	global $conn;
	$query = "TRUNCATE TABLE graf_kartice";
	$res = mysqli_query($conn, $query);
	if($res){

	}else{

	}

}
function getGraf_kartice()
{
    require_once('simple_html_dom.php');

    global $conn;
    $sql = "SELECT * FROM graf_kartice";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $a = str_replace("specifikacija"," ",$row['descr']);
            echo "<h4 class='bg-primary'>&nbsp;".$row["naziv"]."</h4>";
            echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
            echo '<span>'. $a ."</span><br>";
            echo "<div class='col-sm-12'>";
            echo '<img src="'.$row["img"].'"><br/>';
            echo "<div class='col-sm-4'>";
            echo "<p><strong>Prodavnica</strong></p></div> <div class='col-sm-4'><p><strong>Cena</strong></p></div><div class='col-sm-4'><p><strong>Link ka prodavnici</strong></p></div>";
            echo "<div class='col-sm-4'>";

            $html = file_get_html("http://www.eponuda.com".$row['url']);

            foreach ($html->find('td.cpc a img') as $element) {
                echo '<img src="'.$element->src.'" class="oop"></br>';

            }
            echo "</div>";

            echo "<div class='col-sm-4'>";
            foreach ($html->find('div#con div div div div#csksv div table tbody tr td b') as $element) {
                echo $element->plaintext. " din </br></br>";
            }
            echo "</div>";
            echo "<div class='col-sm-4'>";

            foreach ($html->find('span.LP a') as $element) {
                echo '<a href="http://www.eponuda.com'.$element->href .'"> Link </a></br></br>';

            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();



}
function add_ssd_disk($naziv,$url,$desc,$img){

    global $conn;
    $rarray = array();
        $stmt = $conn->prepare("INSERT INTO ssd_diskovi (naziv,url,descr,img) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$naziv,$url,$desc,$img);
        if($stmt->execute()){
            $rarray['success'] = 'ok';
        }else{
            $rarray['error'] = "Databse connection error";
        }
    return $rarray;

}
function izbrisi_ssd_disk(){
	global $conn;
	$query = "TRUNCATE TABLE ssd_diskovi";
	$res = mysqli_query($conn, $query);
	if($res){

	}else{

	}

}
function getSsd_disk()
{
    require_once('simple_html_dom.php');

    global $conn;
    $sql = "SELECT * FROM ssd_diskovi";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $a = str_replace("specifikacija"," ",$row['descr']);
            echo "<h4 class='bg-primary'>&nbsp;".$row["naziv"]."</h4>";
            echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
            echo '<span>'. $a ."</span><br>";
            echo "<div class='col-sm-12'>";
            echo '<img src="'.$row["img"].'"><br/>';
            echo "<div class='col-sm-4'>";
            echo "<p><strong>Prodavnica</strong></p></div> <div class='col-sm-4'><p><strong>Cena</strong></p></div><div class='col-sm-4'><p><strong>Link ka prodavnici</strong></p></div>";
            echo "<div class='col-sm-4'>";

            $html = file_get_html("http://www.eponuda.com".$row['url']);

            foreach ($html->find('td.cpc a img') as $element) {
                echo '<img src="'.$element->src.'" class="oop"></br>';

            }
            echo "</div>";

            echo "<div class='col-sm-4'>";
            foreach ($html->find('div#con div div div div#csksv div table tbody tr td b') as $element) {
                echo $element->plaintext. " din </br></br>";
            }
            echo "</div>";
            echo "<div class='col-sm-4'>";

            foreach ($html->find('span.LP a') as $element) {
                echo '<a href="http://www.eponuda.com'.$element->href .'"> Link </a></br></br>';

            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();



}

function add_eksterni_hard($naziv,$url,$desc,$img){

    global $conn;
    $rarray = array();
        $stmt = $conn->prepare("INSERT INTO eksterni_hard_diskovi (naziv,url,descr,img) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$naziv,$url,$desc,$img);
        if($stmt->execute()){
            $rarray['success'] = 'ok';
        }else{
            $rarray['error'] = "Databse connection error";
        }
    return $rarray;

}
function izbrisi_eksterni_hard(){
	global $conn;
	$query = "TRUNCATE TABLE eksterni_hard_diskovi";
	$res = mysqli_query($conn, $query);
	if($res){

	}else{

	}

}
function getEksterni_hard()
{
    require_once('simple_html_dom.php');

    global $conn;
    $sql = "SELECT * FROM eksterni_hard_diskovi";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $a = str_replace("specifikacija"," ",$row['descr']);
            echo "<h4 class='bg-primary'>&nbsp;".$row["naziv"]."</h4>";
            echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
            echo '<span>'. $a ."</span><br>";
            echo "<div class='col-sm-12'>";
            echo '<img src="'.$row["img"].'"><br/>';
            echo "<div class='col-sm-4'>";
            echo "<p><strong>Prodavnica</strong></p></div> <div class='col-sm-4'><p><strong>Cena</strong></p></div><div class='col-sm-4'><p><strong>Link ka prodavnici</strong></p></div>";
            echo "<div class='col-sm-4'>";

            $html = file_get_html("http://www.eponuda.com".$row['url']);

            foreach ($html->find('td.cpc a img') as $element) {
                echo '<img src="'.$element->src.'" class="oop"></br>';

            }
            echo "</div>";

            echo "<div class='col-sm-4'>";
            foreach ($html->find('div#con div div div div#csksv div table tbody tr td b') as $element) {
                echo $element->plaintext. " din </br></br>";
            }
            echo "</div>";
            echo "<div class='col-sm-4'>";

            foreach ($html->find('span.LP a') as $element) {
                echo '<a href="http://www.eponuda.com'.$element->href .'"> Link </a></br></br>';

            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();



}
function add_ram_memorija($naziv,$url,$desc,$img){

    global $conn;
    $rarray = array();
        $stmt = $conn->prepare("INSERT INTO ram_memorija (naziv,url,descr,img) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$naziv,$url,$desc,$img);
        if($stmt->execute()){
            $rarray['success'] = 'ok';
        }else{
            $rarray['error'] = "Databse connection error";
        }
    return $rarray;

}
function izbrisi_ram_memorija(){
	global $conn;
	$query = "TRUNCATE TABLE ram_memorija";
	$res = mysqli_query($conn, $query);
	if($res){

	}else{

	}
}
function getRam_memorija()
{
    require_once('simple_html_dom.php');

    global $conn;
    $sql = "SELECT * FROM ram_memorija";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $a = str_replace("specifikacija"," ",$row['descr']);
            echo "<h4 class='bg-primary'>&nbsp;".$row["naziv"]."</h4>";
            echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
            echo '<span>'. $a ."</span><br>";
            echo "<div class='col-sm-12'>";
            echo '<img src="'.$row["img"].'"><br/>';
            echo "<div class='col-sm-4'>";
            echo "<p><strong>Prodavnica</strong></p></div> <div class='col-sm-4'><p><strong>Cena</strong></p></div><div class='col-sm-4'><p><strong>Link ka prodavnici</strong></p></div>";
            echo "<div class='col-sm-4'>";

            $html = file_get_html("http://www.eponuda.com".$row['url']);

            foreach ($html->find('td.cpc a img') as $element) {
                echo '<img src="'.$element->src.'" class="oop"></br>';

            }
            echo "</div>";

            echo "<div class='col-sm-4'>";
            foreach ($html->find('div#con div div div div#csksv div table tbody tr td b') as $element) {
                echo $element->plaintext. " din </br></br>";
            }
            echo "</div>";
            echo "<div class='col-sm-4'>";

            foreach ($html->find('span.LP a') as $element) {
                echo '<a href="http://www.eponuda.com'.$element->href .'"> Link </a></br></br>';

            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();



}

function add_kucista($naziv,$url,$desc,$img){

    global $conn;
    $rarray = array();
        $stmt = $conn->prepare("INSERT INTO kucista (naziv,url,descr,img) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$naziv,$url,$desc,$img);
        if($stmt->execute()){
            $rarray['success'] = 'ok';
        }else{
            $rarray['error'] = "Databse connection error";
        }
    return $rarray;

}
function izbrisi_kucista(){
	global $conn;
	$query = "TRUNCATE TABLE kucista";
	$res = mysqli_query($conn, $query);
	if($res){

	}else{

	}

}
function getKucista()
{
    require_once('simple_html_dom.php');

    global $conn;
    $sql = "SELECT * FROM kucista";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $a = str_replace("specifikacija"," ",$row['descr']);
            echo "<h4 class='bg-primary'>&nbsp;".$row["naziv"]."</h4>";
            echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
            echo '<span>'. $a ."</span><br>";
            echo "<div class='col-sm-12'>";
            echo '<img src="'.$row["img"].'"><br/>';
            echo "<div class='col-sm-4'>";
            echo "<p><strong>Prodavnica</strong></p></div> <div class='col-sm-4'><p><strong>Cena</strong></p></div><div class='col-sm-4'><p><strong>Link ka prodavnici</strong></p></div>";
            echo "<div class='col-sm-4'>";

            $html = file_get_html("http://www.eponuda.com".$row['url']);

            foreach ($html->find('td.cpc a img') as $element) {
                echo '<img src="'.$element->src.'" class="oop"></br>';

            }
            echo "</div>";

            echo "<div class='col-sm-4'>";
            foreach ($html->find('div#con div div div div#csksv div table tbody tr td b') as $element) {
                echo $element->plaintext. " din </br></br>";
            }
            echo "</div>";
            echo "<div class='col-sm-4'>";

            foreach ($html->find('span.LP a') as $element) {
                echo '<a href="http://www.eponuda.com'.$element->href .'"> Link </a></br></br>';

            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();



}

function add_napajanje($naziv,$url,$desc,$img){

    global $conn;
    $rarray = array();
        $stmt = $conn->prepare("INSERT INTO napajanje (naziv,url,descr,img) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$naziv,$url,$desc,$img);
        if($stmt->execute()){
            $rarray['success'] = 'ok';
        }else{
            $rarray['error'] = "Databse connection error";
        }
    return $rarray;

}
function izbrisi_napajanje(){
	global $conn;
	$query = "TRUNCATE TABLE napajanje";
	$res = mysqli_query($conn, $query);
	if($res){

	}else{

	}

}
function getNapajanje()
{
    require_once('simple_html_dom.php');

    global $conn;
    $sql = "SELECT * FROM napajanje";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $a = str_replace("specifikacija"," ",$row['descr']);
            echo "<h4 class='bg-primary'>&nbsp;".$row["naziv"]."</h4>";
            echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
            echo '<span>'. $a ."</span><br>";
            echo "<div class='col-sm-12'>";
            echo '<img src="'.$row["img"].'"><br/>';
            echo "<div class='col-sm-4'>";
            echo "<p><strong>Prodavnica</strong></p></div> <div class='col-sm-4'><p><strong>Cena</strong></p></div><div class='col-sm-4'><p><strong>Link ka prodavnici</strong></p></div>";
            echo "<div class='col-sm-4'>";

            $html = file_get_html("http://www.eponuda.com".$row['url']);

            foreach ($html->find('td.cpc a img') as $element) {
                echo '<img src="'.$element->src.'" class="oop"></br>';

            }
            echo "</div>";

            echo "<div class='col-sm-4'>";
            foreach ($html->find('div#con div div div div#csksv div table tbody tr td b') as $element) {
                echo $element->plaintext. " din </br></br>";
            }
            echo "</div>";
            echo "<div class='col-sm-4'>";

            foreach ($html->find('span.LP a') as $element) {
                echo '<a href="http://www.eponuda.com'.$element->href .'"> Link </a></br></br>';

            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();



}

function add_monitor($naziv,$url,$desc,$img){

    global $conn;
    $rarray = array();
        $stmt = $conn->prepare("INSERT INTO monitor (naziv,url,descr,img) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$naziv,$url,$desc,$img);
        if($stmt->execute()){
            $rarray['success'] = 'ok';
        }else{
            $rarray['error'] = "Databse connection error";
        }
    return $rarray;

}
function izbrisi_monitor(){
	global $conn;
	$query = "TRUNCATE TABLE monitor";
	$res = mysqli_query($conn, $query);
	if($res){

	}else{

	}

}
function getMonitor()
{
    require_once('simple_html_dom.php');

    global $conn;
    $sql = "SELECT * FROM monitor";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $a = str_replace("specifikacija"," ",$row['descr']);
            echo "<h4 class='bg-primary'>&nbsp;".$row["naziv"]."</h4>";
            echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
            echo '<span>'. $a ."</span><br>";
            echo "<div class='col-sm-12'>";
            echo '<img src="'.$row["img"].'"><br/>';
            echo "<div class='col-sm-4'>";
            echo "<p><strong>Prodavnica</strong></p></div> <div class='col-sm-4'><p><strong>Cena</strong></p></div><div class='col-sm-4'><p><strong>Link ka prodavnici</strong></p></div>";
            echo "<div class='col-sm-4'>";

            $html = file_get_html("http://www.eponuda.com".$row['url']);

            foreach ($html->find('td.cpc a img') as $element) {
                echo '<img src="'.$element->src.'" class="oop"></br>';

            }
            echo "</div>";

            echo "<div class='col-sm-4'>";
            foreach ($html->find('div#con div div div div#csksv div table tbody tr td b') as $element) {
                echo $element->plaintext. " din </br></br>";
            }
            echo "</div>";
            echo "<div class='col-sm-4'>";

            foreach ($html->find('span.LP a') as $element) {
                echo '<a href="http://www.eponuda.com'.$element->href .'"> Link </a></br></br>';

            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();



}


function add_mis($naziv,$url,$desc,$img){

    global $conn;
    $rarray = array();
        $stmt = $conn->prepare("INSERT INTO misevi (naziv,url,descr,img) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$naziv,$url,$desc,$img);
        if($stmt->execute()){
            $rarray['success'] = 'ok';
        }else{
            $rarray['error'] = "Databse connection error";
        }
    return $rarray;

}
function izbrisi_mis(){
	global $conn;
	$query = "TRUNCATE TABLE misevi";
	$res = mysqli_query($conn, $query);
	if($res){

	}else{

	}

}
function getMis()
{
    require_once('simple_html_dom.php');

    global $conn;
    $sql = "SELECT * FROM misevi";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $a = str_replace("specifikacija"," ",$row['descr']);
            echo "<h4 class='bg-primary'>&nbsp;".$row["naziv"]."</h4>";
            echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
            echo '<span>'. $a ."</span><br>";
            echo "<div class='col-sm-12'>";
            echo '<img src="'.$row["img"].'"><br/>';
            echo "<div class='col-sm-4'>";
            echo "<p><strong>Prodavnica</strong></p></div> <div class='col-sm-4'><p><strong>Cena</strong></p></div><div class='col-sm-4'><p><strong>Link ka prodavnici</strong></p></div>";
            echo "<div class='col-sm-4'>";

            $html = file_get_html("http://www.eponuda.com".$row['url']);

            foreach ($html->find('td.cpc a img') as $element) {
                echo '<img src="'.$element->src.'" class="oop"></br>';

            }
            echo "</div>";

            echo "<div class='col-sm-4'>";
            foreach ($html->find('div#con div div div div#csksv div table tbody tr td b') as $element) {
                echo $element->plaintext. " din </br></br>";
            }
            echo "</div>";
            echo "<div class='col-sm-4'>";

            foreach ($html->find('span.LP a') as $element) {
                echo '<a href="http://www.eponuda.com'.$element->href .'"> Link </a></br></br>';

            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();



}
function add_tastatura($naziv,$url,$desc,$img){

    global $conn;
    $rarray = array();
        $stmt = $conn->prepare("INSERT INTO tastature (naziv,url,descr,img) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$naziv,$url,$desc,$img);
        if($stmt->execute()){
            $rarray['success'] = 'ok';
        }else{
            $rarray['error'] = "Databse connection error";
        }
    return $rarray;

}
function izbrisi_tastatura(){
	global $conn;
	$query = "TRUNCATE TABLE tastature";
	$res = mysqli_query($conn, $query);
	if($res){

	}else{

	}

}
function getTastatura()
{
    require_once('simple_html_dom.php');

    global $conn;
    $sql = "SELECT * FROM tastature";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $a = str_replace("specifikacija"," ",$row['descr']);
            echo "<h4 class='bg-primary'>&nbsp;".$row["naziv"]."</h4>";
            echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
            echo '<span>'. $a ."</span><br>";
            echo "<div class='col-sm-12'>";
            echo '<img src="'.$row["img"].'"><br/>';
            echo "<div class='col-sm-4'>";
            echo "<p><strong>Prodavnica</strong></p></div> <div class='col-sm-4'><p><strong>Cena</strong></p></div><div class='col-sm-4'><p><strong>Link ka prodavnici</strong></p></div>";
            echo "<div class='col-sm-4'>";

            $html = file_get_html("http://www.eponuda.com".$row['url']);

            foreach ($html->find('td.cpc a img') as $element) {
                echo '<img src="'.$element->src.'" class="oop"></br>';

            }
            echo "</div>";

            echo "<div class='col-sm-4'>";
            foreach ($html->find('div#con div div div div#csksv div table tbody tr td b') as $element) {
                echo $element->plaintext. " din </br></br>";
            }
            echo "</div>";
            echo "<div class='col-sm-4'>";

            foreach ($html->find('span.LP a') as $element) {
                echo '<a href="http://www.eponuda.com'.$element->href .'"> Link </a></br></br>';

            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();



}

function add_racunar($naziv,$url,$desc,$img){

    global $conn;
    $rarray = array();
        $stmt = $conn->prepare("INSERT INTO racunari (naziv,url,descr,img) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$naziv,$url,$desc,$img);
        if($stmt->execute()){
            $rarray['success'] = 'ok';
        }else{
            $rarray['error'] = "Databse connection error";
        }
    return $rarray;

}
function izbrisi_racunar(){
	global $conn;
	$query = "TRUNCATE TABLE racunari";
	$res = mysqli_query($conn, $query);
	if($res){

	}else{

	}

}
function getRacunar()
{
    require_once('simple_html_dom.php');

    global $conn;
    $sql = "SELECT * FROM racunari";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $a = str_replace("specifikacija"," ",$row['descr']);
            echo "<h4 class='bg-primary'>&nbsp;".$row["naziv"]."</h4>";
            echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
            echo '<span>'. $a ."</span><br>";
            echo "<div class='col-sm-12'>";
            echo '<img src="'.$row["img"].'"><br/>';
            echo "<div class='col-sm-4'>";
            echo "<p><strong>Prodavnica</strong></p></div> <div class='col-sm-4'><p><strong>Cena</strong></p></div><div class='col-sm-4'><p><strong>Link ka prodavnici</strong></p></div>";
            echo "<div class='col-sm-4'>";

            $html = file_get_html("http://www.eponuda.com".$row['url']);

            foreach ($html->find('td.cpc a img') as $element) {
                echo '<img src="'.$element->src.'" class="oop"></br>';

            }
            echo "</div>";

            echo "<div class='col-sm-4'>";
            foreach ($html->find('div#con div div div div#csksv div table tbody tr td b') as $element) {
                echo $element->plaintext. " din </br></br>";
            }
            echo "</div>";
            echo "<div class='col-sm-4'>";

            foreach ($html->find('span.LP a') as $element) {
                echo '<a href="http://www.eponuda.com'.$element->href .'"> Link </a></br></br>';

            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();



}
?>
