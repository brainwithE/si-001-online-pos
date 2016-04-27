<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	

				<?php /*foreach($product->result_array() as $prod_item){
					$p_id = $prod_item['id'];
					$name = $prod_item['name'];
					$price = $prod_item['price'];
					$qty = $prod_item['quantity'];
					$desc = $prod_item['desc'];
				}*/?>

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
						
					</div>
				</div>