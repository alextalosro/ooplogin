<?php
	
	class UsersController extends Users{
	
		public function createUser($firstname, $lastname, $dateofbirth){
			$this->setUser($firstname, $lastname, $dateofbirth);
		}
	}