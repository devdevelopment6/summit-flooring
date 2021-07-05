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

</head>
<body>

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
					<li><a style="cursor:pointer;" href="#" class="edit_user_account"> Edit Account </a></li>
					<li><a style="cursor:pointer;" href="<?php echo base_url(); ?>home/view_gallery"> View Gallery </a></li>
					<li><a style="cursor:pointer;" href="<?php echo base_url(); ?>home/logout"> Logout</a></li>
				<?php } else { ?>
					<li class="login_title"><a style="cursor:pointer;" class="login-btn">Login</a></li>
					<li class="login_title"><a style="cursor:pointer;" class="register-btn">Register</a></li>
				<?php } ?>
			</ul>

		</div>
	</div>
</header>
<div class="accordion-wrapper">
	<?php $this->load->view('inner_menu_box'); ?>
	<div class="container">
	
		<div class="row" style="margin-top : 20px;">
			<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<h3 style="font-weight:700;">Login</h3>
					<form novalidate="novalidate" id="new_login_frm" name="new_login_frm" action="<?php echo base_url().'home/new_login_user'; ?>" method="post">
						<?php if($this->session->flashdata('login_error')){ ?>
						<div class="form-group">
							<label class="login_error error"><?php echo $this->session->flashdata('login_error'); ?></label>
						</div>
						<?php } ?>
						<div class="form-group">
							<label for="login_email">Email:</label>
							<input type="email" class="form-control error" id="login_email" placeholder="Enter email" name="login_email" required="" aria-invalid="true">
						</div>
						<div class="form-group">
							<label for="login_pwd">Password:</label>
							<input type="password" class="form-control" id="login_pwd" placeholder="Enter password" name="login_pwd" required="">
						</div>
						
						<div class="checkbox">
							<a class="forgot_pwd"> Forgot Your Password</a>
						</div>
						<button type="submit" class="btn btn-success">Login</button>
					</form>
				</div>	
			</div>
			
			<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<h3 style="font-weight:700;">Register</h3>
					<form  novalidate="novalidate" id="new_register_frm" name="new_register_frm" method="post" action="<?php echo base_url().'home/add_new_reg_user/'; ?>">
							<?php if($this->session->flashdata('reg_success')){ ?>
							<div class="form-group">
								<label class="success" style="color: #449d44;"><?php echo $this->session->flashdata('reg_success'); ?></label>
							</div>
							<?php } ?>
							<div class="form-group">
								<label for="register_name">Your Name:</label>
								<input type="text" class="form-control" id="register_name" placeholder="Enter your name" name="register_name" required="">
							</div>
							<div class="form-group">
								<label for="register_newemail">Email:</label>
								<input type="email" class="form-control" id="register_newemail" placeholder="Enter new email" name="register_newemail" required="">
							</div>
						
							<div class="form-group">
							<button type="submit" class="btn btn-success">Register</button>
							</div>
						</form>
					</div>
			</div>
			
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
					<br />
					<br />
					<button type="button" onclick="javascript: window.history.go(-1);" class="btn btn-success">Previous Button</button>
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
			$(".div_img").css("width",'888px');
			
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
			allowedFileExtensions: ["jpg", "png", "jpeg"],
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
		$("#last_step").click(function(){
			$("#make_sec_btn").trigger('click');
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
							var html_data = '<div class="col-md-2 col-xs-4 col-sm-2 selected_granulas animated bounceInDown selected_granulas selected_granulas' + html_content.id + ' counter_' + html_content.id + '_' + color_count + '" id="' + html_content.id + '" data-counter="' + color_count + '" ><div class="card selected_colors"><em class="fa fa-times delete_current" aria-hidden="true" data-counter="' + color_count + '" id="' + html_content.id + '"></em><img class="img-responsive" src=' + base_url + '/uploads/colors/' + html_content.color_img + '><div class="class="card-body"><div class="card-title">' + html_content.color_title + '</div><ul class="coarse_fine" >' + fine + coarse + '</ul></div></div></div>';
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
		$(".owl-carousel").owlCarousel({
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
		$(".owl-carousel div.owl-item:first").addClass('active_image');
		$(".slider_range").slider({
			orientation: "horizontal",
			range: "min",
			min: 0,
			max: 100,
			value: 0,
			step: 1,
			slide: function (event, ui) {
				var id = $(this).data('id');
				return checkTotal(this, ui.value, id);

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