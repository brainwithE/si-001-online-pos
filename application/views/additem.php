<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


					
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
									<a class="accordion-section-title search-categories current" href="#accordion-1"><i class="fa fa-plus "></i>WOMEN</a>
									<div id="accordion-1" class="accordion-section-content">
							            <ul>
							            	<li>Dresses (10)</li>
							            	<li>Tops (30)</li>
							            	<li>Jackets (40)</li>
							            	<li>Shorts (10)</li>
							            	<li>Skrits (5)</li>
							            	<li>Jumpsuits (5)</li>
							            	<li>Swimwear (10)</li>
							            	<li>Lingerie (4)</li>
							            	<br>
							            	<li class="accordion-section-content-viewall">View All</li>
							            </ul>
							        </div><!--end .accordion-section-content-->
							        <a class="accordion-section-title search-categories divider" href="#accordion-2"><i class="fa fa-plus "></i>MEN</a>
									<div id="accordion-2" class="accordion-section-content">
							            <ul>
							            	<li>Dresses (10)</li>
							            	<li>Tops (30)</li>
							            	<li>Jackets (40)</li>
							            	<li>Shorts (10)</li>
							            	<li>Skrits (5)</li>
							            	<li>Jumpsuits (5)</li>
							            	<li>Swimwear (10)</li>
							            	<li>Lingerie (4)</li>
							            	<br>
							            	<li class="accordion-section-content-viewall">View All</li>
							            </ul>
							        </div><!--end .accordion-section-content-->
							        <a class="accordion-section-title search-categories divider" href="#accordion-3"><i class="fa fa-plus "></i>KIDS</a>
									<div id="accordion-3" class="accordion-section-content">
							            <ul>
							            	<li>Dresses (10)</li>
							            	<li>Tops (30)</li>
							            	<li>Jackets (40)</li>
							            	<li>Shorts (10)</li>
							            	<li>Skrits (5)</li>
							            	<li>Jumpsuits (5)</li>
							            	<li>Swimwear (10)</li>
							            	<li>Lingerie (4)</li>
							            	<br>
							            	<li class="accordion-section-content-viewall">View All</li>
							            </ul>
							        </div><!--end .accordion-section-content-->
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
							<div class="must-see-items">
								<h1 class="main-title">
									<?php
									foreach($shop_query->result_array() as $row){
									$shop_name = $row['name'];
									echo $shop_name;
									}
									?>									
								</h1>
							</div>
							<div class="must-see-items-border-bottom"></div>

						<div class="row">

							<a href="<?php echo base_url();?>add_product">
								<div class="add-item col-md-4">
										<i class="fa fa-plus-circle"></i>
										<p id="add-item-text">ADD PRODUCT / ITEM</p>
								</div>
							</a>

							<?php
								foreach($query->result_array() as $row){
									$prod_id = $row['id'];
									$prod_name = $row['name'];
									$prod_quantity = $row['quantity'];
									$prod_price = $row['price'];
									$prod_desc = $row['desc'];	
									$prod_shop = $row['shop_id'];
							?>
								<div class="itemofstore-posts col-md-4">
									<?php echo form_open('individual-item') ?>
									<?php echo form_hidden('prodid', $prod_id); ?>
									<?php echo form_hidden('shopid', $prod_shop); ?>
									<div class="itemofstore-photo item-div-3 post-photo col-md-12">
										<a class="lightbox" href="#item-box-3">
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
			   								
										</a> 
										<div class="lightbox-target" id="item-box-3">
			   								<img src="<?php echo base_url();?>images/item3.png">
										   <a class="lightbox-close" href="#item-div-3"></a>
										</div>
									</div>	
									<div class="itemsofstore-post-content col-md-12">
										<div class="item-category left-align store-name"><h2><?php echo $prod_name; ?></h2></div>
										<p class="category-details left-align"><?php echo $prod_price; ?></p>
										<?php echo form_submit(array('name'=>'submit','value'=>'EDIT DETAILS','class'=>'call-links')); ?>
									</div>
									<?php echo form_close();?>
								</div>
							<?php
								}
							?>
						
					</div>
					
				</div>
			</div>
