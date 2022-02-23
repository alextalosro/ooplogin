<?php
	
	require_once 'login.classes.php';
	
	class LoginController extends Login {
		
		public function __construct(private $uid,
		                            private $pwd,
		                            )
		{
		}
		
		public function loginUser() {
			
			if (!$this->emptyInput()) {
				
				header("location: ../index.php?error=emptyinput");
				exit();
			}
			
			$this->getUser($this->uid, $this->pwd);
		}
		
		private function emptyInput(): bool{
			
			if(empty($this->uid) || empty($this->pwd)){
				$result = false;
				
			}
			else{
				$result = true;
			}
			
			return $result;
		}
	}