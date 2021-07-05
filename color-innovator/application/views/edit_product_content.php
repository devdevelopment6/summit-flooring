<?php $this->load->view('notification'); ?>

<div class="widget-box ui-sortable-handle" id="widget-box-1">
  <div class="widget-header">
    <h5 class="widget-title">Product Contents</h5>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div id="page-wrapper">
        <form class="form-horizontal" id="add_news" action="<?php echo base_url(); ?>manage_home/update_product_content/<?php echo $product['id']; ?>" method="post" enctype="multipart/form-data">
        	 <input type="hidden" name="product_id" id="product_id" value="<?php echo $product['id']; ?>"/>
       		 <div class="form-group">
                <label for="banner_image" class="col-sm-3 control-label">Banner Image :</label>
                <div class="col-sm-8 image-upload">
                    <label for="banner_product_image"><input type="file" name="banner_image" id="banner_image" ></label>
                            <div class="col-md-12"> 
							<?php 	
									$display = $product['banner_image'];	
									if($display != "")
									{
										if($display == "Image.jpg")
										{
									?>
								<div class="col-md-2">
                                    <img class="product_img_banner" src="<?php echo base_url();?>/admin_assets/frontend/include/Image.jpg" width="170px" height="140px" />
                                </div>
                                <?php 
										}
										else
										{
								?>
                                <div class="col-md-2">
                                	<span class="closing_banner">X</span>
                                    <img class="product_img_banner" src="<?php echo base_url();?>uploads/product_category_image/thumbs/<?=$display; ?>" width="100px" height="100px" />
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
                 	<input class="col-sm-8" type="text" id="title" name="title" placeholder="Add Title" value="<?php echo $product['title']; ?>"/>
                </div>
			</div>        																																
          
           <div class="form-group">
                <label for="banner_content_1" class="col-sm-3 control-label"> Content : </label>
                <div class="col-sm-8">
                     <textarea rows="8" id="header_content" name="header_content" class="form-control1"><?php echo $product['header_content']; ?></textarea>
                </div>
			</div>
			 <div class="form-group">
                <label for="banner_content_1" class="col-sm-3 control-label"> Content 2 : </label>
                <div class="col-sm-8">
                     <textarea rows="8" id="product_content2" name="product_content2" class="form-control1"><?php echo $product['product_content2']; ?></textarea>
                </div>
			</div>
			
          
           <div class="form-group">
                <label for="banner_content_1" class="col-sm-3 control-label"> Custom Design Content : </label>
                <div class="col-sm-8">
                     <textarea rows="8" id="custom_design_content" name="custom_design_content" class="form-control1"><?php echo $product['custom_design_content']; ?></textarea>
                </div>
			</div>
			
          
           <div class="form-group">
                <label for="banner_content_1" class="col-sm-3 control-label"> Custom Logo Colors Content : </label>
                <div class="col-sm-8">
                     <textarea rows="8" id="custom_logo_colors_content" name="custom_logo_colors_content" class="form-control1"><?php echo $product['custom_logo_colors_content']; ?></textarea>
                </div>
			</div>
            <div class="form-group">
                <label for="banner_content_1" class="col-sm-3 control-label"> Custom Products Content : </label>
                <div class="col-sm-8">
                     <textarea rows="8" id="custom_products_content" name="custom_products_content" class="form-control1"><?php echo $product['custom_products_content']; ?></textarea>
                </div>
			</div>
			 <div class="form-group">
                <label for="banner_content_1" class="col-sm-3 control-label"> Inquiries Content : </label>
                <div class="col-sm-8">
                     <textarea rows="8" id="inquiries_content" name="inquiries_content" class="form-control1"><?php echo $product['inquiries_content']; ?></textarea>
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
								<option <?php if($product['status']=="1"){echo "selected";}?> value="1">Enable</option>
								<option <?php if($product['status']=="0"){echo "selected";}?> value="0">Disable</option>
							</select>
                        </div>
                    </div>
		 
          <div class="form-group">
            <div class="col-sm-8 col-sm-offset-2">
              <button type="submit" class="btn-yellow btn" name="update">Update Product Content</button>																																 				&nbsp;&nbsp; <a href="<?php echo base_url();?>manage_home/manage_products" class="btn-yellow btn" />Cancel</a>
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
			/*var editor = CKEDITOR.replace( 'product_content',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );*/

			var editor_2 = CKEDITOR.replace( 'header_content',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor_2, '../' );
	
	var custom_design_content = CKEDITOR.replace( 'custom_design_content',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( custom_design_content, '../' );
	var custom_logo_colors_content = CKEDITOR.replace( 'custom_logo_colors_content',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( custom_logo_colors_content, '../' );
var product_content2= CKEDITOR.replace( 'product_content2',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( product_content2, '../' );
	var custom_products_content = CKEDITOR.replace( 'custom_products_content',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( custom_products_content, '../' );
	var inquiries_content =  CKEDITOR.replace( 'inquiries_content',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( inquiries_content, '../' );
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
		var id  =   $("#product_id").val();
		if(id	!=	'')																																																								 		{
			$.ajax({
				"url":"<?php echo base_url();?>manage_home/delete_product_category_banner_image",
				"type":"POST",
				"data":{
					id :id,
					image_id :image_id
				},
				success:function(data){
					//console.log(data);	
																																														 					$('.product_img_banner').css("display","none");
					$('.closing_banner').css("display","none");
				}
			});																																																		 		}else{
				alert('Unknown error occured.');
		}
	  }
	});
	
  });
</script>