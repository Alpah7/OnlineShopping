 <div class="container">
  <!-- Example row of columns -->
  <div class="row" id="products">
  <?php foreach ($items as $data) { ?>
    <div class="col-md-3 col-sm-6">
    <img src="<?= $data['images'] ?>" class="img-responsive">
      <h4><?= $data['name'] ?></h4>
      <p><a class="btn btn-default" href="view.php?id=<?= $data['id_product'] ?>&item=<?= str_replace('+','_',urlencode($data['name'])) ?>" role="button">View details &raquo;</a></p>
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