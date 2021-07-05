base_path = $("#base_path").val();

$(document).ready(function(){

	$(".LBD_CaptchaImageDiv > a").css("display", "none");



	actDltLink('');

	check_all();



	tinymce.init({

		selector: '.text_editor',

		height: 500,

		theme: 'modern',

		plugins: [

			'advlist autolink lists link image charmap print preview hr anchor pagebreak',

			'searchreplace wordcount visualblocks visualchars code fullscreen',

			'insertdatetime media nonbreaking save table contextmenu directionality',

			'emoticons template paste textcolor colorpicker textpattern imagetools codesample'

		],

		toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

		toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',

		image_advtab: true,

		templates: [

			{ title: 'Test template 1', content: 'Test 1' },

			{ title: 'Test template 2', content: 'Test 2' }

		],

		content_css: [

			'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',

			'//www.tinymce.com/css/codepen.min.css'

		]

	});



	$(".edit_usertype").click(function(){

		var edit = $(this).attr("edit");



		$.ajax({

			url:base_path+"admin/get_usertype/",

			type:"POST",

			data:{ id : edit },

			success:function(res){

				if(res != "")

				{

					res = jQuery.parseJSON(res);

					$.confirm({

						title:"Update : "+res.user_type_name,

						content:"<input type='text' value='"+res.user_type_name+"' id='update_type' class='form-control'>",

						buttons:{

							Update:{

								btnClass:"btn-success btn-sm",

								action : function(){

									$.ajax({

										url:base_path+"admin/update_usertype",

										type:"post",

										data:{

											id : edit,

											name : $("#update_type").val()

										},

										success:function(flag){

											if(flag != "")

											{ $(location).attr("href", base_path+"admin/user_types"); }

											else

											{  }

										}

									});

								}

							},

							Cancle:{

								btnClass:"btn-default btn-sm",

								action:function(){}

							}

						}

					});

				}

			}

		});

	});

});



function actDltLink(ref)

{

	$(ref+" .delete_link").click

	(

		function (evt)

		{

			evt.preventDefault();

			return false;

		}

	);

	$(ref+" .delete_link").on("click", function(){

		var redirect = $(this).attr('href');

		$.confirm({

			title: 'Do you realy want to delete this record?',

			content:"",

			buttons: {

				confirm:{

					btnClass:"btn-danger btn-sm",

					action : function(){

						$(location).attr('href',redirect);

						return true;

					}

				},

				cancel: {

					btnClass:"btn-default btn-sm",

					action:function(){  }

				}

			}

		});

	});

}



function check_all()

{

	$("#check_all").click(function(){

		if($(this).prop())

		{



		}

	});

}																																																						
																																																