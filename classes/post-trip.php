<?php 

require '../includes/config.php';


$username = $_SESSION['username'];

$travel = $_REQUEST['travel'];
$back = $_REQUEST['back'];
$tanggal = $_REQUEST['tanggal'];

// $expected_back_date = date("y-m-d", strtotime($tanggal));
$expected_back_date = $tanggal;

list($travel_to_city,$travel_to_country) = explode(', ', $travel);
list($back_to_city,$back_to_country) = explode(', ', $back);

$memberID = $user->get_user_id($username);

echo "$memberID $tanggal $expected_back_date";

$stmt = $db->prepare('INSERT INTO trip (memberID, travel_to_city, travel_to_country, back_to_city, back_to_country, expected_back_date) 
						VALUES (:memberID, :travel_to_city, :travel_to_country, :back_to_city, :back_to_country, :expected_back_date)');
$stmt->execute(array(
	':memberID' => $memberID,
	':travel_to_city' => $travel_to_city,
	':travel_to_country' => $travel_to_country,
	':back_to_city' => $back_to_city,
	':back_to_country' => $back_to_country,

	// ':travel_to_city' => 'test',
	// ':travel_to_country' => 'test',
	// ':back_to_city' => 'test',
	// ':back_to_country' => 'test',

	':expected_back_date' => $tanggal
));


	//redirect to index page
	header('Location: ../memberpage.php');
	exit;


?>