<div class="container">

	<div id="html-content-holder" style="letter-spacing:1px;padding-top: 40px;">
		<div class="row"> 
			<div class="col-md-4 text-center">
				<img src="http://localhost/oop-shopping-cart/libraries/qrcode.php?text=<?= $_SESSION['id_order'] ?>" alt="ORDER ID">
				<h3>ORDER ID</h3>
				<p class="help-block">
					<div class="text-left">
					<p><b>Wajib Dibaca!</b></p>Barang yang anda pesan akan kami proses setelah anda melakukan pembayaran untuk barang yang anda beli. Jika selama 3 hari anda tidak melakukan pembayaran maka pesanan anda kami hapus dari daftar pesanan.</p>
					</div>
				</p>
			</div>
			<div class="col-md-8">
				<?php $billing = $cart->get_billing($_SESSION['billing'], $_SESSION['id_order']); ?>
				<table class="table table-condensed table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Barang</th>
							<th>Jumlah</th>
							<th>Ukuran</th>
							<th>Harga / Item</th>
							<th>Tgl Pemessan</th>
							<th>Tgl Dihapus</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($billing as $data): ?>
						<tr>
							<td><?= $data['id_product'] ?></td>
							<td><?= $data['name'] ?></td>
							<td><?= $data['qty'] ?></td>
							<td><?= $data['size'] ?></td>
							<td><?= $generator->IDR($data['price']) ?></td>
							<td><span class="label label-danger"><?= $data['order_date'] ?></span></td>
							<td><span class="label label-success"><?= $data['out_of_date'] ?></span></td>
						</tr>
					<?php endforeach ?>
						<tr>
							<td colspan="4" align="right">Total :</td>
							<td><?= $generator->IDR($billing[0]['amount']) ?></td>
							<td colspan="2">&nbsp;</td>
						</tr>
						<!-- <tr>
					  		<td colspan="4" align="right">Tax :</td>
					  		<td><?= $tax = ($_SESSION['scopes'] == 'member/') ? '3%' : '3%'; ?></td>
					  		<td colspan="2">&nbsp;</td>
					  	</tr> -->
					  	<tr>
					  		<td colspan="4" align="right">Diskon Member + Pajak :</td>
					  		<td><?= $discount = ($_SESSION['scopes'] == 'member/') ? '5%' : '0%'; ?></td>
					  		<td colspan="2">&nbsp;</td>
					  	</tr>
					  	<tr>
					  		<td colspan="4" align="right">Total Pembayaran :</td>
					  		<td><?= $generator->IDR((int)($billing[0]['total_price'])) ?></td>
					  		<td colspan="2">&nbsp;</td>
					  	</tr>
					</tbody>
				</table>
				<hr>
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
				  		<th>Nomor Telepon</th>
				  		<td>: <?= $data_user['phone'] ?></td>
				  	</tr>
				  	<tr>
				  		<th>Email</th>
				  		<td>: <?= $data_user['email'] ?></td>
				  	</tr>
				  	<tr>
				  		<th>&nbsp;</th>
				  		<td>: <a href="<?= __SHOP__ . $_SESSION['scopes'] ?>" title="I Have a done!" class="btn btn-default">Selesai</a></td>
				  	</tr>
				  </table>
			</div>
		</div>	
    </div>

    <input id="btn-Preview-Image" type="button" value="Preview"/>
    <a id="btn-Convert-Html2Image" href="#">Download</a>
    <br/>
    <h3>Preview Nota Pembelian:</h3>
    <div id="previewImage" style="padding: 10px 20px;"></div>

</div>