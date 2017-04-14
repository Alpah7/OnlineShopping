<?php 

class Generators extends Database{

	public function userID(){

		$query = "SELECT * FROM users";
		$sql = $this->db->query($query);
		$rows = mysqli_num_rows($sql);

		return "USR-".date('md').'-'.date('y').'-'.($rows+1);

	}

	public function productID(){

		$query = "SELECT * FROM products";
		$sql = $this->db->query($query);
		$rows = mysqli_num_rows($sql);

		return "PRD-".date('md').'-'.date('y').'-'.($rows+1);

	}

	public function orderID(){

		$query = "SELECT * FROM order_product";
		$sql = $this->db->query($query);
		$rows = mysqli_num_rows($sql);

		return "ORD-".date('md').'-'.date('y').'-'.($rows+1);

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