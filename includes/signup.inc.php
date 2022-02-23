<?php
	require_once '../classes/signup-controller.classes.php';
	require_once '../classes/signup.classes.php';
	require_once '../classes/dbh.classes.php';
	
	if(isset($_POST["submit"])){
		
		// Grabbing the data
		$uid = $_POST["uid"];
		$pwd = $_POST["pwd"];
		$pwdRepeat = $_POST["pwdRepeat"];
		$email = $_POST["email"];
		
		// Instantiate SignupController class
		$signupController = new SignupController($uid, $pwd, $pwdRepeat, $email);
		
		
		// Running error handlers and signup
		$signupController->signupUser();
		
		// Going back to front page
		header("location: ../index.php?error=signupnone");
	}