<!-- <?php require 'includes/config.php';

$reqID = trim($_GET['req']);

$row = $user->get_request($reqID);



$reqID = $row['reqID'];
$memberID = $row['memberID'];
$item = $row['item'];
$itemPic = $row['itemPic'];

$user_row = $user->get_user($memberID);

$firstname = $user_row['firstname'];
$profPic = $user_row['profPic'];
$email = $user_row['email'];

// echo "$reqID $item $memberID $email $firstname $profPic $itemPic";

?> -->

<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
$servername = "localhost";
$username = "herwinti_nitip";
$password = "Nitip1234";
$dbname = "herwinti_nitip";
mysql_connect($servername, $username, $password) or
    die("Could not connect: " . mysql_error());
mysql_select_db($dbname);
$query=mysql_query("SELECT * from request where reqID=".$_GET['id']);
$data = mysql_fetch_array($query);

$queryu=mysql_query("SELECT * from members where memberID=".$data['memberID']);
$userdata = mysql_fetch_array($queryu);
?>

<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="/css/slidebars.css" media="(max-device-width: 768px)" rel="stylesheet">

<div class="container">
	<div class="row"><div class="col-xs-12 col-sm-12"><br><span class="introtext"></div></div>      <div class="row">
	    <div class="col-xs-12 col-sm-12">
	        <h2><i class="fa fa-gift"></i> View request</h2>
	        <br>
	    </div>
	</div>

	<div class="row">
	    <div class="col-xs-12 col-sm-1"></div>
	    <div class="col-xs-12 col-sm-5" align="center">
	        <div style="width:320px" align="left">
	            <br>
	            <table>
	                <tr>
	                    <td id="userProfile" width="52px">
	                        <a href="/users/5467"><img src="userfiles/profile-pic/<?php echo $userdata['profPic'];?>" 
	                            class="img-circle" width="50px" height="50px"/></a>
	                    </td>
	                    <td width="190px">
	                        &nbsp;<a href="/users/<?php print($userdata['memberID']) ?>" class="tealtext"><?php print($userdata['firstname']) ?></a><br>
	                        <div class="stars"><div class="frame"></div><div class="score" style="width:100%"></div></div>
	                    </td>
	                  
	                </tr>
	            </table>
	        </div>
	        <br>
	        <div style="width:320px;position:relative;right:0;top:0;">
	            <img class="base-image" src="userfiles/item-pic/<?php echo $data['itemPic'];?>" width="320px" height="320px"/>
	            <br><br>
	            <br>
	        </div>
	    </div>
	    <div class="col-xs-12 col-sm-1" id="separator" style="display:none"></div>
	   
	    <div class="col-xs-12 col-sm-5" align="center">
	        	        
	        <div style="width:320px" align="left">
	            
	            <h3><?php print($data['item']) ?></h3>
	            <?php print($data['itemDesc']) ?>
	            <br />
	            <br />
	           
	            <i class="fa fa-map-marker tealtext"></i>&nbsp;Shop in <?php print($data['cityRequest']) ?> , <?php print($data['countryRequest']) ?>
	            <br><br>
	            <i class="fa fa-map-marker tealtext"></i>&nbsp;Deal in <?php print($data['cityDeal']) ?>, <?php print($data['countryDeal']) ?>
	            <br><br>
	            
	                                
	            <i class="fa fa-tag tealtext"></i>&nbsp;Willing to pay <?php print($data['pay']) ?>               <br><br>
	            <button class="btn btn-success" data-toggle="modal" data-target="#helpToBuyModal">Help to buy</button>                                  <!-- Modal -->
	                            
	            <br><br>
	        </div>
	    </div>
	    <div class="col-xs-12 col-sm-1"></div>
	</div>
	<div class="row" id="comments">
	    <div class="col-xs-12 col-sm-3">
	    </div>
	    <div class="col-xs-12 col-sm-6">
	        <h3>No comment yet</h3>                    
	        	 <form method="POST" id="commentForm" action="/requests/5531/comments">
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Enter your comment" name="comment" style="resize:none"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary loadingButton" type="submit" data-loading-text="Processing...">Comment</button>
                    </div>
                </form>
        </div>
	    
	</div>
</div>