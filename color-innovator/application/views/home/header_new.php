<?php header('Set-Cookie: cross-site-cookie=name; SameSite=None; Secure');?>

<html>

	<head>

		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>The Color Innovator</title>



		<!-- Fav icon -->

		<link rel="stylesheet" href="<?php echo base_url(); ?>home_assets/flexslider/css/flexslider.css" type="text/css" media="screen" />

		



		<link href="<?php echo base_url(); ?>home_assets/images/favicon.ico" rel="shortcut icon" type="image/ico" />



		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

		

		<!-- Bootstrap -->

		<link rel="stylesheet" href="<?php echo base_url(); ?>home_assets/css/bootstrap.min.css" />

		<link href="<?php echo base_url(); ?>home_assets/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.25.6/sweetalert2.min.css" />

		<!-- Fonts -->

	  <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">

	  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

			<!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

		<!-- Owl Slider -->

	   <link href="<?php echo base_url(); ?>home_assets/css/owl.carousel.min.css" rel="stylesheet">
	   <link href="<?php echo base_url(); ?>home_assets/css/headerStyle.css" rel="stylesheet">

		  



		<!-- Animation -->

		<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

		

		<!--loder new -->		

		

		<!--<link href="<?php echo base_url(); ?>home_assets/css/animsition.min.css" rel="stylesheet">-->

		

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>home_assets/css/normalize.css?ver=<?php echo date("YmdHis"); ?>" />

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>home_assets/css/demo.css?ver=<?php echo date("YmdHis"); ?>" />

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>home_assets/css/component.css?ver=<?php echo date("YmdHis"); ?>" />

		

		

		<!-- Custome -->

		<link href="<?php echo base_url(); ?>home_assets/css/style.css?ver=<?php echo date("YmdHis"); ?>" rel="stylesheet">

		<link href="<?php echo base_url(); ?>home_assets/css/responsive.css?ver=<?php echo date("YmdHis"); ?>" rel="stylesheet">

		

		<link rel="stylesheet" href="<?php echo base_url(); ?>home_assets/css/atm.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>home_assets/css/my_css.css?ver=<?php echo date("YmdHis"); ?>">

	<link rel="stylesheet" href="<?php echo base_url(); ?>home_assets/css/color_innovator.css?ver=<?php echo date("YmdHis"); ?>">



		<!-- Font Awsome icons -->

		<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">-->



		<script type="text/javascript" >var base_url = "<?php echo base_url(); ?>";</script>

		<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/js/jquery.min.js"></script>

		

	

		

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

		<script src='https://www.google.com/recaptcha/api.js'></script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

		<script type="text/javascript">

			function convertImageToCanvas(image) {

			var canvas = document.createElement("canvas");

			canvas.width = image.width;

			canvas.height = image.height;

			canvas.getContext("2d").drawImage(image, 0, 0);

			return canvas;

			}

		</script>

		

			<script>

		    var CSRF_NAME = '<?php echo $this->security->get_csrf_token_name(); ?>'



            var CSRF_TOKEN = '<?php echo $this->security->get_csrf_hash(); ?>'

		</script>

		

	</head>

	

	<body>

		<div id="pagewrap" class="pagewrap">

		<div class="container-fluid">

		<!--<div class="loading" id="main_loader" style="display:none;">Loading&#8230;</div>-->

		

		<!--<div class="animsition-overlay"  data-animsition-overlay="true"></div>-->

			

			<div id="loader" class="pageload-overlay" data-opening="M 0,0 c 0,0 63.5,-16.5 80,0 16.5,16.5 0,60 0,60 L 0,60 Z">

				<svg class="custloadersvg" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 80 60" preserveAspectRatio="none">

					<path d="M 0,0 c 0,0 -16.5,43.5 0,60 16.5,16.5 80,0 80,0 L 0,60 Z"/>

				</svg>

			</div><!-- /pageload-overlay -->

	  	

		<header>
				<?php $c_url= current_url(); ?>
            <div class="col-sm-12 col-xs-12 setheader">
							<div class="submit-flooring col-xs-5 hidden-lg hidden-sm hidden-md pull-left">
								<a href="<?php echo base_url(); ?>" title="Innovator">

									  <img class="logo" src="<?php echo base_url(); ?>home_assets/images/logo.png" alt="">
							</div>
							<div class="col-xs-5  hidden-lg hidden-sm hidden-md pull-right">
								<div class="submit-flooring hidden-lg hidden-md hidden-sm">
									<a href="#!">
									 <img class="" src="<?php echo base_url(); ?>home_assets/images/slogo.png">
									</a>
								</div>
							</div>
					
              <figure class="hidden-xs">
				  
                <a href="<?php echo base_url(); ?>"><img class="" src="<?php echo base_url(); ?>home_assets/images/logo.png" alt=""></a>
				

						  
              </figure>

              <div class="header-links col-xs-6 col-sm-6 col-lg-5 col-md-5">
                <a href="<?php echo ($this->session->userdata('colors_category_list')!='')?base_url().'home/step_2':'#'; ?>">
                  <div class="cont">
                   
                    <!-- <i class="main-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/choose.png" alt=""></i>
                    <i class="hover-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/choose-hover-icon.png" alt=""></i>
                    <span>Choose</span> -->

                    <?php 

										$baseurl = base_url();
										if($c_url == $baseurl || $c_url == base_url()."home" || $c_url == base_url()."home/step_2" || $c_url == base_url()."home/step_3" || $c_url == base_url()."home/step_4")
										{
										?>	
					
                    <i class="main-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/choose.png" alt=""></i>
                    <i class="hover-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/choose-hover-icon.png" alt=""></i>
                   <span class="yellowtext custuc custtopmenu hidden-sm hidden-xs">Create<br>Tile</span>	
                    <?php } else { ?>

                    <i class="main-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/choose.png" alt=""></i>
                    <i class="hover-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/choose-hover-icon.png" alt=""></i>
                    <span class="yellowtext custuc custtopmenu hidden-sm hidden-xs">Create<br>Tile</span>	
                    <?php }?>

                  </div>
                </a>

			

               <a href="#" class="<?php 

								if ($this->session->userdata('logedin_user') == "") {

										if($this->session->userdata('colors_category_list') == ''){ 

										echo 'go_to_step2'; 

									} else if($this->session->userdata('colors_list') == ''){

										echo 'go_to_step3'; 

									} else if($this->session->userdata('created_image_data') == ''){

										echo 'mix_it'; 

								} else if($this->session->userdata('saved_album_session')=='' || ($this->session->userdata('saved_album_session') && !empty($this->session->userdata('saved_album_session')) && ((array_key_exists(1,$this->session->userdata('saved_album_session')) && empty($this->session->userdata['saved_album_session'][1])) && (array_key_exists(2,$this->session->userdata('saved_album_session')) && empty($this->session->userdata['saved_album_session'][2]))) )){

									echo 'go_to_place';  

									} else {

										echo 'placeopen';				   

										} } else { echo 'login_go_to_place';}	?>">
										<?php if($c_url == base_url()."home/place" || $c_url == base_url()."home/view_gallery") {?>
		                  <div class="cont">
		                    <i class="main-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/mix.png" alt=""></i>
		                    <i class="hover-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/mix-hover.png" alt=""></i>
		                   <span class="yellowtext custuc custtopmenu hidden-sm hidden-xs">Place<br>Tile</span>
		                  </div>
		                  <?php } else { ?>

		               
		                  <div class="cont">
		                    <i class="main-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/mix.png" alt=""></i>
		                    <i class="hover-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/mix-hover.png" alt=""></i>
		                   <span class="yellowtext custuc custtopmenu hidden-sm hidden-xs">Place<br>Tile</span>
		                  </div>
		                  <?php }?>
		      				  </a>

                
                <a href="<?php echo base_url(); ?>home/make">

									<?php if($c_url == base_url()."home/make"){?>
                
                  <div class="cont">
                    <i class="main-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/place.png" alt=""></i>
                    <i class="hover-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/place-hover.png" alt=""></i>
                    <span class="yellowtext custuc custtopmenu hidden-sm hidden-xs">Add<br>Background</span>
                  </div>
             
                	<?php } else { ?>
                
                  <div class="cont">
                    <i class="main-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/place.png" alt=""></i>
                    <i class="hover-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/place-hover.png" alt=""></i>
                    <span class="yellowtext custuc custtopmenu hidden-sm hidden-xs">Add<br>Background</span>
                  </div>
                
               	 <?php }?>  
								</a>


                 
                <a href="<?php echo base_url(); ?>home/make_logo">
									<?php if($c_url == base_url()."home/make_logo"){?>

				  				<div class="cont">	  
                    <i class="main-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/request-sample-icon.svg" alt=""></i>
                    <i class="hover-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/request-sample-hover-icon.svg" alt=""></i>
                    <span class="yellowtext custuc custtopmenu hidden-sm hidden-xs">Customize<br>With Logo</span>
               		</div> 
										<?php } else { ?>
                  <div class="cont">	  
                    <i class="main-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/request-sample-icon.svg" alt=""></i>
                    <i class="hover-img"><img src="https://www.summit-flooring.com/color-conductor/home_assets/images/request-sample-hover-icon.svg" alt=""></i>
                    <span class="yellowtext custuc custtopmenu hidden-sm hidden-xs">Customize<br>With Logo</span>
                  </div>
               		<?php }?> 

								</a>
							

					
              </div>
              
              
            <div class="top-head col-xs-6 col-sm-12 col-lg-4 col-md-4 pull-left   ">
					  	<ol>
								<li><strong>Please select either an Indoor or Outdoor application.</strong></li>
								<li><strong>Each swatch tile you compose has a random pattern … it is meant to give you a composite look of the tile just as in the real process of manufacturing.</strong></li>
							</ol>
					
						</div>
            <div class="hidden-sm col-lg-2 col-xs-6 col-md-2 pull-right top-right-logo hidden-xs">
              	<!--<div class="submit-flooring" style="text-align: right;">
					
				 </div>-->
            </div>
            </div>
    </header>

<!-- ********************************* Step  ***************************************** -->
      <div class="col-sm-12 col-xs-12 meanuheader">
       <div class="piano-bar">

        <a href="<?php echo base_url(); ?>home" class="<?php echo ($active_submenu == 'step_1' || $active_submenu == 'step_2' || $active_submenu == 'step_3' || $active_submenu == 'step_4')?'active':''; ?>">
          1
        </a>
        <a href="<?php echo ($this->session->userdata('colors_category_list')!='')?base_url().'home/step_2':'#'; ?>" class="<?php echo ($this->session->userdata('colors_category_list')=='')?"go_to_step2 ":""; ?><?php echo ($active_submenu == 'step_2' || $active_submenu == 'step_3' || $active_submenu == 'step_4' || $active_submenu == 'step_5' || $active_submenu == 'step_6')?'active':''; ?>">
          2
        </a>

        <a href="<?php echo ($this->session->userdata('colors_list')!='')?base_url().'home/step_3':'#'; ?>" class="<?php echo ($this->session->userdata('colors_list')=='')?"go_to_step3 ":""; ?> <?php echo ($active_submenu == 'step_3' || $active_submenu == 'step_4' || $active_submenu == 'step_5' || $active_submenu == 'step_6')?"active":""; ?>">
          3
        </a>

        <a href="<?php echo ($this->session->userdata('created_image_data')!='' || $this->session->userdata('saved_album_session')!='')?base_url().'home/step_4':'#'; ?>" class="<?php echo ($this->session->userdata('created_image_data')=='' && $this->session->userdata('saved_album_session')=='')?"mix_it ":""; ?> <?php echo ($active_submenu == 'step_4' || $active_submenu == 'step_5' || $active_submenu == 'step_6')?"active":""; ?>">
          4
        </a>
          <!-- <a href="#" class="go_to_place  " title="STEP 5 - Place Into Multiple Applications">5</a>
          <a href="#" class="no_swatch_created" title="Step 6 - Request Sample">6</a> -->
       </div>
     </div>


<!-- ********************************* afeter step  ***************************************** -->
<div class="col-sm-12 col-xs-12">
		<div class="col-xs-12 hidden-md hidden-sm hidden-lg" style=" margin:10px auto;">
		  <div class="links login_section" style="text-align:center;">
	  <a href="tel:1-877-496-3566" class="btn"><i class="fa  fa-phone-circle"></i> Need assistance? (9:00-5:00 EST)</a>
		<a href="#!" class="btn blue help_modal"><i class="fa fa-question-circle"></i> Help</a>
		<a href="#!" class="btn blue login_btn_popup" data-  ="modal" data-target="#myModal" id="login_btn">Login</a>
		<a href="#!" class="btn blue register_btn_popup" data-toggle="modal" data-target="#register-modal" id="register_btn">Register</a>
	  </div>
		
</div>      
<?php $curl = current_url(); 
	$getLastId=$this->uri->segment('3');
?>	
<div class="mid-conttainer">

        <!-- Step header -->
        <div class="step-heading">
			 <div class="row" style="margin:0;">
				<div class="col-md-6 col-sm-6 col-xs-12" style="text-align:left;">
					<?php if($curl == base_url()."home" || $curl == base_url()){ ?>
					<h1>STEP 1 - Choose Your Application</h1>
					<?php } else if($curl == base_url()."home/step_2"){ ?>
						<h1>STEP 2 - COLOR ROOM</h1>
					<?php } else if($curl == base_url()."home/step_3"){ ?>
						<h1>STEP 3 - MIX IT</h1>
					<?php } else if($curl == base_url()."home/step_4"){ ?>
						<?php if ($this->session->userdata('logedin_user') == "") { ?>							
							<h1>View Gallery</h1>							
						<?php } ?>
					<?php } else if($curl == base_url()."home/place"){ ?>
							<?php if ($this->session->userdata('logedin_user') != "") { ?>
							<a href="<?php echo base_url(); ?>home/view_gallery">
								<h1>View Gallery</h1>
								</a>
							<?php } ?>
					<?php } else if($curl == base_url()."home/make"){ ?>
								<?php if ($this->session->userdata('logedin_user') != "") { ?>
									<a href="<?php echo base_url(); ?>home/view_gallery">
										<h1>View Gallery</h1>
										</a>
									<?php } ?>	
				

				<?php } else if($curl == base_url()."home/samplereq/".$getLastId){ ?>
								
									<h1>Product Information</h1>
									
					<?php } ?>	

					<?php if($curl == base_url()."home/make_logo"){ ?>
				<?php if ($this->session->userdata('logedin_user') != "") { ?>
						<a href="<?php echo base_url(); ?>home/view_gallery">
							<h1>View Gallery</h1>
						</a>
					<?php } ?>
			<?php } else if($curl == base_url()."home/edit_account"){ ?>	
					<?php if ($this->session->userdata('logedin_user') != "") { ?>
						<a href="<?php echo base_url(); ?>home/view_gallery">
							<h1>View Gallery</h1>
						</a>
					<?php } ?>
			
			<?php } ?>	

				</div>
			<div class="col-md-6 col-sm-6 hidden-xs" style="text-align:right;">
				<?php $this->load->view('desktop_view_links');?>
			
		</div>			
	</div>
</div>

</div>
</div>
