<?php 
	session_start();
	if(isset($_SESSION["user"])||!empty($_SERVER["HTTP_REFERER"])){
		unset($_SESSION["user"]);
		header("Location: ../index.php");
	}
	else {
		header("Location: ../index.php");
	}
?>