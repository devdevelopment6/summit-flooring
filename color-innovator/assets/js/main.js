 $(document).ready(function() {
		 //$(".jconfirm-holder").addClass("intro");
		 
		 var org_colorslist ='';
		 $.ajax({
				 "url": base_url+'color_innovator/get_colors',
				 "method": 'POST',
				success:function(data){
					org_colorslist = data;
				},
				complete:function(data){
					//console.log(org_colorslist);
				 
				 var colors = $.parseJSON(org_colorslist);
		 //console.log(org_colorslist);
		 
		$( "#slider-range-min00" ).slider({
            orientation: "horizontal",
            range: "min",
            min: 0,
            max: 100,
            value:0,
			step: 5,
            slide: function( event, ui ) {
               $( "#amount0" ).val( ui.value + "%" );
			   return checkTotal(this, ui.value, 0);
            },
        });

        $( "#amount0" ).val( $( "#slider-range-min00" ).slider( "value" ) + "%");
		
		 var number_img = 0;
  		 var increment = 0;
		
		 
        $('.pick_color').click(function() {
			
			var colors_id = $(this).data('id');
			var count = $('.granules').find('.granule_amount').length;
			 // cloning the "add-another" div
			 if (count < 4)
			 {
				var divHtml = $(".add_another").clone();
				$(".add_another").remove();
				$(divHtml).insertAfter("#last_div");
			 }
			 else
			 {
				$(".add_another").hide();
			 }
			 
			  if (count < 5)
			  {
				 if ($('#granule_amount' + count + colors_id).hasClass("granule_amount"))
				 {
					$('#granule_amount' + count + colors_id).attr('id', 'granule_amount6' + colors_id);
					$('#slider-range-min' + count + colors_id).attr('id', 'slider-range-min6' + colors_id);
					$('#amount' + count + colors_id).attr('id', 'amount6' + colors_id);
					$('#coarse' + count + colors_id).attr('id', 'coarse6' + colors_id);
					$('#fine' + count + colors_id).attr('id', 'fine6' + colors_id);
					$('#color' + count + colors_id).attr('id', 'color6' + colors_id);
					$('#delete' + count + colors_id).attr('id', 'delete6' + colors_id);
		
					$("#slider-range-min6" + colors_id).slider({
					   range: "min",
					   value: 0,
					   min: 0,
					   max: 100,
					   step: 5,
					   slide: function (event, ui) {
						  $("#amount6" + colors_id).val( ui.value + "%" );
						  return checkTotal(this, ui.value, '6' + colors_id);
					   }
					});
					
					$("#amount6" + colors_id).val("0%");
				 }
				 colors_id = colors_id - 1;
				  var granule_amount =
				  	 '<div class="black_color del_this" id="black_colorid' + count + colors_id + '">' +
					 '<div class="granule_amount" id="granule_amount' + count + colors_id + '"><div><label id="color_name" style="padding-left:55px; font-weight:bold;"> ' + colors[colors_id].color_title + '</label> </div>' +
					 '<div style="">' +
					 '<div class="delete_granule"  style="position:relative; float: left;">  ' +
					 '<img src=' + base_url + 'uploads/colors/' + colors[colors_id].color_img + ' id="color' + count + colors_id + '" style="border-radius:25px; width:45px; height:45px;position:absolute; top: 0; left: 0;" title=""/>' +
					 '<img src="uploads/delete.png" id="delete' + count + colors_id + '"  style="position: absolute; padding-top: 25px; padding-left: 28px;"/></div></div>' +
					 '<div class="switch"><div class="loop_btn"><button class="coarse" id="coarse' + count + colors_id + '"><strong>Coarse</strong></button><button class="fine" id="fine' + count + colors_id + '"><strong>Fine</strong>' + '</button><span style="padding-left:85px;"><input type="text" id="amount' + count + colors_id + '" disabled style="border:0;font-size: 10px; font-weight:bold; width: 30px; background-color:#000; color:#fff; text-align:center;"></span></div></div>' +
					 '<div style="padding-left: 55px;float:left;width:260px; padding-top:5px;"><div class="color_slider" id="slider-range-min' + count + colors_id + '"></div></div><div style="float: left; padding-left: 25px; width: 20px;padding-top:5px;"></div></div></div></div>';
	
			 $(granule_amount).insertBefore("#last_div");

			 $("#slider-range-min" + count + colors_id).slider({
				range: "min",
				min: 0,
				max: 100,
				value: 0,
				step: 5,
				slide: function (event, ui) {
					$("#amount" + count + colors_id).val( ui.value + "%" );
				   return checkTotal(this, ui.value, count + colors_id);
				},
				/* change: function(event, ui) {
					return checkTotal(this, ui.value, count + colors_id);
				  }*/
			 });
			 $("#amount" + count + colors_id).val("0%");
	
			 // cloning the "add-another" div
			 if (count < 4)
			 {
				var divHtml = $(".add_another").clone();
				$(".add_another").remove();
				$(divHtml).insertAfter("#last_div");
			 }
			 else
			 {
				$(".add_another").hide();
			 }
		  }
		  else {
			 // $(".add_another").hide(); 
			   $.alert({
						title: 'Oops!!',
						content: 'You already have the maximum amount of colors selected',
						type: 'red',
						boxWidth: '30%',
						useBootstrap: false,
						typeAnimated: true,
					});
		  }
	
		  /*Delete granules*/
	
		  $('#delete6' + colors_id).click(function () {
			 $('#granule_amount6' + colors_id).remove();
			 $("#black_colorid" + count + colors_id).remove();
			 $(".add_another").show();
			 checkTotal();
		  });
	
		  $("#delete" + count + colors_id).click(function () {
			 $("#granule_amount" + count + colors_id).remove();
			$("#black_colorid" + count + colors_id).remove();
			 $(".add_another").show();
			 checkTotal();
		  });
	
		  /* Button Switches*/
	
		  var coarse = colors[colors_id].coarse;
		  var fine = colors[colors_id].fine;
	
		  if (parseInt(coarse) === 1 && parseInt(fine) === 1) {
	
			 $('#coarse' + count + colors_id).click(function ()
			 {
	
				$('#coarse' + count + colors_id).attr("disabled", true);
				$('#coarse' + count + colors_id).css("background-color", "#FDDB31");
				$('#fine' + count + colors_id).css("background-color", "#f0f0f0");
				$('#fine' + count + colors_id).attr("disabled", false);
				$('#coarse' + count + colors_id).css("color", "#000");
	
			 });
	
			 $('#fine' + count + colors_id).click(function () {
	
				$('#fine' + count + colors_id).attr("disabled", true);
				$('#fine' + count + colors_id).css("background-color", "#FDDB31");
				$('#coarse' + count + colors_id).css("background-color", "#f0f0f0");
				$('#coarse' + count + colors_id).attr("disabled", false);
				$('#fine' + count + colors_id).css("color", "#000");
			 });
		  }
		  else if (parseInt(coarse) === 1 && parseInt(fine) === 0)
		  {
			 $('#coarse' + count + colors_id).css("margin-left", "40px");
			 $('#fine' + count + colors_id).css("display", "none");
			 $('#coarse' + count + colors_id).css("display", "inline");
			 $('#coarse' + count + colors_id).css("background-color", "#FDDB31");
	
		  }
		  else if (parseInt(coarse) === 0 && parseInt(fine) === 1)
		  {
			 $('#fine' + count + colors_id).css("margin-left", "40px");
			 $('#coarse' + count + colors_id).css("display", "none");
			 $('#fine' + count + colors_id).css("display", "inline");
			 $('#fine' + count + colors_id).css("background-color", "#FDDB31");
	
		  }
		  else
		  {
			   $.alert({
						title: 'Oops!!',
						content: 'Not Available',
						type: 'purple',
						boxWidth: '30%',
						useBootstrap: false,
						typeAnimated: true,
					});
		  }
        });
   
	
	function checkTotal(slider, newValue, id)
  	{
		console.log(id);
      // Calculate total percentage of all colors from color sliders
      var total = 0;
	  var slider = slider;

	 var id = id + 1;

		  $(".color_slider").each(function () {
			//setTimeout(function(){  
				 if (this !== slider)
				 {
					total += $(this).slider("value");
				 }
				 else
					total += newValue;
		  });
		  // Restrict user from sliding further if the total is already 100%
		  if (total > 100) {
			 return false;
		  }
		  // Update slider value text
		  $("#amount" + id).val(newValue + "%");
	
		  // Update the "total" slider to reflect total percent of colors
		  if (total <= 100)
		  {
			 $(".progress_total").slider('option', 'value', total);
			 $("#progress").val($(".progress_total").slider("value") + "%");
		  }
	   }
   
		  $(".progress_total").slider({
				  range: "min",
				  value: 0,
				  min: 0,
				  max: 100
			   });
	  	 $("#progress").val("0%");
		 
		//});
		

	$('#reset').click(function() {
		 var txt;
			 $.confirm({
				title: 'Are You Sure To Reset?',
				content: '',
    			boxWidth: '30%',
				useBootstrap: false,
				type:'orange',
				buttons: {
					confirm: function () {
						//$.alert({
								$('.del_this').remove();
								$('.granule_amount').remove();
								$(".progress_total").slider({
								   range: "min",
								   value: 0,
								   min: 0
								});
								$("#progress").val("0%");
								$("#slider-range-min00").slider({
								   range: "min",
								   value: 0,
								   min: 0,
								   max: 100,
								   step: 5,
								   slide: function (event, ui) {
									  return checkTotal(this, ui.value, 0);
								   }
								});
								$("#amount0").val("0%");
								$(".add_another").show();
								$('#test_image').attr('src', "");
								$('#info').text("");
           						$('#name-swatch').attr("disabled", "disabled");
         						$('#name-swatch').val("");
								//$(this).dialog("close");
							//});
					},
					cancel: function () {
					},
				}
			});
	});
	
	   var temp_count = 0;
	   // var temp_id=1;
	   var n = 0;
	   var arr = [];
	   var info = [];//saving fromula at warehouse
   		//var colors = org_colorslist;
		
         $("#mix_button").click(function () {	 
			if (parseInt($("#progress").val()) !== 100)
			  {
				  $.alert({
						title: 'Oops!!',
						content: 'Your total percentage must equal 100',
						type: 'purple',
						boxWidth: '30%',
						useBootstrap: false,
						typeAnimated: true,
					});
				 return;
			  }
			  
			var black_color = $('#slider-range-min00').slider("value"); 
			if (black_color < 5)
			  {
				    $.alert({
						title: 'Oops!!',
						content: 'Make sure you have selected at least 5% black',
						type: 'orange',
						boxWidth: '30%',
						useBootstrap: false,
						typeAnimated: true,
						
					});
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
				  $(".color_slider").each(function () {
					 amount = $(this).slider("value");
					 var colors_id = $(this).attr('id');
					 var switch_id = colors_id.charAt(16); //get the count value from slider-range-min
					 colors_id = colors_id.substring(17); //get the count value from slider-range-min
					 var name_selected = colors[colors_id].color_title;
					 var flecks_coarse = colors[colors_id].coarse;
					 var flecks_fine = colors[colors_id].fine;
				
					 if (parseInt(flecks_coarse) === 1 && parseInt(flecks_fine) === 1) {
						var coarse_text;
						$(".switch").each(function () {
			
						   if ($('#fine' + switch_id + colors_id).is(":disabled"))
						   {
							  coarse_text = "Fine";
						   }
			
						   else {
							  coarse_text = "Coarse";
						   }
						});
						count_size++;
						size = coarse_text;
					 }
					 else if (parseInt(flecks_coarse) === 0) {
						size = "Fine";
					 }
					 else if (parseInt(flecks_coarse) === 1) {
						size = "Coarse";
					 }
					 info_formula = {name: name_selected, coarse_fine: size, percent: amount};
					 formula.push(info_formula);
				  });
				  
				  var total_fine = 0;
				  $.each(formula, function () {
			
					 if ((this.coarse_fine) === "Fine")
					 {
						total_fine = total_fine + this.percent;
						return total_fine;
					 }
			
				  });
				  
				  if (total_fine < 15)
				  {
					   $.alert({
						title: 'Oops!!',
						content: 'Your fine colors are' + ' ' + total_fine + '%' + ' ' + ' please ensure you have selected a minimum of 15% fine granules. ',
						type: 'red',
						boxWidth: '30%',
						useBootstrap: false,
						typeAnimated: true,
						
					});
					 return;
				  }
				  
				   $("html, body").animate({scrollTop: $(document).height()}, "slow");
				  //check for multiple colors:
				  var check_multiple_array_fine = [];
				  var check_multiple_array_coarse = [];
			
				  $.each(formula, function () {
			
					 if ((this.coarse_fine) === "Fine")
					 {
						check_multiple_array_fine.push(this.name);
						//console.log(check_multiple_array_fine);
					 }
					 if ((this.coarse_fine) === "Coarse")
					 {
						check_multiple_array_coarse.push(this.name);
					 }
				  });
				  //check for the same color
				  var sorted_fine_array = check_multiple_array_fine.sort();
				  for (var i = 0; i < check_multiple_array_fine.length; i++)
				  {
					 if (sorted_fine_array[i + 1] === sorted_fine_array[i])
					 {
						 $.alert({
							title: 'Oops!!',
							content: 'You can only select one instance of fine or coarse grain for a single color',
							type: 'red',
							boxWidth: '30%',
							useBootstrap: false,
							typeAnimated: true,
							
						});
						return;
					 }
				  }
				  
				   var sorted_coarse_array = check_multiple_array_coarse.sort();
				  for (var i = 0; i < check_multiple_array_coarse.length; i++)
				  {
					 if (sorted_coarse_array[i + 1] === sorted_coarse_array[i])
					 {
						  $.alert({
							title: 'Oops!!',
							content: 'You can only select one instance of fine or coarse grain for a single color',
							type: 'red',
							boxWidth: '30%',
							useBootstrap: false,
							typeAnimated: true,
							
						});
						return;
					 }
				  }
				$('#name-swatch').removeAttr("disabled", "disabled");  
						  
			  var image_info = [];
			  var image_name = [];
			  image_info = get_info();
			  
			   var file_Name = '';
			  for (var i = 0; i < (image_info.length) - 1; i++)
			  {
				 var file_Chunks = image_info[i]['percent'] + '_' + image_info[i]['r'] + '_' + image_info[i]['g'] + '_' + image_info[i]['b'] + '_' + image_info[i]['flecks_size'] + '-';
				 file_Name += file_Chunks;
			  }
			  var img_src = file_Name + image_info[(image_info).length - 1]['time_stamp'];
			 // console.log(img_src);

				   $.ajax({
					 url: base_url + "color_innovator/drawImage",
					 method: 'POST',
					 data:{'colors':image_info,'img_src':img_src,},
					 success:function(res){
				   			console.log(res)
				   		},
				  }).done(function () {
					  
					  	//alert('res');
						$('#test_image').css("display", "inline");
						$('#test_image').attr("src", base_url +'images/' + img_src + '.jpg');
						 $('.swatch-main').css('box-shadow','11px 14px 15px -10px #000000');
						 
						 $.each(formula, function ()
						  {
							 $('#info').append(this.name + ' ' + ' -' + '<strong>' + this.coarse_fine + '</strong>' + '- ' + this.percent + '%' + ' ' + '\n<br/>');
						  });
						
						  var img_src_request = $("#test_image").attr('src');
						  var request_sample_info = $('#info').text();
						  var request_sample_name = $('#name-swatch').val();
						  
						   var post_img_request_sample = {img_request_url: img_src_request, img_request_info: request_sample_info, img_request_name: request_sample_name};
						   
						    $.ajax({
								 url: base_url + "color_innovator/create_session",
								 method: 'POST',
								 data:{'img_request_sample':post_img_request_sample}
							});
						
					  });
					  
		 });
		  temp_count++;
     		 n++;
	  
			 $("#favourite").click(function () {

					 var name_swatch = $('#name-swatch').val();
					 //console.log(name_swatch);
					 
					 if (name_swatch == "")
					 {
						  $.alert({
							title: 'Error!!',
							content: 'To proceed, please name your swatch',
							type: 'red',
							boxWidth: '30%',
							useBootstrap: false,
							typeAnimated: true,
							
						});
						return;
						//exit();
					 }
					 else {
						  var img_src_request = $("#test_image").attr('src');
						  var request_sample_info = $('#info').text();
						  var request_sample_name = $('#name-swatch').val();
						  var displayBox_src = $('#test_image').attr("src");
						 //post it to home page to create session variable
						 var post_img_request_sample = {img_request_url: img_src_request, img_request_info: request_sample_info, img_request_name: request_sample_name};
						  $.ajax({
								 url: base_url + "color_innovator/save_image",
								 method: 'POST',
								 data:{'image_info':post_img_request_sample,}
							  });
				  			//console.log(temp_count);
							
							var count = $('.saved-swatch').find('img').length;
							 if (count >= 18)
							 {
								  $.alert({
										title: 'Error!!',
										content: 'You have saved maximum swatches',
										type: 'red',
										boxWidth: '30%',
										useBootstrap: false,
										typeAnimated: true,
										
									});
								exit();
							 }
							 
							 if (count === 0)
							 {
								var img_save_div = '<div class="gallery_images" id="img_save_div' + temp_count + '" style="width: 75px; padding-left: 5px; padding-right: 5px; padding-bottom:25px; border-style: solid; height: 90px; float:left; overflow:hidden;margin-right: 5px;"></div>';
								$(img_save_div).insertBefore('#last-save-swatch');
								var imgClone = $("#test_image").clone().attr('id', 'image1_saved' + temp_count).appendTo($("#save_img"));
					
								$(imgClone).css({"padding-top": "5px"});
								$(imgClone).css({"position": "absolute"});
								$(imgClone).css({"float": "left"});
								$(imgClone).css({"clip": "rect(0px, 60px, 65px, 0px)"});
					
								var insert_delete = '<img src="uploads/delete.png" id="delete_saved' + temp_count + '"  style="padding-top: 2px; margin-left: 45px; position:absolute;"/>';
								$(imgClone).appendTo('#img_save_div' + temp_count);
								$(insert_delete).appendTo('#img_save_div' + temp_count);
							 }

						
				 }
				 var get_src;
				 var arr_saved_swatches=[];
				 var arr_temp_num = [];
				 var arr_temp_storage = ["1","2","3","4","5","6","7","8","9"];
				 var arr_new_temp =[];
				 var add_id_num;
				 
				 
				 var img_Array = $('.saved-swatch #image1_saved' + temp_count).each(function () {
					get_src = $('#image1_saved' + temp_count).attr('src');
		
				 });
				  if (count !== 18 && count !== 0)
				 {
					var swatch_src_num;
					$('.saved-swatch img').each(function(){
					
					swatch_src_num= $(this).attr('id');
					swatch_src_num=swatch_src_num.substring(12);
					arr_temp_num.push(swatch_src_num);
					arr_temp_num=$.unique(arr_temp_num);
					get_src=$('#image1_saved'+swatch_src_num).attr('src');
						  if($.inArray(get_src,arr_saved_swatches) == -1)
						  {
							arr_saved_swatches.push(get_src); 
						  }
					});
					if($.inArray(img_src_request,arr_saved_swatches)!== -1){
					   return;
					}
					else{
					   add_id_num = String(temp_count);
					   imgCreate();
					   return;
					}
		//            if (displayBox_src !== get_src)
		//            {
		//               imgCreate();
		//               return;
		//            }
		//            else
		//            {
		//               return;
		//            }
				 }
				 function imgCreate()
				 {
					if($.inArray(add_id_num,arr_temp_num) > -1)
					{
					   //value is same as temp_count in the array 
					   $.grep(arr_temp_storage,function(el){
						  if($.inArray(el,arr_temp_num) == -1){
							 arr_new_temp.push(el);
						  }
					   });
					 add_id_num=arr_new_temp[0];
		//               temp_count=arr_temp_num.length-1;
				  
					  
					}
					
					
					var img_save_div = '<div class="gallery_images" id="img_save_div' + add_id_num + '" style="width: 75px; padding-left: 5px; padding-right: 5px; padding-bottom:25px; border-style: solid; height: 90px; float:left; overflow:hidden;margin-right: 5px;"></div>';
					$(img_save_div).insertBefore('#last-save-swatch');
					var imgClone = $("#test_image").clone().attr('id', 'image1_saved' + add_id_num);
		
					$(imgClone).css({"padding-top": "5px"});
					$(imgClone).css({"position": "absolute"});
					$(imgClone).css({"float": "left"});
					$(imgClone).css({"clip": "rect(0px, 60px, 65px, 0px)"});
		
					var insert_delete = '<img src="uploads/delete.png" id="delete_saved' + add_id_num + '"  style="padding-top: 2px; margin-left: 45px; position:absolute;"/>';
					$(imgClone).appendTo('#img_save_div' + add_id_num);
					$(insert_delete).appendTo('#img_save_div' + add_id_num);
					//return;
				 }
			 });
			 
			 
   $('.saved-swatch').on('click', 'img', function (e) {

      //updated
      var img_saved = $(this).attr('id');
      
      //$('#favourite').css("disabled", "disabled");
      img_saved = img_saved.substring(12);

      $('#delete_saved' + img_saved).click(function () {

		//alert('test');
         $('#image1_saved' + img_saved).remove();
         $('#img_save_div' + img_saved).remove();
         $(this).remove();
         $('#request-sample-button').css('display','none');
         $('#favourite').css('pointer-events','stroke');
         
          var saved_swatches_array =[];
            var image_full_path;
            $('.gallery_images img').each(function(){

               var img_id=$(this).attr('id');
               str=img_id.substring(12);
               div_id=img_id.substring(0,12);
               if(div_id !== "delete_saved")
               {
                  image_full_path=$('#image1_saved' + str).attr('src');
                  saved_swatches_array.push(image_full_path); 
               }

            });
            
         return;
      });

   });
   
		function get_info() {
			   var newColors = [];
			   var temp_color;
			   var amount = 0;
			   var count_size = 0;
			   $(".color_slider").each(function () {
			
				  amount = $(this).slider("value");
				  var colors_id = $(this).attr('id');
				  var switch_id = colors_id.charAt(16);
				  colors_id = colors_id.substring(17);
				  var flecks_coarse = colors[colors_id].coarse;
				  var flecks_fine = colors[colors_id].fine;
				  var hex = colors[parseInt(colors_id)].hex_code;
				  var size;
				  if (parseInt(flecks_coarse) === 1 && parseInt(flecks_fine) === 1) {
					 var coarse_text;
					 $(".switch").each(function () {
						if ($('#fine' + switch_id + colors_id).is(":disabled"))
						{
						   coarse_text = "Fine";
						}
						else
						{
						   coarse_text = "Coarse";
						}
			
					 });
					 size = coarse_text;
					 count_size++;
				  }
				  else if (parseInt(flecks_coarse) === 0) {
					 size = "Fine";
				  }
				  else if (parseInt(flecks_coarse) === 1) {
					 size = "Coarse";
				  }
				  temp_color = {percent: amount, r: hexToR(hex), g: hexToG(hex), b: hexToB(hex), flecks_size: size};
				 // console.log(temp_color);
				  newColors.push(temp_color);
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
			},
		 });
		 
		 
		});