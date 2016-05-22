<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script>
	function printPage(){
		window.print();
	}

	function removeItem(item,delivery,qty,dt,dtotal){
		$('#delrow'+delivery).remove();

		$.ajax({
			url: '<?php echo base_url(); ?>remove-delivery-item',
				type: "POST",
				data: {item: item, del: delivery, qty: qty, transaction: dt, total: dtotal},
				dataType: "html",
				success: function( data ) {
					var total = 0;
					$(".del-rows").each(function() {
						total += parseFloat($(this).find(".del-qty").text());
					});
					$('.del-total').html(total + " total items to be delivered");
				},
				error: function(xhr, status, error) {
					alert(error);
				}
		});
									      	
		return false;
	}	

	function editItem(delivery,qty){
		alert(delivery+","+qty);

		/*$.ajax({
			url: '<?php echo base_url(); ?>remove-delivery-item',
				type: "POST",
				data: {item: item, del: delivery, qty: qty, transaction: dt, total: dtotal},
				dataType: "html",
				success: function( data ) {
					var total = 0;
					$(".del-rows").each(function() {
						total += parseFloat($(this).find(".del-qty").text());
					});
					$('.del-total').html(total + " total items to be delivered");
				},
				error: function(xhr, status, error) {
					alert(error);
				}
		});*/
									      	
		return false;
	}	
</script>

				<?php 
					$ctr = 1;
					foreach($delivery_transaction_indiv->result_array() as $row){ 
						$dt_date = $row['dt_date'];
						$dt_supplier = $row['dt_supplier'];
						$dt_approved = $row['dt_approve_date'];
						$dt_total = $row['dt_total_quantity'];
					$ctr++;
				} ?>
			
				<div class="container">

					<!--The overwatch Main element Container or MEC-->
					<div class="overwatch-mec mec-income" style="min-height: 400px;">
					<div class="col-xs-12 total-label total-label-bank">Delivery Transaction ID: -- <?php echo $dt_id; ?></div>
					<div class="col-xs-7 total-label total-label-bank">Date Requested: <?php echo date("M j, Y", strtotime($dt_date)); ?> </div>
					<div class="col-xs-5 total-label total-label-bank">Brand Name: <?php echo $dt_supplier; ?></div>
					<div class="col-xs-7 total-label total-label-bank">Date Approved: <?php if($dt_approved=='0000-00-00'){echo "not yet approved";}else{echo date("M j, Y", strtotime($dt_approved));} ?> </div>
					<div class="col-xs-5 total-label total-label-bank"><div id="print" onClick="printPage();" class="call-links">PRINT DELIVERY RECORDS</div></div>

						<div class="col-xs-12">
							<!-- <div class="row">
								<?php
									echo form_open('add-delivery-items');							
								?>
								<input type="field" placeholder="Item Code" name="item_code"/>
								<input type="field" placeholder="Item Quantity" name="item_quantity"/>
	                        	<input type="submit" class="submit-button" value="Add Item" />
								<?php									
									echo form_close();
								?>
							</div> -->

							<div class="row table-title table-title-general table-title-income">
								<div class="col-xs-1"></div>
								<div class="col-xs-1">Qty</div>
								<div class="col-xs-2">Item Code</div>
								<div class="col-xs-3">Item Name</div>
								<div class="col-xs-2">Price</div>
								<div class="col-xs-3">Remarks</div>
							</div>
							
							<?php 
								$ctr = 1;
								$delivery_total = 0;
								foreach($delivery_transaction->result_array() as $row){ 
									$delivery_id = $row['delivery_id'];
									$item_code = $row['item_id'];
									$item_name = $row['item_name'];
									$item_price = $row['item_price'];
									$delivery_quantity = $row['delivery_quantity'];
									$delivery_dt = $row['delivery_dt'];

									$delivery_total = $delivery_total + $delivery_quantity;
							?>

								<div id="delrow<?php echo $delivery_id; ?>" class="row del-rows table-entries table-entries-income">
									<div class="col-xs-1"><a onClick="removeItem(<?php echo $item_code; ?>,<?php echo $delivery_id; ?>,<?php echo $delivery_quantity; ?>,<?php echo $dt_id; ?>,<?php echo $dt_total; ?>);" class="btn-red btn-red-del"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>
									<div class="col-xs-1 del-qty" onClick="editItem(<?php echo $delivery_id; ?>,<?php echo $delivery_quantity; ?>);"><?php echo $delivery_quantity; ?></div>
									<div class="col-xs-2 item-code"><?php echo $item_code; ?></div>
									<div class="col-xs-3"><?php echo $item_name; ?></div>
									<div class="col-xs-2"><?php echo $item_price; ?></div>
									<div class="col-xs-3"></div>
								</div>

							<?php
								$ctr++;
							} ?>

							<div class="row table-entries table-entries-income">
									<div class="col-xs-6 del-total"><?php echo $delivery_total; ?> total items to be delivered</div>
							</div>
						</div>

						<div class="table-title table-end table-end-general table-end-income">
								<div class="col-xs-12 total-label"><span style="float: left; padding-bottom: 50px; border-bottom: 1px solid black;">Delivered by:</span>
								<span style="float:right; margin-right: 300px; padding-bottom: 50px; border-bottom: 1px solid black;">Recieved by:</span></div>
						</div>

						<!-- <div class="table-title table-end table-end-general table-end-income">
								<div class="col-xs-6 col-sm-9 total-label">TOTAL EARNINGS</div>
								<div class="col-xs-3 total-amount"><?php echo $total_earnings; ?></div>
						</div> -->
					</div><!-- MEC end -->
				</div>