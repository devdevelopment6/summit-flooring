
<?php $this->load->view('notification'); ?>

<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Case Study</h5>
	</div>
	<div class="widget-body">
		<div class="widget-main">
			<div id="page-wrapper">
				<form class="form-horizontal" id="add_news" action="<?php echo base_url(); ?>manage_home/insert_case_study" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="banner_content_1" class="col-sm-3 control-label">Title : </label>
						<div class="col-sm-8">
							<input class="col-sm-8" type="text" id="title" name="title" placeholder="Add Title" value="<?php echo $case_study['header_title']; ?>"/>
						</div>
					</div>
					
                    <div class="form-group">
						<label for="banner_image" class="col-sm-3 control-label">Image :</label>
						<div class="col-sm-8 image-upload">
							<label for="case_study_image"><input type="file" name="section_images" id="section_images" ></label>
						</div>
					</div>
                    
                     <div class="form-group">
						<label for="banner_image" class="col-sm-3 control-label">Document :</label>
						<div class="col-sm-8 image-upload">
							<label for="document_case_study_image"><input type="file" name="section_documents" id="section_documents" ></label>
						</div>
					</div>
                    
                    
					<div class="form-group">
						<label for="banner_content_1" class="col-sm-3 control-label"> Content : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="case_study_content" name="case_study_content" class="form-control1"></textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-2">
							<button type="submit" class="btn-yellow btn" name="update">Add Case Study</button>  &nbsp  <a href="<?php echo base_url();?>manage_home/manage_case_studies" class="btn-yellow btn" />Cancel</a>
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

				var image_id  =   $(this).attr("id");
				var id  =   $("#case_study_id").val();
				if(id	!=	'')																																																								 				{
					$.ajax({
						"url":"<?php echo base_url();?>manage_home/delete_case_study_category_banner_image",
						"type":"POST",
						"data":{
							id :id,
							image_id :image_id
						},
						success:function(data){
							//console.log(data);
							$('.case_study_img_banner').css("display","none");
							$('.closing_banner').css("display","none");
						}
					});																																																		 				}else{
					alert('Unknown error occured.');
				}
			}
		});

		$(".closing_banner1").on("click",function(){
			var result = confirm("Are you sure you want to delete?");
			if (result) {

				var image_id  =   $(this).attr("id");
				var id  =   $("#case_study_id").val();
				if(id	!=	'')																																																								 				{
					$.ajax({
						"url":"<?php echo base_url();?>manage_home/delete_case_study_category_section_logo1",
						"type":"POST",
						"data":{
							id :id,
							image_id :image_id
						},
						success:function(data){

							$('.case_study_img_logo1').css("display","none");
							$('.closing_banner1').css("display","none");
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
