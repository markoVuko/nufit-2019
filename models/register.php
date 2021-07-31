<?php 
	include("../config/connection.php");

	if(isset($_POST["register"]))
	{
		$greske = [];
		if(empty($_POST["username"])||empty($_POST["email"])||empty($_POST["pw1"])||empty($_POST["pw2"]))
		{	
			array_push($greske, "One of your fields is empty.");
			echo json_encode($greske);
			logError(422);
		}
		else 
		{
			$username = $_POST["username"];
			$email = $_POST["email"];
			$pw1 = $_POST["pw1"];
			$pw2 = $_POST["pw2"];
			$usernameRX = "/^\w{4,12}$/";
			$pwRX = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[A-Za-z0-9]{8,30}$/";
			if(!preg_match($usernameRX, $username))
			{
				array_push($greske, "Username has to be only letters and numbers and long 4-12 characters.");
			}
			if(!preg_match($pwRX,$pw1))
			{
				array_push($greske,"Passwrod has to contain one uppercase letter, one lowercase letter, one number, and be 8-30 characters long");
			}
			if($pw1!=$pw2)
			{
				array_push($greske, "Passwords don't match");
			}
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				array_push($greske,"Email format is invalid");
			}
			if(count($greske)>0)
			{
				echo json_encode($greske);
				logError(422);
			}
			if(count($greske)==0)
			{
				try 
				{
					$query="INSERT INTO users(Username,Email,Password,IdRole) VALUES(:username,:email,:password,2)";
					$pw=md5($pw1);
					$st=$con->prepare($query);
					$st->bindParam(":username",$username);
					$st->bindParam(":email",$email);
					$st->bindParam(":password",$pw);
					$st->execute();
				}
				catch(PDOxception $e)
				{
					array_push($greske, $e);
					echo json_encode($greske);
					logError(422);
				}

			}
		}
	}
	else {
		header("Location: ../index.php");
	}
?>