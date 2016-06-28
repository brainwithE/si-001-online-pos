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
								<p style="text-align: left;">These are all your delivery records. Today is: <?php echo $today = date('F j, Y');?></p>
								<div id="print" onClick="printPage();" class="call-links">PRINT DELIVERY RECORDS</div>
							</div>
						</div>

						<div class="head-contain">
							<h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i></i>
							PENDING DELIVERY REQUEST</h4>
						</div>

						<div class="col-xs-12">
							<div class="row table-title table-title-general table-title-income">
								<div class="col-xs-2">Delivery Code</div>
								<div class="col-xs-3">Supplier Name</div>
								<div class="col-xs-1">Qty</div>
								<div class="col-xs-2">Date Requested</div>								
								<div class="col-xs-2">Delivery Action</div>	
							</div>
							<?php
								foreach($delivery_transaction->result_array() as $row){ 
								$dt_code = $row['dt_id'];
								$dt_supplier = $row['name'];
								$dt_quantity = $row['dt_total_quantity'];
								$dt_date = $row['dt_date'];
								$dt_status = $row['dt_status'];

								if($dt_status == 0 ){
							?>
								
								<div class="row table-entries table-entries-income">
									<a class="delivery-links" href="<?php echo base_url() ?>admin/view_dt_details/<?php echo $dt_code ?>">
										<div class="col-xs-2"><?php echo $dt_code;?></div>
										<div class="col-xs-3"><?php echo $dt_supplier;?></div>
										<div class="col-xs-1"><?php echo $dt_quantity;?></div>
										<div class="col-xs-2"><?php echo date("M j, Y g:i A", strtotime($dt_date)); ?></div>
										<div class="col-xs-2">
											<a href='<?php echo base_url() ?>admin/approved_delivery/<?php echo $dt_code ?>'><i class="fa fa-check-square" aria-hidden="true"></i> Approve</a>
											<a href='<?php echo base_url() ?>admin/reject_delivery/<?php echo $dt_code ?>' class="btn-reject"><i class="fa fa-minus-square" aria-hidden="true"></i> Reject</a>

										</div>
									</a>
								</div>

							<?php 
								}
							} 
							?>
						</div>
					</div><!-- MEC end -->


					<div class="overwatch-mec mec-income">
						<div class="head-contain">
							<h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i></i>
							APPROVED DELIVERY REQUEST</h4>
						</div>

						<div class="col-xs-12">
							<div class="row table-title table-title-general table-title-income">
								<div class="col-xs-2">Delivery Code</div>
								<div class="col-xs-2">Supplier Name</div>
								<div class="col-xs-1">Total Quantity</div>
								<div class="col-xs-2">Date Requested</div>
								<div class="col-xs-2">Date Approved</div>
								<div class="col-xs-3">Remarks</div>	
							</div>
							<?php
								foreach($delivery_transaction->result_array() as $row){ 
								$dt_code = $row['dt_id'];
								$dt_supplier = $row['name'];
								$dt_quantity = $row['dt_total_quantity'];
								$dt_date = $row['dt_date'];
								$dt_status = $row['dt_status'];
								$dt_date_approved = $row['dt_approve_date'];

								if($dt_status == 1){
							?>
								
								<div class="row table-entries table-entries-income">
									<a class="delivery-links" href="<?php echo base_url() ?>admin/view_dt_details/<?php echo $dt_code ?>">
										<div class="col-xs-2"><?php echo $dt_code;?></div>
										<div class="col-xs-2"><?php echo $dt_supplier;?></div>
										<div class="col-xs-1"><?php echo 'x'.$dt_quantity;?></div>
										<div class="col-xs-2"><?php echo date("M j, Y g:i A", strtotime($dt_date)); ?></div>
										<div class="col-xs-2"><?php echo date("M j, Y g:i A", strtotime($dt_date_approved)); ?></div>
										<div class="col-xs-3"></div>
									</a>
								</div>

							<?php 
								}
							} 
							?>
						</div>
					</div><!-- MEC end -->

				</div>