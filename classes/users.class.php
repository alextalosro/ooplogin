<?php
	
	class Users extends Dbh{
		
		protected function getUser($name){
			$sql = "SELECT * FROM oopphp16.users WHERE users_firstname = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$name]);
			
			$result = $stmt->fetchAll();
			return $result;
		}
		
		protected function setUser($firstname, $lastname, $dateofbirth){
			$sql = "INSERT INTO oopphp16.users(users_firstname, users_lastname, users_dateofbirth) VALUES (?, ?, ?)";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$firstname, $lastname, $dateofbirth]);
		}
	}