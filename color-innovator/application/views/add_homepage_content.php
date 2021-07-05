<?php $this->load->view('notification'); ?>

<div class="widget-box ui-sortable-handle" id="widget-box-1">
  <div class="widget-header">
    <h5 class="widget-title">Contents</h5>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div id="page-wrapper">
        <form class="form-horizontal" id="add_news" action="<?php echo base_url(); ?>manage_home/add_homepage_content/" method="post" enctype="multipart/form-data">
       																																		
		  <div class="form-group">
            <label for="author" class="col-sm-3 control-label">Top Content title : </label>
            <div class="col-sm-8">
              <input class="col-sm-8" type="text" id="top_content_title" name="top_content_title" placeholder="Write Title" />
            </div>
          </div>
          
           <div class="form-group">
                <label for="banner_content_1" class="col-sm-3 control-label">Top Content : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="top_content" name="top_content" class="form-control1"></textarea>
                </div>
			</div>
		  
          <div class="form-group">
            <label for="author" class="col-sm-3 control-label">Middle Content title 1 : </label>
            <div class="col-sm-8">
              <input class="col-sm-8" type="text" id="middle_content_title_1" name="middle_content_title_1" placeholder="Write Title" />
            </div>
          </div>
          
           <div class="form-group">
                <label for="banner_content_2" class="col-sm-3 control-label">Middle Content 1 : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="middle_content_1" name="middle_content_1" class="form-control1"></textarea>
                </div>
			</div>
            

			 <div class="form-group">
                <label for="banner_content_title_3" class="col-sm-3 control-label">Middle Content title 2 : </label>
                <div class="col-sm-8">
                  <input class="col-sm-8" type="text" id="middle_content_title_2" name="middle_content_title_2" placeholder="Write Title" />
                </div>
          	</div>

		   <div class="form-group">
                <label for="banner_content_3" class="col-sm-3 control-label">Middle Content 2 : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="middle_content_2" name="middle_content_2" class="form-control1"></textarea>
                </div>
			</div>
                 
             <div class="form-group">
                <label for="banner_content_title_4" class="col-sm-3 control-label">Middle Content title 3 : </label>
                <div class="col-sm-8">
                  <input class="col-sm-8" type="text" id="middle_content_title_3" name="middle_content_title_3" placeholder="Write Title" />
                </div>
          	 </div>
               
			  <div class="form-group">
                    <label for="banner_content_4" class="col-sm-3 control-label">Middle Content 3 : </label>
                    <div class="col-sm-8">
                        <textarea rows="8" id="middle_content_3" name="middle_content_3" class="form-control1"></textarea>
                    </div>
				</div>
                
                <div class="form-group">
                <label for="banner_content_title_5" class="col-sm-3 control-label">Bottom Content title : </label>
                <div class="col-sm-8">
                  <input class="col-sm-8" type="text" id="bottom_content_title" name="bottom_content_title" placeholder="Write Title" />
                </div>
          	 </div>
               
			  <div class="form-group">
                    <label for="banner_content_5" class="col-sm-3 control-label">Bottom Content : </label>
                    <div class="col-sm-8">
                        <textarea rows="8" id="bottom_content" name="bottom_content" class="form-control1"></textarea>
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
			var editor = CKEDITOR.replace( 'top_content',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );
			
			var editor_2 = CKEDITOR.replace( 'middle_content_1',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );
			
			var editor_3 = CKEDITOR.replace( 'middle_content_2',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );
			
			var editor_4 = CKEDITOR.replace( 'middle_content_3',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );
			
			var editor_5 = CKEDITOR.replace( 'bottom_content',{
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