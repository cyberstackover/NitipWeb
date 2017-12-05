<?php 
header('Access-Control-Allow-Origin: *');
error_reporting(E_ALL ^ E_DEPRECATED);

$server = "localhost";
$username = "herwinti_nitip";
$password = "Nitip1234";
$database = "herwinti_nitip";
 
// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

$id = $_REQUEST['memberID'];
$itemName = $_REQUEST['itemName'];
$itemDescription = $_REQUEST['itemDescription'];
$itemCategory = $_REQUEST['category'];
$url = $_REQUEST['url'];
$trip = $_REQUEST['tripId'];
$status ='open';
$buy = $_REQUEST['citybuy'];
list($cityBuy,$countryBuy) = explode(', ', $buy);
$transaction = $_REQUEST['citytrans'];
list($cityTransaction,$countryTransaction) = explode(', ', $transaction);
$pay = $_REQUEST['paid'];


$Destination = '../userfiles/item-pic';
if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
    $NewImageName= 'default.jpg';
    move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
}
 else{
    $RandomNum = rand(0, 9999999999);
    $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
    $ImageType = $_FILES['ImageFile']['type'];
    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt = str_replace('.','',$ImageExt);
    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName = substr($ImageName,0,10).'-'.$RandomNum.'.'.$ImageExt;
    move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
}

$data="INSERT INTO request (memberID,item,itemDesc,itemCategory,itemPic,itemUrl,cityRequest,countryRequest,cityDeal,countryDeal,pay,status,tripID) VALUES ('$id', '$itemName', '$itemDescription', '$itemCategory', '$NewImageName', '$url', '$cityBuy', '$countryBuy', '$cityTransaction', '$countryTransaction', '$pay', '$status', '$trip')";
$query=mysql_query($data);

//redirect to index page
	header('Location: ../www/member.html?id='.$id);
	exit;

?>
