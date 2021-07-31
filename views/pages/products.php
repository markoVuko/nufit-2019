<?php session_start();
		include("../../config/connection.php");
		pristupStrani();
	?>

<!DOCTYPE html>
<html>
<head>
	<?php if(!isset($_GET["page"]))
		{
			$str=1;
		}
		else {
			$str = $_GET["page"];
		}
		 
	?>
	<title>NuFit | Products</title>
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
	<script type="text/javascript" src="../../assets/js/products-script.js"></script>

</head>
<body>
	<input type="hidden" name="inpage" id="inpage" value="<?php echo $str ?>">
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
	<div id="phone-side"><a href="#"><h3>Filter Options</h3></a></div>
	<div id="sidebar">
		<input type="text" name="search" id="search">  <button id="search-button">Search</button>
		<div id="slider">
			<input type="range" min="0" max="6" name="rate-range" id="rate-range" step="1" value="0"> <label id="rating" >Rating: 0</label>
		</div>
		<div id="label">
			<h3>Label</h3>
			<hr>
			<a href="#">Steelborn</a><br>
			<a href="#">Hammer</a><br>
			<a href="#">All</a><br>
		</div>
		<div id="category">
			<h3>Category</h3>
			<hr>
			<?php 
				$q=$con->prepare("SELECT DISTINCT Category FROM products");
				$q->execute();
				while($row=$q->fetch())
				{ ?>
					<input type="checkbox" name="<?php echo $row->Category ?>" value="<?php echo $row->Category ?>" > <label><?php echo $row->Category ?></label><br>
				<?php }
			?>
		</div>
		<div id="sortby">
			<h3>Sort By</h3>
			<hr>
			<a href="#">Price - Ascending</a><br>
			<a href="#">Price - Descending</a><br>
			<a href="#">Name - Ascending</a><br>
			<a href="#">Name - Descending</a><br>
		</div>
		<div id="bracket">
			<h3>Bracket</h3>
			<hr>
			<input type="checkbox" name="0-50" value="0-50"> <label>0-50 USD</label><br>
			<input type="checkbox" name="51-100" value="51-100"> <label>51-100 USD</label><br>
			<input type="checkbox" name="101-200" value="101-200"> <label>101-200 USD</label><br>
			<input type="checkbox" name="201-300" value="201-300"> <label>201-300 USD</label><br>
			<input type="checkbox" name="301-400" value="301-400"> <label>301-400 USD</label><br>
		</div>
		<hr>
		<a href="../../models/products-excel.php" id="prosheet">Download Excel</a>
	</div>

	<div id="pages">
		
	</div>

	<div id="products">
		
	</div>
	
	<footer>
		
	</footer>
</body>
</html>