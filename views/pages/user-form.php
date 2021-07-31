<?php include("../../config/connection.php");
	session_start();
	pristupStrani();
	if(isset($_SESSION["user"]))
	{
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}
	if(isset($_POST["return"]))
	{
		header("Location: ../../index.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>NuFit | User Form </title>
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
	<script type="text/javascript" src="../../assets/js/user-script.js"></script>
</head>
<body style="background-color: #DEDEDE;">
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"><input type="submit" name="return" id="return" value="Return Home"></form>
	<div id="form-tabs">
		<div id="tabs">
			<ul>
				<li><a href="login-form">Log In</a></li>
				<li><a href="register-form" class="notsel">Register</a></li>
			</ul>
		</div>
		<div id="tab-content">
			<div class="tab-block" id="login-form">
				<h1>Log In</h1>
				<form id="log-form">
					<label>Username:</label><br>
					<input type="text"  id="l-username"><br>
					<label class="val-error">Username must be letters/numbers, 4-12 characters.</label><br>
					<label>Password:</label><br>
					<input type="password" id="l-password"><br>
					<label class="val-error">Password must contain one upper and lower case character, one number, 8-30 characters.</label><br>
					<input type="submit" name="login" id="login">
				</form>
			</div>
			<div class="tab-block" id="register-form">
				<h1>Register</h1>
				<form  id="reg-form">
					<label>Username:</label><br>
					<input type="text" id="r-username"><br>
					<label class="val-error">Username must be letters/numbers, 4-12 characters.</label><br>
					<label>Email:</label><br>
					<input type="text" id="email"><br>
					<label class="val-error">Invalid email.</label><br>
					<label>Password:</label><br>
					<input type="password" id="pw1"><br>
					<label class="val-error">Password must contain one upper and lower case character, one number, 8-30 characters.</label><br>
					<label>Confirm Password:</label><br>
					<input type="password" id="pw2"><br>
					<label class="val-error">Passwords do not match.</label><br>
					<input type="submit" id="register">
				</form>
			</div>
		</div>
	</div>
</body>
</html>