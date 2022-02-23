<?php

	require_once 'signup.classes.php';
	
	class SignupController extends Signup {
		
		public function __construct(private $uid,
		                            private $pwd,
		                            private $pwdRepeat,
		                            private $email)
		{
		}
		
		public function signupUser() {
			
			if (!$this->emptyInput()) {
				header("location: ../index.php?error=emptyinput");
				exit();
			}
			if (!$this->invalidUid()) {
				header("location: ../index.php?error=username");
				exit();
			}
			if (!$this->invalidEmail()) {
				header("location: ../index.php?error=email");
				exit();
			}
			if (!$this->passwordMatch()) {
				header("location: ../index.php?error=passwordmatch");
				exit();
			}
			if (!$this->uidTakenCheck()) {
				header("location: ../index.php?error=useroremailtaken");
				exit();
			}
			
			$this->setUser($this->uid, $this->pwd, $this->email);
			
			var_dump($this->uid);
		}
		
		private function emptyInput(): bool{
			
			if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)){
				$result = false;

			}
			else{
				$result = true;
			}
			
			return $result;
		}
		
		private function invalidUid(): bool{
			
			if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
				$result =false;
				
			}
			else{
				$result = true;
			}
			
			return $result;
		}
		
		private function invalidEmail(): bool{
			
			if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
				$result = false;
			}
			else{
				$result = true;
			}
			
			return $result;
		}
		
		private function passwordMatch(): bool{
			
			if($this->pwd !== $this->pwdRepeat){
				$result = false;
			}
			else {
				$result = true;
			}
			
			return $result;
		}
		
		private function uidTakenCheck(): bool{
			
			if(!$this->checkUser($this->uid, $this->email)){
				$result = false;
			}
			else {
				$result = true;
			}
			
			return $result;
		}
	}