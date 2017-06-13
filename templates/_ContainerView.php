<div class="container" style="padding-top: 30px;margin-bottom: 150px;">

	<div class="col-md-4">
		<img src="<?= $details['images'] ?>" alt="<?= str_replace('_',' ',$_GET['item']) ?>" class="img-responsive">
	</div>
	<div class="col-md-8">
		<h2><?= str_replace('_',' ',$_GET['item']) ?></h2>
		<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">
		<table class="table">
			<tr>
				<th style="width:25%;">Tersedia</th>
				<td style="width:75%;">: <?= $data = ($details['stock'] != 0) ? $details['stock'] . " Pcs" : "Sold Out"; ?></td>
			</tr>
			<tr>
				<th style="width:25%;">Kategori</th>
				<td style="width:75%;">: <?= $details['cat_name'] ?></td>
			</tr>
			<tr>
				<th style="width:25%;">Ukuran</th>
				<td style="width:75%;">: <?= $generator->select_size($details['size']) ?></td>
			</tr>
			<?php if (isset($_SESSION['users'])): ?>
			<tr>
				<th style="width:25%;">Jumlah Barang</th>
				<td style="width:75%;">:
					<input type="number" name="qty" max="<?= $details['stock'] ?>" min="1" placeholder="How Many?">
				</td>
			</tr>
			<?php endif ?>
			<tr>
				<th style="width:25%;">Harga</th>
				<td style="width:75%;">: <?= $generator->IDR($details['price']) ?></td>
			</tr>
			<tr>
				<th style="width:25%;">&nbsp;</th>
				<td style="width:75%;">
				<?php if (!isset($_SESSION['users'])): ?>
					<a href="javascript:;" class="btn btn-primary" disabled><i class="fa fa-shopping-bag"></i> Beli Barang</a>
					<span class="help-block">Login Terlebih dahulu untuk membeli barang.</span>
				<?php else: ?>
					<button type="submit" class="btn btn-primary"><i class="fa fa-shopping-bag"></i> Beli Barang</button>
				<?php endif ?>
					<input type="hidden" name="id_product" value="<?= $details['id_product'] ?>">
					<input type="hidden" name="id_session" value="<?= $_SESSION['users'] ?>">
				</td>
			</tr>
		</table>
		</form>
	</div>

</div>