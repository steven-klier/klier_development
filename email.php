<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	
	<?php
	
	if($_POST['message']){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
	
		$to = "sk_development@stevenklier.com";
		$headers = "From: Klier Development - $email \r\n";
		$headers .= "Reply-To: $email \r\n";
		$headers .= "Return-Path: $email\r\n";
		$headers .= "X-Mailer: PHP/ \r\n";
    	$headers .= "MIME-Version: 1.0\r\n";
    	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		mail($to, $name, $message, $headers);
	
	}
	
	$conn = new MySQLi("50.87.144.20","steven_admin","maddog23","steven_db");

	if ($conn->connect_error){	
  		die('Could not connect: ' . $conn->connect_error);
  	} 

	$uniqueid = uniqid();
	
	$sql = "INSERT INTO email_klier (name, email) VALUES ('$_POST[name]','$_POST[email]')";

 	if ($conn->query($sql) === TRUE) {
    	echo '<h1 class="text-center mt-5">Thanks for getting in touch! I will get back to you as soon as possible.</h1>';
		echo '<br> <div class="row justify-content-center"><a href="index.html"><button class="btn btn-dark" type="button">Return Home</button></a></div>';
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();	
?>
	
</body>
</html>