 <div class="container" style="margin-top: 30px;width: 70%;">

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
  
  <form action="<?= __ACT__ ?>Signup.php" method="POST">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="firstname"><i class="fa fa-user"></i> Nama Lengkap</label>
        <div class=" form-inline">
          <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Nama Depan" required>
          <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Nama Belakang" required>
        </div>
      </div>
      <div class="form-group">
        <label for="phone"><i class="fa fa-phone"></i> Nomor Telepon</label>
        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Nomor Telepon : misal. (+62) 858 xxx xxx xx" required>
      </div>
      <div class="form-group">
        <label for="phone"><i class="fa fa-ticket"></i> Pilih Member</label>
        <select name="member" id="member" class="form-control" required>
          <option value="">-- Select One --</option>
          <option value="1">Member Gratis</option>
          <option value="2">Member Premium</option>
        </select>
        <div class="help-block">
          <p><i class="glyphicon glyphicon-info-sign"></i> Baca ketentuan member <b>Batik Sleker Asri</b> <a class="btn btn-link" data-toggle="modal" data-target="#modal">Baca Ketentuan</a>.</p>
        </div>
      </div>
      <div class="form-group">
        <label for="email"><i class="fa fa-envelope-o"></i> Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="password"><i class="fa fa-lock"></i> Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
      </div>
      <div class="form-group">
        <label for="address"><i class="fa fa-building"></i> Alamat</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Alamat" required>
      </div>
      <div class="form-group">
        <label for="zip_code"><i class="fa fa-building"></i> Kode Pos</label>
        <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="Kode Pos" required>
      </div>
      <button type="submit" class="btn btn-default"><i class="fa fa-sign-in"></i> Daftar</button>
    </div>
  </div>
</form>

<div class="modal fade" tabindex="-1" id="modal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Ketentuan Member</h4>
      </div>
      <div class="modal-body">

        <h2 class="text-center">Ketentuan Member di Batik Sleker Asri</h2>
        <p>Untuk menjadi member dan bisa melakukan transaksi pembelian di situs ini, anda hanya perlu mendaftar menjadi member dan memilih untuk menjadi member Gratis atau Premium.</p>

        <h3>Member Gratis</h3>
        <ol>
          <li>Isi form pendaftaran dengan lengkap.</li>
          <li>Pilih member sebagai member gratis.</li>
          <li>Setelah mendaftar anda bisa langsung melakukan transaksi.</li>
        </ol>

        <h3>Member Premium</h3>
        <ol>
          <li>Isi form pendaftaran dengan lengkap.</li>
          <li>Pilih member sebagai member premium.</li>
          <li>Setelah mendaftar anda harus melakukan pembayaran untuk aktivasi member premium sebesar Rp. 50rb kepada pihak administrasi melalui Bank *nomor sudah dicantumkan di bagian bawah website.</li>
          <li>Tunggu konfirmasi, admin akan melakukan aktivasi paling lambah 2 x 24 jam.</li>
          <li>Setelah itu anda bisa login dan melakukan transaksi</li>
          <li>Setiap transaksi yang dilakukan oleh member premium akan mendapat kalkulasi diskon menarik.</li>
        </ol>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Mengerti</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<br><br><br><br><br>
</div> <!-- /container -->