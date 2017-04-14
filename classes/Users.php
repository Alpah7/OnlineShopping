<?php 

class Users extends Database
{
	
	public function logged_in($data){

		$email = $data['email'];
		$pass  = md5($data['password']);

		$query = "SELECT * FROM users WHERE email='".$email."' AND password='".$pass."' AND status != 0";
		$sql   = $this->db->query($query);
		$success = (mysqli_num_rows($sql) > 0) ? true : false;
		$data = $sql->fetch_assoc();

		if($success == true){

			if ($data['id_member'] == 1) {
				
				$_SESSION['users'] = $data['id_user'];
				$_SESSION['firstname'] = $data['firstname'];
				$_SESSION['lastname'] = $data['lastname'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['scopes'] = 'user/';

				header('Location: http://localhost/oop-shopping-cart/user/index.php');

			}elseif ($data['id_member'] == 2) {

				$_SESSION['users'] = $data['id_user'];
				$_SESSION['firstname'] = $data['firstname'];
				$_SESSION['lastname'] = $data['lastname'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['scopes'] = 'member/';

				header('Location: http://localhost/oop-shopping-cart/member/index.php');

			}else{

				$_SESSION['users'] = $data['id_user'];
				$_SESSION['firstname'] = $data['firstname'];
				$_SESSION['lastname'] = $data['lastname'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['scopes'] = 'admin/';

				header('Location: http://localhost/oop-shopping-cart/admin/index.php');
			}


		}else{

			header('Location: http://localhost/oop-shopping-cart/');

		}

	}

	public function is_loggedin($session_users){

		if (!isset($session_users)) {
			header('Location: http://localhost/oop-shopping-cart/');
		}

	}

	public function sign_up($data){

		$id_user = $data['id_user'];
		$username = $data['username'];
		$firstname = $data['firstname'];
		$lastname = $data['lastname'];
		$phone = $data['phone'];
		$member = $data['member'];
		$email = $data['email'];
		$password = $data['password'];
		$address = $data['address'];
		$zip_code = $data['zip_code'];
		$created = $data['created'];
		$status = ($data['member'] == 2) ? 0 : 1;

		$query = "INSERT INTO `users`(`id_user`, `username`, `password`, `firstname`, `lastname`, `address`, `zip_code`, `phone`, `email`, `id_member`, `created`, `updated`, `status`) VALUES ('".$id_user."','".$username."','".$password."','".$firstname."','".$lastname."','".$address."','".$zip_code."','".$phone."','".$email."','".$member."','".$created."',NULL,'".$status."')";
		$sql = $this->db->query($query);

		if($sql){
			header('Location: http://localhost/oop-shopping-cart/signup.php?success=' . urlencode('Thanks for registration...'));
		}else{
			header('Location: http://localhost/oop-shopping-cart/signup.php?error=' . urlencode('Registration failed!'));
		}

	}

	public function all_users(){

		$query = "SELECT users.*, members.* FROM users, members WHERE users.id_member!=3 AND users.id_member=members.id_member";
		$sql = $this->db->query($query);
		$res = $sql->fetch_all(MYSQLI_ASSOC);

		return $res;

	}

	public function delete_user($id_user){

		$query = "DELETE FROM users WHERE id_user='".$id_user."'";
		$sql = $this->db->query($query);

		return $sql;

	}

	public function update_user($data){

		if (is_array($data)) {
			
			$id_user = $data['id_user'];
			$username = $data['username'];
			$firstname = $data['firstname'];
			$lastname = $data['lastname'];
			$id_member = $data['id_member'];
			$email = $data['email'];
			$address = $data['address'];
			$zip_code = $data['zip_code'];
			$phone = $data['phone'];

			$query = "UPDATE `users` SET `username`='".$username."',`firstname`='".$firstname."',`lastname`='".$lastname."',`address`='".$address."',`zip_code`='".$zip_code."',`phone`='".$phone."',`email`='".$email."',`id_member`='".$id_member."' WHERE `id_user`='".$id_user."'";
			$update = $this->db->query($query);

			return $update;

		}

	}

	public function get_user_details($id_user){

		$query = "SELECT * FROM users WHERE id_user='".$id_user."'";
		$sql = $this->db->query($query);
		$result = $sql->fetch_assoc();

		return $result;

	}
}


?>