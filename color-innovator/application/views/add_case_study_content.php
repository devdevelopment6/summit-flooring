<?php $this->load->view('notification'); ?>

<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Case Study Contents</h5>
	</div>
	<div class="widget-body">
		<div class="widget-main">
			<div id="page-wrapper">
				<form class="form-horizontal" id="add_news" action="<?php echo base_url(); ?>manage_home/add_case_study_content/" method="post" enctype="multipart/form-data">


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
						<label for="section_logo1" class="col-sm-3 control-label">Section Logo 1 :</label>
						<div class="col-sm-8 image-upload">
							<label for="section_logo1"><input type="file" name="section_logo1" id="section_logo1" ></label>
						</div>
					</div>

					<div class="form-group">
						<label for="section_image1" class="col-sm-3 control-label">Section Images1 :</label>
						<div class="col-sm-8 image-upload">
							<label for="section_image1"><input type="file" name="section_image_one[]" id="section_image1" multiple="multiple"></label>
						</div>
					</div>

					<div class="form-group">
						<label for="section_title1" class="col-sm-3 control-label">Section Title1 : </label>
						<div class="col-sm-8">
							<input class="col-sm-8" type="text" id="section_title1" name="section_title1" placeholder="Add section Title"/>
						</div>
					</div>

					<div class="form-group">
						<label for="section_content1" class="col-sm-3 control-label"> Section Content1 : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="section_content1" name="section_content1" class="form-control1"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="testimonial1" class="col-sm-3 control-label"> Testimonial Content1 : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="testimonial1" name="testimonial1" class="form-control1"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="section_logo2" class="col-sm-3 control-label">Section Logo 2 :</label>
						<div class="col-sm-8 image-upload">
							<label for="section_logo2"><input type="file" name="section_logo2" id="section_logo2" ></label>
						</div>
					</div>

					<div class="form-group">
						<label for="section_image2" class="col-sm-3 control-label">Section Images2 :</label>
						<div class="col-sm-8 image-upload">
							<label for="section_image2"><input type="file" name="section_image_two[]" id="section_image2" multiple="multiple"></label>
						</div>
					</div>

					<div class="form-group">
						<label for="section_title2" class="col-sm-3 control-label">Section Title2 : </label>
						<div class="col-sm-8">
							<input class="col-sm-8" type="text" id="section_title2" name="section_title2" placeholder="Add section Title"/>
						</div>
					</div>

					<div class="form-group">
						<label for="section_content2" class="col-sm-3 control-label"> Section Content2 : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="section_content2" name="section_content2" class="form-control1"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="testimonial2" class="col-sm-3 control-label"> Testimonial Content1 : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="testimonial2" name="testimonial2" class="form-control1"></textarea>
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
							<button type="submit" class="btn-yellow btn" name="update">Add Case Study Content</button>																																 				&nbsp;&nbsp; <a href="<?php echo base_url();?>manage_home/manage_products" class="btn-yellow btn" />Cancel</a>
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

	var editor1 = CKEDITOR.replace( 'section_content2',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor1, '../' );

	var editor2 = CKEDITOR.replace( 'testimonial1',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor2, '../' );

	var editor3 = CKEDITOR.replace( 'testimonial2',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor3, '../' );

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



<!--<script type="text/javascript">
	$(document).ready(function(){


		$("#add_news").validate({
			rules:																																																								 	 {
				title: {
					required:true
				},
				section_title1: {
					required:true
				},
				section_title2: {
					required:true
				},
				banner_image: {
					required:true
				},
				header_content: {
					required:true
				},
				section_content1: {
					required:true
				},
				section_content2: {
					required:true
				},
				section_image1: {
					required:true
				},
				section_image2: {
					required:true
				},
				testimonial1: {
					required:true
				},
				testimonial2: {
					required:true
				},
				section_logo1: {
					required:true
				},
				section_logo2: {
					required:true
				},
				status: {																																																					 					required:true																																																									 			}
			},

			messages: 																																																								 	{
				title: {
					required:"Title is required."
				},
				section_title1: {
					required:"section_title1 is required."
				},
				section_title2: {
					required:"section_title2 is required."
				},
				banner_image: {
					required:"banner_image is required."
				},
				header_content: {
					required:"header_content is required."
				},
				section_content1: {
					required:"section_content1 is required."
				},
				section_content2: {
					required:"section_content2 is required."
				},
				section_image1: {
					required:"section_image1 is required."
				},
				section_image2: {
					required:"section_image2 is required."
				},
				testimonial1: {
					required:"testimonial1 is required."
				},
				testimonial2: {
					required:"testimonial2 is required."
				},
				section_logo1: {
					required:"section_logo1 is required."
				},
				section_logo2: {
					required:"section_logo2 is required."
				},
				status:	{
					required:"Status is required."
				},
			},
		});
	});
</script>-->