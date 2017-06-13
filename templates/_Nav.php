<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php if (!empty($_SESSION['scopes'])) { ?>
      <a class="navbar-brand" href="<?= __SHOP__ . $_SESSION['scopes'] ?>"><i class="fa fa-shopping-bag"></i> Batik Sleker Asri</a>
      <?php }else{ ?>
      <a class="navbar-brand" href="<?= __SHOP__?>"><i class="fa fa-shopping-bag"></i> Batik Sleker Asri</a>
      <?php } ?>
      <ul class="nav navbar-nav">
      <?php if (!empty($_SESSION['scopes'])) { ?>
          <li class="active"><a href="<?= __SHOP__ . $_SESSION['scopes'] ?>">Beranda</a></li>
      <?php }else{ ?>
          <li class="active"><a href="<?= __SHOP__?>">Beranda</a></li>
      <?php } ?>
          <li><a href="about.php">Tentang Kami</a></li>
          <li><a href="contact.php">Kontak Kami</a></li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Tips? <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="how-to-order-item.php">Belanja</a></li>
              <li><a href="how-to-transaction.php">Traksaksi</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lainnya <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="shippings.php">Pengiriman</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="payment.php">Pembayaran Barang</a></li>
              <li class="disabled"><a href="javascript:;">QrCode Payment System</a></li>
            </ul>
          </li>
          <?php if (isset($_SESSION['users'])): ?>
            <li><p class="navbar-text">Pembayaran: <?= $user->no_rekening(); ?></p></li>
          <?php endif ?>
        </ul>
    </div>
    <?php if (!empty($_SESSION['users'])) { ?>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart"></i> Keranjang (<?= $cart->cart_count($_SESSION['users']) ?>) <span class="caret"></span></a>
          <div class="dropdown-menu dropdown-cart" role="menu">
          <?php if ($cart->cart_count($_SESSION['users']) < 1): ?>
            <p class="text-center">-- Keranjang Belanja Kosong --</p>
          <?php else: ?>
            <table class="table table-condensed">
            <thead>
              <tr>
                <th>Nama Barang</th>
                <th>Ukuran</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($cart->cart_items($_SESSION['users']) as $data) { ?>
              <tr>
                <td><?= $data['C_NAME'] ?></td>
                <td><?= $data['C_SIZE'] ?></td>
                <td><?= $data['C_QTY'] ?></td>
                <td><?= str_replace(',','.',number_format($data['C_PRICE'] * $data['C_QTY'])) ?></td>
                <td><a href="?id_cart=<?= $data['C_ID'] ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
              </tr>
            <?php } ?>
              <tr>
                <td colspan="5" align="center"><a href="cart.php">Lihat Keranjang</a></td>
              </tr>
            </tbody>
            </table>
          <?php endif; ?>
          </div>
      </li>
        <li><p class="navbar-text">Masuk Sebagai </p></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= ucfirst($_SESSION['firstname']) ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php">Profil</a></li>
            <li><a href="profile.php?hal=ganti_password">Ganti Password</a></li>
            <li><a href="profile.php?page=ganti_foto_profil">Ganti Foto Profil</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">Keluar</a></li>
          </ul>
        </li>
    </ul>
    <?php }else{ ?>
      <div id="navbar" class="navbar-collapse collapse small">
      <form class="navbar-form navbar-right" method="POST" action="<?= __ACT__ ?>Login.php">
        <div class="form-group">
          <input type="email" placeholder="Email" class="form-control" name="email">
        </div>
        <div class="form-group">
          <input type="password" placeholder="Password" class="form-control" name="password">
        </div>
        <input type="submit" name="login" value="Login" class="btn btn-success">
        <a href="signup.php" class="btn btn-link"> Daftar</a>
      </form>
    </div>
    <?php } ?>
  </div>
</nav>