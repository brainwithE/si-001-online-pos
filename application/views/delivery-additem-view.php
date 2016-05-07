<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">

	<!--The overwatch Main element Container or MEC-->
	
	<div class="overwatch-mec mec-income">
		
		<div class="col-xs-12">

			<div class="row table-title table-title-general table-title-income">
				<div class="col-xs-2"></div>
				<div class="col-xs-2">Item Code</div>
				<div class="col-xs-4">Quantity</div>	
			</div>
							
			<script type="text/javascript">
				//initialization of jquery array
				var ItemArray = [];
			</script>
			
			<div class="records-section"></div>

			<div class="row add-delivery-form">
				<div class="col-xs-2">
					<div id="add" style="padding: 1px solid white; cursor:pointer; background-color: green; width: 100px; text-align: center;">ADD ITEM</div>
					<!-- <div id="remove" style="padding: 1px solid white; cursor:pointer; background-color: red; width: 100px; text-align: center;">REMOVE</div> -->
				</div>
				<div class="col-xs-2"><input type="text" name="name" id="name" /></div>
				<div class="col-xs-4"><input type="text" name="qty" id="qty" /></div>
			</div>

			<a id="submit" href="#">REQUEST DELIVERY!</a>	
		
		</div>

		<script type="text/javascript">

			function removeItem() {

				$('.records-section').html('');

				var eachctr = 0;
				totalQuantity = 0;

				$.each(ItemArray, function(key, value) { 
					$('.records-section').append('<div class="row table-entries table-entries-income">			<div class="col-xs-2"><div class="remove" onclick="ItemArray.splice('+eachctr+',1); removeItem();">x</div></div><div class="col-xs-2 name">'+ItemArray[key].ItemName+'</div><div class="col-xs-4 qty">'+ItemArray[key].ItemQuantity+'</div></div>');
					eachctr++;
					totalQuantity = parseInt(ItemArray[key].ItemQuantity) + totalQuantity;
				});

			}

			$(document).ready(function() {

				var totalQuantity = 0;

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

					window.location.href = "<?php echo site_url('tenant'); ?>";
					return false;

				});

			});

		</script>

	</div>

</div>