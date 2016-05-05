<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<div class="container">

		<!--The overwatch Main element Container or MEC-->
		<div class="overwatch-mec mec-income">
			
			<div class="col-xs-12">
				<?php
				foreach($item->result_array() as $row){ 
					$item_code = $row['item_id'];
					$item_supplier = $row['supplier_name'];
					$item_name = $row['item_name'];
					$item_price = number_format($row['item_price'],2,'.',',');
					$item_stock = $row['item_stock'];
				?>
					<div class="row table-entries table-entries-income">
						<div class="col-xs-2"><?php echo $item_code;?></div>
						<div class="col-xs-2"><?php echo $item_supplier;?></div>
						<div class="col-xs-4"><?php echo $item_name;?></div>
						<div class="col-xs-2"><?php echo $item_price;?></div>
						<div class="col-xs-2"><?php echo $item_stock;?></div>	
					</div>

				<?php } ?>
			</div>

			<!-- <div class="table-title table-end table-end-general table-end-income">
					<div class="col-xs-6 col-sm-9 total-label">TOTAL EARNINGS</div>
					<div class="col-xs-3 total-amount"><?php echo $total_earnings; ?></div>
			</div> -->

		</div><!-- MEC end -->

	</div>