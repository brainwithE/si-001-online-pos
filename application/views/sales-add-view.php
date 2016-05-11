<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">

	<!--The overwatch Main element Container or MEC-->

	<div class="head-contain">
			<h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i>ADD ITEMS (SCAN BARCODE NOW)</h4>
	</div>
	
	<div class="overwatch-mec mec-income">

		<div class="col-xs-12 table-end-general table-end table-bank">
			<div class="col-xs-12">
				<input type="text" name="name" id="code" placeholder="Enter Barcodes Manually" />
				<input type="submit" id="add-item" value="ADD" class="call-links"></input>
			</div>
			<div class="col-xs-12 total-label total-label-bank">TOTAL -- Php <span class="total-amount"></span></div>
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
							   	type: 'POST',
							   	url: 'sales-more-data',
							   	type: "POST",
								data: {type: barcode},
								dataType: "html",
							   	success: function( data ) {
						            ItemArray.push({
										ItemCode : '201602000000001', 
										ItemName : barcode,
										ItemQuantity : '1'/*$('.add-delivery-form #qty').val()*/
									});

							   		$.each(ItemArray, function(key, value) { 
										totalQuantity = parseInt(ItemArray[key].ItemQuantity) + totalQuantity;
									});
									$('#ajax-content-container').prepend(data);
									barcode=""; 

									var total = 0;
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
							   	type: 'POST',
							   	url: 'sales-more-data',
							   	type: "POST",
								data: {type: code},
								dataType: "html",
							   	success: function( data ) {
							   		if(data!=null||data!=''){
										$('#ajax-content-container').prepend(data);
										barcode=""; 

										var total = 0;
										$(".table-entries").each(function() {
										  	total += parseFloat($(this).find(".price-field").text());
										  	ItemArray.push({
												ItemCode : '201602000000001', 
												ItemName : code,
												ItemQuantity : '1'/*$('.add-delivery-form #qty').val()*/
											});

											$.each(ItemArray, function(key, value) { 
												totalQuantity = parseInt(ItemArray[key].ItemQuantity) + totalQuantity;
											});
										});
										$('.total-amount').html(total);
							   		}
							   		else{
							   			alert("hello");
							   		}
							   	},
							   	error: function(xhr, status, error) {
							      // check status && error
							      alert("that item doesn't exist.");
							   	}
							});
							      	
							return false;
					});

					$("#submit").click(function (){
						$.post('add-sales-transaction',{data:ItemArray,qty:totalQuantity},function(html){
							alert('Sales Transaction Recorded!');
							window.location.href = "<?php echo site_url('cashier'); ?>";
						});
						
						return false;
					});

			});

		</script>
		<a id="submit" href="#" class="call-links">COMPLETE SALE</a>
	</div>

</div>