<?php require 'includes/config.php';

//if not logged in redirect to login page
//if(!$user->is_logged_in()){ header('Location: login.php'); } 


$stmt = $db->prepare('SELECT memberID, username, first_login, email FROM members WHERE username = :username');
$stmt->execute(array(':username' => $_SESSION['username']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$id = $row['memberID'];
$username = $row['username'];
$first_login = $row['first_login'];
$email = $row['email'];


// echo "Hello $id $username $first_login";

//include header template
require('layout/header.php'); 
?>

<div class="container" style="padding-top:100px;">
    <div class="no-gutter row">             
        <div class="col-md-12">
             <center><h2 style="color:#65aeee;">Hey <?php echo "$username" ?> silahkan lengkapi profile anda </h2></center>
      	     <div class="panel panel-default" id="sidebar">
                <div class="panel-body">
                	<?php include 'controllers/form/update-profile-after-activation-form.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>