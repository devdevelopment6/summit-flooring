
<?php $this->load->view('notification'); ?>

<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Case Study</h5>
	</div>
	<div class="widget-body">
		<div class="widget-main">
			<div id="page-wrapper">
				<form class="form-horizontal" id="add_news" action="<?php echo base_url(); ?>manage_home/update_case_study/<?php echo $case_study_details['id'];?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="banner_content_1" class="col-sm-3 control-label">Title : </label>
						<div class="col-sm-8">
							<input class="col-sm-8" type="text" id="title" name="title" placeholder="Add Title" value="<?php echo $case_study_details['title']; ?>"/>
						</div>
					</div>
					
                    <input type="hidden" name="case_study_id" id="case_study_id" value="<?php echo $case_study_details['id'];?>" />
                    <div class="form-group">
						<label for="banner_image" class="col-sm-3 control-label">Image :</label>
						<div class="col-sm-8 image-upload">
							<label for="case_study_image"><input type="file" name="section_images" id="section_images" ></label>
                            <div class="col-md-12">
								<?php
								$display = $case_study_details['image'];
								if($display != "")
								{
									if($display == "Image.jpg")
									{
										?>
										<div class="col-md-2">
											<img class="case_study_img_banner" src="<?php echo base_url();?>/admin_assets/frontend/include/Image.jpg" width="170px" height="140px" />
										</div>
										<?php
									}
									else
									{
										?>
										<div class="col-md-2">
											<span class="closing_banner">X</span>
											<img class="case_study_img_banner" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" width="100px" height="100px" />
										</div>
										<?php
									}
								}
								?>

							</div> <br>
						</div>
					</div>
                    
                     <div class="form-group">
						<label for="banner_image" class="col-sm-3 control-label">Document :</label>
						<div class="col-sm-8 image-upload">
							<label for="document_case_study_image"><input type="file" name="section_documents" id="section_documents" ></label>
                            <div class="col-md-12">
								<?php
								$display = $case_study_details['document'];
								if($display != "") { ?>
                                    <div class="col-md-2">
                                        <span class="closing_banner_1">X</span>
                                        <a href="<?php echo base_url();?>uploads/case_study_category_document/<?=$display; ?>" target="_blank" class="case_study_document"><?php echo $case_study_details['document']; ?></a>
                                    </div>
								<?php } ?>

							</div> <br>
						</div>
					</div>
                    
                    
					<div class="form-group">
						<label for="banner_content_1" class="col-sm-3 control-label"> Content : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="case_study_content" name="case_study_content" class="form-control1"><?php echo $case_study_details['content']; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-2">
							<button type="submit" class="btn-yellow btn" name="update">Update Case Study</button>  &nbsp  <a href="<?php echo base_url();?>manage_home/manage_case_studies" class="btn-yellow btn" />Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>


<script type="text/javascript">
	var editor = CKEDITOR.replace( 'case_study_content',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '../' );

	

</script>
<style>
.sidebar~.footer .footer-inner{ margin-left:111px; }
#view_case_studies{ color:black; }
</style>
<script type="text/javascript">
	$(document).ready(function(){

		$("#add_news").validate({
			rules:																																																								 	 		{
				title: {
					required:true
				},
				status: {																																																					 					required:true																																																									 				}
			},
			messages: 																																																								 			{
				title: {
					required:"Title is required."
				},
				status:	{
					required:"Status is required."
				},
			},
		});

		$(".closing_banner").on("click",function(){
			var result = confirm("Are you sure you want to delete?");
			if (result) {
				
				var id  =   $("#case_study_id").val();
				if(id	!=	'')																																																								 				{
					$.ajax({
						"url":"<?php echo base_url();?>manage_home/remove_case_study_img",
						"type":"POST",
						"data":{
							id :id,
						},
						success:function(data){
							//console.log(data);
							if(data == true)
							{
								$('.case_study_img_banner').css("display","none");
								$('.closing_banner').css("display","none");
							} else {
								alert('Error while processing.');
							}
						}
					});																																																		 				}else{
					alert('Unknown error occured.');
				}
			}
		});

		$(".closing_banner_1").on("click",function(){
			var result = confirm("Are you sure you want to delete?");
			if (result) {

				var id  =   $("#case_study_id").val();
				if(id	!=	'')																																																								 				{
					$.ajax({
						"url":"<?php echo base_url();?>manage_home/remove_case_study_document",
						"type":"POST",
						"data":{
							id :id,
						},
						success:function(data){
							if(data == true)
							{
								$('.case_study_document').css("display","none");
								$('.closing_banner_1').css("display","none");
							} else {
								alert('Error while processing.');
							}
						}
					});																																																		 				}else{
					alert('Unknown error occured.');
				}
			}
		});
	});

	function add_more_data(){
		var id = $("#add_more_btn").attr("data-id");
		$("#add_more_case_studies").append('<div class="form-group"><label for="case_studies" class="col-sm-3 control-label">Case Studies '+ id +':</label><div class="col-sm-3"><input type="text" name="image_title[]" id="image_title_'+ id +'"  class="common_add_class" data-imgid="'+ id +'" ></div><div class="col-sm-3">Image: <input type="file" name="section_images[]" id="section_images_'+ id +'" data-imgid="'+ id +'"></div><div class="col-sm-3">Document: <input type="file" name="section_documents[]" id="section_document_'+ id +'" data-imgid="'+ id +'"></div></div>');
		$("#add_more_btn").attr("data-id", parseInt(id)+1);
	}
</script>
