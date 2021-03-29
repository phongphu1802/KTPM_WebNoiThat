<?php
	require('fpdf182/fpdf.php');

	//echo "<meta http-equiv=\"refresh\" content=\"0;url=http://www.train2invest.net/useradmin/atest_Khan.php\">";

	//create a FPDF object
	$pdf=new FPDF();

	//set font for the entire document
	$pdf->SetFont('times','',12);
	$pdf->SetTextColor(50,60,100);

	//set up a page
	$pdf->AddPage('P');
	$pdf->SetDisplayMode(real,'default');

	//Set x and y position for the main text, reduce font size and write content
	$pdf->SetXY (10,60);
	$pdf->SetFontSize(12);
	//$pdf->Write(5,'Dear Ms.XYX');
	$pdf->Cell(40, 10, 'Welcome to Gextend');
	$filename="D:/test.pdf";
	//Output the document
	$pdf->Output('F'.$filename,true);
?>