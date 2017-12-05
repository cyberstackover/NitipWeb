<?php require 'includes/config.php';

//if not logged in redirect to login page
$tripID = $_GET['id'];
$reqmessage = $_GET['err'];
if(!$user->is_logged_in()){ header('Location: login.php'); } 

$username = $_SESSION['username'];
echo "$username";
//include header template
require('layout/header.php'); 
//require('controllers/navigation/after-login.php');
?>

<p><a href='memberpage.php'>Back to home page</a></p>

<div class="container" style="padding-top:100px;">
    <div class="no-gutter row">             
        <div class="col-md-12">
             <center><h2 style="color:#65aeee;">Post Your Request </h2></center>
      	     <div class="panel panel-default" id="sidebar">
                <div class="panel-body">
                	<?php include 'controllers/form/request-form.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>

