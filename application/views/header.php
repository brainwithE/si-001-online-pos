<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

	<head>
		<title>Overwatch Systems Protocol</title>

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
				    	<li><a href="<?php echo base_url(); ?>" class="menu-title"><i class="fa fa-crosshairs"></i>OVERWATCH SYSTEM</a></li>
				        <li><a href="<?php echo base_url() ?>income-view">INCOME</a></li>
				        <li><a href="<?php echo base_url() ?>expense-view">EXPENSES</a></li>
				        <li><a href="<?php echo base_url() ?>withdrawal-view">WITHDRAWALS</a></li>
				        <li><a href="<?php echo base_url() ?>reporting-view">REPORTING</a></li>
				        <li><a href="<?php echo base_url() ?>project-view">PROJECTS</a></li>

				        <!---POS-->
						<li><a href="<?php echo base_url() ?>report-item">ITEMS</a></li>
						<li><a href="<?php echo base_url() ?>report-sales">SALES</a></li>
						<li><a href="<?php echo base_url() ?>report-delivery">DELIVERY</a></li>
						<li><a href="<?php echo base_url() ?>report-pullout">PULLOUT</a></li>

				    </ul>
				</nav>

				<div class="add-withdrawal" data-toggle="modal" data-target="#InputWithdrawal">
				    <div class="navicon"><a id="showLeftPush" class="showLeftPush" href="#"><i class="fa fa-money"></i></a></div>
				</div>

				<div class="modal fade" id="InputWithdrawal" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">

                      <div class="col-md-12">

                        <div class="modal-body modal-withdrawal">
                          <i class="fa fa-money"></i>INPUT NEW WITHDRAWAL
                          <?php echo form_open('add-withdrawal') ?>
	                        	<input type="field" placeholder="Amount" name="withdrawal_amount"/>
	                        	<input type="field" placeholder="Name" name="withdrawal_name" />
	                        	<input type="text" id="datepickerwithdrawal" class="datepicker" placeholder="Date" name="withdrawal_date_acquired">
	                        	<input type="submit" class="submit-button" value="WITHDRAW" />
	                      <?php echo form_close();?>
                        </div>

                      </div>

                    </div>

                  </div>
                </div>

                <div class="add-expenses" data-toggle="modal" data-target="#InputExpense">
				    <div class="navicon"><a id="showLeftPush" class="showLeftPush" href="#"><i class="fa fa-shopping-cart"></i></a></div>
				</div>

				<div class="modal fade" id="InputExpense" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">

                      <div class="col-md-12">

                        <div class="modal-body modal-expense">
                          <i class="fa fa-shopping-cart"></i>INPUT NEW EXPENSE
                          	<?php echo form_open('add-expense') ?>
	                        	<input type="field" placeholder="Amount" name="expense_amount"/>
	                        	<input type="field" placeholder="Name" name="expense_name" />
	                        	<input type="field" placeholder="Category" name="expense_category" />
	                        	<input type="text" id="datepickerexpense" class="datepicker" placeholder="Date" name="expense_date_acquired">
	                        	<input type="submit" class="submit-button" value="PAY" />
	                      	<?php echo form_close();?>
                        </div>

                      </div>

                    </div>

                  </div>
                </div>

				<div class="add-income" data-toggle="modal" data-target="#InputIncome">
				    <div class="navicon"><a id="showLeftPush" class="showLeftPush" href="#"><i class="fa fa-angle-double-up"></i></a></div>
				</div>

				<div class="modal fade" id="InputIncome" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">

                      <div class="col-md-12">

                        <div class="modal-body modal-income">
                          <i class="fa fa-angle-double-up"></i>INPUT NEW INCOME
                          <?php echo form_open('add-income') ?>
	                        	<input type="field" placeholder="Amount" name="income_amount"/>
	                        	<input type="field" placeholder="Name" name="income_name" />
	                        	<input type="text" id="datepickerincome" class="datepicker" placeholder="Date" name="income_date_acquired">
	                        	<input type="submit" class="submit-button" value="EARN" />
	                      <?php echo form_close();?>
                        </div>

                      </div>

                    </div>

                  </div>
                </div>


            <div class="add-project" data-toggle="modal" data-target="#InputProject">
				<div class="navicon"><a id="showLeftPush" class="showLeftPush" href="#"><i class="fa fa-coffee"></i></a></div>
			</div>

			<div class="modal fade" id="InputProject" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">

                      <div class="col-md-12">

                        <div class="modal-body modal-project">
                          <i class="fa fa-coffee"></i>INPUT NEW PROJECT
                          <?php echo form_open('add-project') ?>
	                        	<input type="field" placeholder="Project Name" name="project_name" />
	                        	<input type="text" id="datepickerproject" class="datepicker" placeholder="Deadline" name="project_deadline">
	                        	<input type="field" placeholder="Personnel (separated by ,)" name="project_personnel"/>
	                        	<input type="field" placeholder="Budget" name="project_budget"/>
	                        	<input type="submit" class="submit-button" value="START" />
	                      <?php echo form_close();?>
                        </div>

                      </div>

                    </div>

                </div>
            </div>


			<!-- POS PARTS -->

            <div style="position: fixed; border:1px solid black; right: 17%"class="" data-toggle="modal" data-target="#InputItems">
				<div class="navicon"><a id="showLeftPush" class="showLeftPush" href="#">ADD ITEMS</a></div>
			</div>			

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
	                        	<input type="hidden" name="item_id"/>
	                        	<input type="hidden" name="item_supplier"/>
	                        	<input type="submit" class="submit-button" value="Submit" />
	                      <?php echo form_close();?>
                        </div>

                      </div>

                    </div>

                </div>
            </div>


            <div style="position: fixed; border:1px solid black; right: 23%"class="" data-toggle="modal" data-target="#InputSaleTransact">
				<div class="navicon"><a id="showLeftPush" class="showLeftPush" href="#">ADD SALES</a></div>
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
            <div style="position: fixed; border:1px solid black; right: 29%"class="" data-toggle="modal" 
				<div class="navicon"><a id="showLeftPush" class="showLeftPush" href="delivery-transaction">ADD DELIVERY</a></div>
			</div>



			<div class="modal fade" id="InputDelivery" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">

                      <div class="col-md-12">

                        <div class="modal-body modal-project">
                          <i class="fa fa-coffee"></i>DELIVERY ITEM REQUEST
                          <?php echo form_open('add-item-delivery') ?>
	                        	<input type="field" placeholder="Delivery Item Code" name="item_code" />
	                        	<input type="field" placeholder="Item Quantity" name="item_quantity"/>
	                        	<input type="submit" class="submit-button" value="Submit" />
	                      <?php echo form_close();?>
                        </div>

                      </div>

                    </div>

                </div>
            </div>


            <div style="position: fixed; border:1px solid black; right: 29%"class="" data-toggle="modal" data-target="#InputPullout">
				<div class="navicon"><a id="showLeftPush" class="showLeftPush" href="#">ADD PULLOUT</a></div>
			</div>			

			<div class="modal fade" id="InputPullout" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">

                      <div class="col-md-12">

                        <div class="modal-body modal-project">
                          <i class="fa fa-coffee"></i>INPUT PULLOUT
                          <?php echo form_open('pullout-item') ?>
	                        	<input type="field" placeholder="Pullout Item Code" name="item_code" />
	                        	<input type="field" placeholder="Item Quantity" name="item_quantity"/>
	                        	<input type="submit" class="submit-button" value="Submit" />
	                      <?php echo form_close();?>
                        </div>

                      </div>

                    </div>

                </div>
            </div>