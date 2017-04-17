<?php 


class Orders extends Database{

	public function delete_scheduler(){

		$query = "SELECT id_order, out_of_date FROM order_product";
		$sql = $this->db->query($query);

		while ($result = $sql->fetch_assoc()) {
			
			if ($result['out_of_date'] == date('Y-m-d')) {
				
				$query = "DELETE FROM order_product WHERE id_order='".$result['id_order']."'";
				$sql = $this->db->query($query);

			}

		}

		return error_reporting(0);

	}

	public function get_data_order(){

		$query = "SELECT order_product.id_order AS O_ID_ORDER, CONCAT(users.firstname, ' ' ,users.lastname) AS O_FULLNAME, CONVERT(GROUP_CONCAT(products.name SEPARATOR ', ') USING utf8) AS O_PRODUCT, CONVERT(GROUP_CONCAT(order_product.qty SEPARATOR ', ') USING utf8) AS O_QTY, CONVERT(GROUP_CONCAT(order_product.size SEPARATOR ', ') USING utf8) AS O_SIZE, order_product.account_name AS O_ACCOUNT_NAME, order_product.amount AS O_AMOUNT, order_product.tax AS O_TAX, order_product.total_price AS O_TOTAL_PRICE, order_product.status AS O_STATUS FROM order_product JOIN products ON order_product.id_product = products.id_product JOIN users ON order_product.id_user = users.id_user GROUP BY order_product.id_order";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

	public function num_order(){

		$query = "SELECT * FROM order_product";
		$sql = $this->db->query($query);
		$num = mysqli_num_rows($sql);

		return $num;

	}

}


?>