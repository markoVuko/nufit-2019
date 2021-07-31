<?php 

	include("../config/connection.php");

	try{
		$query="SELECT * FROM customers";
		$st=$con->prepare($query);
		$st->execute();
		$res=$st->fetchAll();
		echo json_encode($res);
	}
	catch(Exception $e)
	{
		logError(500);
	}
?>