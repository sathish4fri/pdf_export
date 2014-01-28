<?php
 $pdf_header_logo='';
 $pdf_header_logo_width='';
 $pdf_author ='sathish kumar';
 $pdf_header_title ='TCPDF Example 001';
$pdf_subject ='TCPDF Tutorial';
$pdf_tags ='TCPDF, PDF, example, test, guide';
$guid = get_input('guid', false);
$html = <<<EOD
<h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
<i>This is the first example of TCPDF library.</i>
<p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
<p>Please check the source code documentation and other examples for further information.</p>
<p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
EOD;

$pdf_filename = $guid . '_' . elgg_get_friendly_title($pdf_title) . '_' . date('YmdHis', time()) . '.pdf';

 


  $tcpdf_lib = dirname(dirname(dirname(__FILE__))) . '/assets/tcpdf/';
  pdf_export_get_config();
  require_once($tcpdf_lib . 'tcpdf.php');
  
  //if (empty($pdf_header_title)) $pdf_header_title = PDF_HEADER_TITLE;
  //if (empty($pdf_header_string)) $pdf_header_string = PDF_HEADER_STRING;
  if (empty($pdf_header_logo)) $pdf_header_logo = PDF_HEADER_LOGO;
  if (empty($pdf_header_logo_width)) $pdf_header_logo_width = PDF_HEADER_LOGO_WIDTH;
  
  // create new PDF document
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

  // set document information
  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetAuthor($pdf_author);
  $pdf->SetTitle($pdf_header_title);
  $pdf->SetSubject($pdf_subject);
  $pdf->SetKeywords($pdf_tags);

  // set default header data
  //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
  $pdf->SetHeaderData($pdf_header_logo, $pdf_header_logo_width, $pdf_header_title, $pdf_header_string);
  
  // set default footer data
  //$pdf->setFooterData($tc=array(0,64,0), $lc=array(0,64,128));

  // set header and footer fonts
  $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

  // set default monospaced font
  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

  //set margins
  // Marges globales (header affichés dans marge top)
  //$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
  $pdf->SetMargins(PDF_MARGIN_LEFT, 20, PDF_MARGIN_RIGHT);
  $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
  $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

  //set auto page breaks
  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

  //set image scale factor
  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

  //set some language-dependent strings
  $pdf->setLanguageArray($l);

  // ---------------------------------------------------------
  // set font
  $pdf->SetFont('dejavusans', '', 10);
  
  // add a page
  $pdf->AddPage();

  // output the HTML content
  $pdf->writeHTML($html, true, false, true, false, '');

  // reset pointer to the last page
  $pdf->lastPage();

  // ---------------------------------------------------------
  //Close and output PDF document
  $pdf->Output($pdf_filename, 'I');
  
