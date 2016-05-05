<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- insert ponpon about content -->
			

				<div class="container">

					<!--The overwatch Main element Container or MEC-->
					<div class="overwatch-mec mec-income">
					
						<div class="modal-body modal-project">
					      <i class="fa fa-user"></i>CREATE USER ACCOUNT


					      <?php echo form_open('admin/create-user') ?>				      	
					      	<label>User Type</label>
					      	<select name="new_account_type">
								<option value="2">Tenant</option>
								<option value="3">Cashier</option>								
							</select>

				        	<input type="field" placeholder="Enter Username" name="new_user" />
				        	<input type="field" placeholder="Enter Password" name="new_password"/>
				        	<input type="email" placeholder="Enter Email" name="new_email"/>
				        	
				        	<input type="submit" class="submit-button" value="Submit" />
					      <?php echo form_close();?>
					    </div>
					</div><!-- MEC end -->

				</div>