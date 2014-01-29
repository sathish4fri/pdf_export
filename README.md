pdf_export
==========
PDF libraries versions & notes :
	- TCPDF : 6.0.020 (2013-06-01)
		http://sourceforge.net/projects/tcpdf/?source=dlp
		Original library used (OK for HTML to PDF + header/footer)
		900 Ko
	
	- DOMPDF : as of 2013-06-25 on Github (+ get php-font-lib submodule)
		Nice rendering + inline documentation, requirements testing & examples
		>200 Ko (many incs and libs)
	
	- HTML2PDF : 3.0.2b (as of 2013-06-25)
		http://sourceforge.net/projects/html2fpdf/
		No working examples, light doc, bugs with images on site demo
		200 Ko
	
	- MPDF : 5.6.1
		Documentation : http://www.mpdf1.com/mpdf/examples
		Très bon rendu, simple à implémenter, et prise en charge des CSS
		1.3 Mo
	
	- cpdf (pdfClassesAndExtensions) 0.11.7
		Pure PHP PDF generation (doesn't look very friendly for HTML to PDF)
		240 Ko


FURTHER INSTALLATION :
	- MPDF :
 		* Ensure that you have write permissions set (CHMOD 6xx or 7xx) for the following folders:
 			/ttfontdata/ - used to cache font data; improves performance a lot
 			/tmp/ - used for some images and ProgressBar
 			/graph_cache/ - if you are using JpGraph in conjunction with mPDF
		To test the installation, point your browser to the basic example file : [path_to_mpdf_folder]/mpdf/examples/example01_basic.php
		If you wish to define a different folder for temporary files rather than /tmp/ see the note on 'Folder for temporary files' in the section on Installation & Setup in the manual (http://mpdf1.com/manual/).
		* Config : 
			config.php : Configure most variables which affect mPDF. These values can be set at the beginning of individual scripts, but changes here will affect all of your PDF files.
			config_cp.php : Sets the options used for specified languages e.g. restricted fonts when appropriate.
			config_fonts.php : Details of fonts installed in mPDF.


HISTORY
1.8.2 : 200130625 - Preparing switch to various PDF generation libraries
	- (quick) library tests : DOMPDF or MPDF seems to get best results
	- added generator switcher (hardcoded yet)
	- switched to mpdf (easier config + CSS), BUT tcpdf has better rendering for more HTML elements

1.8.1 : 20130624 - Updated for Elgg 1.8


0.1 : first tests
  - integrate TCPDF class

