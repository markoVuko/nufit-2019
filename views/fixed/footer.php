<?php 
	include("../../config/connection.php");
	session_start();

	if(isset($_POST["action"])){
		$query="SELECT * FROM menus";
		$st = $con->prepare($query);
		$ispis = "<div class=\"footer-block\">
									<h4>Legend</h4>
									<hr>
									<ul>";
		try 
		{
			$st->execute();
			
			if(isset($_SESSION["user"]))
			{
				if($_SESSION["user"]->IdRole==1)
				{
					if($_POST["loc"]=="index")
					{
						while($row=$st->fetch())
						{
							if($row->IdMenu==1)
							{
								$ispis.="<li><a href='$row->MenuName.$row->MenuEx'>Home</a></li>";
							}
							else {
							
								$ispis.="<li><a href='views/pages/$row->MenuName.$row->MenuEx'>$row->MenuName</a></li>";
							}
						}		
					}
					else 
					{
						while($row=$st->fetch())
						{
							if($row->IdMenu==1)
							{
								$ispis.="<li><a href='../../$row->MenuName.$row->MenuEx'>Home</a></li>";
							}
							else 
							{
								$ispis.="<li><a href='$row->MenuName.$row->MenuEx'>$row->MenuName</a></li>";
							}
						}
					}
				}
				else 
				{
					if($_POST["loc"]=="index")
					{
						while($row=$st->fetch())
						{
							if($row->IdMenu==1)
							{
								$ispis.="<li><a href='$row->MenuName.$row->MenuEx'>Home</a></li>";
							}
							else {
								if($row->MenuName!="admin")
								{
									$ispis.="<li><a href='views/pages/$row->MenuName.$row->MenuEx'>$row->MenuName</a></li>";
								}
							}
						}	
					}
					else 
					{
						while($row=$st->fetch())
						{
							if($row->IdMenu==1)
							{
								$ispis.="<li><a href='../../$row->MenuName.$row->MenuEx'>Home</a></li>";
							}
							else 
							{
								if($row->MenuName!="admin")
								{
									$ispis.="<li><a href='$row->MenuName.$row->MenuEx'>$row->MenuName</a></li>";
								}
							}
						}
					}
				}
			}
			else 
			{
				if($_POST["loc"]=="index")
				{
					while($row=$st->fetch())
					{
						if($row->IdMenu==1)
						{
							$ispis.="<li><a href='$row->MenuName.$row->MenuEx'>Home</a></li>";
						}
						else {
							if($row->MenuName!="admin"&&$row->MenuName!="cart"&&$row->MenuName!="survey")
							{
								$ispis.="<li><a href='views/pages/$row->MenuName.$row->MenuEx'>$row->MenuName</a></li>";
							}
						}
					}		
				}
				else 
				{
					while($row=$st->fetch())
					{
						if($row->IdMenu==1)
						{
							$ispis.="<li><a href='../../$row->MenuName.$row->MenuEx'>Home</a></li>";
						}
						else 
						{
							if($row->MenuName!="admin"&&$row->MenuName!="cart"&&$row->MenuName!="survey")
							{
								$ispis.="<li><a href='$row->MenuName.$row->MenuEx'>$row->MenuName</a></li>";
							}
						}
					}
				}
			}
			
		$ispis .= "</ul></div>";
		}
		catch(Exception $e)
		{
			echo $e;
		}

		$query="SELECT * FROM contacts";
		$st = $con->prepare($query);
		$ispis .= "<div class=\"footer-block\">
									<h4>Contact Info</h4>
									<hr>
									<ul>";
		try {
			$st->execute();
			while($row=$st->fetch())
			{
				$ispis .="<li><a href=\"#\">$row->ContactName</a></li>";
			}
		}
		catch(PDOException $e)
		{
			logError(500);
		}
		$ispis .= "</ul></div>";
	 	$ispis .= "<p>&copy; NuFitness, since 1987</p>";
		echo $ispis;
	}
	else {
		header("Location: ../../index.php");
	}
?>