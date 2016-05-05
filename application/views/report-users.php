<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- insert ponpon about content -->
			

				<div class="container">

					<!--The overwatch Main element Container or MEC-->
					<div class="overwatch-mec mec-income">
						<div class="col-xs-12">						

							<div class="row table-title table-title-general table-title-income">
								<div class="col-xs-2">User ID</div>
								<div class="col-xs-2">Name</div>
								<div class="col-xs-2">Email</div>
								<div class="col-xs-2">Last Login</div>
								<div class="col-xs-2">Last Activity</div>	
								<div class="col-xs-2">Last Login Attempt</div>	
							</div>
							<?php								

								foreach($users as $row){ 
									$user_id = $row->id;									
									$user_name = $row->name;
									$user_email = $row->email;
									$user_last_login = $row->last_login;
									$user_last_activity = $row->last_activity;
									$user_last_login_attempt = $row->last_login_attempt;							


							?>
								
								<div class="row table-entries table-entries-income">
									<!-- <div class="col-xs-3"><?php $new_income_date_acquired //= //date("M j, Y", strtotime($income_date_acquired));  echo $new_income_date_acquired; ?></div>
									<div class="col-xs-5 col-sm-6"><?php //echo $income_name; ?></div>
									<div class="col-xs-3"><?php //echo $income_amount; ?></div> -->

									<div class="col-xs-2"><?php echo $user_id;?></div>
									<div class="col-xs-2"><?php echo $user_name;?></div>
									<div class="col-xs-2"><?php echo $user_email;?></div>
									<div class="col-xs-2"><?php echo $user_last_login;?></div>
									<div class="col-xs-2"><?php echo $user_last_activity;?></div>
									<div class="col-xs-2"><?php echo $user_last_login_attempt;?></div>
									
								</div>

							<?php } ?>
							
						</div>

						<div class="table-title table-end table-end-general table-end-income">
								
						</div>
					</div><!-- MEC end -->

				</div>