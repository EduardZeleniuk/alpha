<?php
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
                        echo $db;

		$result = mysqli_query($db, $sql);


		// header('Location: index.php');
	}
