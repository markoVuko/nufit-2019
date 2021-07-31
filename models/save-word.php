<?php 
	include "../config/connection.php";

	$author = fetchOne("SELECT * FROM authors");
	$word = new COM("Word.Application");
	$word->Visible = true;
	$word->Documents->Add();
	$word->Selection->TypeText($author->Ime." ".$author->Prezime."\n\n".$author->Description);
	#$word->Documents[1]->SaveAs("Author-".$author->Ime."-".$author->Prezime.".docx");