<?php session_start(); 
	include "../../config/connection.php"; 
	pristupStrani();
?>
<!DOCTYPE html>
<html>
<head>

	<title>NuFit | Contact </title>
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
	<script type="text/javascript" src="../../assets/js/contact-script.js"></script>
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
	
	<div id="hello">
		<div id="help">
			<h3>We're happy to help!</h3>
			<hr>
			<p>Send us a comment, request, or your concern, via the form below.</p>
		</div>
		<div id="social">
			<a href="#"><img src="../../assets/images/social1.png" alt="Social Icon 1"></a>
			<a href="#"><img src="../../assets/images/social2.png" alt="Social Icon 2"></a>
			<a href="#"><img src="../../assets/images/social3.png" alt="Social Icon 3"></a>
			<a href="#"><img src="../../assets/images/social4.png" alt="Social Icon 4"></a>
			<a href="#"><img src="../../assets/images/social5.png" alt="Social Icon 5"></a>
		</div>
	</div>

	<div id="contact">
		<h3>Fill out with your info</h3>
		<hr>
		<form>
			<input type="text" name="firstname" id="firstname" placeholder="First Name..."><br>
			<input type="text" name="lastname" id="lastname" placeholder="Last Name..."><br>
			<input type="email" name="email" id="email" placeholder="Email..."><br>
			<input type="text" name="number" id="number" placeholder="Number..."><br>
			<input type="radio" name="gender" value="Male"> Male 
			<input type="radio" name="gender" value="Female"> Female <br>
			<textarea placeholder="Your thoughts here..." name="feedback" id="feedback"></textarea><br>
			<input type="submit" name="submit-contact" id="submit-contact">
		</form>

		<div id="val-message">
		</div>
	</div>

	

	<div id="cimg">
		<div id="ccol">
			<h3>Our customer service team is always available</h3>
			<hr>
			<p>Our dedicated team of trained customer service professionals is always ready to respond to your questions, requests, or concerns. They are available twenty-four hours a day, worldwide!</p>
		</div>
	</div>

	<footer>
		
	</footer>
</body>
</html>