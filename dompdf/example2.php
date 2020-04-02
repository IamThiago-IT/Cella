<?php

$html = "<table border='1' width='100%' style='border-collapse: collapse;'>
        <tr>
            <th>Username</th><th>Email</th>
        </tr>
        <tr>
            <td>yssyogesh</td>
            <td>yssyogesh@makitweb.com</td>
        </tr>
        <tr>
            <td>sonarika</td>
            <td>sonarika@gmail.com</td>
        </tr>
        <tr>
            <td>vishal</td>
            <td>vishal@gmail.com</td>
        </tr>
        </table>";
$filename = "newpdffile";

// include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($filename,array("Attachment"=>0));

