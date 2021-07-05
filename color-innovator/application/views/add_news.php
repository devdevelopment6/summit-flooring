<?php $this->load->view('notification'); ?>

<div class="widget-box ui-sortable-handle" id="widget-box-1">
  <div class="widget-header">
    <h5 class="widget-title">News</h5>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div id="page-wrapper">
        <form class="form-horizontal" id="add_news" action="<?php echo base_url(); ?>manage_home/add_news/" method="post" enctype="multipart/form-data">
       																																		
          <div class="form-group">
            <label for="news_title" class="col-sm-3 control-label"> News Title : </label>
            <div class="col-sm-8">
              <input class="col-sm-8" type="text" id="news_title" name="news_title" placeholder="News Title"/>
            </div>
          </div>	
		  <div class="form-group">
            <label for="author" class="col-sm-3 control-label">News Author : </label>
            <div class="col-sm-8">
              <input class="col-sm-8" type="text" id="author" name="author" placeholder="Author Name" />
            </div>
          </div>
		  
		  
          <div class="form-group ">
            <label for="branded_name" class="col-sm-3 control-label">Publish Date : </label>
            <div class="col-sm-8" id="input-date">
              <input class="col-sm-8" type="text" id="publish_date" name="publish_date" placeholder="Publish Date" />
            </div>
          </div>

          	<div class="form-group">
						<label class="col-sm-3 control-label">Images :</label>
						<div class="col-sm-8 image-upload">
							<label><input type="file" name="images[]" id="images" multiple></label><br>
						</div>
					</div>

		   <div class="form-group">
                <label for="short_content" class="col-sm-3 control-label">Short Content : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="short_content" name="short_content" class="form-control1"></textarea>
                </div>
			</div>
                    
			  <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">News Content : </label>
                    <div class="col-sm-8">
                        <textarea rows="8" id="news_content" name="news_content" class="form-control1"></textarea>
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
           	  <input type="hidden" id="model_id" name="model_id" value="" />
              <button type="submit" class="btn-yellow btn" name="update">Add News</button>																																 				&nbsp;&nbsp; <a href="<?php echo base_url();?>manage_home/manage_news" class="btn-yellow btn" />Cancel</a>
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
var editor = CKEDITOR.replace( 'short_content',{
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
			var editor = CKEDITOR.replace( 'news_content',{
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
	 
	 $('#publish_date').datepicker({
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
   });
  });
</script>