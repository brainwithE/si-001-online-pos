<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script type="text/javascript">

$(document).ready(function(){	
    $('.btn-edit').click(function(){
        $('.edit-item').show();
        $('.item-details').hide();
    });

    $('.btn-back').click(function(){
        $('.edit-item').hide();
        $('.item-details').show();
    });

});

function itemBarcode(id){
	$("#bcTarget"+id).barcode(id, "code39");
}

function printPage(){
	window.print();
}
</script>

	<div class="container">

					<!--The overwatch Main element Container or MEC-->
					<div class="overwatch-mec mec-income">

					

						<div class="table-bank-row">
							<div class="col-xs-6">
								<p style="text-align: left;">These are all your inventory. Today is: <?php echo $today = date('F j, Y');?></p>
								<div id="print" onClick="printPage();" class="call-links">PRINT INVENTORY RECORDS</div>
							</div>

							<div class="col-xs-6 table-filter">
								<?php echo form_open('admin/filter-sales-month'); ?>
								<label>Filter Delivery Transaction:</label>
								<input id="inventory-filter-box" type="text" class="datepicker" placeholder="Enter item here.." name="filter_start_date">
								<?php
									echo form_close();
								?>
							</div>
						</div>
					
						<div class="head-contain">
							<h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i></i>
							INVENTORY REPORT</h4>
						</div>
						<div class="col-xs-12" id="ajax-content-container">
							
							
						</div>

						<?php

							for($x=0 ; $x < sizeof($item) ; $x++) {
									$item_code = $item[$x]['item_id'];
									$item_supplier = $item[$x]['item_supplier'];
									$item_name = $item[$x]['item_name'];									
									$item_price = number_format($item[$x]['item_price'],2,'.',',');
									$item_stock = $item[$x]['item_stock'];
									$item_category = $item[$x]['item_category'];
						?>
							<div class="modal fade" <?php echo "id='Item".$item_code."'"?> role="dialog">
					                <div class="modal-dialog">
					                    <!-- Modal content-->
					                    <div class="modal-content item-modal">					                    
					                      	<div class="item-details">
					                      		<div class="head-contain">
													<h4><i class="fa fa-shopping-cart" aria-hidden="true"></i>Item Details</h4>
												</div>
					                      		<div class="modal-body modal-project">
						                          <p><span>Item Name:</span><?php echo $item_name;?></p>
						                          <p><span>Item Code:</span><?php echo $item_code;?></p>
						                          <p><span>Category:</span> <?php echo $item_category;?></p>
						                          <p><span>Supplier:</span> <?php echo $item_supplier;?></p>
						                          <p><span>Price:</span> P<?php echo $item_price;?></p>
						                          <p><span>Stocks available:</span> <?php echo $item_stock;?></p>

						                          <div class="row barcode-row" style="margin-top: 30px;">
						                          	<div class="col-xs-6" id="bcTarget<?php echo $item_code; ?>"></div>
						                          	<div class="col-xs-6"><a href="print-barcode/<?php echo $item_code; ?>">PRINT BARCODE</a></div>
						                          </div>

						                          <!-- <div class="btn btn-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit Item</div> -->
						                        </div>
						                    </div>

						                    <div class="edit-item" style="display: none;">
						                    	<div class="head-contain">
													<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit Item</h4>
												</div>
						                    	<div class="modal-body modal-project">
						                        	
						                       	  <?php echo form_open('admin/edit-item') ?>
						                       	  		<input type="hidden" name="item_code" value="<?php echo $item_code?>">
						                       	  		<label>Item Name: </label>
							                        	<input type="field" name="item_name" value="<?php echo $item_name?>">
							                        	<label>Item Price: </label>
							                        	<input type="field" name="item_price" value="<?php echo $item_price?>">
							                        	<label>Item Category: </label>
							                        	<input type="field" name="item_category" value="<?php echo $item_category?>">

							                        	<a class="btn btn-back">Back</a>
							                        	<input type="submit" class="btn submit-button" value="Submit" />

							                      <?php echo form_close();?>
						                        </div>
					                        </div>
					                    </div>
					                    
					                </div>
					        </div>
						<?php } ?>

					</div>
	</div>

	<script type="text/javascript">
	$(document).ready(function () {
		ajax_suggest();
		ajax_suggest_code();
	});

	function ajax_suggest(){
		$('#inventory-filter-box').on('input', function() {
			var username = $('#inventory-filter-box').val();
			$.ajax({
				url: "filter-inventory-item",
				async: false,
				type: "POST",
				data: "type="+username,
				dataType: "html",
				success: function(data) {
					$('#ajax-content-container').html(data);
				}
			})
		});
	}  
	</script>