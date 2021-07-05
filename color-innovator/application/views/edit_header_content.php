<?php $this->load->view('notification'); ?>

<div class="widget-box ui-sortable-handle" id="widget-box-1">
  <div class="widget-header">
    <h5 class="widget-title">Contents</h5>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div id="page-wrapper">
        <form class="form-horizontal" id="add_news" action="<?php echo base_url(); ?>manage_home/update_header_content/<?php echo $header_content['id']; ?>" method="post" enctype="multipart/form-data">
       																																		
          <div class="form-group">
            <label for="news_title" class="col-sm-3 control-label"> Header Content Title : </label>
            <div class="col-sm-8">
              <input class="col-sm-8" type="text" id="header_title" name="header_title" placeholder="Header Content Title" value="<?php echo $header_content['header_title']; ?>"/>
            </div>
          </div>
          
          <div class="form-group">
                <label for="header_content" class="col-sm-3 control-label">Header Short Content : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="header_short_content" name="header_short_content" class="form-control1"><?php echo $header_content['header_short_content']; ?></textarea>
                </div>
			</div>
            
           <div class="form-group">
                <label for="header_content" class="col-sm-3 control-label">Header Content : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="header_content" name="header_content" class="form-control1"><?php echo $header_content['header_content']; ?></textarea>
                </div>
			</div>
            <div class="form-group">
                        <label class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-6">
                            <select class="col-sm-6" name="status" id="status">
								<option value="">Select Status</option>
								<option <?php if($header_content['status']=="1"){echo "selected";}?> value="1">Enable</option>
								<option <?php if($header_content['status']=="0"){echo "selected";}?> value="0">Disable</option>
							</select>
                        </div>
                    </div>
		  

          <div class="form-group">
            <div class="col-sm-8 col-sm-offset-2">
              <button type="submit" class="btn-yellow btn" name="update">Update Content</button>																																 				&nbsp;&nbsp; <a href="<?php echo base_url();?>manage_home/manage_header" class="btn-yellow btn" />Cancel</a>
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
var editor = CKEDITOR.replace( 'header_content',{
    filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );

var editor_2 = CKEDITOR.replace( 'header_short_content',{
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
		header_title: {
   					required:true
     		},
     	header_short_content: {
   					required:true
     		},
		status: {
   					required:true
     		},
 	 },
 	messages: 																																																								 	{
		header_title: {
	   				required:"Header Title is required."
		 	},
	   	header_short_content: {
	   				required:"Header Content is required."
		 	},
	  	status: {
	   				required:"Status is required."
		 	},

    },
   });
  });
</script>