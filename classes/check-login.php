<?php require '../includes/config.php';


$stmt = $db->prepare('SELECT memberID, username, first_login FROM members WHERE username = :username');
$stmt->execute(array(':username' => $_SESSION['username']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$id = $row['memberID'];
$username = $row['username'];
$first_login = $row['first_login'];

echo "$id $username $first_login";

if($first_login == 'Yes')
{	
	header('Location: ../update-profile-after-activation.php');
	//header('Location: ../memberpage.php');
}
else
{
	header('Location: ../memberpage.php');
}

?>