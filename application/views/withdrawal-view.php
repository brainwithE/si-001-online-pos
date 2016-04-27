<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			
				<div class="container">

					<!--The overwatch Main element Container or MEC-->
					<div class="overwatch-mec mec-withdrawal">
						

						<div class="col-xs-12">
							<div class="row">
								<?php
									echo form_open('filter-withdrawal');							
								?>
								<input type="text" id="datepickerstart" class="datepicker" placeholder="Start Date" name="filter_start_date">
								<input type="text" id="datepickerend" class="datepicker" placeholder="End Date" name="filter_end_date">
								<?php
									echo form_submit(array('name'=>'submit','value'=>'FILTER','class'=>'call-links'));
									echo form_close();
								?>
							</div>
							<div class="row table-title table-title-general table-title-withdrawal">
								<div class="col-xs-3">Date</div>
								<div class="col-xs-5 col-sm-6">Name</div>
								<div class="col-xs-3">Amount</div>
							</div>
							<?php
								$total_withdrawal = 0;
								foreach($withdrawal->result_array() as $row){ 
								$withdrawal_name = $row['withdrawal_name'];
								$withdrawal_amount = $row['withdrawal_amount'];
								$withdrawal_date_acquired = $row['withdrawal_date_acquired'];
								$total_withdrawal = $total_withdrawal + $withdrawal_amount;
							?>
								
								<div class="row table-entries table-entries-withdrawal">
									<div class="col-xs-3"><?php $new_withdrawal_date_acquired = date("M j, Y", strtotime($withdrawal_date_acquired));  echo $new_withdrawal_date_acquired; ?></div>
									<div class="col-xs-5 col-sm-6"><?php echo $withdrawal_name; ?></div>
									<div class="col-xs-3"><?php echo $withdrawal_amount; ?></div>
								</div>

							<?php } ?>
							
						</div>

						<div class="table-title table-end table-end-general table-end-withdrawal">
								<div class="col-xs-6 col-sm-9 total-label">TOTAL WITHDRAWAL</div>
								<div class="col-xs-3 total-amount"><?php echo $total_withdrawal; ?></div>
						</div>
					</div><!-- MEC end -->

				</div>