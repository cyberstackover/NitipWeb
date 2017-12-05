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

$usernme = $_GET['user'];
$passwrd = $_GET['pass'];
$firstname = $_GET['namad'];
$lastname = $_GET['namab'];
$email = $_GET['email'];
$activasion= md5(uniqid(rand(),true));
$first_login= 'Yes';

//insert into database with a prepared statement

$data="INSERT INTO members (username,password,firstname,lastname,email,active,first_login,profPic) VALUES ('$usernme', '$passwrd', '$firstname', '$lastname', '$email', '$activasion', '$first_login', 'default.jpg')";
$query=mysql_query($data);

// $stmt = $db->prepare('INSERT INTO members (username,password,firstname,lastname,email,active,first_login) VALUES (:username, :password, :firstname, :lastname, :email, :active, :first_login)');
// $stmt->execute(array(
// 	':username' => $username,
// 	':password' => $password,
// 	':firstname' => $firstname,
// 	':lastname' => $lastname,
// 	':email' => $email,
// 	':active' => $activasion,
// 	':first_login' => $first_login
// ));
// $id = $db->lastInsertId('memberID');

// //send email
// $to = $email;
// $subject = "Registration Confirmation";
// $body = "Mengaktifkan Akun Nitipbro Anda.\n\n hi, Terima kasih sudah mendaftar untuk bergabung \n Untuk menyelesaikan proses pendaftaran, mohon lakukan konfirmasi pendaftaran silahkan klik link di bawah ini:\n\n ".DIR."activate.php?x=$id&y=$activasion\n\n Regards Nitipbro.com \n\n";
// $additionalheaders = "From: <".SITEEMAIL.">\r\n";
// $additionalheaders .= "Reply-To: ".SITEEMAIL."";
// mail($to, $subject, $body, $additionalheaders);

?>
