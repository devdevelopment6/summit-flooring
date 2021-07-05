<?php $this->load->view('notification'); ?>

<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Fitness Contents</h5>
	</div>
	<div class="widget-body">
		<div class="widget-main">
			<div id="page-wrapper">
				<form class="form-horizontal" id="add_news" action="<?php echo base_url(); ?>manage_home/add_hospitality_content/" method="post" enctype="multipart/form-data">


					<div class="form-group">
						<label for="banner_image" class="col-sm-3 control-label">Banner Image :</label>
						<div class="col-sm-8 image-upload">
							<label for="banner_image"><input type="file" name="banner_image" id="banner_image" ></label>
						</div>
					</div>

					<div class="form-group">
						<label for="banner_content_1" class="col-sm-3 control-label">Header Title : </label>
						<div class="col-sm-8">
							<input class="col-sm-8" type="text" id="title" name="title" placeholder="Add Title"/>
						</div>
					</div>

					<?php /*?><div class="form-group">
                <label for="banner_content_1" class="col-sm-3 control-label">Icon : </label>
                <div class="col-sm-8">
                 	<input class="col-sm-8" type="text" id="icon" name="icon" placeholder="Add Icon" />
                </div>
			</div><?php */?>

					<div class="form-group">
						<label for="banner_content_1" class="col-sm-3 control-label"> Header Content : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="header_content" name="header_content" class="form-control1"></textarea>
						</div>
					</div>

					<?php /*?><div class="form-group">
                <label for="banner_content_2" class="col-sm-3 control-label">Content : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="product_content" name="product_content" class="form-control1"></textarea>
                </div>
			</div><?php */?>

					<div class="form-group">
						<label for="section_image" class="col-sm-3 control-label">Section Image :</label>
						<div class="col-sm-8 image-upload">
							<label for="section_image"><input type="file" name="section_image" id="section_image" ></label>
						</div>
					</div>

					<div class="form-group">
						<label for="section_title" class="col-sm-3 control-label">Section Title : </label>
						<div class="col-sm-8">
							<input class="col-sm-8" type="text" id="section_title" name="section_title" placeholder="Add section Title"/>
						</div>
					</div>

					<div class="form-group">
						<label for="section_content" class="col-sm-3 control-label"> Section Content : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="section_content" name="section_content" class="form-control1"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Status</label>
						<div class="col-sm-6">
							<select class="col-sm-6" name="status" id="status">
								<option value="">Select Status</option>
								<option value="1">Enable</option>
								<option value="0">Disable</option>
							</select>
						</div>
					</div>


					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-2">
							<button type="submit" class="btn-yellow btn" name="update">Add Fitness Content</button>																																 				&nbsp;&nbsp; <a href="<?php echo base_url();?>manage_home/manage_products" class="btn-yellow btn" />Cancel</a>
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
	CKFinder.setupCKEditor( editor, '../' );

</script>



<script type="text/javascript">
	$(document).ready(function(){


		$("#add_news").validate({
			rules:																																																								 	 {
				title: {
					required:true
				},
				section_title: {
					required:true
				},
				status: {																																																					 					required:true																																																									 			}
			},

			messages: 																																																								 	{
				title: {
					required:"Title is required."
				},
				section_title: {
					required:"Section Title is required."
				},
				status:	{
					required:"Status is required."
				},
			},
		});
	});
</script>