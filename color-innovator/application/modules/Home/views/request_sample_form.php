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
<div class="container pagerequest">
<div class="main-wapper">
<div class="mid-conttainer">
<div class="row">
<!--<div class="col-lg-1 col-md-1"></div>-->
<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12 custpagereq" >
		<div class="form-group">
			<label>In order for us to best serve you, please ensure that the following form is completely filled out. For additional sales and product information:</label>
			<label>Email : <a href="mailto:sales@summit-flooring.com">sales@summit-flooring.com</a></label>
		</div>
		<form id="request_sample_frm" name="request_sample_frm">
							 <div class="row">
							 	<div class="col-md-12 col-sm-12 col-xs-12">
									 <div class="col-md-4 col-sm-6 col-xs-12">
										<img src="<?php echo ($details!=false)?$details['swatch_image']:""; ?>" style="width:100%;cursor:pointer;" class="zoom_single_image" id="swatch_image_request">
									  </div>
									  <div class="col-md-8 col-sm-6 col-xs-12">
										 <ul class="formula_list">
										  	<?php echo ($details!=false)?$details['formula_list']:""; ?>
										  </ul>
									  </div>
								 </div>
									<input type="hidden" name="swatch_image_path" id="swatch_image_path" value="<?php echo ($details!=false)?$details['swatch_image']:""; ?>" />
									<input type="hidden" name="swatch_image_formula" id="swatch_image_formula" value='<?php echo ($details!=false)?$details['formula_list']:""; ?>' />
									 
								  <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top : 10px;">
									<div class="form-group  col-lg-4  col-md-4 col-sm-6 col-xs-12">
										<label for="current_project"><b>Current Project:</b></label>
										<input type="text" class="form-control" id="current_project" placeholder="Enter Current Project" name="current_project" required>
									</div>
									<div class="form-group  col-lg-4 col-md-4 col-sm-6 col-xs-12">
										<label for="future_project"><b>Future Project</b></label>
										<input type="text" class="form-control" id="future_project" placeholder="Enter Future Project" name="future_project" required>
									</div>
									<div class="form-group  col-lg-4 col-xs-12 col-md-4 col-sm-12">
										<label for="square_footage"><b>Square Footage of Project?</b></label>
										<input type="text" class="form-control" id="square_footage" placeholder="Enter Square Footage" name="square_footage" required>
									</div>
									  
									<div class="form-group col-lg-12 col-xs-12 col-md-12 col-sm-12 ">
										<label ><b>Which Products you are Interested in:</b></label>
									</div>
									  <div class="row">
									  	  <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
											  <div class="form-group col-lg-12 col-xs-12 col-md-12 col-sm-12 ">
												<label class="left"><b>Interior Flooring</b></label><br>
											  </div>	  
											<div class="form-group  col-lg-6 col-xs-12 col-md-6 col-sm-12 ">

												<input type="checkbox" name="interior_floor[]" value="Sport Mat Flooring">
												<label for="Sport_Mat_Flooring">Sport Mat Flooring</label><br>

												<input type="checkbox" name="interior_floor[]" value="Evolution Flooring">
												<label for="Evolution_Flooring">Evolution Flooring</label><br>

												<input type="checkbox" name="interior_floor[]" value="Stride Fitness Tiles">
												<label for="Stride_Fitness_Tiles">Stride Fitness Tiles</label><br>

												<input type="checkbox" name="interior_floor[]" value="Dinomat">
												<label for="Dinomat">Dinomat®</label><br>
											</div>
											<div class="form-group  col-lg-6 col-xs-12 col-md-6 col-sm-12">

												<input type="checkbox" name="interior_floor[]" value="Next Step Walk Soft">
												<label for="Next_Step_Walk_Soft">Next Step Walk Soft</label><br>

												<input type="checkbox" name="interior_floor[]" value="Next Step Luxury">
												<label for="Next_Step_Luxury">Next Step Luxury</label><br>

												<input type="checkbox" name="interior_floor[]" value="Next Step High Impact">
												<label for="Next_Step_High_Impact">Next Step High Impact</label><br>

											</div>

										  </div>
										  <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
											    <div class="form-group col-lg-12 col-xs-12 col-md-12 col-sm-12 ">
												  <label class="left"><b>Exterior Surfacing</b></label><br>
												</div>
											  	<div class="form-group col-lg-12 col-xs-12 col-md-12 col-sm-12">

													<input type="checkbox" name="exterior_floor[]" value="Playground Tiles">
													<label for="Playground_Tiles">Play Tiles</label><br>

													<input type="checkbox" name="exterior_floor[]" value="NuVista Tiles">
													<label for="NuVista_Tiles">NuVista Tiles</label><br>
												</div>
										  </div> 
									  </div>
									
									<div class="form-group  col-lg-12 col-xs-12 col-md-12 col-sm-12">
										<div class="row">
											<div class="form-group  col-lg-6 col-xs-12 col-md-6 col-sm-12">
												<label for="other_products"><b>Other Products</b></label>
												<input type="text" class="form-control" id="other_products" placeholder="Enter Other Products" name="other_products" >				
											</div>
											<div class="form-group  col-lg-6 col-xs-12 col-md-6 col-sm-12">
												<label for="additional_notes"><b>Additional Notes</b></label>
												<textarea class="form-control" name="additional_notes" cols="50" rows="4" id="additional_notes"></textarea>
											</div>
										</div>	
									</div>
									 <div class="col-md-6 col-sm-6 col-xs-12">

											<label>Tell us about yourself:</label><br>

											<input type="radio" name="yourself" id="Architect" value="Architect">
											<span for="Architect">Architect</span><br>

											<input type="radio" name="yourself" id="Building_Owner" value="Building_Owner">
											<span for="Building_Owner">Building Owner</span><br>


											<input type="radio" name="yourself" id="Facility_Manager" value="Facility_Manager">
											<span for="Facility_Manager">Facility Manager</span><br>

											<input type="radio" name="yourself" id="Interior_Design_Consultant" value="Interior_Design_Consultant">
											<span for="Interior_Design_Consultant">Interior Design Consultant</span><br>


											<input type="radio" name="yourself" id="Flooring_Contractor" value="Flooring_Contractor">
											<span for="Flooring_Contractor">Flooring Contractor</span><br>

											<input type="radio" name="yourself" id="General_Contractor" value="General_Contractor">
											<span for="General_Contractor">General Contractor</span>
											<br>

											<input type="radio" name="yourself" id="Retailer" value="Retailer">
											<span for="Retailer">Retailer</span><br>


											<input type="radio" name="yourself" id="Student" value="Student">
											<span for="Student">Student</span><br>


											<input type="radio" name="yourself" id="Home_Owner" value="Home_Owner">
											<span for="Home_Owner">Home Owner</span><br>

											<input type="radio" name="yourself" id="Other" value="Other" checked >
											<span for="Other">Other</span>
										 	<br>
										 	<label>Please tell us a little about the project you’re working on. (i.e. commercial, residential, square footage)</label>
											<br>
											<textarea name="project_description" id="project_description" placeholder="Description" class="form-control" ></textarea>
									 		<div class="form-group">
												<input type="checkbox" name="save_as_contact" id="save_as_contact" value="1" /> Save As Contact
											</div>	
									  </div>
									 <div class="col-md-6 col-sm-6 col-xs-12">
										<label>Contact Information:</label>
										<div class="form-group">
											<input type="text" placeholder="Your Name *" name="request_name" id="request_name" required class="form-control" value="<?php echo ($details!=false && $details['user']!=false)?$details['user']['name']:""; ?>" <?php echo ($details!=false && $details['user']!=false)?"readonly":""; ?>>
										</div>
										<div class="form-group">
											<input type="text" placeholder="Company Name" name="request_company" id="request_company" class="form-control" >
										</div>
										<div class="form-group">
											<input type="text" placeholder="Address *" name="request_address" id="request_address" required class="form-control" >
										</div>
										<div class="form-group">
											<input type="text" placeholder="City *" name="request_city" id="request_city" required class="form-control" >
										</div> 
										<div class="form-group">
											<input type="text" placeholder="State/Province *" name="request_state" id="request_state" required class="form-control">
										</div>
										<div class="form-group">
											<input type="text" placeholder="Zip/Postal *" name="request_zipcode" id="request_zipcode" required class="form-control" >
										</div>
										<div class="form-group">
											<input type="email" placeholder="Email *" name="request_email" id="request_email" required class="form-control" value="<?php echo ($details!=false && $details['user']!=false)?$details['user']['email']:""; ?>" <?php echo ($details!=false && $details['user']!=false)?"readonly":""; ?> >
										</div>
										<div class="form-group">
											<input type="text" placeholder="Telephone" name="request_telephone" id="request_telephone" class="form-control" value="<?php echo ($details!=false && $details['user']!=false)?$details['user']['mobile']:""; ?>" <?php echo ($details!=false && $details['user']!=false && $details['user']['mobile']!='')?"readonly":""; ?> >
										</div> 
										 <div class="form-group">
											<input type="text" placeholder="Fax" name="request_fax" id="request_fax" class="form-control" >
										</div> 
									</div>
								  </div>
							</div>
							<button type="submit" class="btn redsame">Submit</button>
						</form>	
</div>	
<!--<div class="col-lg-1 col-md-1"></div>-->
</div>
</div>
</div>
</div>
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
			//$("#make_image_div").hide();
		/*	var canvas = document.createElement('canvas');
			image.parentNode.insertBefore(canvas, image);
			//canvas.width  = image.width;
			//canvas.height = image.height;
			canvas.width  = 888;
			canvas.height = 555;
			image.parentNode.removeChild(image);
			//$(".div_img").remove();
			cropheight = (555*(100-transheight))/100;
		
			//cropheight = image.heigh
			//img_width = (image.width*(width))/100;
			var ctx = canvas.getContext("2d");
			ctx.drawImage(image, 0,0,707,300);
			var imgData = ctx.getImageData(0, 0, 888, 100 * 555 / 888);
			var data = imgData.data;
			var trans = ctx.getImageData(0, 0, 888, 555);
			ctx.fillStyle="transparent";
			ctx.fillRect(10,10,888,555);
			ctx.putImageData(trans, 0,0);*/
			
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
			allowedFileExtensions: ["jpg", "png", "jpeg","svg","gif"],
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
			
		}
	}
	$(document).on("change","#browse_custom_image",function(){
		//readURL(this);
	});	
</script>
