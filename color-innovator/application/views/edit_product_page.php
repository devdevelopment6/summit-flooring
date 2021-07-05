<?php $this->load->view('notification'); ?>
<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Product Category</h5>
	</div>

	<div class="widget-body">
		<div class="widget-main">
			<div id="page-wrapper">
				<form class="form-horizontal" id="homecontent" action="<?php echo base_url(); ?>product_page/update_product_category" method="post" enctype="multipart/form-data">
					<input type='hidden' name='category_id' value='<?php echo $categories['id']; ?>'>

					<div class="form-group">
						<label for="indoor_banner_image" class="col-sm-2 control-label">Banner Image :</label>
						<div class="col-sm-8 image-upload">
							<label for="indoor_banner_image"><input type="file" name="indoor_banner_image" id="indoor_banner_image" ></label>
							<div class="col-md-12">
								<?php
								$display = $categories['banner_image'];
								if($display != "")
								{
									if($display == "Image.jpg")
									{
										?>
										<div class="col-md-2">
											<img class="product_img_homepage" src="<?php echo base_url();?>/admin_assets/frontend/include/Image.jpg" width="170px" height="140px" />
										</div>
										<?php
									}
									else
									{
										?>
										<div class="col-md-2">
											<span class="closing_homeimage">X</span>
											<img class="product_img_homepage" src="<?php echo base_url();?>uploads/product_page_image/thumbs/<?=$display; ?>" width="100px" height="100px" />
										</div>
										<?php
									}
								}
								?>

							</div> <br>
						</div>
					</div>

					<div class="form-group">
						<label for="category_name" class="col-sm-2 control-label">Name : </label>
						<div class="col-sm-8">
							<input type="text" id="category_name" name="category_name" value='<?php echo $categories['name']; ?>' required/>
						</div>
					</div>

					<div class="form-group">
						<label for="description" class="col-sm-2 control-label">Description : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="description" name="description" class="form-control1"><?php echo $categories['category_content']; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="middle_title_1" class="col-sm-2 control-label">middle Title 1 : </label>
						<div class="col-sm-8">
							<input type="text" id="middle_title_1" name="middle_title_1" value='<?php echo $categories['middle_content_title_1']; ?>' required/>
						</div>
					</div>

					<div class="form-group">
						<label for="middle_content_1" class="col-sm-2 control-label">Middle content 1: </label>
						<div class="col-sm-8">
							<textarea rows="8" id="middle_content_1" name="middle_content_1" class="form-control1"><?php echo $categories['middle_content_1']; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="middle_title_2" class="col-sm-2 control-label">middle Title 2 : </label>
						<div class="col-sm-8">
							<input type="text" id="middle_title_2" name="middle_title_2" value='<?php echo $categories['middle_content_title_2']; ?>' required/>
						</div>
					</div>

					<div class="form-group">
						<label for="middle_content_2" class="col-sm-2 control-label">Middle content 2 : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="middle_content_2" name="middle_content_2" class="form-control1"><?php echo $categories['middle_content_2']; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="middle_title_3" class="col-sm-2 control-label">middle Title 3 : </label>
						<div class="col-sm-8">
							<input type="text" id="middle_title_3" name="middle_title_3" value='<?php echo $categories['middle_content_title_3']; ?>' required/>
						</div>
					</div>

					<div class="form-group">
						<label for="middle_content_3" class="col-sm-2 control-label">Middle content 3 : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="middle_content_3" name="middle_content_3" class="form-control1"><?php echo $categories['middle_content_3']; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="middle_title_4" class="col-sm-2 control-label">middle Title 4 : </label>
						<div class="col-sm-8">
							<input type="text" id="middle_title_4" name="middle_title_4" value='<?php echo $categories['middle_content_title_4']; ?>' required/>
						</div>
					</div>

					<div class="form-group">
						<label for="middle_content_4" class="col-sm-2 control-label">Middle content 4 : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="middle_content_4" name="middle_content_4" class="form-control1"><?php echo $categories['middle_content_4']; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Active Status</label>
						<div class="col-sm-8">
							<input type="radio" name="status" value="1" <?php $checked=($categories['status']==1)?"checked":""; echo $checked;?>>Active
							<input type="radio" name="status" value="0" <?php $checked=($categories['status']==0)?"checked":""; echo $checked;?>>Not Active
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-2">
							<button type="submit" class="btn-yellow btn" name="update">Update Category</button>
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

	var editor_1 = CKEDITOR.replace( 'middle_content_1',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor_1, '../' );

	var editor_2 = CKEDITOR.replace( 'middle_content_2',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor_2, '../' );

	var editor_3 = CKEDITOR.replace( 'middle_content_3',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor_3, '../' );

	var editor_4 = CKEDITOR.replace( 'middle_content_4',{
		filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor_4, '../' );

	$(document).ready( function()  {
		$(".closing_homeimage").on("click",function() {
			var result = confirm("Are you sure you want to delete?");
			if (result) {
				var id  =   $("#category_id").val();
				if(id	!=	'')																																																								 		{
					$.ajax({
						"url":"<?php echo base_url();?>product_page/delete_category_banner_image",
						"type":"POST",
						"data":{
							id :id,
						},
						success:function(data){
							$('.product_img_homepage').css("display","none");
							$('.closing_homeimage').css("display","none");
						}
					});																																																		 		}else{
					alert('Unknown error occured.');
				}
			}
		});
	});
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