<?php 
	include("../config/connection.php");

	if(isset($_POST["insProd"])){
			if(empty($_POST["ipname"])||empty($_POST["iplabel"])||empty($_POST["ipdesc"])||empty($_POST["ipcat"])||empty($_POST["iprate"])||empty($_POST["ippnew"])||$_POST["ippold"]<0)
			{
				logError(412);
				echo "<script type='text/javascript'>alert('Insert failed: Form has empty field.'); </script>";
				echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
			}
			else {
				$query = "INSERT INTO products(Name,Label,Description,Category,Rating,PriceNew,PriceOld,Path,Alt) VALUES(:name,:label,:desc,:cat,:rate,:priceNew,:priceOld,:path,:alt)";
				$path="";
				$alt="";
				if(filesize($_FILES["ipimg"]["tmp_name"])>0)
				{
					if(filesize($_FILES["ipimg"]["tmp_name"])<10*1024*1024){
						$tmp = $_FILES["ipimg"]["tmp_name"];
						$name = $_FILES["ipimg"]["name"];
						$type = $_FILES["ipimg"]["type"];
						$dir = "../assets/images/products/";
						if($type=="image/jpeg"||$type=="image/png")
						{
							$path = $dir.time().$name;
							move_uploaded_file($tmp, $path);
							$n = explode(".",$name);
							$alt = $n[0];
							$path = "../".$path;
							$st = $con->prepare($query);
							$st->bindParam(":name",$_POST["ipname"]);
							$st->bindParam(":label",$_POST["iplabel"]);
							$st->bindParam(":desc",$_POST["ipdesc"]);
							$st->bindParam(":cat",$_POST["ipcat"]);
							$st->bindParam(":rate",$_POST["iprate"]);
							$st->bindParam(":priceNew",$_POST["ippnew"]);
							$st->bindParam(":priceOld",$_POST["ippold"]);
							$st->bindParam(":path",$path);
							$st->bindParam(":alt",$alt);
							try {
								$st->execute();
								echo "<script type='text/javascript'>alert('Product inserted.'); </script>";
								echo "<script type='text/javascript'>location='../views/pages/admin.php';</script>";
							}
							catch(Exception $e){
								echo $e;
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
	} else {
		header("Location: ../index.php");
	}
