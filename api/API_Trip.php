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

$records = array();

// while($row = mysql_fetch_assoc($result)) {
    
// }

// mysql_close($con);


while( $row_1 = mysql_fetch_array( $items_1,MYSQLI_ASSOC ) ) {
	$records[] = $row_1;
}

// echo $text;
// $data = "{\"Data_Trip\" : ".json_encode($records)."}";
$data = json_encode($records);
echo $data; 
?>