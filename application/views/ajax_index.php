<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

						<?php if (!isset($ajax_req)): ?>
 
						<div class="show-gallery">
						 
						View only Gallery
						</div>
						 
						 
						<div class="show-images">
						 
						View only Images
						</div>
						 
						 
						<div class="show-articles">
						 
						View only Articles
						</div>
						 
						<?php endif; ?>
						  
						 
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