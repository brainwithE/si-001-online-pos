<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- insert ponpon about content -->
			

				<div class="container">

					<!--The overwatch Main element Container or MEC-->
					<div class="overwatch-mec mec-income">
						<div class="col-xs-12">
							<!-- FILTER FUNCTION -->

							<div class="row">
								<?php
									echo form_open('filter-income');							
								?>
								<input type="text" id="datepickerstart" class="datepicker" placeholder="Start Date" name="filter_start_date">
								<input type="text" id="datepickerend" class="datepicker" placeholder="End Date" name="filter_end_date">
								<?php
									echo form_submit(array('name'=>'submit','value'=>'FILTER','class'=>'call-links'));
									echo form_close();
								?>
							</div>

							<div class="row table-title table-title-general table-title-income">
								<div class="col-xs-2">Quantity</div>
								<div class="col-xs-2">Item Name</div>
								<div class="col-xs-4">Amount</div>
								<div class="col-xs-2">Deduction</div>
								<div class="col-xs-2">Net Sales</div>	
							</div>
							<?php
								/*$total_earnings = 0;
								foreach($income->result_array() as $row){ 
								$income_name = $row['income_name'];
								$income_amount = $row['income_amount'];
								$income_date_acquired = $row['income_date_acquired'];
								$total_earnings = $total_earnings + $income_amount;*/

								$total_earnings = 0;
								foreach($sales->result_array() as $row){ 
									$sales_quantity = $row['sales_quantity'];
									$sales_item_name = $row['sales_item'];
									$sales_amount = $row['sales_total'];
									$sales_deduction = $sales_amount*0.12;
									$sales_net = $sales_amount-$sales_deduction;
									$total_earnings = $total_earnings + $sales_net;
							?>
								
								<div class="row table-entries table-entries-income">
									<!-- <div class="col-xs-3"><?php $new_income_date_acquired //= //date("M j, Y", strtotime($income_date_acquired));  echo $new_income_date_acquired; ?></div>
									<div class="col-xs-5 col-sm-6"><?php //echo $income_name; ?></div>
									<div class="col-xs-3"><?php //echo $income_amount; ?></div> -->

									<div class="col-xs-2"><?php echo $sales_quantity;?></div>
									<div class="col-xs-2"><?php echo $sales_item_name;?></div>
									<div class="col-xs-4"><?php echo number_format($sales_amount,2,'.',','); ?></div>
									<div class="col-xs-2"><?php echo "- ". number_format($sales_deduction,2,'.',',');?></div>
									<div class="col-xs-2"><?php echo number_format($sales_net, 2, '.',','); ?></div>	
								</div>

							<?php } ?>
							
						</div>

						<div class="table-title table-end table-end-general table-end-income">
								<div class="col-xs-6 col-sm-9 total-label">TOTAL EARNINGS</div>
								<div class="col-xs-3 total-amount"><?php echo number_format($total_earnings, 2, '.',','); ?></div>
						</div>
					</div><!-- MEC end -->

				</div>