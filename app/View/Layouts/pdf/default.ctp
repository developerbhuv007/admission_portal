<?php  
/*require_once(APP . 'Vendor' . DS . 'dompdf' . DS . 'dompdf_config.inc.php'); 
spl_autoload_register('DOMPDF_autoload'); 
$dompdf = new DOMPDF(); 
$dompdf->set_paper = 'A4';
$dompdf->load_html(utf8_decode("<p>hey</p>"), Configure::read('App.encoding'));
$dompdf->render();

$canvas = $dompdf->get_canvas();
$font = Font_Metrics::get_font("helvetica", "bold");
$canvas->page_text(16, 800, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 8, array(0,0,0));
//$dompdf->stream("sample.pdf",array("Attachment"=>0));
$dompdf->stream("hello.pdf");

//echo $dompdf->output();
//file_put_contents(APP . 'webroot' . DS . 'pdf' . DS .'filename.pdf');
//file_put_contents("/path/to/file.pdf", $output);
?>