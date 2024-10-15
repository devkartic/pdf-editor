<?php

include './dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

if(!empty($_POST)){

    $html = $_POST['iframe_content'];
    echo $html;
    die();
    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
    $dompdf->render();

// Output the generated PDF to Browser
    $dompdf->stream();

} else{
    echo 'Process Failed!';
}

die();
