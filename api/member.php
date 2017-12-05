<?php
header('Access-Control-Allow-Origin: *');
error_reporting(E_ALL ^ E_DEPRECATED);
 $servername = "localhost";
 $username = "herwinti_nitip";
 $password = "Nitip1234";
 $dbname = "herwinti_nitip";
mysql_connect($servername, $username, $password) or
    die("Could not connect: " . mysql_error());
mysql_select_db($dbname);

$idmember = $_GET['id'];
$items_1 = mysql_query("SELECT * FROM members where memberID =".$idmember);

$text = "";
$nama = "";
$imgsrc = "";

while( $row_1 = mysql_fetch_array( $items_1,MYSQLI_ASSOC ) ) {

    $text .= "<div class='details-img'>";
    $text .= "<img class='img-circle border-effect1' src='http://herwintika.id/nitip/userfiles/profile-pic/$row_1[profPic]' alt='' width='125' height='125' style='
    background-color: white;'/>";
    $text .= "</div>";
    $text .= "<h3>$row_1[username]</h3>";
    $text .= "<span>Id Number : $row_1[memberID]</span>";
    $text .= "<p>$row_1[firstname] $row_1[lastname]<br> <i>$row_1[email]</i></p>";

    $imgsrc .= "http://herwintika.id/nitip/userfiles/profile-pic/$row_1[profPic]";
    $nama .= "<h3>$row_1[firstname] $row_1[lastname]</h3>";

	// $text .= "<div class='container' style='margin-bottom: 10px;padding-bottom: 10px;'>";
	// $text .= "<p>$row_1[firstname] $row_1[lastname]</p>";            
	// $text .= "<img src='http://herwintika.id/nitip/userfiles/profile-pic/$row_1[profPic]' class='img-thumbnail' alt=''  width='50' height='50'>"; 
	// $text .= "</div>";
	// $text .= "<h5>Id Number : $row_1[memberID]</h5>";

    // $text .= "<li><div class='partners-item'>"
    // $text .= "<a href='http://herwintika.id/nitip/www/detail_request.html?id=$row_1[reqID]'><img id='imagitem' src='' alt=''  width='50' height='50' />";
    // $text .= "<span class='caption'> $row_1[firstname] - $row_1[cityRequest] <br> Rp. ";
    // $text .= number_format($row_1['pay'],2,",",".");
    // $text .= "</span>";
    
    // $text .= "</a></div></li>";
}
$tmp = array();
$tmp['Detail'] = $text;
$tmp['Src'] = $imgsrc;
$tmp['NamaUser'] = $nama;

$data = "{\"Data_Member\" : ".json_encode($tmp)."}";
echo $data;
?>