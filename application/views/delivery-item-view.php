<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- insert ponpon about content -->
			

				<div class="container">

					<!--The overwatch Main element Container or MEC-->
					<div class="overwatch-mec mec-income">
						<div class="col-xs-12">
							<div class="row">
								<?php
									echo form_open('add-delivery-items');							
								?>
								<input type="field" placeholder="Item Code" name="item_code"/>
								<input type="field" placeholder="Item Quantity" name="item_quantity"/>
	                        	<input type="submit" class="submit-button" value="Add Item" />
								<?php									
									echo form_close();
								?>
							</div>

							<div class="row table-title table-title-general table-title-income">
								<div class="col-xs-12">Delivery Transaction ID: <?php echo $dt_id; ?>Here I am This is me</div>
								<div class="col-xs-3">Quantity</div>
								<div class="col-xs-3">Item Code</div>
								<div class="col-xs-6">Item Names</div>
							</div>
							<?php
								
								//foreach($income->result_array() as $row){ 
								
							?>
								
								<div class="row table-entries table-entries-income">
									<div class="col-xs-3"></div>
									<div class="col-xs-5 col-sm-6"></div>
									<div class="col-xs-3"></div>
								</div>

							<?php //} ?>
							
						</div>

						<div class="table-title table-end table-end-general table-end-income">
								<div class="col-xs-6 col-sm-9 total-label">TOTAL EARNINGS</div>
								<div class="col-xs-3 total-amount"><?php echo $total_earnings; ?></div>
						</div>
					</div><!-- MEC end -->

				</div>