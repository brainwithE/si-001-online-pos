	<div class="row table-title table-title-general table-title-income">
		<div class="col-xs-2 alter-xs-2">Pullout Code</div>
		<div class="col-xs-2 alter-xs-2">Supplier</div>
		<div class="col-xs-1 alter-xs-1">Qty</div>								
		<div class="col-xs-4 alter-xs-4">Item Name</div>
		<div class="col-xs-2 alter-xs-2">Request Pullout Date</div>
		<div class="col-xs-2 alter-xs-2">Rejected Pullout Date</div>
		<div class="col-xs-1">Remarks</div>
	</div>
	<?php

		foreach($pullout->result_array() as $row){ 
			$pullout_code = $row['pullout_id'];
			$item_code = $row['item_id'];
			$pullout_item = $row['item_name'];
			$pullout_supplier = $row['name'];
			$pullout_quantity = $row['pullout_quantity'];
			$pullout_status = $row['pullout_status'];
			$pullout_date = $row['pullout_date'];
			$pullout_approved_date = $row['pullout_approved_date'];
			$letter_code = $row['letter_code'];

			if($pullout_status == 2 ){
	?>


		
		<div class="row table-entries table-entries-income">
			<div class="col-xs-2 alter-xs-2"><?php echo $pullout_code;?></div>									
			<div class="col-xs-2 wrap-word alter-xs-2"><?php echo $pullout_supplier;?></div>
			<div class="col-xs-1 alter-xs-1"><?php echo $pullout_quantity;?></div>
			<div class="col-xs-4 alter-xs-4"><?php echo $letter_code."-".$item_code." "; echo $pullout_item;?></div>
			<div class="col-xs-2 alter-xs-2"><?php echo date("M j, Y <\b\\r> g:i A", strtotime($pullout_date)); ?></div>
			<div class="col-xs-2 alter-xs-2"><?php echo date("M j, Y <\b\\r> g:i A", strtotime($pullout_approved_date)); ?></div>
			<div class="col-xs-1"><input class="col-xs-12 remarks" id="" value="" /></div>	
			<a href='<?php echo base_url() ?>admin/archive_rejected_pullout/<?php echo $pullout_code; ?>'><i class="fa fa-archive" alt="archive" aria-hidden="true"></i></a>						
			
		</div>

		<?php
			} 
		} 
	?> 