<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- insert ponpon about content -->
			
				
				<div class="container">
					<div class="row">
						<div class="featured-image col-md-12">
							<img src="<?php  echo base_url();?>images/slider_sample.png"/> <!--ponpon -->
							<a class="shop-now-button" href="#">
								<div class="border-white">
									SHOP NOW >
								</div>
							</a>
						</div>
					</div>
				</div>
				


				<div class="container">
					<div class="must-see-items-border"></div>
					<div class="must-see-items">
						<h1>SEARCH RESULT FOR <i> <?php echo $match?> </i>	</h1>
					</div>
				</div>
				
				<div class="container">
				
						<?php
							foreach($query->result_array() as $row){
								$id = $row['id'];
								$name = $row['name'];
								$type = $row['table_type'];
						?>
						
						
						
						<div class="item-posts search-post">
							
							<div class="post-photo search-photo col-xs-1">
								<?php
									
									if($type=='1'){									
										foreach($prod_img_query->result_array() as $prod_img_row){

											if($id == $prod_img_row['fk_ID']){
											$img_name = $prod_img_row['img_name'];
											$img_ext = $prod_img_row['ext'];
											?>
												<img src="<?php echo base_url().'uploads/'.$img_name.'.'.$img_ext; ?>">
											<?php
											}
										}
									} else if($type=='2') {
										?><img src="<?php echo base_url();?>images/shop1.png"><?php
									}
									
								?>
							</div>
							<div class="post-content col-xs-11">
								<?php
									if($type=='1'){											
										echo form_open('individual-item');
										echo form_hidden('prodid', $row['id']);
										echo form_hidden('shopid', $row['shop_id']);								
										echo form_submit(array('name'=>'submit','value'=>'VIEW DETAILS','class'=>'call-links'));
										echo form_close();
									} else if($type=='2'){
										echo form_open('individual-store');
										echo form_hidden('shopid', $row['id']);
										echo form_submit(array('name'=>'submit','value'=>'VIEW DETAILS','class'=>'call-links')); 
										echo form_close();
									}
									echo form_open('add-cart');									
									echo form_submit(array('name'=>'submit','value'=>'ADD TO CART','class'=>'call-links add-cart')); 
									echo form_close();
								?>	
								<div class="item-category left-align">
									<h2><?php echo $name; ?></h2>
									
									<div class='search-identity search-type-<?php echo $type?>'>										
										<?php  
										if($type=='1'){											
											echo 'product';											
										} else if($type=='2'){
											echo 'shop';
										}
										?>
									</div>
								</div>		
								
							</div>
							
						</div>						
						<?php 
						} 
						?>
					
				</div>
				
			</div>