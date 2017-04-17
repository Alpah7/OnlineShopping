<?php 

$idOrder = $_GET['idOrder'];

$conn = new MySQLi('localhost','root','','project_ecommerce');

$query_select = "SELECT status FROM order_product WHERE id_order='".$idOrder."'";
$sql_select = $conn->query($query_select);
$result_select = $sql_select->fetch_assoc();
$status ='';

if ($result_select['status'] == 0) {
	$status .= 1;
}else{
	$status .= 0;
}

$query_update = "UPDATE order_product SET status='".$status."' WHERE id_order='".$idOrder."'";
$sql_update = $conn->query($query_update);

if ($sql_update == TRUE) {
	
	$query_select_product = "SELECT order_product.id_product AS ID_PRD, order_product.status AS STATUS, order_product.qty AS QTY_ORD, products.stock AS STOCK FROM order_product JOIN products ON order_product.id_product = products.id_product WHERE order_product.id_order ='".$idOrder."'";
	$sql = $conn->query($query_select_product);
	$stock_update='';
	while($result = $sql->fetch_assoc()){

		if ($result['STATUS'] == 0) {
			$stock_update .= ($result['STOCK']+$result['QTY_ORD']);
		}else{
			$stock_update .= ($result['STOCK']-$result['QTY_ORD']);
		}
		
		$update_product = "UPDATE products SET stock='".$stock_update."' WHERE id_product='".$result['ID_PRD']."'";
		$sql_update_product = $conn->query($update_product);

	}	

}

echo $idOrder;
?>