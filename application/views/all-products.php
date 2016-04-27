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
						
						

						<?php 
							$prods_ctr = 0;
							foreach($products->result_array() as $row2){ 
							$prods_ctr++;
						?>

						<?php if ($prods_ctr%3==0){ ?>
							<div class="row">
						<?php } ?> <!-- open row if by 3 -->

							<div class="item-posts col-md-4">
								<?php echo form_open('individual-item') ?>
								<?php echo form_hidden('prodid', $row2['id']); ?>
								<?php echo form_hidden('shopid', $row2['shop_id']); ?>
								<div class="post-photo col-md-12">
								<?php
									foreach($images->result_array() as $img_row){
										if($row2['id'] == $img_row['fk_ID']){
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
									<div class="item-category"><h2><?php echo $row2['name']; ?></h2></div>
									<p class="category-details">Be part of the summer fun.</p>
									<?php echo form_submit(array('name'=>'submit','value'=>'VIEW DETAILS','class'=>'call-links')); ?>
								</div>
								<?php echo form_close();?>
							</div>

						<?php if ($prods_ctr%3==0){ ?>
							</div> <!-- end of row -->
						<?php } ?> <!-- close row if by 3 -->					

						<?php }?>

					</div>
				</div>
			</div>