<?php 

error_reporting(0);

/* Scope Users */

if (isset($_POST['ganti'])) {
	
	$data = array(
		"old_password" => $_POST['old_password'],
	    "new_password" => $_POST['new_password'],
	    "re_new_password" => $_POST['re_new_password'],
	    "id_user" => $_POST['id_user']
	);

	$from_server = $user->ganti_password($data);

	if ($from_server['status'] == true) {
		// echo $from_server['msg'];
		header('Location: '.$_POST['url'].'profile.php?hal=ganti_password&berhasil='. urlencode($from_server['msg']));
	}else{
		// echo $from_server['msg'];
		header('Location: '.$_POST['url'].'profile.php?hal=ganti_password&gagal='. urlencode($from_server['msg']));
	}

}

if (isset($_POST['upload'])) {

	$filetmp    = $_FILES['foto']['tmp_name'];
	$fileinfo   = pathinfo($_FILES['foto']['name'])['extension'];
	$fileupload = $_POST['id_user'].'-'.date('YmdHis').'.'.$fileinfo;  
	$filepath	= '../assets/images/users/' . $fileupload;
	$filehost 	= str_replace('../','http://localhost/oop-shopping-cart/', $filepath);

	$availabe   = array('jpg','jpeg','png','gif');
	if (file_exists($filepath)) {
		$msg = array('status' => true, 'msg' => 'Foto sudah ada!');
	}else{

		if (in_array($fileinfo, $availabe)) {
			
			if ($filesize < 10485760) {

				$data = array(
					'foto' => $filehost,
					'id_user' => $_POST['id_user']  
				);

				$insert = $user->ganti_foto($data);

				if ($insert) {
					move_uploaded_file($filetmp, $filepath);
					$msg = array('status' => true, 'msg' => 'Foto berhasil diunggah!');
				}else{
					$msg = array('status' => false, 'msg' => 'Foto gagal berhasil diunggah!');
				}


			}else{
				$msg = array('status' => true, 'msg' => 'Ukuran foto terlalu besar!');
			}
		}else{
			$msg = array('status' => true, 'msg' => 'Ekstensi foto tidak diijinkan!');
		}
	}

	if ($msg['status'] == true) {
		header('Location: '.$_POST['url'].'profile.php?page=ganti_foto_profil&berhasil='. urlencode($msg['msg']));
	}else{
		header('Location: '.$_POST['url'].'profile.php?page=ganti_foto_profil&gagal='. urlencode($msg['msg']));
	}

}

/* Scopes Admin */

if (isset($_POST['admin_edit'])) {
	
	$data = array(
		"id_user" => $_POST['id_user'],
	    "firstname" => $_POST['first_name'],
	    "lastname" => $_POST['last_name'],
	    "email" => $_POST['email'],
	    "address" => $_POST['address'],
	    "zip_code" => $_POST['zip_code'],
	    "phone" => $_POST['phone'],
	    "no_rek" => $_POST['no_rek']
	);

	// echo "<pre>";
	// print_r($data);
	// die();

	$update = $user->update_admin_profile($data);

	if($update == true){
		header('Refresh:0; url=http://localhost/oop-shopping-cart/admin/settings.php?success='. urlencode('Updating user successfully'));
	}else{
		header('Refresh:0; url=http://localhost/oop-shopping-cart/admin/settings.php?error='. urlencode('Oops! Updating user failed!'));
	}

}

if (isset($_POST['admin_change_password'])) {

	$data = array(
		"id_user" => $_POST['id_user'],
	    "old_pass" => $_POST['old_pass'],
	    "new_pass" => $_POST['new_pass'],
	    "new_pass_retype" => $_POST['new_pass_retype']
	);

	$status = $user->check_pass($data['id_user'], $data['old_pass']);

	if ($status == true) {
		
		header('Refresh:0; url=http://localhost/oop-shopping-cart/admin/settings.php?error='. urlencode('Oops! password doesn\'t match!'));

		if ($data['new_pass'] != $data['new_pass_retype']) {
			header('Refresh:0; url=http://localhost/oop-shopping-cart/admin/settings.php?error='. urlencode('Oops! password doesn\'t match!'));
		}else{
			
			$update = $user->update_admin_password($data);

			if($update == true){
				header('Refresh:0; url=http://localhost/oop-shopping-cart/admin/settings.php?success='. urlencode('Updating user successfully'));
			}else{
				header('Refresh:0; url=http://localhost/oop-shopping-cart/admin/settings.php?error='. urlencode('Oops! Updating user failed!'));
			}

		}

	}else{

		header('Refresh:0; url=http://localhost/market/admin/settings.php?error='. urlencode('Oops! password doesn\'t match!'));

	}

}


?>