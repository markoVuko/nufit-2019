<?php 
	include("../config/connection.php");
	session_start();

	if(isset($_POST["login"]))
	{
		$greske = [];
		if(empty($_POST["username"])||empty($_POST["pw"]))
		{
			echo "Invalid login details.";
		}
		else 
		{
			$username=$_POST["username"];
			$pw=$_POST["pw"];
			$usernameRX = "/^\w{4,12}$/";
			if(!preg_match($usernameRX, $username))
			{
				echo "Invalid username.";
				logError(422);
			}
			try 
			{
				$query="SELECT * FROM users WHERE Username=:username";
				$st = $con->prepare($query);
				$st->bindParam(":username",$username);
				$st->execute();
				$user=$st->fetch();
				if(!isset($user->Password)){
					logError(422);
					echo "Invalid username";
				}
				else {
					$pw5=md5($pw);
					if($pw5==$user->Password)
					{
						$_SESSION["user"]=$user;
					}
					else 
					{
						logError(422);
						mail($user->Email, "Failed login", "Someone just attempted to acces your account on NuFit with an incorrect password.");
						echo "Invalid password.";
					}
				}
				
			}
			catch(PDOException $e)
			{
				logError(500);
				echo $e->getMessage();
			}
		}
	}	
	else {
		header("Location: ../index.php");
	}
?>