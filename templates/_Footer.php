    <script src="<?= __SHOP__ ?>assets/js/jquery.js"></script>
    <script src="<?= __SHOP__ ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= __SHOP__ ?>assets/js/html2canvas.js"></script>
    <script>

		  	if(window.location.href.indexOf('#item_exists') != -1) {

			    $('#item_exists').modal('show').on('shown', function () {
			    	window.setTimeout(function () {
			        	$("#item_exists").modal("hide");
			    	}, 2000);
			    });

			}


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

    </script>
  </body>
</html>