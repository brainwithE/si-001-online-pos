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

				<!-- button activator -->
				<div class="header">
				    <div class="navicon"><a id="showLeftPush" class="showLeftPush" href="#"><i class="fa fa-bars"></i></a></div>
				</div>
				<!-- menu list --> 
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
				    <ul>
				    	<li><a href="<?php echo base_url(); ?>" class="menu-title"><i class="fa fa-crosshairs"></i>ADMIN</a></li>				        
				        <!---POS-->
						<li><a href="<?php echo base_url() ?>admin/report-inventory">INVENTORY REPORT</a></li>
						<li><a href="<?php echo base_url() ?>admin/report-sales">SALES REPORT</a></li>
						<li><a href="<?php echo base_url() ?>admin/report-delivery">DELIVERY REPORT</a></li>
						<li><a href="<?php echo base_url() ?>admin/report-pullout">PULLOUT REPORT</a></li>
<<<<<<< HEAD
						<li><a href="<?php echo base_url() ?>admin/delivery-notification">DELIVERY NOTIFICATION</a></li>
=======
						<li><a href="<?php echo base_url() ?>admin/delivery-notification">DELIVERY NOTIFICATION</a></li>					
						<li><a href="<?php echo base_url() ?>admin/report-user">USER LISTS</a></li>					

>>>>>>> authenticate
				    </ul>
				    <a href="<?php echo base_url() ?>admin/create-account">CREATE USERS <i class="fa fa-user"></i></a>
				    <a href="<?php echo base_url() ?>logout" class="logout">LOGOUT <i class="fa fa-sign-out"></i></a>
				    
				</nav>

			<!-- POS PARTS -->
			<a id="showLeftPush" class="action-buttons action-pullout" href="#">+ PULLOUT</a>


			<!-- <div class="modal fade" id="InputPullout" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="col-md-12">

                        <div class="modal-body modal-project">
                          <i class="fa fa-coffee"></i>INPUT PULLOUT
                          <?php echo form_open('admin/pullout-item') ?>
	                        	<input type="field" placeholder="Pullout Item Code" name="item_code" />
	                        	<input type="field" placeholder="Item Quantity" name="item_quantity"/>
	                        	<input type="submit" class="submit-button" value="Submit" />
	                      <?php echo form_close();?>
                        </div>

                      </div>

                    </div>

                </div>
            </div> -->