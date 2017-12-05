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
$memberID = $_GET['id'];
$cat = $_GET['data'];
// echo "id $memberID";
if ($cat == 'self') {
	# code...
	$items_1 = mysql_query("SELECT * FROM request JOIN members on request.memberID = members.memberID and request.memberID =".$memberID);
	$test = "itemku";

} else {
	# code...
	$items_1 = mysql_query("SELECT * FROM request JOIN members on request.memberID = members.memberID");
	$test = "allitem";

}
// echo "$test";

// $text = "<ul class='slides'>";
$text = "";

while( $row_1 = mysql_fetch_array( $items_1,MYSQLI_ASSOC ) ) {

	$text .= "<div class='post-grid1' style='margin-bottom: 20px;'>";
	$text .= "<div class='post-pic'>";
	$text .= "<img src='http://herwintika.id/nitip/userfiles/item-pic/$row_1[itemPic]' class='img-responsive' alt='' style='width: 150px; height: 150px;'>";
	$text .= "</div>";
	$text .= "<div class='post-pic-text'>";
	$text .= "<h5>$row_1[item]</h5>";
	$text .= "<a href='detail_request.html?id=$row_1[reqID]&idm=$memberID'>$row_1[firstname] - $row_1[cityRequest]</a>";
	$text .= "<h5>Rp. ".number_format($row_1['pay'],2,",",".")."</h5>";
	$text .= "<p>$row_1[itemDesc].</p>";
	$text .= "</div>";
	$text .= "<div class='clearfix'></div>";
	$text .= "</div>";

    // $text .= "<li><div class='partners-item'>";
    // $text .= "<a href='http://herwintika.id/nitip/www/detail_request.html?id=$row_1[reqID]'><img id='imagitem' src='http://herwintika.id/nitip/userfiles/item-pic/$row_1[itemPic]' alt=''  width='50' height='50' />";
    // $text .= "<span class='caption'> $row_1[firstname] - $row_1[cityRequest] <br> Rp. ";
    // $text .= number_format($row_1['pay'],2,",",".");
    // $text .= "</span>";
    
    // $text .= "</a></div></li>";
}
// $text .= "</ul>";
echo $text;
return $text;
?>