<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- insert ponpon about content -->
			

				<div class="container">

					<!--The overwatch Main element Container or MEC-->
					<div class="overwatch-mec mec-expense">
						<div class="col-xs-12">
							<div class="row">
								<?php
									echo form_open('filter-expense');							
								?>
								<input type="text" id="datepickerstart" class="datepicker" placeholder="Start Date" name="filter_start_date">
								<input type="text" id="datepickerend" class="datepicker" placeholder="End Date" name="filter_end_date">
								<?php
									echo form_submit(array('name'=>'submit','value'=>'FILTER','class'=>'call-links'));
									echo form_close();
								?>
							</div>
							<div class="row table-title table-title-general table-title-expense">
								<div class="col-xs-3">Date</div>
								<div class="col-xs-5 col-sm-6">Name</div>
								<div class="col-xs-3">Amount</div>
							</div>
							<?php
								$total_expense = 0;
								foreach($expense->result_array() as $row){ 
								$expense_name = $row['expense_name'];
								$expense_amount = $row['expense_amount'];
								$expense_date_acquired = $row['expense_date_acquired'];
								$total_expense = $total_expense + $expense_amount;
							?>
								
								<div class="row table-entries table-entries-expense">
									<div class="col-xs-3"><?php $new_expense_date_acquired = date("M j, Y", strtotime($expense_date_acquired));  echo $new_expense_date_acquired; ?></div>
									<div class="col-xs-5 col-sm-6"><?php echo $expense_name; ?></div>
									<div class="col-xs-3"><?php echo $expense_amount; ?></div>
								</div>

							<?php } ?>
							
						</div>

						<div class="table-title table-end table-end-general table-end-expense">
								<div class="col-xs-6 col-sm-9 total-label">TOTAL EXPENSES</div>
								<div class="col-xs-3 total-amount"><?php echo $total_expense; ?></div>
						</div>
					</div><!-- MEC end -->

				</div>