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
  <div class="container">

  	<!-- thumb navigation carousel -->
    <div class="col-md-12 hidden-sm hidden-xs" id="slider-thumbs">
        
            <!-- thumb navigation carousel items -->
          <ul class="list-inline">
          <li> <a id="carousel-selector-0" class="selected">
            <img src="http://placehold.it/80x60&amp;text=one" class="img-responsive">
          </a></li>
          <li> <a id="carousel-selector-1">
            <img src="http://placehold.it/80x60&amp;text=two" class="img-responsive">
          </a></li>
          <li> <a id="carousel-selector-2">
            <img src="http://placehold.it/80x60&amp;text=three" class="img-responsive">
          </a></li>
          <li> <a id="carousel-selector-3">
            <img src="http://placehold.it/80x60&amp;text=four" class="img-responsive">
          </a></li>
                <li> <a id="carousel-selector-4">
            <img src="http://placehold.it/80x60&amp;text=five" class="img-responsive">
          </a></li>
          <li> <a id="carousel-selector-5">
            <img src="http://placehold.it/80x60&amp;text=six" class="img-responsive">
          </a></li>
          <li> <a id="carousel-selector-6">
            <img src="http://placehold.it/80x60&amp;text=seven" class="img-responsive">
          </a></li>
          <li> <a id="carousel-selector-7">
            <img src="http://placehold.it/80x60&amp;text=eight" class="img-responsive">
          </a></li>
            </ul>
        
    </div>
  
  
    <!-- main slider carousel -->
    <div class="row">
        <div class="col-md-12" id="slider">
            
                <div class="col-md-12" id="carousel-bounding-box">
                    <div id="myCarousel" class="carousel slide">
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                            <div class="active item" data-slide-number="0">
                                <img src="http://placehold.it/1200x480&amp;text=one" class="img-responsive">
                            </div>
                            <div class="item" data-slide-number="1">
                              <img src="http://placehold.it/1200x480/888/FFF" class="img-responsive">
                            </div>
                            <div class="item" data-slide-number="2">
                                <img src="http://placehold.it/1200x480&amp;text=three" class="img-responsive">
                            </div>
                            <div class="item" data-slide-number="3">
                                <img src="http://placehold.it/1200x480&amp;text=four" class="img-responsive">
                            </div>
                            <div class="item" data-slide-number="4">
                                <img src="http://placehold.it/1200x480&amp;text=five" class="img-responsive">
                            </div>
                            <div class="item" data-slide-number="5">
                                <img src="http://placehold.it/1200x480&amp;text=six" class="img-responsive">
                            </div>
                            <div class="item" data-slide-number="6">
                                <img src="http://placehold.it/1200x480&amp;text=seven" class="img-responsive">
                            </div>
                            <div class="item" data-slide-number="7">
                                <img src="http://placehold.it/1200x480&amp;text=eight" class="img-responsive">
                            </div>
                        </div>
                        <!-- main slider carousel nav controls --> <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>

                        <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
                    </div>
                </div>

        </div>
    </div>
    <!--/main slider carousel-->

</div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>home_assets/js/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/js/jquery.accordionjs.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/js/scripts.js"></script> 

<script type="text/javascript">
		
	$(document).ready(function(){
				
		$('#myCarousel').carousel({
			interval: 4000
		});

// handles the carousel thumbnails
		$('[id^=carousel-selector-]').click( function(){
		  var id_selector = $(this).attr("id");
		  var id = id_selector.substr(id_selector.length -1);
		  id = parseInt(id);
		  $('#myCarousel').carousel(id);
		  $('[id^=carousel-selector-]').removeClass('selected');
		  $(this).addClass('selected');
		});
		
		// when the carousel slides, auto update
		$('#myCarousel').on('slid', function (e) {
		  var id = $('.item.active').data('slide-number');
		  id = parseInt(id);
		  $('[id^=carousel-selector-]').removeClass('selected');
		  $('[id=carousel-selector-'+id+']').addClass('selected');
		});

       }); 
	</script>
</body>
</html>
