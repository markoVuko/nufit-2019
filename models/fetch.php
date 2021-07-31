<?php 
	include("../config/connection.php");

	if(isset($_POST["action"]))
	{
		if($_POST["action"]=="products"){
			$query = "SELECT * FROM products";
			if(isset($_POST["id"])){
				$query .= " WHERE id=:id";
			}
			$st = $con->prepare($query);
			if(isset($_POST["id"])){
				$st->bindParam(":id",$_POST["id"]);
			}
			$st->execute();
			$products = $st->fetchAll();
			echo json_encode($products);
		}

		if($_POST["action"]=="users"){
			$query = "SELECT * FROM users";
			if(isset($_POST["id"])){
				$query .= " WHERE id=:id";
			}
			$st = $con->prepare($query);
			if(isset($_POST["id"])){
				$st->bindParam(":id",$_POST["id"]);
			}
			$st->execute();
			$products = $st->fetchAll();
			echo json_encode($products);
		}

		if($_POST["action"]=="staff"){
			$query = "SELECT * FROM staff";
			if(isset($_POST["id"])){
				$query .= " WHERE IdStaff=:id";
			}
			$st = $con->prepare($query);
			if(isset($_POST["id"])){
				$st->bindParam(":id",$_POST["id"]);
			}
			$st->execute();
			$products = $st->fetchAll();
			echo json_encode($products);
		}

		if($_POST["action"]=="customers"){
			$query = "SELECT * FROM customers";
			if(isset($_POST["id"])){
				$query .= " WHERE IdCustomers=:id";
			}
			$st = $con->prepare($query);
			if(isset($_POST["id"])){
				$st->bindParam(":id",$_POST["id"]);
			}
			$st->execute();
			$products = $st->fetchAll();
			echo json_encode($products);
		}

		

		if($_POST["action"]=="insertuser"){
				$pwRX = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[A-Za-z0-9]{8,30}$/";
				$usernameRX = "/^\w{4,12}$/";
				if(!preg_match($pwRX, $_POST["pass"])||!preg_match($usernameRX, $_POST["username"])||!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)||empty($_POST["role"]))
				{
					echo "Insert failed: Invalid information.";
				}
				else {
					$query = "INSERT INTO users(Username,Email,Password,IdRole) VALUES(:username,:email,:pass,:role)";
					$st = $con->prepare($query);
					$pass=md5($_POST["pass"]);
					$st->bindParam(":username",$_POST["username"]);
					$st->bindParam(":email",$_POST["email"]);
					$st->bindParam(":pass",$pass);
					$st->bindParam(":role",$_POST["role"]);
					try {
						$st->execute();
						echo "User inserted.";
					}
					catch(Exception $e){
						echo $e;
					}
				}
			}

		if($_POST["action"]=="deluser"){
			$query="DELETE FROM users where Id=:id";
			$st = $con->prepare($query);
			$st->bindParam(":id",$_POST["id"]);
			try{
				$st->execute();
				echo "User deleted.";
			}
			catch(Exception $e){
				echo $e;
			}
		}

		if($_POST["action"]=="delcus"){
			$query="DELETE FROM customers where IdCustomers=:id";
			$st = $con->prepare($query);
			$st->bindParam(":id",$_POST["id"]);
			try{
				$st->execute();
				echo "Customer deleted.";
			}
			catch(Exception $e){
				echo $e;
			}
		}

		if($_POST["action"]=="delstaff"){
			$query="DELETE FROM staff where IdStaff=:id";
			$st = $con->prepare($query);
			$st->bindParam(":id",$_POST["id"]);
			try{
				$st->execute();
				echo "Staff member deleted.";
			}
			catch(Exception $e){
				echo $e;
			}
		}

		if($_POST["action"]=="delprod"){
			$query="DELETE FROM products where Id=:id";
			$st = $con->prepare($query);
			$st->bindParam(":id",$_POST["id"]);
			try{
				$st->execute();
				echo "Product deleted.";
			}
			catch(Exception $e){
				echo $e;
			}
		}
	}
	else {
		header("Location: ../index.php");
	}
	
?>