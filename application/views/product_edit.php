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
						<?php if(isset($query)): ?>
							<?php
								foreach($query->result_array() as $row){
									$prod_id = $row['id'];
									$prod_name = $row['name'];
									$prod_quantity = $row['quantity'];
									$prod_price = $row['price'];
									$prod_desc = $row['desc'];	
								}
								
								$prod_name = array(
									'name' => 'product_name',
									'id' => 'product_name',
									'value' => $prod_name
								);

								$prod_desc = array(
									'name' => 'desc',
									'id' => 'desc',
									'value' => $prod_desc,
									'rows'        => '5',
								    'cols'        => '60',
								    'style'       => 'width:50%',
								);
								
								$prod_quantity = array(
									'name' => 'qty',
									'id' => 'qty',
									'value' => $prod_quantity
								);
								$prod_price = array(
									'name' => 'price',
									'id' => 'price',
									'value' => $prod_price
								);								
							?>
						<?php endif; ?>

						<div class="must-see-items">
							<h1 class="main-title">STORE AAA</h1>
						</div>
						<div class="must-see-items-border-bottom"></div>

						<div class="row">
							<?php echo form_open('edit-product-dets/'.$prod_id) ?>
							<table class="product_table">
								<legend> Add Product </legend>
								<tr>
									<td><p> Product Name:</p></td>
									<td><?php echo form_input($prod_name) ?></td>
								</tr>
								<tr>
									<td><p> Qty:</p></td>
									<td><?php echo form_input($prod_quantity) ?></td>
								</tr>
								<tr>
									<td><p> Price:</p></td>
									<td><?php echo form_input($prod_price) ?></td>
								</tr>
								<tr>
									<td><p> Description:</p></td>
								
									<td><?php echo form_textarea($prod_desc) ?></td>
								</tr>
								<tr>
									<td><?php echo form_submit('submit','Submit'); ?></td>	
								</tr>
								<?php echo form_close();?>
							</table>
							
						</div>
				</div>

			</div>

			