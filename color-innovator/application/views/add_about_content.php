<?php $this->load->view('notification'); ?>

<div class="widget-box ui-sortable-handle" id="widget-box-1">
  <div class="widget-header">
    <h5 class="widget-title">Contents</h5>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div id="page-wrapper">
        <form class="form-horizontal" id="add_news" action="<?php echo base_url(); ?>manage_home/add_content/" method="post" enctype="multipart/form-data">
       																																		
		  <div class="form-group">
            <label for="author" class="col-sm-3 control-label">Banner Content title 1 : </label>
            <div class="col-sm-8">
              <input class="col-sm-8" type="text" id="banner_content_title_1" name="banner_content_title_1" placeholder="Write Title" />
            </div>
          </div>
          
           <div class="form-group">
                <label for="banner_content_1" class="col-sm-3 control-label">Banner Content 1 : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="banner_content_1" name="banner_content_1" class="form-control1"></textarea>
                </div>
			</div>
		  
          <div class="form-group">
            <label for="author" class="col-sm-3 control-label">Banner Content title 2 : </label>
            <div class="col-sm-8">
              <input class="col-sm-8" type="text" id="banner_content_title_2" name="banner_content_title_2" placeholder="Write Title" />
            </div>
          </div>
          
           <div class="form-group">
                <label for="banner_content_2" class="col-sm-3 control-label">>Banner Content 2 : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="banner_content_2" name="banner_content_2" class="form-control1"></textarea>
                </div>
			</div>
            

			 <div class="form-group">
                <label for="banner_content_title_3" class="col-sm-3 control-label">Banner Content title 3 : </label>
                <div class="col-sm-8">
                  <input class="col-sm-8" type="text" id="banner_content_title_3" name="banner_content_title_3" placeholder="Write Title" />
                </div>
          	</div>

		   <div class="form-group">
                <label for="banner_content_3" class="col-sm-3 control-label">Banner Content 3 : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="banner_content_3" name="banner_content_3" class="form-control1"></textarea>
                </div>
			</div>
                 
             <div class="form-group">
                <label for="banner_content_title_4" class="col-sm-3 control-label">Banner Content title 4 : </label>
                <div class="col-sm-8">
                  <input class="col-sm-8" type="text" id="banner_content_title_4" name="banner_content_title_4" placeholder="Write Title" />
                </div>
          	 </div>
               
			  <div class="form-group">
                    <label for="banner_content_4" class="col-sm-3 control-label">Banner Content 4 : </label>
                    <div class="col-sm-8">
                        <textarea rows="8" id="banner_content_4" name="banner_content_4" class="form-control1"></textarea>
                    </div>
				</div>
                
                <div class="form-group">
                <label for="banner_content_title_5" class="col-sm-3 control-label">Banner Content title 5 : </label>
                <div class="col-sm-8">
                  <input class="col-sm-8" type="text" id="banner_content_title_5" name="banner_content_title_5" placeholder="Write Title" />
                </div>
          	 </div>
               
			  <div class="form-group">
                    <label for="banner_content_5" class="col-sm-3 control-label">Banner Content 5 : </label>
                    <div class="col-sm-8">
                        <textarea rows="8" id="banner_content_5" name="banner_content_5" class="form-control1"></textarea>
                    </div>
				</div>
            
            	<div class="form-group">
                    <label for="banner_content_4" class="col-sm-3 control-label">Community Title : </label>
                    <div class="col-sm-8">
                        <input class="col-sm-8" type="text" id="community_title" name="community_title" placeholder="Write Title" value="<?php echo $content['community_title']; ?>"/>
                    </div>
				</div>
                
                 <div class="form-group">
                    <label for="banner_content_5" class="col-sm-3 control-label">Community Short Content : </label>
                    <div class="col-sm-8">
                        <textarea rows="8" id="community_short_content" name="community_short_content" class="form-control1"><?php echo $content['community_short_content']; ?></textarea>
                    </div>
				</div>
                
                 <div class="form-group">
                    <label for="banner_content_5" class="col-sm-3 control-label">Community Content : </label>
                    <div class="col-sm-8">
                        <textarea rows="8" id="community_content" name="community_content" class="form-control1"><?php echo $content['community_involvement_content']; ?></textarea>
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
              <button type="submit" class="btn-yellow btn" name="update">Add Content</button>																																 				&nbsp;&nbsp; <a href="<?php echo base_url();?>manage_home/manage_about" class="btn-yellow btn" />Cancel</a>
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
			var editor = CKEDITOR.replace( 'banner_content_1',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );
			
			var editor_2 = CKEDITOR.replace( 'banner_content_2',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );
			
			var editor_3 = CKEDITOR.replace( 'banner_content_3',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );
			
			var editor_4 = CKEDITOR.replace( 'banner_content_4',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );
			
			var editor_5 = CKEDITOR.replace( 'banner_content_5',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );
			
			var editor_7 = CKEDITOR.replace( 'community_content',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );
			
			var editor_8 = CKEDITOR.replace( 'community_short_content',{
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
	 
/*	 $('#publish_date').datepicker({
           todayBtn: "linked",
            format: 'dd-mm-yyyy'          
        });
		
  $("#add_news").validate({
    rules:																																																								 	 {
		news_title: {
   					required:true
     		},
     	author: {
   					required:true
     		},
		publish_date: {
   					required:true
     		},																																																	 		status: {																																																					 					required:true																																																									 			}
 	 },
 	messages: 																																																								 	{
		news_title: {
	   				required:"News Title is required."
		 	},
	   	author: {
	   				required:"News Author is required."
		 	},
		publish_date: {
   					required:"Publish Date is required."
     		},
	  	status:	{
	   				required:"Status is required."
		 	},
    },
   });*/
  });
</script>