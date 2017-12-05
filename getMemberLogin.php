<?php
header('Access-Control-Allow-Origin: *');
require_once('includes/config.php');

$text = 'Anda Belum Login';
if( $user->is_logged_in() ){ 
	$text = $user->gerusername();
	print_r($text);
	return $text;
}else{
	// echo $text;
	return $text;
}

?>