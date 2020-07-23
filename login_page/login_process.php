<?php include "classes/Database.php" ?>
<?php session_start(); ?>


<?php 
$row = "";
$database = new Database();

 
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if(isset($post['submit'])){

	$email = htmlspecialchars($post['email']);
	$password = htmlspecialchars($post['password']);

	$password = md5($password);
	$database->query("SELECT * FROM users WHERE user_email = :email AND user_password = :password ");
	$database->bind(':email', $email);
	$database->bind(':password', $password);
	$database->execute();
	$rows = $database->result();
	foreach($rows as $row){
		$username = $row['username'];

	}

	$count = $database->count($row);

	if($count > 0){
		$_SESSION['username'] = $username;
		 
		header("Location: admin.php");

	}else{
		 $msg = "Incorrect login details";
	}
} 



 ?>