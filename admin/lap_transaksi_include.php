<?php
require_once 'bootstraps/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

$content='<table class="table table-condensed table-hover" width="100%">
<thead>
  <tr>
    <th>#</th>
    <th>Tanggal Traksaksi</th>
    <th>Total</th>
    <th>Pendapatan Kotor</th>
    <th>Pendapatan Besih</th>
  </tr>
</thead>
<tbody>';
$no=1; foreach ($all_payments as $data){
$content.='<tr>
    <td>'.$no++.'</td>
    <td>'.$data['DateTrasaction'].'</td>
    <td>'.$data['Total'].'</td>
    <td>'.$generator->IDR($data['Gross']).'</td>
    <td>'.$generator->IDR($data['Net']).'</td>
  </tr>';
}
$content.='</tbody>
</table>';

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($content);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('my.pdf',array('Attachment'=>0));
?>