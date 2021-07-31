<?php 
	include("../../config/connection.php");
	session_start();
	

	if(isset($_POST["action"])){
		$query="SELECT DISTINCT * FROM menus";
		$st = $con->prepare($query);
		try 
		{
			$st->execute();
			if(isset($_SESSION["user"]))
			{
				$ispis="";
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
							
								if($row->MenuName=="cart")
									{
										$ispis.="<li><a href='views/pages/$row->MenuName.$row->MenuEx'>$row->MenuName<span class='cartnum'>0</span></a></li>";
									}
									else 
									{
										$ispis.="<li><a href='views/pages/$row->MenuName.$row->MenuEx'>$row->MenuName</a></li>";
									}
							}
						}
						$ispis.="<li id='user-icon'><a href='views/pages/user-settings.php'><img src='assets/images/user.png'></a></li><li><a href='models/logout.php'>Log Out</a></li>";			
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
								if($row->MenuName=="cart")
									{
										$ispis.="<li><a href='$row->MenuName.$row->MenuEx'>$row->MenuName<span class='cartnum'>0</span></a></li>";
									}
									else 
									{
										$ispis.="<li><a href='$row->MenuName.$row->MenuEx'>$row->MenuName</a></li>";
									}
							}
						}
						$ispis.="<li id='user-icon'><a href='user-settings.php'><img src='../../assets/images/user.png'></a></li><li><a href='../../models/logout.php'>Log Out</a></li>";	
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
									if($row->MenuName=="cart")
									{
										$ispis.="<li><a href='views/pages/$row->MenuName.$row->MenuEx'>$row->MenuName<span class='cartnum'>0</span></a></li>";
									}
									else 
									{
										$ispis.="<li><a href='views/pages/$row->MenuName.$row->MenuEx'>$row->MenuName</a></li>";
									}
								}
							}
						}
						$ispis.="<li id='user-icon'><a href='views/pages/user-settings.php'><img src='assets/images/user.png'></a></li><li><a href='models/logout.php'>Log Out</a></li>";				
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
									if($row->MenuName=="cart")
									{
										$ispis.="<li><a href='$row->MenuName.$row->MenuEx'>$row->MenuName<span class='cartnum'>0</span></a></li>";
									}
									else 
									{
										$ispis.="<li><a href='$row->MenuName.$row->MenuEx'>$row->MenuName</a></li>";
									}
								}
							}
						}
						$ispis.="<li id='user-icon'><a href='user-settings.php'><img src='../../assets/images/user.png'></a></li><li><a href='../../models/logout.php'>Log Out</a></li>";	
					}
				}
				echo $ispis;
			}
			else 
			{
				$ispis="";
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
					$ispis.="<li><a href='views/pages/user-form.php'>Log In</a></li>";			
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
					$ispis.="<li><a href='user-form.php'>Log In</a></li>";
				}
				echo $ispis;
			}
			
		}
		catch(PDOException $e)
		{
			logError(500);
		}
	}
	else {
		header("Location: ../../index.php");
	}
?>