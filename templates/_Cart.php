<div class="container">

	<div class="col-md-8">
		<h2>Your Cart</h2>
		<hr>
		<table class="table table-condensed table-hover table-striped">
			<thead>
				<tr>
					<th>Nama Barang</th>
					<th>Ukuran</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Actions</th>
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
				<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">
	                <td><?= $data['C_NAME'] ?></td>
	                <td>
	                	<?= $generator->user_select_size($data['C_ITEM']) ?>
	                </td>
	                <td><input type="number" name="qty" value="<?= $data['C_QTY'] ?>" min="1" max="<?= $products->get_details_item($data['C_ITEM'])['stock'] ?>" required></td>
	                <td><?= $generator->IDR(($data['C_PRICE'] * $data['C_QTY'])) ?></td>
	                <td>
	                <button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button>
	                <a href="?id_cart=<?= $data['C_ID'] ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
	                <input type="hidden" name="id_cart" value="<?= $data['C_ID'] ?>">
	                </td>
	            </form>
              	</tr>
			<?php } ?>
			<?php endif; ?>
			<tr>
				<td colspan="3" align="right">Total :</td>
				<td><?= $generator->IDR($cart->total_price_cart($_SESSION['users'])) ?></td>
			</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-4" style="padding-top: 70px;">
		<div class="panel panel-primary">
		<div class="panel-heading text-center"><h4><i class="fa fa-truck"></i> Pengiriman</h4></div>
		  <div class="panel-body">
		  <table width="100%">
		  <?php $data_user = $user->get_user_details($_SESSION['users']); ?>
		  	<tr>
		  		<th>Nama Lengkap</th>
		  		<td>: <?= $data_user['firstname'] .' '. $data_user['lastname'] ?></td>
		  	</tr>
		  	<tr>
		  		<th>Alamat</th>
		  		<td>: <?= $data_user['address'] ?></td>
		  	</tr>
		  	<tr>
		  		<th>Kode Pos</th>
		  		<td>: <?= $data_user['zip_code'] ?></td>
		  	</tr>
		  	<tr>
		  		<th>Telepon</th>
		  		<td>: <?= $data_user['phone'] ?></td>
		  	</tr>
		  	<tr>
		  		<th>Email</th>
		  		<td>: <?= $data_user['email'] ?></td>
		  	</tr>
		  </table>
		  <hr>
		  <table width="100%">
		  	<tr>
		  		<th>Diskon</th>
		  		<td>: <?= $discount = ($_SESSION['scopes'] == 'member/') ? '5%' : '0%'; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Total Bayar</th>
		  		<td>: <?= $generator->IDR((int)($cart->cart_rules($_SESSION['users'], $cart->total_price_cart($_SESSION['users'])))) ?></td>
		  	</tr>
		  </table>
		  <br>
		  <div class="help-block">
		  	* Setiap pembelian sudah termasuk pajak.
		  </div>
		  </div>
		  <div class="panel-footer">
		  	<?php if ($cart->total_price_cart($_SESSION['users']) == 0): ?>
		  		<button disabled class="btn btn-primary btn-block"><i class="fa fa-check-square"></i> Checkout</button>
		  	<?php else: ?>
		  		<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">
					<input type="hidden" name="id_user" value="<?= $_SESSION['users'] ?>">
					<input type="hidden" name="total_price" value="<?= $cart->total_price_cart($_SESSION['users']) ?>">
					<input type="hidden" name="total_shipping" value="<?= $cart->cart_rules($_SESSION['users'], $cart->total_price_cart($_SESSION['users'])) ?>">
		  			<button class="btn btn-primary btn-block"><i class="fa fa-check-square"></i> Checkout</button>
		  		</form>
		  	<?php endif; ?>
		  </div>
		</div>
	</div>

</div>

<br><br><br><br><br><br>