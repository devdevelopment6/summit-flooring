<!doctype html>
<html>
<head>
<title>Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS Libs -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>home_assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>home_assets/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Lobster|Lobster+Two|Overpass" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Overpass:100,200,300,400,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.4/flexslider.min.css" type="text/css">
<!-- CSS App -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>home_assets/css/kgaccordion.css">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>home_assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>home_assets/css/techybirds.css">
<!-- Javascript Libs -->
<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script type="text/javascript">
    $.getScript('//connect.facebook.net/en_US/sdk.js', function () {
          FB.init({
             appId: '273144143210747',
             version: 'v2.11' // or v2.0, v2.1, v2.0
          });
          FB.getLoginStatus(updateStatusCallback);
       });
        function updateStatusCallback() {

   }


</script>
	<script >var base_url = "<?php echo base_url();?>";</script>
</head>

<body>
<header>
  <div class="container">
    <div class="main-logo">
     <a href="<?php echo base_url(); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>home_assets/img/logo.png"></a> 
	<ul class="nav navbar-nav navbar-right">
		<?php if($this->session->userdata('logedin_user')!=''){ ?>
		<li ><a style="cursor:pointer;" href="<?php echo base_url(); ?>home/logout"><i class="fa fa-power-off"></i>  Log out</a></li>
		<?php } else {?>
		<li class="login_title"><a style="cursor:pointer;">Login/Sign up</a></li>
		<?php } ?>
	</ul>
    </div>
    <div class="color-logo">
      <figure><img class="img-responsive" src="<?php echo base_url(); ?>home_assets/img/color-logo.jpg"></figure>
    </div>
  </div>
</header>
<div class="accordion-wrapper" id="place_img">
  <div class="accordion-tab-nav">
    <ul>
      <li data-tab="step_1" class="current"><a href="#"><span>Mix</span></a></li>
      <li data-tab=""><a href="#"><span>Place</span></a></li>
      <li data-tab=""><a href="#"><span>Make</span></a></li>
    </ul>
  </div>
  <?php /*?><div class="accordionContainer">
    
  </div><?php */?>
   
  <div id="slider" class="flexslider">
          <ul class="slides">
            <li>
              <img src="<?php echo base_url(); ?>slider_images/slide1.jpg" />
            </li>
            <li>
              <img src="slide2.jpg" />
            </li>
            <li>
              <img src="slide3.jpg" />
            </li>
            <li>
              <img src="slide4.jpg" />
            </li>
            <!-- items mirrored twice, total of 12 -->
          </ul>
        </div>
        <div id="carousel" class="flexslider">
          <ul class="slides">
            <li>
              <img src="slide1.jpg" />
            </li>
            <li>
              <img src="slide2.jpg" />
            </li>
            <li>
              <img src="slide3.jpg" />
            </li>
            <li>
              <img src="slide4.jpg" />
            </li>
            <!-- items mirrored twice, total of 12 -->
          </ul>
       </div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.4/jquery.flexslider.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>home_assets/js/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/js/jquery.accordionjs.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/js/scripts.js"></script> 

<script type="text/javascript">
		
	$(document).ready(function(){
		
		
  // The slider being synced must be initialized first
  $('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    itemMargin: 5,
    asNavFor: '#slider'
  });
 
  $('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel"
  });

       }); 
	</script>
</body>
</html>
