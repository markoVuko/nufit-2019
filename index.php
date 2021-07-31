<?php session_start(); 
		include("config/connection.php");
		pristupStrani();
	?>
<!DOCTYPE html>
<html>
<head>
	
	<title>NuFit | Fitnes & Exercise Gear </title>
	<meta charset="UTF-8">
	<meta name="description" content="Fitness gear and equipment store">
	<meta name="keywords" content="fit,fitness,gear,equipment,weight,weights,barbell,barbells,dumbell,dumbells,cardio,exercise,workout">
	<meta name="author" content="mailto:nufit@gmail.com">
	<meta name="robots" content="follow, index">
	<meta name="copyright" content="NuFit Fitness & Exercise">
	<meta name="language" content="english">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="assets/images/favicon.png" type="image/gif" sizes="16x16">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/design.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script
  	src="https://code.jquery.com/jquery-3.3.1.js"
  	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  	crossorigin="anonymous"></script>
	
	<script type="text/javascript" src="assets/js/menu-script.js"></script>
	<script type="text/javascript" src="assets/js/scroll-script.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>
	<div id="cover">
		
		<div class="content" id="content-machines">
			<div class="content-block">
				<h2>Stationary Exercise Machines</h2>
				<p>Butterfly machines, inclined press', row machines, etc.</p>
				<a href="pages/products.php"><button>Show Products!</button></a>
			</div>
		</div>
		<div class="content" id="content-weights">
			<div class="content-block">
				<h2>Free Weights and Gear</h2>
				<p>Dumbells, Barbells, Polls, etc.</p>
				<a href="pages/products.php"><button>Show Products!</button></a>
			</div>
		</div>
	</div>
	<div id="menu">
		<header>
			<a href="index.php"><img src="assets/images/logo.png" alt="Logo">
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
	<div id="intro">
		<div id="intro-text">
			<h3>A healthier body and a healthier mind</h3>
			<p>Our mission and goal is to supply people across the world with the necessary tools and equipment to improve upon themselves. A healthy body leads to a healthy mind, and our top quality products help people on this journey of self-realization.</p>
		</div>
	</div>
	<div id="offer">
		<h3>What we offer</h3>
		<div class="offer-block">
			<h4>Top Quality Equipment</h4>
			<p>Our fitness gear and equipment is built from high quality materials and is made to last. Both water-proof and stress-resistant, it is guaranteed to last you many years with the correct use.</p>
		</div>
		<div class="offer-block">
			<h4>Fully customizable packages</h4>
			<p>Due to our special production mode we are able to fulfill an impressive array of needs by allowing our customers to customize the packages they wish to buy, giving them the best possible deal.</p>
		</div>
		<div class="offer-block">
			<h4>Dedication to each customer</h4>
			<p>The relationship we have with our customers is very special, and we are always fully dedicated to each and every one. Our customer service and our whole way of operating is made specifically for your convenience.</p>
		</div>
		<div class="offer-block">
			<h4>Excellent Warranties</h4>
			<p>Due to the high grade of our merchandise we can give out very long guarantees for our products, ensuring their quality and availability longer than you previously thought possible.
		</div>
	</div>

	<div id="stats">
		<div id="stats-color">
			<div class="stats-block">
				<h4>64</h4>
				<p>countries covered</p>
			</div>
			<div class="stats-block">
				<h4>2744</h4>
				<p>supply-sales made</p>
			</div>
			<div class="stats-block">
				<h4>1987</h4>
				<p>around since</p>
			</div>
			<div class="stats-block">
				<h4>0</h4>
				<p>clients dissatisfied</p>
			</div>
		</div>
	</div>
	<div id="about-us">
		<div id="about-us-text">
			<h3>About Us</h3>
			<p>NuFit is a fitness equipment and gear supplier based in Prague, Czech Republic. Founded in 1987 we have been expanding steadily and have always been a reliable source of top notch weights. We currently have centres open in 22 countries, and export to 64, supplying thousands of gyms and tens of thousands of people.</p>
		</div>
	</div>
	<div id="lightbox">
			<div id="lightbox-content">
				<a href="#" id="close">&times;</a>
				<a href="#" id="prev">&#10094;</a>
				<img src="assets/images/customer1.jpg" alt="Lightbox Image">
    			<a href="#" id="next">&#10095;</a>
			</div>
		</div>
	<div id="customers">
		
		
	</div>
	<div id="staff-lightbox">
			<div id="staff-lightbox-content">
				<a href="#" id="staff-close">&times;</a>
				<a href="#" id="staff-prev">&#10094;</a>
				<img src="assets/images/customer1.jpg" alt="Lightbox Image">
    			<a href="#" id="staff-next">&#10095;</a>
			</div>
		</div>
	<div id="staff">
		
	</div>
	<footer>
		
	</footer>
</body>
</html>