<?php $this->load->view('notification'); ?>

<div class="widget-box ui-sortable-handle" id="widget-box-1">
  <div class="widget-header">
    <h5 class="widget-title">Product Contents</h5>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div id="page-wrapper">
        <form class="form-horizontal" id="add_news" action="<?php echo base_url(); ?>products/insert_products/" method="post" enctype="multipart/form-data">
			
              <div class="form-group">
                <label for="product_name" class="col-sm-3 control-label"> Product Name : </label>
                    <div class="col-sm-8">
                      <input class="col-sm-8" type="text" id="product_name" name="product_name" placeholder="Add Product Name"/>
                    </div>
              </div>	
				
             <div class="form-group">
                <label for="head_line" class="col-sm-3 control-label"> HeadLine : </label>
                    <div class="col-sm-8">
                      <input class="col-sm-8" type="text" id="product_head_line" name="head_line" placeholder="Add Head Line" value=""/>
                    </div>
             </div>
              
            <div class="form-group">
                <label for="header_content" class="col-sm-3 control-label">Header Content : </label>
                <div class="col-sm-8">
                     <textarea rows="8" id="product_header_content" name="product_header_content" class="form-control1"></textarea>
                </div>
			</div>
              
            <div class="form-group">
                <label for="banner_product_image" class="col-sm-3 control-label">Banner Image :</label>
                <div class="col-sm-8 image-upload">
                    <label for="banner_product_image"><input type="file" name="banner_product_image" id="banner_product_image" ></label>
                </div>
		 	</div>
            
             <div class="form-group">
                        <label class="col-sm-3 control-label">Category</label>
                        <div class="col-sm-6">
                            <select class="col-sm-6" name="product_category" id="product_category">
								<option value="">Select Category</option>
                                <?php foreach($category as $c)
									{
								 ?>
								<option value="<?php echo $c['id'];?>"><?php echo $c['name'];?></option>
									<?php } ?>
							</select>
                        </div>
                        
                    </div>
                    
             <div class="form-group">
                <label for="homepage_product_image" class="col-sm-3 control-label">Home Page Image :</label>
                <div class="col-sm-8 image-upload">
                    <label for="homepage_product_image"><input type="file" name="homepage_product_image" id="homepage_product_image" ></label>
                </div>
		 	</div>
            
             <div class="form-group">
                <label for="homepage_title_product_image" class="col-sm-3 control-label">Home Page Image Title:</label>
                <div class="col-sm-8 image-upload">
                    <label for="homepage_title_product_image"><input type="file" name="homepage_title_product_image" id="homepage_title_product_image" ></label>
                </div>
		 	</div>
                    
            
                    
            <div class="form-group">
                <label for="main_product_image" class="col-sm-3 control-label">Header Image :</label>
                <div class="col-sm-8 image-upload">
                    <label for="main_product_image"><input type="file" name="main_product_image" id="main_product_image" ></label>
                </div>
		 	</div>
            
            <div class="form-group">
                <label for="main_product_image_mobile" class="col-sm-3 control-label">Mobile Header Image :</label>
                <div class="col-sm-8 image-upload">
                    <label for="main_product_image_mobile"><input type="file" name="main_product_image_mobile" id="main_product_image_mobile" ></label>
                </div>
		 	</div>
            
            <div class="form-group">
                <label for="section_2_title" class="col-sm-3 control-label"> Section 2 Title: </label>
                    <div class="col-sm-8">
                      <input class="col-sm-8" type="text" id="section_2_title" name="section_2_title" placeholder="Add Title" value="<?php echo $products['section_2_title'];?>"/>
                    </div>
             </div>
             
             <div class="form-group">
                <label for="section_2_content" class="col-sm-3 control-label">Section 2 Content : </label>
                <div class="col-sm-8">
                     <textarea rows="8" id="section_2_content" name="section_2_content" class="form-control1"><?php echo $products['section_2_content'];?></textarea>
                </div>
			</div>
            
              <div class="form-group">
                <label for="mid_content_title" class="col-sm-3 control-label"> Middle Content Title: </label>
                    <div class="col-sm-8">
                      <input class="col-sm-8" type="text" id="mid_content_title" name="mid_content_title" placeholder="Add Title" value="<?php echo $products['mid_content_title'];?>"/>
                    </div>
             </div>
                        
            <div class="form-group">
                <label for="middle_content" class="col-sm-3 control-label">Middle Content : </label>
                <div class="col-sm-8">
                     <textarea rows="8" id="middle_content" name="middle_content" class="form-control1"><?php echo $products['middle_content'];?></textarea>
                </div>
		    </div>
                
            <?php /*?><div class="form-group">
                <label for="short_description" class="col-sm-3 control-label">Short Description : </label>
                <div class="col-sm-8">
                     <textarea rows="8" id="short_description" name="short_description" class="form-control1"></textarea>
                </div>
			</div>
                 
            <div class="form-group">
                <label for="description" class="col-sm-3 control-label">Description : </label>
                <div class="col-sm-8">
                     <textarea rows="8" id="description" name="description" class="form-control1"></textarea>
                </div>
			</div><?php */?>
            
           <div class="form-group">
                <label for="features" class="col-sm-3 control-label">Features : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="features" name="features" class="form-control1"></textarea>
                </div>
			</div>
            
            <div class="form-group">
                <label for="best_applications" class="col-sm-3 control-label">Best Applications : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="best_applications" name="best_applications" class="form-control1"></textarea>
                </div>
			</div>
            
            <div class="form-group">
                <label for="measurement" class="col-sm-3 control-label"> Measurement: </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="measurement" name="measurement" class="form-control1"></textarea>
                </div>
			</div>
             <div class="form-group">
                <label for="document_title_1" class="col-sm-3 control-label"> Document Title 1: </label>
                <div class="col-sm-8">
                  	<input type="text" name="document_title_1" id="document_title_1">
                </div>
            </div>	
            <div class="form-group">
                <label for="download_link_1" class="col-sm-3 control-label">Document Download Link 1: </label>
                <div class="col-sm-8">
                  	<input type="file" name="download_link_1" id="download_link_1">
                </div>
            </div>
            
            <div class="form-group">
                <label for="document_title_2" class="col-sm-3 control-label"> Document Title 2: </label>
                <div class="col-sm-8">
                  	<input type="text" name="document_title_2" id="document_title_2">
                </div>
            </div>	
             <div class="form-group">
                <label for="download_link_2" class="col-sm-3 control-label">Document Download Link 2: </label>
                <div class="col-sm-8">
                  	<input type="file" name="download_link_2" id="download_link_2">
                </div>
            </div>
          
            <div class="form-group">
                <label for="document_title_3" class="col-sm-3 control-label"> Document Title 3: </label>
                <div class="col-sm-8">
                  	<input type="text" name="document_title_3" id="document_title_3">
                </div>
            </div>	
             <div class="form-group">
                <label for="download_link_3" class="col-sm-3 control-label">Document Download Link 3: </label>
                <div class="col-sm-8">
                  	<input type="file" name="download_link_3" id="download_link_3">
                </div>
            </div>
          
            <div class="form-group">
                <label for="document_title_4" class="col-sm-3 control-label"> Document Title 4: </label>
                <div class="col-sm-8">
                  	<input type="text" name="document_title_4" id="document_title_4">
                </div>
            </div>	
            <div class="form-group">
                <label for="download_link_4" class="col-sm-3 control-label">Document Download Link 4: </label>
                <div class="col-sm-8">
                  	<input type="file" name="download_link_4" id="download_link_4">
                </div>
            </div>
          
            <div class="form-group">
                <label for="document_title_5" class="col-sm-3 control-label"> Document Title 5: </label>
                <div class="col-sm-8">
                  	<input type="text" name="document_title_5" id="document_title_5">
                </div>
            </div>	
            <div class="form-group">
                <label for="download_link_5" class="col-sm-3 control-label">Document Download Link 5: </label>
                <div class="col-sm-8">
                  	<input type="file" name="download_link_5" id="download_link_5">
                </div>
            </div>
          
             <div class="form-group">
                <label for="news_title" class="col-sm-3 control-label"> Colors : </label>
                <div class="col-sm-8">
                  	<textarea rows="8" id="gallery_link" name="gallery_link" class="form-control1"></textarea>
                </div>
            </div>
          
             <div class="form-group">
                <label for="gallery_image" class="col-sm-3 control-label">Gallery Image :</label>
                <div class="col-sm-8 image-upload">
                    <label for="gallery_image"><input type="file" name="gallery_image[]" multiple id="gallery_image" ></label>
                </div>
		 	</div>
              
          	<div class="form-group">
                <label for="head_line" class="col-sm-3 control-label"> Video Link 1 : </label>
                    <div class="col-sm-8">
                      <input class="col-sm-8" type="text" id="video_link_1" name="video_link_1" placeholder="Add Link" value="<?php echo $products['video_link_1'];?>"/>
                    </div>
              </div>
              <div class="form-group">
                <label for="head_line" class="col-sm-3 control-label"> Video Link 2 : </label>
                    <div class="col-sm-8">
                      <input class="col-sm-8" type="text" id="video_link_2" name="video_link_2" placeholder="Add Link" value="<?php echo $products['video_link_2'];?>"/>
                    </div>
              </div>
              <div class="form-group">
                <label for="head_line" class="col-sm-3 control-label"> Video Link 3 : </label>
                    <div class="col-sm-8">
                      <input class="col-sm-8" type="text" id="video_link_3" name="video_link_3" placeholder="Add Link" value="<?php echo $products['video_link_3'];?>"/>
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
              <button type="submit" class="btn-yellow btn" name="update">Add Product</button>																																 				&nbsp;&nbsp; <a href="<?php echo base_url();?>products" class="btn-yellow btn" />Cancel</a>
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
			/*var editor = CKEDITOR.replace( 'description',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );*/
			
			var editor_2 = CKEDITOR.replace( 'features',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor_2, '../' );
			
			var editor_3 = CKEDITOR.replace( 'best_applications',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor_3, '../' );
			
			var editor_4 = CKEDITOR.replace( 'measurement',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor_4, '../' );
			
			/*var editor_5 = CKEDITOR.replace( 'short_description',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );*/

			var editor_7 = CKEDITOR.replace( 'gallery_link',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor_7, '../' );
			
			var editor_8 = CKEDITOR.replace( 'product_header_content',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor_8, '../' ); 
			
			var editor_9 = CKEDITOR.replace( 'section_2_content',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor_9, '../' );
			
			var editor = CKEDITOR.replace( 'middle_content',{
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
		product_name: {
   					required:true
     		},
		product_category: {																																																					 					required:true																																																									 			},																																														 		status: {																																																					 					required:true																																																									 			}
 	 },
 	messages: 																																																								 	{
		product_name: {
	   				required:"Product Name is required."
		 	},
		product_category:	{
	   				required:"Product Category is required."
		 	},
	  	status:	{
	   				required:"Status is required."
		 	},
    },
   });
  });
</script>