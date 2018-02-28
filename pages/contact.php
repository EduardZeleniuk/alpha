<?php
render_header([
	'title' => 'Contact Us',
	'is_home' => false,
	'menu_active_item' => 'contact'
]);
?>
<!-- Main -->
<section id="main" class="container 75%">
	<header>
		<h2>Contact Us</h2>
		<p>Tell us what you think about our little operation.</p>
	</header>
	<div class="box">
		<form method="post" action="index.php?page=contact">
			<div class="row uniform 50%">
				<div class="6u 12u(mobilep)">
					<input type="text" name="name" id="name" value="" placeholder="Name" />
				</div>
				<div class="6u 12u(mobilep)">
					<input type="email" name="email" id="email" value="" placeholder="Email" />
				</div>
			</div>
			<div class="row uniform 50%">
				<div class="12u">
					<input type="text" name="subject" id="subject" value="" placeholder="Subject" />
				</div>
			</div>
			<div class="row uniform 50%">
				<div class="12u">
					<textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
				</div>
			</div>
			<div class="row uniform">
				<div class="12u">
					<ul class="actions align-center">
						<li><input type="submit" value="Send Message" /></li>
					</ul>
				</div>
			</div>
		</form>
	</div>
</section>




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

		$result = mysqli_query($db, $sql);
		var_dump($result);
	}


render_footer();
?>