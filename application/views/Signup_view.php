<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>

	<head>
		<title>Tens Marketplace</title>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>footer.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>bootstrap-3.3.4-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>bootstrap-3.3.4-dist/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>bootstrap-3.3.4-dist/js/bootstrap.min.js">

		<!-- FOR SLIDER -->
		<link rel="stylesheet" href="components/jquery.bxslider/jquery.bxslider.css">

		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/default.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/component.css" />
		<script src="<?php echo base_url();?>js/modernizr.custom.js"></script>

	</head>

	<body>

		<div id="wrapper">
			<header>
				 <div class="row">
        			<div class="container">
        				<ul class="main-nav">
        					<li><a href="#openSignUp" id="sign_btn">SIGN UP</a></li>
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
        					<li><a href="index.php">LOGIN</a></li>
        					<div id="openLogin" class="modalDialog">
        						<div>
        							<div class="row modal-head-bar">
        								<div class="col-md-6"><p class="modal-head-text">SIGN IN</p></div>
        								<div class="col-md-6"><a href="#close" title="Close" class="close-btn">X</a></div>
        							</div>
        							<div class="row modal-contents">
        								<p class="modal-contents-text">Facebook</p>
        								<button class="btn btn-block btn-primary modal-button-1">Sign in with Facebook</button>
        								<p class="modal-contents-text">Or</p>
										<?php if($this->session->userdata('email')): ?>
										Sign Up Successful! You can now login.
										<?php endif; ?>
										<?php $this->session->unset_userdata('email');?>
        								<input class="show form-control modal-content-form" type="text" placeholder="E-mail address">
        								<input class="show form-control modal-content-form" type="text" placeholder="Password">
        								<input class="modal-radio" type="radio"><p class="modal-content-keep">Keep me signed in</p>
        								<p class="modal-content-forgot">Forgot Password?</p>
        								<div class="modal-content-bottom">
        									<button class="btn btn-primary modal-button-2">SIGN IN</button>
        									<p>Not yet a member? SIGN UP</p>
        								</div>

        							</div>
    							</div>      
        					</div>
        					<li><button type="button">OPEN A SHOP</button></li>
						</ul>
					</div>
				</div>
			</header>

			<div id="content">
<!-- insert popoy tenslogo women men kids search mycart -->
				<div class="container headerfixed">
					<div class="navigation">
						<img class="col-fix"src="<?php echo base_url();?>images/LOGO.png">
						<ul class="col-fix">
							<div class="main">
								<nav id="cbp-hrmenu" class="cbp-hrmenu">
									<ul>
										<li>
											<a href="#">WOMEN</a>
											<div class="cbp-hrsub">
												<div class="cbp-hrsub-inner"> 
													<div>
														<h4>Learning &amp; Games</h4>
														<ul>
															<li><a href="#">Catch the Bullet</a></li>
															<li><a href="#">Snoopydoo</a></li>
															<li><a href="#">Fallen Angel</a></li>
															<li><a href="#">Sui Maker</a></li>
															<li><a href="#">Wave Master</a></li>
															<li><a href="#">Golf Pro</a></li>
														</ul>
													</div>
													<div>
														<h4>Utilities</h4>
														<ul>
															<li><a href="#">Gadget Finder</a></li>
															<li><a href="#">Green Tree Express</a></li>
															<li><a href="#">Green Tree Pro</a></li>
															<li><a href="#">Wobbler 3.0</a></li>
															<li><a href="#">Coolkid</a></li>
														</ul>
													</div>
													<div>
														<h4>Education</h4>
														<ul>
															<li><a href="#">Learn Thai</a></li>
															<li><a href="#">Math Genius</a></li>
															<li><a href="#">Chemokid</a></li>
														</ul>
														<h4>Professionals</h4>
														<ul>
															<li><a href="#">Success 1.0</a></li>
															<li><a href="#">Moneymaker</a></li>
														</ul>
													</div>
												</div><!-- /cbp-hrsub-inner -->
											</div><!-- /cbp-hrsub -->
										</li>
										<li>
											<a href="#">MEN</a>
											<div class="cbp-hrsub">
												<div class="cbp-hrsub-inner">
													<div>
														<h4>Education &amp; Learning</h4>
														<ul>
															<li><a href="#">Learn Thai</a></li>
															<li><a href="#">Math Genius</a></li>
															<li><a href="#">Chemokid</a></li>
														</ul>
														<h4>Professionals</h4>
														<ul>
															<li><a href="#">Success 1.0</a></li>
															<li><a href="#">Moneymaker</a></li>
														</ul>
													</div>
													<div>
														<h4>Entertainment</h4>
														<ul>
															<li><a href="#">Gadget Finder</a></li>
															<li><a href="#">Green Tree Express</a></li>
															<li><a href="#">Green Tree Pro</a></li>
															<li><a href="#">Holy Cannoli</a></li>
															<li><a href="#">Wobbler 3.0</a></li>
															<li><a href="#">Coolkid</a></li>
														</ul>
													</div>
													<div>
														<h4>Games</h4>
														<ul>
															<li><a href="#">Catch the Bullet</a></li>
															<li><a href="#">Snoopydoo</a></li>
															<li><a href="#">Fallen Angel</a></li>
															<li><a href="#">Sui Maker</a></li>
															<li><a href="#">Wave Master</a></li>
															<li><a href="#">Golf Pro</a></li>
														</ul>
													</div>
												</div><!-- /cbp-hrsub-inner -->
											</div><!-- /cbp-hrsub -->
										</li>
										<li>
											<a href="#">KIDS</a>
											<div class="cbp-hrsub">
												<div class="cbp-hrsub-inner"> 
													<div>
														<h4>Learning &amp; Games</h4>
														<ul>
															<li><a href="#">Catch the Bullet</a></li>
															<li><a href="#">Snoopydoo</a></li>
														</ul>
														<h4>Utilities</h4>
														<ul>
															<li><a href="#">Gadget Finder</a></li>
															<li><a href="#">Green Tree Express</a></li>
															<li><a href="#">Green Tree Pro</a></li>
															<li><a href="#">Wobbler 3.0</a></li>
															<li><a href="#">Coolkid</a></li>
														</ul>
													</div>
													<div>
														<h4>Education</h4>
														<ul>
															<li><a href="#">Learn Thai</a></li>
															<li><a href="#">Math Genius</a></li>
															<li><a href="#">Chemokid</a></li>
														</ul>
														<h4>Professionals</h4>
														<ul>
															<li><a href="#">Success 1.0</a></li>
															<li><a href="#">Moneymaker</a></li>
														</ul>
													</div>
												</div><!-- /cbp-hrsub-inner -->
											</div><!-- /cbp-hrsub -->
										</li>
									</ul>
								</nav>
							</div>
						</ul>
					</div>
					<div class="searchbar">
						<div class="searchbox col-fix">
								<input class="col-md-4 sb-search-submit navigationfont" type="submit" value="SEARCH">
								<input class="col-md-8 sb-search-input" placeholder="" type="search" value="" name="search" id="search">
						</div>
						<div class="cart col-fix"><img src="<?php echo base_url();?>images/icon-cart-black.png">   MY CART( 0 )</div>
					</div>
				</div>
<!-- insert ponpon about content -->
				<div class="container">
					<div class="row">
						<div class="featured-image col-md-12">
							<img src="<?php echo base_url();?>images/slider_sample.png"/> <!--ponpon -->
							<a class="shop-now-button" href="#">
								<div class="border-white">
									SHOP NOW >
								</div>
							</a>
						</div>
					</div>
				</div>

				<div class="container about-header">
					<div class="about-header">
							<h2>ABOUT</h2>
							<h2><span>TENS</span> MARKETPLACE</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et justo euismod, commodo justo sit amet, auctor leo. Vivamus laoreet nibh eu ante sodales, sed mattis arcu pellentesque. Sed finibus nec dui auctor rutrum. Pellentesque venenatis, orci sit amet aliquam dapibus, neque magna mattis justo, id varius augue sem eget dui. Praesent orci metus, porta suscipit suscipit vel, varius vitae massa. Maecenas at velit nunc.</p>
					</div>
				</div>


				<div class="container">
					<div class="must-see-items-border"></div>
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
        <script>
        	$(function() {
        		cbpHorizontalMenu.init();
        	});
        </script>
	</body>
</div>


</html>