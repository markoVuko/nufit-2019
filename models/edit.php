<?php 
	include("../config/connection.php");

	if(isset($_POST["saveProd"])){
			if(!empty($_POST["epname"])&&!empty($_POST["eplabel"])&&!empty($_POST["epdesc"])&&!empty($_POST["eppnew"])&&!empty($_POST["epcat"])&&!empty($_POST["eprate"])&&!empty($_POST["epid"])) {
				$query = "UPDATE products SET Name=:name, Label=:label, Description=:description, Category=:cat, PriceNew=:priceNew, PriceOld=:priceOld, Rating=:rate";
				$path="";
				$alt="";
				$im = false;
				if(filesize($_FILES["epimg"]["tmp_name"])>0)
				{
					if(filesize($_FILES["epimg"]["tmp_name"])<10*1024*1024){
						$tmp = $_FILES["epimg"]["tmp_name"];
						$name = $_FILES["epimg"]["name"];
						$type = $_FILES["epimg"]["type"];
						$dir = "../assets/images/products/";
						if($type=="image/jpeg"||$type=="image/png")
						{
							$im = true;
							$path = $dir.time().$name;
							move_uploaded_file($tmp, $path);
							$n = explode(".",$name);
							$alt = $n[0];
							$path = "../".$path;
							$query .= ", Path=:path, Alt=:alt";
						} else {
							logError(412);
							echo "<script type='text/javascript'>alert('File must be jpeg or png image.'); </script>";
							echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
						}
					} else {
						logError(413);
						echo "<script type='text/javascript'>alert('Image is too large.'); </script>";
						echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
					}
					
					
				}
				$query .= "  WHERE Id=:id";
				$st = $con->prepare($query);
				$st->bindParam(":name",$_POST["epname"]);
				$st->bindParam(":label",$_POST["eplabel"]);
				$st->bindParam(":description",$_POST["epdesc"]);
				$st->bindParam(":cat",$_POST["epcat"]);
				$st->bindParam(":priceNew",$_POST["eppnew"]);
				$st->bindParam(":priceOld",$_POST["eppold"]);
				if($im){
					$st->bindParam(":path",$path);
					$st->bindParam(":alt",$alt);
				}
				$st->bindParam(":id",$_POST["epid"]);
				$st->bindParam(":rate",$_POST["eprate"]);
				try {
					$st->execute();
					echo "<script type='text/javascript'>alert('Product updated.'); </script>";
					echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
				}
				catch(Exception $e){
					logError(500);
					echo "<script type='text/javascript'>alert('Update failed.'); </script>";
					echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
				}
			}
		}

		else if(isset($_POST["saveSta"])){
			if(!empty($_POST["estaname"])&&!empty($_POST["ecid"])){
				$query = "UPDATE staff SET Text=:text";
				$path="";
				$alt="";
				$im = false;
				if(filesize($_FILES["estaimg"]["tmp_name"])>0)
				{
					if(filesize($_FILES["estaimg"]["tmp_name"])<5*1024*1024){
						$tmp = $_FILES["estaimg"]["tmp_name"];
						$name = $_FILES["estaimg"]["name"];
						$type = $_FILES["estaimg"]["type"];
						$dir = "assets/images/";
						if($type=="image/jpeg"||$type=="image/png")
						{
							$im = true;
							$path = $dir.time().$name;
							move_uploaded_file($tmp, "../".$path);
							$n = explode(".",$name);
							$alt = $n[0];
							$query .= ", Path=:path, Alt=:alt";
						} else {
							logError(412);
							echo "<script type='text/javascript'>alert('File must be jpeg or png image.'); </script>";
							echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
						}
					} else {
						logError(413);
						echo "<script type='text/javascript'>alert('Image is too large.'); </script>";
						echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
					}
					
					
				}
				$query .= "  WHERE IdStaff=:id";
				$st = $con->prepare($query);
				$st->bindParam(":text",$_POST["estaname"]);
				$st->bindParam(":id",$_POST["ecid"]);
				if($im){
					$st->bindParam(":path",$path);
					$st->bindParam(":alt",$alt);
				}
				try {
					$st->execute();
					echo "<script type='text/javascript'>alert('Staff member updated.'); </script>";
					echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
				}
				catch(Exception $e){
					logError(500);
					echo "<script type='text/javascript'>alert('Update failed.'); </script>";
					echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
				}
			}
		}

		else if(isset($_POST["saveCus"])){
			if(!empty($_POST["ecuid"])&&!empty($_FILES["ecusimg"])){
				$query = "UPDATE customers SET  Path=:path, Alt=:alt WHERE IdCustomers=:id";
				$path="";
				$alt="";
				if(filesize($_FILES["ecusimg"]["tmp_name"])>0)
				{
					if(filesize($_FILES["ecusimg"]["tmp_name"])<5*1024*1024){
						$tmp = $_FILES["ecusimg"]["tmp_name"];
						$name = $_FILES["ecusimg"]["name"];
						$type = $_FILES["ecusimg"]["type"];
						$dir = "assets/images/";
						if($type=="image/jpeg"||$type=="image/png")
						{
							$path = $dir.time().$name;
							move_uploaded_file($tmp, "../".$path);
							$n = explode(".",$name);
							$alt = $n[0];
							$st = $con->prepare($query);
							$st->bindParam(":alt",$alt);
							$st->bindParam(":path",$path);
							$st->bindParam(":id",$_POST["ecuid"]);
							try {
								$st->execute();
								echo "<script type='text/javascript'>alert('Customer updated.'); </script>";
								echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
							}
							catch(PDOException $e){
								logError(500);
								echo "<script type='text/javascript'>alert('Update failed.'); </script>";
								echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
							}
						} else {
							logError(412);
							echo "<script type='text/javascript'>alert('File must be jpeg or png image.'); </script>";
							echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
						}
					} else {
						logError(413);
						echo "<script type='text/javascript'>alert('Image is too large.'); </script>";
						echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
					}
					
					
				}
				
			}
		}

		else if(isset($_POST["saveUser"])){
				$usernameRX = "/^\w{4,12}$/";
			if(preg_match($usernameRX, $_POST["euname"])&&filter_var($_POST["euemail"],FILTER_VALIDATE_EMAIL)){
				echo "aa";
				$query = "UPDATE users SET  Username=:username, Email=:email,";
				if(!empty($_POST["pass"])){
					$pwRX = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[A-Za-z0-9]{8,30}$/";
					$pw = empty($_POST["eupass"]);
					if(preg_match($pwRX, $pw));
					$query.=" Password=:pass,";
				}
				$query.="  IdRole=:role WHERE Id=:id";
				$st = $con->prepare($query);
				$st->bindParam(":username",$_POST["euname"]);
				$st->bindParam(":email",$_POST["euemail"]);
				if(!empty($_POST["eupass"])){
					$pw5=md5($pw);
					$st->bindParam(":pass",$pw5);
				}
				$st->bindParam(":role",$_POST["eurole"]);
				$st->bindParam(":id",$_POST["euid"]);

				try {
					$st->execute();
					echo "User updated.";
				}
				catch(PDOException $e){
					echo $e->getMessage();
					echo "AAAAAA";
				}
			} else {
						logError(428);
						echo "<script type='text/javascript'>alert('Your input is invalid.'); </script>";
						echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
			}
				$query="INSERT INTO profileimages(Path,Alt) VALUES(:p,:a)";
				$path="";
				$alt="";
				if(filesize($_FILES["euimg"]["tmp_name"])>0)
				{
					if(filesize($_FILES["euimg"]["tmp_name"])<5*1024*1024){
						$tmp = $_FILES["euimg"]["tmp_name"];
						$name = $_FILES["euimg"]["name"];
						$type = $_FILES["euimg"]["type"];
						$dir = "assets/images/";
						if($type=="image/jpeg"||$type=="image/png")
						{
							$path = $dir.time().$name;
							move_uploaded_file($tmp, "../".$path);
							$n = explode(".",$name);
							$alt = $n[0];
							$st = $con->prepare($query);
							$st->bindParam(":a",$alt);
							$st->bindParam(":p",$path);
							try {
								$st->execute();
								$idimg = $con->lastInsertId();
								$euid=$_POST["euid"];
								$st=$con->prepare("UPDATE users SET IdImage=:idimg WHERE Id=:id");
								$st->bindParam(":idimg",$idimg);
								$st->bindParam(":id",$euid);
								try {
									$st->execute();
									echo "<script type='text/javascript'>alert('Image inserted successfully.'); </script>";
									echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
								}
								catch(PDOEXCEPTION $e){
									logError(500);
									echo "<script type='text/javascript'>alert('Image binding failed.'); </script>";
									echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
								}
							}
							catch(PDOException $e){
								logError(500);
								echo "<script type='text/javascript'>alert('Image insert failed.'); </script>";
								echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
								
							}
						} else {
							logError(412);
							echo "<script type='text/javascript'>alert('File must be jpeg or png image.'); </script>";
							echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
						}
					} else {
						logError(413);
						echo "<script type='text/javascript'>alert('Image is too large.'); </script>";
						echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
					}
					
					
				}
		}
		else {
			header("Location: ../index.php");
		}

		