<div class="col-md-10 col-sm-8" style="padding-left: 10px;">

    <h2>Bussines Order</h2>
    <hr>

	<table id="table_order" class="table table-bordered table-hover table-striped small">
		<thead>
			<tr>
				<th class="text-center">ID Order</th>
				<th class="text-center">Nama Produk</th>
				<th class="text-center">Jumlah</th>
				<th class="text-center">Ukuran</th>
				<th class="text-center">Nama Pembeli</th>
				<th class="text-center">Total Belanja</th>
				<th class="text-center">Pajak</th>
				<th class="text-center">Total Pembayaran</th>
				<th class="text-center">Status Order</th>
			</tr>
		</thead>
		<tbody>
		<?php if ($orders->num_order() > 0): ?>
		<?php foreach ($orders_data as $data): ?>
			<tr>
				<td><?= $data['O_ID_ORDER'] ?></td>
				<td><?= $data['O_PRODUCT'] ?></td>
				<td><?= $data['O_QTY'] ?></td>
				<td><?= $data['O_SIZE'] ?></td>
				<td><?= ucwords($data['O_ACCOUNT_NAME']) ?></td>
				<td><?= $generator->IDR($data['O_AMOUNT']) ?></td>
				<td><?= $generator->IDR($data['O_TAX']) ?></td>
				<td><?= $generator->IDR($data['O_TOTAL_PRICE']) ?></td>
				<td>
				<?php if ($payments->get_user_payments_status($data['O_ID_USER']) == 1): ?>
					<input <?php if ($data['O_STATUS'] == 0): ?> checked <?php else: ?>  <?php endif ?> data-toggle="toggle" data-on="Pending" data-off="Process" data-onstyle="danger" data-offstyle="success" data-size="mini" type="checkbox" id="update_process" data-update="<?= $data['O_ID_ORDER'] ?>">
				<?php else: ?>
					<span class="text-info">Waiting Transactions</span>
				<?php endif ?>
				</td>
			</tr>
		<?php endforeach ?>
		<?php else: ?>
			<tr>
				<td colspan="10" align="center">Data Order is Empty</td>
			</tr>
		<?php endif ?>
		</tbody>
	</table>

	
		
</div>