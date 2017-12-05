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
$query=mysql_query("SELECT * from request where reqID=".$_GET['id']);
$data = mysql_fetch_array($query);

$queryu=mysql_query("SELECT * from members where memberID=".$data['memberID']);
$userdata = mysql_fetch_array($queryu);

	$text = "";

	$text .= "<div class='col-md-4 port-grids view view-fourth'>";
	// $text .= "<p>".$data['item']."</p>";
	$text .= "<img src='http://herwintika.id/nitip/userfiles/item-pic/".$data['itemPic']."' class='img-responsive' alt='' style='height: inherit; width: inherit;'/>";
	$text .= "<div class='mask'>";
	$text .= "<p>profile</p>";
	$text .= "</div>";
	$text .= "</div>";
	$text .= "<div class='details-shade'>";
	$text .= "<h4>".$data['item']."</h4>";
	$text .= "<h3>".$userdata['firstname']." ".$userdata['lastname']." - ".$data['cityRequest'].", ".$data['countryRequest']."</h3>";
	$text .= "<span>Rp. ".number_format($data['pay'],2,",",".")."</span>";
	$text .= "<p>".$data['itemDesc']."</p>";
	$text .= "</div>";

	// $text .= "<div class='container'>";
	// $text .= "<p>".$data['item']."</p>";            
	// $text .= "<img src='http://herwintika.id/nitip/userfiles/item-pic/".$data['itemPic']."' class='img-thumbnail' alt=''  width='250' height='250'>"; 
	// $text .= "</div>";
 //    $text .= "<label>".$userdata['firstname']." ".$userdata['lastname']." - ".$data['cityRequest'].", ".$data['countryRequest']."</label><br>";
 //    $text .= "<span>Rp. ".number_format($data['pay'],2,",",".")."</span><br>";
 //    $text .= "<span>Keterangan:</span><br>";
 //    $text .= "<span>".$data['itemDesc']."</span></label>";

echo $text;
return $text;
?>