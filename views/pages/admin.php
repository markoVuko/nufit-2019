<?php session_start(); 
		include "../../config/connection.php"; 
		pristupStrani();
		if(!isset($_SESSION["user"])||$_SESSION["user"]->IdRole!=1)
		{
			header("Location: ../../index.php");
		}

	?>
<!DOCTYPE html>
<html>
<head>

	<title>NuFit | Admin </title>
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
	<script type="text/javascript" src="../../assets/js/admin-script.js"></script>
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
	
	<div id="admin">
		<div id="admin-tabs">
			<h3>Panel Tabs</h3>
			<hr>
			<ul>
				<li><a href="insert-user">Insert User</a></li>
				<li><a class="notsel" href="edit-users">Edit Users</a></li>
				<li><a class="notsel" href="insert-product">Insert Product</a></li>
				<li><a class="notsel" href="edit-products">Edit Products</a></li>
				<li><a class="notsel" href="edit-staff">Edit Staff</a></li>
				<li><a class="notsel" href="edit-customers">Edit Customers</a></li>
				<li><a class="notsel" href="contact-feed">Customer Feedback</a></li>
				<li><a class="notsel" href="log-stats">Log Statistics</a></li>
				<li><a class="notsel" href="errors">Errors</a></li>
			</ul>
		</div>
		<div id="admin-panel">
			<div class="admin-ctrl" id="insert-user">
				<form id="insusform">
					<h3>Insert User</h3>
					<input type="text" id="iuname" placeholder="Username..."><br>
					<input type="text" id="iuemail" placeholder="Email..."><br>
					<input type="password" id="iupass" placeholder="Password..."><br>
					<input type="radio" class="iurole" name="role" value="1"> <label class="ulabel">Admin</label>
					<input type="radio" class="iurole" name="role" value="2"> <label class="ulabel">User</label><br>
					<input type="submit" value="Insert">
				</form>
			</div>
			<div class="admin-ctrl" id="edit-users">
				<table id="eutable"></table>
				<form action="../../models/edit.php" method="POST" id="editusform" enctype="multipart/form-data">
					<h3>Insert User</h3>
					<input type="text" id="euname" name="euname" placeholder="Username..."><br>
					<input type="text" id="euemail" name="euemail" placeholder="Email..."><br>
					<input type="password" id="eupass" name="eupass" placeholder="Password..."><br>
					<input type="radio" class="eurole" id="eurole1" name="eurole" value="1"> <label class="ulabel">Admin</label>
					<input type="radio" class="eurole" id="eurole2" name="eurole" value="2"> <label class="ulabel">User</label><br>
					<input type="file" id="euimg" name="euimg"><br>
					<input type="hidden" name="euid" id="euid" value="">
					<input type="submit" value="Save" id="saveUser" name="saveUser">
				</form>
			</div>
			<div class="admin-ctrl" id="insert-product">
				<form id="insprodform" action="../../models/insert.php" method="POST" enctype="multipart/form-data">
					<h3>Insert Product</h3>
					<input type="text" id="ipname" name="ipname" placeholder="Name...">
					<input type="text" id="iplabel" name="iplabel" placeholder="Label..."><br>
					<textarea id="ipdesc" name="ipdesc" placeholder="Description..."></textarea><br>
					<select id="ipcat" name="ipcat">
						<option value="0">Category</option>
						<option value="Accessories">Accessories</option>
						<option value="Cardio">Cardio</option>
						<option value="Stationary">Stationary</option>
						<option value="Weights">Weights</option>
					</select>
					<select id="iprate" name="iprate">
						<option value="-1">Rating</option>
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
					</select>
					<input type="text" id="ippnew" name="ippnew" placeholder="Price...">
					<input type="text" id="ippold" name="ippold" placeholder="Old Price..."><br>
					<input type="file" id="ipimg" name="ipimg"><br>
					<input type="submit" value="Insert" name="insProd">
				</form>
			</div>
			<div class="admin-ctrl" id="edit-products">
				<table id="eptable"></table>
				<form id="editprodform" action="../../models/edit.php" method="POST" enctype="multipart/form-data">
					<h3>Edit Product</h3>
					<input type="text" id="epname" name="epname" placeholder="Name...">
					<input type="text" id="eplabel" name="eplabel" placeholder="Label..."><br>
					<textarea id="epdesc" name="epdesc" placeholder="Description..."></textarea><br>
					<select id="epcat" name="epcat">
						<option value="0">Category</option>
						<option value="Accessories">Accessories</option>
						<option value="Cardio">Cardio</option>
						<option value="Stationary">Stationary</option>
						<option value="Weights">Weights</option>
					</select>
					<select id="eprate" name="eprate">
						<option value="-1">Rating</option>
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
					</select>
					<input type="hidden" id="epid" name="epid"><br>
					<input type="text" id="eppnew" name="eppnew" placeholder="Price...">
					<input type="text" id="eppold" name="eppold" placeholder="Old Price..."><br>
					<input type="file" id="epimg" name="epimg"><br>
					<input type="submit" value="Save" id="saveProd" name="saveProd">
				</form>
			</div>
			<div class="admin-ctrl" id="edit-staff">
				<table id="estable"></table>
				<form id="editstaform" action="../../models/edit.php" method="POST" enctype="multipart/form-data">
					<h3>Edit Staff Member</h3>
					<input type="text" id="estaname" name="estaname" placeholder="Full name..."><br>
					<input type="file" id="estaimg" name="estaimg"><br>
					<input type="hidden" id="ecid" name="ecid">
					<input type="submit" value="Save" id="saveSta" name="saveSta">
				</form>
			</div>
			<div class="admin-ctrl" id="edit-customers">
				<table id="ectable"></table>
				<form id="editcusform" action="../../models/edit.php" method="POST" enctype="multipart/form-data">
					<h3>Edit Customer</h3>
					<input type="file" id="ecusimg" name="ecusimg"><br>
					<input type="hidden" id="ecuid" name="ecuid">
					<input type="submit" value="Save" id="saveCus" name="saveCus">
				</form>
			</div>
			<div class="admin-ctrl" id="contact-feed">
				<?php
					$feed = executeQuery("SELECT * FROM sent");
					foreach ($feed as $f) {
						echo '<div class="feed-block">
							 	<span>Feedback#'.$f->Id.'</span>
							 	<span class="feedName">From: '.$f->Name.' '.$f->Surname.'</span>
							 	<a href="feed-'.$f->Id.'" class="notsel">Open</a>
							 	<div id="feed-'.$f->Id.'" class="feed-content">
							 		<span>Number: '.$f->Num.'</span><br>
							 		<span>Email: '.$f->Email.'</span><br>
							 		<span>'.$f->Gender.'</span><br>
							 		<span class="feedText">'.$f->Text.'</span>
							 	</div>
							 </div>';
					}
				 ?>

			</div>
			<div class="admin-ctrl" id="log-stats">
				<table id="log-table">
					<th>Page</th>
					<th>Time</th>
					<th>Accesed By</th>
				<?php
					$log = file("../../data/log.txt");
					foreach($log as $l){
						$red = explode("\t", $l);
						echo "<tr>";
						foreach($red as $r){
							echo "<td>".$r."</td>";
						}
						echo "</tr>";
					}
				 ?>
				</table>
			</div>
			<div class="admin-ctrl" id="errors">
				<table id="error-table">
					<th>Page</th>
					<th>Time</th>
					<th>By</th>
					<th>Error Code</th>
				<?php
					$errors = file("../../data/dberrors.txt");
					foreach($errors as $e){
						$red = explode("\t", $e);
						echo "<tr>";
						foreach($red as $r){
							echo "<td>".$r."</td>";
						}
						echo "</tr>";
					}
				 ?>
				</table>
			</div>
		</div>
	</div>

	<footer>
		
	</footer>
</body>
</html>