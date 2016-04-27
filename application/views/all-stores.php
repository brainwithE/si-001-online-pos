<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

			<div id="content">
				<div class="container">
					<div class="row">
						<div class="featured-image col-md-12">
							<img src="<?php echo base_url();?>images/slider_sample2.png"/> <!--ponpon -->
							<a class="shop-now-button" href="itemsinstore.html">
								<div class="border-white">
									SHOP NOW >
								</div>
							</a>
						</div>
					</div>
				</div>

				<!-- <div class="container">
					<div class="must-see-items">
						<h1 class="subtitle">TO-GO</h1>
						<h1 class="main-title">STORE AAA</h1>
					</div>
					<div class="must-see-items-border-bottom"></div>
				</div> -->

				<div class="container">

					<div class="special-sidebar col-md-3">
						<!-- <div class="search-category">
							<input class="search-category-box" placeholder="Search Item" type="search" value="" name="search" id="search">
							<button type="submit" name="search-category"><img src="<?php echo base_url();?>images/magnifyingglass.png"></button>
						</div> -->
						<div class="select-category">
							<div class="filters-options-header">
								<a href="#"><div class="filter-content">SALE <i class="fa fa-arrow-circle-o-right"></i></div></a>
								<a href="#"><div class="filter-content divider accordion-lists">STORE AAA <i class="fa fa-times-circle-o"></i></div></a>
								<a href="#"><div class="filter-content divider">NEW <i class="fa fa-arrow-circle-o-right"></i></div></a>
							</div>
							<div class="select-category-header">
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
						</div>
					</div>

					<div class="main col-md-9">
						<!-- <div class="sort-by col-md-12">
							<input class="search-category-box" placeholder="" type="search" value="" name="search" id="search">
							<h4 class="main-content">SORT BY</h4>
						</div> -->
						
						<div class="row">

							<?php foreach($shops->result_array() as $shop_items) {
								$shop_id = $shop_items['id'];
								$shop_name = $shop_items['name'];
								
								$prod_ctr = 0;
								foreach($products->result_array() as $prod_items){
									if($shop_id==$prod_items['shop_id']){
										$prod_ctr++;
									}
								}
							?>

							<div class="all-store-posts col-md-4">
								<div class="all-store-photo item-div-1 col-md-12">
									<a class="lightbox" href="#item-box-1">
		   								<img src="<?php echo base_url();?>images/item1.png">
									</a> 
									<div class="lightbox-target" id="item-box-1">
		   								<img src="<?php echo base_url();?>images/item1.png">
									   <a class="lightbox-close" href="#item-div-1"></a>
									</div>
								</div>
								<div class="post-content col-md-12">
									<div class="item-category"><h4 class="main-content-regular"><?php echo $shop_name; ?></h4></div>
									<div class="more-items col-md-4"><img src="<?php echo base_url();?>images/item3.png"></div>
									<div class="more-items col-md-4"><img src="<?php echo base_url();?>images/item2.png"></div>
									<div class="more-items more-items-border col-md-4"><span><?php echo $prod_ctr; ?></span> items</div>
									<a class="call-links" href="itemsinstore.html">VISIT NOW</a>
								</div>
							</div>

							<?php }?>
						
						</div> <!-- end of row -->

					</div>
				</div>
			</div>