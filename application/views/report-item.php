<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<div class="container">

		<!--The overwatch Main element Container or MEC-->
		<div class="overwatch-mec mec-income">

				<div class="container">

					<!--The overwatch Main element Container or MEC-->
					<div class="overwatch-mec mec-income">
						<div class="col-xs-12">
							<!-- FILTER FUNCTION

							<div class="row">
								<?php
									//echo form_open('filter-income');							
								?>
								<input type="text" id="datepickerstart" class="datepicker" placeholder="Start Date" name="filter_start_date">
								<input type="text" id="datepickerend" class="datepicker" placeholder="End Date" name="filter_end_date">
								<?php
									//echo form_submit(array('name'=>'submit','value'=>'FILTER','class'=>'call-links'));
									//echo form_close();
								?>
							</div> -->

							<div class="row table-title table-title-general table-title-income">
								<div class="col-xs-2">Item Code</div>
								<div class="col-xs-2">Item Supplier</div>
								<div class="col-xs-4">Item Name</div>
								<div class="col-xs-2">Price</div>
								<div class="col-xs-2">Stock on Hand</div>	
							</div>
							<?php
								/*$total_earnings = 0;
								foreach($income->result_array() as $row){ 
								$income_name = $row['income_name'];
								$income_amount = $row['income_amount'];
								$income_date_acquired = $row['income_date_acquired'];
								$total_earnings = $total_earnings + $income_amount;*/

								foreach($item->result_array() as $row){ 
									$item_code = $row['item_id'];
									$item_supplier = $row['supplier_name'];
									$item_name = $row['item_name'];
									$item_price = number_format($row['item_price'],2,'.',',');
									$item_stock = $row['item_stock'];

							?>
								
								<div class="row table-entries table-entries-income">
									<!-- <div class="col-xs-3"><?php $new_income_date_acquired //= //date("M j, Y", strtotime($income_date_acquired));  echo $new_income_date_acquired; ?></div>
									<div class="col-xs-5 col-sm-6"><?php //echo $income_name; ?></div>
									<div class="col-xs-3"><?php //echo $income_amount; ?></div> -->

									<div class="col-xs-2"><?php echo $item_code;?></div>
									<div class="col-xs-2"><?php echo $item_supplier;?></div>
									<div class="col-xs-4"><?php echo $item_name;?></div>
									<div class="col-xs-2"><?php echo $item_price;?></div>
									<div class="col-xs-2"><?php echo $item_stock;?></div>	
								</div>

							<?php } ?>
							
						</div>

						<div class="table-title table-end table-end-general table-end-income">
								
						</div>
					</div><!-- MEC end -->

				</div>