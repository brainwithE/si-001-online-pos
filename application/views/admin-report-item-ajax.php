<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<div class="row table-title table-title-general table-title-income padding-alter">
		<!--
		OLD REPORT VIEW
		 <div class="col-xs-1"></div>
		<div class="col-xs-2">Item Code</div>								
		<div class="col-xs-1">Stock</div>								
		<div class="col-xs-3">Item Name</div>
		<div class="col-xs-1">Price</div>	
		<div class="col-xs-2">Item Supplier</div>
		<div class="col-xs-2">Remarks</div> -->

		<div class="col-xs-1"></div>
		<div class="col-xs-1">Brand Code</div>
		<div class="col-xs-2">Item Code</div>								
		<div class="col-xs-2">Item Name</div>
		<div class="col-xs-1">Price</div>
		<div class="col-xs-1">Item Supplier</div>

		<div class="col-xs-1 tright">Delivered</div>
		<div class="col-xs-1 tright">Pulled Out</div>
		<div class="col-xs-1 tright">Sold</div>
		<div class="col-xs-1 tright">Current</div>
		
		
		
	</div>
	<?php
		
		for($x=0 ; $x < sizeof($item) ; $x++) {
			$supplier_code = $item[$x]['letter_code'];
			$item_code = $item[$x]['item_id'];
			$item_supplier = $item[$x]['item_supplier'];
			$item_name = $item[$x]['item_name'];									
			$item_price = number_format($item[$x]['item_price'],2,'.',',');
			$item_stock = $item[$x]['item_stock'];
			$item_category = $item[$x]['item_category'];

			$pullout_count = $item[$x]['pullout_count'];
			$delivery_count = $item[$x]['delivery_count'];
			$sales_count = $item[$x]['sales_count'];
			
	?>
		<div class="row table-entries table-entries-income table-entries-income-int padding-alter" onClick="itemBarcode('<?php echo $item_code; ?>');" data-toggle="modal" <?php echo "data-target=#Item".$item_code?> >
			<div class="col-xs-1"><a href="<?php echo base_url(); ?>admin/remove-item/<?php echo $item_code; ?>" class="btn-red"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>
			<div class="col-xs-1"><?php echo $supplier_code;?></div>
			<div class="col-xs-2"><?php echo $item_code;?></div>
			<div class="col-xs-2"><?php echo $item_name?></div>
			<div class="col-xs-1">P<?php echo $item_price?></div>									
			<div class="col-xs-1 wrap-word"><?php echo $item_supplier;?></div>

			<div class="col-xs-1 tright"><?php echo $delivery_count." ";?></div>
			<div class="col-xs-1 tright"><?php echo $pullout_count." ";?></div>
			<div class="col-xs-1 tright"><?php echo $sales_count." ";?></div>
			<div class="col-xs-1 tright"><?php echo $item_stock." ";?></div>
			 
			
			
		</div>

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