<?php 
	include("../config/connection.php");
	if(isset($_POST["action"])){
		if($_POST["action"]=="customers"){
			$query="SELECT * FROM customers";
			$st=$con->prepare($query);
			$st->execute();
			$ispis = "";
			while($row=$st->fetch())
			{ 
				$ispis .= '<a href="#"><img src="'.$row->Path.'" alt="'.$row->Alt.'"></a>';
			}
			echo $ispis;
		}

		if($_POST["action"]=="staff"){
			$query="SELECT * FROM staff";
			$st=$con->prepare($query);
			$st->execute();
			$ispis = "";
			while($row=$st->fetch())
			{ 
				$ispis .= '<div class="member">
					<a href="#"><img src="'.$row->Path.'" alt="'.$row->Alt .'"></a>
					<h4>'.$row->Text.'</h4>
				</div>';
			}
			echo $ispis;
		}
	}
	else {	
		header("Location: ../index.php");
	}

?>