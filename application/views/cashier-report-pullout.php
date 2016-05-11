<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script>
	function printPage(){
		window.print();
	}
</script>

				<div class="container">
				<!--The overwatch Main element Container or MEC-->					
					
					<div class="overwatch-mec mec-income">

						<div class="table-bank-row">
							<div class="col-xs-6">
								<p style="text-align: left;">These are all your pullout history. Today is: <?php echo $today = date('F j, Y');?></p>
								<div id="print" onClick="printPage();" class="call-links">PRINT PULLOUT RECORDS</div>
							</div>
						</div>


						<div class="head-contain">
							<h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i></i>PENDING PULLOUT REQUEST</h4>
						</div>
						<div class="col-xs-12">							
							<div class="row table-title table-title-general table-title-income">
								<div class="col-xs-2">Pullout Code</div>
								<div class="col-xs-2">Supplier</div>
								<div class="col-xs-1">Qty</div>
								<div class="col-xs-3">Item Name</div>
								<div class="col-xs-2">Request Pullout Date</div>
								<div class="col-xs-2">Pullout Action</div>
							</div>
							<?php

								foreach($pullout->result_array() as $row){ 
									$pullout_code = $row['pullout_id'];
									$pullout_item = $row['item_name'];
									$pullout_supplier = $row['supplier_name'];
									$pullout_quantity = $row['pullout_quantity'];
									$pullout_status = $row['pullout_status'];
									$pullout_date = $row['pullout_date'];

									if($pullout_status == 0 ){
							?>
							
							
								
								<div class="row table-entries table-entries-income">
									<div class="col-xs-2"><?php echo $pullout_code;?></div>
									<div class="col-xs-2"><?php echo $pullout_supplier;?></div>
									<div class="col-xs-1"><?php echo $pullout_quantity;?></div>
									<div class="col-xs-3"><?php echo $pullout_item;?></div>
									<div class="col-xs-2"><?php echo date("M j, Y", strtotime($pullout_date)); ?></div>										
									<div class="col-xs-2">

										<a href='<?php echo base_url() ?>cashier/approved_pullout/<?php echo $pullout_code ?>'><i class="fa fa-check-square" aria-hidden="true"></i> Approve</a>
									</div>
								</div>

								<?php
									} 
								} 
							?> 
						</div>
					</div>
					<div class="overwatch-mec mec-income">

						<div class="head-contain">
							<h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i></i>APPROVED PULLOUT REQUEST</h4>
						</div>
						<div class="col-xs-12">							
							<div class="row table-title table-title-general table-title-income">
								<div class="col-xs-2">Pullout Code</div>
								<div class="col-xs-2">Supplier</div>
								<div class="col-xs-1">Qty</div>
								<div class="col-xs-3">Item Name</div>
								<div class="col-xs-1">Request Pullout Date</div>
								<div class="col-xs-1">Approved Pullout Date</div>
								<div class="col-xs-1">Remarks</div>
							</div>
							<?php

								foreach($pullout->result_array() as $row){ 
									$pullout_code = $row['pullout_id'];
									$pullout_item = $row['item_name'];
									$pullout_supplier = $row['supplier_name'];
									$pullout_quantity = $row['pullout_quantity'];
									$pullout_status = $row['pullout_status'];
									$pullout_date = $row['pullout_date'];
									$pullout_approved_date = $row['pullout_approved_date'];

									if($pullout_status == 1 ){
							?>
							
							
								
								<div class="row table-entries table-entries-income">
									<div class="col-xs-2"><?php echo $pullout_code;?></div>
									<div class="col-xs-2"><?php echo $pullout_supplier;?></div>
									<div class="col-xs-1"><?php echo $pullout_quantity;?></div>	
									<div class="col-xs-3"><?php echo $pullout_item;?></div>
									<div class="col-xs-1"><?php echo date("M j, Y", strtotime($pullout_date)); ?></div>
									<div class="col-xs-1"><?php echo date("M j, Y", strtotime($pullout_approved_date)); ?></div>									
									<div class="col-xs-2"></div>
									
								</div>

								<?php
									} 
								} 
							?> 
						</div>
					</div>
					

						<!-- pending view end -->

						
					

				</div>