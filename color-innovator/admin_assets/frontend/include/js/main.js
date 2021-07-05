$(document).ready(function() {
	var baseurl = $('#base_url').val();
	//alert(baseurl);    
        $("#ddlMake").on("change",function(){ 
		  selected_make  =   $("#ddlMake option:selected").val();																																				 			if(selected_make	!=	'')																																																								 			{
				$.ajax({
					"url":baseurl+"home/get_model",
					"type":"POST",
					"data":{
						selected_make :selected_make
					},
					success:function(data){
					   console.log(data);																																											 					$("#ddlModel").empty();
						$("#ddlModel").removeAttr('disabled');
						$("#ddlModel").append(data);
					}
				});																																																		 			} 																																													 			else {																																										 				$("#ddlModel").attr("disabled", "disabled");																																			 			}
        });																																																				 																																																					 		$("#ddlModel").on("change",function(){ 
		  selected_model  =   $("#ddlModel option:selected").attr('id');
		  selected_model_val  =   $("#ddlModel option:selected").val();																																				 			if(selected_model_val	!=	'')																																																								 			{
				$.ajax({
					"url":baseurl+"home/get_body",
					"type":"POST",
					"data":{
						selected_model :selected_model
					},
					success:function(data){
					   console.log(data);																																										 						$("#ddlBody").empty();
						$("#ddlBody").removeAttr('disabled');
						$("#ddlBody").append(data);
						//if()
					}
				});
				$.ajax({
					"url":baseurl+"home/get_year",
					"type":"POST",
					"data":{
						selected_model :selected_model
					},
					success:function(data){
					   console.log(data);																																											 						$("#ddlYear").empty();
						$("#ddlBody").removeAttr('disabled');
						$("#ddlYear").removeAttr('disabled');
						$("#ddlYear").append(data);
					}
				});																																																		 			} 																																													 			else {																																													 																																															 				$("#ddlBody").attr("disabled", "disabled");																																		 				$("#ddlYear").attr("disabled", "disabled");																																			 			}
        });		
		
		$("#ddlBody").on("change",function(){
			selected_body_val  =   $("#ddlBody option:selected").val();																																				 			if(selected_body_val	!=	'')																																																								 			{
				$("#ddlYear").attr("disabled", "disabled");	
			}
			else{
				$("#ddlYear").removeAttr('disabled');
			}
		});
																																																				 		$("#ddlYear").on("change",function(){  
		  selected_make  =   $("#ddlMake option:selected").val(); 
		  selected_model  =   $("#ddlModel option:selected").attr('id'); 
		  selected_body  =   $("#ddlBody option:selected").val();
		  selected_year  =   $("#ddlYear option:selected").val();																																				 			$.ajax({
					"url":baseurl+"home/get_search_result",
					"type":"POST",
					"data":{
						selected_make :selected_make,selected_model:selected_model,	selected_body:selected_body,selected_year:selected_year
					},
					success:function(data){
					   console.log(data);																																											 						$("#main").empty();																																																 						$("#main").append(data);
												
						$(".lnk-back").on("click",function(){
								location.reload();
							});
					}
				});																																																		 			
        });
 });