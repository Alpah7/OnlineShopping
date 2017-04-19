<div class="container" style="padding-top: 30px;margin-bottom: 150px;">
	
	<h2><i class="glyphicon glyphicon-qrcode"></i> Order Payment</h2>
	<hr>

	<div class="row">
		
		<div class="col-md-3">
			
			<div class="panel panel-info">
			  <div class="panel-heading"><i class="glyphicon glyphicon-info-sign"></i> How to Pay My Order ?</div>
			  <div class="panel-body">
			    <ol>
			    	<li>Transfer your payment in account number <a href="about.php" title="Account Number">Betta Shop</a></li>
			    	<li>Cut <code>QrCode</code> in <i>Billing Screenshoot</i> or Scan in your smartphone.</li>
			    	<li>Login for your account.</li>
			    	<li>Clik <code class="text-muted">Others > Order Payment</code></li>
			    	<li>Follow intructions in form</li>
			    	<li>If you have a done, we send SMS for you to confirmation.</li>
			    </ol>
			  </div>
			</div>

		</div>

		<div class="col-md-7">

			<div class="row">
				<div class="col-md-6">
					<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">
						<label for="billing_upload"><i class="fa fa-camera"></i> Your Billing Screenshoot</label>
						<div class="form-group">
						    <input type="file" class="form-control" name="billing_upload" required <?php if (!isset($_SESSION['users'])): ?> disabled <?php endif; ?> required>
					    </div>
					<hr>
					<div class="well">
					<?php if (isset($_POST['id_order'])): ?>

						<div class="form-group">
							<label>ORDER ID</label>
							<b><?= $data['id_order'] ?></b>
						</div>
						

					<?php endif; ?>
						Your Order Information will display in here...
					</div>
				</div>
				<div class="col-md-6">
						<div class="form-group">
							<label for="account_name">Account Name</label>
							<input type="text" name="account_name" placeholder="Your Account Name" <?php if (!isset($_SESSION['users'])): ?> disabled <?php endif; ?> class="form-control" required>
						</div>
						<div class="form-group">
							<label for="account_number">Account Number</label>
							<input type="text" name="account_number" placeholder="Your Account Number" <?php if (!isset($_SESSION['users'])): ?> disabled <?php endif; ?> class="form-control" required>
						</div>
						<div class="form-group">
							<label for="id_order">Order ID</label>
							<input type="text" name="id_order" placeholder="Your Order ID" <?php if (!isset($_SESSION['users'])): ?> disabled <?php endif; ?> class="form-control" required>
						</div>
						<button type="submit" class="btn btn-block btn-primary">Scan</button>
					</form>
				</div>	
			</div>

		</div>

		<div class="col-md-2">
			<h3><i class="fa fa-building"></i> Banks</h3>
			<img src="<?= __SHOP__ ?>assets/images/logo-bank.png" alt="Bank Logo" class="img-responsive">

			<hr>

			<h3><i class="fa fa-truck"></i> Courier</h3>
			<img src="<?= __SHOP__ ?>assets/images/pengiriman.png" alt="Courier" class="img-responsive">
		</div>

	</div>

</div>

<div class="modal fade" id="alert-messages" tabindex="-1" role="dialog" aria-labelledby="alert-messages">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="alert-messages">Warning!</h4>
      </div>
      <div class="modal-body text-center">
        <p>Maaf data yang anda masukkan tidak terindentifikasi oleh sistem kami. Silahkan masukkan data yang akurat.</p>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="window.history.back();" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>