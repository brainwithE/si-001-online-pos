<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- insert ponpon about content -->
			

				<div class="container">
					<div class="row">
						<div class="featured-image col-md-12">
							<img src="<?php echo base_url();?>images/slider_sample.png"/> <!--ponpon -->
							<a class="shop-now-button" href="all-products">
								<div class="border-white">
									SHOP NOW >
								</div>
							</a>
						</div>
					</div>
				</div>

				<!-- <div class="container about-header">
					<div class="about-header">
							<?php print_r($_SESSION)?>
							<h2>ABOUT</h2>
							<h2><span>TENS</span> MARKETPLACE</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et justo euismod, commodo justo sit amet, auctor leo. Vivamus laoreet nibh eu ante sodales, sed mattis arcu pellentesque. Sed finibus nec dui auctor rutrum. Pellentesque venenatis, orci sit amet aliquam dapibus, neque magna mattis justo, id varius augue sem eget dui. Praesent orci metus, porta suscipit suscipit vel, varius vitae massa. Maecenas at velit nunc.</p>
					</div>
				</div> -->


				<div class="container">
					<div class="must-see-items-border"></div>
					<div class="must-see-items">
						<h1>MUST-SEE</h1>
						<h1><span>ITEMS</span></h1>
					</div>
				</div>

				<div class="container">
					<div class="row">

						<?php foreach($products->result_array() as $row2){ ?>
						<div class="item-posts col-md-4">
							<?php echo form_open('individual-item') ?>
							<?php echo form_hidden('prodid', $row2['id']); ?>
							<?php echo form_hidden('shopid', $row2['shop_id']); ?>
							<div class="post-photo col-md-12">
							<?php
								foreach($images->result_array() as $img_row){
									if($row2['id'] == $img_row['fk_ID']){
										$img_name = $img_row['img_name'];
										$img_ext = $img_row['ext'];
									?>
										<img src="<?php echo base_url().'uploads/'.$img_name.'.'.$img_ext; ?>">
									<?php
									}
								}
							?>

							</div>
							<div class="post-content col-md-12">
								<div class="item-category"><h2><?php echo $row2['name']; ?></h2></div>
								<p class="category-details">Php <?php echo $row2['price']; ?>.00</p>
								<?php echo form_submit(array('name'=>'submit','value'=>'VIEW DETAILS','class'=>'call-links')); ?>
							</div>
							<?php echo form_close();?>
						</div>
						<?php } ?>

					</div>
					<div class="view-all col-md-12">
						<a class="call-links-gray" href="#">ALL ITEMS</a>
					</div>
				</div>

				<div class="container">
					<div class="must-see-items-border"></div>
					<div class="must-see-items">
						<h1>MUST-VISIT</h1>
						<h1><span>STORES</span></h1>
					</div>
				</div>

				<div class="container">
					<div class="row">
						<ul class="bxslider">
							<?php
								$query = $this->db->get('users');
								foreach($query->result_array() as $row)
								{
									$fullname = $row['fullname'];
							?>
							<li>
								<div class="all-store-posts item-slider-margin">
									<div class="all-store-photo col-md-12"><img src="<?php echo base_url();?>images/shop1.png"></div>
									<div class="post-content col-md-12">
										<div class="item-category"><h2>LAMER COLLECTIONS</h2></div>
										<p class="category-details"><?php echo $fullname ?></p>
										<p class="category-details">WATCHES</p>
										<?php echo form_open('individual-store') ?>
										<?php echo form_hidden('prodid', $row['id']); ?>
										<?php echo form_hidden('shopid', $row['shop_id']); ?>
										<?php echo form_submit(array('name'=>'submit','value'=>'SHOP NOW','class'=>'call-links')); ?>
										<?php echo form_close();?>
									</div>
								</div>
							</li>
							<?php } ?>
							
						</ul>
						<div class="view-all col-md-12">
							<a class="call-links-gray margin-top" href="#">ALL ITEMS</a>
						</div>
					</div>
				</div>
			</div>