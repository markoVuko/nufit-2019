<?php
	include("../config/connection.php");

	if(isset($_POST["action"])){
		if($_POST["action"]=="fillser"){
			$br=0;
				$query="SELECT * FROM userpoll WHERE IdPoll=2 AND VoteOption='Great'";
				$st=$con->prepare($query);
				$st->execute();
				$br1=count($st->fetchAll());
				$query="SELECT * FROM userpoll WHERE IdPoll=2 AND VoteOption='Good'";
				$st=$con->prepare($query);
				$st->execute();
				$br2=count($st->fetchAll());
				$query="SELECT * FROM userpoll WHERE IdPoll=2 AND VoteOption='Bad'";
				$st=$con->prepare($query);
				$st->execute();
				$br3=count($st->fetchAll());
				$query="SELECT * FROM userpoll WHERE IdPoll=2 AND VoteOption='Terrible'";
				$st=$con->prepare($query);
				$st->execute();
				$br4=count($st->fetchAll());
				$br=$br1+$br2+$br3+$br4;
				$per = 100/$br;
				$query="SELECT * FROM userpoll WHERE IdPoll=2 AND IdUser=:userId";
				$st=$con->prepare($query);
				$st->bindParam(":userId",$_POST["userId"]);
				$st->execute();
				$send = [];
				if(count($st->fetchAll())>0)
				{
					$send[4]=1;
				}
				else {
					$send[4]=0;
				}
				$send[0]= ceil($br1*$per);
				$send[1] = ceil($br2*$per);
				$send[2] = ceil($br3*$per);
				$send[3] = ceil($br4*$per);
				echo json_encode($send);
		}

		if($_POST["action"]=="filllab"){
			$br=0;
				$query="SELECT * FROM userpoll WHERE IdPoll=1 AND VoteOption='Hammer'";
				$st=$con->prepare($query);
				$st->execute();
				$br1=count($st->fetchAll());
				$query="SELECT * FROM userpoll WHERE IdPoll=1 AND VoteOption='Steelborn'";
				$st=$con->prepare($query);
				$st->execute();
				$br2=count($st->fetchAll());
				$br=$br1+$br2;
				$per = 100/$br;
				$per1 = ceil($br1*$per);
				$per2 = ceil($br2*$per);
				$send = [];
				$query="SELECT * FROM userpoll WHERE IdPoll=1 AND IdUser=:userId";
				$st=$con->prepare($query);
				$st->bindParam(":userId",$_POST["userId"]);
				try {
					$st->execute();
					if(count($st->fetchAll())>0)
					{
						$send[2]=1;
					}
					else {
						$send[2]=0;
					}
					$send[0]=$per1;
					$send[1]=$per2;
					echo json_encode($send);
				}
				catch(PDOException $e){
					logError(500);
				}
		}
		if($_POST["action"]=="fillcat"){
			$br=0;
				$query="SELECT * FROM userpoll WHERE IdPoll=3 AND VoteOption='Accessories'";
				$st=$con->prepare($query);
				$st->execute();
				$br1=count($st->fetchAll());
				$query="SELECT * FROM userpoll WHERE IdPoll=3 AND VoteOption='Cardio'";
				$st=$con->prepare($query);
				$st->execute();
				$br2=count($st->fetchAll());
				$query="SELECT * FROM userpoll WHERE IdPoll=3 AND VoteOption='Stationary'";
				$st=$con->prepare($query);
				$st->execute();
				$br3=count($st->fetchAll());
				$query="SELECT * FROM userpoll WHERE IdPoll=3 AND VoteOption='Weights'";
				$st=$con->prepare($query);
				$st->execute();
				$br4=count($st->fetchAll());
				$br=$br1+$br2+$br3+$br4;
				$per = 100/$br;
				$query="SELECT * FROM userpoll WHERE IdPoll=3 AND IdUser=:userId";
				$st=$con->prepare($query);
				$st->bindParam(":userId",$_POST["userId"]);
				try {
					$st->execute();
					$send = [];
					if(count($st->fetchAll())>0)
					{
						$send[4]=1;
					}
					else {
						$send[4]=0;
					}
					$send[0]= ceil($br1*$per);
					$send[1] = ceil($br2*$per);
					$send[2] = ceil($br3*$per);
					$send[3] = ceil($br4*$per);
					echo json_encode($send);}
					catch(PDOException $e){
						logError(500);
					}
		}

		if($_POST["action"]=="voteLabel"){
			$query = "SELECT * FROM userpoll WHERE IdUser=:userId AND IdPoll=:pollId";
			$st = $con->prepare($query);
			$st->bindParam(":userId",$_POST["userId"]);
			$st->bindParam(":pollId",$_POST["pollId"]);
			$st->execute();
			$rows=count($st->fetchAll());
			if($rows==0){
				$query="INSERT INTO userpoll(VoteOption,IdUser,IdPoll) VALUES(:choice,:userId,:pollId)";
				$st = $con->prepare($query);
				$st->bindParam(":userId",$_POST["userId"]);
				$st->bindParam(":pollId",$_POST["pollId"]);
				$st->bindParam(":choice",$_POST["option"]);
				try {
					$st->execute();
				}
				catch(PDOException $e){
					logError(412);
				}
			}
			try {
				$br=0;
				$query="SELECT * FROM userpoll WHERE IdPoll=1 AND VoteOption='Hammer'";
				$st=$con->prepare($query);
				$st->execute();
				$br1=count($st->fetchAll());
				$query="SELECT * FROM userpoll WHERE IdPoll=1 AND VoteOption='Steelborn'";
				$st=$con->prepare($query);
				$st->execute();
				$br2=count($st->fetchAll());
				$br=$br1+$br2;
				$per = 100/$br;
				$per1 = ceil($br1*$per);
				$per2 = ceil($br2*$per);
				$send = [];
				$send[0]=$per1;
				$send[1]=$per2;
				echo json_encode($send);
			}
			catch(PDOException $e){
				logError(500);
			}
		}

		if($_POST["action"]=="voteservices"){
			$query = "SELECT * FROM userpoll WHERE IdUser=:userId AND IdPoll=:pollId";
			$st = $con->prepare($query);
			$st->bindParam(":userId",$_POST["userId"]);
			$st->bindParam(":pollId",$_POST["pollId"]);
			$st->execute();
			$rows=count($st->fetchAll());
			if($rows==0){
				$query="INSERT INTO userpoll(VoteOption,IdUser,IdPoll) VALUES(:choice,:userId,:pollId)";
				$st = $con->prepare($query);
				$st->bindParam(":userId",$_POST["userId"]);
				$st->bindParam(":pollId",$_POST["pollId"]);
				$st->bindParam(":choice",$_POST["option"]);
				try {
					$st->execute();
				}
				catch(PDOException $e){
					logError(500);
				}
			}
			try {
				$br=0;
				$query="SELECT * FROM userpoll WHERE IdPoll=2 AND VoteOption='Great'";
				$st=$con->prepare($query);
				$st->execute();
				$br1=count($st->fetchAll());
				$query="SELECT * FROM userpoll WHERE IdPoll=2 AND VoteOption='Good'";
				$st=$con->prepare($query);
				$st->execute();
				$br2=count($st->fetchAll());
				$query="SELECT * FROM userpoll WHERE IdPoll=2 AND VoteOption='Bad'";
				$st=$con->prepare($query);
				$st->execute();
				$br3=count($st->fetchAll());
				$query="SELECT * FROM userpoll WHERE IdPoll=2 AND VoteOption='Terrible'";
				$st=$con->prepare($query);
				$st->execute();
				$br4=count($st->fetchAll());
				$br=$br1+$br2+$br3+$br4;
				$per = 100/$br;
				$send = [];
				$send[0]= ceil($br1*$per);
				$send[1] = ceil($br2*$per);
				$send[2] = ceil($br3*$per);
				$send[3] = ceil($br4*$per);
				echo json_encode($send);
			}
			catch(PDOException $e){
				logError(412);
			}
		}

		if($_POST["action"]=="votecat"){
			$query = "SELECT * FROM userpoll WHERE IdUser=:userId AND IdPoll=:pollId";
			$st = $con->prepare($query);
			$st->bindParam(":userId",$_POST["userId"]);
			$st->bindParam(":pollId",$_POST["pollId"]);
			$st->execute();
			$rows=count($st->fetchAll());
			if($rows==0){
				$query="INSERT INTO userpoll(VoteOption,IdUser,IdPoll) VALUES(:choice,:userId,:pollId)";
				$st = $con->prepare($query);
				$st->bindParam(":userId",$_POST["userId"]);
				$st->bindParam(":pollId",$_POST["pollId"]);
				$st->bindParam(":choice",$_POST["option"]);
				try {
					$st->execute();
				}
				catch(PDOException $e){
					logError(500);
				}
			}
			try {
				$br=0;
				$query="SELECT * FROM userpoll WHERE IdPoll=3 AND VoteOption='Accessories'";
				$st=$con->prepare($query);
				$st->execute();
				$br1=count($st->fetchAll());
				$query="SELECT * FROM userpoll WHERE IdPoll=3 AND VoteOption='Cardio'";
				$st=$con->prepare($query);
				$st->execute();
				$br2=count($st->fetchAll());
				$query="SELECT * FROM userpoll WHERE IdPoll=3 AND VoteOption='Stationary'";
				$st=$con->prepare($query);
				$st->execute();
				$br3=count($st->fetchAll());
				$query="SELECT * FROM userpoll WHERE IdPoll=3 AND VoteOption='Weights'";
				$st=$con->prepare($query);
				$st->execute();
				$br4=count($st->fetchAll());
				$br=$br1+$br2+$br3+$br4;
				$per = 100/$br;
				$send = [];
				$send[0]= ceil($br1*$per);
				$send[1] = ceil($br2*$per);
				$send[2] = ceil($br3*$per);
				$send[3] = ceil($br4*$per);
				echo json_encode($send);
			}
			catch(PDOException $e){
				logError(500);
			}
		}
	}
	else {
		header("Location: ../index.php");
	}
 ?>