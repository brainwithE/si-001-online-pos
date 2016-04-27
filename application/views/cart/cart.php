<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	

	<div class="page-down">
		<div class="container">
			<div class="col-md-12">


				<?php if(!$this->cart->contents()): 
					echo 'You don\'t have anything in your cart';

					else:
				?>

				<p class="cart-count"><b><?php $cart_rows = count($this->cart->contents()); echo $cart_rows; ?> items</b> in your shopping cart</p>

				<?php echo form_open('cart/update_cart'); ?>

					<div class="col-md-8">
						<div class="row cart-table-rows cart-table-title">Items</div>

						<?php $i = 1; $cart_items = 0; //keep track of amount of loops and product in the cart?>
						<?php foreach($this->cart->contents() as $items) : ?>
							
							<div class="row cart-table-rows cart-table-items <?php if($i&1){ echo 'alt'; } ?>">
								<?php echo form_hidden('rowid[]', $items['rowid']); ?>
								<div class="col-md-8"><?php echo $items['name']; ?></div>
								<div class="col-md-4">
									<div class="col-md-6">
										<div class="row">Quantity: </div>
										<div class="row">Price: </div>
										<div class="row">Subtotal: </div>
									</div>
									<div class="col-md-6">
										<div class="row"><?php echo form_input(array('name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></div>
										<div class="row"><?php echo $this->cart->format_number($items['price']); ?></div>
										<div class="row"><?php echo $this->cart->format_number($items['subtotal']); ?></div>
									</div>
								</div>
							</div>
							<?php $i++; $cart_items ++; //increment sequence for every product?>
						<?php endforeach; ?>
					</div>

					<!-- <div class="row">
						<div class="col-md-3">Qty</div>
						<div class="col-md-3">Item Description</div>
						<div class="col-md-3">Item Price</div>
						<div class="col-md-3">Subtotal</div>
					</div>

					<?php $i = 1; $cart_items = 0; //keep track of amount of loops and product in the cart?>

					<?php foreach($this->cart->contents() as $items) : ?>
						<div class="row <?php if($i&1){ echo 'alt'; } ?>">
							<?php echo form_hidden('rowid[]', $items['rowid']); ?>
							<div class="col-md-3"><?php echo form_input(array('name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></div>
							<div class="col-md-3"><?php echo $items['name']; ?></div>
							<div class="col-md-3">Php <?php echo $this->cart->format_number($items['price']); ?></div>
				            <div class="col-md-3">Php <?php echo $this->cart->format_number($items['subtotal']); ?></div>
						</div>
						<?php $i++; $cart_items ++; //increment sequence for every product?>
					<?php endforeach; ?> -->

					<div class="col-md-4 cart-sidebar">
						<div class="col-md-12"><b>Purchase Total: </b></div>
						<div class="col-md-12">P <?php echo $this->cart->format_number($this->cart->total()); ?></div>

						<p><?php 
						echo form_submit('', 'Update your Cart'); 
						echo anchor('cart/empty_cart', 'Empty Cart', 'class="empty"'); 
						echo anchor('process', 'Pay thru Paypal', 'class="empty"');
						?></p>
					</div>

				<?php echo form_close(); 
					  endif;
				?>
					
			</div>		
		</div>
	</div>				
	