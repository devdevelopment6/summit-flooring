<div class="container">
<div class="main-wapper custpage4">
<?php 			
	$cat_array = $this->session->userdata('colors_category_list');
	$old_color_array = $this->session->userdata('colors_list');
?>

    <!--======== Mid Containmer ========-->
    <div class="mid-conttainer">
      	<div class="row">
		  	<input type="hidden" name="current_cat" id="current_cat" value="<?php echo $cat_array['category']; ?>" />
		 
        	<!-- Step header -->
			<!--<div class="step-heading">
				<div class="row" style="margin:0;">

					<div class="col-md-6 col-sm-6 col-xs-12" style="text-align:left;">
						 <h1><?php echo $sitesettings['step_four_title']; ?></h1>
					</div>
				</div>
			</div>-->
			
			
			<input type="hidden" name="save_gallery_indoor_albums" id="save_gallery_indoor_albums" value="<?php echo ($gallery_indoor_albums!= false)?"1":"0"; ?>">
			    
			    
     <input type="hidden" name="save_gallery_outdoor_albums" id="save_gallery_outdoor_albums" value="<?php echo ($gallery_outdoor_albums!= false)?"1":"0"; ?>">
		
        <!-- Custome Swatch -->
        <div class="custome-swatch">
			<!--<div class="col-md-1 col-lg-1"></div>-->
			<div class="row">
			<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12 custpage4secongblock custpage4resc1">

			<div class="slogan custhead4">
				<h3><?php echo $sitesettings['step_four_title']; ?></h3>
				<!--<h3 class="">YOUR CUSTOM SWATCH</h3>-->
			</div>				
				<div class="col-md-5 col-lg-5 col-xs-12 col-sm-6">
				  <?php 
					$album_name = '';
					$category_name = '';
					$image_session = $this->session->userdata('created_image_data'); 
					$created_swatch_cat = '';
					if($image_session!=''){
						$img = $image_session['img_src'];
						$html_formula = $image_session['html_formula'];
						$created_swatch_cat = $image_session['swatch_cat'];
						$category_name = ($image_session['swatch_cat']=='1')?"Indoor":"Outdoor";
						$saved_albums = $this->session->userdata('saved_album_session');
						if(!empty($saved_albums[$image_session['swatch_cat']])){
							$lastEl = array_slice($saved_albums[$cat_array['category']], -1);
							$lastEl = array_pop($lastEl);
							$get_single_swatch = $this->common_model->get_single('saved_album',array('id'=>$lastEl));
							$album_name = $get_single_swatch['swatch_name'];
						}
					}
					else if($this->session->userdata('saved_album_session')!=''){
						$saved_albums = $this->session->userdata('saved_album_session');
						if(!empty($saved_albums[$cat_array['category']])){
							$lastEl = array_pop((array_slice($saved_albums[$cat_array['category']], -1)));
							$get_single_swatch = $this->common_model->get_single('saved_album',array('id'=>$lastEl));
							$img = $get_single_swatch['org_image_path'];
							//$html_formula = $get_single_swatch['image_info'];
							$replace = array("% ", "Your Formula");
							$insert = array("%<br/>","");
							$html_formula = str_replace($replace, $insert, $get_single_swatch['image_info']);
							$album_name = $get_single_swatch['swatch_name'];
							$category_name = ($get_single_swatch['category_id']==1)?"Indoor":"Outdoor";
						}
						else
						{
						    if(isset($image_session)) {
                                $img = $image_session['img_src'];
                                $html_formula = $image_session['html_formula'];
                            }
							$category_name = ($cat_array['category']=='1')?"Indoor":"Outdoor";
						}
					}
					else
					{
						$img = base_url()."home_assets/images/color-plate.png";
						$html_formula = '';
					}
				  ?>
				   <input type="hidden" name="swatch_cat" id="swatch_cat" value="<?php echo $created_swatch_cat; ?>" />
				<div class="final-color">
				  <figure style="<?php if($cat_array=='' || $old_color_array==''|| $image_session==''){ echo 'display:none;'; } ?>">
					<img id = "result_image" src="<?php echo $img; ?>" alt="">
				  </figure>

				  <div class="social" style="<?php if($cat_array=='' || $old_color_array=='' || $image_session==''){ echo 'display:none;'; } ?>">
					<a href="#!" class="zoom_image"> <img src="<?php echo base_url(); ?>home_assets/images/zoom.png" alt=""> </a>
					<a href="#!"  class="delete_res"> <img src="<?php echo base_url(); ?>home_assets/images/delete.png" alt=""> </a>
					<a href="#!" id="twitter"> <img src="<?php echo base_url(); ?>home_assets/images/twitter.png" alt=""> </a>
					<a href="#!" id="facebook"> <img src="<?php echo base_url(); ?>home_assets/images/facebook.png" alt=""> </a>
				  </div>

				  <div class="links hidden-xs">

					<!--<button type="button" class="btn rednew" id="save_to_swatch" name="save_to_swatch"  <?php //echo ($album_name!='')?"disabled":""; ?> >Save To Album</button>-->


					  <?php if($this->session->userdata('saved_album_session')!='' && ((array_key_exists(1,$this->session->userdata('saved_album_session')) && !empty($this->session->userdata['saved_album_session'][1])) || (array_key_exists(2,$this->session->userdata('saved_album_session')) && !empty($this->session->userdata['saved_album_session'][2])))){ ?>

							<button type="button" class="btn trans custemail" id="send_to_email_step4" name="send_to_email" style="<?php if($cat_array=='' || $old_color_array==''|| $image_session==''){ echo 'display:block;'; } ?>">Send To Email</button>
					  
					  <?php }else{ ?>
					  
					  		<button type="button" class="btn trans custemail" id="send_to_email_step4" name="send_to_email"  style="display:block;" >Send To Email</button>
					  <?php } ?>
					  
					  <a href="#" class="btn redreset reset_and_go_to_home"  title="Create New Swatch">Create New Swatch</a>
					  <!--<a href="#" class="btn trans reset_and_go_to_home right w-100" style="margin-top:10px;" title="Create New Swatch">Create New Swatch</a>-->
				  </div>
				</div>
			  </div>
				<div class="col-md-7 col-lg-7 col-xs-12 col-sm-6">
					<div class="color-formula" style="<?php if($cat_array=='' || $old_color_array==''|| $image_session==''){ echo 'display:none;'; } ?>" >
				  	<div class="title" style="padding:0 !important;">
				   <input classs="" type="text" placeholder='name your swatch' name="swatchname" id='swatchname' value="<?php //if($album_name!=''){ echo $album_name; } ?>" <?php //echo ($album_name!='')?"readonly":""; ?> /> 
						
				  </div>
				 <div class="links hidden-xs">
					 <button type="button" class="btn rednew" id="save_to_swatch" name="save_to_swatch"  <?php //echo ($album_name!='')?"disabled":""; ?> >Save To Album</button>
				 </div>
						
				 <div class="links hidden-lg hidden-md hidden-sm">

					<button type="button" class="btn rednew" id="save_to_swatch" name="save_to_swatch"  <?php //echo ($album_name!='')?"disabled":""; ?> >Save To Album</button><br>


					  <?php if($this->session->userdata('saved_album_session')!='' && ((array_key_exists(1,$this->session->userdata('saved_album_session')) && !empty($this->session->userdata['saved_album_session'][1])) || (array_key_exists(2,$this->session->userdata('saved_album_session')) && !empty($this->session->userdata['saved_album_session'][2])))){ ?>

							<button type="button" class="btn trans custemail" id="send_to_email_step4" name="send_to_email" style="<?php if($cat_array=='' || $old_color_array==''|| $image_session==''){ echo 'display:block;'; } ?>">Send To Email</button>
					  
					  <?php }else{ ?>
					  
					  		<button type="button" class="btn trans custemail" id="send_to_email_step4" name="send_to_email"  style="display:block;" >Send To Email</button>
					  <?php } ?>
					  <!--<a href="#" class="btn trans reset_and_go_to_home right w-100" style="margin-top:10px;" title="Create New Swatch">Create New Swatch</a>-->
					 
				  </div>
						
				<div class="links hidden-lg hidden-md hidden-sm">
						<a href="#" class="btn redreset reset_and_go_to_home" title="Create New Swatch">Create New Swatch</a>
				</div>
						
				  <div class="name">
					<h3><?php echo $category_name; ?></h3>
				  </div>

				  <div class="formula">
					<h3>Your Formula</h3>
					<?php echo $html_formula; ?>
				  </div>
						
				  


				</div>
					
			  	<!--<div class="custnewpage4 save-color">	
				  <h2>Saved Swatch Album</h2>
				  <div class="swatch-gallery">
					<?php
						$gallery_details = false;
						if($this->session->userdata('logedin_user')!=''){

							$gallery_details = $this->common_model->get_single('saved_gallery',array('user_id'=>$this->session->userdata['logedin_user']['id']));
						}
						if($saved_albums && count($saved_albums) > 0 && ((array_key_exists(1,$saved_albums) && count($saved_albums[1])) || (array_key_exists(2,$saved_albums) && count($saved_albums[2])))){
					?>
					
					<div class="">
					<?php if($this->session->userdata('logedin_user')==''){ ?>
					
					<?php } ?>
						<div class="save_to_gallery_section">
						  <input type="text" name="gallery_name" id="gallery_name" value="<?php echo ($gallery_details!=false)?$gallery_details['gallery_name']:''; ?>" <?php echo ($gallery_details!=false)?'readonly':''; ?> placeholder="gallery name" class="fullsp">
						  <input type="hidden" name="created_gallery_id" id="created_gallery_id" value = "<?php echo ($gallery_details!=false)?$gallery_details['id']:''; ?>">
						<?php 
							$logedin_user = false;
							if($this->session->userdata('logedin_user')!=''){
								$logedin_user = $this->session->userdata['logedin_user']['id'];
							}	
						?>
						 <input type="hidden" name="user_id" id="user_id" value = "<?php echo ($gallery_details!=false)?$gallery_details['user_id']:(($logedin_user != false)?$logedin_user:''); ?>">
						</div>
					</div>
					<div class="custbg">
							<a class="btn redsame go_to_place step4_next"href="#">Next</a>
							<button type="button" id="save_to_gallery" name="save_to_gallery" class="btn trans custgal step4_save_to_gal">Save To Gallery</button>						
					</div>
					<?php } ?>
				  </div>					  
				</div>-->
				</div>
			</div>        
			<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12 custpage4resc1">
			    <?php
			        $saved_albums = $this->session->userdata('saved_album_session');
				
					if($saved_albums && count($saved_albums) > 0 && ((isset($saved_albums[1]) && count($saved_albums[1])>0) || (isset($saved_albums[2]) && count($saved_albums[2])>0))){
				?>
				<div class="custnewpage4 save-color">					  
				  <div class="swatch-gallery slogan custhead4" >
				    
				    <h3>SAVED TO YOUR SWATCH ALBUM</h3>
					<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						  <?php 
								
									if(array_key_exists(1,$saved_albums) && count($saved_albums[1])>0){ ?>

									<div class=""><h4 class="text-left namenew">Indoor</h4></div>
										<ul class="saved-swatch indoor_category">
							<?php 
										foreach($saved_albums[1] as $album){ 
									//print_r($album);
											$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album,'category_id'=>1));
											if($get_single_album['category_id'] == 1){
							?>											
											<li style="margin-top:10px;margin-bottom:10px;" id="del<?php echo $get_single_album['id']; ?>" class="col-md-3 col-sm-6 col-xs-6" data-id="<?php echo $get_single_album['id']; ?>">
												<figure class="" data-id = "<?php echo $get_single_album['id']; ?>">
													<a class="sg-close" style="position: absolute; margin-left: 5px;left: 10px;">
														<em class="fa fa-times del" data-catid="1" data-id="<?php echo $get_single_album['id']; ?>" aria-hidden="true"></em>
													</a>
													<img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" class="img-responsive zoom_image_small get_swatch_details" data-id="<?php echo $get_single_album['id']; ?>">
												</figure>

												<a href="<?php echo base_url();?>home/samplereq/<?php echo $get_single_album['id']; ?>"><button data-id="<?php echo $get_single_album['id']; ?>" type="button" class="btn yellow request_for_sample_saved"  style="padding: 5px 5px; font-size: 9px;font-weight: bold; margin-top:5px;"><span class="custspanreq">Request</span><span class="custspanreq">Sample</span></button></a>
										   </li>
											
							<?php } } ?>
							</ul>
							<?php  } ?>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">

					  <?php 
					    if(array_key_exists(2,$saved_albums) && count($saved_albums[2])>0){
					    ?> 
						  <div class=""><h4 class="text-left namenew">Outdoor</h4></div>
							 <ul class="saved-swatch outdoor_category">
						  <?php 
									foreach($saved_albums[2] as $album){ 
										//print_r($album);
										$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album,'category_id'=>2));
										if($get_single_album['category_id'] == 2){
						?>
										<li style="margin-top:10px;margin-bottom:10px;" id="del<?php echo $get_single_album['id']; ?>" class="col-md-3 col-sm-6 col-xs-6" data-id="<?php echo $get_single_album['id']; ?>">
											<figure class="" data-id = "<?php echo $get_single_album['id']; ?>">
												<a class="sg-close" style="position: absolute; margin-left: 5px;left: 10px;">
													<em class="fa fa-times del" data-catid="2" data-id="<?php echo $get_single_album['id']; ?>" aria-hidden="true"></em>
												</a>
												<img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" class="img-responsive zoom_image_small get_swatch_details" data-id="<?php echo $get_single_album['id']; ?>">
											</figure>

											<a href="<?php echo base_url();?>home/samplereq/<?php echo $get_single_album['id']; ?>"><button data-id="<?php echo $get_single_album['id']; ?>" type="button" class="btn yellow  request_for_sample_saved"  style="padding: 5px 5px; font-size: 9px;font-weight: bold; margin-top:5px;"><span class="custspanreq">Request</span><span class="custspanreq">Sample</span></button></a>
									   </li>

						<?php }  } ?> 
						  </ul>
						<?php } ?>
					</div>	
					</div>
					
				  </div>			
				</div>
				
				<div class="custnewpage4 save-color custstep4savegal">	
				  
				  <div class="swatch-gallery">
					<?php
						$gallery_details = false;
						if($this->session->userdata('logedin_user')!=''){

							$gallery_details = $this->common_model->get_single('saved_gallery',array('user_id'=>$this->session->userdata['logedin_user']['id']));
						}
						if($saved_albums && count($saved_albums) > 0 && ((array_key_exists(1,$saved_albums) && count($saved_albums[1])) || (array_key_exists(2,$saved_albums) && count($saved_albums[2])))){
					?>
					
					<div class="nav_buttons_all_step_left" style="padding-bottom: 20px;float: right;">
						<div class="step-links hidden-xs">	
								<a class="btn noleft leftcss" href="<?php echo base_url(); ?>home/step_3">BACK</a>
								<a class="btn right rightcss go_to_place step4_next" href="#">Place Your Tile</a>
						 </div> 
				  	</div>
					<div style="border-top: 1px solid;float: right;width: 100%;">&nbsp;</div>
					<div class="" style="width: 80%; float: right;">
					<!--<p class="login_instruction">
					Please Login/Register before you save the swatches to the gallery.
					</p>-->
					<?php if($this->session->userdata('logedin_user')!=''){ ?>
						<div class="save_to_gallery_section">
						  <h2>
						    Saved  your album in gallery for future use: 
						  </h2>
						  <input type="text" style="float: left; width: 65% !important;" name="gallery_name" id="gallery_name" value="<?php echo ($gallery_details!=false)?$gallery_details['gallery_name']:''; ?>" <?php echo ($gallery_details!=false)?'readonly':''; ?> placeholder="gallery name" class="fullsp ">
						  <input type="hidden" name="created_gallery_id" id="created_gallery_id" value = "<?php echo ($gallery_details!=false)?$gallery_details['id']:''; ?>">
						<?php 
							$logedin_user = false;
							if($this->session->userdata('logedin_user')!=''){
								$logedin_user = $this->session->userdata['logedin_user']['id'];
							}	
						?>
						 <input type="hidden" name="user_id" id="user_id" value = "<?php echo ($gallery_details!=false)?$gallery_details['user_id']:(($logedin_user != false)?$logedin_user:''); ?>">
						 <div class="custbggalnew">
							<!--<a class="btn redsame go_to_place step4_next"href="#">Next</a>-->
							<button type="button" id="save_to_gallery" name="save_to_gallery" class="btn trans custgal step4_save_to_gal" style="float: right;">Save To Gallery</button>						
						</div>
						</div>
					<?php } ?>
					</div>
					
					
					<?php } else { ?>
				  	<div class="nav_buttons_all_step">
					 <div class="step-links hidden-xs">	
							<a class="btn noleft leftcss" href="<?php echo base_url(); ?>home/step_3">BACK</a>
							<a class="btn right rightcss go_to_place step4_next" href="#">Place Your Tile</a>
					 </div> 
					 </div> 
				  	<?php } ?>
				  </div>	
				
				
				
				</div>
				<?php } ?>
			</div>
			<!--<div class="col-md-1 col-lg-1"></div>-->
			
			</div>
        </div>

      	</div>
    </div>
	<?php $this->load->view('login_reg_form'); ?>
	<div class="col-xs-12 hidden-lg hidden-md hidden-sm nav_buttons_step_below">		
		<div class="step-links">			
			<a class="btn left leftcss" href="<?php echo base_url(); ?>home/step_3">BACK</a>
			<a class="btn right rightcss go_to_place step4_next" href="#">Place Your Tile</a>
		</div>
	</div>
	 <div class="modal login-registration fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h2>View Swatch</h2>
			</div>
			<div class="modal-body">
			  <img src="" class="enlargeImageModalSource" style="width: 100%;">
			</div>
		  </div>
		</div>
	</div>
	<div id="dialog"  class="modal  login-registration fade" >
		<div class="modal-dialog modal-lg" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<form>
					<fieldset>
						<label for="email">Email:</label>
						<input type="email" name="emailTo" id="emailTo" value="" class="form-control" placeholder="Enter Email"/>
					</fieldset>
				</form>
			</div>
		  <div class="modal-footer">
            <button type="button" class="btn red" id="image_send" name="image_send">Send</button>
          </div>
		  </div>
		</div>
	</div>
	
</div>
</div>