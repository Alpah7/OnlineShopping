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
				<span><b>Kode Pos</b> : </span> <?= $dataUser['zip_code'] ?> <br>
				<span><b>Mendaftar Sejak</b> : </span> <?= $dataUser['created'] ?> <br>
				<span><b>Diubah</b> : </span> <?= $updated = ($dataUser['updated'] != NULL) ? $dataUser['updated'] : 'Not Updated'; ?> <br>
				<?php if ($_SESSION['scopes'] == 'member/'): ?>
				<hr>
					<div class="help-block">
						<i class="glyphicon glyphicon-info-sign"></i> Setiap pembelian barang anda akan mendapatkan diskon 5%.
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
				<div class="panel-heading">Upload Pembayaran</div>
					<div class="panel-content form-group" style="padding:10px;">
						<label>Upload Struk Transfer</label>
						<div class="input-group">
					      <input type="file" class="form-control" name="struk_transfer">
					      <span class="input-group-addon">
					        <i class="fa fa-paperclip"></i> Struk Transfer
					      </span>
					    </div>
					    <br>
					    <label>Bayar untuk barang:</label>
					    <div class="form-group">
					      <select name="id_order" class="form-control">
					      	<option value="">-- Barang dibeli --</option>
					      	<?php foreach ($user->get_user_order($_SESSION['users']) as $data): ?>
					      		<?php if ($data['O_STATUS'] != 1): ?>
							      	<option value="<?= $data['O_ID_ORDER'] ?>">
							      		<?= $data['O_PRODUCT'] ?>  (<?= $data['O_QTY'] ?>)
							      	</option>
					      		<?php endif ?>
					      	<?php endforeach ?>
					      </select>
					    </div>

				        <button class="btn btn-default" type="submit">Bayar!</button>
						<input type="hidden" name="id_user" value="<?= $_SESSION['users'] ?>">
					</div>
				</form>
			</div>
		</div>

		<div class="col-lg-9">
			
			<?php if (isset($_GET['hal']) == 'ganti_password'): ?>
				<?php require_once '_GantiPassword.php'; ?>
			<?php elseif (isset($_GET['page']) == 'ganti_foto_profil'): ?>
				<?php require_once '_GantiFoto.php'; ?>
			<?php else: ?>
				<?php require_once '_OrderDetails.php'; ?>
			<?php endif ?>
			
		</div>
	</div>

</div>