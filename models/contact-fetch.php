<?php 
	include("../config/connection.php");
	if(isset($_POST["action"])){
		$firstName = $_POST["firstName"];
		$lastName = $_POST["lastName"];
		$email = $_POST["email"];
		$num = $_POST["num"];
		$gender = $_POST["gender"];
		$text = $_POST["text"];

		$firstNameRx = "/^[A-Z][a-z]{2,11}$/";
		$lastNameRx = "/^[A-Z][a-z]{2,19}$/";
		$numRX = "/^06[1-9](\s|-|\/)?[0-9]{3}(\s|-|\/)?[0-9]{3,4}$/";
		$greske = [];
		if(!preg_match($firstNameRx, $firstName)){
			array_push($greske, "Invalid first name.");
		}
		if(!preg_match($lastNameRx, $lastName)){
			array_push($greske, "Invalid last name.");
		}
		if(!preg_match($numRX, $num)){
			array_push($greske, "Invalid number.");
		}
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			array_push($greske, "Invalid email.");
		}
		if(empty($gender)){
			array_push($greske, "Pick a gender.");
		}
		if(empty($text)){
			array_push($greske, "Write your feedback.");
		}
		if(count($greske)>0){
			echo json_encode($greske);
			logError(412);
		}
		if(count($greske)==0){
			$st=$con->prepare("INSERT INTO sent(Name,Surname,Num,Email,Gender,Text) VALUES(:n,:s,:num,:e,:g,:t)");
			$st->bindParam(":n",$firstName);
			$st->bindParam(":s",$lastName);
			$st->bindParam(":num",$num);
			$st->bindParam(":e",$email);
			$st->bindParam(":g",$gender);
			$st->bindParam(":t",$text);
			try {
				$st->execute();
				http_response_code(204);
			}
			catch(PDOEXCEPTION $e){
				logError(409);
			}
		}
	}
	else {
		header("Location: ../index.php");
	}

?>