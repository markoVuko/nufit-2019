<?php session_start(); 
    if(!isset($_SESSION["user"])){
        header("Location: ../../index.php");
    }
    include "../../config/connection.php"; 
    pristupStrani();
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>NuFit | Cart</title>
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
	<script type="text/javascript" src="../../assets/js/cart-script.js"></script>
</head>
<body>
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

	<div id="cart">
		<div id="terms">
			<img src="../../assets/images/cart.png" alt="Cart">
			<h3>Your ordered products</h3>
			<hr>
			<p>This cart contains the products you've ordered, neatly sorted and listed with the total cost and quantity. Once you're ready to buy the products simply click the 'cash out' button.</p>
			<p>You can also edit the products currently in the cart via the navigation buttons in the product list. If you have some concerns or need help don't hesitate to contact our customer service.</p>
		</div>
		<div id="cashout">
			<table id="cart-table">
				
			</table>
			<div id="ctrl">
				<button id="cash-btn">Cash Out</button>
				<span id="final-price">$0</span><input type="hidden" id="final-price-hidden" value="0">
			</div>
		</div>
	</div>
	
	<footer>
		
	</footer>
</body>
</html>