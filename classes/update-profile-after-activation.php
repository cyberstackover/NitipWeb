<?php 
require '../includes/config.php';

ini_set("display_errors",1);
   
$stmt = $db->prepare('SELECT memberID, username,email FROM members WHERE username = :username');
$stmt->execute(array(':username' => $_SESSION['username']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$Destination = '../userfiles/profile-pic';
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
    $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
}

$id = $row['memberID'];
$username = $row['username'];
$email = $row['email'];
$user_firstname=$_REQUEST['user_firstname'];
$user_lastname=$_REQUEST['user_lastname'];

//insert into database with a prepared statement
// $stmt = $db->prepare('INSERT INTO members_profile (memberID,firstname,lastname,profpic) VALUES (:memberID, :firstname, :lastname, :profpic)');
// $stmt->execute(array(
// 	':memberID' => $id,
// 	':firstname' => $user_firstname,
// 	':lastname' => $user_lastname,
// 	':profpic' => $NewImageName
// ));

echo "$id $username $user_firstname $user_lastname $NewImageName";

$stmt = $db->prepare("UPDATE members SET firstname = :firstname, first_login = 'No', lastname = :lastname, profPic = :profPic WHERE memberID = :memberID ");
$stmt->execute(array(
	':memberID' => $id,
	':firstname' => $user_firstname,
	':lastname'=> $user_lastname,
	':profPic'=> $NewImageName
	
));

//redirect to index page
header('Location: ../memberpage.php');
exit;

?>