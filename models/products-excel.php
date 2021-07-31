<?php 
	require_once "../config/connection.php";

	$excel = new COM("Excel.Application") or die("Didn't connect");

	$excel->Visible = 1;

	$workbook = $excel->Workbooks->Add();
	$sheet = $workbook->Worksheets(1);
	$sheet->activate;

	$st=$con->prepare("SELECT * FROM products");
	$st->execute();
	$products=$st->fetchAll();
	$br = 1;

	foreach($products as $p){
		$cell = $sheet->Range("A".$br);
		$cell->activate;
		$cell->value=$p->Name;

		$cell = $sheet->Range("B".$br);
		$cell->activate;
		$cell->value=$p->Description;
		
		$cell = $sheet->Range("C".$br);
		$cell->activate;
		$cell->value=$p->Rating;
		
		$cell = $sheet->Range("D".$br);
		$cell->activate;
		$cell->value=$p->PriceNew;
		
		$cell = $sheet->Range("E".$br);
		$cell->activate;
		$cell->value=$p->Category;
		
		$cell = $sheet->Range("F".$br);
		$cell->activate;
		$cell->value=$p->Label;
		
		$br++;
	}

	$workbook->_SaveAs("C:\Products.xlsx");
	$workbook->Save();
	$workbook->Saved=true;


