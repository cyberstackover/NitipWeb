<?php require'includes/config.php'; 
error_reporting(E_ALL ^ E_DEPRECATED);

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//$stmt = $db->prepare('SELECT memberID, username,email FROM members  WHERE username = :username');


$row = $user->get_user_profile($_SESSION['username']);

// print($row['username']);

$profPic = $row['profPic'];

//define page title
$title = 'Members Page';


 $servername = "localhost";
 $username = "herwinti_nitip";
 $password = "Nitip1234";
 $dbname = "herwinti_nitip";
mysql_connect($servername, $username, $password) or
    die("Could not connect: " . mysql_error());
mysql_select_db($dbname);

// $items_1 = mysql_query("SELECT * FROM request where memberID=".$row['memberID']);
$items_1 = mysql_query("SELECT * FROM request JOIN members on request.memberID = members.memberID and request.memberID=".$row['memberID']);
$text = "<ul class='slides'>";

while( $row_1 = mysql_fetch_array( $items_1,MYSQLI_ASSOC ) ) {
    $text .= "<li><div class='partners-item'>";
    $text .= "<a href='request.php?id=$row_1[reqID]'><img id='imagitem' src='userfiles/item-pic/$row_1[itemPic]' alt=''/>";
    $text .= "<span class='caption'> $row_1[firstname] - $row_1[cityRequest] <br> Rp. ";
    $text .= number_format($row_1['pay'],2,",",".");
    $text .= "</span>";
    
    $text .= "</a></div></li>";
}
$text .= "</ul>";

require('layout/header.php'); 
require('controllers/navigation/after-login.php');
?>
<style type="text/css">
div.item {
    vertical-align: top;
    display: inline-block;
    text-align: center;
    width: 120px;
}
img {
    width: 220px;
    height: 220px;
    /*background-color: grey;*/
}
.caption {
    display: block;
}

#imagitem {
    width: 168px;
    height: 168px;
    /*background: url(img_navsprites.gif) 0 0;*/
}
</style>
<meta name="description" content=""/>
  <meta name="viewport" content="width=device-width, user-scalable=no">

  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link href='http://fonts.googleapis.com/css?family=Playfair+Display+SC:400italic,700italic&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,700&amp;subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
<link href="css/mobilemenu.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/simple-line-icons.css" rel="stylesheet">
  <link href="css/foundation.min.css" rel="stylesheet">
  <link href="css/jquery.fancybox.css" rel="stylesheet">
  <link href="css/style.min.css" rel="stylesheet">
<link href="css/less/colors/blue.min.css" rel="stylesheet">
<link rel="icon" type="image/png" href="favicon.png" sizes="32x32">
  <script src="js/lib/modernizr.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <script data-main="js/script.js" src="js/lib/require.js"></script>
  
<br><br><br><br><br>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-xs-10">
      <div class="well panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-xs-12 col-sm-4 text-center">
              <img src="userfiles/profile-pic/<?php echo $profPic;?>" alt="" class="center-block img-circle img-thumbnail img-responsive">
              
            </div>
            <!--/col--> 
            <div class="col-xs-12 col-sm-8">
              <h2><?php print($row['firstname'])?>, <?php print($row['lastname']) ?></h2>
              <p><strong>Email: </strong> <?php print($row['email'])?> </p>
            </div>
 
          </div>
          <!--/row-->
        </div>
        <!--/panel-body-->
      </div>
      <!--/panel-->
    </div>
    <!--/col--> 
  </div>
  <!--/row--> 
</div>
<!--/container-->
  <div class="row" style="padding-top: 30px;padding-bottom: 30px;margin-bottom: 30px;margin-top: 30px;">
    <h2>List Product Request : </h2>
    <div class="columns large-12">
      <div class="partners-carousel" id="ListRequest">
      <?php echo $text; ?>
        <!-- <ul class="slides">
          <li>
            <div class="partners-item">
              <a href="#">
                <img src="http://placehold.it/220x40" alt=""/>
              </a>
            </div>
          </li>
          <li>
            <div class="partners-item">
              <a href="#">
                <img src="http://placehold.it/220x40" alt=""/>
              </a>
            </div>
          </li>
          <li>
            <div class="partners-item">
              <a href="#">
                <img src="http://placehold.it/220x40" alt=""/>
              </a>
            </div>
          </li>
          <li>
            <div class="partners-item">
              <a href="#">
                <img src="http://placehold.it/220x40" alt=""/>
              </a>
            </div>
          </li>
          <li>
            <div class="partners-item">
              <a href="#">
                <img src="http://placehold.it/220x40" alt=""/>
              </a>
            </div>
          </li>
          <li>
            <div class="partners-item">
              <a href="#">
                <img src="http://placehold.it/220x40" alt=""/>
              </a>
            </div>
          </li>
        </ul> -->
      </div>
    </div>
  </div>

<?php 
//include header template
require('layout/footer.php'); 
?>
