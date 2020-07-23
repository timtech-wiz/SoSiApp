<?php  include "classes/Database.php"; ?>


<?php

$database = new Database();

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if(isset($post['submit'])){

	/*
		*VALIDATE USERNAME
	*/

     $username = htmlspecialchars($post['username']);
     $username = strip_tags($username);
     $username = str_replace(' ','', $username);
     $username = ucfirst(strtolower($username));
     $_SESSION['username'] = $username;

    /*
		*VALIDATE EMAIL
	*/


    $email = htmlspecialchars($post['email']);
    $email = strip_tags($email);
    $email = str_replace(' ','', $email);
    $_SESSION['email'] = $email;


    /*
		*VALIDATE PASSWORD
	*/

    $password = htmlspecialchars($post['password']);
    $password = strip_tags($password);

    // VALIDATE EMAIL
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    	$msg = "Please input a valid email address";
    }else{	

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
  

    //CHECK IF EMAIL ADRESS EXIST
    $database->query("SELECT * FROM users WHERE user_email = :email");
    $database->bind(':email', $email);
    $database->execute();
    $row = $database->single();
    $count = $database->count($row);

    if($count > 0){
    	$msg = "Email has been taken";
    }else{
    	// VERIFY PASSWORD
		$password = md5($password);

		// REGISTER USER
		$database->query("INSERT INTO users(username, user_email, user_password) VALUES(:username, :email, :password)");
		$database->bind(':username', $username);
		$database->bind(':email', $email);
		$database->bind(':password', $password);
		$database->execute();
		$msg = "you have successfully registered for SoSi App. click here to login";

		unset($_SESSION['username']);

		 
    }
}


}



 
 


