<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<html>

	<head>
		<title>Tens Marketplace</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>bootstrap-3.3.4-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>bootstrap-3.3.4-dist/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>bootstrap-3.3.4-dist/js/bootstrap.min.js">
		<!-- FOR SLIDER -->
		<link rel="stylesheet" href="components/jquery.bxslider/jquery.bxslider.css">
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href=" css/default.css" />
		<link rel="stylesheet" type="text/css" href=" css/slider-component.css" />
	</head>

	<body>

		<div id="wrapper">
			<header>
				 <div class="row">
        			<div class="container">
        				<ul class="main-nav">
        					<li><a href="#openSignUp">SIGN UP</a></li>
        					<div id="openSignUp" class="modalDialog">
        						<div>
        							<div class="row modal-head-bar">
        								<div class="col-md-6"><p class="modal-head-text">CREATE ACCOUNT</p></div>
        								<div class="col-md-6"><a href="#close" title="Close" class="close-btn">X</a></div>
        							</div>
        							<div class="row modal-contents">
        								<p class="modal-contents-text">Facebook</p>
        								<button class="btn btn-block btn-primary modal-button-1">Sign in with Facebook</button>
        								<p class="modal-contents-text">Or</p>
        								<?php echo validation_errors(); ?>
										<?php echo form_open('Signup/validate/#openSignUp'); ?>
        								<input class="show form-control modal-content-form" type="text" placeholder="Full Name" name="fullname" required />
        								<input class="show form-control modal-content-form" type="email" placeholder="E-mail address" name="email" required />
        								<input class="show form-control modal-content-form" type="password" placeholder="Password" name="password" required />
        								<div class="modal-content-bottom">
        									<button class="btn btn-primary modal-button-2">SIGN UP</button>
        									<p>Already have an account? SIGN IN</p>
        								</div>
										<?php echo form_close(); ?>

        							</div>
    							</div>      
        					</div>
        					<li><a href="#openLogin">LOGIN</a></li>
        					<div id="openLogin" class="modalDialog">
        						<div>
        							<div class="row modal-head-bar">
        								<div class="col-md-6"><p class="modal-head-text">SIGN IN</p></div>
        								<div class="col-md-6"><a href="#close" title="Close" class="close-btn">X</a></div>
        							</div>
        							<div class="row modal-contents">
        								<p class="modal-contents-text">Facebook</p>
        								<button class="btn btn-block btn-primary modal-button-1 " href="http://signup-tens-market.esy.es/index.php/Signup/facebook">Sign in with Facebook</button>
        								<p class="modal-contents-text">Or</p>
        								<?php 
										//sign up success notification
										if($this->session->userdata('email')): ?>
										Sign Up Successful! You can now login.
										<?php endif; ?>
										<?php $this->session->unset_userdata('email');?>
										
										<?php 
										//login error message
										if($this->session->userdata('login_message')): ?>
										<?php echo $this->session->userdata('login_message')?>
										<?php endif; ?>
										<?php $this->session->unset_userdata('login_message');?>
										<?php echo form_open('Signup/check_login/#openLogin')?>
        								<input class="show form-control modal-content-form" type="email" placeholder="E-mail address" name="email">
        								<input class="show form-control modal-content-form" type="password" placeholder="Password" name="password">
        								<input class="modal-radio" type="radio"><p class="modal-content-keep">Keep me signed in</p>
        								<p class="modal-content-forgot">Forgot Password?</p>
        								<div class="modal-content-bottom">
        									<button class="btn btn-primary modal-button-2">SIGN IN</button>
        									<p>Not yet a member? SIGN UP</p>
        								</div>
        								<?php echo form_close(); ?>
        							</div>
    							</div>      
        					</div>
        					<a href="sign-up-openshop.html"><li><button type="button">OPEN A SHOP</button></li></a>
						</ul>
					</div>
				</div>
				<div class="row header-fixed">
					<div class="container">
						<div class="col-md-12">
							<div class="header-brand">
								<a href="#"><img src="<?php echo base_url();?>images/LOGO.png"></a>
							</div>
							<div id="cbp-hrmenu" class="cbp-hrmenu gender-list-container hidden-xs">
								<ul class="gender-list">
									<li>
										<a href="">WOMEN</a>
										<div class="cbp-hrsub">
											<div class="cbp-hrsub-inner"> 
												<div class="container">
													<div class="col-md-6">
														<div class="col-md-12">
															<h4>Popular Shops</h4>
														</div>	
														<div class="col-md-6">
															<ul class="hrmenu-lists">
																<li><a href="itemsinstore.html">Bench</a></li>
																<li><a href="itemsinstore.html">Penshoppe</a></li>
																<li><a href="itemsinstore.html">Zara</a></li>
																<li><a href="itemsinstore.html">Lee</a></li>
																<li><a href="itemsinstore.html">Etude</a></li>
																<li><a href="itemsinstore.html">American Blvd</a></li>
															</ul>
														</div>
														<div class="col-md-6">
															<ul class="hrmenu-lists">
																<li><a href="itemsinstore.html">Bench</a></li>
																<li><a href="itemsinstore.html">Penshoppe</a></li>
																<li><a href="itemsinstore.html">Zara</a></li>
																<li><a href="itemsinstore.html">Lee</a></li>
																<li><a href="itemsinstore.html">Etude</a></li>
																<li><a href="itemsinstore.html">American Blvd</a></li>
															</ul>
														</div>
													</div>
													<div class="col-md-1">
														<div class="hrmenu-lists-bar"></div>
													</div>
													<div class="col-md-5">
														<div class="col-md-12">
															<h4>Collections</h4>
														</div>	
														<div class="col-md-6">
															<ul class="hrmenu-lists">
																<li><a href="#">New Arrivals</a></li>
																<li><a href="#">Clothings</a></li>
																<li><a href="#">Bags</a></li>
																<li><a href="#">Shoes</a></li>
																<li><a href="#">Accessories</a></li>
																<li><a href="#">Sale</a></li>
															</ul>
														</div>
														<div class="col-md-6">
														</div>
													</div>
												</div>
											</div><!-- /cbp-hrsub-inner -->
										</div><!-- /cbp-hrsub -->
									</li>
									<li>
										<a href="">MEN</a>
										<div class="cbp-hrsub">
											<div class="cbp-hrsub-inner"> 
												<div class="container">
													<div class="col-md-6">
														<div class="col-md-12">
															<h4>Popular Shops</h4>
														</div>	
														<div class="col-md-6">
															<ul class="hrmenu-lists">
																<li><a href="#">Bench</a></li>
																<li><a href="#">Penshoppe</a></li>
																<li><a href="#">Zara</a></li>
																<li><a href="#">Lee</a></li>
																<li><a href="#">Etude</a></li>
																<li><a href="#">American Blvd</a></li>
															</ul>
														</div>
														<div class="col-md-6">
															<ul class="hrmenu-lists">
																<li><a href="#">Bench</a></li>
																<li><a href="#">Penshoppe</a></li>
																<li><a href="#">Zara</a></li>
																<li><a href="#">Lee</a></li>
																<li><a href="#">Etude</a></li>
																<li><a href="#">American Blvd</a></li>
															</ul>
														</div>
													</div>
													<div class="col-md-1">
														<div class="hrmenu-lists-bar"></div>
													</div>
													<div class="col-md-5">
														<div class="col-md-12">
															<h4>Collections</h4>
														</div>	
														<div class="col-md-6">
															<ul class="hrmenu-lists">
																<li><a href="#">New Arrivals</a></li>
																<li><a href="#">Clothings</a></li>
																<li><a href="#">Bags</a></li>
																<li><a href="#">Shoes</a></li>
																<li><a href="#">Accessories</a></li>
																<li><a href="#">Sale</a></li>
															</ul>
														</div>
														<div class="col-md-6">
														</div>
													</div>
												</div>
											</div><!-- /cbp-hrsub-inner -->
										</div><!-- /cbp-hrsub -->
									</li>
									<li>
										<a href="">KIDS</a>
										<div class="cbp-hrsub">
											<div class="cbp-hrsub-inner"> 
												<div class="container">
													<div class="col-md-6">
														<div class="col-md-12">
															<h4>Popular Shops</h4>
														</div>	
														<div class="col-md-6">
															<ul class="hrmenu-lists">
																<li><a href="#">Bench</a></li>
																<li><a href="#">Penshoppe</a></li>
																<li><a href="#">Zara</a></li>
																<li><a href="#">Lee</a></li>
																<li><a href="#">Etude</a></li>
																<li><a href="#">American Blvd</a></li>
															</ul>
														</div>
														<div class="col-md-6">
															<ul class="hrmenu-lists">
																<li><a href="#">Bench</a></li>
																<li><a href="#">Penshoppe</a></li>
																<li><a href="#">Zara</a></li>
																<li><a href="#">Lee</a></li>
																<li><a href="#">Etude</a></li>
																<li><a href="#">American Blvd</a></li>
															</ul>
														</div>
													</div>
													<div class="col-md-1">
														<div class="hrmenu-lists-bar"></div>
													</div>
													<div class="col-md-5">
														<div class="col-md-12">
															<h4>Collections</h4>
														</div>	
														<div class="col-md-6">
															<ul class="hrmenu-lists">
																<li><a href="#">New Arrivals</a></li>
																<li><a href="#">Clothings</a></li>
																<li><a href="#">Bags</a></li>
																<li><a href="#">Shoes</a></li>
																<li><a href="#">Accessories</a></li>
																<li><a href="#">Sale</a></li>
															</ul>
														</div>
														<div class="col-md-6">
														</div>
													</div>
												</div>
											</div><!-- /cbp-hrsub-inner -->
										</div><!-- /cbp-hrsub -->
									</li>	
								</ul>
							</div>
							<div class="main-shopping-cart hidden-xs">
								<a href="#">
									<img src="<?php echo base_url();?>images/icon-cart-black.png">
									<h4>MY CART ( 0 )</h4>
								</a>
							</div>
							<div class="main-search-container hidden-xs">
								<input class="col-md-4 main-search-submit navigationfont" type="submit" value="SEARCH">
								<input class="col-md-8 main-search-input" placeholder="" type="search" value="" name="search" id="search">
							</div>
						</div>
					</div>
				</div>

			</header>

			<div id="content">
<!-- insert popoy tenslogo women men kids search mycart -->
				
<!-- insert ponpon about content -->
				
				<?php if(isset($user)): ?>
				<?php
					foreach($user as $row){
					$email = $row->email;
					$name = $row->fullname;
					}
				?>
				<div class="container about-header" style="margin-top: 100px;">
					<div class="must-see-items-border"></div>
					<div class="about-header" style="text-align: left;">
							<h2><span>Fullname:</span> <?php echo $name?></h2>
							<h2><span>Email:</span> <?php echo $email?></h2>
					</div>
					<div class="must-see-items-border"></div>
				</div>
				<?php elseif($_SESSION['fbid']): ?>
				<?php
				$name = $_SESSION['fullname'];
				$email = $_SESSION['email'];
				?>
				<div class="container about-header" style="margin-top: 100px;">
					<div class="must-see-items-border"></div>
					<div class="about-header" style="text-align: left;">
							<h2>Connected to Facebook</h2>
							<h2><span>Fullname:</span> <?php echo $name?></h2>
							<h2><span>Email:</span> <?php echo $email?></h2>
					</div>
					<div class="must-see-items-border"></div>
				</div>
				<?php endif; ?>
				
				<div class="container">
					<div class="must-see-items">
						<h1>MUST-SEE</h1>
						<h1><span>ITEMS</span></h1>
					</div>
				</div>

				<div class="container">
					<div class="row">
						<div class="item-posts col-md-4">
							<div class="post-photo col-md-12"><img src="<?php echo base_url();?>images/photo1.png"></div>
							<div class="post-content col-md-12">
								<div class="item-category"><h2>SUMMER ATTIRE</h2></div>
								<p class="category-details">Be part of the summer fun.</p>
								<a class="call-links" href="#">SHOP NOW</a>
							</div>
						</div>
						<div class="item-posts col-md-4">
							<div class="post-photo col-md-12"><img src="<?php echo base_url();?>images/photo2.png"></div>
							<div class="post-content col-md-12">
								<div class="item-category"><h2>SUMMER ATTIRE</h2></div>
								<p class="category-details">Be part of the summer fun.</p>
								<a class="call-links" href="#">SHOP NOW</a>
							</div>
						</div>
						<div class="item-posts col-md-4">
							<div class="post-photo col-md-12"><img src="<?php echo base_url();?>images/photo3.png"></div>
							<div class="post-content col-md-12">
								<div class="item-category"><h2>SUMMER ATTIRE</h2></div>
								<p class="category-details">Be part of the summer fun.</p>
								<a class="call-links" href="#">SHOP NOW</a>
							</div>
							
						</div>
					</div>
					<div class="row">
						<div class="item-posts col-md-4">
							<div class="post-photo col-md-12"><img src="<?php echo base_url();?>images/photo1.png"></div>
							<div class="post-content col-md-12">
								<div class="item-category left-align"><h2>P7,500.00</h2></div>
								<p class="category-details left-align">Macbook Air notebook</p>
								<a class="call-links" href="#">SHOP NOW</a>
							</div>
						</div>
						<div class="item-posts col-md-4">
							<div class="post-photo col-md-12"><img src="<?php echo base_url();?>images/photo1.png"></div>
							<div class="post-content col-md-12">
								<div class="item-category left-align"><h2>P7,500.00</h2></div>
								<p class="category-details left-align">Macbook Air notebook</p>
								<a class="call-links" href="#">SHOP NOW</a>
							</div>
						</div>
						<div class="item-posts col-md-4">
							<div class="post-photo col-md-12"><img src="<?php echo base_url();?>images/photo1.png"></div>
							<div class="post-content col-md-12">
								<div class="item-category left-align"><h2>P7,500.00</h2></div>
								<p class="category-details left-align">Macbook Air notebook</p>
								<a class="call-links" href="#">SHOP NOW</a>
							</div>
						</div>
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
							<li>
								<div class="item-posts">
									<div class="post-photo col-md-12"><img src="<?php echo base_url();?>images/shop1.png"></div>
									<div class="post-content col-md-12">
										<div class="item-category"><h2>LAMER COLLECTIONS</h2></div>
										<p class="category-details">WATCHES</p>
										<a class="call-links" href="#">SHOP NOW</a>
									</div>
								</div>
							</li>
							<li>
								<div class="item-posts">
									<div class="post-photo col-md-12"><img src="<?php echo base_url();?>images/shop2.png"></div>
									<div class="post-content col-md-12">
										<div class="item-category"><h2>TNL FOOTWEAR</h2></div>
										<p class="category-details">SHOES</p>
										<a class="call-links" href="#">SHOP NOW</a>
									</div>
								</div>
							</li>
							<li>
								<div class="item-posts">
									<div class="post-photo col-md-12"><img src="<?php echo base_url();?>images/shop3.png"></div>
									<div class="post-content col-md-12">
										<div class="item-category"><h2>TNL FOOTWEAR</h2></div>
										<p class="category-details">SHOES</p>
										<a class="call-links" href="#">SHOP NOW</a>
									</div>
								</div>
							</li>
							<li>
								<div class="item-posts">
									<div class="post-photo col-md-12"><img src="<?php echo base_url();?>images/shop1.png"></div>
									<div class="post-content col-md-12">
										<div class="item-category"><h2>LAMER COLLECTIONS</h2></div>
										<p class="category-details">WATCHES</p>
										<a class="call-links" href="#">SHOP NOW</a>
									</div>
								</div>
							</li>
							<li>
								<div class="item-posts">
									<div class="post-photo col-md-12"><img src="<?php echo base_url();?>images/shop2.png"></div>
									<div class="post-content col-md-12">
										<div class="item-category"><h2>TNL FOOTWEAR</h2></div>
										<p class="category-details">SHOES</p>
										<a class="call-links" href="#">SHOP NOW</a>
									</div>
								</div>
							</li>
							<li>
								<div class="item-posts">
									<div class="post-photo col-md-12"><img src="<?php echo base_url();?>images/shop3.png"></div>
									<div class="post-content col-md-12">
										<div class="item-category"><h2>TNL FOOTWEAR</h2></div>
										<p class="category-details">SHOES</p>
										<a class="call-links" href="#">SHOP NOW</a>
									</div>
								</div>
							</li>
						</ul>
						<div class="view-all col-md-12">
							<a class="call-links-gray margin-top" href="#">ALL ITEMS</a>
						</div>
					</div>
				</div>
			</div>



		<div class="footer">
           <div class="container">
               <div class="row">
               		
               </div>
   
           </div>
       </div>
       <div class="footer-bottom">COPYRIGHT.2015.TENS MARKETPLACE | CREATED BY POTATOCODES</div>

		<script type="javascript" src="script.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<!-- FOR SLIDER -->
		<script src="<?php echo base_url();?>components/jquery/jquery.js"></script>
        <script src="<?php echo base_url();?>components/jquery.bxslider/jquery.bxslider.js"></script>
        <script src="<?php echo base_url();?>js/main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="<?php echo base_url();?>js/cbpHorizontalMenu.min.js"></script>
        <script src="<?php echo base_url();?>js/modernizr.custom.js"></script>
        <script>
        	$(function() {
        		cbpHorizontalMenu.init();
        	});
        </script>
	</body>
</div>


</html>