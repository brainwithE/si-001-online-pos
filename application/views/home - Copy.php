<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- insert ponpon about content -->
			

				<div class="container">

					<!--The overwatch Main element Container or MEC-->
					<div class="overwatch-mec">
						<div class="col-xs-12">

							<div class="row table-title table-title-general">
								<div class="col-xs-1"></div>
								<div class="col-xs-2">Date</div>
								<div class="col-xs-5 col-sm-6">Name</div>
								<div class="col-xs-3">Amount</div>
							</div>
							<?php
								foreach($income->result_array() as $row){ 
								$income_name = $row['income_name'];
								$income_amount = $row['income_amount'];
								$income_date_acquired = $row['income_date_acquired'];
							?>
								
								<div class="row table-entries">
									<div class="col-xs-1 column-type"><div class="entry-type entry-type-income"></div></div>
									<div class="col-xs-2"><?php $new_income_date_acquired = date("M j, Y", strtotime($income_date_acquired));  echo $new_income_date_acquired; ?></div>
									<div class="col-xs-5 col-sm-6"><?php echo $income_name; ?></div>
									<div class="col-xs-3"><?php echo $income_amount; ?></div>
								</div>

							<?php } ?>
							<?php
								$cash_on_hand = 0;
								foreach($withdrawal->result_array() as $row){ 
								$withdrawal_name = $row['withdrawal_name'];
								$withdrawal_amount = $row['withdrawal_amount'];
								$withdrawal_date_acquired = $row['withdrawal_date_acquired'];
								$cash_on_hand = $cash_on_hand + $withdrawal_amount;
							?>
								
								<div class="row table-entries">
									<div class="col-xs-1 column-type"><div class="entry-type entry-type-withdrawal"></div></div>
									<div class="col-xs-2"><?php $new_withdrawal_date_acquired = date("M j, Y", strtotime($withdrawal_date_acquired));  echo $new_withdrawal_date_acquired; ?></div>
									<div class="col-xs-5 col-sm-6"><?php echo $withdrawal_name; ?></div>
									<div class="col-xs-3"><?php echo $withdrawal_amount; ?></div>
								</div>

							<?php } ?>
							<?php
								foreach($expense->result_array() as $row){ 
								$expense_name = $row['expense_name'];
								$expense_amount = $row['expense_amount'];
								$expense_date_acquired = $row['expense_date_acquired'];
								$cash_on_hand = $cash_on_hand - $expense_amount;
							?>
								
								<div class="row table-entries">
									<div class="col-xs-1 column-type"><div class="entry-type entry-type-expense"></div></div>
									<div class="col-xs-2"><?php $new_expense_date_acquired = date("M j, Y", strtotime($expense_date_acquired));  echo $new_expense_date_acquired; ?></div>
									<div class="col-xs-5 col-sm-6"><?php echo $expense_name; ?></div>
									<div class="col-xs-3"><?php echo $expense_amount; ?></div>
								</div>

							<?php } ?>
							
						</div>

						<div class="table-title table-end table-end-general">
								<div class="col-xs-1 column-type"></div>
								<div class="col-xs-5 col-sm-8 total-label">CASH ON HAND</div>
								<div class="col-xs-3 total-amount"><?php echo $cash_on_hand; ?></div>
						</div>
					</div><!-- MEC end -->

				</div>

				<div class="add-withdrawal" data-toggle="modal" data-target="#InputWithdrawal">
				    <div class="navicon"><a id="showLeftPush" class="showLeftPush" href="#"><i class="fa fa-money"></i></a></div>
				</div>

				<div class="modal fade" id="InputWithdrawal" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">

                      <div class="col-md-12">

                        <div class="modal-body modal-withdrawal">
                          <i class="fa fa-money"></i>INPUT NEW WITHDRAWAL
                          <?php echo form_open('add-withdrawal') ?>
	                        	<input type="field" placeholder="Amount" name="withdrawal_amount"/>
	                        	<input type="field" placeholder="Name" name="withdrawal_name" />
	                        	<input type="text" id="datepickerwithdrawal" class="datepicker" placeholder="Date" name="withdrawal_date_acquired">
	                        	<input type="submit" class="submit-button" value="WITHDRAW" />
	                      <?php echo form_close();?>
                        </div>

                      </div>

                    </div>

                  </div>
                </div>

                <div class="add-expenses" data-toggle="modal" data-target="#InputExpense">
				    <div class="navicon"><a id="showLeftPush" class="showLeftPush" href="#"><i class="fa fa-shopping-cart"></i></a></div>
				</div>

				<div class="modal fade" id="InputExpense" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">

                      <div class="col-md-12">

                        <div class="modal-body modal-expense">
                          <i class="fa fa-shopping-cart"></i>INPUT NEW EXPENSE
                          	<?php echo form_open('add-expense') ?>
	                        	<input type="field" placeholder="Amount" name="expense_amount"/>
	                        	<input type="field" placeholder="Name" name="expense_name" />
	                        	<input type="field" placeholder="Category" name="expense_category" />
	                        	<input type="text" id="datepickerexpense" class="datepicker" placeholder="Date" name="expense_date_acquired">
	                        	<input type="submit" class="submit-button" value="PAY" />
	                      	<?php echo form_close();?>
                        </div>

                      </div>

                    </div>

                  </div>
                </div>

				<div class="add-income" data-toggle="modal" data-target="#InputIncome">
				    <div class="navicon"><a id="showLeftPush" class="showLeftPush" href="#"><i class="fa fa-angle-double-up"></i></a></div>
				</div>

				<div class="modal fade" id="InputIncome" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">

                      <div class="col-md-12">

                        <div class="modal-body modal-income">
                          <i class="fa fa-angle-double-up"></i>INPUT NEW INCOME
                          <?php echo form_open('add-income') ?>
	                        	<input type="field" placeholder="Amount" name="income_amount"/>
	                        	<input type="field" placeholder="Name" name="income_name" />
	                        	<input type="text" id="datepickerincome" class="datepicker" placeholder="Date" name="income_date_acquired">
	                        	<input type="submit" class="submit-button" value="EARN" />
	                      <?php echo form_close();?>
                        </div>

                      </div>

                    </div>

                  </div>
                </div>