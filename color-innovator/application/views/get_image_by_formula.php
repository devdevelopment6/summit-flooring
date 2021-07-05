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

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>home_assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>home_assets/css/custom.css">
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
		.file-thumbnail-footer{
			display : none;
		}
		ul.sm-meta li { width : 100%; }
		.formula_list li {
			margin: 10px auto;
		}
		.formula_list li h5 {
			font-size: 14px;
		}
	</style>
</head>
<body>
	<input type="hidden" id="user_id" value="<?php if ($this->session->userdata('logedin_user') != "") {
		//print_r($this->session->userdata['logedin_user']['id']);
	} ?>"/>
	<input type="hidden" id="colors_ids" value="<?php if ($this->session->userdata('colors_list') != "") {
		//print_r($setp2_id);
	} ?>"/>
<header>
		<div class="container-fluid">
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
				<a href="<?php echo base_url(); ?>"  class="top-menu-logo"><img class="img-responsive" src="<?php echo base_url(); ?>home_assets/images/color-innovator-logo-new-ankit-test.svg" style=""></a>
				
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 hidden-xs"></div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 header_right_menu">
				<a href="http://oneco.ca/~summit-flooring/New_color_innovator/home"><img class="img-responsive" src="<?php echo base_url(); ?>home_assets/img/logo.png" style="width:100px;" ></a>
				<ul class="nav navbar-nav navbar-right nav-bar1 right_menus">
					<?php if ($this->session->userdata('logedin_user') != '') { ?>
						<li><a style="cursor:pointer;" href="#" class="edit_user_account"> edit account </a></li>
						<li><a style="cursor:pointer;" href="<?php echo base_url(); ?>home/view_gallery"> view gallery </a></li>
						<li><a style="cursor:pointer;" href="<?php echo base_url(); ?>home/logout"> logout</a></li>
					<?php } else { ?>
						<li class="login_title"><a style="cursor:pointer;" class="login-btn">Login</a></li>
						<li class="login_title"><a style="cursor:pointer;" class="register-btn">Register</a></li>
					<?php } ?>
				</ul>
				
			</div>
		</div>
	</header>

<div class="col-md-12">
	<!-- <button id="test_btn" class="btn btn-sm btn-info  pull-right ">Next</button>-->
	<div class="container place_section" >
		<div class="area-view col-md-12">
			<div class="custom-swatch">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="title">
						<h2>Generated Swatch</h2>
					</div>
				</div>
				<div class="cs-content">
					
					<div class="col-md-3 col-sm-6 col-xs-12 p0 text-center">
						<div class="cs-img-box">
							<figure><img src="<?php echo $swatch_image; ?>" class="img-responsive result_image" id="generated_swatch_image"/>
							</figure>
						</div>
						<div class="cs-overlay">
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12 ">
						<div class="sm-info">
							<div class="my-sm-pencil sm-pencil">
								<div class="form-group has-feedback">
									<input type="text" class="form-control" id="your_swatch_name" name="your_swatch_name" placeholder="Swatch Name (In case of place to floor)">
								</div>
							</div>
							<input type="hidden" name="swatch_image_name" id="swatch_image_name" value="<?php echo $swatch_image_name; ?>" />
							<input type="hidden" name="image_category" id="image_category" value="1" />
							<div class="sm-title">
								<h4>Your Formula</h4>
							</div>
							<ul class="sm-meta">
								<?php for($i=0;$i<count($info)-1;$i++){ 
										$get_single_color = $this->common_model->get_single('color_room',array('id'=>$info[$i]['id']));
										if($get_single_color!=false){
								?>
									<li><?php echo $get_single_color['color_title'].' - <b>'.$info[$i]['flecks_size'].'</b> - '.$info[$i]['percent'].'%'; ?></li>
								<?php }} ?>
							</ul>
							<div class="col-md-12 col-sm-12 col-xs-12 p0 login_title" style="margin-top:10px;text-align:left;">
								<?php if ($this->session->userdata('logedin_user') == "") { ?>
									<a href="#" class=" btn  btn-success login-btn">Save To Gallery</a>
								<?php } ?>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 p0" style="margin-top:10px;text-align:left;">
								<a href="<?php /*echo base_url();*/ ?>#home/go_to_place_from_generated" class=" btn btn-info go_to_place_from_generated">Place To Floor</a>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 p0" style="margin-top:10px;text-align:left;">
								<a href="#" class="btn  btn-success request_for_sample_generated">Request A Sample</a>
							</div>
						</div>
						
					</div>
					
				</div>
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
<script src="<?php echo base_url(); ?>home_assets/owlcarousel/owl.carousel.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/FlexSlider-master/demo/js/jquery.flexslider.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/js/scripts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/js/techybirds.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".go_to_place_from_generated").on('click',function(){
				var your_swatch_name = $("#your_swatch_name").val();
				var image_info = $(".image_info_div").text(); 
				var image_category = $("#image_category").val();
				var generated_swatch_image = $("#generated_swatch_image").attr('src');
				var swatch_image_name = $("#swatch_image_name").val();
				if(your_swatch_name==''){
					 $.alert({
							title: 'Oops!!',
							content: "Provide swatch name!!",
							type: 'red',
							boxWidth: '300px',
							useBootstrap: true,
							typeAnimated: false,
						});	
				}	
				else
				{
					$.ajax({
						url: base_url + "home/go_to_place_from_generated",
						method: 'POST',
						data:{'your_swatch_name':your_swatch_name,'image_info':image_info,'image_category':image_category,'generated_swatch_image':generated_swatch_image,"org_image_name":swatch_image_name },
						success:function(data){
							if(data==true){
								window.location.href=base_url + "home";
							}
						}
					});

				}	
			});
			$(".request_for_sample_generated").on('click',function(){
				$("#main_loader").show();

				$.ajax({
					'url' : base_url + 'home/get_request_sample_session_details',
					'type' : "POST",
					'data' : {},
					success : function (res){
						var result = $.parseJSON(res);
						if(result!=false){
							$("#request-sample-form #swatch_image_request").attr("src",result.swatch_image);
							$("#request-sample-form .formula_list").html(result.formula_list);
							$("#request-sample-form #swatch_image_path").val(result.swatch_image);
							$("#request-sample-form #swatch_image_formula").val(result.formula_list);
						}
						$(".header-links a:last").addClass('active');
						$(".request_for_sample_form").addClass('active');
						$("#main_loader").hide();
						$(".request-sample-form").modal('show');

					}
				});

			});
		});	
	</script>
</body>
</html>