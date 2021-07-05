<?php $this->load->view('notification'); ?>
<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Application Categories</h5>
	</div>
	
<div class="widget-body">
	<div class="widget-main">
		<div id="page-wrapper">	
			<form class="form-horizontal" id="add_app_cat" action="<?php echo base_url(); ?>application_categories/insert_application_category" method="post" enctype="multipart/form-data">
				<div class="form-group">
						<label for="banner_image" class="col-sm-3 control-label">Banner Image :</label>
						<div class="col-sm-8 image-upload">
							<label for="banner_fitness_image"><input type="file" name="banner_image" id="banner_image" ></label>
							<div class="col-md-12">
								<?php
								/*$display = $fitness['banner_image'];
								if($display != "")
								{
									if($display == "Image.jpg")
									{
										?>
										<div class="col-md-2">
											<img class="fitness_img_banner" src="<?php echo base_url();?>/admin_assets/frontend/include/Image.jpg" width="170px" height="140px" />
										</div>
										<?php
									}
									else
									{
										?>
										<div class="col-md-2">
											<span class="closing_banner">X</span>
											<img class="fitness_img_banner" src="<?php echo base_url();?>uploads/fitness_category_image/thumbs/<?=$display; ?>" width="100px" height="100px" />
										</div>
										<?php
									}
								}*/
								?>

							</div> <br>
						</div>
					</div>
                <div class="form-group">
					<label for="cat_name" class="col-sm-2 control-label">Category Name : </label>
					<div class="col-sm-8">
						<input type="text" id="cat_name" name="cat_name" placeholder="Category Name" required />
				   </div>
				</div>
				<div class="form-group">
					<label for="banner_content_1" class="col-sm-2 control-label">Header Title : </label>
					<div class="col-sm-8">
						<input class="col-sm-8" type="text" id="title" name="title" placeholder="Add Title" />
					</div>
				</div>

				<div class="form-group">
					<label for="banner_content_1" class="col-sm-2 control-label">Header Content : </label>
					<div class="col-sm-8">
						<textarea rows="8" id="header_content" name="header_content" class="form-control1"></textarea>
					</div>
				</div>
				<div class="form-group">
						<label for="banner_image" class="col-sm-2 control-label">Section Image :</label>
						<div class="col-sm-8 image-upload">
							<label for="section_image"><input type="file" name="section_image" id="section_image" ></label>
							<div class="col-md-12">
								<?php
								/*$display = $fitness['section_image'];
								if($display != "")
								{
									if($display == "Image.jpg")
									{
										?>
										<div class="col-md-2">
											<img class="fitness_img_banner" src="<?php echo base_url();?>/admin_assets/frontend/include/Image.jpg" width="170px" height="140px" />
										</div>
										<?php
									}
									else
									{
										?>
										<div class="col-md-2">
											<span class="closing_banner">X</span>
											<img class="fitness_img_banner" src="<?php echo base_url();?>uploads/fitness_category_image/thumbs/<?=$display; ?>" width="100px" height="100px" />
										</div>
										<?php
									}
								}*/
								?>

							</div> <br>
						</div>
					</div>
				<div class="form-group">
					<label for="section_title" class="col-sm-2 control-label">Section Title : </label>
					<div class="col-sm-8">
						<input class="col-sm-8" type="text" id="section_title" name="section_title" placeholder="Add Title" />
					</div>
				</div>

				<div class="form-group">
					<label for="section_content_1" class="col-sm-2 control-label">Section Content : </label>
					<div class="col-sm-8">
						<textarea rows="8" id="section_content" name="section_content" class="form-control1"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="application_banner_image" class="col-sm-2 control-label">Application Section Image :</label>
					<div class="col-sm-8 image-upload">
						<label for="application_banner_image"><input type="file" name="application_banner_image" id="application_banner_image" ></label>
					</div>
				</div>
                
                 <div class="form-group">
					<label for="display_order" class="col-sm-2 control-label">Display Order : </label>
					<div class="col-sm-8">
						<input type="text" id="display_order" name="display_order" placeholder="Display Order" required />
				   </div>
				</div>
                
				<div class="form-group">
					<label for="category_status" class="col-sm-2 control-label">Status : </label>
					<div class="col-sm-8">
						<input type="checkbox" id="category_status" name="category_status" value="1" checked />
				   </div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-2">
					<button type="submit" class="btn-yellow btn" name="add">Add</button>
					</div>								
				</div>
			</form>

 		</div>
	</div>
</div>

</div>			

<style>
	div.inline { float:left; }
	.clearBoth { clear:both; }
	.cls-chk{
		display:inline-block;
		margin-bottom:7px;
		width:30%;
	}
</style>
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
	$("#add_app_cat").validate({
    rules:{
		cat_name: {
   					required:true
     		},
		display_order:{
			required:true,
			number:true,
		}
 	 },
 	messages:{
		cat_name: {
	   				required:"Category Name is required."
		 	},
		display_order:{
			required:"Please Enter Display Order",
			number:"Please Enter valid display number",
		}
    },
   });
});
</script>