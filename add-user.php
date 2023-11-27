<?php
	session_start();
	if(filter_input(INPUT_POST, "first_name")
	&& filter_input(INPUT_POST, "last_name")
	&& filter_input(INPUT_POST, "username")
	&& filter_input(INPUT_POST, "password")
	){
		$firstName = filter_input(INPUT_POST, "first_name");
		$lastName = filter_input(INPUT_POST, "last_name");
		$userName = filter_input(INPUT_POST, "username");
		$password = filter_input(INPUT_POST, "password");
		$password = password_hash($password, PASSWORD_BCRYPT);

		include("../../scripts/database/connection.php");
		try{
			$checkStmt = $connection->prepare("SELECT * FROM users WHERE username=:username");
			$checkStmt->execute(array(":username"=>$userName));
			$data = $checkStmt->fetchAll();
			if(count($data)>0){
				$_SESSION["error"] = "Username not available.";
			} else {
				$stmt = $connection->prepare("INSERT INTO users(first_name, last_name, username, password) VALUES(:firstName, :lastName, :userName, :password)");
				$stmt->bindParam(":firstName", $firstName, PDO::PARAM_STR);
				$stmt->bindParam(":lastName", $lastName, PDO::PARAM_STR);
				$stmt->bindParam(":userName", $userName, PDO::PARAM_STR);
				$stmt->bindParam(":password", $password, PDO::PARAM_STR);
				$stmt->execute();
				unset($_SESSION["error"]);
				$_SESSION["message"] = "User created";
			}
		} catch(PDOException $error){
			$_SESSION["error"] = "User not created.";
		}
	} else {
		$_SESSION["error"] = "Some entries are empty.";
	}
	header("Location: ../index.php?page=new-user");