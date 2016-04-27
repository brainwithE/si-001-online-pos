<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

				<div class="container">
					<div class="shop-nav-buttons tabs">
					<ul>
						<li><a class="border-blue-fixed color">UPLOAD PHOTO</a></li>
						<li><a class="color">PRODUCT/ITEM DETAILS</a></li>
						<li><a class="color">ADDITIONAL INFORMATION</a></li>
					</ul>
					</div>
					<div class="col-md-12">
						<form action="<?php echo site_url('/dropzone/upload'); ?>" class="dropzone">
							<div class="text-body" style="background-color:#e2e2e2;">

								

							</div>
							<button class="add-item">ADD ITEM</button>
						</form>
					</div>
					<div class="col-md-12">
								<h2>UPLOADED PHOTOS</h2>
									<?php
									$query = $this->db->get('uploads');


									foreach($query->result_array() as $row) 
									{
										$name = $row['img_name'];
										$ext = $row['ext'];
									?>
									<div class="col-md-4">
										<div class="col-md-6 show-borders dyna_img">
											<img class='img_path' src="<?php echo base_url().'uploads/'.$name.'.'.$ext?>">
										</div>
										<div class="col-md-6 gender-list">
											<textarea rows="7" cols="22"> Insert caption</textarea>
										</div>
									</div>
									<?php	
									}
									?>
							</div>

				</div>
			</div>
