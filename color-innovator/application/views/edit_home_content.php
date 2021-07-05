<?php $this->load->view('notification'); ?>

<div class="widget-box ui-sortable-handle" id="widget-box-1">
  <div class="widget-header">
    <h5 class="widget-title">Home Contents</h5>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div id="page-wrapper">
        <form class="form-horizontal" id="add_news" action="<?php echo base_url(); ?>manage_home/update_home_content/<?php echo $home['id']; ?>" method="post" enctype="multipart/form-data">
       			<input type="hidden" id="home_id" name="home_id" value="<?php echo $home['id'];?>" />
         <div class="form-group">
            <label for="banner_image" class="col-sm-3 control-label">Banner Image :</label>
            <div class="col-sm-8 image-upload">
                <label for="banner_image"><input type="file" name="banner_image" id="banner_image" ></label>
                <div class="col-md-12"> 
					<?php 	
                            $display = $home['banner_image'];	
                            if($display != "")
                            {
                                if($display == "Image.jpg")
                                {
                            ?>
                                    <div class="col-md-2">
                            <img class="banner_img_homepage" src="<?php echo base_url();?>admin_assets/frontend/include/Image.jpg" width="170px" height="140px" />
                        </div>
                        <?php 
                                }
                                else
                                {
                        ?>
                        <div class="col-md-2">
                            <span class="closing_bannerimage">X</span>
                            <img class="banner_img_homepage" src="<?php echo base_url();?>uploads/home_banner_image/thumbs/<?=$display; ?>" width="100px" height="100px" />
                        </div>
                        <?php 
                                }
                            }
                        ?>

                   </div> <br>
            </div>
		 </div>
            	
         <div class="form-group">
            <label for="banner_image" class="col-sm-3 control-label">Banner Title Image :</label>
            <div class="col-sm-8 image-upload">
                <label for="banner_title_image"><input type="file" name="banner_title_image" id="banner_title_image" ></label>
                <div class="col-md-12"> 
					<?php 	
                            $display = $home['banner_title_image'];	
                            if($display != "")
                            {
                                if($display == "Image.jpg")
                                {
                            ?>
                                    <div class="col-md-2">
                            <img class="banner_img_title_homepage" src="<?php echo base_url();?>admin_assets/frontend/include/Image.jpg" width="170px" height="140px" />
                        </div>
                        <?php 
                                }
                                else
                                {
                        ?>
                        <div class="col-md-2">
                            <span class="closing_banner_title_image">X</span>
                            <img class="banner_img_title_homepage" src="<?php echo base_url();?>uploads/home_banner_title_image/thumbs/<?=$display; ?>" width="100px" height="100px" />
                        </div>
                        <?php 
                                }
                            }
                        ?>

                   </div> <br>
            </div>
		 </div>
         																														
		  <div class="form-group">
            <label for="author" class="col-sm-3 control-label">Top Content title : </label>
            <div class="col-sm-8">
              <input class="col-sm-8" type="text" id="top_content_title" name="top_content_title" placeholder="Write Title" value="<?php echo $home['top_content_title']; ?>"/>
            </div>
          </div>
          
           <div class="form-group">
                <label for="banner_content_1" class="col-sm-3 control-label">Top Content : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="top_content" name="top_content" class="form-control1"><?php echo $home['top_content']; ?></textarea>
                </div>
			</div>
		  
          <div class="form-group">
            <label for="author" class="col-sm-3 control-label">Middle Content title 1 : </label>
            <div class="col-sm-8">
              <input class="col-sm-8" type="text" id="middle_content_title_1" name="middle_content_title_1" placeholder="Write Title" value="<?php echo $home['middle_content_title_1']; ?>"/>
            </div>
          </div>
          
           <div class="form-group">
                <label for="banner_content_2" class="col-sm-3 control-label">Middle Content 1 : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="middle_content_1" name="middle_content_1" class="form-control1"><?php echo $home['middle_content_1']; ?></textarea>
                </div>
			</div>
            

			 <div class="form-group">
                <label for="banner_content_title_3" class="col-sm-3 control-label">Middle Content title 2 : </label>
                <div class="col-sm-8">
	                <input class="col-sm-8" type="text" id="middle_content_title_2" name="middle_content_title_2" placeholder="Write Title" value="<?php echo $home['middle_content_title_2']; ?>"/>
                </div>
          	</div>

		   <div class="form-group">
                <label for="banner_content_3" class="col-sm-3 control-label">Middle Content 2 : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="middle_content_2" name="middle_content_2" class="form-control1"><?php echo $home['middle_content_2']; ?></textarea>
                </div>
			</div>
                 
             <div class="form-group">
                <label for="banner_content_title_4" class="col-sm-3 control-label">Middle Content title 3 : </label>
                <div class="col-sm-8">
                  <input class="col-sm-8" type="text" id="middle_content_title_3" name="middle_content_title_3" placeholder="Write Title" value="<?php echo $home['middle_content_title_3']; ?>"/>
                </div>
          	 </div>
               
			  <div class="form-group">
                    <label for="banner_content_4" class="col-sm-3 control-label">Middle Content 3 : </label>
                    <div class="col-sm-8">
                        <textarea rows="8" id="middle_content_3" name="middle_content_3" class="form-control1"><?php echo $home['middle_content_3']; ?></textarea>
                    </div>
				</div>
                
                <div class="form-group">
                <label for="banner_content_title_5" class="col-sm-3 control-label">Case Study Content title : </label>
                <div class="col-sm-8">
                  <input class="col-sm-8" type="text" id="bottom_content_title" name="bottom_content_title" placeholder="Write Title" value="<?php echo $home['bottom_content_title']; ?>"/>
                </div>
          	 </div>
               
			  <div class="form-group">
                    <label for="banner_content_5" class="col-sm-3 control-label">Case Study Content : </label>
                    <div class="col-sm-8">
                        <textarea rows="8" id="bottom_content" name="bottom_content" class="form-control1"><?php echo $home['bottom_content']; ?></textarea>
                    </div>
				</div>
                
                <div class="form-group">
                    <label for="bottom_content_6" class="col-sm-3 control-label">Bottom Content Title 2: </label>
                    <div class="col-sm-8">
                        <textarea rows="8" id="testimonial_content" name="testimonial_content" class="form-control1"><?php echo $home['testimonial_content']; ?></textarea>
                    </div>
				</div>
                
                 <div class="form-group">
                <label for="bottom_info_title" class="col-sm-3 control-label">Bottom Information Title 2 : </label>
                <div class="col-sm-8">
                  <input class="col-sm-8" type="text" id="bottom_info_title" name="bottom_info_title" placeholder="Write Title" value="<?php echo $home['bottom_info_title']; ?>"/>
                </div>
          	 </div>
             
                 <div class="form-group">
                    <label for="bottom_content_7" class="col-sm-3 control-label">Bottom Information Content 2: </label>
                    <div class="col-sm-8">
                        <textarea rows="8" id="bottom_info_content" name="bottom_info_content" class="form-control1"><?php echo $home['bottom_info_content']; ?></textarea>
                    </div>
				</div>
            
            <div class="form-group">
                        <label class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-6">
                            <select class="col-sm-6" name="status" id="status">
								<option value="">Select Status</option>
								<option <?php if($home['status']=="1"){echo "selected";}?> value="1">Enable</option>
								<option <?php if($home['status']=="0"){echo "selected";}?> value="0">Disable</option>
							</select>
                        </div>
                    </div>

          <div class="form-group">
            <div class="col-sm-8 col-sm-offset-2">
              <button type="submit" class="btn-yellow btn" name="update">Update Content</button>																																 				&nbsp;&nbsp; <a href="<?php echo base_url();?>manage_home/manage_homepage" class="btn-yellow btn" />Cancel</a>
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

			var editor_7 = CKEDITOR.replace( 'testimonial_content',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );
			
				var editor_8 = CKEDITOR.replace( 'bottom_info_content',{
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
		top_content_title: {
   					required:true
     		},
     	middle_content_title_1: {
   					required:true
     		},
		middle_content_title_2: {
   					required:true
     		},	
		middle_content_title_3: {
				required:true
		},	
		bottom_content_title: {
				required:true
		},																																																 		status: {																																																					 					required:true																																																									 			}
 	 },
 	messages: 																																																								 	{
		top_content_title: {
	   				required:"Top Title is required."
		 	},
	   	middle_content_title_1: {
	   				required:"Middle Content Title 1 is required."
		 	},
		middle_content_title_2: {
   					required:"Middle Content Title 2 is required."
     		},
		middle_content_title_3: {
				required:"Middle Content Title 3 is required."
		},
		bottom_content_title: {
				required:"Bottom Content Title is required."
		},
	  	status:	{
	   				required:"Status is required."
		 	},
    },
   });
   
   $(".closing_bannerimage").on("click",function(){ 
	  var result = confirm("Are you sure you want to delete?");
	  alert(result);
	  if (result) {	
		var id  =   $("#home_id").val();
		if(id	!=	'')																																																								 		{
			$.ajax({
				"url":"<?php echo base_url();?>manage_home/delete_banner_image",
				"type":"POST",
				"data":{
					id :id,
				},
				success:function(data){
																																														 					$('.banner_img_homepage').css("display","none");
					$('.closing_bannerimage').css("display","none");
				}
			});																																																		 		}else{
				alert('Unknown error occured.');
		}
	  }
	});
	
  });
</script>