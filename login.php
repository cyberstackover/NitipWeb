<?php
//include config
require_once('includes/config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: memberpage.php'); } 

//process login form if submitted
if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	

	if($user->login($username,$password)){ 
        // echo "user $username";
        // echo "password $password";
		$_SESSION['username'] = $username;
		//header('Location: memberpage.php');
		header('Location: classes/check-login.php');
		//header('Location: controllers/navigation/after-login.php');
		exit;
	
	} else {
		$error[] = 'Wrong username or password or your account has not been activated.';
	}

}//end if submit

//define page title
$title = 'Login';

//include header template
require('layout/header.php'); 
?>


<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<div class="container">
    <div class="omb_login">

    	<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				if(isset($_GET['action'])){

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
							break;
						case 'resetAccount':
							echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
							break;
					}

				}

				
		?>

		<hr>
        <div class="row omb_row-sm-offset-3">

            <div class="col-xs-12 col-sm-6"> <!-- <div class="col-md-6 col-md-offset-3"> -->
                <div style="padding: 20px;" id="form-forgot">
                    <form class="omb_loginForm" action="" autocomplete="off" method="POST">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Username"
                            value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
                        </div>
                        <span class="help-block"></span>
                        
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input  type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <span class="help-block"></span>
                        <div class="row">
							<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Login" class="btn btn-lg btn-primary btn-block" tabindex="5"></div>
						</div>
                    </form>
                </div>
            </div>
            <div class="row omb_row-sm-offset-3">
                <div class="col-xs-12 col-sm-3">
                    <label class="checkbox" style="margin-left:2em;">
                        <input type="checkbox" value="remember-me">Remember Me
                    </label>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <p class="help-block omb_forgotPwd">
                        <a class="pull-right text-muted" href="#" id="forgot">Forgot your password?</a>
                    </p>
                </div>
            </div>	    	
        
            <div class="row omb_row-sm-offset-3 omb_loginOr">
                <div class="col-xs-12 col-sm-6">
                    <hr class="omb_hrOr">
                    <span class="omb_spanOr">or login using</span>
                </div>
            </div>
            <div class="row omb_row-sm-offset-3 omb_socialButtons">
                <div class="col-xs-4 col-sm-3">
                    <a href="#" class="btn btn-lg btn-block omb_btn-facebook">
                        <i class="fa fa-facebook visible-xs"></i>
                        <span class="hidden-xs">Facebook</span>
                    </a>
                </div>

                <div class="col-xs-4 col-sm-3">
                    <a href="#" class="btn btn-lg btn-block omb_btn-google">
                        <i class="fa fa-google-plus visible-xs"></i>
                        <span class="hidden-xs">Google+</span>
                    </a>
                </div>	
            </div>
            <div style="display: none;" id="form-forgot">
                <h4 class="">
                    Forgot your password?
                </h4>
                
            </div>

            <br>

            <div class="row">
					<div class="col-xs-9 col-sm-9 col-md-9">
						 Belum jadi member sist? <a href='register.php'>Daftar Yuk !</a>
						<p><a href='./'>Back to home page</a></p>
					</div>
			</div>

        </div>
    </div>
</div>

<br>
<br>     
<?php
//include footer template
require('layout/footer.php'); 
?>