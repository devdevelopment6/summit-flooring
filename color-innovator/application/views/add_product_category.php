<?php $this->load->view('notification'); ?>
<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Product Category</h5>
	</div>
	
<div class="widget-body">
	<div class="widget-main">
		<div id="page-wrapper">	
			<form class="form-horizontal" id="homecontent" action="<?php echo base_url(); ?>product_category/add_product_category" method="post" enctype="multipart/form-data">
				
                <div class="form-group">
                    <label for="indoor_banner_image" class="col-sm-2 control-label">Banner Image :</label>
                    <div class="col-sm-8 image-upload">
                        <label for="indoor_banner_image"><input type="file" name="indoor_banner_image" id="indoor_banner_image" ></label>
                    </div>
                </div>
                
                <div class="form-group">
					<label for="category_name" class="col-sm-2 control-label">Name : </label>
					<div class="col-sm-8">
						<input type="text" id="category_name" name="category_name"  required/>
				   </div>
				</div>
                
                <div class="form-group">
                	<label for="description" class="col-sm-2 control-label">Description : </label>
                    <div class="col-sm-8">
                         <textarea rows="8" id="description" name="description" class="form-control1"></textarea>
                    </div>
                </div>
                
				<div class="form-group">
					<label class="col-sm-2 control-label">Active Status</label>
					<div class="col-sm-8">
						<input type="radio" name="status" value="1">Active
						<input type="radio" name="status" value="0" checked >Not Active
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-2">
					<button type="submit" class="btn-yellow btn" name="add">Add Category</button>
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
			var editor = CKEDITOR.replace( 'description',{
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
	div.inline { float:left; }
	.clearBoth { clear:both; }
	.cls-chk{
		display:inline-block;
		margin-bottom:7px;
		width:30%;
	}
</style>