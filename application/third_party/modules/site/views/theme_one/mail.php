<?php 
if(isset($_POST['submit'])){     
    $name = $_POST['name'];
	$email = $_POST['email'];
	$phone= $_POST['phone'];	
    $subject = $_POST['subject'];
    $message = $_POST['message'];	
	$to = "yusufprodhan@gmail.com"; // this is Email address 
	
if(empty($name) OR empty($email) OR empty($phone) OR empty($message)){
	echo "<div class='errors'>Sorry, You must fill the required fields<strong>(*)</strong></div>";	
}
else{
	
	mail($to,$subject,$message,$phone,"From: $name <$email>");
	echo "<div class='done'>Email has been sent, we will get back to you ASP!</strong></div>";
}
	
}
?>

