<?php
require_once 'bootstraps/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

$content = "<style type='text/css'>
	.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th { background:none; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #222; border-left: 1px solid #fff;font-size: 11px;font-weight: normal; }.datagrid table tbody .alt td { background: #949DA1; color: #222222; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }
</style>";
$content.= '
<div class="datagrid">
<table>
      	<thead>
      		<tr>
      			<th>ID Produk</th>
      			<th>Nama Produk</th>
      			<th>Kategori</th>
      			<th>Ukuran</th>
      			<th>Stok</th>
      			<th>Modal</th>
      			<th>Harga</th>
      		</tr>
      	</thead>
      	<tbody>';
     	if ($num_products == 0) {
$content.= '<tr>
      		    <td colspan="8" align="center" class="bg-danger"><span class="label label-danger">Data Not Found!</span></td>
      		</tr> ';
      	} else { 
      		foreach ($all_products as $data) {
$content.='<tr>
      			<td>'.$data['id_product'].'</td>
      			<td>'.$data['name'].'</td>
      			<td>'.$data['categories'].'</td>
      			<td>'.$data['size'].'</td>
      			<td>'.$data['stock'].'</td>
      			<td>'.$generator->IDR($data['equity']).'</td>
      			<td>'.$generator->IDR($data['price']).'</td>
      		</tr>';
      	} }
$content.='</tbody>
      	<tbody>
      		<tr>
      			<td colspan="5">&nbsp;</td>
      			<td>'.$generator->IDR($products->totalModal()).'</td>
      			<td>'.$generator->IDR($products->totalPricing()).'</td>
      			<td>&nbsp;</td>
      		</tr>
      	</tbody>
      	<tbody>
      		<tr>
      			<td colspan="5">&nbsp;</td>
      			<td colspan="2" align="center">Total Pendapatan : '.$generator->IDR($products->earnings()).'</td>
      			<td>&nbsp;</td>
      		</tr>
      	</tbody>
      </table>
      </div>
';

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