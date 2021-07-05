<?php $this->load->view('notification'); ?>

<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Product Contents</h5>
	</div>
	<div class="widget-body">
		<div class="widget-main">
			<div id="page-wrapper">
				<form class="form-horizontal" id="add_news" action="<?php echo base_url(); ?>manage_home/update_healthcare_content/<?php echo $healthcare['id']; ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="healthcare_id" id="healthcare_id" value="<?php echo $healthcare['id']; ?>"/>
					<div class="form-group">
						<label for="banner_image" class="col-sm-3 control-label">Banner Image :</label>
						<div class="col-sm-8 image-upload">
							<label for="banner_healthcare_image"><input type="file" name="banner_image" id="banner_image" ></label>
							<div class="col-md-12">
								<?php
								$display = $healthcare['banner_image'];
								if($display != "")
								{
									if($display == "Image.jpg")
									{
										?>
										<div class="col-md-2">
											<img class="healthcare_img_banner" src="<?php echo base_url();?>/admin_assets/frontend/include/Image.jpg" width="170px" height="140px" />
										</div>
										<?php
									}
									else
									{
										?>
										<div class="col-md-2">
											<span class="closing_banner">X</span>
											<img class="healthcare_img_banner" src="<?php echo base_url();?>uploads/healthcare_category_image/thumbs/<?=$display; ?>" width="100px" height="100px" />
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
							<input class="col-sm-8" type="text" id="title" name="title" placeholder="Add Title" value="<?php echo $healthcare['header_title']; ?>"/>
						</div>
					</div>

					<div class="form-group">
						<label for="banner_content_1" class="col-sm-3 control-label"> Content : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="header_content" name="header_content" class="form-control1"><?php echo $healthcare['header_content']; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="banner_image" class="col-sm-3 control-label">Section Image :</label>
						<div class="col-sm-8 image-upload">
							<label for="section_image"><input type="file" name="section_image" id="section_image" ></label>
							<div class="col-md-12">
								<?php
								$display = $healthcare['section_image'];
								if($display != "")
								{
									if($display == "Image.jpg")
									{
										?>
										<div class="col-md-2">
											<img class="healthcare_img_banner" src="<?php echo base_url();?>/admin_assets/frontend/include/Image.jpg" width="170px" height="140px" />
										</div>
										<?php
									}
									else
									{
										?>
										<div class="col-md-2">
											<span class="closing_banner">X</span>
											<img class="healthcare_img_banner" src="<?php echo base_url();?>uploads/healthcare_category_image/thumbs/<?=$display; ?>" width="100px" height="100px" />
										</div>
										<?php
									}
								}
								?>

							</div> <br>
						</div>
					</div>

					<div class="form-group">
						<label for="section_title" class="col-sm-3 control-label">Title : </label>
						<div class="col-sm-8">
							<input class="col-sm-8" type="text" id="section_title" name="section_title" placeholder="Add Title" value="<?php echo $healthcare['section_title']; ?>"/>
						</div>
					</div>

					<div class="form-group">
						<label for="section_content_1" class="col-sm-3 control-label"> Content : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="section_content" name="section_content" class="form-control1"><?php echo $healthcare['section_content']; ?></textarea>
						</div>
					</div>

					<?php /*?><div class="form-group">
                <label for="banner_content_2" class="col-sm-3 control-label">Page Content : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="product_content" name="product_content" class="form-control1"><?php echo $product['product_content']; ?></textarea>
                </div>
			</div><?php */?>

					<div class="form-group">
						<label class="col-sm-3 control-label">Status</label>
						<div class="col-sm-6">
							<select class="col-sm-6" name="status" id="status">
								<option value="">Select Status</option>
								<option <?php if($healthcare['status']=="1"){echo "selected";}?> value="1">Enable</option>
								<option <?php if($healthcare['status']=="0"){echo "selected";}?> value="0">Disable</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-2">
							<button type="submit" class="btn-yellow btn" name="update">Update healthcare Content</button>  &nbsp  <a href="<?php echo base_url();?>manage_home/manage_healthcare" class="btn-yellow btn" />Cancel</a>
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
	var editor = CKEDITOR.replace( 'section_content',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '../' );

	var editor_2 = CKEDITOR.replace( 'header_content',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor_2, '../' );

</script>



<script type="text/javascript">
	$(document).ready(function(){

		$("#add_news").validate({
			rules:																																																								 	 {
				title: {
					required:true
				},
				status: {																																																					 					required:true																																																									 			}
			},
			messages: 																																																								 	{
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
				var id  =   $("#healthcare_id").val();
				if(id	!=	'')																																																								 		{
					$.ajax({
						"url":"<?php echo base_url();?>manage_home/delete_healthcare_category_banner_image",
						"type":"POST",
						"data":{
							id :id,
							image_id :image_id
						},
						success:function(data){
							//console.log(data);
							$('.healthcare_img_banner').css("display","none");
							$('.closing_banner').css("display","none");
						}
					});																																																		 		}else{
					alert('Unknown error occured.');
				}
			}
		});

	});
</script>