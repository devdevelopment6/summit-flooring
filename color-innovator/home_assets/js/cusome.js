var result_colors='';
var res_cols='';

$.getScript('//connect.facebook.net/en_US/sdk.js', function () {
  FB.init({
	 appId: '648686595546670',
	 version: 'v2.11', // or v2.0, v2.1, v2.0 ,v2.11
	 HTTPS: true
  });
  $('#loginbutton,#feedbutton').removeAttr('disabled');
  //FB.getLoginStatus(updateStatusCallback);
});
function updateStatusCallback() {

   }
/*$(function() { 	
    $(".animsition-overlay").animsition({
    inClass: 'overlay-slide-in-left',
    outClass: 'overlay-slide-out-left',
    inDuration: 1500,
    outDuration: 800,
    linkElement: '.animsition-link',
    // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
    loading: true,
    loadingParentElement: 'body', //animsition wrapper element
    loadingClass: 'animsition-loading',
    loadingInner: '', // e.g '<img src="loading.svg" />'
    timeout: false,
    timeoutCountdown: 5000,
    onLoadEvent: true,
    browser: [ 'animation-duration', '-webkit-animation-duration'],
    // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
    // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
    overlay : true,
    overlayClass : 'animsition-overlay-slide',
    overlayParentElement : 'body',
//    transition: function(url){ window.location.href = url; }
  });
});*/
$(window).load(function() {
 
});
$( document ).ready(function() {
	

	
	
	$('.img_opacity').click(function(){
		var urlview = $(this).attr('data-id');
		$("#urldis").attr('src',urlview);
		
		$('.img_opacity.active').removeClass('active');
		$(this).addClass('active');
		$('slides').addClass('.imgleft .active');
	});

	$('.img_opacity_new').on("click touchstart",function(){
	//$('.img_opacity_new').on('click',function(){
		var urlview = $(this).attr('data-id');

		//console.log(urlview);

		$("#urldis").attr('src',urlview);
	
		$('.img_opacity_new.active').removeClass('active');
		$('.img_opacity_new').addClass('inactive');
		$(this).addClass('active');
		$(this).removeClass('inactive');
		$('.sliderpath').css('opacity','1');
		
		
	});
//	alert('sdfsdf');
	$('.myaccount_tabs a').click(function(){
		$(this).tab('show');
	})
	/*$(".forgot_password").on('click',function(){
		$("#myModal").modal('hide');
		$("#forgot_password_modal").modal('show');
	});*/
	 $('#facebook').click(function (e) { 
		 FB.ui(
				 {
					method: 'feed',
					name: $('#swatchname').val(),
					picture:$('#result_image').attr('src'),
					caption:'The Color Conductor',
					description: 'Formula for the custom swatch:'+ $('.formula').text(),
				 },function(response){});

	  });
	$('#twitter').click(function (twttr) {

         twttr.preventDefault();
         //We get the URL of the link
         var loc = $('#result_image').attr('src');

         var segment = $('#result_image').attr('src').split('/');
         var file_name_segment = segment[5].split('.');
         var share_image_url =  base_url + 'home/get_image_by_formula/' + file_name_segment[0];

         //We get the title of the link
         var title = escape($('#swatchname').val());
         //We trigger a new window with the Twitter dialog, in the middle of the page
         window.open('http://twitter.com/share?url=' + share_image_url + '&text=' + title + '&', 'twitterwindow', 'height=350, width=550, top=' + ($(window).height() / 2 - 225) + ', left=' + ($(window).width() / 2) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');


      });
	$('#request_sample').on('hidden.bs.modal', function() {
		$(".request_for_sample_form").removeClass('active');
		$(".header-links a:last").removeClass('active');
	});
	 $('#carousel').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		itemWidth: 130,
		itemMargin: 5,
		asNavFor: '#slider'
	  });
	$('#carousel1').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		itemWidth: 130,
		itemMargin: 5,
		asNavFor: '#slider1'
	  });
	  $('#slider').flexslider({
		/*animation: "slide",*/
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		sync: "#carousel",
	  });
	$('#slider1').flexslider({
		/*animation: "slide",*/
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		sync: "#carousel1",
	  });
	$(".select_place_category").on('click',function(){
		var cat = $(this).data('cat');
		$.ajax({
			url:base_url+'home/set_place_category',
			type:"POST",
			data:{'cat':cat,'csrf_test_name':CSRF_TOKEN},
			success:function(res){
				window.location.reload();
			},
		});
	});
	
	/*$("#login_btn").on('click',function(){
		$("#myModal").modal('show');
	});
	$("#register_btn").on('click',function(){
		$("#register-modal").modal('show');
	});*/
	$(".login_btn_popup").on('click',function(){
		$("#myModal").modal('show');
	});
	$(".register_btn_popup").on('click',function(){
		$("#register-modal").modal('show');
	});
	$(".login_user2").on('click',function(){
		$("#myModal1").modal('show');
	});
	$(".help_modal").on('click',function(){
		$("#help-modal").modal('show');
	});
	$(".request_for_sample_form").on('click',function(){
		//$("#request_sample").modal('show');
		$("#main_loader").show();
		$(this).addClass('active');
		//$(".header-links a").removeClass('active');
		$(".header-links a:last").addClass('active');
		/*$.ajax({
			'url' : base_url + 'home/get_request_sample_session_details',
			'type' : "POST",
			'data' : {},
			success : function (res){
				var result = $.parseJSON(res);
				if(result!=false){
					$("#request_sample #swatch_image_request").attr("src",result.swatch_image);
					$("#request_sample .formula_list").html(result.formula_list);
					$("#request_sample #swatch_image_path").val(result.swatch_image);
					$("#request_sample #swatch_image_formula").val(result.formula_list);
				}*/
				$("#request_sample #swatch_image_request").attr("src","");
				$("#request_sample .formula_list").html('');
				$("#request_sample #swatch_image_path").val('');
				$("#request_sample #swatch_image_formula").val('');
				$("#main_loader").hide();
				$("#request_sample").modal('show');
			
			/*}
		});*/
	});
	$(".view_single_image").on('click',function(){
		$(".view_single_image").removeClass('active');
		$(this).addClass('active');
		var id = $(this).data('id');
		var result = '';
		$.ajax({ 
			'url' : base_url + 'home/get_swatch_by_id',
			'type' :"POST",
			'data' : {id : id,'csrf_test_name':CSRF_TOKEN },
			'success' : function(res){
				result = $.parseJSON(res);
				$("#view_swatch_details").css('display','block');
				$("ul.formula_list").html(result.formula_list);
				$("#swatch_title").html(result.swatch_name);
				$("#result_image1").attr('src',result.swatch_image);
				$(".zoom_swatch_image").attr('data-src',result.swatch_image);
				$(".delete_swatch_from_gal").attr('data-id',id);
				$(".delete_swatch_from_gal").attr('data-catid',result.category_id);
				/*if(res == true){
					window.location.href = base_url + 'home';
				}*/
			},
			complete:function(res){
				$(document).on('click', '.zoom_swatch_image',function() {
					$('.enlargeImageModalSource').attr('src', result.swatch_image);
					$('#enlargeImageModal').modal('show');
				});

				$('.delete_swatch_from_gal').on('click',function(){
					var id1 = id;
					var cat = result.category_id;
					swal({
						title:"Are you sure?",
						text:"You are not able to recover this swatch...",
						type:"warning",
						showCancelButton:true,confirmButtonColor:"#DD6B55",
						confirmButtonText:"OK",
						cancelButtonText:"CANCEL"
					}).then(function(isConfirm){
						if(isConfirm.value == true){
							$.ajax({ 
								'url' : base_url + 'home/delete_swatch',
								'type' :"POST",
								'data' : { id : id1,cat:cat,'csrf_test_name':CSRF_TOKEN },
								'success' : function(res){
									if(res == true){
										$("#view_swatch_details").hide();
										$("#delete_sec"+id1).remove();
									}
								},
							});
						}
					});
					
				});
				$('#fb_share').click(function (e) { 
					 FB.ui(
							 {
								method: 'feed',
								name: $('#swatch_title').text(),
								picture:$('#result_image1').attr('src'),
								caption:'The Color Conductor',
								//description: 'Formula for the custom swatch:'+ $('.formula').text(),
							 },function(response){});

				  });
				$('#twit_share').click(function (twttr) {

					 twttr.preventDefault();
					 //We get the URL of the link
					 var loc = $('#result_image1').attr('src');

					 var segment = $('#result_image1').attr('src').split('/');
					 var file_name_segment = segment[6].split('.');
					 var share_image_url =  base_url + 'home/get_image_by_formula/' + file_name_segment[0];

					 //We get the title of the link
					 var title = escape($('#swatch_title').val());
					 //We trigger a new window with the Twitter dialog, in the middle of the page
					 window.open('http://twitter.com/share?url=' + share_image_url + '&text=' + title + '&', 'twitterwindow', 'height=350, width=550, top=' + ($(window).height() / 2 - 225) + ', left=' + ($(window).width() / 2) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');


				  });
	
			}
		});
	});
	if ($('.selected_granulas').length < 1) {
		$(".head_buttons_step_2").hide();
	}
	$(".delete_account").on('click',function(){
		swal({
				title:"Are you sure?",
				text:"You are not able to recover your account...",
				type:"warning",
				showCancelButton:true,confirmButtonColor:"#DD6B55",
				confirmButtonText:"OK",
				cancelButtonText:"CANCEL"
			}).then(function(isConfirm){
				if(isConfirm.value == true){
				$.ajax({ 
					'url' : base_url + 'home/delete_account',
					'type' :"POST",
					'data' : {'csrf_test_name':CSRF_TOKEN },
					'success' : function(res){
						if(res == true){
							window.location.href = base_url + 'home';
						}
					},
				});
				}
			});
	});
	$.ajax({
		url : base_url+ 'home/check_success_msg',
		type:"POST",
		data : {'csrf_test_name':CSRF_TOKEN },
		success:function(res){
			res = $.parseJSON(res);
			if(res.status != ''){
				if(res.status != false){
					swal("",res.msg,'success');
				}
				else if(res.status == false)
				{
					swal("",res.msg,'error');
				}
			}
		},
	});
	$.ajax({
		url:base_url+'home/check_session/saved_album_session',
		type:'GET',
		data : {'csrf_test_name':CSRF_TOKEN },
		success:function(res){
			if(res == true){
				$(".save_to_gallery_section").css("display",'block');
			}
			else{
				$(".save_to_gallery_section").css("display",'none');
			}
		},
	});
	$(".delete_gallery_album").on('click',function(){
		var id = $(this).data('id');
		$.ajax({
			url : base_url+'home/delete_user_album',
			type:"POST",
			data:{
				'id':id,
				'csrf_test_name':CSRF_TOKEN,
			},
			success : function(res){
				if(res == true){
					$("#delete_sec"+id).remove();
					swal("","Album removed successfully!!",'success');
				}
			}
		})
	});
	$("#edit_contact").validate({
		rules:{
			mobile_number :
			{
				required : true,
				number : true,
			},
			zipcode:{
				number : true,
			},
		},
		messages:{
			mobile_number :
			{
				required : "Your mobile number is required!!",
				number : "Enter valid mobile number!!",
			},
			zipcode:{
				number : "Enter valid zipcode!!",
			},
		},
		submitHandler:function(form){
			form.submit();	
		},
	});
	$("#edit_account").validate({
		rules:{
			name:
			{
				required : true,
			},
			email:
			{
				required : true,
				email : true,
				"remote" :
				  {
					  url: base_url+'home/check_mail_exist',
					  type: "post",
					  data:
					  {
					      'csrf_test_name':CSRF_TOKEN,
						  emails: function()
						  {
							  return $('input[name="email"]').val();
						  }
					  }
				  }
			},
			mobile :
			{
				//required : true,
				number : true,
			},
			password:{
				minlength:6,
			},
			con_password :
			{
				equalTo : "#password"
			},
		},
		messages:{
			name:
			{
				required : "Your name is required!!",
			},
			email:{
				required:"Your email id is required!!",
				"remote" : "This email id already exist for another user!!",
			},
			mobile :
			{
				//required : "Your mobile number is required!!",
				number : "Enter valid mobile number!!",
			},
			password:{
				minlength:"Password must be at least 6 characters in length!!"
			},
			con_password :
			{
				equalTo : "Confirm password must be same as password!!"
			},
		},
		submitHandler:function(form){
			form.submit();	
		},
	});
	/*$("#request_sample_frm").submit(function(e){
		e.preventDefault();
	}).validate({
		rules:{
			square_footage:{
				required:true,
				number:true
			}
		},
		submitHandler:function(form){
			var formula = $('ul.formula_list').text();
			formula = formula.replace(/\s+/g, " ").trim();
			var swatch_image_request = $('#swatch_image_request').attr('src');
			var formData=new FormData($('#request_sample_frm')[0]);
			
			$.ajax({
				url:base_url+'home/request_sample',
				data:{'formData':formData,'formula':formula,'swatch_image_request':swatch_image_request},
				async:false,
				cache:false,
				contentType:false,
				processData:false,
				type:'POST',
				success:function(data){
					var res = $.parseJSON(data);
					if(res != false){
						swal("","Product request sent successfully!",'success');
					}
					else{
						swal("","ERROR!! Request Fail!!",'error');
					}
					$("#request_sample_frm")[0].reset();
					$("#request_sample").modal('hide');
					//console.log(data);

				},
			});
		},

	});*/
	$("#request_sample_frm").submit(function(e){
		e.preventDefault();
	}).validate({
		rules:{
			square_footage:{
				required:true,
				number:true
			}
		},
		submitHandler:function(form){
			
			 var frm=$(form).serialize();
			 var formula = $('ul.formula_list').text();
			 formula = formula.replace(/\s+/g, " ").trim();
			 
			// formula = formula.replace('%','% \n');

			 var swatch_image_request = $('#swatch_image_request').attr('src');

			$.ajax({
				url:base_url+'home/request_sample',
				data:{'frm':frm,'formula':formula,'swatch_image_request':swatch_image_request,'csrf_test_name':CSRF_TOKEN},
				type:'POST',
				success:function(data){
					if(data != false){
						swal("","Product request sent successfully!",'success');
					}
					else{
						swal("","ERROR!! Request Fail!!",'error');
					}					
					$("#request_sample_frm")[0].reset();
					//$("#request_sample").modal('hide');

				},
			});
		},

	});
	
	$("#forgot-password-frm").submit(function(e){e.preventDefault();}).validate({
		rules:{
			forgot_email:{
				required:true,
				email:true,
				"remote" :
					  {
						  url: base_url+'home/check_mail_not_exist',
						  type: "post",
						  data:
						  {
						      'csrf_test_name':CSRF_TOKEN,
							  emails: function()
							  {
								  return $('input[name="forgot_email"]').val();
							  }
						  }
					  }
			},
			
		},
		messages:{
			forgot_email:{
				required:"An email id is required.",
				"remote" :"Account for this email id is not exist!!",
			},
			
		},
		submitHandler:function(form){
			var formData=new FormData($('#forgot-password-frm')[0]);
			$.ajax({
				url:base_url+'home/forgot_password_reset',
				data:formData,
				async:false,
				cache:false,
				contentType:false,
				processData:false,
				type:'POST',
				success:function(data){
					//console.log(data);
					if(data!=false){
						swal("","We have sent your new password on your email. Please check your email account!!",'success');
						setTimeout(function(){// wait for 5 secs(2)
           					//location.reload(); // then reload the page.(3)
							window.location.href = base_url+'home';
      					}, 5000);
					}
					else
					{
						swal("","You aren't able to recover your password!!",'error');
					}
					//$("#forgot_password_modal").modal('hide');
				},
			});
		},
	});
	$("#login-frm").submit(function(e){
		e.preventDefault();
	}).validate({
		rules:{
			email:{
				required:true,
				email:true,
			},
			pwd:{
				required:true,
				minlength:5,
			},
		},
		messages:{
			email:{
				required:"An email id is required.",
			},
			pwd:{
				required:"A Password is required.",
				minlength:"Password must be at least 5 characters in length."},
		},
		submitHandler:function(form){
			var formData=new FormData($('#login-frm')[0]);
			$.ajax({
				url:base_url+'home/login_user',
				data:formData,
				async:false,
				cache:false,
				contentType:false,
				processData:false,
				type:'POST',
				success:function(data){
					//console.log(data);

					if(data != false && data!='not_exist'){
						var obj = jQuery.parseJSON(data);
						//$(".nav-bar2").show();
					//$(".links").remove();
						$("#login_btn").remove();
						$("#register_btn").remove();
						$(".logout_sec").css("display",'block');
						$(".login_section").hide();
						//$(".nav-bar2 .user_name").html('<i class="fa fa-user"></i> '+obj.name);
						
						$("#user_id").val(obj.id);
						$("#myModal").modal('hide');
						$(".login_instruction").hide();
						if ($('.saved-swatch li').length > 0) 
						{
							$.ajax({
								url:base_url+'home/get_exist_gal',
								type:'POST',
								data:{'user_id':obj.id,'csrf_test_name':CSRF_TOKEN},
								success:function(data){
									if(data!=false){
										var details = jQuery.parseJSON(data);
										$("#gallery_name").val(details['gallery_data'].gallery_name);
										$("#gallery_name").attr('readonly',true);
										$("#created_gallery_id").val(details['gallery_data'].id);
									}
								},
							});
						}
						//swal("","You have Successfully Login!!",'success');
						/*setTimeout(function(){// wait for 5 secs(2)
           					//location.reload(); // then reload the page.(3)
							window.location.href = base_url+'home';
      					}, 5000);*/
						swal({
							text:"You have Successfully Login!!",
							type:"success",
							showCancelButton:true,confirmButtonColor:"#DD6B55",
							confirmButtonText:"OK",
							cancelButtonText:"CANCEL"
						}).then(function(isConfirm){
							if(isConfirm.value == true){
							//window.location.href = base_url+'home';
							window.location = base_url+'home/step_4';
							}
						});			
					}
					else if(data==false)
					{
						swal("","Entered password is wrong!!",'error');
						//$(".login_error").css('display','block');
						//$(".login_error").html("Entered password is wrong!!");
					}
					else if(data=='not_exist'){
						//$(".login_error").css('display','block');
						//$(".login_error").html("Account not exist!!");
						swal("","Account not exist!!",'error');
					}
				},
			});
		},

	});
	
	$("#login-frm1").submit(function(e){
		e.preventDefault();
	}).validate({
		rules:{
			email:{
				required:true,
				email:true,
			},
			pwd:{
				required:true,
				minlength:5,
			},
		},
		messages:{
			email:{
				required:"An email id is required.",
			},
			pwd:{
				required:"A Password is required.",
				minlength:"Password must be at least 5 characters in length."},
		},
		submitHandler:function(form){
			
			var formData=new FormData($('#login-frm1')[0]);
			$.ajax({
				url:base_url+'home/login_user',
				data:formData,
				async:false,
				cache:false,
				contentType:false,
				processData:false,
				type:'POST',
				success:function(data){
					//console.log(data);

					if(data != false && data!='not_exist'){
						var obj = jQuery.parseJSON(data);
						//$(".nav-bar2").show();
					//$(".links").remove();
						$("#login_btn").remove();
						$("#register_btn").remove();
						$(".logout_sec").css("display",'block');
						//$(".nav-bar2 .user_name").html('<i class="fa fa-user"></i> '+obj.name);
						
						$("#user_id").val(obj.id);
						$("#myModal1").modal('hide');
						$(".login_instruction").hide();
						//swal("","You have Successfully Login!!",'success');
						
						/*setTimeout(function(){// wait for 5 secs(2)
           					//location.reload(); // then reload the page.(3)
							window.location.href = base_url+'home';
							//window.location = base_url+'home/make';
      					}, 5000);*/
						swal({
							text:"You have Successfully Login!!",
							type:"success",
							showCancelButton:true,confirmButtonColor:"#DD6B55",
							confirmButtonText:"OK",
							cancelButtonText:"CANCEL"
						}).then(function(isConfirm){
							if(isConfirm.value == true){
							//window.location.href = base_url+'home';
							window.location = base_url+'home/place';
							}
						});
						
					}
					else if(data==false)
					{
						swal("","Entered password is wrong!!",'error');
						//$(".login_error").css('display','block');
						//$(".login_error").html("Entered password is wrong!!");
					}
					else if(data=='not_exist'){
						//$(".login_error").css('display','block');
						//$(".login_error").html("Account not exist!!");
						swal("","Account not exist!!",'error');
					}
				},
			});
		},

	});
	
	$("#registration-frm").submit(function(e)
	{
		e.preventDefault();
	}).validate({
		rules:{
			   name:{required:true,},
			   newemail:{email:true,required:true,
						"remote" :
					  {
						  url: base_url+'home/check_mail_exist',
						  type: "post",
						  data:
						  {
						      'csrf_test_name':CSRF_TOKEN,
							  emails: function()
							  {
								  return $('input[name="newemail"]').val();
							  }
						  }
					  }
						},
			   /*mobile:{required:true,number : true,},
			   newpwd:{required:true,minlength:5,},
			   connewpwd:{required:true,minlength:5,equalTo:"#newpwd"},*/
				/*"g-recaptcha-response":{
										required:true,
										"remote" :
										  {
											  url: base_url+'home/google_recaptcha_verify',
											  type: "post",
											  data:
											  {
											  }
										  }
									   },*/
			  },
		messages:{
			name:{required:"A name  is required."},
			newemail:{email:"Please enter a valid email address",required:"Please Enter Email Address",
					 "remote": "{0} is already taken."
					 },
			/*mobile:{required:"A mobile number  is required.",
		    number : "Enter valid mobile number!!",},
			newpwd:{required:"A Password is required.",minlength:"Password must be at least 5 characters in length."},
			connewpwd:{required:"A Confirm Password is required.",minlength:"Repeat Password must be at least 5 characters in length.",
			equalTo:"Confirm Password must be same as password"},*/
			
			
			/*"g-recaptcha-response":{required:"Verify Recaptcha!!","remote" : "Robot verification failed, please try again."},*/
			
		},
		submitHandler:function(form){
			var formData=new FormData($('#registration-frm')[0]);
			$.ajax({
				url:base_url+'home/add_reg_user',
				data:formData,
				async:false,
				cache:false,
				contentType:false,
				processData:false,
				type:'POST',
				success:function(data){
					if(data!=false){
						var obj = jQuery.parseJSON(data);
					$("#user_id").val(obj.id);
						$("#login_btn").remove();
						$("#register_btn").remove();
						//$("#register-modal").modal('hide');
						//$(".login_section").hide();
						$(".logout_sec").css("display",'block');
						/*swal("","Your registration completed successfully! Please check your mail for get your login details.",'success');
						
						setTimeout(function(){// wait for 5 secs(2)
           					//location.reload(); // then reload the page.(3)
							window.location.href = base_url+'home';
      					}, 5000); */
						swal({
							text:"Your registration completed successfully! Please check your mail for get your login details.",
							type:"success",
							showCancelButton:true,confirmButtonColor:"#DD6B55",
							confirmButtonText:"OK",
							cancelButtonText:"CANCEL"
						}).then(function(isConfirm){
							if(isConfirm.value == true){
							//window.location.href = base_url+'home';
							window.location = base_url+'home/home';
							}
						});	
						
					}
				},
				
			});
		},
	});
	$.ajax({
				"url": base_url+'home/get_colors',
				"method": 'POST',
				"data":{'csrf_test_name':CSRF_TOKEN},
				success:function(res){
					res_cols=$.parseJSON(res);
				}
	});
	$( ".mobi-menu" ).click(function() {

			$( "header nav" ).slideDown( "slow", function() {
			});

			});

			$('header nav a.exit').on('click', function(){

				$('header nav').slideUp( "slow", function() {

				});

			});



	// Block animation
	 AOS.init({
		easing: 'ease-in-out-sine',
		disable: 'mobile'
	 });


	$(window).scroll(function () {
		AOS.refreshHard();
	});

$('.indoor-outdoor a').click(function() {	
    $('.indoor-outdoor a.active').removeClass('active');
    $(this).addClass('active');
	$(".go_to_step2").trigger("click");
});

$( ".slider_range" ).slider({
	orientation: "horizontal",
	range: "min",
	min: 0,
	max: 100,
	value:0,
	step: 5,
	slide: function( event, ui ) {
		var id=$(this).data('id');
		var count=$(this).data('count');
		var bgcolor=$(this).data('hexcode');
		$(this).find('div.ui-slider-range').css('background',bgcolor);
		if(id == 1 && count == 0){
		    
		    min_val = $('input[name=fixed_min_value_black]').val();
		   // console.log(min_val);
		   // console.log(ui.value);
		    if(min_val > ui.value){
		       return false; 
		    }
		    else{
		    return checkTotal(this, ui.value, id);
		    }
		}
		else{
	    	return checkTotal(this, ui.value, id);
		}
	
	},
	stop:function( event, ui ) {
		checkTotal();
	}
});
	
	//$("#slide01").slider("option", "min", 5);
/*	$("#slide01").slider({
	   range: "min",
	   min: 0,
	   max: 100,
	   step: 5,
	   slide: function (event, ui) {
	       
		  return checkTotal(this, ui.value, 0);
	   }
	}); */
	var total_progress = 0;
	 $(".slider_range").each(function () {
		 
		//var amount = $(this).slider("value");
		 var colors_id = $(this).data('id');
		 var counter = $(this).data('count');
		 var bgcolor=$(this).data('hexcode');
		 var value = $('#slider_value'+colors_id+'_'+counter).val();
		 if(value!=0){
		    total_progress = parseInt(total_progress) + parseInt(value);
			$(this).find('div.ui-slider-range').css('background',bgcolor);
		 //	$(this).slider( "option", "value", value);
			 $("#slide"+counter+colors_id).slider("option", "value", parseInt(value));
			checkTotal(this,value,colors_id);
			 $(".mix_it").attr('disabled',false);
		 }
		 //$( ".slider_range" ).slider( "option", "value", 10 );
	 });

	
	/*$(".slider_text_box").on('keyup',function(){
		var id = $(this).data('id');
		var cnt = $(this).data('cnt')
		var value = $(this).val();
		total_progress = parseInt(total_progress) + parseInt(value);
		
		$("#slide"+cnt+id).slider( "option", "value", parseInt(value));
		return checkTotal($("#slide"+cnt+id),parseInt(value),id);
	});*/
	
	 /*$('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
			currentVal = currentVal + 1;
            $('input[name='+fieldName+']').val(currentVal);
        } else {
            // Otherwise put a 0 there
			currentVal = 0;
            $('input[name='+fieldName+']').val(0);
        }
		var id = $('input[name='+fieldName+']').data('id');
		var cnt = $('input[name='+fieldName+']').data('cnt')
		var value = currentVal;
		console.log(parseInt(currentVal));
		 $("#slide"+cnt+id).slider( "option", "value", parseInt(currentVal));
		
		 //checkTotal($("#slide"+cnt+id),parseInt(currentVal),id);
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
			currentVal = currentVal - 1
            $('input[name='+fieldName+']').val(currentVal);
        } else {
            // Otherwise put a 0 there
			currentVal = 0;
            $('input[name='+fieldName+']').val(0);
        }
		var id = $('input[name='+fieldName+']').data('id');
		var cnt = $('input[name='+fieldName+']').data('cnt')
		var value = currentVal;
		console.log(parseInt(currentVal));
		 $("#slide"+cnt+id).slider( "option", "value", parseInt(currentVal));
    });*/
	
	$(".progress_total").slider({
		  range: "min",
		  value: 0,
		  min: 0,
		  slide: function slider_slide(event, ui) {
				return false; // this code not allow to dragging
			},
	   });
	$(".proces").html(parseInt(total_progress)+'%');
	$('.progress_total').slider( "option", "value", total_progress);
	$("#tot_progress_input").val(parseInt(total_progress));

$('input[type="range"]').change(function (e) {
    var val = ($(this).val() - $(this).attr('min')) / ($(this).attr('max') - $(this).attr('min'));

    $(this).css('background-image',
          '-webkit-gradient(linear, left top, right top, '
          + 'color-stop(' + val + ', #58585a), '
          + 'color-stop(' + val + ', #fff)'
          + ')'
          );
});
var html_content;
$(".pick_color").on('click',function(){
	html_content = "";
	var col_id = $(this).data('id');
	$.ajax({
		'url':base_url+"home/get_single_details_colors",
		"method": 'POST',
		"data":{'color_id':col_id,'csrf_test_name':CSRF_TOKEN},
		success:function(res){
			html_content=jQuery.parseJSON(res);
		},
		complete:function(res){
			
			if($(".selected_granulas").length>4){
				swal("","You already have the maximum amount of colors selected!!", "error");
			}
			else if($(".selected_granulas"+html_content.id).length>=2 && html_content.coarse == 1 && html_content.fine == 1) {
				swal("","You already have the maximum amount of this color!!", "error");
			}
			else if($(".selected_granulas"+html_content.id).length>=1 && html_content.coarse == 1 && html_content.fine == 0) {
				swal("","You already have the maximum amount of this color!!", "error");
			}
			else if($(".selected_granulas"+html_content.id).length>=1 && (html_content.coarse == 0 && html_content.fine == 1)){
				swal("","You already have the maximum amount of this color!!", "error");
			}
			else if(html_content.coarse == 0 && html_content.fine==0) {
				swal("","Not Available!!", "error"); 
			}
			else
			{
				var fine = '';
				var coarse = '';
				var type='';
				var type_class='';
			 	$(".pc_color"+html_content.id).addClass('active');
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

				if(html_content.coarse == 1 && html_content.fine == 1 && html_content.color_title != 'Black'){
					type = 'Coarse'
					type_class="coarse";
					var fine_coarse_html = '<ul class="coarse_fine"><li id="fine'+html_content.id+'_'+color_count+'" data-colid="'+html_content.id+'" data-count="'+color_count+'" class="fine_1 fine_1_'+html_content.id+'_'+color_count+' active"><span class="fine" data-id="'+html_content.id+'" data-coarse="'+html_content.coarse+'" data-fine="'+html_content.fine+'">Fine</span></li><li id="coarse'+html_content.id+'_'+color_count+'" data-colid="'+html_content.id+'" data-count="'+color_count+'" class="coarse_1 coarse_1_'+html_content.id+'_'+color_count+'"><span class="coarse" data-id="'+html_content.id+'" data-coarse="'+html_content.coarse+'" data-fine="'+html_content.fine+'">Coarse</span></li></ul>';
				}
				/*else if(html_content.coarse == 1 && html_content.fine == 1 && html_content.color_title != 'Black'){
						type = 'Coarse'
						type_class="coarse";
					var fine_coarse_html = '<ul class="coarse_fine"><li id="fine'+html_content.id+'_'+color_count+'" data-colid="'+html_content.id+'" data-count="'+color_count+'" class="fine_1 fine_1_'+html_content.id+'_'+color_count+' active"><span class="fine" data-id="'+html_content.id+'" data-coarse="'+html_content.coarse+'" data-fine="'+html_content.fine+'">Fine</span></li><li id="coarse'+html_content.id+'_'+color_count+'" data-colid="'+html_content.id+'" data-count="'+color_count+'" class="coarse_1 coarse_1_'+html_content.id+'_'+color_count+'"><span class="coarse" data-id="'+html_content.id+'" data-coarse="'+html_content.coarse+'" data-fine="'+html_content.fine+'">Coarse</span></li><li><span style="background-color: transparent;width: 69px;border-color: transparent;"></span></li></ul>';
				}*/
				else if(html_content.coarse == 0 && html_content.fine == 1  && html_content.color_title != 'Black'){
						type = 'Fine'
						type_class="Fine";
					var fine_coarse_html = '<ul class="coarse_fine"><li id="fine'+html_content.id+'_'+color_count+'" data-colid="'+html_content.id+'" data-count="'+color_count+'" class="fine_1 fine_1_'+html_content.id+'_'+color_count+' active"><span class="fine" data-id="'+html_content.id+'" data-coarse="'+html_content.coarse+'" data-fine="'+html_content.fine+'" data-chunk="'+html_content.chunk+'">Fine</span></li><li><span style="background-color: transparent;width: 75px;border-color: transparent;"></span></li></ul>';
				}
				else if(html_content.coarse == 1 && html_content.fine == 0 && html_content.color_title != 'Black'){
						type = 'Coarse'
						type_class="Coarse";
					var fine_coarse_html = '<ul class="coarse_fine"><li id="coarse'+html_content.id+'_'+color_count+'" data-colid="'+html_content.id+'" data-count="'+color_count+'" class="coarse_1 coarse_1_'+html_content.id+'_'+color_count+' active"><span class="coarse" data-id="'+html_content.id+'" data-coarse="'+html_content.coarse+'" data-fine="'+html_content.fine+'" data-chunk="'+html_content.chunk+'">Coarse</span></li><li><span style="background-color: transparent;width: 56px;border-color: transparent;"></span></li></ul>';
				}
				/*else if(html_content.coarse == 0 && html_content.fine == 1 && html_content.color_title != 'Black'){
					type = 'Fine';
					type_class="fine";
					var fine_coarse_html = '<ul class="coarse_fine"><li id="fine'+html_content.id+'_'+color_count+'" data-colid="'+html_content.id+'" data-count="'+color_count+'" class="fine_1 fine_1_'+html_content.id+'_'+color_count+' active"><span class="fine" data-id="'+html_content.id+'" data-coarse="'+html_content.coarse+'" data-fine="'+html_content.fine+'">Fine</span></li><li><span style="background-color: transparent;width: 69px;border-color: transparent;"></span></li><li><span style="background-color: transparent;width: 69px;border-color: transparent;"></span></li></ul>';
				}
				else if(html_content.coarse == 1 && html_content.fine == 0 && html_content.color_title != 'Black'){
					type = 'Coarse';
					type_class="coarse";
					var fine_coarse_html = '<ul class="coarse_fine"><li id="coarse'+html_content.id+'_'+color_count+'" data-colid="'+html_content.id+'" data-count="'+color_count+'" class="coarse_1 coarse_1_'+html_content.id+'_'+color_count+' active"><span class="coarse" data-id="'+html_content.id+'" data-coarse="'+html_content.coarse+'" data-fine="'+html_content.fine+'" >Coarse</span></li><li><span style="background-color: transparent;width: 69px;border-color: transparent;"></span></li><li><span style="background-color: transparent;width: 69px;border-color: transparent;"></span></li></ul>';
				}*/
				else if(html_content.coarse == 0 && html_content.fine == 0 && html_content.color_title != 'Black'){
					type = '';
					type_class="";
					var fine_coarse_html = '<ul class="coarse_fine"><li><span style="background-color: transparent;width: 69px;border-color: transparent;"></span></li><li><span style="background-color: transparent;width: 69px;border-color: transparent;"></span></li></ul>';
				}
				else if(html_content.color_title != 'Black'){
					type = '';
					type_class="";
					var fine_coarse_html = '<ul class="coarse_fine"><li><span style="background-color: transparent;width: 69px;border-color: transparent;height: 24px;"></span></li><li><span style="background-color: transparent;width: 69px;border-color: transparent;"></span></li></ul>';
				}
				else{
					if(html_content.color_title != 'Black'){
						type = 'Fine';
						type_class="fine";
						var fine_coarse_html = '<ul class="coarse_fine"><li id="fine'+html_content.id+'_'+color_count+'" data-colid="'+html_content.id+'" data-count="'+color_count+'" class="fine_1 fine_1_'+html_content.id+'_'+color_count+' active"><span class="fine" data-id="'+html_content.id+'" data-coarse="'+html_content.coarse+'" data-fine="'+html_content.fine+'">Fine</span></li><li><span style="background-color: transparent;width: 69px;border-color: transparent;"></span></li></ul>';
					}
				}
				var html =  '<div class="custnewpage2 col-md-12 col-lg-12 col-sm-6 col-xs-12"><li class="selected_granulas selected_granulas'+html_content.id+'  counter_' + html_content.id + '_' + color_count + '" data-counter="'+color_count+'" id="'+html_content.id+'">'+
				  '<a data-counter="' + color_count + '" id="' + html_content.id + '" class="remove delete_current"><span aria-hidden="true">×</span></a>'+
				  '<figure class="'+type_class+'"> <img src="'+base_url+'uploads/colors/'+html_content.color_img+'" alt=""> </figure>'+
				  '<div class="content">'+
					'<div class="name">'+html_content.color_title+'</div>'+fine_coarse_html+
				  '</div>'+
				'</li></div>';

				$(".color_drop_section").append(html);
				if ($('.selected_granulas').length < 1) {
					$(".head_buttons_step_2").hide();
					$(".btn.go_to_step3").hide();
				}
				else{
					$(".head_buttons_step_2").show();
					$(".btn.go_to_step3").show();
				}
				$(".delete_current").on('click', function () {
					$(".counter_" + $(this).attr('id') + '_' + $(this).data('counter')).remove();
					if ($('.selected_granulas').length <= 0) {
						$(".color_sen").show();
					}
					if ($('.selected_granulas' + $(this).attr('id')).length <= 0) {
						$(".pc_color" + $(this).attr('id')).removeClass('active');
					}
					if ($('.selected_granulas').length < 1) {
						$(".head_buttons_step_2").hide();
						$(".btn.go_to_step3").hide();
					}
					else{
						$(".head_buttons_step_2").show();
						$(".btn.go_to_step3").show();
					}
				});

			}
		},
	});
	
});
/*$(".delete_current").on('click', function () {
	window.location.href = base_url+'home';
});*/
$(".delete_current").on('click', function () {
	$(".counter_" + $(this).attr('id') + '_' + $(this).data('counter')).remove();
	if ($('.selected_granulas').length <= 0) {
		$(".color_sen").show();
	}
	if ($('.selected_granulas' + $(this).attr('id')).length <= 0) {
		$(".pc_color" + $(this).attr('id')).removeClass('active');
	}
	if ($('.selected_granulas').length < 1) {
		$(".btn.go_to_step3").hide();
	}
	else{
		$(".btn.go_to_step3").show();
	}
});
$(".go_to_step3").on("click",function(){
	
	
	var added_html='';
	var color_id=[];
	var color_infos=[];
	if ($('.selected_granulas').length < 1) {
		swal("","Select atleast one color!!", "error");
	}
	else
	{
		var check_multiple_array_fine=[];
		var check_multiple_array_coarse=[];
		//var check_multiple_array_chunk = [];
		var cnt=0;
		$(".selected_granulas").each(function(){
			var id=$(this).attr('id');
			var color_array=[];
			color_id.push([$(this).attr('id'),$(this).data('counter')]);
			color_array.push($(this).attr('id'));
			color_array.push(0);
			
			//console.log($(this).find('.coarse_fine li').hasClass('active'));
			if($(this).find('.coarse_fine li:first').hasClass('active') && id != 43){
				var type=$(this).find('.coarse_fine li:first span').attr('class');
				if(type=='fine'){
					color_array.push(1);
					color_array.push(0);
					check_multiple_array_fine.push($(this).attr('id'));
				}
				else if(type=='coarse'){
					color_array.push(0);
					color_array.push(1);
					check_multiple_array_coarse.push($(this).attr('id'));
				}
				else{
					color_array.push(0);
					color_array.push(0);
				}
			}
			else if($(this).find('.coarse_fine li:nth-child(2)').hasClass('active') && id != 43){
				var type=$(this).find('.coarse_fine li:nth-child(2) span').attr('class');
				if(type=='fine'){
					color_array.push(1);
					color_array.push(0);
					check_multiple_array_fine.push($(this).attr('id'));
				}
				else if(type=='coarse'){
					color_array.push(0);
					color_array.push(1);
					check_multiple_array_coarse.push($(this).attr('id'));
				}
				else{
					color_array.push(0);
					color_array.push(0);
				}
			}
			else{
				var type=$(this).find('.coarse_fine li:last span').attr('class');
				if(type=='fine'){
					color_array.push(1);
					color_array.push(0);
					check_multiple_array_fine.push($(this).attr('id'));
				}
				else if(type=='coarse'){
					color_array.push(0);
					color_array.push(1);
					check_multiple_array_coarse.push($(this).attr('id'));
				}
				else{
					color_array.push(0);
					color_array.push(0);
				}
				
			}
			color_array.push($(this).data('counter'));
			color_infos.push(color_array);
			cnt++;
		});
		var sorted_fine_array = check_multiple_array_fine.sort();
			  for (var i = 0; i < check_multiple_array_fine.length; i++)
			  {
				 if (sorted_fine_array[i + 1] === sorted_fine_array[i])
				 {
					 swal("",'You can only select one instance of fine or coarse  grain for a single color!!', "error");
					 return;
				 }
			  }

			  var sorted_coarse_array = check_multiple_array_coarse.sort();
			  for (var i = 0; i < check_multiple_array_coarse.length; i++)
			  {
				 if (sorted_coarse_array[i + 1] === sorted_coarse_array[i])
				 {
					
					 swal("",'You can only select one instance of fine or coarse  grain for a single color!!', "error");
					 return;
				 }
			  }
			 /*var sorted_chunk_array = check_multiple_array_chunk.sort();
			  for (var i = 0; i < check_multiple_array_chunk.length; i++)
			  {
				 if (sorted_chunk_array[i + 1] === sorted_chunk_array[i])
				 {
					
					 swal("",'You can only select one instance of fine or coarse or chunk grain for a single color!!', "error");
					 return;
				 }
				  if($.inArray(sorted_chunk_array[i], sorted_fine_array) !== -1)
				  {
				  	 swal("",'You can\'t select chunk and fine for same color!!', "error");
					 return;
				  }
			  }*/
		$.ajax({
				
				"url": base_url+'home/create_new_color_session',
				 "method": 'POST',
				"data":{'colors':color_infos,'csrf_test_name':CSRF_TOKEN},
				success:function(res){
					if(res == true){	
						
						window.location.href = base_url+'home/step_3';
					}
				},
				complete:function(res){
					//$( "#slide1" ).slider( "option", "value",20);
				}
			});
				
		//console.log(color_infos);
	}
});
	
$(document).on('click','.go_to_step7',function(){
	window.location.href = base_url+'home/make_logo';
});
$(document).on('click','.go_to_step6',function(){
	window.location.href = base_url+'home/make';
});


$(document).on('click','.remove',function(){
	var id = $(this).data('id');
	var count = $(this).data('count');
	$("#delete_part"+id+'_'+count).remove();
	checkTotal();
});
$('.reset_and_go_to_home').on('click',function(){
	swal({
			title:"Are you sure?",
			text:"You will loose all your selected colors...",
			type:"warning",
			showCancelButton:true,confirmButtonColor:"#DD6B55",
			confirmButtonText:"OK",
			cancelButtonText:"CANCEL"
		}).then(function(isConfirm){
			if(isConfirm.value == true){
			$.ajax({ 
				'url' : base_url + 'home/destroy_step2_3_details',
				'type' :"POST",
				'data' : {'csrf_test_name':CSRF_TOKEN},
				'success' : function(res){
					$("#slide01").slider({
					   range: "min",
					   value: 5,
					   min: 0,
					   max: 100,
					   step: 5,
					   slide: function (event, ui) {
						  return checkTotal(this, ui.value, 0);
					   }
					});
					window.location.href = base_url + 'home';  
				},
				});
			}
		});
});
$(document).on('click','.placeopen',function(){
	window.location.href = base_url+ 'home/place';
});
$(".go_to_step2").on("click",function(){
	if($(".indoor-outdoor a").hasClass('active')){
		if($(".indoor-outdoor a.active").hasClass('indoor')){
			var actve_cat = '1';
		}
		else if($(".indoor-outdoor a.active").hasClass('outdoor')){
			var actve_cat = '2';
		}
		$.ajax({
			'url':base_url+ 'home/check_current_category',
			'type' :"POST",
			'data' : {'category': actve_cat,'csrf_test_name':CSRF_TOKEN },
			'success' : function(res){
				
				if(res == false){
					$.ajax({ 
						'url' : base_url + 'home/destroy_and_create_category_session',
						'type' :"POST",
						'data' : {'category': actve_cat,'csrf_test_name':CSRF_TOKEN },
						'success' : function(res){
							window.location.href = base_url + 'home/step_2';  
						},
					});
				}
				else{
					$.ajax({ 
						'url' : base_url + 'home/create_category_session',
						'type' :"POST",
						'data' : {'category': actve_cat,'csrf_test_name':CSRF_TOKEN },
						'success' : function(res){
							window.location.href = base_url + 'home/step_2';  
						},
					});
				}
			},
		});
	}
	else{
		//$.notify("Please Select Category!!", "error");
		swal("", "Please Select Category!!", "error");
	}
});
  /*$(".owl-carousel").owlCarousel({
    items: 1,
  });*/
	$(document).on('click','.del',function(){
		var id = $(this).data('id');
		var cat = $(this).data('catid');
		swal({
			title:"Are you sure?",
			text:"You are not able to recover this swatch...",
			type:"warning",
			showCancelButton:true,confirmButtonColor:"#DD6B55",
			confirmButtonText:"OK",
			cancelButtonText:"CANCEL"
		}).then(function(isConfirm){
			if(isConfirm.value == true){
				$.ajax({
					'url' : base_url + 'home/delete_album',
					'type' : "POST",
					'data' : {'id' : id,'cat':cat, 'csrf_test_name':CSRF_TOKEN},
					success : function (res){
						if(res == true){
							$('#del'+id).remove();
							$('#swatchname').val('');
							$('#swatchname').attr('readonly',false);
							$.ajax({
								url : base_url+'home/check_created_image_session',
								type:"POST",
								data:{'csrf_test_name':CSRF_TOKEN},
								success:function(res){
									$.ajax({
										url:base_url+'home/check_session/saved_album_session',
										type:'GET',
										data:{'csrf_test_name':CSRF_TOKEN},
										success:function(res){
											if(res == true){
												$(".save_to_gallery_section").css("display",'block');
											}
											else{
												$(".save_to_gallery_section").css("display",'none');
											}
											window.location.reload();
										},
									});
									if(res==false && $('.saved-swatch').find('li').length==0){
										window.location.href = base_url + 'home/step_3';
									}
								}
							});
							/*var count = $('.saved-swatch').find('li').length;
							 if (count <= 0)
							 {
								 window.location.href = base_url + 'home/step_3'
							 }*/
						}

					},
				});
			}
		});
	});
	$(document).on('click','#request_for_sample',function(){
		$("#main_loader").show();
		$.ajax({
			'url' : base_url + 'home/get_request_sample_session_details',
			'type' : "POST",
			'data' : {'csrf_test_name':CSRF_TOKEN},
			success : function (res){
				console.log(res);
				var result = $.parseJSON(res);
				if(result!=false){
					$("#request_sample #swatch_image_request").attr("src",result.swatch_image);
					$("#request_sample .formula_list").html(result.formula_list);
					$("#request_sample #swatch_image_path").val(result.swatch_image);
					$("#request_sample #swatch_image_formula").val(result.formula_list);
				}
				$("#main_loader").hide();
				$("#request_sample").modal('show');
			}
		});
		$(".request_for_sample_form").addClass('active');
		$(".header-links a").removeClass('active');
		$(".header-links a:last").addClass('active');
	});
 

  function syncPosition(el) {
    //if you set loop to false, you have to restore this next line
    //var current = el.item.index;

    //if you disable loop you have to comment this block
    var count = el.item.count-1;
    var current = Math.round(el.item.index - (el.item.count/2) - .5);

    if(current < 0) {
      current = count;
    }
    if(current > count) {
      current = 0;
    }

    //end block

    sync3
      .find(".owl-item")
      .removeClass("current")
      .eq(current)
      .addClass("current");
    var onscreen = sync3.find('.owl-item.active').length - 1;
    var start = sync3.find('.owl-item.active').first().index();
    var end = sync3.find('.owl-item.active').last().index();

    if (current > end) {
      sync3.data('owl.carousel').to(current, 100, true);
    }
    if (current < start) {
      sync3.data('owl.carousel').to(current - onscreen, 100, true);
    }
  }

  function syncPosition2(el) {
    if(syncedSecondary) {
      var number = el.item.index;
      sync1.data('owl.carousel').to(number, 100, true);
    }
  }
$(".no_swatch_created").on('click',function(){
	swal("","Please create album first!!", "error");
});
 
	
	$( "#send_to_email_step4" ).click(function() {
        if($("#swatchname").val()==''){
				swal("","To proceed, please name your swatch!!", "error");
        }
        else{
            $("#dialog").modal('show');
        }
    });
    
	$( "#send_to_email" ).click(function() {
	    if($(".make_image_section img#make_image_div").attr('src')=='')
        {
            swal("","To proceed, please browse any one image from above!!", "error");
        }
        else if($(".make_image_section .inner_div").hasClass('active')){
			$("#dialog").modal('show');
        }
        else{
            swal("","To proceed, please name your swatch!!", "error");
        }
    });
	$( "#send_to_mail_with_logo" ).click(function() {
		
		if($(".logo_image_section .inner_div").hasClass('active')){
			$("#dialog_withlogo").modal('show');
        }
        else{
            swal("","To proceed, please name your swatch!!", "error");
        }
    });
	 $("#send_to_email_gallery_swatch").click(function() {
		 if($(".inner_div").hasClass('active')){
			 $("#dialog2 #swatch_id").val($(".inner_div.active").data('id'));
			 $("#dialog2 #gallery_image").val($(".flexslider li.flex-active-slide img").attr('src'));
           	 $("#dialog2").modal('show');
		 }
		 else
		 {
		 	swal("","To proceed, please select any swatch!!", "error");
		 }
    });
	$("#send_to_email_gal").click(function() {
		 if($(".view_single_image").hasClass('active')){
			 $("#dialog3 #swatch_id").val($(".view_single_image.active").data('id'));
           	 $("#dialog3").modal('show');
		 }
		 else
		 {
		 	swal("","To proceed, please select any swatch!!", "error");
		 }
    });
	$("#image_gallery_send").on('click',function(){
		
		$(".error").hide();
		   var hasError = false;
		   var emailReg = /^[a-zA-Z0-9.!#$%&*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

		   var emailToVal = $("#emailTo2").val();
		   if (emailToVal === '') {
			  $("#emailTo2").after('<span class="error">You forgot to enter the email address to send to</span>');
			  hasError = true;
		   } else if (!emailReg.test(emailToVal)) {
			  $("#emailTo2").after('<span class="error">Enter a valid email address to send to.</span>');
			  hasError = true;
		   }
		   else {
			  $("#dialog2").modal("hide");
			  //mailSwatch
			  var emailToVal = $('#emailTo2').val();
			  var gallery_image = $('#gallery_image').val();
			  var swatch_id = $('#dialog2 #swatch_id').val();
			  var postdata = {email: emailToVal, gallery_image: gallery_image, swatch_id: swatch_id,'csrf_test_name':CSRF_TOKEN};
			  $.post(base_url+"home/send_to_email_with_gallery", {email_data: postdata,'csrf_test_name':CSRF_TOKEN});
			 // alert(' This swatch has been successfully sent to' + ' ' + $('#emailTo').val());
			  // $.notify( 'This swatch has been successfully sent to' + ' ' + $('#emailTo').val(), "success");
			   swal("",'This swatch and gallery image has been successfully sent to' + ' ' + $('#emailTo2').val() , "success");
		   }
	});
	$("#image_send_gal").on('click',function(){
	
		$(".error").hide();
		   var hasError = false;
		   var emailReg = /^[a-zA-Z0-9.!#$%&*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

		   var emailToVal = $("#emailTo3").val();
		   if (emailToVal === '') {
			  $("#emailTo3").after('<span class="error">You forgot to enter the email address to send to</span>');
			  hasError = true;
		   } else if (!emailReg.test(emailToVal)) {
			  $("#emailTo3").after('<span class="error">Enter a valid email address to send to.</span>');
			  hasError = true;
		   }
		   else {
			  $("#dialog3").modal("hide");
			  //mailSwatch
			  var emailToVal = $('#emailTo3').val();
			  var swatch_id = $('#dialog3 #swatch_id').val();
			  var postdata = {email: emailToVal,  swatch_id: swatch_id,'csrf_test_name':CSRF_TOKEN};
			  $.post(base_url+"home/send_to_email_from_gallery", {email_data: postdata,'csrf_test_name':CSRF_TOKEN});
			 // alert(' This swatch has been successfully sent to' + ' ' + $('#emailTo').val());
			  // $.notify( 'This swatch has been successfully sent to' + ' ' + $('#emailTo').val(), "success");
			   swal("",'This swatch and gallery image has been successfully sent to' + ' ' + $('#emailTo3').val() , "success");
		   }
	});
	$("#image_send").on('click',function(){
		$(".error").hide();
		   var hasError = false;
		   var emailReg = /^[a-zA-Z0-9.!#$%&*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

		   var emailToVal = $("#emailTo").val();
		   if (emailToVal === '') {
			  $("#emailTo").after('<span class="error">You forgot to enter the email address to send to</span>');
			  hasError = true;
		   } else if (!emailReg.test(emailToVal)) {
			  $("#emailTo").after('<span class="error">Enter a valid email address to send to.</span>');
			  hasError = true;
		   }
		   else {
			  $("#dialog").modal("hide");
			  //mailSwatch
			  var emailToVal = $('#emailTo').val();
			  var img_swatch = $('#result_image').attr('src');
			  var swatch_name = $('#swatchname').val();
			  var info_color = $('.formula').html();
			  var current_cat = $("#current_cat").val();
			  var postdata = {email: emailToVal, color_formula: info_color, name_swatch: swatch_name, imageSwatch: img_swatch,current_cat:current_cat,'csrf_test_name':CSRF_TOKEN};
			  $.post(base_url+"home/send_to_email", {email_data: postdata,'csrf_test_name':CSRF_TOKEN});
			 // alert(' This swatch has been successfully sent to' + ' ' + $('#emailTo').val());
			  // $.notify( 'This swatch has been successfully sent to' + ' ' + $('#emailTo').val(), "success");
			   swal("",'This swatch has been successfully sent to' + ' ' + $('#emailTo').val() , "success");
		   }
	});
	$("#image_send_withgal").on('click',function(){
		$(".error").hide();
		   var hasError = false;
		   var emailReg = /^[a-zA-Z0-9.!#$%&*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

		   var emailToVal = $("#emailTo").val();
		   if (emailToVal === '') {
			  $("#emailTo").after('<span class="error">You forgot to enter the email address to send to</span>');
			  hasError = true;
		   } else if (!emailReg.test(emailToVal)) {
			  $("#emailTo").after('<span class="error">Enter a valid email address to send to.</span>');
			  hasError = true;
		   }
		   else {
			  $("#dialog").modal("hide");
			  //mailSwatch
			  //var gallery_image = $('#gallery_image').val();
			 // var swatch_id = $('#dialog #swatch_id').val();
			  var emailToVal = $('#emailTo').val();
			  var gallery_image = $('#make_image_div').attr('src');
			  var swatch_id =$(".make_image_section .inner_div.active img").data('id');
			  var postdata = {email: emailToVal, gallery_image: gallery_image, swatch_id: swatch_id,'csrf_test_name':CSRF_TOKEN};
			   
			   $.post(base_url+"home/send_to_email_with_gal", {email_data: postdata,'csrf_test_name':CSRF_TOKEN});
			 // alert(' This swatch has been successfully sent to' + ' ' + $('#emailTo').val());
			  // $.notify( 'This swatch has been successfully sent to' + ' ' + $('#emailTo').val(), "success");
			   swal("",'This swatch and gallery image has been successfully sent to' + ' ' + $('#emailTo').val() , "success");
		   }
	});
	$("#image_send_withlogo").on('click',function(){
		$(".error").hide();
		   var hasError = false;
		   var emailReg = /^[a-zA-Z0-9.!#$%&*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

		   var emailToVal = $("#emailTo").val();
		   if (emailToVal === '') {
			  $("#emailTo").after('<span class="error">You forgot to enter the email address to send to</span>');
			  hasError = true;
		   } else if (!emailReg.test(emailToVal)) {
			  $("#emailTo").after('<span class="error">Enter a valid email address to send to.</span>');
			  hasError = true;
		   }
		   else {
			  $("#dialog_withlogo").modal("hide");
			  //mailSwatch
			  var emailToVal = $('#emailTo').val();
			  var logo_image = $('#logo_image_div').attr('src');
			  var swatch_id =$(".logo_image_section .inner_div.active img").data('id');
			  var postdata = {email: emailToVal, logo_image: logo_image, swatch_id: swatch_id,'csrf_test_name':CSRF_TOKEN};
			   
			  $.post(base_url+"home/send_to_email_with_logo", {email_data: postdata,'csrf_test_name':CSRF_TOKEN});
			 
			   swal("",'This swatch has been successfully sent to' + ' ' + $('#emailTo').val() , "success");
		   }
	});
	var temp_count = 0;
	$(".mix_it").on('click',function(){
		
		var tot_progress =$("#tot_progress_input").val();
		if(tot_progress<100){
			 swal("",'Your total percentage must equal 100!!' , "error");
			 return;
		}
		var black_color = $('#slide01').slider("value"); 
		if (black_color < 5)
		{
			swal("",'Make sure you have selected at least 5% black!!' , "error");
		 	return;
		}
		if (temp_count > 0)
		{
			$('#info').text("");
		}
			  //Your Formula
		var formula = [];
		var info_formula;
		var size;
		var count_size = 0;
		var fine_size=0;
		var coarse_id_size_array = [];

		$(".slider_range").each(function () {
		 var amount = $(this).slider("value");
		 var colors_id = $(this).data('id');
		 var counter = $(this).data('count');
		 if($(".fine_1_"+colors_id+"_"+counter).hasClass('active')){
			fine_size = parseInt(fine_size) +parseInt(amount);
			   size = "Fine";
		  }
		  else if($(".coarse_1_"+colors_id+"_"+counter).hasClass('active')){
			  coarse_id_size_array.push([colors_id,parseInt(amount)]);
			  size = "Coarse";
		  }
		 var name_selected = $("#delete_part"+colors_id+'_'+counter+' .name').html();
		 info_formula = {name: name_selected, coarse_fine: size, percent: amount,'csrf_test_name':CSRF_TOKEN};
		 formula.push(info_formula);
		});
		if(fine_size<15){
		   swal("",'Your fine colors are' + ' ' + fine_size + '%' + ' ' + ' please ensure you have selected a minimum of 15% fine granules!', "error");

		   return;
		}
		/*if(cork_size>10){
		   swal("","Maximum 10% of cork color is needed!!",'error');
		   return;
		}
		if(cork_size<10 && cork_size > 0){
		   swal("",'Maximum 10% of cork color is needed!!', "error");
		   return;
		}
		if(chunk_size > 30)
		{
			swal("",'You can use maximum 30% of chunk colors!!', "error");
			return;
		}*/
		var check_multiple_array_fine = [];
		var check_multiple_array_coarse = [];
		$.each(formula, function () {
			if ((this.coarse_fine) === "Fine")
			{
				check_multiple_array_fine.push(this.name);
			}
			if ((this.coarse_fine) === "Coarse")
			{
				check_multiple_array_coarse.push(this.name);
			}		
		});
		 var sorted_fine_array = check_multiple_array_fine.sort();
		  for (var i = 0; i < check_multiple_array_fine.length; i++)
		  {
			 if (sorted_fine_array[i + 1] === sorted_fine_array[i])
			 {
				swal("",'You can only select one instance of fine or coarse grain for a single color!!', "error");
				return;
			 }
		  }
		  var sorted_coarse_array = check_multiple_array_coarse.sort();
		  for (var i = 0; i < check_multiple_array_coarse.length; i++)
		  {
			 if (sorted_coarse_array[i + 1] === sorted_coarse_array[i])
			 {
				swal("",'You can only select one instance of fine or coarse or chunk grain for a single color!!', "error");
				return;
			 }
		  }
					 
		$("#main_loader").show();
		
		var image_info = [];
		var image_name = [];
		image_info = get_info();
		
		var file_Name = '';
		for (var i = 0; i < (image_info.length) - 1; i++)
		{
		 var file_Chunks = image_info[i]['id']+'_'+image_info[i]['percent'] + '_' + image_info[i]['r'] + '_' + image_info[i]['g'] + '_' + image_info[i]['b'] + '_' + image_info[i]['flecks_size'] + '-';
		 file_Name += file_Chunks;
		}
		var img_src = file_Name + image_info[(image_info).length - 1]['time_stamp'];
			 // console.log(img_src);
			$.ajax({
				url: base_url + "home/drawImage",
				type: 'POST',
				data:{'colors':image_info,'img_src':img_src,'csrf_test_name':CSRF_TOKEN},
				success:function(res){

					var src = base_url +'images/' + img_src + '.jpg';
					var html_formula='';
					$.each(formula, function (){
						if(this.coarse_fine!=''){
							html_formula+='<span>'+this.name + ' - '  + this.coarse_fine  + ' - ' + this.percent + '%' + ' ' + '</span>';
						}
						else{
							html_formula+='<span>'+this.name + ' - ' + this.percent + '%' + ' ' + '</span>';
						}
					});
					$.ajax({
						url: base_url + "home/go_to_step4",
						type: 'POST',
						data:{'img_src':src,'html_formula':html_formula,'csrf_test_name':CSRF_TOKEN},
						success:function(res){
							if(res == true){
								$("#main_loader").hide();
								window.location.href = base_url+'home/step_4';
							}
						},
					});
				},

		  });					  
	});
	$('.img_opacity').click(function(){ //alert('hiii');
		$('.img_opacity.active').removeClass('active');
		$(this).addClass('active');
		$('slides').addClass('.imgleft .active');
	});
	$('.delete_res').on('click',function(){
		swal({
			title:"Are you sure?",
			text:"You are not able to recover this swatch...",
			type:"warning",
			showCancelButton:true,confirmButtonColor:"#DD6B55",
			confirmButtonText:"OK",
			cancelButtonText:"CANCEL"
		}).then(function(isConfirm){
			if(isConfirm.value == true){ 
				  $.ajax({
						url: base_url + "home/delete_created_image_session",
						type: 'POST',
						data:{'csrf_test_name':CSRF_TOKEN},
						success:function(res){
							if(res == true){
							  //$("#result_image").parent().css('height','238px');
							 // $("#result_image").parent().css('width','263px');
							  $("#result_image").attr('src','');
							  $(".formula span").remove();
								$(".custome-swatch .final-color figure").css('display','none');
								$(".custome-swatch .final-color .social").css('display','none');
								$(".custome-swatch #send_to_email").css('display','none');
								$(".custome-swatch .color-formula").css('display','none');
							  if ($('.saved-swatch.outdoor_category li').length == 0 && $('.saved-swatch.indoor_category li').length == 0) 
							  {
								window.location.href = base_url+'home/step_3';
							  }

							}
						},
				  });
			}
		});
	});
	$('.zoom_image').on('click', function() {
		$('.enlargeImageModalSource').attr('src', $('#result_image').attr('src'));
		$('#enlargeImageModal').modal('show');
	});
	$('.zoom_single_image').on('click', function() {
		$('.enlargeImageModalSource').attr('src', $(this).attr('src'));
		$('#enlargeImageModal').modal('show');
	});
	
	if($(".main-list li").hasClass('cork_class')){
 
 		var id = '43';
		var cnt = $(".main-list li.cork_class").data('count_var');
		var value = '10';
		total_progress = parseInt(total_progress) + parseInt(value);
		/*if(total_progress>100){
			$.notify("Total of all colors is not more than 100%!!", "error");
		} */
		$("#slide"+cnt+id).slider( "option", "value", parseInt(value));
		$("#slide"+cnt+id).slider( "option", "disabled", true);
		return checkTotal($("#slide"+cnt+id),parseInt(value),id);
	}
	$(".request_for_sample_generated").on('click',function(){
		$("#main_loader").show();
		
		$.ajax({
			'url' : base_url + 'home/get_request_sample_session_details',
			'type' : "POST",
			'data' : {'csrf_test_name':CSRF_TOKEN},
			success : function (res){
				var result = $.parseJSON(res);
				if(result!=false){
					$("#request_sample #swatch_image_request").attr("src",result.swatch_image);
					$("#request_sample .formula_list").html(result.formula_list);
					$("#request_sample #swatch_image_path").val(result.swatch_image);
					$("#request_sample #swatch_image_formula").val(result.formula_list);
				}
				$(".header-links a:last").addClass('active');
				$(".request_for_sample_form").addClass('active');
				$("#main_loader").hide();
				$("#request_sample").modal('show');

			}
		});
			
	});
	$(".request_for_sample_saved").on('click',function(){
		//$("#main_loader").show();
		
		var id = $(this).data('id');
		$.ajax({
			url: base_url + "home/set_request_sample_session",
			method: 'POST',
			data:{
				'id': id,
				'csrf_test_name':CSRF_TOKEN
			},
			success:function(res){

			},
			complete:function(res){
				$.ajax({
					'url' : base_url + 'home/get_request_sample_session_details',
					'type' : "POST",
					'data' : {'csrf_test_name':CSRF_TOKEN},
					success : function (res){
						var result = $.parseJSON(res);
						if(result!=false){
							$("#request_sample #swatch_image_request").attr("src",result.swatch_image);
							$("#request_sample .formula_list").html(result.formula_list);
							$("#request_sample #swatch_image_path").val(result.swatch_image);
							$("#request_sample #swatch_image_formula").val(result.formula_list);
							if(result.user != false){
								$("#request_sample #request_name").val(result.user.user_name);
								$("#request_sample #request_name").attr('readonly',true);
								$("#request_sample #request_email").val(result.user.email);
								$("#request_sample #request_email").attr('readonly',true);
								$("#request_sample #request_telephone").val(result.user.mobile);
								if(result.user.mobile!=''){
									$("#request_sample #request_telephone").attr('readonly',true);
								}
							}
						}
						$(".header-links a:last").addClass('active');
						$(".request_for_sample_form").addClass('active');
						//$("#main_loader").hide();
						$("#request_sample").modal('show');

					}
				});
			}
		});
	});
	$('.delete_swatch_gal').on('click',function(){
		var id1 = $(this).data('id');
		var cat = $(this).data('catid');
		swal({
				title:"Are you sure?",
				text:"You are not able to recover this swatch...",
				type:"warning",
				showCancelButton:true,confirmButtonColor:"#DD6B55",
				confirmButtonText:"OK",
				cancelButtonText:"CANCEL"
			}).then(function(isConfirm){
				if(isConfirm.value == true){
					$.ajax({ 
						'url' : base_url + 'home/delete_swatch',
						'type' :"POST",
						'data' : { id : id1,cat:cat, 'csrf_test_name':CSRF_TOKEN },
						'success' : function(res){
							if(res == true){
								$("#view_swatch_details").hide();
								$("#delete_sec"+id1).remove();
								window.location.reload();
								//window.location.href = base_url+'view_gallery';
							}
						},
					});
				}
			});
	});
	
	$('.delete_swatch_from_gal').on('click',function(){
			var id1 = $(this).data('id');
			var cat = $(this).data('cat-id');
			swal({
				title:"Are you sure?",
				text:"You are not able to recover this swatch...",
				type:"warning",
				showCancelButton:true,confirmButtonColor:"#DD6B55",
				confirmButtonText:"OK",
				cancelButtonText:"CANCEL"
				}).then(function(isConfirm){
					if(isConfirm.value == true){
						$.ajax({ 
							'url' : base_url + 'home/delete_swatch',
							'type' :"POST",
							'data' : { id : id1,cat:cat,'csrf_test_name':CSRF_TOKEN },
							'success' : function(res){
								if(res == true){
									$("#view_swatch_details").hide();
									$("#delete_sec"+id1).remove();
									window.location.reload();
									//window.location.href = base_url+'view_gallery';
								}
							},
						});
					}
				});

		});
				$('#fb_share').click(function (e) { 
					 FB.ui(
							 {
								method: 'feed',
								name: $('#swatch_title').text(),
								picture:$('#result_image1').attr('src'),
								caption:'The Color Conductor',
								//description: 'Formula for the custom swatch:'+ $('.formula').text(),
							 },function(response){});

				  });
				
	
	$(document).on('click','.qtyplus',function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
       /* if(fieldName == 'slider_value_text1_0'){
                    
            max = $('#fixed_min_value_black').val();

            if(max == currentVal){
                return false;
            }
        } */
		var tot_progress =$("#tot_progress_input").val();
		if(tot_progress >= 100)
        {
			swal("",'Your total percentage  100 is completed!!', "error");
			return;
        }
        else
		{
			if (!isNaN(currentVal)) {
				// Increment
				currentVal = currentVal + 5;
				$('input[name='+fieldName+']').val(currentVal);
			} else {
				// Otherwise put a 0 there
				currentVal = 0;
				$('input[name='+fieldName+']').val(0);
			}
		}
		var id = $('input[name='+fieldName+']').data('id');
		var cnt = $('input[name='+fieldName+']').data('cnt')
		var value = currentVal;
		//console.log(parseInt(currentVal));
		$("#slide"+cnt+id).slider( "option", "value", parseInt(currentVal));

		checkTotal($("#slide"+cnt+id),parseInt(currentVal),id);
    });
	 $(document).on('click',".qtyminus",function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        
        console.log(fieldName);
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        
        if(fieldName == 'slider_value_text1_0'){
        min = $('#fixed_min_value_black').val();
        
             if(min >= currentVal){
                return false;
            }
        }
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
			currentVal = currentVal - 5
            $('input[name='+fieldName+']').val(currentVal);
        } else {
            // Otherwise put a 0 there
			currentVal = 0;
            $('input[name='+fieldName+']').val(0);
        }
		var id = $('input[name='+fieldName+']').data('id');
		var cnt = $('input[name='+fieldName+']').data('cnt')
		var value = currentVal;
		console.log(currentVal);
		 $("#slide"+cnt+id).slider( "option", "value", parseInt(currentVal));
		 checkTotal($("#slide"+cnt+id),parseInt(currentVal),id);
    });
 	$('#twit_share').click(function (twttr) {

		 twttr.preventDefault();
		 //We get the URL of the link
		 var loc = $('#result_image1').attr('src');

		 var segment = $('#result_image1').attr('src').split('/');
		 var file_name_segment = segment[5].split('.');
		 var share_image_url =  base_url + 'home/get_image_by_formula/' + file_name_segment[0];

		 //We get the title of the link
		 var title = escape($('#swatch_title').val());
		 //We trigger a new window with the Twitter dialog, in the middle of the page
		 window.open('http://twitter.com/share?url=' + share_image_url + '&text=' + title + '&', 'twitterwindow', 'height=350, width=550, top=' + ($(window).height() / 2 - 225) + ', left=' + ($(window).width() / 2) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');


	  });
	
	
});

/*end document ready*/

 
$(document).off().on('click', '.zoom_swatch_image',function() {
	$('.enlargeImageModalSource').attr('src', $(this).data('src'));
	$('#enlargeImageModal').modal('show');
});
 
/*$(document).off().on('click','.delete_swatch_from_gal',function(){
	var id = $(this).data('id');
	$.ajax({ 
			'url' : base_url + 'home/delete_swatch',
			'type' :"POST",
			'data' : { id : id, },
			'success' : function(res){
				if(res == true){
					$("#view_swatch_details").hide();
					$("#delete_sec"+id).remove();
				}
			},
		});
});*/
$(document).on('click',".coarse_1",function(){
	var id=$(this).data('colid');
	$('#fine'+id+'_'+$(this).data('count')).removeClass('active');
	$(this).addClass('active');

});
$(document).on('click',".fine_1",function(){
	var id=$(this).data('colid');
	$('#coarse'+id+'_'+$(this).data('count')).removeClass('active');
	$(this).addClass('active');

});

	
 $(document).on('click','.go_to_place',function(){
 	if ($('.saved-swatch.outdoor_category li').length == 0 && $('.saved-swatch.indoor_category li').length == 0) 

	{
		 swal("",'No any saved swatch available!!', "error");	   
	}
	else{
		window.location.href = base_url+ 'home/place';
	}
});

$(document).on('click','.login_go_to_place',function(){
    
 	if ($("#save_gallery_outdoor_albums").val() == 0 && $("#save_gallery_indoor_albums").val() == 0) 

	{
		 swal("",'No any saved swatch available!!', "error");	   
	}
	else{
		window.location.href = base_url+ 'home/place';
	}
});



$(document).on("click",".inner_div figure",function(){
		$('.inner_div figure').css("outline","none");
		//$('.inner_div figure').css("padding","8px");
		if($(this).parent().hasClass('outline')){
			$('.inner_div').removeClass('active');
			$(this).css("outline","none");
			//$(this).css("padding","8px");
			$("#slider li").css("background-image","");
			$("#slider1 li").css("background-image","");
			//$("#slider.flexslider").css("background-image","");
		}
		else{
			$('.inner_div').removeClass('active');
			$(this).parent().addClass('active');
			$(this).css("outline","3px solid orange");
			//$(this).css("padding","5px");
			var background_url=$(this).find('img').attr('src');
			$("#slider li").css("background-image","url("+background_url+")");
			$("#slider1 li").css("background-image","url("+background_url+")");
			//$("#slider.flexslider").css("background-image","url("+background_url+")");
		}

});
 var temp_count = 0;
$(document).on('click','#save_to_swatch',function(){
		 var name_swatch = $('#swatchname').val();
		 if (name_swatch == "")
		 {
			 swal("", 'To proceed, please name your swatch!!', "error");
			  
			return;
			//exit();
		 }
		 else {

			 var img_src_request = $("#result_image").attr('src');
			  var request_sample_info = $('.formula').text();
			  var request_sample_name = name_swatch;
			  var displayBox_src =  $("#result_image").attr('src');
			 //post it to home page to create session variable
			 var post_img_request_sample = {img_request_url: img_src_request, img_request_info: request_sample_info, img_request_name: request_sample_name,img_cat : $("#swatch_cat").val(),};
			 $.ajax({
				url: base_url + "home/check_exist_swatchname",
				 method: 'POST',
				 data:{'swatch_name':name_swatch,'csrf_test_name':CSRF_TOKEN, },
				success:function(data){
					 //$(".login-register-form").modal('show');
					var current_cat = $("#swatch_cat").val();
					var indoor_count = 0;
					var outdoor_count = 0;
					if($('.saved-swatch.indoor_category').find('li').length > 0){
						 indoor_count = $('.saved-swatch.indoor_category').find('li').length;
					}
					if($('.saved-swatch.outdoor_category').find('li').length > 0){
						 outdoor_count = $('.saved-swatch.outdoor_category').find('li').length;
					}
				
					 if (indoor_count >= 5 && current_cat == 1)
					 {
						  swal("",'You have saved maximum swatches for Indoor!!', "error");
						  return;
					 }
					else if(outdoor_count >= 5 && current_cat == 2){
						 swal("",'You have saved maximum swatches for Outdoor!!', "error");
						  return;
					}
					else{
						if(data!=false){
						 $.ajax({
						 url: base_url + "Home/save_image",
						 method: 'POST',
						 data:{'image_info':post_img_request_sample,'csrf_test_name':CSRF_TOKEN, },
						 success:function(res){
							 $('#swatchname').attr('readonly',true);

						 },		
							 complete:function(res){
								
							 	$.ajax({
									url:base_url+'home/check_session/saved_album_session',
									type:'GET',
									data:{'csrf_test_name':CSRF_TOKEN},
									success:function(res){
										/*if(res == true){
											$(".save_to_gallery_section").css("display",'block');
										}
										else{
											$(".save_to_gallery_section").css("display",'none');
										}*/
										  window.location.href = base_url+'home/step_4';
									},
								});
								 
								 $(".request_for_sample_saved").on('click',function(){
									//$("#main_loader").show();
									var id = $(this).data('id');
									$.ajax({
										url: base_url + "home/set_request_sample_session",
										method: 'POST',
										data:{
										    'csrf_test_name':CSRF_TOKEN,
											'id': id,
										},
										success:function(res){

										},
										complete:function(res){
											$.ajax({
												'url' : base_url + 'home/get_request_sample_session_details',
												'type' : "POST",
												'data' : {'csrf_test_name':CSRF_TOKEN},
												success : function (res){
													console.log(res);
													var result = $.parseJSON(res);
													if(result!=false){
														$("#request_sample #swatch_image_request").attr("src",result.swatch_image);
														$("#request_sample .formula_list").html(result.formula_list);
														$("#request_sample #swatch_image_path").val(result.swatch_image);
														$("#request_sample #swatch_image_formula").val(result.formula_list);
														if(result.user != false){
															$("#request_sample #request_name").val(result.user.user_name);
															$("#request_sample #request_name").attr('readonly',true);
															$("#request_sample #request_email").val(result.user.email);
															$("#request_sample #request_email").attr('readonly',true);
															$("#request_sample #request_telephone").val(result.user.mobile);
															if(result.user.mobile!=''){
																$("#request_sample #request_telephone").attr('readonly',true);
															}
														}
													}
													$("#main_loader").hide();
													$("#request_sample").modal('show');

												}
											});
										}
									});
								});
							 },
						  });
						}
						else{
							swal("",'This Swatch Name Already Exist!!', "error");
							  return;
						}
					}
				}
			 });

		 }
	});
$(document).on('click','#save_to_gallery',function(){
	var user_id = $("#user_id").val();
	var name_swatch = $('#gallery_name').val();
	if(name_swatch==''){
		swal("",'Enter Gallery Name!!', "error");
	}
	else if(user_id != ""){
		if ($('.saved-swatch li').length == 0) 
		{
			swal("",'No any saved swatch available!!', "error");
		}
		else
		{
			
			if(name_swatch==''){
				swal("",'Enter Gallery Name!!', "error");
			}
			else
			{
				var id = $("ul.saved-swatch li").map(function() {
							return $(this).data("id");
						 }).get().join(",");

				$.ajax({
					url: base_url + "home/save_gallery",
					method: 'POST',
					data:{
						'user_id': user_id,
						'id':id,
						'name_swatch':name_swatch,
						'gallery_id':$("#created_gallery_id").val(),
						'csrf_test_name':CSRF_TOKEN,
					},
					success:function(data){
						var data1 =   jQuery.parseJSON(data);
						if(data1.response != false){
							var obj = jQuery.parseJSON(data);
							if(obj.fail != "false"){
								$("#gallery_name").attr('readonly',true);
								$("#gallery_name").val(name_swatch);
								$("#gallery_name1").attr('readonly',true);
								$("#gallery_name1").val(name_swatch);
								swal("",'Your Images Saved in Gallery!!', "success");
								$("#created_gallery_id").val(obj.gal_id);
								$("#created_gallery_id1").val(obj.gal_id);
							}else{
								swal("",'Your Images not Saved in Gallery!!', "error");
							}
						}
						else
						{
							swal("",data1.msg, "error");
						}
					}
				});
			}
		}
	}
	else{
		//swal("",'Please Login First!!', "error");
		//$("#myModal").modal('show');
		swal({
			text:"Please Login First!!",
			type:"error",
			showCancelButton:true,confirmButtonColor:"#DD6B55",
			confirmButtonText:"OK",
			cancelButtonText:"CANCEL"
		}).then(function(isConfirm){
			if(isConfirm.value == true){
			window.location.href = base_url+'home/login';
			}
		});	
	}
});
$(document).on('click','#save_to_gallery1',function(){
	var user_id = $("#user_id").val();
	var name_swatch = $('#gallery_name1').val();
	if(name_swatch==''){
		swal("",'Enter Gallery Name!!', "error");
	}
	else if(user_id != ""){
		if ($('.saved-swatch li').length == 0) 
		{
			swal("",'No any saved swatch available!!', "error");
		}
		else
		{
			if(name_swatch==''){
				swal("",'Enter Gallery Name!!', "error");
			}
			else
			{
				var id = $("ul.saved-swatch li").map(function() {
							return $(this).data("id");
						 }).get().join(",");

				$.ajax({
					url: base_url + "home/save_gallery",
					method: 'POST',
					data:{
						'user_id': user_id,
						'id':id,
						'name_swatch':name_swatch,
						'gallery_id':$("#created_gallery_id").val(),
						'csrf_test_name':CSRF_TOKEN,
					},
					success:function(data){
						var data1 =   jQuery.parseJSON(data);
						if(data1.response != false){
							var obj = jQuery.parseJSON(data);
							if(obj.fail != "false"){
								$("#gallery_name").attr('readonly',true);
								$("#gallery_name").val(name_swatch);
								$("#gallery_name1").attr('readonly',true);
								$("#gallery_name1").val(name_swatch);
								swal("",'Your Images Saved in Gallery!!', "success");
								$("#created_gallery_id").val(obj.gal_id);
								$("#created_gallery_id1").val(obj.gal_id);
							}else{
								swal("",'Your Images not Saved in Gallery!!', "error");
							}
						}
						else
						{
							swal("",data1.msg, "error");
						}
					}
				});
			}
		}
	}
	else{
		//swal("",'Please Login First!!', "error");
		//$("#myModal").modal('show');
		//window.location.href = base_url+'home/login';
		swal({
			text:"Please Login First!!",
			type:"error",
			showCancelButton:true,confirmButtonColor:"#DD6B55",
			confirmButtonText:"OK",
			cancelButtonText:"CANCEL"
		}).then(function(isConfirm){
			if(isConfirm.value == true){
			window.location.href = base_url+'home/loginplace';
			}
		});	
	}
});

$(document).on('click','#save_to_gallery_make',function(){
	var user_id = $("#user_id").val();
	var name_swatch = $('#gallery_name1').val();
	if(name_swatch==''){
		swal("",'Enter Gallery Name!!', "error");
	}
	else if(user_id != ""){
		if ($('.swatches .inner_div').length == 0) 
		{
			swal("",'No any saved swatch available!!', "error");
		}
		else
		{
			if(name_swatch==''){
				swal("",'Enter Gallery Name!!', "error");
			}
			else
			{
				var id = $("ul.saved-swatch li").map(function() {
							return $(this).data("id");
						 }).get().join(",");

				$.ajax({
					url: base_url + "home/save_gallery",
					method: 'POST',
					data:{
						'user_id': user_id,
						'id':id,
						'name_swatch':name_swatch,
						'gallery_id':$("#created_gallery_id").val(),
						'csrf_test_name':CSRF_TOKEN,
					},
					success:function(data){
						var data1 =   jQuery.parseJSON(data);
						if(data1.response != false){
							var obj = jQuery.parseJSON(data);
							if(obj.fail != "false"){
								$("#gallery_name").attr('readonly',true);
								$("#gallery_name").val(name_swatch);
								$("#gallery_name1").attr('readonly',true);
								$("#gallery_name1").val(name_swatch);
								swal("",'Your Images Saved in Gallery!!', "success");
								$("#created_gallery_id").val(obj.gal_id);
								$("#created_gallery_id1").val(obj.gal_id);
							}else{
								swal("",'Your Images not Saved in Gallery!!', "error");
							}
						}
						else
						{
							swal("",data1.msg, "error");
						}
					}
				});
			}
		}
	}
	else{
		//swal("",'Please Login First!!', "error");
		//$("#myModal").modal('show');
		//window.location.href = base_url+'home/login';
		swal({
			text:"Please Login First!!",
			type:"error",
			showCancelButton:true,confirmButtonColor:"#DD6B55",
			confirmButtonText:"OK",
			cancelButtonText:"CANCEL"
		}).then(function(isConfirm){
			if(isConfirm.value == true){
			window.location.href = base_url+'home/loginplace';
			}
		});	
	}
});

$(document).on('click','.logo_next',function(){
	$(".logo_section .after_login").show();
	$(".logo_section .before_login").hide();
	
	//$(".logo_section .after_login .custlogoblock .owl-prev").html('<i class="fa fa-angle-left" aria-hidden="true"></i>');
	//$(".logo_section .after_login .custlogoblock .owl-next").html('<i class="fa fa-angle-right" aria-hidden="true"></i>');
		
	$(".logo_section .after_login .custlogoblock .owl-prev").html('<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>');
	$(".logo_section .after_login .custlogoblock .owl-next").html('<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>');
	
});
$(document).on('click','.make_next',function(){
	$(".make_section .after_login").show();
	$(".make_section .before_login").hide();
	
	$(".make_section .after_login .custlogoblock .owl-prev").html('<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>');
	$(".make_section .after_login .custlogoblock .owl-next").html('<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>');
});
function desaturateImage(image, transheight){
	if($("canvas").html()!=undefined){
		//$("canvas").remove();
		$(".div_img").append(image);
		image = document.getElementById("make_image_div");
	}


	$(".div_img").css("height",'555px');
	$(".div_img").css("width",'100%');

}
$(document).on("click",".make_img .inner_div",function(){
	$('.inner_div').find('img').css("outline","none");
	
	
	$img_place = $('#make_image_div').attr('src');

	if($img_place === ''){
	    
	    swal("",'Select or Browse Image First!!', "error");
	    return;
	    
	}
	else{
	
	if($(this).hasClass('active')){
		$('.inner_div').removeClass('active');
		$(this).find('img').css("outline","none");
		$("#make_image_div_overlay").css("display","none");
		$("#make_image_div_overlay").css("background-image","");
	}
	else{
		$('.inner_div').removeClass('active');
		$(this).addClass('active');
		$(this).find('img').css("outline","3px solid orange");
		var background_url=$(this).find('img').attr('src');
		$("#make_image_div_overlay").css("display","block");
		$("#make_image_div_overlay").css("background-image","url("+background_url+")");
	}
	}
});
$(document).on('click','.logo_img .inner_div',function(){
	$('.inner_div').find('img').css("outline","none");
	if($(this).hasClass('active')){
		$('.inner_div').removeClass('active');
		$(this).find('img').css("outline","none");
		$(".div_logo_img").css("background-image","");
		$("img#logo_image_div").css('opacity','1');
	}
	else{
		$('.inner_div').removeClass('active');
		$(this).addClass('active');
		$(this).find('img').css("outline","3px solid orange");
		var background_url=$(this).find('img').attr('src');
		$(".div_logo_img").css("background-image","url("+background_url+")");
		$("img#logo_image_div").css('opacity','0.8');
		//$(".div_logo_img").css('position','absolute');
	}
});
$(document).on("click",".owl-carousel1 div.owl-item",function(){
	var img=$(this).find('img').attr('src');
	if($(this).hasClass('active_image')){
		//$('.flexslider_1 li').removeClass('active_image');
		//$('.flexslider_1 li:first').addClass('active_image');
	}
	else{
		$('.owl-carousel1 div.owl-item').removeClass('active_image');
		$(this).addClass('active_image');
	}

	$(".place_image_section img#place_image_div").attr('src',img);
});
$(document).on("click",".owl-outdoor div.owl-item",function(){
	var img=$(this).find('img').attr('src');
	if($(this).hasClass('active_image')){
		//$('.flexslider_1 li').removeClass('active_image');
		//$('.flexslider_1 li:first').addClass('active_image');
	}
	else{
		$('.owl-outdoor div.owl-item').removeClass('active_image');
		$(this).addClass('active_image');
	}

	$(".place_image_section img#place_image_div").attr('src',img);
});
$(document).on("click",".owl-carousel2 div.owl-item",function(){
	var img=$(this).find('img').attr('src');
	if($(this).hasClass('active_logo')){
		//$('.flexslider_1 li').removeClass('active_image');
		//$('.flexslider_1 li:first').addClass('active_image');
	}
	else{
		$('.owl-carousel2 div.owl-item').removeClass('active_logo');
		$(this).addClass('active_logo');
	}

	$(".logo_image_section img#logo_image_div").attr('src',img);
});
$(document).on("click",".owl-carousel3 div.owl-item",function(){
	var img=$(this).find('img').attr('src');
	if($(this).hasClass('active_logo')){
		//$('.flexslider_1 li').removeClass('active_image');
		//$('.flexslider_1 li:first').addClass('active_image');
	}
	else{
		$('.owl-carousel3 div.owl-item').removeClass('active_logo');
		$(this).addClass('active_logo');
	}
    $(".make_image_section img#make_image_div").css("display","block");
	$(".make_image_section img#make_image_div").attr('src',img);
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
$(".owl-carousel3").owlCarousel({
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

var $el1 = $("#browse_custom_image");

$el1.fileinput({
	uploadAsync :true,
	overwriteInitial: false,
	maxFileSize: 2000,
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
	allowedFileExtensions: ["jpg","png"],
	uploadUrl: base_url+'home/add_custom_photos', 
	uploadExtraData: function() {
	return {
		  userid: $('#user_id').val(),
		  'csrf_test_name':CSRF_TOKEN, 
	 };
	}
}).on("filebatchselected", function(event, files) {
	$el1.fileinput("upload");
});
$el1.on('fileuploaded', function(event, data, previewId, index) {
	/*if($("#make_image_div").length >0){
		//$("canvas").remove();
		$("#make_image_div").attr('src', params.reader.result);
		$("#make_image_div").css('display','block');
	}
	else{
		//$("canvas").remove();
		$(".div_img").append('<img id="make_image_div" src="'+params.reader.result+'" style="display:block;" />');
	}
	var sampleImage = document.getElementById("make_image_div");
	desaturateImage(sampleImage,'30');*/
	
	
	$.ajax({
		url:base_url+'home/get_background_images',
		type:'POST',
		data:{'csrf_test_name':CSRF_TOKEN},
		success:function(res){
			var result = $.parseJSON(res);
			$(".owl-carousel3").html(result);
			$(".owl-carousel3").css('display','block');
			//console.log(data);
			//console.log('uploaded');

		},
		complete:function(res){
			$('.owl-carousel3').trigger('destroy.owl.carousel');
			$(".owl-carousel3").owlCarousel({
				loop: false,
				margin: 10,
				nav    : true,
				navText:["<div class='fa fa-chevron-left'></div>","<div class='fa fa-chevron-right'></div>"],
				responsiveClass: true,
				responsive: {
					0: {
						items: 2,
						nav: true,
					},
					600: {
						items: 3,
						nav: true
					},
					1000: {
						items: 4,
						nav: true,
					},
					1200: {
						items: 5,
						nav: true
					}

				}
			});

		}
	});
	
});
var $el2 = $("#browse_custom_image2");
$el2.fileinput({
	uploadAsync :true,
	overwriteInitial: false,
	maxFileSize: 2000,
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
	uploadExtraData: function() {
	return {
		  userid: $('#user_id').val(),
		  'csrf_test_name':CSRF_TOKEN
	 };
	}
}).on("filebatchselected", function(event, files) {
	$el2.fileinput("upload");
});
$el2.on('fileuploaded', function(event, data, previewId, index) {
	$.ajax({
		url:base_url+'home/get_user_logos_slider',
		type:'POST',
		data:{'csrf_test_name':CSRF_TOKEN},
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
				nav    : true,
				navText:["<div class='fa fa-chevron-left'></div>","<div class='fa fa-chevron-right'></div>"],
				responsiveClass: true,
				responsive: {
					0: {
						items: 2,
						nav: true,
					},
					600: {
						items: 3,
						nav: true
					},
					1000: {
						items: 4,
						nav: true,
					},
					1200: {
						items: 5,
						nav: true
					}

				}
			});

		}
	});
});
$(document).on('click','.delete_single_logo',function(){
	var user_id=$(this).data('user_id');
	var image_name=$(this).data('image_name');
	
	swal({
		text:"Are you sure to delete this logo??",
		type:"error",
		showCancelButton:true,confirmButtonColor:"#DD6B55",
		confirmButtonText:"OK",
		cancelButtonText:"CANCEL"
	}).then(function(isConfirm){
		if(isConfirm.value == true){
			$.ajax({ 
				'url' : base_url + 'home/delete_single_logo',
				'type' :"POST",
				'data' : { 
						'user_id':user_id,
					    'image_name':image_name, 
				        'csrf_test_name':CSRF_TOKEN,
				},
				'success' : function(res){
					if(res == true){				
						swal({
							text:"Logo deleted successfully!!",
							type:"success",
							showCancelButton:false,confirmButtonColor:"#DD6B55",
							confirmButtonText:"OK",
						}).then(function(isConfirm){
							if(isConfirm.value == true){
								window.location.reload();
								//$('.before_login').css('display','none');
								//$('.after_login').css('display','block');
							}
						});
						//swal("",'Logo deleted successfully!!', "success");
						//window.location.reload();
						//window.location.href = base_url+'home/make_logo';
						//$('.before_login').css('display','none');
						//$('.after_login').css('display','block');
					}
				},
			});
		}
	});	
	
});
$(document).on('click','.delete_custom_make',function(){
	var user_id=$(this).data('user_id');
	var image_name=$(this).data('image_name');
	
	swal({
		text:"Are you sure to delete this logo??",
		type:"error",
		showCancelButton:true,confirmButtonColor:"#DD6B55",
		confirmButtonText:"OK",
		cancelButtonText:"CANCEL"
	}).then(function(isConfirm){
		if(isConfirm.value == true){
			$.ajax({ 
				'url' : base_url + 'home/delete_custom_make',
				'type' :"POST",
				'data' : { 
						'user_id':user_id,
					    'image_name':image_name,
					    'csrf_test_name':CSRF_TOKEN    
				    
				        },
				'success' : function(res){
					if(res == true){				
						swal({
							text:"Logo deleted successfully!!",
							type:"success",
							showCancelButton:false,confirmButtonColor:"#DD6B55",
							confirmButtonText:"OK",
						}).then(function(isConfirm){
							if(isConfirm.value == true){
								window.location.reload();
								//$('.before_login').css('display','none');
								//$('.after_login').css('display','block');
							}
						});
						//swal("",'Logo deleted successfully!!', "success");
						//window.location.reload();
						//window.location.href = base_url+'home/make_logo';
						//$('.before_login').css('display','none');
						//$('.after_login').css('display','block');
					}
				},
			});
		}
	});	
	
});
$(document).on('click','.get_swatch_details',function(){
	var swatch_id = $(this).data('id');
	$.ajax({
			url: base_url + "home/get_swatch_details",
			method: 'POST',
			data:{
				'swatch_id': swatch_id,
				'csrf_test_name':CSRF_TOKEN,
			},
			success:function(data){
				var data = $.parseJSON(data);
				if(data != false){
					$(".custome-swatch .final-color").css('display','block');
					$(".custome-swatch .final-color .social").css('display','block');
					$(".custome-swatch .final-color figure").css('display','block');
					$(".custome-swatch .color-formula").css('display','block');
					$(".custome-swatch #send_to_email").css('display','block');
					$("#swatchname").val(data.swatch_name);
					$("#swatch_cat").val(data.category_id);
					//$("#swatchname").attr("readonly",true);
					$("#save_to_swatch").attr('disabled',false);
					$("#swatchname").attr("readonly",false);
					$(".formula").html(data.formula);
					if(data.category_id == 1){
						$(".name h3").html("Indoor");
					}
					if(data.category_id == 2){
						$(".name h3").html("Outdoor");
					}
					$("#result_image").attr("src",data.org_image_path);
					$("#request_for_sample").attr('data-sample-id',data.id);
					
					//$("#request_for_sample").show();
					//$("#send_to_email").show();
					
					$.ajax({
						url: base_url + "home/set_request_sample_session",
						method: 'POST',
						data:{
							'id': data.id,
							'csrf_test_name':CSRF_TOKEN,
						},
						success:function(res){
							
						}
					});
				}
				
			}
		});
});

function checkTotal(slider, newValue, id)
  	{
		$(".progress_color_div").html("");
		console.log(newValue);
      // Calculate total percentage of all colors from color sliders
			var total = 0;
			var slider = slider;
			
		 	var id = id ;

			  $(".slider_range").each(function () {
				//setTimeout(function(){  
					 if (this !== slider)
					 {
						total += $(this).slider("value");
					 }
					 else{
						total += newValue;
					 }
				  	var bgcolor=$(this).data('hexcode');
					$(this).find('div.ui-slider-range').css('background',bgcolor);
				  	$( ".progress-value"+ $(this).data('id')+'_'+$(this).data('count')).html( $(this).slider("value") + "%" );		
				 $("#slider_value_text"+$(this).data('id')+'_'+$(this).data('count')).val($(this).slider("value"));
				  $(".progress_color_div").append("<div style='display:inline-block;height:100%;background:"+$(this).data('hexcode')+";padding-top: 17px;width:"+$(this).slider("value")+"%'></div>");
			  });
			  // Restrict user from sliding further if the total is already 100%
			  if (total > 100) {
				 // console.log(total);
				 $(".mix_it").attr("disabled",true);
				 return false;
			  }
			  // Update slider value text
			 // $("#amount" + id).val(newValue + "%");
				
			  // Update the "total" slider to reflect total percent of colors
			  if (total <= 100)
			  {
				 $(".mix_it").attr("disabled",false);
				  setTimeout(function(){
							 $(".progress_total").slider('option', 'value', total);
							 $("#progress").val($(".progress_total").slider("value") + "%");
							 $(".proces").html($(".progress_total").slider("value") + "%");
							 $("#tot_progress_input").val($(".progress_total").slider("value"));
					},200);
			  }
	   }
		/*function get_info() {
				var color_infos=[];
			   var newColors = [];
			   var temp_color;
			   var amount = 0;
			   var count_size = 0;
			   $(".slider_range").each(function () {
				  var color_array=[];
				  amount = $(this).slider("value");
				  var colors_id = $(this).data('id');
				   var cnt= $(this).data('count');
				   color_array.push(colors_id);
				   color_array.push(amount);
				 // var switch_id = colors_id.charAt(16);
				   console.log(res_cols);
				   console.log(parseInt(colors_id)-1);
				  var flecks_coarse = res_cols[parseInt(colors_id)-1].coarse;
				  var flecks_fine = res_cols[parseInt(colors_id)-1].fine;
				  var hex = res_cols[parseInt(colors_id)-1].hex_code;
				  var size;
				   if($("#delete_part"+colors_id+"_"+cnt).find('.coarse_fine li:first').hasClass('active') && colors_id != 43){
						var type=$("#delete_part"+colors_id+"_"+cnt).find('.coarse_fine li:first span').attr('class');
					   	if(type=='fine'){
							size = "Fine";
							color_array.push(1);
							color_array.push(0);
							color_array.push(0);
						}
						else if(type=='coarse'){
							size = "Coarse";
							color_array.push(0);
							color_array.push(1);
							color_array.push(0);
						}
						
					}
				    else if($("#delete_part"+colors_id+"_"+cnt).find('.coarse_fine li:nth-child(2)').hasClass('active') && colors_id != 43){
						var type=$("#delete_part"+colors_id+"_"+cnt).find('.coarse_fine li:nth-child(2) span').attr('class');
					   	if(type=='fine'){
							size = "Fine";
							color_array.push(1);
							color_array.push(0);
							color_array.push(0);
						}
						else if(type=='coarse'){
							size = "Coarse";
							color_array.push(0);
							color_array.push(1);
							color_array.push(0);
						}
					}
				   	else if(colors_id == 43){
						size="";
						color_array.push(0);
						color_array.push(0);
						color_array.push(0);
					}
					else{
						if(colors_id != 43){
						var type=$("#delete_part"+colors_id+"_"+cnt).find('.coarse_fine li:last span').attr('class');
							if(type=='fine'){
								size = "Fine";
								color_array.push(1);
								color_array.push(0);
								color_array.push(0);
							}
							else if(type=='coarse'){
								size = "Coarse";
								color_array.push(0);
								color_array.push(1);
								color_array.push(0);
							}
							
						}
					}
					color_array.push(cnt);
				   	color_infos.push(color_array);
				    temp_color = {percent: amount, r: hexToR(hex), g: hexToG(hex), b: hexToB(hex), flecks_size: size,id:colors_id};
				 	// console.log(temp_color);
				    newColors.push(temp_color);
			   });
				$.ajax({
					"url": base_url+'home/create_color_session',
					 "method": 'POST',
					"data":{'colors':color_infos},
					success:function(res){
						//console.log(res);
					}
				});
			   var timestamp = Number(new Date());
			   timestamp_new = {time_stamp: timestamp};
			   newColors.push(timestamp_new);
			   return newColors;
			}*/

		function get_info() {
				var color_infos=[];
			   var newColors = [];
			   var temp_color;
			   var amount = 0;
			   var count_size = 0;
			   $(".slider_range").each(function () {
				  var color_array=[];
				  amount = $(this).slider("value");
				  var colors_id = $(this).data('id');
				   var cnt= $(this).data('count');
				   color_array.push(colors_id);
				   color_array.push(amount);
				 // var switch_id = colors_id.charAt(16);
				   console.log(res_cols);
				   console.log(parseInt(colors_id)-1);
				  var flecks_coarse = res_cols[parseInt(colors_id)-1].coarse;
				  var flecks_fine = res_cols[parseInt(colors_id)-1].fine;
				  var hex = res_cols[parseInt(colors_id)-1].hex_code;
				   console.log(hex);
				  var size;
				   if($("#delete_part"+colors_id+"_"+cnt).find('.coarse_fine li:first').hasClass('active') && colors_id != 1){
						var type=$("#delete_part"+colors_id+"_"+cnt).find('.coarse_fine li:first span').attr('class');
					   	if(type=='fine'){
							size = "Fine";
							color_array.push(1);
							color_array.push(0);
						}
						else if(type=='coarse'){
							size = "Coarse";
							color_array.push(0);
							color_array.push(1);
						}
						
					}
				    else if($("#delete_part"+colors_id+"_"+cnt).find('.coarse_fine li:nth-child(2)').hasClass('active') && colors_id != 1){
						var type=$("#delete_part"+colors_id+"_"+cnt).find('.coarse_fine li:nth-child(2) span').attr('class');
					   	if(type=='fine'){
							size = "Fine";
							color_array.push(1);
							color_array.push(0);
						}
						else if(type=='coarse'){
							size = "Coarse";
							color_array.push(0);
							color_array.push(1);
						}
					}
				   	else if(colors_id == 1){
						size="Fine";
						color_array.push(1);
						color_array.push(0);
					}
					/*else{
						if(colors_id != 1){
						var type=$("#delete_part"+colors_id+"_"+cnt).find('.coarse_fine li:last span').attr('class');
							if(type=='fine'){
								size = "Fine";
								color_array.push(1);
								color_array.push(0);
							}
							else if(type=='coarse'){
								size = "Coarse";
								color_array.push(0);
								color_array.push(1);
							}
							
						}
					}*/
				   	/*if ($('.fine_1_'+ colors_id+'_'+cnt).hasClass('active'))
					{
					   size = "Fine";
						color_array.push(1);
						color_array.push(0);
					}
					else
					{
						size = "Coarse";
						color_array.push(0);
						color_array.push(1);					   
					}*/
					color_array.push(cnt);
				   	console.log(color_array);
				   	color_infos.push(color_array);
				    temp_color = {percent: amount, r: hexToR(hex), g: hexToG(hex), b: hexToB(hex), flecks_size: size,id:colors_id};
				 	// console.log(temp_color);
				    newColors.push(temp_color);
			   });
				$.ajax({
					"url": base_url+'home/create_color_session',
					 "method": 'POST',
					"data":{'colors':color_infos,'csrf_test_name':CSRF_TOKEN},
					success:function(res){
						//console.log(res);
					}
				});
			   var timestamp = Number(new Date());
			   timestamp_new = {time_stamp: timestamp};
			   newColors.push(timestamp_new);
			   return newColors;
			}


			
				function hexToR(h) {
				   return parseInt((cutHex(h)).substring(0, 2), 16);
				}
				function hexToG(h) {
				   return parseInt((cutHex(h)).substring(2, 4), 16);
				}
				function hexToB(h) {
				   return parseInt((cutHex(h)).substring(4, 6), 16);
				}
				function cutHex(h) {
				   return (h.charAt(0) == "#") ? h.substring(1, 7) : h
				}


