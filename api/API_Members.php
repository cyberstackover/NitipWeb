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
// $items_1 = mysql_query("SELECT * FROM (SELECT * FROM request JOIN members on request.memberID = members.memberID and request.memberID =".$idmember.") A JOIN trip B ON  A.tripID =  B.tripID");
$items_1 = mysql_query("SELECT * FROM members where memberID =".$idmember);


if($idmember == null){
	// $items_1 = mysql_query("SELECT * FROM (SELECT * FROM request JOIN members on request.memberID = members.memberID) A JOIN trip B ON  A.tripID =  B.tripID");
	$items_1 = mysql_query("SELECT * FROM members");


}

$records = array();
$log = array();
$tmp = array();

while( $row_1 = mysql_fetch_array( $items_1,MYSQLI_ASSOC ) ) {
	$records[] = $row_1;
}

$total=count($records);

if ($total>0) {
	# code...
	$log['Status'] = 'Success';
	// $log['Data_Member'] = $records;
	$log['Detail_Member'] = $records;
	$tmp[] = $log;
} else {
	# code...
	$log['Status'] = 'Fail';
	// $log['Data_Member'] = $records;
	$tmp[] = $log;
}

// echo $text;
$data = "{\"Data_Member\" : ".json_encode($tmp)."}";
echo $data; 
?>