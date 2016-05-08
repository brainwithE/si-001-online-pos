<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- insert ponpon about content -->
			

				<div class="container">

					<!--The overwatch Main element Container or MEC-->
					<div class="overwatch-mec mec-income">
					<div class="col-md-6 total-label total-label-bank">Delivery Transaction ID: -- <?php echo $dt_id; ?></div><div class="col-md-3 total-amount"></div>
					

						<div class="col-xs-12">

							<div class="row table-title table-title-general table-title-income">
								<div class="col-xs-1"></div>
								<div class="col-xs-3">Item Name</div>
								<div class="col-xs-2">Quantity</div>
							</div>
							
							<?php 
								$ctr = 1;
								foreach($delivery_transaction->result_array() as $row){ 
									$delivery_id = $row['delivery_id'];
									$item_name = $row['item_name'];
									$delivery_quantity = $row['delivery_quantity'];
									$delivery_dt = $row['delivery_dt'];
							?>

								<div class="row table-entries table-entries-income">
									<div class="col-xs-1"><?php echo $ctr; ?></div>
									<div class="col-xs-3"><?php echo $item_name; ?></div>
									<div class="col-xs-"><?php echo $delivery_quantity; ?></div>
								</div>

							<?php
								$ctr++;
							 } ?>
							
						</div>

						<!-- <div class="table-title table-end table-end-general table-end-income">
								<div class="col-xs-6 col-sm-9 total-label">TOTAL EARNINGS</div>
								<div class="col-xs-3 total-amount"><?php echo $total_earnings; ?></div>
						</div> -->
					</div><!-- MEC end -->

				</div>