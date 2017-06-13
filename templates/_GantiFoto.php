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