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
							?>
							

						<?php endif; ?>

						<div class="must-see-items">
							<h1 class="main-title"><?php echo $name; ?></h1>
						</div>
						<div class="must-see-items-border-bottom"></div>

						<p class="generic-content"><?php echo $desc; ?></p>

					</div>

					<div class="special-sidebar col-md-3">
						<!--LYZH-->
						<div class='edit-button'>
							<a href="<?php echo base_url(); ?>edit-shop"><button type='button'>Edit Shop Details</button></a>
						</div>
						<!--END LYZH-->
						<div class="search-category">
							<input class="search-category-box" placeholder="Search Item" type="search" value="" name="search" id="search">
							<button type="submit" name="search-category"><img src="<?php echo base_url();?>images/magnifyingglass.png"></button>
						</div>
						<div class="sidebars">
							<div class="search-categories-header">
								<div class="accordion">
									<div class="accordion-section">
										<?php
								            	 $query = $this->db->get('category');
								            	 $iCtr = 0;
								            	 foreach($query->result_array() as $row)
								            	 	{
								            	 		$iCtr++;
								            	 		$cat_name = $row['name'];
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
					
				</div>
			</div>
