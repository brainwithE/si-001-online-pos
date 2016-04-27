<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

				<div class="container">

					<div class="main col-md-9">
						<?php if(isset($shop)): ?>
							<?php
								foreach($shop->result_array() as $row){
									$name = $row['name'];
									$desc = $row['description'];
								}
								
								$shop_name = array(
									'name' => 'shop_name',
									'id' => 'shop_name_id',
									'value' => $name
								);

								$shop_desc = array(
									'name' => 'shop_desc',
									'id' => 'shop_desc_id',
									'value' => $desc
								);								
							?>
						<?php endif; ?>

						
						<div class="row edit-shop">
							<?php echo form_open('edit-shop-dets') ?>
							<ul>
								<li><?php echo form_input($shop_name) ?></li>
								<li><?php echo form_textarea($shop_desc) ?></li>
								<li><?php echo form_submit('shopsubmit', 'Save!');?></li>
							</ul>
							<?php echo form_close();?>
						</div>						
						
					</div>

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
					
				</div>
			</div>
