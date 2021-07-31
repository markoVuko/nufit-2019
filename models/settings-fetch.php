<?php
	include "../config/connection.php";

	if(isset($_POST["setsub"])) {
		if(!filter_var($_POST["setmail"])) {
			echo "<script type='text/javascript'>alert('You have to enter a valid email!');location='../views/pages/user-settings.php';</script>";
			
		} else {
			$mail = $_POST["setmail"];
			$userid = $_POST["hidid"];
			$lozinke = true;
			if(empty($_POST["setpw1"])&&empty($_POST["setpw2"])) {
				$lozinke = false;
			}
			$slazu = false;
			$pwRX = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[A-Za-z0-9]{8,30}$/";
			if($lozinke==true&&(empty($_POST["setpw1"])||empty($_POST["setpw2"]))) {
				echo "<script type='text/javascript'>alert('You have to confirm your passowrd!');location='../views/pages/user-settings.php';</script>";
				
			}
			if($lozinke==true&&(preg_match($pwRX, $_POST["setpw1"])&&preg_match($pwRX, $_POST["setpw2"]))) {
				$slazu=true;
			}

			$slika_upload = false;
			if(filesize($_FILES["setprofile"]["tmp_name"])>0){
				$slika_upload=true;
			}
			
			if($lozinke) {
				if($slazu){
					$st=$con->prepare("UPDATE users SET Email=:email, Password=:password WHERE Id=:id");
					$pw = md5($_POST["setpw1"]);
					$st->bindParam(":email",$mail);
					$st->bindParam(":password",$pw);
					$st->bindParam(":id",$userid);
					try {
						$st->execute();
						if($slika_upload==false){
							echo "<script type='text/javascript'>alert('Information updated.');location='../views/pages/user-settings.php';</script>";
							
						}
					}
					catch(PDOException $e){
						logError(500);
						echo "<script type='text/javascript'>alert('Server error.');location='../views/pages/user-settings.php';</script>";
						
					}
				}  else {
							logError(412);
							echo "<script type='text/javascript'>alert('The passwords do not match.');location='../views/pages/user-settings.php';</script>";
							
						}
			} else {
				$st=$con->prepare("UPDATE users SET Email=:email WHERE Id=:id");
					$st->bindParam(":email",$mail);
					$st->bindParam(":id",$userid);
					try {
						$st->execute();
						if($slika_upload==false){
							echo "<script type='text/javascript'>alert('Information updated.');location='../views/pages/user-settings.php';</script>";
							
						}
					}
					catch(PDOException $e){
						logError(500);
						echo "<script type='text/javascript'>alert('Server error.');location='../views/pages/user-settings.php';</script>";
						
				}

			}

			if($slika_upload){
				$name = $_FILES["setprofile"]["name"];
				$tmp = $_FILES["setprofile"]["tmp_name"];
				$type = $_FILES["setprofile"]["type"];
				$size = $_FILES["setprofile"]["size"];
				if($size<=5*1024*1024){
					switch($type){
					case "image/jpeg": case "image/jpg": 
						$slika = imagecreatefromjpeg($tmp);
						break;
					case "image/png": 
						$slika = imagecreatefrompng($tmp);
						break;
					case "image/gif": 
						$slika = imagecreatefromgif($tmp);
					}
					$dim = 200;
					$old_dims = getimagesize($tmp);
					$new_dims = $old_dims;
					if($dim<$old_dims[0]){
						$ratio = $dim/$old_dims[0];
						$new_dims[0] = $dim;
						$new_dims[1] = $old_dims[1]*$ratio;
					}
					if($dim<$old_dims[1]){
						$ratio = $dim/$old_dims[1];
						$new_dims[1] = $dim;
						$new_dims[0] = $old_dims[0]*$ratio;
					}
					$nova_slika = imagecreatetruecolor($new_dims[0], $new_dims[1]);
					imagecopyresampled($nova_slika, $slika, 0, 0, 0, 0, $new_dims[0], $new_dims[1], $old_dims[0], $old_dims[1]);
					$path = "assets/images/".time().$name;
					$split = explode(".",$name);
					switch($type){
					case "image/jpeg": case "image/jpg": 
						imagejpeg($nova_slika,"../".$path);
						break;
					case "image/png": 
						imagepng($nova_slika,"../".$path);
						break;
					case "image/gif": 
						imagegif($nova_slika,"../".$path);
					}
					$st=$con->prepare("INSERT INTO profileimages(Path,Alt) VALUES(:p,:a)");
					$st->bindParam(":p",$path);
					$st->bindParam(":a",$split[0]);
					try {
						$st->execute();
						$id = $con->lastInsertId();
						$st=$con->prepare("UPDATE users SET IdImage=:a WHERE Id=:id");
						$st->bindParam(":a",$id);
						$st->bindParam(":id",$userid);
						try {
							$st->execute();
							echo "<script type='text/javascript'>alert('Information updated.');location='../views/pages/user-settings.php';</script>";
							
						}
						catch(PDOException $e) {
							logError(500);
							echo "<script type='text/javascript'>alert('Failed image binding.');location='../views/pages/user-settings.php';</script>";
						}
					}
					catch(PDOException $e){
						logError(500);
						echo "<script type='text/javascript'>alert('Failed image upload.');location='../views/pages/user-settings.php';</script>";
					}
				} else {
					logError(413);
					echo "<script type='text/javascript'>alert('The image has to be equal to or less than 5MB.');location='../views/pages/user-settings.php';</script>";
					
				}
			}
	} }else {
		header("Location: ../index.php");
	}