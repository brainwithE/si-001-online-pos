<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			
			<!--START QUERYING AND SORTING OF TABLE VALUES-->

							<?php
								//Instantiate variables

								$cash_on_hand = 0;
								$cash_on_bank = 0;

								$transactions = 0;

								$transaction[]['acquired_date'] = '';
								$transaction[]['name'] = '';
								$transaction[]['amount'] = '';
								$transaction[]['type'] = '';

								/* INCOME TRANSACTION */

								$transaction_id = 0;
								foreach($income->result_array() as $row){ 
								$income_id = $row['income_id'];
								$income_name = $row['income_name'];
								$income_amount = $row['income_amount'];
								$income_date_acquired = $row['income_date_acquired'];

								/* recording income transaction */

								$transaction[$transaction_id]['acquired_date'] = $income_date_acquired;
								$transaction[$transaction_id]['name'] = $income_name;
								$transaction[$transaction_id]['amount'] = $income_amount;
								$transaction[$transaction_id]['type'] = 'income';

								$cash_on_bank = $cash_on_bank + $income_amount;

								$transaction_id++;
 								$transactions++;
 								} 

 								/* WITHDRAWAL TRANSACTION */
 				
								foreach($withdrawal->result_array() as $row){ 
								$withdrawal_id = $row['withdrawal_id'];
								$withdrawal_name = $row['withdrawal_name'];
								$withdrawal_amount = $row['withdrawal_amount'];
								$withdrawal_date_acquired = $row['withdrawal_date_acquired'];
								$cash_on_hand = $cash_on_hand + $withdrawal_amount;

								$cash_on_bank = $cash_on_bank - $withdrawal_amount;

								/* recording withdrawal transaction */

								$transaction[$transaction_id]['acquired_date'] = $withdrawal_date_acquired;
								$transaction[$transaction_id]['name'] = $withdrawal_name;
								$transaction[$transaction_id]['amount'] = $withdrawal_amount;
								$transaction[$transaction_id]['type'] = 'withdrawal';

								$transaction_id++;
								$transactions++;
								} 

								/* EXPENSE TRANSACTION */

								foreach($expense->result_array() as $row){ 
								$expense_id = $row['expense_id'];
								$expense_name = $row['expense_name'];
								$expense_amount = $row['expense_amount'];
								$expense_date_acquired = $row['expense_date_acquired'];
								$cash_on_hand = $cash_on_hand - $expense_amount;

								/* recording expense transaction */

								$transaction[$transaction_id]['acquired_date'] = $expense_date_acquired;
								$transaction[$transaction_id]['name'] = $expense_name;
								$transaction[$transaction_id]['amount'] = $expense_amount;
								$transaction[$transaction_id]['type'] = 'expense';

								$transaction_id++;
								$transactions++;
							 	} 

							 	/* DATE SORTING */

								function date_compare($a, $b)
								{
								    $t1 = strtotime($a['acquired_date']);
								    $t2 = strtotime($b['acquired_date']);
								    return $t1 - $t2;
								}    
								if($transactions>1){
									usort($transaction, 'date_compare');
								}
							?>
			

				<div class="container">

					<!--The overwatch Main element Container or MEC-->

					<div class="table-bank-row">
						<div class="col-xs-9 table-end-general table-end table-bank">
								<div class="col-md-6 total-label total-label-bank">MONEY IN THE BANK --</div><div class="col-md-6 total-amount"> <?php echo $cash_on_bank; ?></div>
						</div>
						<div class="col-xs-4"></div>
					</div>

					<div class="overwatch-mec">

						<div class="col-xs-12">
							<div class="row">
								<?php
									echo form_open('filter-report');							
								?>
								<input type="text" id="datepickerstart" class="datepicker" placeholder="Start Date" name="filter_start_date">
								<input type="text" id="datepickerend" class="datepicker" placeholder="End Date" name="filter_end_date">
								<?php
									echo form_submit(array('name'=>'submit','value'=>'FILTER','class'=>'call-links'));
									echo form_close();
								?>
							</div>
							<div class="row table-title table-title-general">
								<div class="col-xs-1"></div>
								<div class="col-xs-2">Date</div>
								<div class="col-xs-5 col-sm-6">Name</div>
								<div class="col-xs-3">Amount</div>
							</div>

							<?php
								//showing transactions
								$reporting_row = 0;
								if($transactions>0){
								foreach($transaction as $row){ 
								
							?>
								
								<div class="row table-entries">
									<div class="col-xs-1 column-type"><div class="entry-type <?php if($transaction[$reporting_row]['type'] =='income'){echo'entry-type-income';} elseif($transaction[$reporting_row]['type'] =='expense'){echo'entry-type-expense';} elseif($transaction[$reporting_row]['type'] =='withdrawal'){echo'entry-type-withdrawal';} ?>"></div></div>
									<div class="col-xs-2"><?php $new_income_date_acquired = date("M j, Y", strtotime($transaction[$reporting_row]['acquired_date']));  echo $new_income_date_acquired; ?></div>
									<div class="col-xs-5 col-sm-6"><?php echo $transaction[$reporting_row]['name']; ?></div>
									<div class="col-xs-3"><?php echo $transaction[$reporting_row]['amount']; ?></div>
								</div>

							<?php $reporting_row ++; } } ?>
							
						</div>

						<div class="table-title table-end table-end-general">
								<div class="col-xs-1 column-type"></div>
								<div class="col-xs-5 col-sm-8 total-label">CASH ON HAND</div>
								<div class="col-xs-3 total-amount"><?php echo $cash_on_hand; ?></div>
						</div>
					</div><!-- MEC end -->

				</div>