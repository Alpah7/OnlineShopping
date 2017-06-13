<div class="col-md-10 col-sm-8" style="padding-left: 10px;">

    <h2>Bussines Transaction</h2>
    <hr>

	<table id="table_payment" class="table table-bordered table-condensed table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama Lengkap</th>
				<th>Gambar Struk</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
		<?php $no=1; foreach ($payments->get_all_payments() as $data): ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $data['FULLNAME'] ?></td>
				<td style="width: 20%; height: 10%;" align="center">
					<a href="#!" data-toggle="modal" data-target="#myModal-<?=$data['ID_STRUK']?>"><img src="<?= $data['IMAGES'] ?>" alt="<?= $data['FULLNAME'] ?>" style="width: 20%; height: 10%;"></a>
					<div class="modal fade" id="myModal-<?=$data['ID_STRUK']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-lg" id="<?=$data['ID_STRUK']?>" >
					    <div class="modal-content" >
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title" id="myModalLabel">Struk yang dikirim <?= $data['FULLNAME'] ?></h4>
					      </div>
					      <div class="modal-body text-center pagination-centered">
					        <img src="<?= $data['IMAGES'] ?>" alt="<?= $data['FULLNAME'] ?>" class="img-responsive">
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
					      </div>
					    </div>
					  </div>
					</div>
				</td>
				<td>
					<input <?php if ($data['STATUS'] == 0): ?> checked <?php endif ?> data-toggle="toggle" data-on="Pending" data-off="Confirm" data-onstyle="danger" data-offstyle="success" data-size="mini" type="checkbox" id="update_payment" data-payments="<?= $data['ID_STRUK'] ?>">
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
		
</div>