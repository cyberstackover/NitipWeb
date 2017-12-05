<?php require '../includes/config.php';

ini_set("display_errors",1);

// echo "Request";



$stmt = $db->prepare('SELECT memberID, username,email FROM members WHERE username = :username ');
//$stmt->execute(array(':username' => $_SESSION['username']));
$stmt->execute(array(':username' => $_SESSION['username']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
// alert('Mohon Untuk Memeriksa Trip reference yang akan anda Titipi');

$username = $row['username'];
$id = $row['memberID'];
$buy = $_REQUEST['citybuy'];

// echo "$username $id";

$id = $row['memberID'];
$itemName = $_REQUEST['itemName'];
$itemDescription = $_REQUEST['itemDescription'];
$itemCategory = $_REQUEST['category'];
$url = $_REQUEST['url'];
$trip = $_REQUEST['tripId'];
$status ='open';
list($cityBuy,$countryBuy) = explode(', ', $buy);

if ($trip==null || $trip =='') {
	$reqmessage = 1;
	# code...
	// alert('Mohon Untuk memilih trip reference terlebih dahulu ... ');
	// echo "<script type='text/javascript'>alert('Mohon Untuk memilih trip reference terlebih dahulu ... ');</script>";
	// sleep(3);
	header('Location: ../postRequest.php?err=1');
} else {
	# code...//$countryBuy = substr($cityBuy, strpos($cityBuy, ",") + 1);    
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

echo "$id $itemName $itemDescription $itemCategory $NewImageName $url $cityBuy $countryBuy $cityTransaction $countryTransaction $pay";

//insert into database with a prepared statement
$stmt = $db->prepare('INSERT INTO request (memberID,item,itemDesc,itemCategory,itemPic,itemUrl,cityRequest,countryRequest,cityDeal,countryDeal,pay,status,tripID) 
						VALUES (:memberID, :item, :itemDesc, :itemCategory, :itemPic, :itemUrl, :cityRequest, :countryRequest, :cityDeal, :countryDeal, :pay, :status, :tripID)');
$stmt->execute(array(
	':memberID' => $id,
	':item' => $itemName,
	':itemDesc' => $itemDescription,
	':itemCategory' => $itemCategory,
	':itemPic' => $NewImageName,
	':itemUrl' => $url,
	':cityRequest' => $cityBuy,
	':countryRequest'  => $countryBuy,
	':cityDeal' => $cityTransaction,
	':countryDeal' => $countryTransaction,
	// ':cityRequest' => 'test',
	// ':countryRequest'  => 'test',
	// ':cityDeal' => 'test',
	// ':countryDeal' => 'test',

	':pay' => $pay,
	':status' => $status,
	':tripID' => $trip
));


//redirect to index page
	header('Location: ../index.html');
	exit;
}


?>
