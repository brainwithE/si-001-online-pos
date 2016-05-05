<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- insert ponpon about content -->
			

				<div class="container">

					<!--The overwatch Main element Container or MEC-->
					<div class="overwatch-mec mec-income">
						<div class="col-xs-12">
							<!-- FILTER FUNCTION

							<div class="row">
								<?php
									//echo form_open('filter-income');							
								?>
								<input type="text" id="datepickerstart" class="datepicker" placeholder="Start Date" name="filter_start_date">
								<input type="text" id="datepickerend" class="datepicker" placeholder="End Date" name="filter_end_date">
								<?php
									//echo form_submit(array('name'=>'submit','value'=>'FILTER','class'=>'call-links'));
									//echo form_close();
								?>
							</div> -->

							<div class="row table-title table-title-general table-title-income">
								<div class="col-xs-2">Item Code</div>
								<div class="col-xs-2">Item Supplier</div>
								<div class="col-xs-4">Item Name</div>
								<div class="col-xs-2">Price</div>
								<div class="col-xs-2">Stock on Hand</div>	
							</div>
							
						</div>

						<?php if (!isset($ajax_req)): ?>

						<div class="col-xs-2"><input type="text" name="name" id="name" /></div>
 
						<div class="show-gallery">
						 
						View only Gallery
						</div>
						 
						 
						<div class="show-images">
						 
						View only Images
						</div>
						 
						 
						<div class="show-articles">
						 
						View only Articles
						</div>

						<div id="ajax-content-container">
						 
						<table class="table table-bordered table-condensed table-striped">
						 
						<tr>
						 
						<th>Title</th>
						 
						 
						<th>Type</th>
						 
						    </tr>
						 
						    <?php foreach ($node_list as $key=>$value): ?>
						 
						<tr>
						 
						<td><?php print $value->user_id; ?></td>
						 
						 
						<td width="10%"><?php print ucfirst($value->user_username); ?></td>
						 
						      </tr>
						 
						    <?php endforeach; ?>
						  </table>
						 
						</div>
						 
						<?php endif; ?>

						<script type="text/javascript">
							$(document).ready(function () {
							  ajax_articles();
							  ajax_images();
							  ajax_gallery();
							  ajax_suggest();
							});

							function ajax_suggest(){
								$('#name').on('input', function() {
									var username = $('#name').val();
							    	$.ajax({
								      url: "suggest-more-data",
								      async: false,
								      type: "GET",
								      data: "type="+username,
								      dataType: "html",
								      success: function(data) {
								        $('#ajax-content-container').html(data);
								      }
								    })
								});
							}
							
							  
							function ajax_articles() {
							  $('.show-articles').click(function () {
							    $.ajax({
							      url: "give-more-data",
							      async: false,
							      type: "POST",
							      data: "type=1",
							      dataType: "html",
							      success: function(data) {
							        $('#ajax-content-container').html(data);
							      }
							    })
							  });
							    
							}
							  
							function ajax_images() {
							  $('.show-images').click(function () {
							    $.ajax({
							      url: "give-more-data",
							      async: false,
							      type: "POST",
							      data: "type=2",
							      dataType: "html",
							      success: function(data) {
							        $('#ajax-content-container').fadeIn().html(data);
							      }
							    })
							  });
							}
							  
							function ajax_gallery() {
							  $('.show-gallery').click(function () {
							    $.ajax({
							      url: "give-more-data",
							      async: false,
							      type: "POST",
							      data: "type=3",
							      dataType: "html",
							      success: function(data) {
							        $('#ajax-content-container').html(data);
							      }
							    })
							  });
							}
						</script>
						  
					</div><!-- MEC end -->

				</div>