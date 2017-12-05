<?php require'includes/config.php'; 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 


//include header template
require('layout/header.php'); 
//require('controllers/navigation/after-login.php');

?>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
	    	<h2>Post Your Trip</h2>
			<p><a href='memberpage.php'>Back to home page</a></p>
			<hr>	
			<div class="panel-body">
            	<?php include 'controllers/form/trip-form.php' ?>
            </div>
		</div>
	</div>
</div>


<?php 
//include header template
require('layout/footer.php'); 
?>
