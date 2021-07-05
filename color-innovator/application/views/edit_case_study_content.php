
<?php $this->load->view('notification'); ?>

<style>

	.show_case_studies_list{
		z-index: 9;
    float: unset;
    text-align: -webkit-right;
    margin: 10p;
    margin: 15px 0px;
	}
	
	</style>
    
<div class="col-md-12 show_case_studies_list">
	<a href="http://oneco.ca/~summit-flooring/Color_innovator/manage_home/manage_case_studies/" id="view_case_studies" target="_blank"><button type="button" name="view_case_studies">View Case Studies</button></a>
</div>

<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Case Study Contents</h5>
	</div>
	<div class="widget-body">
		<div class="widget-main">
			<div id="page-wrapper">
				<form class="form-horizontal" id="add_news" action="<?php echo base_url(); ?>manage_home/update_case_study_content/<?php echo $case_study['id']; ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="case_study_id" id="case_study_id" value="<?php echo $case_study['id']; ?>"/>
					<div class="form-group">
						<label for="banner_image" class="col-sm-3 control-label">Banner Image :</label>
						<div class="col-sm-8 image-upload">
							<label for="banner_case_study_image"><input type="file" name="banner_image" id="banner_image" ></label>
							<div class="col-md-12">
								<?php
								$display = $case_study['banner_image'];
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
						<label for="banner_content_1" class="col-sm-3 control-label">Title : </label>
						<div class="col-sm-8">
							<input class="col-sm-8" type="text" id="title" name="title" placeholder="Add Title" value="<?php echo $case_study['header_title']; ?>"/>
						</div>
					</div>

					<div class="form-group">
						<label for="banner_content_1" class="col-sm-3 control-label"> Content : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="header_content" name="header_content" class="form-control1"><?php echo $case_study['header_content']; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="section_logo1" class="col-sm-3 control-label">Section Logo1 :</label>
						<div class="col-sm-8 image-upload">
							<label for="section_logo1"><input type="file" name="section_logo1" id="section_logo1" ></label>
							<div class="col-md-12">
								<?php
								$display = $case_study['section_logo1'];
								if($display != "")
								{
									if($display == "Image.jpg")
									{
										?>
										<div class="col-md-2">
											<img class="case_study_img_logo1" src="<?php echo base_url();?>/admin_assets/frontend/include/Image.jpg" width="170px" height="140px" />
										</div>
										<?php
									}
									else
									{
										?>
										<div class="col-md-2">
											<span class="closing_banner1">X</span>
											<img class="case_study_img_logo1" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" width="100px" height="100px" />
										</div>
										<?php
									}
								}
								?>
							</div> <br>
						</div>
					</div>
                    
                    <?php /*?><div id="add_case_studies">
                        <div class="row">
                            <div class="form-group">
                                <label for="case_studies" class="col-sm-3 control-label">Case Studies 1:</label>
                                <div class="col-sm-3">
                                    <input type="text" name="image_title[]" id="image_title_1" class="common_add_class" data-imgid="1" >
                                </div>
                                <div class="col-sm-3">
                                  Image: <input type="file" name="section_images[]" id="section_images_1" data-imgid="1" >
                                </div>
                                <div class="col-sm-3">
                                  Document: <input type="file" name="section_documents[]" id="section_documents_1" data-imgid="1" >
                                </div>
                            </div>
                        	<div id="add_more_case_studies"></div>
                        </div>
                        <div class="row">
                            <div id="add_more">
                            	<label for="" class="col-sm-3 control-label"></label>
                                <div class="col-md-5">
                                	<button type="button" name="add_more_btn" id="add_more_btn" onclick="add_more_data()" data-id="2">Add More</button> 
                                    <a href="http://oneco.ca/~summit-flooring/Color_innovator/manage_home/manage_case_studies/" id="view_case_studies" target="_blank"><button type="button" name="view_case_studies">View Case Studies</button></a>
                                </div>
                            </div>
                        </div>
                    </div><?php */?>
                    
					<div class="form-group">
						<label for="section_title1" class="col-sm-3 control-label">Section title1 : </label>
						<div class="col-sm-8">
							<input class="col-sm-8" type="text" id="section_title1" name="section_title1" placeholder="Add Title" value="<?php echo $case_study['section_title1']; ?>"/>
						</div>
					</div>

					<div class="form-group">
						<label for="section_content1" class="col-sm-3 control-label"> Section content1 : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="section_content1" name="section_content1" class="form-control1"><?php echo $case_study['section_content1']; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="testimonial1" class="col-sm-3 control-label"> Testimonial1 : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="testimonial1" name="testimonial1" class="form-control1"><?php echo $case_study['testimonial1']; ?></textarea>
						</div>
					</div>   

					<div class="form-group">
						<label class="col-sm-3 control-label">Status</label>
						<div class="col-sm-6">
							<select class="col-sm-6" name="status" id="status">
								<option value="">Select Status</option>
								<option <?php if($case_study['status']=="1"){echo "selected";}?> value="1">Enable</option>
								<option <?php if($case_study['status']=="0"){echo "selected";}?> value="0">Disable</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-2">
							<button type="submit" class="btn-yellow btn" name="update">Update case_study Content</button>  &nbsp  <a href="<?php echo base_url();?>manage_home/manage_case_study" class="btn-yellow btn" />Cancel</a>
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
	var editor = CKEDITOR.replace( 'section_content1',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '../' );

	var editor2 = CKEDITOR.replace( 'testimonial1',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor2, '../' );

	var editor4 = CKEDITOR.replace( 'header_content',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor4, '../' );

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
