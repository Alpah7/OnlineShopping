<h2>Your Orders!</h2>
			<hr>

			<table id="table_order_user" class="table table-bordered table-hover table-striped small">
				<thead>
					<tr>
						<th class="text-center">ORDER ID</th>
						<th class="text-center">Product Name</th>
						<th class="text-center">Qty</th>
						<th class="text-center">Size</th>
						<th class="text-center">Amount</th>
						<th class="text-center">Tax</th>
						<th class="text-center">Total Shipping</th>
						<th class="text-center">Order Status</th>
					</tr>
				</thead>
				<tbody>
				<?php if ($user->get_num_order($_SESSION['users']) > 0): ?>
				<?php foreach ($user->get_user_order($_SESSION['users']) as $data): ?>
					<?php if ($data['O_DELETED'] != 1): ?>
						
					<tr <?php if ($data['O_STATUS'] == 1): ?> class="success" <?php else: ?> class="danger" <?php endif ?> >
						<td><?= $data['O_ID_ORDER'] ?></td>
						<td><?= $data['O_PRODUCT'] ?></td>
						<td><?= $data['O_QTY'] ?></td>
						<td><?= $data['O_SIZE'] ?></td>
						<td><?= $generator->IDR($data['O_AMOUNT']) ?></td>
						<td><?= $generator->IDR($data['O_TAX']) ?></td>
						<td><?= $generator->IDR($data['O_TOTAL_PRICE']) ?></td>
						<td class="text-center">
							<?php if ($data['O_STATUS'] == 0): ?>
								<label class="label label-danger">Pending...</label>
							<?php else: ?>
								<a id="delete_order_user" href="javascipt:;" data-user-order="<?= $data['O_ID_ORDER'] ?>" title="delete from order table"><label class="label label-success"><i class="fa fa-truck"></i> Process...</label></a>
							<?php endif ?>
						</td>
					</tr>
					<?php endif ?>
					
				<?php endforeach ?>
				<?php else: ?>
					<tr>
						<td colspan="10" align="center">Data Order is Empty</td>
					</tr>
				<?php endif ?>
				</tbody>
			</table>