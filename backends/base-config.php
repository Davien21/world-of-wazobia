<?php
	// echo "<br><br>";
	// foreach ($_SERVER as $key => $value) {
	// 	echo "{$key} : ${value}<br>";
	// }
	// $page_name = $_SERVER['PHP_SELF '];
	// echo $page_name;
	// error_reporting(E_ALL);
	$host_name = $_SERVER['HTTP_HOST'];
	
	// echo $host_name;
	$db_name = 'worldof_wow';
	$question_types = ['Basics','Useful Info','Transactions','Complaints'];
	$plans = ['Basic','Standard','Premium','Guider','Mentorship'];
?>