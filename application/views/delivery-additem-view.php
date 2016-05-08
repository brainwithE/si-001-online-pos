<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">

	<!--The overwatch Main element Container or MEC-->
	
	<div class="overwatch-mec mec-income">
		
		<div class="col-xs-12 table-end-general table-end table-bank">
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

			<!-- <div id="add-delivery-form" class="row add-delivery-form">
				<div class="col-xs-2">
					<div id="add" style="padding: 1px solid white; cursor:pointer; background-color: green; width: 100px; text-align: center;">ADD ITEM</div>
				</div>
				<div class="col-xs-2"><input type="text" name="name" id="name" /></div>
				<div class="col-xs-4"><input type="text" name="qty" id="qty" /></div>
				<div class="col-xs-2"><input type="text" name="name2" id="name2" placeholder="Search Name" /></div>
				<div class="col-xs-2"><input type="text" name="code" id="code" placeholder="Search Code" /></div>
			</div> -->

			<a id="submit" href="#">REQUEST DELIVERY!</a>	
		
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
						   	type: 'POST',
						   	url: 'deliver-more-data',
						   	type: "POST",
							data: {type: barcode},
							dataType: "html",
						   	success: function( data ) {
						   		alert(barcode);
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
						      	
						return false;			        }
			        else if(code==9)// Tab key hit
			        {
			            /*alert(barcode);
			            ItemArray.push({
							ItemCode : '201602000000001', 
							ItemName : $('.add-delivery-form #name').val(),
							ItemQuantity : $('.add-delivery-form #qty').val()
						});
							 
						$('.records-section').html('');

						var eachctr = 0;
						totalQuantity = 0;

						$.ajax({
						  	type: 'GET',
						   	url: 'suggest-more-data-code',
							data: "type="+$('.add-delivery-form #name').val(),
							dataType: "html",
						   	success: function( data ) {

								$('#ajax-content-container').append(data);

								alert(data.Result);
						   	},
						   	error: function(xhr, status, error) {
						      	// check status && error
						      	alert(error);
						   	}
						});

						$('.add-delivery-form #name').val('');
						$('.add-delivery-form #qty').val('');
						barcode="";       	
						return false;*/
			        }
			        else
			        {
			            barcode=barcode+String.fromCharCode(code);
			        }
			    });

				$('#remove').click(function(){

					ItemArray.splice(0,1);
					removeItem();

					return false;
				});

				$("#add").click(function() {

					ItemArray.push({
						ItemCode : '201602000000001', 
						ItemName : $('.add-delivery-form #name').val(),
						ItemQuantity : $('.add-delivery-form #qty').val()
					});
						 
					$('.records-section').html('');

					var eachctr = 0;
					totalQuantity = 0;

					$.ajax({
					   type: 'POST',
					   url: 'verify-item',
					   data: $('.add-delivery-form #name').val(),
					   success: function( data ) {
					   		$.each(ItemArray, function(key, value) { 
								$('.records-section').append('<div class="row table-entries table-entries-income">			<div class="col-xs-2"><div class="remove" onclick="ItemArray.splice('+eachctr+',1); removeItem();">x</div></div><div class="col-xs-2 name">'+ItemArray[key].ItemName+'</div><div class="col-xs-4 qty">'+ItemArray[key].ItemQuantity+'</div></div>');
								eachctr++;
								totalQuantity = parseInt(ItemArray[key].ItemQuantity) + totalQuantity;
							});
					   },
					   error: function(xhr, status, error) {
					      // check status && error
					      alert(error);
					   }
					});

					$('.add-delivery-form #name').val('');
					$('.add-delivery-form #qty').val('');
						          	
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


				$('#name2').on('input', function() {
					var username = $('#name2').val();
					/*$('#code').val('');*/ //for singular search functions
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
					/*$('#name').val('');*/ //for singular search functions
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
				});
			

		</script>

	</div>

</div>