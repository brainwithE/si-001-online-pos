<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	

				<?php foreach($product->result_array() as $prod_item){
					$p_id = $prod_item['id'];
					$name = $prod_item['name'];
					$price = $prod_item['price'];
					$qty = $prod_item['quantity'];
					$desc = $prod_item['desc'];
				}?>

				<?php foreach($shop->result_array() as $shop){
					$shop_id = $shop['id'];
					$shop_name = $shop['name'];
				}?>

				<div class="container">
					<div class="row">
						<div class="banner-image margin-top col-md-12">
							<img src="<?php echo base_url();?>images/header_store.png"/> <!--ponpon -->
						</div>
						<div class="col-md-12 shop-nav-bar">
							<ul class="shop-nav-buttons">
								<li>
									<a class="border-blue-fixed" href="itemsinstore.html"><img src="<?php echo base_url();?>images/SHOP.png"/>SHOP</a>
								</li>
								<li>
									<a href="about-the-shop.html"><img src="<?php echo base_url();?>images/abouttheshop.png"/>ABOUT THE SHOP</a>
								</li>
								<li>
									<a href="FAQ.html"><img src="<?php echo base_url();?>images/faq.png"/>FAQ&CONTACT</a>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="row">
						<div class="main individual-item-container main-content-background col-md-12">
							<div class="must-see-items">
								<h1 class="main-title"><?php echo $name; ?></h1>
								<h1 class="subtitle">by <?php echo $shop_name; ?></h1>
							</div>
							<div class="must-see-items-border-bottom"></div>
							<div class="row">
								<div class="indiv-item-photo col-md-7">
									<div class="indiv-other-photo col-md-2">
										<div class="other-photo-container item-div-1">
											<a class="lightbox" href="#item-box-1">
				   								<img src="<?php echo base_url();?>images/item1.png">
											</a> 
											<div class="lightbox-target" id="item-box-1">
				   								<img src="<?php echo base_url();?>images/item1.png">
											   <a class="lightbox-close" href="#item-div-1"></a>
											</div>
										</div>
										<div class="other-photo-container item-div-1">
											<a class="lightbox" href="#item-box-1">
				   								<img src="<?php echo base_url();?>images/item1.png">
											</a> 
											<div class="lightbox-target" id="item-box-1">
				   								<img src="<?php echo base_url();?>images/item1.png">
											   <a class="lightbox-close" href="#item-div-1"></a>
											</div>
										</div>
									</div>
									<div class="indiv-main-photo col-md-10">
										<?php
										foreach($prod_images->result_array() as $img_item){
											if($img_item['fk_ID']==$p_id){
												$img_name = $img_item['img_name'];
												$img_ext = $img_item['ext'];
											?>
												<img src="<?php echo base_url().'uploads/'.$img_name.'.'.$img_ext; ?>" class="img-responsive">
											<?php
											}
										}?>
									</div>
								</div>
								<div class="col-md-5">
									<div class="add-to-cart-container col-md-12">				
										<h1 class="item-price">P <?php echo $price; ?></h1>
										<h1 class="item-availability main-content">(<?php echo $qty; ?>) Items Available</h1>
										
										<!-- add cart item -->
										<?php echo form_open('cart/add_cart_item');?>
										<fieldset>

										<label>Quantity</label>
										<div class="row">
											<?php echo form_input('quantity', '1', 'maxlength="2"'); ?>
											<?php echo form_hidden('product_id', $p_id); ?>
										</div>
										<div class="row">
											<?php 
											echo form_submit(array('name'=>'add','class' => 'add-button','value' => "ADD TO CART"));
											//<a class="call-links" href="#">ADD TO CART</a> 
											?>
										</div>
										</fieldset>
										<?php echo form_close(); ?>
									</div>
									<div class="share-item col-md-12">
										<a class ="fbicon icon" href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank"><img src="<?php echo base_url();?>images/32-facebook.png"></a>
						                <a class ="twiticon icon" href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet"><img src="<?php echo base_url();?>images/32-twitter.png"></a>
						                <a class ="gmailicon icon"href="https://plus.google.com/share?url=" target="_blank" title="Share on Instagram"><img src="<?php echo base_url();?>images/32-instagram.png"></a>
						                <a class ="gmailicon icon"href="https://plus.google.com/share?url=" target="_blank" title="Share on Google+"><img src="<?php echo base_url();?>images/32-googleplus.png"></a>
						                <a class ="gmailicon icon"href="https://plus.google.com/share?url=" target="_blank" title="Share on LinkedIn"><img src="<?php echo base_url();?>images/32-linkedin.png"></a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-7">
									<ul class="indiv-content-nav">
										<li><a class="indiv-nav-selected main-content-regular" href="">Details</a></li>
										<li><a class="main-content-regular" href="">Shipping</a></li>
										<li><a class="main-content-regular" href="">Contact</a></li>
									</ul>
									<div class="indiv-details-content col-md-12">
										<?php echo $desc; ?>
									</div>
								</div>
								<div class="more-items-shop col-md-5">
									<h3>MORE ITEMS FROM THIS SHOP</h3>
									<div class="more-items-container col-md-12">
										<?php foreach($shop_list->result_array() as $shop_items){
											$item_id = $shop_items['id'];
											$item_name = $shop_items['name'];

											foreach($prod_images->result_array() as $image_items){
												if($image_items['fk_ID']==$item_id){
													$img_name = $image_items['img_name'];
													$img_ext = $image_items['ext'];
												?>
												
													<div class="more-items col-md-6"><img src="<?php echo base_url().'uploads/'.$img_name.'.'.$img_ext; ?>"></div>
												
												<?php
												}
											}
										}?>
										<a href="itemsinstore.html"><div class="visit-the-shop col-md-12"><img src="<?php echo base_url();?>images/SHOP.png">VISIT THE SHOP</div></a>
									</div>
								</div>
								<div class="related-links-container col-md-12">
									<!-- <h3>YOU MIGHT ALSO LIKE</h3>
									<div class="border-bottom-gray"></div> -->
									<!-- <ul class="bxslider">
										<li>
											<div class="related-links-photo col-md-12">
												<img src="<?php echo base_url();?>images/might1.png">
												<div class="related-links-details col-md-12">
													<h3 class="main-content-regular">PRODUCT 1</h3>
													<p class="main-content">Store AAA</p>
													<a href="">P 255.00</a>
												</div>
											</div>
										</li>
										<li>
											<div class="related-links-photo col-md-12">
												<img src="<?php echo base_url();?>images/might2.png">
												<div class="related-links-details col-md-12">
													<h3 class="main-content-regular">PRODUCT 1</h3>
													<p class="main-content">Store AAA</p>
													<a href="">P 255.00</a>
												</div>
											</div>
										</li>
										<li>
											<div class="related-links-photo col-md-12">
												<img src="<?php echo base_url();?>images/might3.png">
												<div class="related-links-details col-md-12">
													<h3 class="main-content-regular">PRODUCT 1</h3>
													<p class="main-content">Store AAA</p>
													<a href="">P 255.00</a>
												</div>
											</div>
										</li>
										<li>
											<div class="related-links-photo col-md-12">
												<img src="<?php echo base_url();?>images/might4.png">
												<div class="related-links-details col-md-12">
													<h3 class="main-content-regular">PRODUCT 1</h3>
													<p class="main-content">Store AAA</p>
													<a href="">P 255.00</a>
												</div>
											</div>
										</li>
										<li>
											<div class="related-links-photo col-md-12">
												<img src="<?php echo base_url();?>images/might1.png">
												<div class="related-links-details col-md-12">
													<h3 class="main-content-regular">PRODUCT 1</h3>
													<p class="main-content">Store AAA</p>
													<a href="">P 255.00</a>
												</div>
											</div>
										</li>
										<li>
											<div class="related-links-photo col-md-12">
												<img src="<?php echo base_url();?>images/might2.png">
												<div class="related-links-details col-md-12">
													<h3 class="main-content-regular">PRODUCT 1</h3>
													<p class="main-content">Store AAA</p>
													<a href="">P 255.00</a>
												</div>
											</div>
										</li>
										<li>
											<div class="related-links-photo col-md-12">
												<img src="<?php echo base_url();?>images/might3.png">
												<div class="related-links-details col-md-12">
													<h3 class="main-content-regular">PRODUCT 1</h3>
													<p class="main-content">Store AAA</p>
													<a href="">P 255.00</a>
												</div>
											</div>
										</li>
										<li>
											<div class="related-links-photo col-md-12">
												<img src="<?php echo base_url();?>images/might4.png">
												<div class="related-links-details col-md-12">
													<h3 class="main-content-regular">PRODUCT 1</h3>
													<p class="main-content">Store AAA</p>
													<a href="">P 255.00</a>
												</div>
											</div>
										</li>
									</ul> -->
								</div>
							</div>
						</div>
					</div>
				</div>