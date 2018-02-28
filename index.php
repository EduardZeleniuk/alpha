<?php

require_once 'config.php';

// $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// $email = (string)$_GET['email'];
// $email = mysqli_real_escape_string($db, $email);

// $sql = "
// 	SELECT * 
// 	FROM	`ps_customer`
// 	WHERE `email` = '{$email}'
// ";
// echo '<pre>';
// 		var_dump( $sql);
// 		echo '</pre>';
// $result = mysqli_query($db, $sql);
// while($row = mysqli_fetch_assoc($result))
// 	{
// 		echo '<pre>';
// 		var_dump( $row);
// 		echo '</pre>';
// 	}

// exit;


	
require_once 'functions.php';
require_once 'router.php';


mysqli_close($db);