<?php 


class Orders extends Database{

	public function auto_insert_data_transaction(){

		$month = date('F-Y');

		$query 	= "SELECT DATE_FORMAT(order_date, '%M-%Y') AS ORDER_DATE, SUM(amount) AS TOTAL_AMOUNT, SUM(total_price) AS TOTAL_EARNING FROM order_product WHERE status=1";
		$sql 	= $this->db->query($query);
		$result = $sql->fetch_assoc();

		if ($month != $result['ORDER_DATE']) {
			
			$query 	= "INSERT INTO transaction (id_transaction,month,kotor,bersih) VALUES ('','".$result['ORDER_DATE']."','".$result['TOTAL_AMOUNT']."','".$result['TOTAL_EARNING']."')";
			$sql 	= $this->db->query($query);

		}

		return error_reporting(0);

	}

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

	public function auth_accaount_payment($account_name){

		$query = "SELECT account_name FROM order_product WHERE account_name='".$account_name."'";
		$sql = $this->db->query($query);
		$result = $sql->fetch_assoc();

		return $result['account_name'];

	}

	function get_user_order_payment($data){

		$id_order 		= $data['id_order'];
		$filename 		= $data['filename'];
		$filetmp 		= $data['filetmp'];
		$filetype 		= pathinfo($data['filetype'])['extension'];
		$account_name 	= $data['account_name'];
		$account_number = $data['account_number'];
		move_uploaded_file($file_temp, '../assets/images/payments/'.$filename);
		$qrcode 		= $QRCodeReader->decode('../assets/images/payments/'.$filename);

		if ($id_order == $qrcode && filetype == 'png') {
			
			if ($account_name == auth_accaount_payment($account_name)) {
				
				$query = "SELECT order_product.id_order AS O_ID_ORDER, CONCAT(users.firstname, ' ' ,users.lastname) AS O_FULLNAME, CONVERT(GROUP_CONCAT(products.name SEPARATOR ', ') USING utf8) AS O_PRODUCT, CONVERT(GROUP_CONCAT(order_product.qty SEPARATOR ', ') USING utf8) AS O_QTY, CONVERT(GROUP_CONCAT(order_product.size SEPARATOR ', ') USING utf8) AS O_SIZE, order_product.account_name AS O_ACCOUNT_NAME, order_product.amount AS O_AMOUNT, order_product.tax AS O_TAX, order_product.total_price AS O_TOTAL_PRICE, order_product.status AS O_STATUS FROM order_product JOIN products ON order_product.id_product = products.id_product JOIN users ON order_product.id_user = users.id_user AND order_product.id_order = '".$id_order."' GROUP BY order_product.id_order";
				$sql = $this->db->query($query);
				$result = $sql->fetch_all(MYSQLI_ASSOC);


				if (count($result) < 1) {
					return false;
				}

				return $result;

			}

		}

		return false;

	}

}


?>