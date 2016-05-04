<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

	<head>
		<title>Villalifestyle Boutique</title>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style.css">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		
		<!-- FOR ACCORDION CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/accordion.css">

		<!-- FOR DROPZONE CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dropzone-master/dist/min/dropzone.min.css"  />

		<!-- FOR SLIDER -->
		<link rel="stylesheet" href="<?php echo base_url();?>components/jquery.bxslider/jquery.bxslider.css">
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/default.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/slider-component.css" />

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	</head>

	<body class="cbp-spmenu-push">
		<div id="wrapper">
			<div id="content">

	
				<!--<img class="img-responsive" src="images/banner.png" />-->

				<!-- button activator -->
				<div class="header">
				    <div class="navicon"><a id="showLeftPush" class="showLeftPush" href="#"><i class="fa fa-bars"></i></a></div>
				</div>

				<!-- menu list --> 
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
				    <ul>
				    	<li><a href="<?php echo base_url(); ?>" class="menu-title"><i class="fa fa-crosshairs"></i>ONLINE POS SYSTEM: SALES ACCOUNT</a></li>				        
				        <!---POS-->						
						<li><a href="<?php echo base_url() ?>cashier">SALES REPORT</a></li>
						
				    </ul>
				</nav>



			<!-- POS PARTS -->

            <div style="position: fixed; border:1px solid black; right: 23%" class="">
				<div class="navicon"><a id="showLeftPush" class="showLeftPush" href="add-sales">ADD SALES</a></div>
			</div>			

			<div class="modal fade" id="InputSaleTransact" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">

                      <div class="col-md-12">

                        <div class="modal-body modal-project">
                          <i class="fa fa-coffee"></i>INPUT SALES ITEM
                          <?php echo form_open('add-sales') ?>
	                        	<input type="field" placeholder="Item Code" name="item_code" />
	                        	<input type="field" placeholder="Item Quantity" name="item_quantity"/>
	                        	<!-- <select name="item_category">
	                        		<option>Blouse</option>
	                        		<option>Crop Top</option>
	                        		<option>Dress</option>
	                        		<option>Pants</option>
	                        		<option>Shorts</option>
	                        		<option>Sleeveless Top</option>
	                        		<option>Tee</option>

	                        	</select> -->	                        	
	                        	<input type="submit" class="submit-button" value="Submit" />
	                      <?php echo form_close();?>
                        </div>

                      </div>

                    </div>

                </div>
            </div>
            