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