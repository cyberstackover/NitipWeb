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
// echo "$asal $tujuan";

if ($asal == null || $tujuan == null) {
	# code...
	$items_1 = mysql_query("SELECT * FROM trip JOIN members ON trip.memberID = members.memberID AND trip.expected_back_date >= CURDATE()");
} else {
	# code...
	$awal = explode(", ", $asal);
	$akhir = explode(", ", $tujuan);
	$items_1 = mysql_query("SELECT * FROM trip JOIN members ON trip.memberID = members.memberID AND trip.expected_back_date >= CURDATE() AND  trip.travel_to_city LIKE '%".$akhir[0]."%' AND  trip.travel_to_country LIKE '%".$akhir[1]."%' AND  trip.back_to_city LIKE '%".$awal[0]."%' AND  trip.back_to_country LIKE '%".$awal[1]."%'");
}

// echo "$asal $tujuan";

// $items_1 = mysql_query("SELECT * FROM trip JOIN members ON trip.memberID = members.memberID AND trip.expected_back_date >= CURDATE()");

$text = "";


while( $row_1 = mysql_fetch_array( $items_1,MYSQLI_ASSOC ) ) {

	$backdate = date("l jS \of F Y h:i:s A",strtotime($row_1['expected_back_date']));

	$text .= "<a href='postRequest.php?id=$row_1[tripID]'>";
	$text .= "<table width='100%' style='margin-bottom: 10px;'>";
	$text .= "<thead>";
	$text .= "<tr>";
	$text .= "<td colspan='2'>";
	$text .= "$row_1[firstname] $row_1[lastname]";
	$text .= "</td>";
	$text .= "</tr>";
	$text .= "</thead>";
	$text .= "<tbody>";
	$text .= "<tr>";
	$text .= "<td width='20%' valign='top'>";
	// $text .= "<div style='margin-right:5px; height:100%; float:left; border-radius:50%;'>";
    $text .= "<img src='userfiles/profile-pic/$row_1[profPic]' style='width: 100px; height: 100px;' />";
    // $text .= "</div>";
	$text .= "</td>";
	$text .= "<td width='80%' valign='top'>";
    $text .= "<span class='date sub-text'>$row_1[back_to_city], $row_1[back_to_country] to $row_1[travel_to_city], $row_1[travel_to_country]</span><br>";
    $text .= "<span class='date sub-text'>$backdate</span>";
	$text .= "</td>";
	$text .= "</tr>";
	$text .= "</tbody>";
	$text .= "</table>";			
	$text .= "</a>";
}

if ($text=='') {
	$text='Data Tidak Ditemukan ... Silahkan periksa kembali lokasi asal dan tujuan anda';
}
echo $text;
return $text;
?>