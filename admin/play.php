<?php 

// $date = new DateTime();
// $now = $date->format('F-Y');
// echo $now;

// $idOrder = 'ORD-0417-17-2';

$conn = new MySQLi('localhost','root','','project_ecommerce');

$query_select = "SELECT
	SUM(Total_Data) AS TotalTransaction,
	SUM(Gross) AS TotalGrossIncome,
	SUM(Net) AS TotalNetIncome
FROM (
		SELECT COUNT(id_product) AS Total_Data,
		SUM(gross_income) AS Gross,
		SUM(net_income) AS Net
		FROM transactions
			WHERE DATE_FORMAT(date_transaction, '%Y-%m')
  		BETWEEN '2017-01' AND DATE_FORMAT(date_transaction, '%Y-%m')
  		GROUP BY id_transaction, DATE_FORMAT(date_transaction, '%Y-%m') 
  		ORDER BY DATE_FORMAT(date_transaction, '%Y-%m') 
) AS DataTotal";

$sql_select = $conn->query($query_select);
$data = array();
$result_select = $sql_select->fetch_all(MYSQLI_ASSOC);
$earnings = ($result_select[0]['TotalGrossIncome']-$result_select[0]['TotalNetIncome']);

return $earnings;


// $query_select = "SELECT status FROM order_product WHERE id_order='".$idOrder."'";
// $sql_select = $conn->query($query_select);
// $result_select = $sql_select->fetch_assoc();
// $status ='';

// if ($result_select['status'] == 0) {
// 	$status .= 1;
// }else{
// 	$status .= 0;
// }

// $query_update = "UPDATE order_product SET status='".$status."' WHERE id_order='".$idOrder."'";
// $sql_update = $conn->query($query_update);

// if ($sql_update === TRUE) {
	
// 	$query_select_product = "SELECT order_product.id_product AS ID_PRD, order_product.qty AS QTY_ORD, products.stock AS STOCK FROM order_product JOIN products ON order_product.id_product = products.id_product WHERE order_product.id_order ='".$idOrder."'";
// 	$sql = $conn->query($query_select_product);
// 	$result = $sql->fetch_all(MYSQLI_ASSOC);
// 	$row = mysqli_num_rows($sql);

// 	foreach ($result as $data) {
		
// 		$stock_update = ($data['STOCK']-$data['QTY_ORD']);

// 		$update_product = "UPDATE products SET stock='".$stock_update."' WHERE id_product='".$data['ID_PRD']."'";
// 		$sql_update_product = $conn->query($update_product);

// 	}	

// }

// echo $idOrder;

?>