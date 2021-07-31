<?php 
	include("../config/connection.php");

	if(isset($_POST["action"]))
	{
		$query = " FROM products WHERE PriceNew > 0";
		if(!empty($_POST["search"]))
		{
			$search=$_POST["search"];
			$query .= " AND (Name LIKE '%$search%' OR Description LIKE '%$search%')";
		}
		if(!empty($_POST["label"])&&$_POST["label"]!="All")
		{
			$label = $_POST["label"];
			$query.=" AND Label='$label'";
		}
		if(isset($_POST["category"]))
		{
			$category = implode("','",$_POST["category"]);
			$query.=" AND Category IN('$category')";
		}
		if(isset($_POST["price"])){
			$price = $_POST["price"];
			$query .= " AND";
			$br=1;
			foreach ($price as $p) 
			{
				$btwn=explode("-",$p);
				if($br==1)
				{
					$query.=" (PriceNew>=".$btwn[0]." AND PriceNew<=".$btwn[1].")";
				}
				else {
					$query.=" OR (PriceNew>=".$btwn[0]." AND PriceNew<=".$btwn[1].")";
				}
				$br++;
			}
		}
		if(isset($_POST["rating"])&&$_POST["rating"]>0){
			$rating=$_POST["rating"];
			$query.=" AND Rating <= ".$rating;
		}
		if(!empty($_POST["sort"]))
		{
			$sort=$_POST["sort"];
			if($sort=="Price - Ascending")
			{
				$query.=" ORDER BY PriceNew ASC";
			}
			if($sort=="Price - Descending")
			{
				$query.=" ORDER BY PriceNew DESC";
			}
			if($sort=="Name - Ascending")
			{
				$query.=" ORDER BY Name ASC";
			}
			if($sort=="Name - Descending")
			{
				$query.=" ORDER BY Name DESC";
			}
		}

		$tquery = "SELECT COUNT(*)".$query;
		$query = "SELECT *".$query;
		
		$str = $_POST["page"];
		$qbr=($str-1)*10;
		$query.=" LIMIT $qbr,10";

		$tst = $con->prepare($tquery);
		$st = $con->prepare($query);
		try {
			$st->execute();
			$res = $st->fetchAll();
			$tst->execute();
		}
		catch(Exception $e)
		{
			logError(500);
		}
		$tr = $tst->fetchColumn();
		$ispis = "";
		if($tr>0)
		{ 
			$brstr = ceil($tr/10);
			$ispis.="";
			foreach($res as $r)
			{
				$ispis.='<div class="product">
							<img src="'.$r->Path.'" alt="'.$r->Alt.'">
							<div class="product-content">
								<div class="product-mid"><h4>'.$r->Name.'</h4>
								<p class="product-label">Label: '.$r->Label.'</p>
								<span class="rating">';
				for($i=0;$i<$r->Rating;$i++)
				{
					$ispis.='<span class="fa fa-star checked"></span>';
				}
				if($r->Rating<6)
				{
					for($i=0;$i<(6-$r->Rating);$i++)
					{
						$ispis.='<span class="fa fa-star-o"></span>';
					}
				}

				$ispis.='</span><p class="product-desc">'.$r->Description.'</p></div>
								<div class="product-bottom">';
				if($r->PriceOld!=0)
				{
					$ispis.='<p class="price-old"><del>$'.$r->PriceOld.'</del></p>';
				}
									
				$ispis .='<p class="price-new">$'.$r->PriceNew.'</p>
									
								</div>
								<button data-id="'.$r->Id.'" class="add-to-cart">Add to Cart</button>	
							</div>
						</div>';
			}

			$data = [];
			$data[0]=$ispis;
			$data[1]=$brstr;
			echo json_encode($data);
		}
	}
	else if(isset($_POST["cart"]))
	{
		$query="SELECT * FROM products";
		$st=$con->prepare($query);
		$st->execute();
		$rows=$st->fetchAll();
		echo json_encode($rows);
	}
	else {
		header("Location: ../index.php");
	}
	
?>