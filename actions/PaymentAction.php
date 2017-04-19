<?php 

// $dompdf->stream('my.pdf',array('Attachment'=>0));

if (isset($_FILES['billing_upload']['name'])) {

	$data = array(
		'filename' => $_FILES['billing_upload']['name'],
		'filetmp' => $_FILES['billing_upload']['tmp_name'],
		'account_name' => $_POST['account_name'],
		'account_number' => $_POST['account_number'],
		'id_order' => $_POST['id_order'],
	);

	$payment = get_user_order_payment($data);

	if ($payments == false) {
		header('Location: http://localhost/oop-shopping-cart/member/payment.php#alert-messages');
	}

}

?>
