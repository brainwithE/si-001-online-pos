<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- insert ponpon about content -->
			

				<div class="container">
					<div class="row">
						<div class="featured-image col-md-12">
							<img src="<?php echo base_url();?>images/slider_sample.png"/> <!--ponpon -->
							<a class="shop-now-button" href="#">
								<div class="border-white">
									SHOP NOW >
								</div>
							</a>
						</div>
					</div>
				</div>



				<div class="container">

					<div class="special-sidebar col-md-3">

						<div class="search-category">
							<input class="search-category-box" placeholder="Search Item" type="search" value="" name="search" id="search">
							<button type="submit" name="search-category"><img src="<?php echo base_url();?>images/magnifyingglass.png"></button>
						</div>
						<div class="sidebars">
							<div class="search-categories-header">
								<div class="accordion">
									<div class="accordion-section">
										<?php
								            	 $iCtr = 0;
								            	 foreach($query2->result_array() as $row2)
								            	 	{
								            	 		$iCtr++;
								            	 		$cat_name = $row2['name'];
								            	 		?>
								            	 	<a class="accordion-section-title search-categories current" href="#accordion-1"><i class="fa fa-plus "></i><?php echo $cat_name ?></a>
													<div id="accordion-<?php echo $iCtr ?>" class="accordion-section-content">
								        			</div>
								            	 	<?php }
								          			 ?>
										<!--end .accordion-section-content-->
									</div><!--end .accordion-section-->
								</div><!--end .accodion-->

							</div>
							<div class="filters-options-header">
								<h3>FILTER BY:</h3>
								<a href="#"><div class="filter-content">STORES (100) <i class="fa fa-arrow-circle-o-right"></i></div></a>
								<a href="#"><div class="filter-content divider accordion-lists">STORE AAA <i class="fa fa-times-circle-o"></i></div></a>
								<a href="#"><div class="filter-content divider">COLOR <i class="fa fa-arrow-circle-o-right"></i></div></a>
								<a href="#"><div class="filter-content divider">PRICE RANGE <i class="fa fa-arrow-circle-o-right"></i></div></a>
							</div>
						</div>

					</div>
					
					<div class="main col-md-9">

						<div class="must-see-items-border"></div>
						<div class="must-see-items">
							<h1>ALL ITEMS</h1>
						</div>
					
						<div class="row">
							<?php
								foreach($query->result_array() as $row){
									$prod_id = $row['id'];
									$prod_name = $row['name'];
									$prod_quantity = $row['quantity'];
									$prod_price = $row['price'];
									$prod_desc = $row['desc'];
									$shop_id=$row['shop_id'];
							?>
							<div class="item-posts col-md-4">
								<div class="post-photo col-md-12">
									<?php
										foreach($img_query->result_array() as $img_row){

											if($prod_id == $img_row['fk_ID']){
											$img_name = $img_row['img_name'];
											$img_ext = $img_row['ext'];
											?>
												<img src="<?php echo base_url().'uploads/'.$img_name.'.'.$img_ext; ?>">
											<?php
											}
										}
									?>
								</div>
								<div class="post-content col-md-12">
									<div class="item-category left-align"><h2>P <?php echo $prod_price; ?></h2></div>
									<p class="category-details left-align"><?php echo $prod_name; ?></p>
									<?php
										echo form_open('individual-item');
										echo form_hidden('prodid', $row['id']);
										echo form_hidden('shopid', $row['shop_id']);								
										echo form_submit(array('name'=>'submit','value'=>'SHOP NOW','class'=>'call-links'));
										echo form_close();
									?>
								</div>
							</div>						
							<?php 
							} 
							?>
						
						</div>

					</div>

					

				</div>
				
				
				
			</div>