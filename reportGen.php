<?php
echo "line 1";
    require_once 'dompdf/autoload.inc.php';  

    // reference the Dompdf namespace
    use Dompdf\Dompdf; 

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf->loadHtml('hello world');

    // Load HTML content 

    // $dompdf->loadHtml('<h1>Welcome to AnC.com</h1>'); 

     

    // Load html file 

    //$html = file_get_contents("reportGen.html"); 

    $dompdf->loadHtml($html); 

     
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait'); 

    // Render the HTML as PDF
    $dompdf->render(); 
    // Output the generated PDF to Browser $dompdf->stream();
    $dompdf->stream("Attachment");
echo "line 32";
?>