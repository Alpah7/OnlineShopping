	<div class="container-fluid" style="background-color: #222;color:#e3e3e3;padding:10px 50px;margin-bottom: 0px;">
  
	  <div class="row-fluid">
	    
	    <div class="col-md-4">
	      <h2>Batik Sleker Asri</h2>
	    </div>

	    <div class="col-md-8">
	      
	      <div class="row-fluid text-center">
	      	<div class="col-md-6">
	      	<h2>Courier</h2>
	      		<img src="<?= __SHOP__ ?>assets/images/pengirimans.png" alt="Logo Courier" class="img-responsive" style="margin: auto;">
	      	</div>
	      	<div class="col-md-6">
	      	<h2>Bank</h2>
	      		<img src="<?= __SHOP__ ?>assets/images/logo-banks.png" alt="Logo Courier" class="img-responsive" style="margin: auto;">
	      	</div>
	      </div>

	    </div>

	  </div>

	</div>

    <script src="<?= __SHOP__ ?>assets/js/jquery.js"></script>
    <script src="<?= __SHOP__ ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= __SHOP__ ?>assets/js/html2canvas.js"></script>
    <script src="<?= __SHOP__ ?>admin/libs/js/jquery.dataTables.min.js"></script>
    <script src="<?= __SHOP__ ?>assets/js/dataTables.bootstrap.min.js"></script>
    <script>

    		$("#table_order_user").DataTable();
    		$("#table_all_order").DataTable();

    		$(".nav a").on("click", function(){
			   $(".nav").find(".active").removeClass("active");
			   $(this).parent().addClass("active");
			});

			setTimeout(function(){
				$('#alert_struk').hide();
			}, 3000);

		  	if(window.location.href.indexOf('#item_exists') != -1) {

			    $('#item_exists').modal('show').on('shown', function () {
			    	window.setTimeout(function () {
			        	$("#item_exists").modal("hide");
			    	}, 2000);
			    });

			}


			if(window.location.href.indexOf('#alert-messages') != -1) {

			    $('#alert-messages').modal('show').on('shown', function () {
			    	window.setTimeout(function () {
			        	$("#alert-messages").modal("hide");
			    	}, 2000);
			    });

			}


			$("#table_order_user").on('click', '#delete_order_user', function(event) {
				event.preventDefault();

				$.get('http://localhost/oop-shopping-cart/actions/delete_order_user.php?deleteOrder='+$(this).attr('data-user-order'), function(data) {
					console.log('Data ' + data + ' Successfully deleted!');
				});
				
				return false;

			});


			var element = $("#html-content-holder"); // global variable
			var getCanvas; // global variable
			 
            $("#btn-Preview-Image").on('click', function () {
		         html2canvas(element, {
		         onrendered: function (canvas) {
		                $("#previewImage").append(canvas);
		                getCanvas = canvas;
		             }
		         });
		    });

			$("#btn-Convert-Html2Image").on('click', function () {
		    var imgageData = getCanvas.toDataURL("image/png");
		    // Now browser starts downloading it instead of just showing it
		    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
		    $("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);
		    
			});

			var colors = new Array(
			  [62,35,255],
			  [60,255,60],
			  [255,35,98],
			  [45,175,230],
			  [255,0,255],
			  [255,128,0]);

			var step = 0;
			//color table indices for: 
			// current color left
			// next color left
			// current color right
			// next color right
			var colorIndices = [0,1,2,3];

			//transition speed
			var gradientSpeed = 0.002;

			function updateGradient()
			{
			  
			  if ( $===undefined ) return;
			  
			var c0_0 = colors[colorIndices[0]];
			var c0_1 = colors[colorIndices[1]];
			var c1_0 = colors[colorIndices[2]];
			var c1_1 = colors[colorIndices[3]];

			var istep = 1 - step;
			var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
			var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
			var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
			var color1 = "rgb("+r1+","+g1+","+b1+")";

			var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
			var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
			var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
			var color2 = "rgb("+r2+","+g2+","+b2+")";

			 $('#gradient').css({
			   background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
			    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});
			  
			  step += gradientSpeed;
			  if ( step >= 1 )
			  {
			    step %= 1;
			    colorIndices[0] = colorIndices[1];
			    colorIndices[2] = colorIndices[3];
			    
			    //pick two new target color indices
			    //do not pick the same as the current one
			    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
			    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
			    
			  }
			}

			setInterval(updateGradient,10);

    </script>
  </body>
</html>