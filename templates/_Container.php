 <div class="container" style="padding-top: 30px;">
  <!-- Example row of columns -->
  <div class="row" id="products">
  <?php foreach ($items as $data) { ?>
    <div class="col-md-3 col-sm-6" style="margin: 30px 0px;font-family: 'Love Ya Like A Sister', helvetica;">
      <div class="ih-item circle effect13 bottom_to_top">
        <a href="view.php?id=<?= $data['id_product'] ?>&item=<?= str_replace('+','_',urlencode($data['name'])) ?>">
          <div class="img">
            <img src="<?= $data['images'] ?>" alt="img">
          </div>
          <div class="info">
            <h3><?= $data['name'] ?></h3>
            <p>
              <b>Stok</b> : <?= $data['stock'] ?><br>
              Kategori : <b><?= $products->get_details_item($data['id_product'])['cat_name'] ?></b><br>
              <b>Harga</b> : <?= $generator->IDR($data['price']) ?>
            </p>
          </div>
        </a>
      </div>
      <div class="info-bottom">
        <h4><?= $data['name'] ?></h4>
        <p>
          <b>Stok</b> : <?= $data['stock'] ?><br>
          Kategori : <b><?= $products->get_details_item($data['id_product'])['cat_name'] ?></b><br>
          <b>Harga</b> : <?= $generator->IDR($data['price']) ?>
        </p>
        <a class="btn btn-block btn-sm btn-default" href="view.php?id=<?= $data['id_product'] ?>&item=<?= str_replace('+','_',urlencode($data['name'])) ?>">
          Beli
        </a>
      </div>
    </div>
  <?php } ?>
  </div>

  <nav class="text-center">
    <ul class="pagination">
      <?php for ($i=1; $i < $number['numPage'] ; $i++) { ?>
      <li><a href="?halaman=<?= $i ?>#products"><?= $i ?></a></li>
      <?php } ?>
    </ul>
  </nav>

</div>