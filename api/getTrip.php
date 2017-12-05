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

$asal = $_GET['asal'];
$tujuan = $_GET['tujuan'];
if ($asal == null || $tujuan == null) {
	# code...
	$items_1 = mysql_query("SELECT * FROM trip JOIN members ON trip.memberID = members.memberID AND trip.expected_back_date >= CURDATE()");
} else {
	# code...
	$awal = explode(", ", $asal);
	$akhir = explode(", ", $tujuan);
	$items_1 = mysql_query("SELECT * FROM trip JOIN members ON trip.memberID = members.memberID AND trip.expected_back_date >= CURDATE() AND  trip.travel_to_city LIKE '".$akhir[0]."' AND  trip.travel_to_country LIKE '".$akhir[1]."' AND  trip.back_to_city LIKE '".$awal[0]."' AND  trip.back_to_country LIKE '".$awal[1]."'");
}
$text = "";
$i=0;

while( $row_1 = mysql_fetch_array( $items_1,MYSQLI_ASSOC ) ) {
	$i++;
	$items_2 = mysql_query("SELECT * FROM members where memberID = ".$row_1['memberID']);
	while( $row_2 = mysql_fetch_array( $items_2,MYSQLI_ASSOC ) ) {
		$imagenm = $row_2['profPic'];
	}
	$backdate = date("l jS \of F Y h:i:s A",strtotime($row_1['expected_back_date']));

$text .= "<div class='accordion' style='margin-top: 5px; background: gainsboro; margin-bottom: 5px; color: white;'>";
$text .= "<div class='accordion-section'  >";
$text .= "<a class='accordion-section'  style='font-size: 12px;' >";
$text .= "<p style='float: left;font-family: 'Josefin Sans', sans-serif;margin-left: 10px;'>$row_1[back_to_city] to $row_1[travel_to_city] <br> $row_1[firstname] $row_1[lastname], $row_1[expected_back_date]</p>";
$text .= "<input style='float: right; padding: 13px; background: #00aeed; color: white; border-radius: 15px; ' type='button' onclick='setidtrip($row_1[tripID])' value='Titipin'>";
$text .= "</a>";
$text .= "</div>";
$text .= "</div>";

	// $text .= "<div class='accordion-section'>";
	// $text .= "<img src='http://herwintika.id/nitip/userfiles/profile-pic/$imagenm' alt=' ' style='float: left; margin-top: 3px; '/>";
	// $text .= "<p style='float: left;'>$row_1[back_to_city] to $row_1[travel_to_city] <br> $row_1[firstname] $row_1[lastname], $row_1[expected_back_date]</p>";
	// $text .= "<input style='float: right; padding: 13px; background: #00aeed; color: white; border-radius: 15px; ' type='button' onclick='setidtrip($row_1[tripID])' value='Titipin'>";
	// $text .= "</div>";

}

if ($text=='') {
	$text='Data Tidak Ditemukan ... Silahkan periksa kembali lokasi asal dan tujuan anda';
}
echo $text;
return $text;
?>