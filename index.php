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




$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$subject = trim($_POST['subject']);
	$message = trim($_POST['message']);

	if(empty($name) OR empty($email) OR empty($message))
	{
	    echo 'Пожалуйста, заполните все поля!';
	}
	elseif(mb_strlen($name) > 250 OR mb_strlen($email) > 250 OR mb_strlen($subject) > 250)
	{
	    echo 'Слишком длинное имя или email';
	}
	elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE)
	{
	    echo 'Введите правильный email';
	}
	else
	{

		$sql = "INSERT INTO `users` (`name`, `email`, `subject`, `message`) 
                        VALUES ('".$name."','".$email."','".$subject."','".$message."')";

                        echo '<pre>';
                        var_dump($sql);
                        echo '</pre>';

		$result = mysqli_query($db, $sql);
		var_dump($result);
		exit;
	}

mysqli_close($db);