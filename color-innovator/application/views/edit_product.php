<?php $this->load->view('notification'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>
<link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css" />
<div class="widget-box ui-sortable-handle" id="widget-box-1">
  <div class="widget-header">
    <h5 class="widget-title">Product Contents</h5>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div id="page-wrapper">
        <form class="form-horizontal" id="add_news" action="<?php echo base_url(); ?>products/update_products/<?php echo $products['id']; ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="product_name" class="col-sm-3 control-label"> Product Name : </label>
                    <div class="col-sm-8">
                      <input class="col-sm-8" type="text" id="product_name" name="product_name" placeholder="Add Product Name" value="<?php echo $products['product_name'];?>"/>
                    </div>
              </div>	
          
          	<div class="form-group">
                <label for="head_line" class="col-sm-3 control-label"> HeadLine : </label>
                    <div class="col-sm-8">
                      <input class="col-sm-8" type="text" id="head_line" name="head_line" placeholder="Add Head Line" value="<?php echo $products['head_line'];?>"/>
                    </div>
              </div>
	        <div class="form-group">
		        <label for="product_url" class="col-sm-3 control-label"> Product URL : </label>
		        <div class="col-sm-8">
			        <div class="col-sm-8">
			        <label for="product_url"> http://oneco.ca/~summit-flooring/Color_innovator/front_end/products/ </label>
				        </div>
			        <div class="col-sm-4">
			        <input type="text" id="product_url" name="product_url" placeholder="Add product url" value="<?php echo $products['product_url'];?>"/>
				        </div>
		        </div>
	        </div>
          
          	<?php /*?><div class="form-group">
                <label for="sub_heading" class="col-sm-3 control-label"> Sub Heading : </label>
                    <div class="col-sm-8">
                      <input class="col-sm-8" type="text" id="sub_heading" name="sub_heading" placeholder="Add Sub Heading" value="<?php echo $products['sub_heading'];?>"/>
                    </div>
             </div><?php */?>
             
             <div class="form-group">
                <label for="header_content" class="col-sm-3 control-label">Short Content : </label>
                <div class="col-sm-8">
                     <textarea rows="8" id="product_header_content" name="product_header_content" class="form-control1"><?php echo $products['product_header_content'];?></textarea>
                </div>
			</div>
                    
             <div class="form-group">
                <label for="banner_product_image" class="col-sm-3 control-label">Banner Image :</label>
                <div class="col-sm-8 image-upload">
                    <label for="banner_product_image"><input type="file" name="banner_product_image" id="banner_product_image" ></label>
                            <div class="col-md-12"> 
							<?php 	
									$display = $products['banner_product_image'];	
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
                                    <img class="product_img_banner" src="<?php echo base_url();?>uploads/products_banner/thumbs/<?=$display; ?>" width="100px" height="100px" />
                                </div>
                                <?php 
										}
									}
								?>

                           </div> <br>
                </div>
		 	</div>
                         
             <div class="form-group">
                        <label class="col-sm-3 control-label">Category :</label>
                        <div class="col-sm-6">
                            <select class="col-sm-6" name="product_category" id="product_category">
								<option value="">Select Category</option>
                                <?php foreach($category as $c)
									{
								 ?>
								<option value="<?php echo $c['id'];?>"  <?php if($c['id']==$products['product_category']){echo "selected";}?>><?php echo $c['name'];?></option>
									<?php } ?>
							</select>
                        </div>
                    </div>
                      
            <div class="form-group">
                <label for="homepage_product_image" class="col-sm-3 control-label">Home Page Image :</label>
                <div class="col-sm-8 image-upload">
                    <label for="homepage_product_image"><input type="file" name="homepage_product_image" id="homepage_product_image" ></label>
                     <div class="col-md-12"> 
							<?php 	
									$display = $products['homepage_product_image'];	
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
                                    <img class="product_img_homepage" src="<?php echo base_url();?>uploads/homepage_products_image/thumbs/<?=$display; ?>" width="100px" height="100px" />
                                </div>
                                <?php 
										}
									}
								?>

                           </div> <br>
                </div>
		 	</div>
            
             <div class="form-group">
                <label for="homepage_title_product_image" class="col-sm-3 control-label">Home Page Image Title:</label>
                <div class="col-sm-8 image-upload">
                    <label for="homepage_title_product_image"><input type="file" name="homepage_title_product_image" id="homepage_title_product_image" ></label>
                    <div class="col-md-12"> 
							<?php 	
									$display = $products['homepage_title_product_image'];	
									if($display != "")
									{
										if($display == "Image.jpg")
										{
									?>
											<div class="col-md-2">
                                    <img class="product_img_home_title" src="<?php echo base_url();?>/admin_assets/frontend/include/Image.jpg" width="170px" height="140px" />
                                </div>
                                <?php 
										}
										else
										{
								?>
                                <div class="col-md-2">
                                	<span class="closing_hometitle">X</span>
                                    <img class="product_img_home_title" src="<?php echo base_url();?>uploads/homepage_title_products_image/thumbs/<?=$display; ?>" width="100px" height="100px" />
                                </div>
                                <?php 
										}
									}
								?>

                           </div> <br>
                </div>
		 	</div>
                    
            <div class="form-group">
			<label for="main_product_image" class="col-sm-3 control-label">Header Image :</label>
			<div class="col-sm-8 image-upload">
				<label for="main_product_image"><input type="file" name="main_product_image" id="main_product_image" ></label>
                <div class="col-md-12"> 
							<?php 	
									$display = $products['product_image'];	
									if($display != "")
									{
										if($display == "Image.jpg")
										{
									?>
											<div class="col-md-2">
                                    <img class="product_img" src="<?php echo base_url();?>/admin_assets/frontend/include/Image.jpg" width="170px" height="140px" />
                                </div>
                                <?php 
										}
										else
										{
							?>
                                <div class="col-md-2">
                                	<span class="closing">X</span>
                                  		<img class="product_img" src="<?php echo base_url();?>uploads/products/thumbs/<?=$display; ?>" width="100px" height="100px" />
                                </div>   <?php $i++;}
									}
								?>

                           </div> <br>
			</div>
		  </div>
          
          <div class="form-group">
			<label for="main_product_image_mobile" class="col-sm-3 control-label">Mobile Header Image :</label>
			<div class="col-sm-8 image-upload">
				<label for="main_product_image_mobile"><input type="file" name="main_product_image_mobile" id="main_product_image_mobile" ></label>
                <div class="col-md-12"> 
							<?php 	
									$display = $products['product_image_mobile'];	
									if($display != "")
									{
										if($display == "Image.jpg")
										{
									?>
											<div class="col-md-2">
                                    <img class="product_img_mobile" src="<?php echo base_url();?>/admin_assets/frontend/include/Image.jpg" width="170px" height="140px" />
                                </div>
                                <?php 
										}
										else
										{
							?>
                                <div class="col-md-2">
                                	<span class="closing_mobile">X</span>
                                  		<img class="product_img_mobile" src="<?php echo base_url();?>uploads/products_mobile/thumbs/<?=$display; ?>" width="100px" height="100px" />
                                </div>   <?php $i++;}
									}
								?>

                           </div> <br>
			</div>
		  </div>
          
          <div class="form-group">
                <label for="section_2_title" class="col-sm-3 control-label"> Description Title: </label>
                    <div class="col-sm-8">
                      <input class="col-sm-8" type="text" id="section_2_title" name="section_2_title" placeholder="Add Title" value="<?php echo $products['section_2_title'];?>"/>
                    </div>
             </div>
             
             <div class="form-group">
                <label for="section_2_content" class="col-sm-3 control-label">Description Content : </label>
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
                     <textarea rows="8" id="short_description" name="short_description" class="form-control1"><?php echo $products['short_description'];?></textarea>
                </div>
			</div>     
                    
            <div class="form-group">
                <label for="description" class="col-sm-3 control-label">Description : </label>
                <div class="col-sm-8">
                     <textarea rows="8" id="description" name="description" class="form-control1"><?php echo $products['description'];?></textarea>
                </div>
		      	</div><?php */?>
            
            <div class="form-group">
                <label for="features" class="col-sm-3 control-label">Features : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="features" name="features" class="form-control1"><?php echo $products['features'];?></textarea>
                </div>
		      	</div>
            
            <div class="form-group">
                <label for="best_applications" class="col-sm-3 control-label">Best Applications : </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="best_applications" name="best_applications" class="form-control1"><?php echo $products['best_applications'];?></textarea>
                </div>
		    	  </div>
            
            <div class="form-group">
                <label for="measurement" class="col-sm-3 control-label"> Measurement: </label>
                <div class="col-sm-8">
                    <textarea rows="8" id="measurement" name="measurement" class="form-control1"><?php echo $products['measurement'];?></textarea>
                </div>
			      </div>
            
            <div class="form-group">
                <label for="document_title_1" class="col-sm-3 control-label"> Document Title 1: </label>
                <div class="col-sm-8">
                  	<input type="text" name="document_title_1" id="document_title_1" value='<?php echo $products_doc['document_title_1']; ?>'>
                </div>
            </div>	
            <div class="form-group">
                <label for="download_link_1" class="col-sm-3 control-label">Document Download Link 1: </label>
                <div class="col-sm-8">
                  	<input type="file" name="download_link_1" id="download_link_1">
                   <?php if(!empty($products_doc['download_link_1'])){ ?>
                      <div class="col-md-2">
                        <a href='#' class="download_link_1" data-id='<?php echo $products_doc['product_id']; ?>' data-field='download_link_1' >
                          <span >X</span>
                          <img class='img img-responsive' src='<?php echo base_url(); ?>homepage_assests/image/doc.png'>
                        </a>
                        <?php echo $products_doc['download_link_1']; ?>
                      </div>
                  <?php } ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="document_title_2" class="col-sm-3 control-label"> Document Title 2: </label>
                <div class="col-sm-8">
                  	<input type="text" name="document_title_2" id="document_title_2" value='<?php echo $products_doc['document_title_2']; ?>'>
                </div>
            </div>	
             <div class="form-group">
                <label for="download_link_2" class="col-sm-3 control-label">Document Download Link 2: </label>
                <div class="col-sm-8">
                  	<input type="file" name="download_link_2" id="download_link_2">
                     <?php if(!empty($products_doc['download_link_2'])){ ?>
                        <div class="col-md-2">
                          <a href='#' class="download_link_2" data-id='<?php echo $products_doc['product_id']; ?>' data-field='download_link_2'>
                              <span >X</span>
                            <img class='img img-responsive' src='<?php echo base_url(); ?>homepage_assests/image/doc.png'>
                          </a>
                          <?php echo $products_doc['download_link_2']; ?>
                        </div>
                  <?php } ?>
                </div>
            </div>
          
            <div class="form-group">
                <label for="document_title_3" class="col-sm-3 control-label"> Document Title 3: </label>
                <div class="col-sm-8">
                  	<input type="text" name="document_title_3" id="document_title_3" value='<?php echo $products_doc['document_title_3']; ?>'>
                </div>
            </div>	
            
             <div class="form-group">
                <label for="download_link_3" class="col-sm-3 control-label">Document Download Link 3: </label>
                <div class="col-sm-8">
                  	<input type="file" name="download_link_3" id="download_link_3">
                    <?php if(!empty($products_doc['download_link_3'])){ ?>
                      <div class="col-md-2">
                        <a href='#'  class="download_link_3" data-id='<?php echo $products_doc['product_id']; ?>' data-field='download_link_3'>
                            <span>X</span>
                          <img class='img img-responsive' src='<?php echo base_url(); ?>homepage_assests/image/doc.png'>
                        </a>
                        <?php echo $products_doc['download_link_3']; ?>
                      </div>
                   <?php } ?>
                </div>
            </div>
          
            <div class="form-group">
                <label for="document_title_4" class="col-sm-3 control-label"> Document Title 4: </label>
                <div class="col-sm-8">
                  	<input type="text" name="document_title_4" id="document_title_4" value='<?php echo $products_doc['document_title_4']; ?>'>
                </div>
            </div>	
            <div class="form-group">
                <label for="download_link_4" class="col-sm-3 control-label">Document Download Link 4: </label>
                <div class="col-sm-8">
                  	<input type="file" name="download_link_4" id="download_link_4">
                    <?php if(!empty($products_doc['download_link_4'])){ ?>
                      <div class="col-md-2">
                          <a href='#' class="download_link_4" data-id='<?php echo $products_doc['product_id']; ?>' data-field='download_link_4'>
                              <span >X</span>
                            <img class='img img-responsive' src='<?php echo base_url(); ?>homepage_assests/image/doc.png'>
                          </a>
                          <?php echo $products_doc['download_link_4']; ?>
                        </div>
                  <?php } ?>
                </div>
            </div>
          
            <div class="form-group">
                <label for="document_title_5" class="col-sm-3 control-label"> Document Title 5: </label>
                <div class="col-sm-8">
                  	<input type="text" name="document_title_5" id="document_title_5" value='<?php echo $products_doc['document_title_5']; ?>'>
                </div>
            </div>	
            <div class="form-group">
                <label for="download_link_5" class="col-sm-3 control-label">Document Download Link 5: </label>
                <div class="col-sm-8">
                  	<input type="file" name="download_link_5" id="download_link_5">
                   <?php if(!empty($products_doc['download_link_5'])){ ?>
                       <div class="col-md-2">
                            <a href='#'  class="download_link_5" data-id='<?php echo $products_doc['product_id']; ?>' data-field='download_link_5'>
                                <span>X</span>
                              <img class='img img-responsive' src='<?php echo base_url(); ?>homepage_assests/image/doc.png'>
                            </a>
                            <?php echo $products_doc['download_link_5']; ?>
                        </div>
                  <?php } ?>
                </div>
            </div>
            <div class="form-group">
                <label for="gallery_link" class="col-sm-3 control-label"> Colors   : </label>
                <div class="col-sm-8">
                  	<textarea rows="8" id="gallery_link" name="gallery_link" class="form-control1"><?php echo $products['gallery_link'];?></textarea>
                </div>
            </div>
            
            <div class="form-group">
				<label for="gallery_image" class="col-sm-3 control-label">Gallery Image :</label>
				<div class="col-sm-8 image-upload">
					<label for="gallery_image"><input type="file" name="gallery_image[]" multiple id="gallery_image" ></label>
                	<div class="col-md-12"> 
						<?php 	
							foreach($gallery as $display){
								$display_gallery[] = $display['gallery'];
								$gallery_id[] =$display['id'];
							}
							if($display_gallery != "")
							{
								if($display_gallery == "Image.jpg")
								{
						?>
									<div class="col-md-2">
										<img class="gallery_img" src="<?php echo base_url();?>/admin_assets/frontend/include/Image.jpg" width="170px" height="140px" />
									 </div>
						<?php 
								}
								else
								{
									$total = count($display_gallery);
									$i=0;
									foreach($display_gallery as $count){
										if($count != ""){
						?>
									<div class="col-md-2" id="img_<?php echo $gallery_id[$i]; ?>">
										<span class="closing_gallery" id="<?php echo $gallery_id[$i]; ?>">X</span>
                                          <a class="popup-link" href="<?php echo base_url();?>uploads/products_gallery/<?=$count; ?>"><img class="gallery_img" src="<?php echo base_url();?>uploads/products_gallery/thumbs/<?=$count; ?>"  width="100px" height="100px" /></a>
									</div>   
						<?php 			}
										$i++;
									}
								}
							}
							
                        ?>
					</div> <br>
				</div>
		  	</div>
            
            <?php /*
            <div class="form-group">
                <label for="news_title" class="col-sm-3 control-label"> PDF to Image: </label>
                <div class="col-sm-8">
                  	<input type="file" name="pdf_to_image" id="pdf_to_image">
                </div>
            </div>
            */ ?>
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
                <label class="col-sm-3 control-label">Status :</label>
                <div class="col-sm-6">
                    <select class="col-sm-6" name="status" id="status">
                        <option value="">Select Status</option>
                        <option <?php if($products['status']=="1"){echo "selected";}?> value="1">Enable</option>
                        <option <?php if($products['status']=="0"){echo "selected";}?> value="0">Disable</option>
                    </select>
                </div>
            </div>
		  

          <div class="form-group">
            <div class="col-sm-8 col-sm-offset-2">
            <input type="hidden" name="product_id" id="product_id" value="<?php echo $products['id']; ?>"/>
              <button type="submit" class="btn-yellow btn" name="update">Update Product</button>																																 				&nbsp;&nbsp; <a href="<?php echo base_url();?>products" class="btn-yellow btn" />Cancel</a>
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
			var editor = CKEDITOR.replace( 'middle_content',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor, '../' );
			
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
			CKFinder.setupCKEditor( editor_5, '../' );*/
			
			var editor_6 = CKEDITOR.replace( 'product_header_content',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor_6, '../' );
			 
			
			var editor_7 = CKEDITOR.replace( 'gallery_link',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor_7, '../' );
			
			var editor_8 = CKEDITOR.replace( 'section_2_content',{
				filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
				filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
				filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
				filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			});
			CKFinder.setupCKEditor( editor_8, '../' );
			 
	 		
	




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
   
    $(".closing").on("click",function(){ 
	  var result = confirm("Are you sure you want to delete?");
	  if (result) {

		var image_id  =   $(this).attr("id");
		var id  =   $("#product_id").val();
		if(id	!=	'')																																																								 		{
			$.ajax({
				"url":"<?php echo base_url();?>products/delete_image",
				"type":"POST",
				"data":{
					id :id,
					image_id :image_id
				},
				success:function(data){
					//console.log(data);	
																																														 					$('.product_img').css("display","none");
					$('.closing').css("display","none");
				}
			});																																																		 		}else{
				alert('Unknown error occured..');
		}
	  }
	});
	
	$(".closing_mobile").on("click",function(){ 
	  var result = confirm("Are you sure you want to delete?");
	  if (result) {

		var image_id  =   $(this).attr("id");
		var id  =   $("#product_id").val();
		if(id	!=	'')																																																								 		{
			$.ajax({
				"url":"<?php echo base_url();?>products/delete_image_mobile",
				"type":"POST",
				"data":{
					id :id,
					image_id :image_id
				},
				success:function(data){
					//console.log(data);	
																																														 					$('.product_img_mobile').css("display","none");
					$('.closing_mobile').css("display","none");
				}
			});																																																		 		}else{
				alert('Unknown error occured..');
		}
	  }
	});

	$(".closing_banner").on("click",function(){ 
	  var result = confirm("Are you sure you want to delete?");
	  if (result) {

		var image_id  =   $(this).attr("id");	
		var id  =   $("#product_id").val();
		if(id	!=	'')																																																								 		{
			$.ajax({
				"url":"<?php echo base_url();?>products/delete_banner_image",
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
	
	$(".closing_hometitle").on("click",function(){ 
	  var result = confirm("Are you sure you want to delete?");
	  if (result) {

		var image_id  =   $(this).attr("id");	
		var id  =   $("#product_id").val();
		if(id	!=	'')																																																								 		{
			$.ajax({
				"url":"<?php echo base_url();?>products/delete_homepage_title_image",
				"type":"POST",
				"data":{
					id :id,
					image_id :image_id
				},
				success:function(data){
					//console.log(data);	
																																														 					$('.product_img_home_title').css("display","none");
					$('.closing_hometitle').css("display","none");
				}
			});																																																		 		}else{
				alert('Unknown error occured.');
		}
	  }
	});
	
	$(".closing_homeimage").on("click",function(){ 
	  var result = confirm("Are you sure you want to delete?");
	  if (result) {

		var image_id  =   $(this).attr("id");	
		var id  =   $("#product_id").val();
		if(id	!=	'')																																																								 		{
			$.ajax({
				"url":"<?php echo base_url();?>products/delete_homepage_image",
				"type":"POST",
				"data":{
					id :id,
					image_id :image_id
				},
				success:function(data){
					//console.log(data);	
																																														 					$('.product_img_homepage').css("display","none");
					$('.closing_homeimage').css("display","none");
				}
			});																																																		 		}else{
				alert('Unknown error occured.');
		}
	  }
	});
	
	$(".closing_gallery").on("click",function(){ 
	  var result = confirm("Are you sure you want to delete?");
	  if (result) {

		var id  =   $(this).attr("id");
		if(id	!=	'')																																																								 		{
			$.ajax({
				"url":"<?php echo base_url();?>products/delete_gallery_image",
				"type":"POST",
				"data":{
					id :id
				},
				success:function(data){																																				 					$('#img_' +id ).css("display","none");
				}
			});																																																		 		}else{
				alert('Unknown error occured..');
		}
	  }
	});
  	
  $(".download_link_1,.download_link_2,.download_link_3,.download_link_4,.download_link_5").on("click",function(){ 
	  var result = confirm("Are you sure you want to delete?");
	  if (result)
    {
      var id  =   $(this).data("id");
      var field  =   $(this).data("field");
      if(id	!=	'')	
        {
          $.ajax({
            "url":"<?php echo base_url();?>products/delete_product_document",
            "type":"POST",
            "data":{
              id :id,
              field:field
            },
            success:function(data){																																				
               location.reload();
            }
          });																																																		
        }
      else{
          alert('Unknown error occured..');
      }
	  }
	});
	
  });
</script>

<script type="text/javascript">

$('.popup-link').magnificPopup({
          type: 'image',
          gallery:{enabled:true}
        });

</script>