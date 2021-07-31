<?php session_start(); 
	include "../../config/connection.php";
pristupStrani();
		if(!isset($_SESSION["user"])){
		header("Location: ../../index.php");
	} 
	?>
<!DOCTYPE html>
<html>
<head>
	
	<title>NuFit | Survey </title>
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
	<script type="text/javascript" src="../../assets/js/survey-script.js"></script>
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
	
	<div id="survey-background">
		<div class="survey-wrap">
			<div class="survey-options">
				<h3>What is your favorite label?</h3>
				<input type="radio" name="label" value="Steelborn"> <label>Steelborn</label><br>
				<input type="radio" name="label" value="Hammer"> <label>Hammer</label><br>
				<button id="vote-label" data-id="<?php echo $_SESSION['user']->Id ?>">Vote</button>
				<input type="hidden" id="label-hid" value="1">
			</div>
			<div class="survey-results" id="label-results">
				
			</div>
		</div>
		<div class="survey-wrap">
			<div class="survey-options">
				<h3>How would you rate our services?</h3>
				<input type="radio" name="services" value="Great"> <label>Great</label><br>
				<input type="radio" name="services" value="Good"> <label>Good</label><br>
				<input type="radio" name="services" value="Bad"> <label>Bad</label><br>
				<input type="radio" name="services" value="Terrible"> <label>Terrible</label><br>
				<button id="vote-services" data-id="<?php echo $_SESSION['user']->Id ?>">Vote</button>
				<input type="hidden" id="services-hid" value="2">
			</div>
			<div class="survey-results" id="services-results">
				
			</div>
		</div>
		<div class="survey-wrap">
			<div class="survey-options">
				<h3>What is your favorite category?</h3>
				<input type="radio" name="category" value="Accessories"> <label>Accessories</label><br>
				<input type="radio" name="category" value="Cardio"> <label>Cardio</label><br>
				<input type="radio" name="category" value="Stationary"> <label>Stationary</label><br>
				<input type="radio" name="category" value="Weights"> <label>Weights</label><br>
				<button id="vote-category" data-id="<?php echo $_SESSION['user']->Id ?>">Vote</button>
				<input type="hidden" id="category-hid" value="3">
			</div>
			<div class="survey-results" id="category-results">
				
			</div>
		</div>
	</div>

	<footer>
		
	</footer>
</body>
</html>