<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div class="container">
		<div class="banner-image margin-top col-md-12" style="margin-bottom: 50px;">
							<img src="<?php echo base_url();?>images/header_store.png"/> 
		</div>
		<div class="row">
			<?php $this->load->view('cart/cart'); ?>
		</div>
		<div class="row">

		<?php foreach($products as $p) : ?>

						<div class="item-posts col-md-4">
							<div class="post-photo col-md-12"><img src="<?php echo base_url();?>images/<?php echo $p['image'] ?>"></div>
							<div class="products post-content col-md-12">
								<div class="item-category"><h2><?php echo $p['name']; ?></h2></div>
								<p class="category-details"><?php echo $p['price'] ?></p>
								
								<?php echo form_open('cart/add_cart_item');?>
								<fieldset>

								<label>Quantity</label>
								<?php echo form_input('quantity', '1', 'maxlength="2"'); ?>
								<?php echo form_hidden('product_id', $p['id']); ?>
								<?php 
									$attributes = array('class' => 'call-links','value' => "ADD");
								echo form_submit('add','Add'); ?>
								<!-- <a class="call-links" href="#">ADD TO CART</a> -->
							
								</fieldset>
								<?php echo form_close(); ?>

							</div>
						</div>

		<?php endforeach; ?>
					
		</div>				
	</div>