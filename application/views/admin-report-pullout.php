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
								<p style="text-align: left;">These are all your pullout records. Today is: <?php echo $today = date('F j, Y');?></p>
								<div id="print" onClick="printPage();" class="call-links">PRINT PULLOUT RECORDS</div>
							</div>
						</div>

						<div class="head-contain">
							<h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i></i>PULLOUT REPORT</h4>
						</div>
						<div class="col-xs-12">

							<div class="row table-title table-title-general table-title-income">
								<div class="col-xs-2">Pullout Code</div>
								<div class="col-xs-3">Item Name</div>
								<div class="col-xs-3">Supplier Name</div>
								<div class="col-xs-1">Quantity</div>
								<div class="col-xs-1">Status</div>
								<div class="col-xs-2">Date Approved</div>	
							</div>
							<?php
								foreach($pullout->result_array() as $row){ 
									$pullout_code = $row['pullout_id'];
									$pullout_item = $row['item_name'];
									$pullout_supplier = $row['supplier_name'];
									$pullout_quantity = $row['pullout_quantity'];
									$pullout_status = $row['pullout_status'];
									$pullout_date_approved = $row['pullout_date'];
							?>
								
								<div class="row table-entries table-entries-income">
									<div class="col-xs-2"><?php echo $pullout_code;?></div>
									<div class="col-xs-3"><?php echo $pullout_item;?></div>
									<div class="col-xs-3"><?php echo $pullout_supplier;?></div>
									<div class="col-xs-1"><?php echo $pullout_quantity;?></div>
									<div class="col-xs-1"><?php if($pullout_status==1){ echo "APPROVED"; }else{ echo "PENDING"; } ?></div>
									<div class="col-xs-2"><?php echo $pullout_date_approved;?></div>	
								</div>

							<?php } ?>
							
						</div>
						
					</div><!-- MEC end -->

				</div>