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

$location = $_GET['loc'];
$destination = $_GET['des'];
$tanggal = $_GET['tgl'];
// $lastname = $_GET['namab'];
// $email = $_GET['email'];
// $activasion= md5(uniqid(rand(),true));
// $first_login= 'Yes';


$memberID = $_SESSION['idmember'];
// $memberID = $_GET['id'];

if (!$memberID) {
	$memberID = $_GET['id'];
	# code...
}

$tujuan = explode(', ', $destination);
$lokasi = explode(', ', $location);
//insert into database with a prepared statement

$data="INSERT INTO trip (memberID, travel_to_city, travel_to_country, back_to_city, back_to_country, expected_back_date) VALUES ('$memberID', '$tujuan[0]', '$tujuan[1]', '$lokasi[0]', '$lokasi[1]', '$tanggal')";
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
$log = array();
$tmp = array();
// $log['Status'] = 'Success';
	// $log['Data_Member'] = $records;
	$log['Id_Member'] = $memberID;
	$log['Query'] = $data;
	$log['Tanggal'] = $tanggal;
	$log['Location'] = $tujuan;
	$log['Destination'] = $lokasi;
	
	$tmp[] = $log;

$dataj = "{\"Login_Status\" : ".json_encode($tmp)."}";
echo $dataj; 

?>
