<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- insert ponpon about content -->
			

				<div class="container">

					<!--The overwatch Main element Container or MEC-->
					<div class="overwatch-mec mec-income">
						<div class="head-contain">
							<h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i></i>
							LIST OF ACCOUNTS</h4>
						</div>
						<div class="col-xs-12">						

							<div class="row table-title table-title-general table-title-income">
								<div class="col-xs-2">User ID</div>
								<div class="col-xs-1">Name</div>
								<div class="col-xs-2">Email</div>
								<div class="col-xs-2">Last Login</div>
								<div class="col-xs-2">Last Activity</div>	
								<div class="col-xs-2">Last Login Attempt</div>	
								<div class="col-xs-1"></div>	
							</div>
							<?php								

								foreach($users as $row){ 
									$user_id = $row->id;									
									$user_name = $row->name;
									$user_email = $row->email;									
									$is_banned = $row->banned;			
									$user_last_login = $row->last_login;
									$user_last_activity = $row->last_activity;
									$user_last_login_attempt = $row->last_login_attempt;							


							?>
								
								<div class="row table-entries table-entries-income">

									<div class="col-xs-2"><?php echo $user_id;?></div>
									<div class="col-xs-1"><?php echo $user_name;?></div>
									<div class="col-xs-2"><?php echo $user_email;?></div>
									<div class="col-xs-2"><?php echo $user_last_login;?></div>
									<div class="col-xs-2"><?php echo $user_last_activity;?></div>
									<div class="col-xs-2"><?php echo $user_last_login_attempt;?></div>
									<div class="col-xs-1">
										<a href="#" class="btn" data-toggle="modal" <?php echo "data-target=#User".$user_id?>>Edit</a>
										<!-- <a href="<?php  base_url() ?>authenticate/ban_user/<?php  $user_id?>"?> -->
										<?php
											if($is_banned==0){
												echo "<a href='base_url()/authenticate/ban_user/$user_id'>x</a>";
												
											} else {
												echo "<a href='".base_url()."/authenticate/unban_user/$user_id'>/</a>";
											}

										?>
										
									</div>
									
								</div>

								<div class="modal fade" <?php echo "id='User".$user_id."'"?> role="dialog">
					                <div class="modal-dialog">
					                    <!-- Modal content-->
					                    <div class="modal-content item-modal">					                    
						                    <div class="edit-user">
						                    	<div class="head-contain">
													<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit User Details</h4>
												</div>
						                    	<div class="modal-body modal-project">
						                        	<?php echo form_open('authenticate/edit-user') ?>
						                       	  		<input type="hidden" name="user_id" value="<?php echo $user_id?>">
						                       	  		<label>User Name: </label>
							                        	<input type="field" name="user_name" value="<?php echo $user_name?>">
							                        	<label>User Email: </label>
							                        	<input type="field" name="user_email" value="<?php echo $user_email?>">

							                        	<input type="submit" class="btn submit-button" value="Submit" />

							                      <?php echo form_close();?>
						                       	  
						                        </div>
					                        </div>
					                    </div>
					                    
					                </div>
					        </div>

							<?php } ?>
							
						</div>

						<div class="table-title table-end table-end-general table-end-income">
								
						</div>
					</div><!-- MEC end -->

				</div>