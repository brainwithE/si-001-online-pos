<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

				<div class="container">							

					<div class="main col-md-12 add-item-background">

							<div class="must-see-items">
								<h1 class="main-title">ADD PRODUCT</h1>
							</div>
							<div class="must-see-items-border-bottom"></div>

							<div class="row">
								<?php echo form_open('add-product-dets') ?>
								<table class="product_table">
									<legend> Product Details </legend>
									<tr style="padding-bottom: 10px;">
										<td><p> <b>Product Name:</b></p></td>
										<td class="fields-col">
											<?php  $data = array(
										      'name'        => 'product_name',
										      'style'       => 'width:65%; margin-left: 30px;',
										    ); ?>
											<?php echo form_input($data) ?>
										</td>
									</tr>
									<tr style="padding-bottom: 10px;">
										<td><p> <b>Quantity:</b></p></td>
										<td class="fields-col">
											<?php  $data = array(
										      'name'        => 'qty',
										      'style'       => 'width:65%; margin-left: 30px;',
										    ); ?>
											<?php echo form_input($data) ?></td>
									</tr>
									<tr style="padding-bottom: 10px;">
										<td><p> <b>Price:</b></p></td>
										<td class="fields-col">
											<?php  $data = array(
										      'name'        => 'price',
										      'style'       => 'width:65%; margin-left: 30px;',
										    ); ?>
											<?php echo form_input($data) ?>
										</td>
									</tr>
									<tr style="padding-bottom: 10px;">
										<td><p> <b>Description:</b></p></td>
									<?php  $data = array(
									      'name'        => 'desc',
									      'rows'        => '5',
									      'cols'        => '60',
									      'style'       => 'width:65%; margin-left: 30px;',
									    ); ?>
										<td class="fields-col"><?php echo form_textarea($data) ?></td>
									</tr>
									<tr>
										<td><p> <b>Category: </b></p></td>
										<td class="fields-col" style="padding-left: 30px;">
											<?php if(isset($category)): ?>
											<?php		
												$i=0;									
												$len = count($category->result_array());
												$divider = " | ";
												foreach($category->result_array() as $row){	
													if ($i == $len - 1) {
	  													$divider = " ";
												    } 																						    								
													echo "<input name=\"category[]\" type=\"checkbox\" value=\"{$row['id']}\"/> " .$row['name'] ." ";
													$i++;
												}
											?>							
											<?php endif; ?>										
										</td>									
									</tr>								
									<tr>
										<td><?php echo form_submit('submit','Submit'); ?></td>	
									</tr>
									<?php echo form_close();?>
								</table>
								
							</div>
					</div>

				</div>

			