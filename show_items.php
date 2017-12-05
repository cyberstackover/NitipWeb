<?php

 $servername = "localhost";
 $username = "herwinti_nitip";
 $password = "Nitip1234";
 $dbname = "herwinti_nitip";

//$servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "nitipbro_dev";


mysql_connect($servername, $username, $password) or
    die("Could not connect: " . mysql_error());
mysql_select_db($dbname);
$items_1 = mysql_query("SELECT pic, name, n_from as 'from', n_to as 'to', old_price, current_price, code, details, departure_date, arrival_date, thumb
, gallery_1,gallery_2,gallery_3
, pic_image
FROM oversea_items");
while( $row_1 = mysql_fetch_array( $items_1,MYSQLI_ASSOC ) ) {
    $json_1[] = array(
						pic=>$row_1[pic],
						name=>$row_1[name],
						from=>$row_1[from],
						to=>$row_1[to],
						price=>array(current=>$row_1[current_price],old=>$row_1[old_price]),
						code=>$row_1[code],
						details=>$row_1[details],
						departure_date=>$row_1[departure_date],
						arrival_date=>$row_1[arrival_date],
						thumb=>$row_1[thumb],
						gallery=>array($row_1[gallery_1],$row_1[gallery_2],$row_1[gallery_3]),
						pic_image=>$row_1[pic_image]
					);
	//$row_1;
}
$static_var='[{"name":"Overseas","oneRow":false,"imagesPath":"images/oversea/","imagesPICPath":"images/member/","addCodePath":false,"items":'.json_encode($json_1).'}]';
//echo(json_encode($json_2));
echo $static_var;
return $static_var;

?>