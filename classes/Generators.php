<?php 

class Generators extends Database{

	public function userID(){

		$query = "SELECT MAX(CAST(REPLACE(SUBSTR(id_user, -2), '-','') AS UNSIGNED)) AS NEW_ID FROM users";
		$sql = $this->db->query($query);
		$last_id = $sql->fetch_assoc();

		return "USR-".date('md').'-'.date('y').'-'. ($last_id['NEW_ID']+1);

	}

	public function productID(){

		$query = "SELECT MAX(CAST(REPLACE(SUBSTR(id_product, -2), '-','') AS UNSIGNED)) AS NEW_ID FROM products";
		$sql = $this->db->query($query);
		$last_id = $sql->fetch_assoc();

		return "PRD-".date('md').'-'.date('y').'-'.($last_id['NEW_ID']+1);

	}

	public function orderID(){

		$query = "SELECT MAX(CAST(REPLACE(SUBSTR(id_order, -2), '-','') AS UNSIGNED)) AS NEW_ID FROM order_product";
		$sql = $this->db->query($query);
		$last_id = $sql->fetch_assoc();

		return "ORD-".date('md').'-'.date('y').'-'.($last_id['NEW_ID']+1);

	}

	public function IDR($number) {  
	    $idr = '<b><i>IDR</i></b> '.number_format($number, 2, ',', '.');  
	    return $idr;  
	}

	public function select_size($size){
		$size_data = explode(', ', $size);
		echo '<select name="size" required>';
				echo '<option value="">-- Select Size --</option>';
		foreach ($size_data as $data) {
				echo '<option value="'.$data.'">'.$data.'</option>';
		}
		echo '</select>';
	}

	public function user_select_size($id_product){

		$query = "SELECT products.size AS P_SIZE, cart.size AS C_SIZE FROM cart, products WHERE cart.id_product = products.id_product AND products.id_product = '".$id_product."'";
		$sql = $this->db->query($query);
		$result = $sql->fetch_assoc();

		$size_data = explode(', ', $result['P_SIZE']);
		echo '<select name="size" required>';
				echo '<option value="">-- Select Size --</option>';
				echo '<option value="'.$result['C_SIZE'].'" selected>'.$result['C_SIZE'].'</option>';
		foreach ($size_data as $data) {
				echo '<option value="'.$data.'">'.$data.'</option>';
		}
		echo '</select>';

	}

}

?>