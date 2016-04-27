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
				
				<?php
					foreach($query->result_array() as $row){
						$prod_name = $row['name'];
						$prod_quantity = $row['quantity'];
						$prod_price = $row['price'];
						$prod_desc = $row['desc'];
					}
					echo "<h2>".$prod_name."</h2>";
					echo "<p>".$prod_desc."</p>";

					echo "<p>STILL ".$prod_quantity."LEFT!</p>";
					echo "<p>FOR AS LOW AS Php ".$prod_price."</p>";
				
				?>

				
				<div class="main col-md-9">
						<div class="container">
							<div class="col-md-12">
								<form action="<?php echo site_url('/Type1/upload'); ?>" class="dropzone">
									<div class="text-body" style="background-color:#e2e2e2;">

													

									</div>
									<button class="add-item">ADD ITEM</button>
								</form>
							</div>
						</div>
				</div>

			</div>

			