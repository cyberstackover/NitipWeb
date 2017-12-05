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

$items_1 = mysql_query("SELECT * FROM request JOIN members on request.memberID = members.memberID");

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
echo $text;
return $text;
?>