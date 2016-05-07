<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script>

$(document).ready(function(){	
    $('.btn-edit').click(function(){
        $('.edit-item').show();
        $('.item-details').hide();
    });

    $('.btn-back').click(function(){
        $('.edit-item').hide();
        $('.item-details').show();
    });
});

</script>

	<div class="container">

		<!--The overwatch Main element Container or MEC-->
		<div class="overwatch-mec mec-income">

				<div class="container">

					<!--The overwatch Main element Container or MEC-->
					<div class="overwatch-mec mec-income">
						<div class="col-xs-12">
							<!-- FILTER FUNCTION

							<div class="row">
								<?php
									//echo form_open('filter-income');							
								?>
								<input type="text" id="datepickerstart" class="datepicker" placeholder="Start Date" name="filter_start_date">
								<input type="text" id="datepickerend" class="datepicker" placeholder="End Date" name="filter_end_date">
								<?php
									//echo form_submit(array('name'=>'submit','value'=>'FILTER','class'=>'call-links'));
									//echo form_close();
								?>
							</div> -->

							<div class="row table-title table-title-general table-title-income">
								<div class="col-xs-2">Item Code</div>
								<div class="col-xs-2">Item Supplier</div>
								<div class="col-xs-4">Item Name</div>
								<div class="col-xs-2">Price</div>
								<div class="col-xs-2">Stock on Hand</div>	
							</div>
							<?php
								/*$total_earnings = 0;
								foreach($income->result_array() as $row){ 
								$income_name = $row['income_name'];
								$income_amount = $row['income_amount'];
								$income_date_acquired = $row['income_date_acquired'];
								$total_earnings = $total_earnings + $income_amount;*/

								foreach($item->result_array() as $row){ 
									$item_code = $row['item_id'];
									$item_supplier = $row['supplier_name'];
									$item_name = $row['item_name'];
									$item_price = number_format($row['item_price'],2,'.',',');
									$item_stock = $row['item_stock'];
									$item_category = $row['item_category'];

							?>
								
								<div class="row table-entries table-entries-income" data-toggle="modal"
								<?php echo "data-target=#Item".$item_code?>>
									<div class="col-xs-2"><?php echo $item_code;?></div>
									<div class="col-xs-2"><?php echo $item_supplier;?></div>
									<div class="col-xs-4"><?php echo $item_name;?></div>
									<div class="col-xs-2"><?php echo $item_price;?></div>
									<div class="col-xs-2"><?php echo $item_stock;?></div>	
								</div>

							

							<div class="modal fade" <?php echo "id='Item".$item_code."'"?> role="dialog">
					                <div class="modal-dialog">
					                    <!-- Modal content-->
					                     <div class="modal-content">
					                      <div class="col-md-12">	
					                      	<div class="modal-body modal-project">				                        
					                        	<div class="item-details">
						                          <label><i class="fa fa-shopping-cart" aria-hidden="true"></i><?php echo $item_name;?></label>
						                          <p>Category: <?php echo $item_category;?></p>
						                          <p>Supplier: <?php echo $item_supplier;?></p>
						                          <p>Price: P<?php echo $item_price;?></p>
						                          <p>Stocks available: <?php echo $item_stock;?></p>
						                          <div class="btn-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit Item</div>
						                        </div>

						                        <div class="edit-item" style="display: none;">
						                        	<i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit Item
						                       	  <?php echo form_open('admin/edit-item') ?>
						                       	  		<input type="hidden" name="item_code" value="<?php echo $item_code?>">
						                       	  		<label>Item Name: </label>
							                        	<input type="field" name="item_name" value="<?php echo $item_name?>">
							                        	<label>Item Price: </label>
							                        	<input type="field" name="item_price" value="<?php echo $item_price?>">
							                        	<label>Item Category: </label>
							                        	<input type="field" name="item_category" value="<?php echo $item_category?>">

							                        	<a class="btn-back">Back</a>
							                        	<input type="submit" class="submit-button" value="Submit" />
							                      <?php echo form_close();?>
						                        </div>
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


				
