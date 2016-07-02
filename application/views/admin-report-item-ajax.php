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

	<?php } ?>