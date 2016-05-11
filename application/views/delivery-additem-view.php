<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">

	<!--The overwatch Main element Container or MEC-->
	
	<div class="overwatch-mec mec-income">
		
		<div class="col-xs-12 table-end-general table-end table-bank">
			<div class="col-xs-12">
				<input type="text" name="name" id="code" placeholder="Enter Barcodes Manually" />
				<input type="submit" id="add-item" value="ADD" class="call-links"></input>
			</div>
			<div class="col-md-4 total-label total-label-bank">TOTAL -- Php <span class="total-amount"></span></div>
		</div>

		<div class="col-xs-12">
			<div class="row table-title table-title-general">
				<div class="col-xs-2"></div>
				<div class="col-xs-2">item code</div>
				<div class="col-xs-2">supplier</div>
				<div class="col-xs-4">item</div>
				<div class="col-xs-2 price-field">price</div>
			</div>
							
			<script type="text/javascript">
				//initialization of jquery array
				var ItemArray = [];
			</script>

			<div id="ajax-content-container">
						 
			</div>
		</div>

		<script type="text/javascript">

			function removeItem($id) {
				alert($id);
				$('#'+$id).remove();

				for (var i = 0; i < ItemArray.length; i++){
				    if(ItemArray[i].ItemName == $id) 
				    { 
				        ItemArray.splice(i, 1);
				        break;
				    }
				}

			    var total = 0;
				$(".table-entries").each(function() {
					total += parseFloat($(this).find(".price-field").text());
				});
				$('.total-amount').html(total);

				alert("success!");

			}

			$(document).ready(function() {

				var totalQuantity = 0;

				var barcode="";
			    $(document).keydown(function(e) {
			        var code = (e.keyCode ? e.keyCode : e.which);
				        if(code==13)// Enter key hit
				        {
							var eachctr = 0;
							totalQuantity = 0;

							$.ajax({
							   	url: 'deliver-more-data',
							   	type: "POST",
								data: {type: barcode},
								dataType: "html",
							   	success: function( data ) {
									if(data==null||data==''){
										alert("Item does not exist.");

										barcode="";
									}
									else{
										var total = 0;
										ItemArray.push({
											ItemCode : '201602000000001', 
											ItemName : barcode,
											ItemQuantity : '1'/*$('.add-delivery-form #qty').val()*/
										});

										$('#ajax-content-container').prepend(data);

										barcode=""; 

									   	$.each(ItemArray, function(key, value) { 
											totalQuantity = parseInt(ItemArray[key].ItemQuantity) + totalQuantity;
										});
									}

									$(".table-entries").each(function() {
									  	total += parseFloat($(this).find(".price-field").text());
									});
									$('.total-amount').html(total);
							   	},
							   	error: function(xhr, status, error) {
							      // check status && error
							      alert(error);
							   	}
							});
							      	
							return false;			        
					}
			        else if(code==9)// Tab key hit
			        {
			        }
			        else
			        {
			            barcode=barcode+String.fromCharCode(code);
			        }
			    });

				 $("#add-item").click(function (){
				    		var code = $('#code').val();
				    		var eachctr = 0;
							totalQuantity = 0;

							$.ajax({
							   	url: 'deliver-more-data',
							   	type: "POST",
								data: {type: code},
								dataType: "html",
							   	success: function( data ) {

									if(data==null||data==''){
										alert("Item does not exist.");

										barcode='';
										$('#code').val('');
									}
									else{
										var total = 0;
										ItemArray.push({
											ItemCode : '201602000000001', 
											ItemName : code,
											ItemQuantity : '1'/*$('.add-delivery-form #qty').val()*/
										});

										$('#ajax-content-container').prepend(data);

										$('#code').val('');
										barcode='';

									   	$.each(ItemArray, function(key, value) { 
											totalQuantity = parseInt(ItemArray[key].ItemQuantity) + totalQuantity;
										});
									}

									$(".table-entries").each(function() {
									  	total += parseFloat($(this).find(".price-field").text());
									});
									$('.total-amount').html(total);
							   	},
							   	error: function(xhr, status, error) {
							      // check status && error
							      alert(error);
							   	}
							});
							      	
							return false;
				});

				$("#submit").click(function (){
					$.post('add-delivery-transaction',{data:ItemArray,qty:totalQuantity},function(html){
						alert('requested delivery successful!');
					});

					window.location.href = "<?php echo site_url('tenant/report-delivery'); ?>";
					return false;
				});

			});

			/*$('#name2').on('input', function() {
					var username = $('#name2').val();
					$.ajax({
						url: "suggest-more-data",
						async: false,
						type: "POST",
						data: "type="+username,
						dataType: "html",
						success: function(data) {
							$('#ajax-content-container').html(data);
						}
					})
			});
		
			$('#code').on('input', function() {
					var code = $('#code').val();
					$.ajax({
						url: "suggest-more-data-code",
						async: false,
						type: "POST",
						data: "type="+code,
						dataType: "html",
						success: function(data) {
							$('#ajax-content-container').html(data);
						}
					})
			});*/
		</script>
		<a id="submit" href="#" class="call-links">COMPLETE DELIVERY REQUEST</a>
	</div>

</div>