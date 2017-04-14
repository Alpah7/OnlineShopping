<script src="<?= __SHOP__ ?>admin/libs/js/jquery.js"></script>
<script src="<?= __SHOP__ ?>admin/libs/js/bootstrap.min.js"></script>
<script src="<?= __SHOP__ ?>admin/libs/js/jquery.dataTables.min.js"></script>
<script src="<?= __SHOP__ ?>admin/libs/js/raphael-min.js"></script>
<!-- <script src="<?= __SHOP__ ?>admin/libs/js/jquery-1.8.2.min.js"></script> -->
<script src="<?= __SHOP__ ?>admin/libs/js/morris-0.4.1.min.js"></script>

<script>
	$(document).ready(function(){

		$("#table_user").DataTable();
		$("#table_products").DataTable();
		$("#table_categories").DataTable();
       
		$("#table_user").on('click', '.edit-data' ,function(event) {
			event.preventDefault();

				$.get('detail_user.php?id_user='+$(this).attr('data-idUser'), function(data) {
					 $(".modal-body").html(data);
				});
				
				$("#modalEdit").modal('show');

		});

		$("#table_products").on('click', '.edit-dataProduct' ,function(event) {
			event.preventDefault();
		
				$.get('detail_product.php?id_product='+$(this).attr('data-idProduct'), function(data) {
					 $(".modal-body").html(data);
				});
				
				$("#modalEdit").modal('show');

		});

		$("#table_categories").on('click', '.edit-dataCategory' ,function(event) {
			event.preventDefault();

				$.get('detail_category.php?id_cat='+$(this).attr('data-idCategory'), function(data) {
					 $(".modal-body").html(data);
				});
				
				$("#modalEdit").modal('show');

		});

		$('[data-toggle=offcanvas]').click(function() {
		    $('.row-offcanvas').toggleClass('active');
		});



		Morris.Line({
		  element: 'line-chart',
		  data: [
		    { y: '2006', a: 100, b: 90 },
		    { y: '2007', a: 75,  b: 65 },
		    { y: '2008', a: 50,  b: 40 },
		    { y: '2009', a: 75,  b: 65 },
		    { y: '2010', a: 50,  b: 40 },
		    { y: '2011', a: 75,  b: 65 },
		    { y: '2012', a: 100, b: 90 }
		  ],
		  xkey: 'y',
		  ykeys: ['a', 'b'],
		  labels: ['Transaction A', 'Transaction B']
		});

		Morris.Area({
		  element: 'area-chart',
		  data: [
		    { y: '2006', a: 100, b: 90 },
		    { y: '2007', a: 75,  b: 65 },
		    { y: '2008', a: 50,  b: 40 },
		    { y: '2009', a: 75,  b: 65 },
		    { y: '2010', a: 50,  b: 40 },
		    { y: '2011', a: 75,  b: 65 },
		    { y: '2012', a: 100, b: 90 }
		  ],
		  xkey: 'y',
		  ykeys: ['a', 'b'],
		  labels: ['Earning A', 'Earning B']
		});
    });
</script>
</body>
</html>