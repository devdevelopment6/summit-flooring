<!doctype html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS Libs -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>home_assets/css/bootstrap.min.css">
	<link href="<?php echo base_url(); ?>home_assets/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>home_assets/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Lobster+Two|Overpass" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Overpass:100,200,300,400,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
	<!-- CSS App -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>home_assets/css/kgaccordion.css">
	<link href="<?php echo base_url(); ?>home_assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>home_assets/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>FlexSlider-master/demo/css/flexslider.css" type="text/css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>home_assets/css/style.css?v=<?php echo date('YmdHis'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>home_assets/css/custom.css?v=<?php echo date('YmdHis'); ?>">
	<!-- Javascript Libs -->
	<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
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
	function convertImageToCanvas(image) {
		var canvas = document.createElement("canvas");
		canvas.width = image.width;
		canvas.height = image.height;
		canvas.getContext("2d").drawImage(image, 0, 0);

		return canvas;
	}
	</script>
	<script>var base_url = "<?php echo base_url();?>";var steps_array = [];</script>
	<style type="text/css">
		body,body h1,body h2,body h3,body h4,body h5,body h6,
		.uberAccordion > li > h1 span,
		ul.list-style-disc li,ul li
		{
			font-family: "Helvetica Neue",Helvetica,Arial,sans-serif !important;
		}
		.file-thumbnail-footer{
			display : none;
		}
		.accordionContainer li div.content{
			background-image: url("<?php echo base_url().'home_assets/images/color-innovator-chunk-bg-01.svg'; ?>");
			background-repeat:no-repeat;
			background-size: cover;
		}
		
		.formula_list li {
			margin: 10px auto;
		}
		.formula_list li h5 {
			font-size: 14px;
		}
		.request_a_sample{
			margin-top:5px;
			margin-bottom:5px;
			font-size:9px;
			padding: 0;
		}
		.swatch-gallery ul li
		{
		    width: 30%;
		}
		
		.padding_145
		{
		    padding: 20% 0; 
		}
		.logo_height_width
		{
			height: 500px;
			width:  500px;
		}

		.content:hover{/*background-color: #653232;*/}
	</style>
</head>
<body>
	<?php 
		if ($this->session->userdata('colors_list') != "") {
			$steps2 = $this->session->userdata('colors_list');
			if(is_array($steps2)){
			foreach ($steps2 as $step2) {
				$id[] = $step2['id'];
			}
			$setp2_id = implode(",", $id);
			}
		}
		?>
	<input type="hidden" id="user_id" value="<?php if ($this->session->userdata('logedin_user') != "") {
		print_r($this->session->userdata['logedin_user']['id']);
	} ?>"/>
	<input type="hidden" id="colors_ids" value="<?php if ($this->session->userdata('colors_list') != "") {
		print_r($setp2_id);
	} ?>"/>

	<header>
		<div class="container-fluid">
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<a href="<?php echo base_url(); ?>"  class="top-menu-logo"><img class="img-responsive" src="<?php echo base_url(); ?>home_assets/images/color-innovator-logo-new-ankit-test.svg" style=""></a>
				
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 hidden-xs"></div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 header_right_menu">
				<a href="http://oneco.ca/~summit-flooring/New_color_innovator/home"><img class="img-responsive" src="<?php echo base_url(); ?>home_assets/images/logo.png" style="width:100px;" ></a>
				<ul class="nav navbar-nav navbar-right nav-bar1 right_menus non_ajax_menu">
					<?php if ($this->session->userdata('logedin_user') != '') { ?>
						<li><a style="cursor:pointer;" href="#" class="edit_user_account"> Edit Account </a></li>
						<li><a style="cursor:pointer;" href="<?php echo base_url(); ?>home/view_gallery"> View Gallery </a></li>
						<li><a style="cursor:pointer;" href="<?php echo base_url(); ?>home/logout"> Logout</a></li>
					<?php } else { ?>
						<li class="login_title"><a style="cursor:pointer;" class="login-btn">Login</a></li>
						<li class="login_title"><a style="cursor:pointer;" class="register-btn">Register</a></li>
					<?php } ?>
				</ul>
				<ul class="nav navbar-nav navbar-right nav-bar1 right_menus ajax_login_menu" style="display:none;">
					<li><a style="cursor:pointer;" href="#" class="edit_user_account"> Edit Account </a></li>
					<li><a style="cursor:pointer;" href="<?php echo base_url(); ?>home/view_gallery"> View Gallery </a></li>
					<li><a style="cursor:pointer;" href="<?php echo base_url(); ?>home/logout"> Logout</a></li>
				</ul>
				
			</div>
		</div>
	</header>

<div class="accordion-wrapper">
	<div class="accordion-tab-nav">
		<ul>
			<li data-tab="step_1" class="current">
				<a class="side_tab">
					<span class="category_icon">

						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						     viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
							<style type="text/css">
								.st0{fill:none;stroke:#000000;stroke-width:2;stroke-miterlimit:10;}
							</style>
							<g>
								<circle class="st0" cx="24.8" cy="18.1" r="13"/>
								<circle class="st0" cx="32.4" cy="31.1" r="13"/>
								<circle class="st0" cx="17.4" cy="31.1" r="13"/>
								<path d="M24.9,20.5c-3,2.1-5.1,5.5-5.4,9.4c1.6,0.7,3.4,1.2,5.3,1.2c2,0,3.8-0.5,5.5-1.2C29.9,26,27.9,22.6,24.9,20.5z"/>
							</g>
						</svg>
					</span>
					<span class="cat_text">Create tile</span>
				</a>
			</li>
			<li data-tab="step_5">
				<a class="side_tab" data-id="<?php if($this->session->userdata('done_step') != ""){print_r($this->session->userdata('done_step'));}else{echo "0";}?>">
					<span class="category_icon"><img src="<?php echo base_url(); ?>home_assets/img/place-icon.svg"></span>
					<span class="cat_text">Place tile</span>
				</a>
			</li>
			<li data-tab="step_6">
				<a class="side_tab" id="last_step" data-id="<?php if($this->session->userdata('done_step') != ""){print_r($this->session->userdata('done_step'));}else{echo "0";}?>">
					<span class="category_icon">
						<img src="<?php echo base_url(); ?>home_assets/img/make-icon.svg">
					</span>
					<span class="cat_text">Customize background</span>
				</a>
			</li>
			<li data-tab="step_7">
				<a class="side_tab" id="last_step1" data-id="">
					<span class="category_icon">
						<img src="<?php echo base_url(); ?>home_assets/img/artistic-brush.svg">
					</span>
					<span class="cat_text">Customize with Logo</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="accordionContainer">
		<ul>
			<li id="step_1">
				<h1 class="title"><span>Step 1</span></h1>
				<div class="content">
					<div class="area-view">
						<div class="color-room">
							<div class="title">
								<h2>Choose Your Application</h2>
								<ul>
									<li><em class="fa fa-circle" aria-hidden="true"></em>All colors with a Coarse / Fine option may be selected twice.</li>
								</ul>
							</div>
							<div class="color-category-bar">
								<div class="custom-radio <?php if (isset($_SESSION['colors_category_list']) && !empty($_SESSION['colors_category_list'])) {
									if ($this->session->userdata['colors_category_list']["category"] == 1) {
										echo "active";
									}
								} ?>">
									<input type="radio"  name="color_category" class="cat_radio"
									       value="1" <?php if (isset($_SESSION['colors_category_list']) && !empty($_SESSION['colors_category_list'])) {
										if ($this->session->userdata['colors_category_list']["category"] == 1) {
											echo "checked";
										}
									} ?>>
									<label class="radio-icon">
										<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										     viewBox="0 0 101 50" style="enable-background:new 0 0 101 50;" xml:space="preserve" >
											<g id="Storefront_x40_2x.png">
												<g>
													<path d="M39.5,34h-6c-0.6,0-1,0.4-1,1v6c0,0.6,0.4,1,1,1h6c0.6,0,1-0.4,1-1v-6C40.5,34.4,40.1,34,39.5,34z M38.5,40h-4v-4h4V40z
														 M47.5,46h-1V20h1c0.6,0,1-0.4,1-1s-0.4-1-1-1h-1v-4c0-1.1-0.9-2-2-2h-36c-1.1,0-2,0.9-2,2v4h-1c-0.6,0-1,0.4-1,1s0.4,1,1,1h1v26
														h-1c-0.6,0-1,0.4-1,1c0,0.6,0.4,1,1,1h42c0.6,0,1-0.4,1-1C48.5,46.4,48.1,46,47.5,46z M28.5,46h-4V36h4V46z M44.5,46h-14V35
														c0-0.6-0.4-1-1-1h-6c-0.6,0-1,0.4-1,1v11h-14V24.6c0.7,0.8,1.8,1.4,3,1.4c1.2,0,2.3-0.5,3-1.4c0.7,0.8,1.8,1.4,3,1.4
														c1.2,0,2.3-0.5,3-1.4c0.7,0.8,1.8,1.4,3,1.4c1.2,0,2.3-0.5,3-1.4c0.7,0.8,1.8,1.4,3,1.4c1.2,0,2.3-0.5,3-1.4
														c0.7,0.8,1.8,1.4,3,1.4c1.2,0,2.3-0.5,3-1.4c0.7,0.8,1.8,1.4,3,1.4c1.2,0,2.3-0.5,3-1.4V46z M9.5,22v-2h4v2c0,1.1-0.9,2-2,2
														C10.4,24,9.5,23.1,9.5,22z M15.5,22v-2h4v2c0,1.1-0.9,2-2,2C16.4,24,15.5,23.1,15.5,22z M21.5,22v-2h4v2c0,1.1-0.9,2-2,2
														C22.4,24,21.5,23.1,21.5,22z M27.5,22v-2h4v2c0,1.1-0.9,2-2,2C28.4,24,27.5,23.1,27.5,22z M33.5,22v-2h4v2c0,1.1-0.9,2-2,2
														C34.4,24,33.5,23.1,33.5,22z M39.5,22v-2h4v2c0,1.1-0.9,2-2,2C40.4,24,39.5,23.1,39.5,22z M44.5,18h-36v-4h36V18z M19.5,34h-6
														c-0.6,0-1,0.4-1,1v6c0,0.6,0.4,1,1,1h6c0.6,0,1-0.4,1-1v-6C20.5,34.4,20.1,34,19.5,34z M18.5,40h-4v-4h4V40z"/>
												</g>
											</g>
											<g id="Building_x40_2x.png">
												<g>
													<path d="M61.5,22h6c0.6,0,1-0.4,1-1v-6c0-0.6-0.4-1-1-1h-6c-0.6,0-1,0.4-1,1v6C60.5,21.6,60.9,22,61.5,22z M62.5,16h4v4h-4V16z
														 M95.5,8h-1V5c0-0.6-0.4-1-1-1h-38c-0.6,0-1,0.4-1,1v3h-1c-0.6,0-1,0.4-1,1c0,0.6,0.4,1,1,1h1v37c0,0.6,0.4,1,1,1h38
														c0.6,0,1-0.4,1-1V10h1c0.6,0,1-0.4,1-1C96.5,8.4,96.1,8,95.5,8z M76.5,46h-4V36h4V46z M92.5,46h-14V35c0-0.6-0.4-1-1-1h-6
														c-0.6,0-1,0.4-1,1v11h-14V10h36V46z M92.5,8h-36V6h36V8z M81.5,22h6c0.6,0,1-0.4,1-1v-6c0-0.6-0.4-1-1-1h-6c-0.6,0-1,0.4-1,1v6
														C80.5,21.6,80.9,22,81.5,22z M82.5,16h4v4h-4V16z M81.5,32h6c0.6,0,1-0.4,1-1v-6c0-0.6-0.4-1-1-1h-6c-0.6,0-1,0.4-1,1v6
														C80.5,31.6,80.9,32,81.5,32z M82.5,26h4v4h-4V26z M61.5,32h6c0.6,0,1-0.4,1-1v-6c0-0.6-0.4-1-1-1h-6c-0.6,0-1,0.4-1,1v6
														C60.5,31.6,60.9,32,61.5,32z M62.5,26h4v4h-4V26z M71.5,32h6c0.6,0,1-0.4,1-1v-6c0-0.6-0.4-1-1-1h-6c-0.6,0-1,0.4-1,1v6
														C70.5,31.6,70.9,32,71.5,32z M72.5,26h4v4h-4V26z M81.5,42h6c0.6,0,1-0.4,1-1v-6c0-0.6-0.4-1-1-1h-6c-0.6,0-1,0.4-1,1v6
														C80.5,41.6,80.9,42,81.5,42z M82.5,36h4v4h-4V36z M61.5,42h6c0.6,0,1-0.4,1-1v-6c0-0.6-0.4-1-1-1h-6c-0.6,0-1,0.4-1,1v6
														C60.5,41.6,60.9,42,61.5,42z M62.5,36h4v4h-4V36z M71.5,22h6c0.6,0,1-0.4,1-1v-6c0-0.6-0.4-1-1-1h-6c-0.6,0-1,0.4-1,1v6
														C70.5,21.6,70.9,22,71.5,22z M72.5,16h4v4h-4V16z"/>
												</g>
											</g>
										</svg>
									</label>
									<label class="radio-text">INDOOR</label>
								</div>

								<div class="custom-radio <?php if (isset($_SESSION['colors_category_list']) && !empty($_SESSION['colors_category_list'])) {
									if ($this->session->userdata['colors_category_list']["category"] == 2) {
										echo "active";
									}
								} ?>" >
									<input type="radio" value="2" name="color_category" class="cat_radio" <?php if (isset($_SESSION['colors_category_list']) && !empty($_SESSION['colors_category_list'])) {
										if ($this->session->userdata['colors_category_list']["category"] == 2) {
											echo "checked";
										}
									} ?>>
									<label class="radio-icon">
										<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										     viewBox="0 0 101 50" style="enable-background:new 0 0 101 50;" xml:space="preserve">
												<g id="Sun">
													<g>
														<path d="M60.3,25c0-0.6-0.4-1-1-1h-6c-0.6,0-1,0.4-1,1s0.4,1,1,1h6C59.8,26,60.3,25.6,60.3,25z M85.6,15.1l4.2-4.2
															c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0l-4.2,4.2c-0.4,0.4-0.4,1,0,1.4C84.6,15.5,85.2,15.5,85.6,15.1z M63,34.9l-4.2,4.2
															c-0.4,0.4-0.4,1,0,1.4c0.4,0.4,1,0.4,1.4,0l4.2-4.2c0.4-0.4,0.4-1,0-1.4C64,34.5,63.3,34.5,63,34.9z M74.3,11c0.6,0,1-0.4,1-1V4
															c0-0.6-0.4-1-1-1s-1,0.4-1,1v6C73.3,10.6,73.7,11,74.3,11z M63,15.1c0.4,0.4,1,0.4,1.4,0c0.4-0.4,0.4-1,0-1.4l-4.2-4.2
															c-0.4-0.4-1-0.4-1.4,0c-0.4,0.4-0.4,1,0,1.4L63,15.1z M95.3,24h-6c-0.6,0-1,0.4-1,1s0.4,1,1,1h6c0.6,0,1-0.4,1-1S95.8,24,95.3,24z
															 M85.6,34.9c-0.4-0.4-1-0.4-1.4,0c-0.4,0.4-0.4,1,0,1.4l4.2,4.2c0.4,0.4,1,0.4,1.4,0c0.4-0.4,0.4-1,0-1.4L85.6,34.9z M74.3,39
															c-0.6,0-1,0.4-1,1v6c0,0.6,0.4,1,1,1s1-0.4,1-1v-6C75.3,39.4,74.8,39,74.3,39z M74.3,13c-6.6,0-12,5.4-12,12c0,6.6,5.4,12,12,12
															s12-5.4,12-12C86.3,18.4,80.9,13,74.3,13z M74.3,35c-5.5,0-10-4.5-10-10c0-5.5,4.5-10,10-10s10,4.5,10,10
															C84.3,30.5,79.8,35,74.3,35z"/>
													</g>
												</g>
											<g id="Tree">
												<g>
													<path d="M40.1,37.5L40.1,37.5L35,29h2.2c0.6,0,1-0.4,1-1c0-0.2-0.1-0.4-0.2-0.6l0,0L33.2,21h2c0.6,0,1-0.4,1-1
															c0-0.3-0.1-0.6-0.3-0.7l0,0L30.4,13h1.8c0.6,0,1-0.4,1-1c0-0.3-0.1-0.5-0.3-0.7l-8-8C24.8,3.1,24.5,3,24.2,3
															c-0.3,0-0.5,0.1-0.7,0.3l-8,8c-0.2,0.2-0.3,0.4-0.3,0.7c0,0.6,0.4,1,1,1H18l-5.5,6.3l0,0c-0.2,0.2-0.3,0.4-0.3,0.7
															c0,0.6,0.4,1,1,1h2l-4.8,6.4l0,0c-0.1,0.2-0.2,0.4-0.2,0.6c0,0.6,0.4,1,1,1h2.2l-5.1,8.5l0,0c-0.1,0.2-0.2,0.3-0.2,0.5
															c0,0.6,0.4,1,1,1h11v7c0,0.6,0.4,1,1,1h6c0.6,0,1-0.4,1-1v-7h11c0.6,0,1-0.4,1-1C40.2,37.8,40.2,37.6,40.1,37.5z M26.2,45h-4v-6h4
															V45z M11,37l5.1-8.5l0,0c0.1-0.2,0.2-0.3,0.2-0.5c0-0.6-0.4-1-1-1h-2l4.8-6.4l0,0c0.1-0.2,0.2-0.4,0.2-0.6c0-0.6-0.4-1-1-1h-1.8
															l5.5-6.3l0,0c0.2-0.2,0.3-0.4,0.3-0.7c0-0.6-0.4-1-1-1h-1.6l5.6-5.6l5.6,5.6h-1.6c-0.6,0-1,0.4-1,1c0,0.3,0.1,0.6,0.3,0.7l0,0
															L33,19h-1.8c-0.6,0-1,0.4-1,1c0,0.2,0.1,0.4,0.2,0.6l0,0l4.8,6.4h-2c-0.6,0-1,0.4-1,1c0,0.2,0.1,0.4,0.2,0.5l0,0l5.1,8.5H11z"/>
												</g>
											</g>
												</svg>
									</label>
									<label class="radio-text">OUTDOOR</label>
								</div>

							</div>
						</div>
					</div>
					<div class="">
						<div class="col-lg-12 div-btn">
							<button type="reset" name="" value="" class="btn btn-sm btn-info pull-right next_step hide">Next</button>
						</div>
					</div>
				</div>
			</li>
			<li id="step_2">
				<h1 class="title"><span>Step 2</span></h1>
				<div class="content">
					<div id="loader1" style="display:none;">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class="area-view step_2_first_area_view">
						<div class="color-room">
							<div class="title">
								<h2>Color Room</h2>
								<ul>
									<li><em class="fa fa-circle" aria-hidden="true"></em>Please select your base colors</li>
									<li><em class="fa fa-circle" aria-hidden="true"></em>Choose up to 5 colors (Black is automatically selected)</li>
									<li><em class="fa fa-circle" aria-hidden="true"></em>All colors with a Coarse / Fine option may be selected twice.</li>
								</ul>
							</div>
							<div class="color-bar">
								<ul>
									<?php
									$i = 0;
									$each_color = array();
									foreach ($colors as $color) {
										if ($color->color_title != 'Black') {
											$each_color = (array)$color;
											$i++;
											?>
											<li data-id="<?php echo $color->id; ?>" class="pick_color pc_color<?php echo $color->id; ?>" data-coarse="<?php echo $color->coarse; ?>"
											    data-fine="<?php echo $color->fine; ?>">
												<div class="color-point" style="background:url('<?php echo base_url(); ?>uploads/colors/<?php echo $color->color_img; ?>')">
													<figure><img class="img-responsive hidden" src="<?php echo base_url(); ?>uploads/colors/<?php echo $color->color_img; ?>"></figure>
													<figcaption><?php echo $color->color_title; ?></figcaption>
												</div>
											</li>
											<?php
										}
									}
									?>
								</ul>
							</div>
						</div>
						<div class="select-color-1" style="">
							<div class="select-color-2 row" style="">
								<div class="indoor_outdoor" style="padding-top:15px">
									<?php if($this->session->userdata('colors_category_list')){
							 if($this->session->userdata['colors_category_list']["category"] == 1){ echo "INDOOR"; } 
							 if($this->session->userdata['colors_category_list']["category"] == 2){ echo "OUTDOOR"; } 
						  }	?>
								</div>
								<div class="second_area_view">
									<div class="row col-lg-12 col-md-12 drop_colors">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 color_drop_section">
											<div class="col-md-12  col-xs-12 col-sm-6 col-lg-12 selected_granulas_css">
												<div class="card selected_colors">
													<img class="card-img-top" src="<?php echo base_url(); ?>uploads/colors/granule_Black.jpg">
													<div class="card-body"><div class="card-title">Black</div>
														<ul class="coarse_fine">
															<li class="fine_1 active" id="fine0_1" data-colid="0" data-count="1"><span class="fine" data-id="0" data-coarse="0" data-fine="1">Fine</span></li>
														</ul>
													</div>
												</div>
											</div>
											<?php
											if (isset($_SESSION['colors_step2_page']) && !empty($_SESSION['colors_step2_page'])) {
												print_r($this->session->userdata['colors_step2_page']);
											}
											?>
										</div>
									</div>
									
								</div>
							</div>
							<div class="col-lg-12 div-btn">
								<button type="button" name="" value="" class="btn btn-sm btn-info go_to_step1">Previous</button>
								<button type="reset" name="" value="" class="btn btn-sm btn-info  pull-right next_step2">Next</button>
							</div>
						</div>
						
					</div>
                  <!--  <button type="reset" name="" id="scroll" class="btn btn-sm btn-info">scroll >></button>
                    <button type="reset" name="" id="scroll1" class="btn btn-sm btn-info" style="float:right;"><< scroll</button>-->
				</div>
			</li>
			<li id="step_3">
				<h1 class="title"><span>Step 3</span></h1>
				<div class="content">
					<div id="loader" style="display:none;">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class="area-view">

						<div class="innovation">
							<div class="title">
								<h2>Innovation Station</h2>
								<ul >
									<li><em class="fa fa-circle" aria-hidden="true"></em>Play with the percentages of your selected colors.</li>
									<li><em class="fa fa-circle" aria-hidden="true"></em>Toggle between the Coarse and Fine options for a different look.</li>
									<li><em class="fa fa-circle" aria-hidden="true"></em>Please ensure you have selected at least 5% black.</li>
									<li><em class="fa fa-circle" aria-hidden="true"></em>Please ensure you have selected a minimum total of 15% fine granules.</li>
									<li><em class="fa fa-circle" aria-hidden="true"></em>Percentages can be comprised of a maximum of 5 colors plus black.</li>
								</ul>
							</div>
							
                            <div class="indoor_outdoor">
                            <?php if($this->session->userdata('colors_category_list')){
									if($this->session->userdata['colors_category_list']["category"] == 1){ echo "INDOOR"; }
                                	if($this->session->userdata['colors_category_list']["category"] == 2){ echo "OUTDOOR"; }
								  }	?>
                            </div>
							<div class="Product">
								<div class="add_extra">
									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 step2_selected_granulas1_0" id="delete_part1" data-count_var="0">
										<div class="Product-part">
											<figure><img class="img-responsive" src="<?php echo base_url(); ?>/uploads/colors/granule_Black.jpg"></figure>
											<div class="Product-desc">
												<h5>Black</h5>
												<ul class="coarse_fine">
													<li id="fine1_0" data-colid="1" class="fine_1 active fine_1_1_0" data-count="0"><span>Fine</span></li>
												</ul>
												<div class="progress">
													<div class="progress-value progress-value1_0">5%</div>
												</div>
												<div  class="slider_dropdown" style="width:100%;">
													<input type="button" value="-" class="qtyminus" field="slider_value_text1_0" style="width:20%;">
													<input type="number" name="slider_value_text1_0" id="slider_value_text1_0" value="0" min="0" max="100" class="slider_text_box" data-cnt="0" data-id="1" readonly style="width:50%;">
													<input type="button" value="+" class="qtyplus" field="slider_value_text1_0" style="width:20%;">
												</div>
												<div class="color_slider slider_range" data-id='1' aria-disabled="false" style="width: 100%;" id="slide01" data-hexcode="#000000"
												     data-count="0">
												</div>

											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p0">
									<div class="tootle-progress">
										<h6>Progress</h6>
										<div class="progress yellow">
											<div class="progress-value tot_progress">0%</div>
											<!--<div class="progress-bar" style="width:50%;"> </div>-->
										</div>
										<div style="" class="progress_color_div"></div>
										<input type="hidden" name="tot_progress_input" id="tot_progress_input"/>
										<div class="slider_range_total" aria-disabled="false" style="width: 100%;">
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p0">
									<div class="btn">
										<button type="reset" name="reset" id="reset">reset</button>
										<button type="button" name="mix_it" id="mix_it">mix it</button>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 p0" style="margin-top:20px;">
									<button class="back_to_step2 btn btn-sm btn-info">Previous</button>
							</div>
						</div>
					</div>
					
				</div>
			</li>
			<li id="step_4">
				<h1 class="title"><span>Step 4</span></h1>
				<div class="content">
					<div class="loader" style="display:none;">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class="area-view">
						<div class="custom-swatch">
							<div class="title">
								<h2>Your Custom Swatch</h2>
							</div>
							<div class="cs-content">
								<div class="col-md-2 col-xs-12 p0 text-center">
									<div class="cs-img-box">
										<figure><img src="<?php echo base_url(); ?>home_assets/img/paper-smooth-white_13_2_1_1.jpg" class="img-responsive result_image"/>
										</figure>
									</div>
									<div class="cs-overlay">
										<ul>
											<li><a><em class="fa fa-search zoom"></em></a></li>
											<li><a><em class="fa fa-trash delete_res"></em></a></li>
											<li><a><em class="fa fa-facebook fb_share"></em></a></li>
											<li><a><em class="fa fa-twitter twitter_share"></em></a></li>
										</ul>
									</div>
									<button type="button" id="create_new_swatch" class="btn btn-info btn-sm reset_and_go_to_step1" name="create_new_swatch" style="font-size:10px;padding:10px;">Create New Swatch</button>
								</div>
								<div class="col-md-4 col-xs-12 p0">
									
									<div class="sm-info">
										<span>Save your creation to the album and test with pre-defined floor view.</span>
										<div class="my-sm-pencil sm-pencil">
											<div class="form-group has-feedback">
												<input type="text" class="form-control" id="swatch_name" name="swatch_name" placeholder="Name this swatch"/>
												<span class="fa fa-pencil-square-o form-control-feedback"></span>
											</div>
										</div>
										<div class="indoor_outdoor">
                                        <?php if($this->session->userdata('colors_category_list')){
												if($this->session->userdata['colors_category_list']["category"] == 1){ echo "INDOOR"; }
												if($this->session->userdata['colors_category_list']["category"] == 2){ echo "OUTDOOR"; } 
											  }	?>
										</div>
										<div class="sm-title">
											<h4>Your Formula</h4>
										</div>
										<ul class="sm-meta">
											<li>Black - <span>Fine</span> - 0%</li>
										</ul>
										<div class="sm-button">
											<button type="button" id="save_to_gallery" class="btn btn-primary" name="save_to_gallery">Save To Album</button>
											<button type="button" id="send_to_email" name="send_to_email" class="btn btn-secondary" style="display:none;">Send To Email</button>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-xs-12">
									<div class="swatch-gallery">
									<h4>Saved Swatch Gallery</h4>
									<div class="row save_to_gallery_section">
										<?php 
											$indoor_swatches = array();
											$outdoor_swatches = array();
											$saved_album_session = $this->session->userdata('saved_album_session');
											if($saved_album_session && !empty($saved_album_session)){
												if(array_key_exists(1,$saved_album_session) && !empty($saved_album_session[1])){
													$indoor_swatches = $saved_album_session[1];
												}
												if(array_key_exists(2,$saved_album_session) && !empty($saved_album_session[2])){
													$outdoor_swatches = $saved_album_session[2];
												}
											}
										?>
										<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="text-align:left;"><h5>Indoor</h5>
										<ul class='saved-swatch indoor_swatchs'>
											<?php if(count($indoor_swatches)>0 && !empty($indoor_swatches)){ 
													$i = 0;
													foreach($indoor_swatches as $swatch_id){
														$swatch_details = $this->common_model->get_single('saved_album',array('id'=>$swatch_id));
														if($swatch_details!=false){
											?>
											<li id="del<?php echo $i; ?>" class="delele_swatch_step4<?php echo $swatch_details['id']; ?>" data-id="<?php echo $swatch_details['id']; ?>" data-catid="1">
												<figure>
													<img src="<?php echo base_url(); ?>images/<?php echo $swatch_details['org_image_name']; ?>" class="img-responsive zoom_image_small" data-id="<?php echo $swatch_details['id']; ?>">
													<a class="sg-close">
														<em class="fa fa-times del" data-id="<?php echo $swatch_details['id']; ?>" data-catid="1" aria-hidden="true"></em>
													</a>
												</figure>
												<a  href="<?php echo base_url().'home/request_sample_swatch/'.$swatch_details['id']; ?>" data-id="<?php echo $swatch_details['id']; ?>" class="btn btn-sm btn-info  request_sample_btn col-xs-12" >Request Sample</a>
											</li>
											<?php } $i++; } } ?>
										</ul>
										</div>	
										<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="text-align:left;"><h5>Outdoor</h5>
										<ul class='saved-swatch outdoor_swatchs'>
											<?php if(count($outdoor_swatches)>0 && !empty($outdoor_swatches)){ 
													$i = 0;
													foreach($outdoor_swatches as $swatch_id){
														$swatch_details = $this->common_model->get_single('saved_album',array('id'=>$swatch_id));
														if($swatch_details!=false){
											?>
											<li id="del<?php echo $i; ?>" class="delele_swatch_step4<?php echo $swatch_details['id']; ?>" data-id="<?php echo $swatch_details['id']; ?>" data-catid="2">
												<figure>
													<img src="<?php echo base_url(); ?>images/<?php echo $swatch_details['org_image_name']; ?>" class="img-responsive zoom_image_small" data-id="<?php echo $swatch_details['id']; ?>">
													<a class="sg-close">
														<em class="fa fa-times del" data-id="<?php echo $swatch_details['id']; ?>" data-catid="2" aria-hidden="true"></em>
													</a>
												</figure>
												
												<a   href="<?php echo base_url().'home/request_sample_swatch/'.$swatch_details['id']; ?>" data-id="<?php echo $swatch_details['id']; ?>" class="btn btn-sm btn-info request_sample_btn col-xs-12">Request Sample</a>
											</li>
											<?php } $i++; } } ?>
										</ul>
										</div>	
									</div>
								</div>
									<div class="space-reduce save_to_gallery_section" style="text-align:left;">
											<span>Please Login/Register before you save the swatches to the gallery.</span>

											<input type="text" placeholder="Gallery Name" id="save_to_gallery_text" name="save_to_gallery_text" class="form-control" value="<?php if($user_gallery!= false){ echo $user_gallery['gallery_name']; } ?>" <?php if($user_gallery!= false){ echo "readonly"; } ?> />
										<div class="col-lg-12 col-md-12 col-xs-12 but-class" style="">
											<div class="row">
												<button id="gallery_btn" class="btn btn-sm btn-success" style="margin-right: 12px;">Save To Gallery</button>
											</div>	
										</div>
									</div>

									
								</div>
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right" style="margin-top: 10px;">
									<div class="row">
										<button  class="btn btn-sm btn-info back_to_step3">Previous</button>		
										<button id="test_btn" class="btn btn-sm btn-info">Next</button>
									</div>
								</div>													 
								<input type="hidden" name="created_gallery_id" id="created_gallery_id" value="<?php echo ($user_gallery!=false)?$user_gallery['id']:""; ?>" />
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<!-- <button id="test_btn" class="btn btn-sm btn-info  pull-right ">Next</button>-->
	<div class="container place_section" style="display:none;">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 20px;margin-top: 20px;text-align:center;">
				<input type="button" name="indoor" id="indoor" value="Indoor" class='btn btn-info btn-sm indoor_outdoor_slider active' />
				<input type="button" name="outdoor" id="outdoor" value="Outdoor" class='btn btn-info btn-sm indoor_outdoor_slider' />
			</div>	
			<div class="col-md-12 col-sm-12 col-xs-12 indoor_slider">
				<div class="owl-carousel1 owl-carousel" >
					<div class="active_image"><img src="<?php echo base_url(); ?>home_assets/slider_images/indoor/Commercial-cutout.png"/></div>
					<div><img src="<?php echo base_url(); ?>home_assets/slider_images/indoor/Office-cutout.png"/></div>
					<div><img src="<?php echo base_url(); ?>home_assets/slider_images/indoor/floor_view_1.png"/></div>
					<div><img src="<?php echo base_url(); ?>home_assets/slider_images/indoor/floor_view_2.png"/></div>
					<div><img src="<?php echo base_url(); ?>home_assets/slider_images/indoor/floor_view_3.png"/></div>
				</div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 outdoor_slider">
				<div class="owl-outdoor owl-carousel" >
					<div class="active_image"><img src="<?php echo base_url(); ?>home_assets/slider_images/outdoor/color-innovator-playground.png"/></div>
					<div><img src="<?php echo base_url(); ?>home_assets/slider_images/outdoor/color-innovator-rooftop.png"/></div>
					<div><img src="<?php echo base_url(); ?>home_assets/slider_images/outdoor/color-innovator-patio.png"/></div>
					<div><img src="<?php echo base_url(); ?>home_assets/slider_images/outdoor/color-innovator-outdoor-04.png"/></div>
					<div><img src="<?php echo base_url(); ?>home_assets/slider_images/outdoor/color-innovator-outdoor-05.png"/></div>
					<div><img src="<?php echo base_url(); ?>home_assets/slider_images/outdoor/color-innovator-outdoor-06.png"/></div>
					<div><img src="<?php echo base_url(); ?>home_assets/slider_images/outdoor/color-innovator-outdoor-07.png"/></div>
					<div><img src="<?php echo base_url(); ?>home_assets/slider_images/outdoor/color-innovator-outdoor-08.png"/></div>
					<div><img src="<?php echo base_url(); ?>home_assets/slider_images/outdoor/color-innovator-outdoor-09.png"/></div>
				</div>
			</div>
		</div>
		
	
		<div class="col-md-12 col-sm-12 col-xs-12 place_image_section">
			<div class="col-md-8">
				<div class="col-md-12 div_img">
					<img id="place_image_div" src="<?php echo base_url(); ?>home_assets/slider_images/indoor/Commercial-cutout.png" style=""/>
				</div>
			</div>
			<div class="col-md-4">
				 <?php 
						$saved_albums = $this->session->userdata('saved_album_session');
						if($saved_albums!=''){ 
							if(array_key_exists(1,$saved_albums) && count($saved_albums[1])>0){
				?>

				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list indoor_place_swatches place_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Indoor Albums From Saved</h6></div>
					<div  class="swatches">
                	 <?php 

							foreach($saved_albums[1] as $album){ 
								$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album));
								if($get_single_album['category_id'] == 1){
					?>
						 <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
						   <div class="inner_div">
							   <img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" data-id="<?php echo $get_single_album['id']; ?>" >
						   </div>
						   <a  href="<?php echo base_url().'home/request_sample_swatch/'.$get_single_album['id']; ?>" data-id="<?php echo $get_single_album['id']; ?>" class="btn btn-sm btn-info  request_sample_btn col-xs-12" >Request Sample</a>
						</div>

					<?php }} ?>
					</div>
				</div>
				<?php }} ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list indoor_place_swatches1 place_img" style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Indoor Albums From Saved</h6></div>
					<div  class="swatches">
					</div>
				</div>	
				<?php 
					if($gallery_indoor_albums!=false){ 
				?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list indoor_gallery_swatches1 place_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Indoor Albums From Gallery</h6></div>
				<?php 
						foreach($gallery_indoor_albums as $album){	
				?>
				   <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
					   <div class="inner_div">
						   <img src="<?php echo base_url(); ?>images/<?php echo $album['org_image_name']; ?>" data-id="<?php echo $album['id']; ?>" >
					   </div>
					   <a  href="<?php echo base_url().'home/request_sample_swatch/'.$album['id']; ?>" data-id="<?php echo $album['id']; ?>" class="btn btn-sm btn-info request_sample_btn col-xs-12" >Request Sample</a>
					</div>

				<?php  } ?>
					</div>
				<?php } ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list indoor_gallery_swatches place_img" style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Indoor Albums From Gallery</h6></div>
					<div class="swatches"> </div>
				</div>
				 <?php 
						$saved_albums = $this->session->userdata('saved_album_session');
						if($saved_albums!=''){ 
							if(array_key_exists(2,$saved_albums) && count($saved_albums[2])>0){ ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list outdoor_place_swatches place_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Outdoor Albums From Saved</h6></div>
					<div class="swatches"> 
                	<?php 

							foreach($saved_albums[2] as $album){ 
								$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album));
								if($get_single_album['category_id'] == 2){
					?>
						 <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
						   <div class="inner_div">
							   <img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" data-id="<?php echo $get_single_album['id']; ?>" >
						   </div>
						   <a  href="<?php echo base_url().'home/request_sample_swatch/'.$get_single_album['id']; ?>" data-id="<?php echo $get_single_album['id']; ?>" class="btn btn-sm btn-info request_sample_btn col-xs-12" >Request Sample</a>
						</div>

					<?php } } ?>
					</div>
				</div>
				<?php }} ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list outdoor_place_swatches1 place_img"  style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Outdoor Albums From Saved</h6></div>
					<div class="swatches"> </div>
				</div>	
				<?php 
					if($gallery_outdoor_albums!=false){ 
				?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list outdoor_gallery_swatches1 place_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Outoor Albums From Gallery</h6></div>
				<?php 
						foreach($gallery_outdoor_albums as $album){	
				?>
				   <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
					   <div class="inner_div">
						   <img src="<?php echo base_url(); ?>images/<?php echo $album['org_image_name']; ?>" data-id="<?php echo $album['id']; ?>" >
					   </div>
					   <a  href="<?php echo base_url().'home/request_sample_swatch/'.$album['id']; ?>" data-id="<?php echo $album['id']; ?>" class="btn btn-sm btn-info  request_sample_btn col-xs-12" >Request Sample</a>
					</div>

				<?php  } ?>
					</div>
				<?php } ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list  outdoor_gallery_swatches place_img" style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Outdoor Albums From Gallery</h6></div>
					<div class="swatches"> </div>
				</div>
				
				<div class="col-md-12 col-xs-12 paddingzero" >
					<div class="col-lg-12 col-md-12 paddingzero">
						<input type="text" placeholder="Gallery Name" id="save_to_gallery_text1" name="save_to_gallery_text1" value="<?php if($user_gallery!= false){ echo $user_gallery['gallery_name']; } ?>" <?php if($user_gallery!= false){ echo "readonly"; } ?> class="form-control"/>
					</div>
					<br>
					<br>
					<div class="col-lg-12 col-md-12  paddingzero">
						<button id="gallery_btn1" class="btn btn-sm btn-success" style="margin-right: 12px;">Save To Gallery</button>
					</div>
					<div class="col-lg-12 col-md-12 paddingzero" style="margin-top:20px;">
						<button class="back_on_mix btn btn-sm btn-info">Previous</button>
						<button id="make_sec_btn" class="btn btn-sm btn-info">Next</button>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php //print_r($last_img);die; ?>
	<div class="container make_section" style="display:none;">
		<div class="before_login" style="display:none;" >
			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;margin-top: 20px;">
				<span>
					<?php if($settings!=false){ 
						echo $settings['make_section_content'];
					 } ?>
				</span>
				<br />
				
				
				<?php if ($this->session->userdata('logedin_user') != '') { ?>
					<button class="btn btn-sm btn-info make_next">Next</button>
				<?php } else { ?>
					<button class="btn btn-sm btn-success login_title1">Login</button>
					<button class="btn btn-sm btn-success login_title1">Register</button>
				<?php } ?> 
				<button class="btn btn-sm btn-info ajax_login_make_next make_next" style="display:none;" >Next</button>
				
			</div>	
		</div>	
		<div class="after_login" style="display:none;">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom:20px;">
				<div class="file-loading">
					<input  name="browse_custom_image" id="browse_custom_image" type="file">
				</div>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 make_image_section">
			<div class="col-md-8 col-sm-12 col-xs-12" >
				<div class="col-md-12 div_img">
					<img id="make_image_div" src="" style="display:none;"/>
                    <div id="make_image_div_overlay" style="display:none;"></div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<?php $saved_albums = $this->session->userdata('saved_album_session');
						if($saved_albums!=''){ 
							if(array_key_exists(1,$saved_albums) && count($saved_albums[1])>0){

 				?>
                <div class="col-md-12 col-sm-12 col-xs-12 saved_result_list indoor_place_swatches make_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Indoor Albums From Saved</h6></div>
					<div  class="swatches">
                	 <?php 
						
							foreach($saved_albums[1] as $album){ 
								$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album));
								if($get_single_album['category_id'] == 1){
					?>
						 <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
						   <div class="inner_div">
							   <img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" data-id="<?php echo $get_single_album['id']; ?>" >
						   </div>
						   <a href="<?php echo base_url().'home/request_sample_swatch/'.$get_single_album['id']; ?>" data-id="<?php echo $get_single_album['id']; ?>" class="btn btn-sm btn-info  request_sample_btn col-xs-12" >Request Sample</a>
						</div>

					<?php } } ?>
					</div>
				</div>
				<?php }} ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list indoor_place_swatches1 make_img" style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Indoor Albums From Saved</h6></div>
					<div  class="swatches">
					</div>
				</div>
				
				<?php 
					if($gallery_indoor_albums!=false){ 
				?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list make_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Indoor Albums From Gallery</h6></div>
				<?php 
						foreach($gallery_indoor_albums as $album){	
				?>
				   <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
					   <div class="inner_div">
						   <img src="<?php echo base_url(); ?>images/<?php echo $album['org_image_name']; ?>" data-id="<?php echo $album['id']; ?>" >
					   </div>
					   <a href="<?php echo base_url().'home/request_sample_swatch/'.$album['id']; ?>" data-id="<?php echo $album['id']; ?>" class="btn btn-sm btn-info request_sample_btn col-xs-12">Request Sample</a>
					</div>

				<?php  } ?>
					</div>
				<?php } ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list make_img indoor_gallery_swatches" style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Indoor Albums From Gallery</h6></div>
					<div class="swatches"> </div>
				</div>
				<?php 	$saved_albums = $this->session->userdata('saved_album_session');
						if($saved_albums!=''){ 
							if(array_key_exists(2,$saved_albums) && count($saved_albums[2])>0){ ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list outdoor_place_swatches make_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Outdoor Albums From Saved</h6></div>
					<div class="swatches"> 
                	 <?php 
					

							foreach($saved_albums[2] as $album){ 
								$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album));
								if($get_single_album['category_id'] == 2){
					?>
						 <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
						   <div class="inner_div">
							   <img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" data-id="<?php echo $get_single_album['id']; ?>" >
						   </div>
						   <a href="<?php echo base_url().'home/request_sample_swatch/'.$get_single_album['id']; ?>"  data-id="<?php echo $get_single_album['id']; ?>" class="btn btn-sm btn-info request_sample_btn col-xs-12" >Request Sample</a>
						</div>

					<?php } } ?>
					</div>
				</div>
				<?php }} ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list outdoor_place_swatches1 make_img"  style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Outdoor Albums From Saved</h6></div>
					<div class="swatches"> </div>
				</div>	
				<?php 
					if($gallery_outdoor_albums!=false){ 
				?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list make_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Outdoor Albums From Gallery</h6></div>
				<?php 
						foreach($gallery_outdoor_albums as $album){	
				?>
				   <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
					   <div class="inner_div">
						   <img src="<?php echo base_url(); ?>images/<?php echo $album['org_image_name']; ?>" data-id="<?php echo $album['id']; ?>" >
					   </div>
					   <a  href="<?php echo base_url().'home/request_sample_swatch/'.$album['id']; ?>" data-id="<?php echo $album['id']; ?>" class="btn btn-sm btn-info request_sample_btn col-xs-12" >Request Sample</a>
					</div>

				<?php  } ?>
					</div>
				<?php } ?>
                	
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list make_img outdoor_gallery_swatches" style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Outdoor Albums From Gallery</h6></div>
					<div class="swatches"> </div>
				</div>
				
				<div class="col-md-12 col-xs-12 paddingzero" >
					<div class="col-lg-12 col-md-12 paddingzero">
						<input type="text" placeholder="Gallery Name" id="save_to_gallery_text2" name="save_to_gallery_text2"  value="<?php if($user_gallery!= false){ echo $user_gallery['gallery_name']; } ?>" <?php if($user_gallery!= false){ echo "readonly"; } ?> class="form-control"/>
					</div>
					<br>
					<br>
					<div class="col-lg-12 col-md-12 paddingzero">
						<button id="gallery_btn2" class="btn btn-sm btn-success" style="margin-right: 12px;">Save To Gallery</button>
						
					</div>
					<div class="col-lg-12 col-md-12 paddingzero" style="margin-top:20px;">
						<button class="back_on_place btn btn-sm btn-info">Previous</button>
						<button id="logo_sec_btn" class="btn btn-sm btn-info">Next</button>
					</div>
				</div>
			</div>
		</div>
		</div>	
	</div>
	<div class="container logo_section" style="display:none;">
		<div class="before_login" style="display:none;" >
			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;margin-top: 20px;">
				<span>
					<?php if($settings!=false){ 
						echo $settings['logo_section_content'];
					 } ?>
				</span>
				<br />
				
				
				<?php if ($this->session->userdata('logedin_user') != '') { ?>
					<button class="btn btn-sm btn-info logo_next">Next</button>
				<?php } else { ?>
					<button class="btn btn-sm btn-success login_title2">Login</button>
					<button class="btn btn-sm btn-success login_title2">Register</button>
				<?php } ?> 
				<button class="btn btn-sm btn-info ajax_login_logo_next logo_next" style="display:none;" >Next</button>
				
			</div>	
		</div>
		<div class="after_login" style="display:none;">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom:20px;">
				<div class="file-loading">
					<input  name="browse_custom_image2" id="browse_custom_image2" type="file">
				</div>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="owl-carousel2 owl-carousel" >
					<?php 
						if($logo_images!=false){ 
							foreach($logo_images as $image){
					?>
						<div class="item"><img src="<?php echo base_url().'uploads/user_logo_images/'.$image['user_id'].'/'.$image['image_name']; ?>" /></div>
					<?php
							}
						}
					?>
				</div>
			</div>
		</div>
		
		<div class="col-md-12 col-sm-12 col-xs-12 logo_image_section">
			<div class="col-md-6 col-md-offset-1">
				<div class="col-md-12 div_logo_img">
						<img id="logo_image_div" src="<?php echo base_url(); ?>home_assets/img/logo.png" style=""/>
				</div>
				<div class="col-lg-12 col-md-12 " style="text-align:center;margin-top:10px;">
					<button id="send_to_mail_with_logo" class="btn btn-sm btn-success" style="margin-right: 12px;">Send To Email</button>
				</div>
			</div>
			<div class="col-md-4">
				<?php $saved_albums = $this->session->userdata('saved_album_session');
						if($saved_albums!=''){ 
							if(array_key_exists(1,$saved_albums) && count($saved_albums[1])>0){

				?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list indoor_logo_swatches logo_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Indoor Albums From Saved</h6></div>
					<div  class="swatches">
                	 <?php 
						
							foreach($saved_albums[1] as $album){ 
								$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album));
								if($get_single_album['category_id'] == 1){
					?>
						 <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
						   <div class="inner_div">
							   <img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" data-id="<?php echo $get_single_album['id']; ?>" >
						   </div>
						   <a href="<?php echo base_url().'home/request_sample_swatch/'.$get_single_album['id']; ?>" data-id="<?php echo $get_single_album['id']; ?>" class="btn btn-sm btn-info request_sample_btn col-xs-12" >Request Sample</a>
						</div>

					<?php } } ?>
					</div>
				</div>
				<?php }} ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list indoor_logo_swatches1 logo_img" style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Indoor Albums From Saved</h6></div>
					<div  class="swatches">
					</div>
				</div>	
				<?php 
					if($gallery_indoor_albums!=false){ 
				?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list logo_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Indoor Albums From Gallery</h6></div>
				<?php 
						foreach($gallery_indoor_albums as $album){	
				?>
				   <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
					   <div class="inner_div">
						   <img src="<?php echo base_url(); ?>images/<?php echo $album['org_image_name']; ?>" data-id="<?php echo $album['id']; ?>" >
					   </div>
					   <a href="<?php echo base_url().'home/request_sample_swatch/'.$album['id']; ?>" data-id="<?php echo $album['id']; ?>" class="btn btn-sm btn-info request_sample_btn col-xs-12" >Request Sample</a>
					</div>

				<?php  } ?>
					</div>
				<?php } ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list logo_img indoor_gallery_swatches" style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Indoor Albums From Gallery</h6></div>
					<div class="swatches"> </div>
				</div>
				 <?php 
					$saved_albums = $this->session->userdata('saved_album_session');
					if($saved_albums!=''){ 
						if(array_key_exists(2,$saved_albums) && count($saved_albums[2])>0){ ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list outdoor_logo_swatches logo_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Outdoor Albums From Saved</h6></div>
					<div class="swatches"> 
                	<?php 
						foreach($saved_albums[2] as $album){ 
							$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album));
							if($get_single_album['category_id'] == 2){
					?>
						 <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
						   <div class="inner_div">
							   <img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" data-id="<?php echo $get_single_album['id']; ?>" >
						   </div>
						   <a href="<?php echo base_url().'home/request_sample_swatch/'.$get_single_album['id']; ?>"  data-id="<?php echo $get_single_album['id']; ?>" class="btn btn-sm btn-info request_sample_btn col-xs-12">Request Sample</a>
						</div>

					<?php } }?>
					</div>
				</div>
				<?php }}  ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list outdoor_logo_swatches1 logo_img"  style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Outdoor Albums From Saved</h6></div>
					<div class="swatches"> </div>
				</div>	
				<?php 
					if($gallery_outdoor_albums!=false){ 
				?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list logo_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Outoor Albums From Gallery</h6></div>
				<?php 
						foreach($gallery_outdoor_albums as $album){	
				?>
				   <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
					   <div class="inner_div">
						   <img src="<?php echo base_url(); ?>images/<?php echo $album['org_image_name']; ?>" data-id="<?php echo $album['id']; ?>" >
					   </div>
					   <a href="<?php echo base_url().'home/request_sample_swatch/'.$album['id']; ?>"  data-id="<?php echo $album['id']; ?>" class="btn btn-sm btn-info request_sample_btn col-xs-12" >Request Sample</a>
					</div>

				<?php  } ?>
					</div>
				<?php } ?>
				
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list logo_img outdoor_gallery_swatches" style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Outdoor Albums From Gallery</h6></div>
					<div class="swatches"> </div>
				</div>
				
				<?php /*<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list transparent_logo_swatches">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Transparent Logo Swatch</h6></div>
					<div  class="swatches indoor">
                	 <?php 
						$saved_albums = $this->session->userdata('saved_album_session');
						if($saved_albums!=''){ 
							if(array_key_exists(1,$saved_albums) && count($saved_albums[1])>0){

							foreach($saved_albums[1] as $album){ 
								$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album));
								if($get_single_album['category_id'] == 1){
					?>
						 <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
						   <div class="inner_div">
							   <img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" data-id="<?php echo $get_single_album['id']; ?>" >
						   </div>
						   <a data-id="<?php echo $get_single_album['id']; ?>" class="btn btn-sm btn-info request_a_sample request_sample_btn col-xs-12">Request Sample</a>
						</div>

					<?php } }}} ?>
					</div>
					<div class="swatches outdoor"> 
                	 <?php 
						$saved_albums = $this->session->userdata('saved_album_session');
						if($saved_albums!=''){ 
							if(array_key_exists(2,$saved_albums) && count($saved_albums[2])>0){

							foreach($saved_albums[2] as $album){ 
								$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album));
								if($get_single_album['category_id'] == 2){
					?>
						 <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
						   <div class="inner_div">
							   <img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" data-id="<?php echo $get_single_album['id']; ?>" >
						   </div>
						   <a data-id="<?php echo $get_single_album['id']; ?>" class="btn btn-sm btn-info request_a_sample request_sample_btn col-xs-12">Request Sample</a>
						</div>

					<?php } }}} ?>
					</div>
				</div>*/ ?>
				<div class="col-md-12 col-xs-12 paddingzero" >
					<div class="col-lg-12 col-md-12 paddingzero">
						<input type="text" placeholder="Gallery Name" id="save_to_gallery_text1" name="save_to_gallery_text1" value="<?php if($user_gallery!= false){ echo $user_gallery['gallery_name']; } ?>" <?php if($user_gallery!= false){ echo "readonly"; } ?> class="form-control"/>
					</div>
					<br>
					<br>
					<div class="col-lg-12 col-md-12  paddingzero">
						<button id="gallery_btn1" class="btn btn-sm btn-success" style="margin-right: 12px;">Save To Gallery</button>
					</div>
					<div class="col-lg-12 col-md-12 paddingzero" style="margin-top:20px;">
						<button class="back_on_make btn btn-sm btn-info">Previous</button>
					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		</div>	
	</div>	
</div>

<?php  $this->load->view('modal_popup_files'); ?>
<script src="<?php echo base_url(); ?>home_assets/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
    This must be loaded before fileinput.min.js -->
<script src="<?php echo base_url(); ?>home_assets/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for 
    HTML files. This must be loaded before fileinput.min.js -->
<script src="<?php echo base_url(); ?>home_assets/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js 
   3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>home_assets/js/fileinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>home_assets/js/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/js/jquery.accordionjs.js"></script>
<!--<script src="<?php echo base_url(); ?>home_assets/owlcarousel/owl.carousel.min.js" type="text/javascript"></script>-->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.min.js"></script>	
<script src="<?php echo base_url(); ?>FlexSlider-master/demo/js/jquery.flexslider.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/js/scripts.js?v=<?php echo date('YmdHis'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/js/techybirds.js"></script>

	<script type="text/javascript">
	function convertCanvasToImage(canvas) {
		var image = new Image();
		image.src = canvas.toDataURL("image/png");
		return image;
	}
	function desaturateImage(image, transheight){
			if($("canvas").html()!=undefined){
				//$("canvas").remove();
				$(".div_img").append(image);
				image = document.getElementById("make_image_div");
			}
			
			
			$(".div_img").css("height",'555px');
			$(".div_img").css("width",'100%');
			
		}
	$(document).ready(function () {
		
		var $el1 = $("#browse_custom_image");
		$el1.fileinput({
		
			uploadAsync :true,
			overwriteInitial: false,
			maxFileSize: 1000,
			showClose: false,
			showRemove:false,
			showCaption: false,
			showPreview :true,
			browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
			browseLabel:'Browse',
			showUploadedThumbs:false,
			initialPreviewShowDelete:false,
			previewIcon:false,
			showUpload:false,
			elErrorContainer: '#kv-avatar-errors-1',
			msgErrorClass: 'alert alert-block alert-danger',
			//allowedFileExtensions: ["jpg", "png", "jpeg"],
			allowedFileExtensions: ["png"],
			uploadUrl: base_url+'Color_innovator/add_custom_photos', 
			uploadExtraData: function() {
			return {
				  userid: $('#user_id').val(),
			 };			
			}
			
		}).on("filebatchselected", function(event, files) {
			$el1.fileinput("upload");
		});
		$el1.on('filepreupload', function(e, params) {
			if($("#make_image_div").length >0){
				//$("canvas").remove();
				$("#make_image_div").attr('src', params.reader.result);
				$("#make_image_div").css('display','block');
			}
			else{
				//$("canvas").remove();
				$(".div_img").append('<img id="make_image_div" src="'+params.reader.result+'" style="display:block;" />');
			}
			var sampleImage = document.getElementById("make_image_div");
			desaturateImage(sampleImage,'30');
		});
		var $el2 = $("#browse_custom_image2");
		$el2.fileinput({
			uploadAsync :true,
			overwriteInitial: false,
			maxFileSize: 1000,
			showClose: false,
			showRemove:false,
			showCaption: false,
			showPreview :true,
			browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
			browseLabel:'Browse',
			showUploadedThumbs:false,
			initialPreviewShowDelete:false,
			previewIcon:false,
			showUpload:false,
			elErrorContainer: '#kv-avatar-errors-1',
			msgErrorClass: 'alert alert-block alert-danger',
			//allowedFileExtensions: ["jpg", "png", "jpeg","svg","gif"],
			allowedFileExtensions: ["png"],
			uploadUrl: base_url+'home/upload_logo_images', 
			/*uploadExtraData: function() {
			return {
				  userid: $('#user_id').val(),
			 };
			}*/
		}).on("filebatchselected", function(event, files) {
			$el2.fileinput("upload");			
		});
		$el2.on('fileuploaded', function(event, data, previewId, index) {
			$.ajax({
				url:base_url+'home/get_user_logos_slider',
				type:'POST',
				data:{},
				success:function(res){
					var result = $.parseJSON(res);
					$(".owl-carousel2").html(result);
					$(".owl-carousel2").css('display','block');
					//console.log(data);
					//console.log('uploaded');
					
				},
				complete:function(res){
					$('.owl-carousel2').trigger('destroy.owl.carousel');
					$(".owl-carousel2").owlCarousel({
						loop: false,
						margin: 10,
						responsiveClass: true,
						responsive: {
							0: {
								items: 2,
								nav: false,
							},
							600: {
								items: 3,
								nav: false
							},
							1000: {
								items: 4,
								nav: false,
							},
							1200: {
								items: 5,
								nav: false
							}

						}
					});

				}
			});
			
		});
		$("#last_step").click(function(){
			$("#make_sec_btn").trigger('click');
		});
		$("#logo_sec_btn").click(function(){
			$("#last_step1").trigger('click');
		});
		
		$('#scroll').click(function() {
			$(".color-bar").animate({scrollLeft: 500 - 200}, 800);
		});
		
		$('#scroll1').click(function() {
			$(".color-bar").animate({scrollLeft: 0 - 200}, 800);
		});
		
		if($(window).width() >= 789){
			$('#scroll').css("display","none");
			$('#scroll1').css("display","none");
		}
		var html_content;
		$(".pick_color").draggable({
			revert: true, helper: "clone",
			cursor: "move", revertDuration: 0
		});
		
		$(".drop_colors").droppable({
			drop: function (event, ui) {
				//alert($(".selected_granulas#"+$(ui.draggable[0]).data('id')).length);
				var col_id = $(ui.draggable[0]).data('id');
				$.ajax({
					'url': base_url + "home/get_single_details_colors",
					"method": 'POST',
					"data": {'color_id': col_id},
					success: function (res) {
						//console.log($.parseJSON(res));
						html_content = $.parseJSON(res);
					},
					complete: function (res) {
						if ($(".selected_granulas").length > 4) {
							$.alert({
								title: 'Oops!!',
								content: 'You already have the maximum amount of colors selected',
								type: 'red',
								boxWidth: '300px',
								useBootstrap: true,
								typeAnimated: false,
							});
						}
						else if ($(".selected_granulas" + html_content.id).length >= 2 && html_content.coarse == 1 && html_content.fine == 1) {
							$.alert({
								title: 'Oops!!',
								content: 'You already have the maximum amount of this color',
								type: 'red',
								boxWidth: '300px',
								useBootstrap: true,
								typeAnimated: false,
							});
						}
						else if ($(".selected_granulas" + html_content.id).length >= 1 && html_content.coarse == 1 && html_content.fine == 0) {
							$.alert({
								title: 'Oops!!',
								content: 'You already have the maximum amount of this color',
								type: 'red',
								boxWidth: '300px',
								useBootstrap: true,
								typeAnimated: false,
							});
						}
						else if ($(".selected_granulas" + html_content.id).length >= 1 && html_content.coarse == 0 && html_content.fine == 1) {
							$.alert({
								title: 'Oops!!',
								content: 'You already have the maximum amount of this color',
								type: 'red',
								boxWidth: '300px',
								useBootstrap: true,
								typeAnimated: false,
							});
						}
						else if (html_content.coarse == 0 && html_content.fine == 0) {
							$.alert({
								title: 'Oops!!',
								content: 'Not Available',
								type: 'purple',
								useBootstrap: false,
								typeAnimated: true,
							});
						}
						else {
							$(".color_sen").hide();
							var fine = '';
							var coarse = '';
							if ($(".selected_granulas").length !== undefined) {
								if ($('.selected_granulas:last').data('counter') != null) {
									var color_count = parseInt($('.selected_granulas:last').data('counter')) + 1;
								}
								else {
									var color_count = 1;
								}
							}
							else {
								var color_count = 1;
							}
							if (html_content.coarse == 1) {
								if (html_content.fine == 0) {
									var act = ' active';
								}
								else {
									var act = '';
								}
								coarse = '<li class="coarse_1 ' + act + '" id="coarse' + html_content.id + '_' + color_count + '" data-colid="' + html_content.id + '" data-count="' + color_count + '"><span class="coarse" data-id=' + html_content.id + ' data-coarse="' + html_content.coarse + '" data-fine="' + html_content.fine + '">Coarse</span></li>';

							}
							if (html_content.fine == 1) {
								fine = '<li class="fine_1 active" id="fine' + html_content.id + '_' + color_count + '" data-colid="' + html_content.id + '" data-count="' + color_count + '"><span class="fine" data-id=' + html_content.id + ' data-coarse="' + html_content.coarse + '" data-fine="' + html_content.fine + '">Fine</span></li>';
							}
							var html_data = '<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 selected_granulas_css selected_granulas animated bounceInDown selected_granulas selected_granulas'+html_content.id+' counter_'+html_content.id+'_'+color_count+'" id="'+html_content.id+'" data-counter="'+color_count+'" id="'+html_content.id+'">'+
									
									'<div class="card selected_colors">'+
									
									'<img class="card-img-top" src="'+base_url+'/uploads/colors/'+html_content.color_img+'" alt="Card image cap">'+
									'<div class="card-body">'+
									'<div class="card-title">'+html_content.color_title+'</div>'+
									'<ul class="coarse_fine" >'+ fine + coarse +
									
									
									'</ul>'+
									
								'</div>'+
								
								'</div>'+
								'<em class="fa fa-times delete_current" aria-hidden="true" data-counter="'+color_count+'" id="'+ html_content.id + '"></em>' +
								'</div>';
							$(".color_drop_section").append(html_data);
							$('html, body').animate({
								scrollTop: $(".color_drop_section").offset().top
							}, 2000);
							$(".delete_current").on('click', function () {
								$(".counter_" + $(this).attr('id') + '_' + $(this).data('counter')).remove();
								if ($('.selected_granulas').length <= 0) {
									$(".color_sen").show();
								}
								if ($('.selected_granulas' + $(this).attr('id')).length <= 0) {
									$(".pc_color" + $(this).attr('id')).removeClass('selected');
								}
							});
							$(".pc_color" + html_content.id).addClass('selected');
							$(".coarse_1").on('click', function () {
								var id = $(this).data('colid');
								$('#fine' + id + '_' + $(this).data('count')).removeClass('active');
								$(this).addClass('active');

							});
							$(".fine_1").on('click', function () {
								var id = $(this).data('colid');
								$('#coarse' + id + '_' + $(this).data('count')).removeClass('active');
								$(this).addClass('active');

							});
						}
					},
				});
			}
		});
		$(".owl-carousel1").owlCarousel({
			loop: false,
			margin: 10,
			responsiveClass: true,
			responsive: {
				0: {
					items: 2,
					nav: false,
				},
				600: {
					items: 3,
					nav: false
				},
				1000: {
					items: 4,
					nav: false,
				},
				1200: {
					items: 5,
					nav: false
				}

			}
		});
		$(".owl-outdoor").owlCarousel({
			loop: false,
			margin: 10,
			responsiveClass: true,
			responsive: {
				0: {
					items: 2,
					nav: false,
				},
				600: {
					items: 3,
					nav: false
				},
				1000: {
					items: 4,
					nav: false,
				},
				1200: {
					items: 5,
					nav: false
				}

			}
		});
		$(".owl-carousel2").owlCarousel({
			loop: false,
			margin: 10,
			responsiveClass: true,
			responsive: {
				0: {
					items: 2,
					nav: false,
				},
				600: {
					items: 3,
					nav: false
				},
				1000: {
					items: 4,
					nav: false,
				},
				1200: {
					items: 5,
					nav: false
				}

			}
		});
		
		$(".owl-carousel1 div.owl-item:first").addClass('active_image');
		$(".owl-outdoor div.owl-item:first").addClass('active_image');
		$(".slider_range").slider({
			orientation: "horizontal",
			range: "min",
			min: 0,
			max: 100,
			value: 0,
			step: 5,
			slide: function (event, ui) {
				var id = $(this).data('id');
				return checkTotal(this, 0, id);

			},
			stop: function (event, ui) {
				checkTotal();
			}
		});

		$(".slider_range_total").slider({
			orientation: "horizontal",
			range: "min",
			min: 0,
			max: 100,
			value: 0,
			slide: function slider_slide(event, ui) {
				return false; // this code not allow to dragging
			},
		});
		//$(".slider_range_total").slider('option', 'value', 5);
	});
	$(".fb_share").on('click', function () {
		FB.ui(
			{
				method: 'feed',
				name: $("#swatch_name").val(),
				picture: $('.result_image').attr('src'),
				caption: 'The Color Innovator',
				description: 'Formula for the custom swatch:' + $('.sm-meta').html(),
			}, function (response) {
			});
	});

	$('.twitter_share').click(function (twttr) {

		twttr.preventDefault();
		//We get the URL of the link
		var loc = $('#test_image').attr('src');

		//  var segment = $('#test_image').attr('src').split('/');
		// var file_name_segment = segment[5].split('.');
		var share_image_url = $('.result_image').attr('src');

		//We get the title of the link
		var title = 'Tweet Your Custom Swatch#';
		//We trigger a new window with the Twitter dialog, in the middle of the page
		window.open('http://twitter.com/share?url=' + share_image_url + '&text=' + title + '&', 'twitterwindow', 'height=350, width=550, top=' + ($(window).height() / 2 - 225) + ', left=' + ($(window).width() / 2) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');


	});
	$(".zoom").on('click', function () {
		$("#img01").attr('src', $('.result_image').attr('src'));
		$("#myModal_zoom").show();
	});
	var span = document.getElementsByClassName("close")[0];
	var modal = document.getElementById('myModal_zoom');
	span.onclick = function () {
		modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function (event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
	$(document).on('click', '.zoom_image_small', function () {
		/* $("#img01").attr('src',$(this).attr('src'));
		 $("#myModal_zoom").modal('show');*/

		var img_id = $(this).data('id');
		$.ajax({
			url: base_url + "color_innovator/get_img_record",
			method: 'POST',
			type: 'json',
			data: {'img_id': img_id,},
			success: function (data) {
				if (data != false) {
					var res = $.parseJSON(data);
					var org_str = res.image_info;
					var str = org_str.split("%");
					var html_formula = '';
					$.each(str, function () {
						if (this != " ") {
							html_formula += '<li>' + this + '% ' + '</li>';
						}
					});
					$('.custom-swatch .p0 .sm-meta').html(html_formula);
					$('.result_image').attr("src", base_url + 'images/' + res.org_image_name);
					$("#swatch_name").val(res.swatch_name);
					$("#swatch_name").attr("readonly",true);
					$("#send_to_email").show();
				}
				$('html, body').animate({scrollTop: $('.custom-swatch').offset().top}, 800);
			}
		});
		
		});
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#selected_small_image_preview').attr('src', e.target.result);
				$("#selected_small_image_preview").css('display','block');
				$("#make_image_div").attr('src', e.target.result);
				$("#make_image_div").css('display','block');
				$("#make_image_div").css('opacity',0);
			}
			reader.readAsDataURL(input.files[0]);
        //fd.append('file',files);
			
		}
	}
	$(document).on("change","#browse_custom_image",function(){
		//readURL(this);
	});
	
	
</script>

</body>
</html>