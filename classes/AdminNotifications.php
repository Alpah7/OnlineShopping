<?php 

class AdminNotifications extends Database {

	private $alert;
	private $details_notif;
	private $data = array();

	public function alert_notif(){

		$query = "SELECT * FROM users WHERE status=0";
		$sql = $this->db->query($query);
		$this->alert = mysqli_num_rows($sql);

		return $this->alert;

	}

	public function get_user_notifications(){

		$query = "SELECT * FROM users WHERE status=0 LIMIT 5";
		$sql = $this->db->query($query);
		while ($result = $sql->fetch_assoc()) {
			
			$this->data[] = $result;

		}

		return $this->data;

	}

}

?>