<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- insert ponpon about content -->
			

				<div class="container">

					<!--The overwatch Main element Container or MEC-->					
					
					<div class="overwatch-mec mec-income">
						<div class="head-contain">
							<h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i></i>PENDING PULLOUT REQUEST</h4>
						</div>
						<div class="col-xs-12">							
							<div class="row table-title table-title-general table-title-income">
								<div class="col-xs-2">Pullout Code</div>
								<div class="col-xs-3">Item Name</div>
								<div class="col-xs-1">Quantity</div>								
								<div class="col-xs-2">Pullout Action</div>
							</div>
							<?php

								foreach($pullout->result_array() as $row){ 
									$pullout_code = $row['pullout_id'];
									$pullout_item = $row['item_name'];
									$pullout_supplier = $row['supplier_name'];
									$pullout_quantity = $row['pullout_quantity'];
									$pullout_status = $row['pullout_status'];
									$pullout_date_approved = $row['pullout_date'];


									if($pullout_status == 0 ){
							?>
							
							
								
								<div class="row table-entries table-entries-income">
									<!-- <div class="col-xs-3"><?php $new_income_date_acquired //= //date("M j, Y", strtotime($income_date_acquired));  echo $new_income_date_acquired; ?></div>
									<div class="col-xs-5 col-sm-6"><?php //echo $income_name; ?></div>
									<div class="col-xs-3"><?php //echo $income_amount; ?></div> -->

									<div class="col-xs-2"><?php echo $pullout_code;?></div>
									<div class="col-xs-3"><?php echo $pullout_item;?></div>
									<div class="col-xs-2"><?php echo $pullout_quantity;?></div>	
									<div class="col-xs-2">

										<a href='<?php echo base_url() ?>Tenant/approved_pullout/<?php echo $pullout_code ?>'><i class="fa fa-check-square" aria-hidden="true"></i> Approve</a>
									</div>

									
								</div>

								<?php
									} 
								} 
							?> 
						</div>
					</div>
					

						<!-- pending view end -->

						
					

				</div>