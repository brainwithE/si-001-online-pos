<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

				<div class="container">
				
				<?php
					foreach($query->result_array() as $row){
					$prod_id = $row['id'];
					$prod_name = $row['name'];
					$prod_quantity = $row['quantity'];
					$prod_price = $row['price'];
					$prod_desc = $row['desc'];	
					
				?>

					<div class="main col-md-9">
						<div class="item-main-image">
							<?php
								foreach($img_query->result_array() as $img_row){
									if($prod_id == $img_row['fk_ID']) {
										$img_name = $img_row['img_name'];
										$img_ext = $img_row['ext'];
										?>
											<img src="<?php echo base_url().'uploads/'.$img_name.'.'.$img_ext; ?>">
										<?php
									}
								}
							?>
						</div>
						<div class="must-see-items">
							<h1 class="main-title"><?php echo $prod_name; ?></h1>
						</div>
						<div class="must-see-items-border-bottom"></div>
						<!-- <p class="generic-content"><?php echo $prod_desc; ?></p> -->
						<p class="generic-content">Available items: <?php echo $prod_quantity; ?></p>
						<p class="generic-content">Price: <?php //echo $prod_price; ?></p>
					</div>
				<?php
				}
				?>
					<div class="special-sidebar col-md-3">
					
						<div class='edit-button'>
							<a href="<?php echo base_url().'edit-product/'.$prod_id ?>"><button type='button'>Edit</button></a>
						</div>
					
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
