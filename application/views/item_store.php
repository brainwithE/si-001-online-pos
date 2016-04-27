<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

			
				<div class="container">
					<div class="must-see-items">
						<h1 class="main-title"><?php $shop_id = $this->uri->segment(2);
						$name_query = $this->db->get_where('shop', array('id' => $shop_id));
						foreach ($name_query ->result_array() as $Sname)
						{
							$name = $Sname['name'];
						}
						 echo $name; ?></h1>
					</div>
					<div class="must-see-items-border-bottom"></div>
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

					<div class="main col-md-9">
						<div class="row">
							<?php
								$s_id = $this->uri->segment(2);
								$product_query = $this->db->get_where('product', array('shop_id' => $s_id));
								foreach ($product_query -> result_array() as $pro)
								{
									$prod_id = $pro['id'];
									$prod_name = $pro['name'];
									$prod_quantity = $pro['quantity'];
									$prod_price = $pro['price'];
									$prod_desc = $pro['desc'];
								

							 ?>
							<div class="itemofstore-posts col-md-4">
								<div class="itemofstore-photo item-div-1 post-photo col-md-12">
									<a class="lightbox" href="#item-box-1">
										<?php
												foreach($img_query->result_array() as $img_row)
											{
												if($prod_id == $img_row['fk_ID']){
													$img_name = $img_row['img_name'];
													$img_ext = $img_row['ext'];
													?>
												<img src="<?php echo base_url().'uploads/'.$img_name.'.'.$img_ext; ?>">
												</a>
												<div class="lightbox-target" id="item-box-1">
		   										<img src="<?php echo base_url().'uploads/'.$img_name.'.'.$img_ext; ?>">
									   			<a class="lightbox-close" href="#item-div-1"></a>
												</div>
						
											 <?php
											}
										}
										?>   
									
								</div>
								<div class="itemsofstore-post-content col-md-12">
									<div class="item-category left-align store-name"><h2><?php echo $prod_name; ?></h2></div>
									<p class="category-details left-align"> <?php echo $name; ?></p>
									<!-- <p class="catergory-details left-align"> <?php echo $prod_desc;?></p> -->
									<a class="call-links" href="#"><?php //echo $prod_price; ?></a>
								</div>
							</div>
							<?php } ?>
						</div>

					</div>
					
				</div>
			</div>
			