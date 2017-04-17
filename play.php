<?php 

// $dompdf->stream('my.pdf',array('Attachment'=>0));


require_once './libraries/qr-code-reader/src/QRCodeReader.php';

$conn = new MySQLi('localhost','root','','project_ecommerce');

?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
	<input type="file" name="billing_upload">
	<button type="submit">Scan</button>
</form>

<pre>

<?php 

$QRCodeReader = new Libern\QRCodeReader\QRCodeReader();
$qrcode_text = $QRCodeReader->decode("path_to_qr_code");
echo $qrcode_text;

?>

Info display here...

</pre>
