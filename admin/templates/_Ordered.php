<div class="col-md-10 col-sm-8" style="padding-left: 10px;">

    <h2>Bussines Order</h2>
    <hr>

	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th rowspan="2">ORDER ID</th>
				<th rowspan="2">Product Name</th>
				<th rowspan="2">Qty</th>
				<th rowspan="2">Size</th>
				<th colspan="2">Account</th>
				<th rowspan="2">Amount</th>
				<th rowspan="2">Tax</th>
				<th rowspan="2">Total Shipping</th>
				<th rowspan="2">Order Status</th>
			</tr>
			<tr>
				<th>Name</th>
			    <th>Number</th>
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
				<td><?= $data['O_ACCOUNT_NAME'] ?></td>
				<td><?= $data['O_ACCOUNT_NUMBER'] ?></td>
				<td><?= $generator->IDR($data['O_AMOUNT']) ?></td>
				<td><?= $generator->IDR($data['O_TAX']) ?></td>
				<td><?= $generator->IDR($data['O_TOTAL_PRICE']) ?></td>
				<td><?= $status = ($data['O_STATUS'] == 0) ? 'Pending...' : 'Ordered'; ?></td>
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