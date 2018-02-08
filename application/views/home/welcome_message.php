<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $title; ?></title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/front/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/front/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/front/css/main.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/front/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/front/js/jquery.min.js"></script>
<!-- Jquery Validation Js-->
<script src="<?php echo base_url() ?>assets/front/js/jquery.validate.js"></script>
</head>
<body>
<!--************************************************************************************/
/****************************************************************************************/
/*****STUDIO TESSERACT DESIGNING CODE FILE**********************************************/
/**************************************************************************************/
/************************************************************************************-->
<section class="section-1" style="background:url(assets/front/images/supermarket-new-york.png) center; height:500px;">
   <div class="container">
      <div class="col-md-6 col-md-offset-3 text-center" style="background:rgba(255, 255, 255, 0.79); height:400px;">
	  <h2><img src="<?php echo base_url(); ?>assets/front/images/logo.png" /></h2>
		 <h1 style="color:#000000;">Get your groceries delivered from local stores</h1>
		 <input type="text" class="form-control" placeholder="Enter Your Post Code " />
		 <button class="btn btn-danger btn-block">Submit</button>
		 <br/>
		 <a href="#" data-toggle="modal" data-target="#loginUserModal" style="text-decoration:none;">Already have an account? Log in</a>
		 <br/>
		 <a href="#" style="text-decoration:none;">or</a>
		 <br/>
		 <a href="#" data-toggle="modal" data-target="#registerModal" style="text-decoration:none;">Register your account</a>
	  </div>
   </div>
</section>
<section class="section-1">
   <div class="container">
      <div class="col-md-4 text-center">
	    <div class="box"><i class="fa fa-heart fa-3px"></i></div>
		<h1 class="text-center">Products you love</h1> 
		<p>Thousands of products from stores<br/> you already shop at.</p>  
	  </div>
	  <div class="col-md-4 text-center">
	    <div class="box"><i class="fa fa-car fa-3px"></i></div>
		<h1 class="text-center">Same-day delivery</h1> 
		<p>We deliver  nationwide in the<br/> United Kingdom within 60 mins</p>  
	  </div>
	  <div class="col-md-4 text-center">
	    <div class="box"><i class="fa fa-money fa-3px"></i></div>
		<h1 class="text-center">Save time & money</h1> 
		<p>Find deals on exclusive products<br/> delivered to your front door </p>  
	  </div>
   </div>
</section>
<section class="section-2">
    <div class="container">
      <div class="col-md-6">
		<div class="section-2-img"><img src="<?php echo base_url(); ?>assets/front/images/Online Grocery Shopping.jpg" /></div> 
	  </div>
	  <div class="col-md-6">
		<h1>Deals that delight</h1> 
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		<a href="#" class="btn btn-danger">Start saving</a>  
	  </div>
   </div>
</section>
<section class="section-4">
    <div class="container">
	  <div class="col-md-6">
		<h1>Browse products</h1> 
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		<a href="#" class="btn btn-danger">
Get started</a>  
	  </div>
      <div class="col-md-6">
		<div class="section-2-img" style="background:url('assets/front/images/woman-grocery-shopping.jpg') no-repeat center; height:300px;"></div> 
	  </div>
	  
   </div>
</section>
<section class="section-3">
    <div class="container-fluid remove-all">
	 <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>   
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="<?php echo base_url(); ?>assets/front/images/HP-DT-Paperboat_1600x460-10jan.jpg" style="width:1520px; height:430px;">
            </div>
            <div class="item">
                <img src="<?php echo base_url(); ?>assets/front/images/1_PNN6G79x6lu0NBfJj4JrBg.jpeg" style="width:1520px; height:430px;" >
            </div>
            <div class="item">
                <img src="<?php echo base_url(); ?>assets/front/images/product_banner_1.jpg" style="width:1520px; height:430px;">
            </div>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
   </div>
</section>
<footer class="footer">
    <div class="footer-block">
    <div class="container">
      <div class="row">
	    <div class="col-md-12" style="margin-bottom:40px;">
		   <p class="text-center">Interested in a great way to make money?  <a href="#" class="btn btn-danger">
Become a shopper</a></p>
		</div>
        <div class="col-md-2 col-sm-3">
          <div class="row">
            <div class="col-sm-12 col-xs-6">
              <ul class="list-unstyled simple-list">
                <li><a href="#">Locations</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Contact </a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-2 col-sm-3">
          <div class="row">
            <div class="col-sm-12 col-xs-6">
              <ul class="list-unstyled simple-list">
                <li><a href="#">Instacart Express</a></li>
                <li><a href="#">Lists & Recipes</a></li>
                <li><a href="#">Partner program</a></li>
                <li><a href="#">Blog</a></li>
              </ul>
            </div>
            
          </div>
        </div>
        <div class="col-md-2 col-sm-3">
          <div class="row">
            <div class="col-sm-12 col-xs-6">
              <ul class="list-unstyled simple-list margin-bottom-10">
                <li><a href="#">Press</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Enter your location</a></li>
                <li><a href="#">Help</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 md-margin-bottom-40">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
          <br>
          <ul class="list-inline footer-social">
            <li><a href="http://www.facebook.com/" target="_blank"><i class="fb rounded-md fa fa-facebook"></i></a></li>
            <li><a href="http://www.twitter.com/" target="_blank"><i class="tw rounded-md fa fa-twitter"></i></a></li>
            <li><a href="http://www.instagram.com/" target="_blank"><i class="tw rounded-md fa fa-instagram"></i></a></li>
            <li><a href="#" data-toggle="modal" data-target="#tell-a-friend"><i class="tw rounded-md fa fa-share"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
   <?php $this->load->view('modals/register_modal'); ?>
    <?php $this->load->view('modals/login_model'); ?>
</footer>
</body>
</html>
