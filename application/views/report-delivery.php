<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- insert ponpon about content -->
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
								<div class="col-xs-2">Delivery Code</div>
								<div class="col-xs-2">Supplier Name</div>
								<div class="col-xs-4">Quantity</div>
								<div class="col-xs-2">Status</div>
								<div class="col-xs-2">Date Approved</div>	
							</div>
							<?php
								/*$total_earnings = 0;
								foreach($income->result_array() as $row){ 
								$income_name = $row['income_name'];
								$income_amount = $row['income_amount'];
								$income_date_acquired = $row['income_date_acquired'];
								$total_earnings = $total_earnings + $income_amount;*/

								foreach($delivery_transaction->result_array() as $row){ 
									$dt_code = $row['dt_id'];
									$dt_supplier = $row['dt_supplier'];
									$dt_quantity = $row['dt_total_quantity'];
									$dt_status = $row['dt_status'];
									$dt_date_approved = $row['dt_approve_date'];
							?>
								<a href='<?php echo base_url() ?>Delivery/view_dt_details/<?php echo $dt_code ?>'>	
								<div class="row table-entries table-entries-income">
									<div class="col-xs-2"><?php echo $dt_code;?></div>
									<div class="col-xs-2"><?php echo $dt_supplier;?></div>
									<div class="col-xs-4"><?php echo $dt_quantity;?></div>
									<div class="col-xs-2"><?php echo $dt_status;?></div>
									<div class="col-xs-2"><?php echo $dt_date_approved;?></div>	
								</div>
								</a>

							<?php } ?>
							
						</div>

						<div class="table-title table-end table-end-general table-end-income">
								<div class="col-xs-6 col-sm-9 total-label">TOTAL EARNINGS</div>
								<div class="col-xs-3 total-amount"><?php echo $total_earnings; ?></div>
						</div>
					</div><!-- MEC end -->

				</div>