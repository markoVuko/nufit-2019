<?php session_start();  include "../../config/connection.php"; 
	pristupStrani();
	if(!isset($_SESSION["user"]))
			{
				header("Location: ../../index.php");
			}
	?>
<!DOCTYPE html>
<html>
<head>

	<title>NuFit | User Settings </title>
	<meta charset="UTF-8">
	<meta name="description" content="Fitness gear and equipment store">
	<meta name="keywords" content="fit,fitness,gear,equipment,weight,weights,barbell,barbells,dumbell,dumbells,cardio,exercise,workout">
	<meta name="author" content="mailto:nufit@gmail.com">
	<meta name="robots" content="follow, index">
	<meta name="copyright" content="NuFit Fitness & Exercise">
	<meta name="language" content="english">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../../assets/images/favicon.png" type="image/gif" sizes="16x16">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/design.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/menu-script.js"></script>
	<script type="text/javascript" src="../../assets/js/scroll-script.js"></script>
	<script type="text/javascript" src="../../assets/js/settings-script.js"></script>
</head>
<body>
	<div id="cover">
		
		<div class="content" id="content-machines">
			<div class="content-block">
				<h2>Stationary Exercise Machines</h2>
				<p>Butterfly machines, inclined press', row machines, etc.</p>
				<a href="products.php"><button>Show Products!</button></a>
			</div>
		</div>
		<div class="content" id="content-weights">
			<div class="content-block">
				<h2>Free Weights and Gear</h2>
				<p>Dumbells, Barbells, Polls, etc.</p>
				<a href="products.php"><button>Show Products!</button></a>
			</div>
		</div>
	</div>
	<div id="menu">
		<header>
			<a href="../../index.php"><img src="../../assets/images/logo.png" alt="Logo">
			<h1>NuFit</h1></a>
		</header>
		<nav>
			<ul>
				
			</ul>
			<a href="#" class="nav-bars"><i class="fa fa-bars"></i></a>
		</nav>
	</div>
	<div id="phone-nav">
		<nav>
			<ul>
				
			</ul>
		</nav>
	</div>
	
	<div id="settings">
		<form action="../../models/settings-fetch.php" method="POST" onsubmit="return validacija();" enctype="multipart/form-data">
			<h3>User Settings</h3>
			<hr>
			<?php
				$st=$con->prepare("SELECT * FROM users WHERE Id=:id");
				$id = $_SESSION["user"]->Id;
				$st->bindParam(":id",$id);
				$st->execute();
				$user = $st->fetch();
				$_SESSION["user"]=$user;
			 ?>
			<label id="username_field"><?php echo $_SESSION["user"]->Username; ?></label><br>
			<input type="hidden" name="hidid" value="<?php echo $_SESSION["user"]->Id ?>">
			<input type="email" id="setmail" name="setmail" value="<?php echo $_SESSION["user"]->Email ?>"><br>
			<input type="password" id="setpw1" name="setpw1" placeholder="New password..."><br>
			<input type="password" id="setpw2" name="setpw2" placeholder="Confirm new password..."><hr>
			<?php
				if($_SESSION["user"]->IdImage!=null){
					$st=$con->prepare("SELECT * FROM profileimages WHERE IdImage=:id");
					$st->bindParaM(":id",$_SESSION["user"]->IdImage);
					try {
						$st->execute();
						$img = $st->fetch();
						echo "<img src='"."../../".$img->Path."' alt='".$img->Alt."' id='userProfile'>";
					}
					catch(PDOEXCEPTION $e){
						echo $e->getMessage();
					}
				} else {
					echo "<img src='../../assets/images/profile.png' alt='profile image' id='userProfile'>";
				}
			 ?>
			<br><input type="file" id="setprofile" name="setprofile"><br>
			<input type="submit" id="setsub" name="setsub" value="Update settings">
		</form>

	</div>

	<footer>
		
	</footer>
</body>
</html>