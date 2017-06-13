<div class="container">
	<h2><a href="cart.php"><i class="fa fa-arrow-circle-left small"></i></a> Checkout</h2>

	<?php if (isset($_GET['success'])) { ?>
	   <div class="alert alert-success alert-dismissible" role="alert">
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    <strong>Woow!</strong> <?= $_GET['success']; ?>
	  </div>
	 <?php }elseif (isset($_GET['error'])){ ?>
	  <div class="alert alert-danger alert-dismissible" role="alert">
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    <strong>Oops!</strong> <?= $_GET['error']; ?>
	  </div>
	 <?php } ?>

	<div class="row">
	<div class="col-md-3 text-center">
	<img src="http://localhost/oop-shopping-cart/libraries/qrcode.php?text=<?= $generator->orderID() ?>">
	<p class="help-block">ORDER ID</p>
	<div class="text-left">
	<p><b>Read Me</b></p>
	<p class="text-justify">Barang yang anda pesan akan kami proses setelah anda melakukan pembayaran untuk barang yang anda beli. Jika selama 3 hari anda tidak melakukan pembayaran maka pesanan anda kami hapus dari daftar pesanan.</p>
	</div>
	</div>
	<div class="col-md-4">
		<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST" class="text-left">
			<div class="form-group">
				<label for="name_of_account">Nama Pembeli</label>
				<input type="text" name="name_of_account" value="<?= $_SESSION['firstname'] .' '. $_SESSION['lastname'] ?>" readonly class="form-control" required>
			</div>
			<div class="form-group">
				<label for="amount">Total Bayar</label><br>
				<?php if ($_SESSION['scopes'] == 'member/'): ?>
					
				<input type="text" value="<?= number_format( $_SESSION['total_price'] - ($_SESSION['total_price'] * 0.05) + ($_SESSION['total_price']*0.03) , 2, ',', '.') ?>" readonly class="form-control">
				<?php else: ?>
				<input type="text" value="<?= number_format( $_SESSION['total_price'] + ($_SESSION['total_price']*0.03) , 2, ',', '.') ?>" readonly class="form-control">
				<?php endif ?>
			</div>
			<div class="help-block">
				<?php if (!$_SESSION['scopes'] == 'member/'): ?>
				<p><i class="glyphicon glyphicon-info-sign"></i> Jadilah member dan dapatkan diskon setiap transaksi.</p>					
				<?php endif ?>
			</div>
			<input type="hidden" name="amount" value="<?= $_SESSION['total_price'] ?>">
			<input type="hidden" name="id_order" value="<?= $generator->orderID() ?>">
			<input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">
			<input type="hidden" name="total_price" value="<?= $_SESSION['total_shipping'] ?>">
			<input type="hidden" name="cart_count" value="<?= $cart->cart_count($_SESSION['id_user']) ?>">
			<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-handshake-o"></i> Order</button>
		</form>
	</div>
	<div class="col-md-5">
		<table class="table table-condensed table-hover table-striped">
			<thead>
				<tr>
					<th>Nama Barang</th>
					<th>Ukuran</th>
					<th>Jumlah</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>
			<?php if (sizeof($cart->cart_items($_SESSION['users'])) < 1 ): ?>
				<tr>
					<td colspan="5" align="center"> Cart is empty </td>
				</tr>
			<?php else: ?>
			<?php foreach ($cart->cart_items($_SESSION['users']) as $data) { ?>
				<tr>
	                <td><?= $data['C_NAME'] ?></td>
	                <td><?= $data['C_SIZE'] ?></td>
	                <td><?= $data['C_QTY'] ?></td>
	                <td><?= $generator->IDR($data['C_PRICE'] * $data['C_QTY']) ?></td>
              	</tr>
			<?php } ?>
			<?php endif; ?>
			<tr>
				<td colspan="3" align="right">Total Bayar :</td>
				<td><?= $generator->IDR($cart->total_price_cart($_SESSION['users'])) ?></td>
			</tr>
			<?php if ($_SESSION['scopes'] == 'member/'): ?>
<!-- 			<tr>
				<td colspan="3" align="right">Tax :</td>
				<td><?= $tax = ($_SESSION['scopes'] == 'member/') ? $generator->IDR(($_SESSION['total_price']*0.03)) : $generator->IDR(($_SESSION['total_price']*0.03)); ?></td>
			</tr> -->
			<tr>
				<td colspan="3" align="right">Diskon :</td>
				<td><?= $tax = ($_SESSION['scopes'] == 'member/') ? $generator->IDR( ($_SESSION['total_price'] * 0.05) ) : $generator->IDR($_SESSION['total_price']); ?></td>
			</tr>
			<tr>
				<td colspan="3" align="right">Total Bayar selatah Diskon :</td>
				<td><?= $generator->IDR( $_SESSION['total_price'] - ($_SESSION['total_price'] * 0.05) + ($_SESSION['total_price']*0.03) ) ?></td>
			</tr>
			<?php else: ?>
			<!-- <tr>
				<td colspan="3" align="right">Tax :</td>
				<td><?= $tax = ($_SESSION['scopes'] == 'member/') ? $generator->IDR(($_SESSION['total_price']*0.03)) : $generator->IDR(($_SESSION['total_price']*0.03)); ?></td>
			</tr> -->
			<tr>
				<td colspan="3" align="right">Total Bayar :</td>
				<td><?= $generator->IDR( ($_SESSION['total_price']) + ($_SESSION['total_price']*0.03) ) ?></td>
			</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
	</div>

</div>

<br><br><br>