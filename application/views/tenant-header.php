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
				    	<li><a href="<?php echo base_url(); ?>" class="menu-title"><i class="fa fa-crosshairs"></i>TENANT</a></li>				        
				        <!---POS-->
						<li><a href="<?php echo base_url() ?>tenant/report-inventory">INVENTORY REPORT</a></li>
						<li><a href="<?php echo base_url() ?>tenant/report-sales">SALES REPORT</a></li>
						<li><a href="<?php echo base_url() ?>tenant/report-delivery">DELIVERY REPORT</a></li>
						<li><a href="<?php echo base_url() ?>tenant/report-pullout">PULLOUT REPORT</a></li>

				    </ul>
				    <a href="<?php echo base_url() ?>logout" class="logout">LOGOUT <i class="fa fa-sign-out"></i></a>
				</nav>



			<!-- POS PARTS -->
			<a id="showLeftPush" class="action-buttons action-additem" href="#" data-toggle="modal" data-target="#InputItems">+ ITEMS</a>
			<a id="showLeftPush" class="action-buttons action-adddel" href="<?php echo base_url() ?>add-delivery">+ DELIVERY</a>

			<div class="modal fade" id="InputItems" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">

                      <div class="col-md-12">

                        <div class="modal-body modal-project">
                          <i class="fa fa-coffee"></i>INPUT NEW ITEM
                          <?php echo form_open('add-items') ?>
	                        	<input type="field" placeholder="Item Name" name="item_name" />
	                        	<input type="field" placeholder="Price" name="item_price"/>
	                        	<input type="field" placeholder="Category" name="item_category"/>
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