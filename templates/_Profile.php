<div class="container" style="padding-top: 30px;margin-bottom: 150px;">
	<?php $dataUser = $user->get_user_details($_SESSION['users']) ?>
	<hr>

	<div class="container row">

		<div class="col-lg-3 text-center">
			<?php if ($dataUser['foto'] == ''): ?>
				<img src="../assets/images/users/hermit-crab.svg" class="img-circle">
			<?php else: ?>
				<img src="<?= $dataUser['foto'] ?>" class="img-circle img-responsive">
			<?php endif ?>
			<hr>
			<h3><?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></h3>
			<div class="text-left">
				<i class="glyphicon glyphicon-map-marker"></i> <?= $dataUser['address'] ?> <br>
				<i class="glyphicon glyphicon-phone-alt"></i> <?= rtrim(chunk_split($dataUser['phone'], 4, '-'), '-') ?> <br>
				<i class="glyphicon glyphicon-envelope"></i> <?= $dataUser['email'] ?> <br>
				<span><b>Zip Code</b> : </span> <?= $dataUser['zip_code'] ?> <br>
				<span><b>Date Created</b> : </span> <?= $dataUser['created'] ?> <br>
				<span><b>Date Updated</b> : </span> <?= $updated = ($dataUser['updated'] != NULL) ? $dataUser['zip_code'] : 'Not Updated'; ?> <br>
				<?php if ($_SESSION['scopes'] == 'member/'): ?>
				<hr>
					<div class="help-block">
						<i class="glyphicon glyphicon-info-sign"></i> Your are member of Betta Shop, every transaction you have a 5% discount.
					</div>
				<?php endif ?>
				<hr>
				<?php if (isset($_GET['error'])  == 'true'): ?>
				<div class="alert alert-danger" role="alert" id="alert_struk">
				  <p>Error Uploading!</p>
				</div>
				<?php elseif (isset($_GET['success'])  == 'true'): ?>
					<div class="alert alert-success" role="alert" id="alert_struk">
				  <p>Uploading successfully!</p>
				</div>
				<?php endif; ?>
				<form action="" method="POST" enctype="multipart/form-data" class="panel panel-primary"">
				<div class="panel-heading">Upload Payment</div>
					<div class="panel-content form-group" style="padding:10px;">
						<label>Upload Struk Transfer</label>
						<div class="input-group">
					      <input type="file" class="form-control" name="struk_transfer">
					      <span class="input-group-addon">
					        <i class="fa fa-paperclip"></i> Struk Payment
					      </span>
					    </div>
					    <br>
					    <label>Your Orders</label>
					    <div class="form-group">
					      <select name="id_order" class="form-control">
					      	<option value="">-- Your Orders --</option>
					      	<?php foreach ($user->get_user_order($_SESSION['users']) as $data): ?>
					      		<?php if ($data['O_STATUS'] != 1): ?>
							      	<option value="<?= $data['O_ID_ORDER'] ?>">
							      		<?= $data['O_PRODUCT'] ?>  (<?= $data['O_QTY'] ?>)
							      	</option>
					      		<?php endif ?>
					      	<?php endforeach ?>
					      </select>
					    </div>

				        <button class="btn btn-default" type="submit">Send!</button>
						<input type="hidden" name="id_user" value="<?= $_SESSION['users'] ?>">
					</div>
				</form>
			</div>
		</div>

		<div class="col-lg-9">
			
			<?php if (isset($_GET['hal']) == 'ganti_password'): ?>
				<h2>Ganti Password</h2>
				<?php if (isset($_GET['berhasil'])): ?>
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?= $_GET['berhasil'] ?>
					</div>
				<?php elseif (isset($_GET['gagal'])): ?>
					<div class="alert alert-danger alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?= $_GET['gagal'] ?>
					</div>
				<?php endif ?>
				<hr>
				<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
					<div class="form-group">
						<label for="">Password Lama</label>
						<input type="password" name="old_password" placeholder="Password Lama" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Password baru</label>
						<input type="password" name="new_password" placeholder="Password Baru" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Re-Password baru</label>
						<input type="password" name="re_new_password" placeholder="Ulangi Password Baru" class="form-control" required>
					</div>
					<input type="hidden" name="id_user" value="<?= $_SESSION['users'] ?>">
					<input type="hidden" name="url" value="<?= __SHOP__ . $_SESSION['scopes'] ?>">
					<input type="submit" name="ganti" value="Ganti Password" class="btn btn-default btn-sm">
					<a href="http://localhost/oop-shopping-cart/member/profile.php" class="btn btn-danger btn-sm">Kembali</a>
				</form>
			<?php elseif (isset($_GET['page']) == 'ganti_foto_profil'): ?>
				<h2>Ganti Foto Profil</h2>
				<?php if (isset($_GET['berhasil'])): ?>
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?= $_GET['berhasil'] ?>
					</div>
				<?php elseif (isset($_GET['gagal'])): ?>
					<div class="alert alert-danger alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?= $_GET['gagal'] ?>
					</div>
				<?php endif ?>
				<hr>

				<form action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="POST">
					<div class="help-block">
						<p><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Gambar yang diunggah harus mempunyai ekstensi JPG, JPEG, PNG, dan GIF.</p>
					</div>
					<div class="form-group">
						<input type="file" name="foto" class="form-control" required>
					</div>
					<input type="hidden" name="id_user" value="<?= $_SESSION['users'] ?>">
					<input type="hidden" name="url" value="<?= __SHOP__ . $_SESSION['scopes'] ?>">
					<input type="submit" name="upload" value="Ganti Foto" class="btn btn-sm btn-default">
					<a href="http://localhost/oop-shopping-cart/<?= $_SESSION['scopes'] ?>profile.php" class="btn btn-danger btn-sm">Kembali</a>
				</form>

			<?php else: ?>
				<?php require_once '_OrderDetails.php'; ?>
			<?php endif ?>
			
		</div>
	</div>

</div>