<div class="container">
<div class="main-wapper custommakelogo">
<?php 
	$cat_array = $this->session->userdata('colors_category_list');
	$old_color_array = $this->session->userdata('colors_list');

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

    <!--======== Mid Containmer ========-->
    <div class="mid-conttainer logo_section">
		<div class="row">
		<div class="before_login" style="height: -webkit-fill-available;" >
						<div class="col-md-6">
			<img src="<?php echo base_url();?>home_assets/images/color-innovator-logo-make.jpg" class=="img-responsive">
			</div>
			<div class="col-md-6 col-sm-12 col-xs-12" style="margin-top: 20px;">
				<span>
					<?php if($settings!=false){ 
						echo $settings['logo_section_content'];
					 } ?>
				</span>
				<br />
				
				
				<?php if ($this->session->userdata('logedin_user') != '') { ?>
					<button class="btn btn-sm btn-info logo_next">Next</button>
				<?php } else { ?>
					<a href="<?php echo base_url(); ?>home/login"><button class="btn btn-sm btn-success login_title2">Login</button></a>
					<a href="<?php echo base_url(); ?>home/reg"><button class="btn btn-sm btn-success login_title2">Register</button></a>
				<?php } ?> 
				<button class="btn btn-sm btn-info ajax_login_logo_next logo_next" style="display:none;" >Next</button>
				
			</div>	
		</div>
		<div class="after_login" style="display:none;">
		<div class="">
			<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="file-loading">
					<input name="browse_custom_image2" id="browse_custom_image2" type="file">
				</div>
			</div>
			<div class="col-md-5 col-sm-12 col-xs-12" style="margin-bottom:20px;">
				<div class="custcomment">- Transparent high resolution image in png format</div>
				<div class="custcomment">- Maximum photo size not to exceed 2MB</div>
				<div class="custcomment">- Maximum width 500px</div>
				<div class="custcomment">- Maximum hight 500px</div>
			</div>
		</div>
		<div class="">
		<div class="col-md-12 col-sm-12 col-xs-12 custlogoblock">
							<div class="custcomment col-12">
		<h2>Select your image from the slider.</h2><br/>
		</div>
			<div class="col-md-12 col-sm-12 col-xs-12 custlogoblock">

				<div class="owl-carousel2 owl-carousel">
					<?php 
						if($logo_images!=false){ 
							foreach($logo_images as $image){
					?>
						<div class="item">
							<img class="" src="<?php echo base_url().'uploads/user_logo_images/'.$image['user_id'].'/'.$image['image_name']; ?>" />
							<span class="fa fa-times delete_single_logo custsingledeleteicon" data-user_id="<?php echo $image['user_id'];?> " data-image_name="<?php echo $image['image_name'];?> "></span>
						</div>
						
					<?php
							}
						}
					?>
				</div>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
		<div class="logo_image_section" style="margin-top:20px;">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="col-md-12 div_logo_img">
						<img id="logo_image_div" src="<?php echo base_url(); ?>home_assets/img/logo.png" style=""/>
				</div>
				<div class="col-lg-12 col-md-12 " style="text-align:center;margin-top:10px;">
					<button id="send_to_mail_with_logo" class="btn trans custemail" style="margin-right: 12px;">Send To Email</button>
				</div>
			</div>
			
				<div class="col-md-4 col-sm-12 col-xs-12 custmakelogoblock2">
				<div class="col-md-12">
				<h4>Click on the swatch below to check with your image.</h4>
				</div>
				<?php $saved_albums = $this->session->userdata('saved_album_session');
						if($saved_albums!=''){ 
							if(array_key_exists(1,$saved_albums) && count($saved_albums[1])>0){

				?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list indoor_logo_swatches logo_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6 class="custmaketitle">Indoor Albums From Saved</h6></div>
					<div  class="swatches">
                	 <?php 
						
							foreach($saved_albums[1] as $album){ 
								$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album));
								if($get_single_album['category_id'] == 1){
					?>
						 <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
						   <div class="inner_div">
							   <img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" data-id="<?php echo $get_single_album['id']; ?>" >
						   </div>
						   <a href="<?php echo base_url().'home/samplereq/'.$get_single_album['id']; ?>" data-id="<?php echo $get_single_album['id']; ?>" class="request_sample_link request_for_sample_saved a_request_sample" >Request Sample</a>
						</div>

					<?php } } ?>
					</div>
				</div>
				<?php }} ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list indoor_logo_swatches1 logo_img" style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6 class="custmaketitle">Indoor Albums From Saved</h6></div>
					<div  class="swatches">
					</div>
				</div>	
				<?php 
					if($gallery_indoor_albums!=false){ 
				?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list logo_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6 class="custmaketitle">Indoor Albums From Gallery</h6></div>
				<?php 
						foreach($gallery_indoor_albums as $album){	
				?>
				   <div class="col-md-4 col-sm-3 col-xs-6 swatch_blocks">
					   <div class="inner_div">
						   <img src="<?php echo base_url(); ?>images/<?php echo $album['org_image_name']; ?>" data-id="<?php echo $album['id']; ?>" >
					   </div>
					   <a href="<?php echo base_url().'home/samplereq/'.$album['id']; ?>" data-id="<?php echo $album['id']; ?>" class="request_sample_link request_for_sample_saved a_request_sample" >Request Sample</a>
					</div>

				<?php  } ?>
					</div>
				<?php } ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list logo_img indoor_gallery_swatches" style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6 class="custmaketitle">Indoor Albums From Gallery</h6></div>
					<div class="swatches"> </div>
				</div>
				 <?php 
					$saved_albums = $this->session->userdata('saved_album_session');
					if($saved_albums!=''){ 
						if(array_key_exists(2,$saved_albums) && count($saved_albums[2])>0){ ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list outdoor_logo_swatches logo_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6 class="custmaketitle">Outdoor Albums From Saved</h6></div>
					<div class="swatches"> 
                	<?php 
						foreach($saved_albums[2] as $album){ 
							$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album));
							if($get_single_album['category_id'] == 2){
					?>
						 <div class="col-md-4 col-sm-3 col-xs-6 swatch_blocks">
						   <div class="inner_div">
							   <img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" data-id="<?php echo $get_single_album['id']; ?>" >
						   </div>
						   <a href="<?php echo base_url().'home/samplereq/'.$get_single_album['id']; ?>"  data-id="<?php echo $get_single_album['id']; ?>" class="request_sample_link request_for_sample_saved a_request_sample">Request Sample</a>
						</div>

					<?php } }?>
					</div>
				</div>
				<?php }}  ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list outdoor_logo_swatches1 logo_img"  style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6 class="custmaketitle">Outdoor Albums From Saved</h6></div>
					<div class="swatches"> </div>
				</div>	
				<?php 
					if($gallery_outdoor_albums!=false){ 
				?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list logo_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6 class="custmaketitle">Outoor Albums From Gallery</h6></div>
				<?php 
						foreach($gallery_outdoor_albums as $album){	
				?>
				   <div class="col-md-4 col-sm-3 col-xs-6 swatch_blocks">
					   <div class="inner_div">
						   <img src="<?php echo base_url(); ?>images/<?php echo $album['org_image_name']; ?>" data-id="<?php echo $album['id']; ?>" >
					   </div>
					   <a href="<?php echo base_url().'home/samplereq/'.$album['id']; ?>"  data-id="<?php echo $album['id']; ?>" class="request_sample_link request_for_sample_saved a_request_sample" >Request Sample</a>
					</div>

				<?php  } ?>
					</div>
				<?php } ?>
				
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list logo_img outdoor_gallery_swatches" style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6 class="custmaketitle">Outdoor Albums From Gallery</h6></div>
					<div class="swatches"> </div>
				</div>
				
				<?php /*<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list transparent_logo_swatches">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6>Transparent Logo Swatch</h6></div>
					<div  class="swatches indoor">
                	 <?php 
						$saved_albums = $this->session->userdata('saved_album_session');
						if($saved_albums!=''){ 
							if(array_key_exists(1,$saved_albums) && count($saved_albums[1])>0){

							foreach($saved_albums[1] as $album){ 
								$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album));
								if($get_single_album['category_id'] == 1){
					?>
						 <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
						   <div class="inner_div">
							   <img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" data-id="<?php echo $get_single_album['id']; ?>" >
						   </div>
						   <a data-id="<?php echo $get_single_album['id']; ?>" class="btn btn-sm btn-info request_a_sample request_sample_btn col-xs-12">Request Sample</a>
						</div>

					<?php } }}} ?>
					</div>
					<div class="swatches outdoor"> 
                	 <?php 
						$saved_albums = $this->session->userdata('saved_album_session');
						if($saved_albums!=''){ 
							if(array_key_exists(2,$saved_albums) && count($saved_albums[2])>0){

							foreach($saved_albums[2] as $album){ 
								$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album));
								if($get_single_album['category_id'] == 2){
					?>
						 <div class="col-md-4 col-sm-4 col-xs-6 swatch_blocks">
						   <div class="inner_div">
							   <img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" data-id="<?php echo $get_single_album['id']; ?>" >
						   </div>
						   <a data-id="<?php echo $get_single_album['id']; ?>" class="btn btn-sm btn-info request_a_sample request_sample_btn col-xs-12">Request Sample</a>
						</div>

					<?php } }}} ?>
					</div>
				</div>*/ ?>
				
			<div class="col-md-12 col-xs-12 paddingzero custmakelogoblock1" >
			<h4>Save your unsaved swatch album to gallery for future use.</h4>
					<div class="col-lg-7 col-md-12 paddingzero" style="margin-top: 15px !important;margin-bottom: 15px !important;">
						<!--<input type="text" placeholder="Gallery Name" id="save_to_gallery_text2" name="save_to_gallery_text2"  value="<?php if($user_gallery!= false){ echo $user_gallery['gallery_name']; } ?>" <?php if($user_gallery!= false){ echo "readonly"; } ?> class="form-control"/>-->
					
					<?php
					$gallery_details = false;
					if($this->session->userdata('logedin_user')!=''){
						$gallery_details = $this->common_model->get_single('saved_gallery',array('user_id'=>$this->session->userdata['logedin_user']['id']));
					}
					$logedin_user = false;
						if($this->session->userdata('logedin_user')!=''){
							$logedin_user = $this->session->userdata['logedin_user']['id'];
						}
					?>
					<input type="text"  name="gallery_name1" id="gallery_name1" value="<?php echo ($gallery_details!=false)?$gallery_details['gallery_name']:''; ?>" <?php echo ($gallery_details!=false)?'readonly':''; ?> placeholder="Gallery Name" class="placecenres">
					<input type="hidden" name="created_gallery_id1" id="created_gallery_id1" value = "<?php echo ($gallery_details!=false)?$gallery_details['id']:''; ?>">
					<input type="hidden" name="user_id" id="user_id" value = "<?php echo ($gallery_details!=false)?$gallery_details['user_id']:(($logedin_user != false)?$logedin_user:''); ?>">
					</div>
					<div class="col-lg-4 col-md-12 paddingzero">
						<button type="button" id="save_to_gallery_make" name="save_to_gallery1" class="btn placecenres placesame" >Save To Gallery</button>	
						
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 nav_buttons_all_step_left hidden-xs"  style="margin-top: 15px !important;margin-bottom: 15px !important;">
						<div class="step-links">			
							<a class="btn right leftcss" href="<?php echo base_url(); ?>home/make">BACK</a>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
		<div class="logo_image_section" style="margin-top:20px;">
		
		</div>
		
		
		</div>	
	</div>	
 	</div>
	<?php $this->load->view('login_reg_form'); ?>
	<div id="dialog_withlogo"  class="modal  login-registration fade" >
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
            <button type="button" class="btn red" id="image_send_withlogo" name="image_send">Send</button>
          </div>
		  </div>
		</div>
	</div>
	<div class="col-xs-12 hidden-lg hidden-md hidden-sm nav_buttons_step_below">
		<div class="step-links">			
			<a class="btn left leftcss" href="<?php echo base_url(); ?>home/make">BACK</a>
		</div>	
	</div>	
</div>
</div>	
<script>
$(document).ready(function () {

});
</script>