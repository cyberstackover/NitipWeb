<?php
header('Access-Control-Allow-Origin: *');
error_reporting(E_ALL ^ E_DEPRECATED);
 $servername = "localhost";
 $username = "herwinti_nitip";
 $password = "Nitip1234";
 $dbname = "herwinti_nitip";
mysql_connect($servername, $username, $password) or
    die("Could not connect: " . mysql_error());
mysql_select_db($dbname);

$items_1 = mysql_query("SELECT * FROM request JOIN members on request.memberID = members.memberID ORDER BY request.reqID DESC LIMIT 6");

$text = "";


while( $row_1 = mysql_fetch_array( $items_1,MYSQLI_ASSOC ) ) {
    
   // $text .= "<a href='postRequest.php?id=$row_1[tripID]'>";
	$text .= "<div class='column large-4 medium-6'>";
	$text .= "<div class='news-item js-news-item'>";
	$text .= "<div class='news-image-block news-with-slider'>";
	$text .= "<img src='images/placeholder.png' class='news-placeholder' alt=''>";
	$text .= "<div class='news-images-list'>";
	$text .= "<img id='imagprod' src='userfiles/item-pic/$row_1[itemPic]' class='news-image' alt=''>";
	$text .= "<img id='imagprod' src='userfiles/item-pic/$row_1[itemPic]' class='news-image' alt=''>";
	$text .= "<img id='imagprod' src='userfiles/item-pic/$row_1[itemPic]' class='news-image' alt=''>";
	$text .= "<img id='imagprod' src='userfiles/item-pic/$row_1[itemPic]' class='news-image' alt=''>";
	$text .= "</div>";
	$text .= "<a href='request.php?id=$row_1[reqID]'></a>";
	$text .= "</div>";
	$text .= "<div class='main-news-block'>";
	$text .= "<p class='news-date l-dis-ib'>$row_1[item]</p>";
	$text .= "<a href='request.php?id=$row_1[reqID]'>Detail</a>";
	$text .= "<a href='postRequest.php?id=$row_1[tripID]'><h4 class='news-title l-dis-ib'><h2>Titip sekarang</h2><br>Rp. ".number_format($row_1['pay'],2,",",".")."</h4></a>";
	$text .= "<p class='main-news l-dis-ib'>$row_1[itemDesc]";
	$text .= "</p>";
	$text .= "</div>";
	$text .= "</div>";
	$text .= "</div>";

    // $text .= "<li><div class='partners-item'>";
    // $text .= "<a href='request.php?id=$row_1[reqID]'><img id='imagitem' src='userfiles/item-pic/$row_1[itemPic]' alt=''/>";
    // $text .= "<span class='caption'> $row_1[firstname] - $row_1[cityRequest] <br> Rp. ";
    // $text .= number_format($row_1['pay'],2,",",".");
    // $text .= "</span>";
    
    // $text .= "</a></div></li>";
}
echo $text;
return $text;
?>