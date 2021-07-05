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
	   <link href="<?php echo base_url(); ?>home_assets/css/oheaderStyle.css" rel="stylesheet">

		  



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

		<div class="container">

		    

		    

		    

		    

			<?php $c_url= current_url(); ?>

			<div class="row top_of_header">	

				<div class="custheadleft col-md-9 col-lg-9 col-sm-12 col-xs-12 ">

					<span class="col-md-2 col-lg-2 col-sm-3 col-xs-3 custnopadding">

						<a href="<?php echo base_url(); ?>" title="Innovator">

						  <img class="logo" src="<?php echo base_url(); ?>home_assets/images/logo.png" alt="">

						</a>

					</span>

					<span class="col-md-8 col-lg-8 col-sm-9 col-xs-9  custnopadding list_menu">					

						<ul class="articlesmain">

							<a href="<?php echo ($this->session->userdata('colors_category_list')!='')?base_url().'home/step_2':'#'; ?>">

							<?php 

							$baseurl = base_url();

							if($c_url == $baseurl || $c_url == base_url()."home" || $c_url == base_url()."home/step_2" || $c_url == base_url()."home/step_3" || $c_url == base_url()."home/step_4"){?>										

								<li class="articles custpadright">

							  	 <span>

										<!-- <img class="custtoplogo" src="<?php echo base_url(); ?>home_assets/images/tile-icon_yellow.png" alt="">		 -->			

								  </span>							  

							</li>

							<li class="articles custpadleft">

								  <span class="yellowtext custuc custtopmenu hidden-sm hidden-xs">Create<br>Tile</span>							  

							</li>

							<?php } else { ?>

							<li class="articles custpadright">

							  <span>									

									<!-- <img class="custtoplogo" src="<?php echo base_url(); ?>home_assets/images/tile-icon_green.png" alt=""> -->			

							  </span>

							</li>

							<li class="articles custpadleft">

							  <span class="custuc custtopmenu hidden-sm hidden-xs">Create<br>Tile</span>

							</li>

							<?php }?>

							</a>

						</ul>

						

						

						<ul class="articlesmain">	

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

							<li class="articles custpadright">

							  	<span>

									<!-- <img class="custtoplogo" src="<?php echo base_url(); ?>home_assets/images/place-icon_yellow.png" alt=""> --> 														</span>

							</li>

							<li class="articles custpadleft">

									<span class="yellowtext custuc custtopmenu hidden-sm hidden-xs">Place<br>Tile</span>

							</li>							

							<?php } else { ?>

							<li class="articles custpadright">

								<span>

									<!--  <img class="custtoplogo" src="<?php echo base_url(); ?>home_assets/images/place-icon_green.png" alt=""> -->																  									

								</span>

							</li>

							<li class="articles custpadleft">

								<span class="custuc custtopmenu hidden-sm hidden-xs">Place<br>Tile</span>

							</li>

							<?php }?>

							</a>

						</ul>

						<ul class="articlesmain">

							<a href="<?php echo base_url(); ?>home/make">

							<?php if($c_url == base_url()."home/make"){?>

							<li class="articles custpadright">

							  	<span>

									<!-- <img class="custtoplogo" src="<?php echo base_url(); ?>home_assets/images/make-icon_yellow.png" alt="">	 -->

								</span>

							</li>

							<li class="articles custpadleft">

							  	<span class="yellowtext custuc custtopmenu hidden-sm hidden-xs">Add<br>Background</span>

							</li>

							<?php } else { ?>

							<li class="articles custpadright">

								<span>

									<!-- <img class="custtoplogo" src="<?php echo base_url(); ?>home_assets/images/make-icon_green.png" alt=""> -->	

								</span>

							</li>							

							<li class="articles custpadleft">

									<span class="custuc custtopmenu hidden-sm hidden-xs">Add<br>Background</span>

							</li>

							<?php }?>  

							</a>

						</ul>

						<ul class="articlesmain">

							<a href="<?php echo base_url(); ?>home/make_logo">

							<?php if($c_url == base_url()."home/make_logo"){?>

							<li class="articles custpadright">

								<span>

									<!-- <img class="custtoplogo" src="<?php echo base_url(); ?>home_assets/images/artistic-brush_yellow.png" alt=""> -->

								</span>

							</li>

							<li class="articles custpadleft">

								<span class="yellowtext custuc custtopmenu hidden-sm hidden-xs">Customize<br>With Logo</span>							  

							</li>

							<?php } else { ?>

							<li class="articles custpadright">

								<span>

									<!-- <img class="custtoplogo" src="<?php echo base_url(); ?>home_assets/images/artistic-brush_green.png" alt=""> -->	

								</span>

							</li>

							<li class="articles custpadleft">

								<span class="custuc custtopmenu hidden-sm hidden-xs">Customize<br>With Logo</span>

							</li>

							<?php }?> 

							</a>

						</ul>

				  	</span>

				</div>

				<div class="custheadright col-lg-3 col-md-3 hidden-sm hidden-xs">

					<div class="comat">

					 <a href="https://summit-flooring.com/" target="_blank"><img class="atm_logo" src="<?php echo base_url(); ?>home_assets/images/slogo.png"> 

					 </a>

					 <div><?php $this->load->view('desktop_view_links');?></div>

					</div>

				</div>

			</div>

				

			<?php $curl = current_url(); ?>	

			<input type="hidden" id="currenturl" value="<?php $curl = current_url(); ?>">

			<div class="menu_section">

			<div class="custleftstep">

				<a href="<?php echo base_url(); ?>home" class="<?php echo ($active_submenu == 'step_1' || $active_submenu == 'step_2' || $active_submenu == 'step_3' || $active_submenu == 'step_4')?'active':''; ?>"><div class="col-sm-2 steps <?php echo ($curl == base_url().'home' || $curl == base_url())?  'active':''; ?>"><span class="step">STEP 1</span></div></a>

				

				<a href="<?php echo ($this->session->userdata('colors_category_list')!='')?base_url().'home/step_2':'#'; ?>" class="<?php echo ($this->session->userdata('colors_category_list')=='')?"go_to_step2 ":""; ?><?php echo ($active_submenu == 'step_2' || $active_submenu == 'step_3' || $active_submenu == 'step_4' || $active_submenu == 'step_5' || $active_submenu == 'step_6')?'active':''; ?>"><div class="col-sm-2 steps <?php echo ($curl == base_url().'home/step_2')? 'active':'';  ?>"><span class="step">STEP 2</span></div></a>

				

				<a href="<?php echo ($this->session->userdata('colors_list')!='')?base_url().'home/step_3':'#'; ?>" class="<?php echo ($this->session->userdata('colors_list')=='')?"go_to_step3 ":""; ?> <?php echo ($active_submenu == 'step_3' || $active_submenu == 'step_4' || $active_submenu == 'step_5' || $active_submenu == 'step_6')?"active":""; ?>"><div class="col-sm-2 steps <?php echo ($curl == base_url().'home/step_3')? 'active':'';  ?>"><span class="step ">STEP 3</span></div></a>

				

				<a href="<?php echo ($this->session->userdata('created_image_data')!='' || $this->session->userdata('saved_album_session')!='')?base_url().'home/step_4':'#'; ?>" class="<?php echo ($this->session->userdata('created_image_data')=='' && $this->session->userdata('saved_album_session')=='')?"mix_it ":""; ?> <?php echo ($active_submenu == 'step_4' || $active_submenu == 'step_5' || $active_submenu == 'step_6')?"active":""; ?>"><div class="col-sm-2 steps <?php echo ($curl == base_url().'home/step_4')? 'active':'';  ?> custcssstep4"><span class="step ">STEP 4</span></div></a>

				

			  <!--<div class="col-sm-2 steps <?php echo ($curl == base_url().'home' || $curl == base_url())?  'active':''; ?>"><a href="<?php echo base_url(); ?>home" class="<?php echo ($active_submenu == 'step_1' || $active_submenu == 'step_2' || $active_submenu == 'step_3' || $active_submenu == 'step_4')?'active':''; ?>"><span class="step">STEP</span> 1</a></div>

		

			  <div class="col-sm-2 steps <?php echo ($curl == base_url().'home/step_2')? 'active':'';  ?>"><a href="<?php echo ($this->session->userdata('colors_category_list')!='')?base_url().'home/step_2':'#'; ?>" class="<?php echo ($this->session->userdata('colors_category_list')=='')?"go_to_step2 ":""; ?><?php echo ($active_submenu == 'step_2' || $active_submenu == 'step_3' || $active_submenu == 'step_4' || $active_submenu == 'step_5' || $active_submenu == 'step_6')?'active':''; ?>"><span class="step">STEP</span> 2</a></div>

				

			<div class="col-sm-2 steps <?php echo ($curl == base_url().'home/step_3')? 'active':'';  ?>"><a href="<?php echo ($this->session->userdata('colors_list')!='')?base_url().'home/step_3':'#'; ?>" class="<?php echo ($this->session->userdata('colors_list')=='')?"go_to_step3 ":""; ?> <?php echo ($active_submenu == 'step_3' || $active_submenu == 'step_4' || $active_submenu == 'step_5' || $active_submenu == 'step_6')?"active":""; ?>"><span class="step ">STEP</span> 3</a></div>

				

			<div class="col-sm-2 steps <?php echo ($curl == base_url().'home/step_4')? 'active':'';  ?>"><a href="<?php echo ($this->session->userdata('created_image_data')!='' || $this->session->userdata('saved_album_session')!='')?base_url().'home/step_4':'#'; ?>" class="<?php echo ($this->session->userdata('created_image_data')=='' && $this->session->userdata('saved_album_session')=='')?"mix_it ":""; ?> <?php echo ($active_submenu == 'step_4' || $active_submenu == 'step_5' || $active_submenu == 'step_6')?"active":""; ?>"><span class="step ">STEP</span> 4</a></div>-->	

				

		</div>

				

			

				

			<div class="custrightstep">

					

			<?php if($curl == base_url()."home" || $curl == base_url()){ ?>

				<!--<a href="#" class=""><div class="col-sm-2 stepsnew stepsnewnext go_to_step2"><span class="">NEXT</span></div></a>-->

				

			<?php } else if($curl == base_url()."home/step_2"){ ?>

				

				<!--<a href="<?php echo base_url(); ?>home"><div class="col-sm-2 stepsnew stepsnewback"><span class="">BACK</span></div></a>

			  	<a href="#"><div class="col-sm-2 stepsnew stepsnewnext go_to_step3"><span class="">NEXT</span></div></a>-->

				

			<?php } else if($curl == base_url()."home/step_3"){ ?>

				

				<a href="#"><div class="col-sm-2 stepsnew stepsnewback reset_and_go_to_home" id=""><span class="">RESET</span></div></a>

				<!--<a href="<?php echo base_url(); ?>home/step_2"><div class="col-sm-2 stepsnew stepsnewback"><span class="">BACK</span></div></a>

			  	<a href="#"><div class="col-sm-2 stepsnew stepsnewnext mix_it" id="mix_it"><span class="">MIX IT</span></div></a>-->

				

			<?php } else if($curl == base_url()."home/step_4"){ ?>

				

				<?php if ($this->session->userdata('logedin_user') != "") { ?><a href="<?php echo base_url(); ?>home/view_gallery"><div class="col-sm-2 stepsnew stepsnewgal "><span class="">View Gallery</span></div></a><?php } ?>

				

				<!--<a href="<?php echo ($this->session->userdata('colors_list')!='')?base_url().'home/step_3':'#'; ?>" class="<?php echo ($this->session->userdata('colors_list')=='')?'go_to_step3 ':''; ?> " ><div class="col-sm-2 stepsnew stepsnewback"><span class="#">BACK</span></div></a>

				

			  	<a href="#"><div class="col-sm-2 stepsnew stepsnewnext  go_to_place step4_next"><span class="">NEXT</span></div></a>-->

				

			<?php } else if($curl == base_url()."home/place"){ ?>

				<!--<a href="<?php echo base_url(); ?>home/step_4"><div class="col-sm-2 stepsnew stepsnewback"><span class="">BACK</span></div></a>-->

			  	<?php if ($this->session->userdata('logedin_user') != "") { ?><a href="<?php echo base_url(); ?>home/view_gallery"><div class="col-sm-2 stepsnew stepsnewgal "><span class="">View Gallery</span></div></a><?php } ?>

				

			<?php } else if($curl == base_url()."home/view_gallery"){ ?>

				<!--<a href="<?php echo base_url(); ?>home/place"><div class="col-sm-2 stepsnew stepsnewback"><span class="">BACK</span></div></a>-->

				

			<?php } else if($curl == base_url()."home/make"){ ?>

				<?php if ($this->session->userdata('logedin_user') != "") { ?><a href="<?php echo base_url(); ?>home/view_gallery"><div class="col-sm-2 stepsnew stepsnewgal "><span class="">View Gallery</span></div></a><?php } ?>

				

				<!--<a href="<?php echo base_url(); ?>home/place"><div class="col-sm-2 stepsnew stepsnewback"><span class="">BACK</span></div></a>

				<a href="#"><div class="col-sm-2 stepsnew stepsnewnext go_to_step7"><span class="">NEXT</span></div></a>-->

				

			<?php } else if($curl == base_url()."home/make_logo"){ ?>

				<?php if ($this->session->userdata('logedin_user') != "") { ?><a href="<?php echo base_url(); ?>home/view_gallery"><div class="col-sm-2 stepsnew stepsnewgal "><span class="">View Gallery</span></div></a><?php } ?>

				

				<!--<a href="<?php echo base_url(); ?>home/make"><div class="col-sm-2 stepsnew stepsnewback"><span class="">BACK</span></div></a>-->

				

			<?php } else if($curl == base_url()."home/edit_account"){ ?>

				<?php if ($this->session->userdata('logedin_user') != "") { ?><a href="<?php echo base_url(); ?>home/view_gallery"><div class="col-sm-2 stepsnew stepsnewgal "><span class="">View Gallery</span></div></a><?php } ?>

				

			<?php } ?>

			  

		 	</div>

		</div>

	 	</div>

	  </header>	

		





