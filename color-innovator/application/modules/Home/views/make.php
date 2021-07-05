<div class="container">
<div class="main-wapper custommake">
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
    <div class="mid-conttainer make_section">		
    	<div class="row" >
		<div class="before_login" style="height: -webkit-fill-available;">	
			<div class="col-md-6">
			<img src="<?php echo base_url();?>home_assets/images/color-innovator-add-background.jpg" class=="img-responsive">
			</div>
			<div class="col-md-6 col-sm-12 col-xs-12" style="margin-top: 20px;">
				<span>
					<?php if($settings!=false){ 
						echo $settings['make_section_content'];
					 } ?>
				</span>
				<br />
				
				
				<?php if ($this->session->userdata('logedin_user') != '') { ?>
					<button class="btn btn-sm btn-info make_next">Next</button>
				<?php } else { ?>
					<a href="<?php echo base_url(); ?>home/login"><button class="btn btn-sm btn-success login_title1">Login</button></a>
					<a href="<?php echo base_url(); ?>home/reg"><button class="btn btn-sm btn-success login_title1">Register</button></a>
				<?php } ?> 
				<button class="btn btn-sm btn-info ajax_login_make_next make_next" style="display:none;" >Next</button>
				
			</div>
		</div>	
		<div class="after_login" style="display:none;">
		<div class="">
			<div class="col-md-8 col-sm-12 col-xs-12" >
				<div class="file-loading">
					<input  name="browse_custom_image" id="browse_custom_image" type="file">					
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12" style="margin-bottom:20px;">
			<div class="custcomment"></div>
			<div class="custcomment">- Choose a landscape photo</div>
				<div class="custcomment">- Only JPG and PNG allowed</div>
				<div class="custcomment">- Maximum photo size not to exceed 2MB</div>
			</div>
		</div>
		<div class="">
			<div class="col-md-12 col-sm-12 col-xs-12 custlogoblock">
							<div class="custcomment col-12">
		<h2>Select your picture from the slider.</h2><br/>
		</div>
				<div class="owl-carousel3 owl-carousel" style="border:1px solid; padding: 10px">
					<?php 
					
						if($custom_images!=false){ 
							foreach($custom_images as $image){
					?>
						<div class="item">
							<img class="" src="<?php echo base_url().'uploads/user_custom_images/'.$image['user_id'].'/'.$image['image_name']; ?>" />
							<span class="fa fa-times delete_custom_make custsingledeleteicon" data-user_id="<?php echo $image['user_id'];?> " data-image_name="<?php echo $image['image_name'];?> "></span>
						</div>
						
					<?php
							}
						}
					?>
				</div>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
		<div class="row make_image_section" style="margin-top:20px;">
			<div class="col-md-12 col-sm-12 col-xs-12" >
				<!--<div class="col-md-12 div_img">
					<img id="make_image_div" src="" style="display:none;"/>
                    <div id="make_image_div_overlay" style="display:none;"></div>
				</div>-->
				
				<div class="col-md-8 div_img" id="canvas_img">					
                    <div id="make_image_div_overlay" style="display:none;"></div>
					<img id="make_image_div" src="" style="display:none;"/>
					<div style="margin-top:10px;">
						<button id="send_to_email" class="btn trans custemail" style="margin-right: 12px;">Send To Email</button>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="col-md-12">
				<h4>Click on the swatch below to check with your background.</h4>
				</div>
				<?php $saved_albums = $this->session->userdata('saved_album_session');
						if($saved_albums!=''){ 
							if(array_key_exists(1,$saved_albums) && count($saved_albums[1])>0){

 				?>
                <div class="col-md-12 col-sm-12 col-xs-12 saved_result_list indoor_place_swatches make_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6 class="custmaketitle">Indoor Albums From Saved</h6></div>
					<div  class="swatches">
                	 <?php 
						
							foreach($saved_albums[1] as $album){ 
								$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album));
								if($get_single_album['category_id'] == 1){
					?>
						 <div class="col-md-3 col-sm-3 col-xs-6 swatch_blocks">
						   <div class="inner_div">
							   <img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" data-id="<?php echo $get_single_album['id']; ?>" >
						   </div>
						   <a href="<?php echo base_url().'home/samplereq/'.$get_single_album['id']; ?>" data-id="<?php echo $get_single_album['id']; ?>" class="request_sample_link request_for_sample_saved a_request_sample" >Request Sample</a>
						</div>

					<?php } } ?>
					</div>
				</div>
				<?php }} ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list indoor_place_swatches1 make_img" style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6 class="custmaketitle">Indoor Albums From Saved</h6></div>
					<div  class="swatches">
					</div>
				</div>
				
				<?php 
					if($gallery_indoor_albums != false){ 
				?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list make_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6 class="custmaketitle">Indoor Albums From Gallery</h6></div>
				<?php 
						foreach($gallery_indoor_albums as $album){	
				?>
				   <div class="col-md-3 col-sm-3 col-xs-6 swatch_blocks">
					   <div class="inner_div">
						   <img src="<?php echo base_url(); ?>images/<?php echo $album['org_image_name']; ?>" data-id="<?php echo $album['id']; ?>" >
					   </div>
					   <a href="<?php echo base_url().'home/samplereq/'.$album['id']; ?>" data-id="<?php echo $album['id']; ?>" class="request_sample_link request_for_sample_saved a_request_sample">Request Sample</a>
					</div>

				<?php  } ?>
					</div>
				<?php } ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list make_img indoor_gallery_swatches" style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6 class="custmaketitle">Indoor Albums From Gallery</h6></div>
					<div class="swatches"> </div>
				</div>
				<?php 	$saved_albums = $this->session->userdata('saved_album_session');
						if($saved_albums!=''){ 
							if(array_key_exists(2,$saved_albums) && count($saved_albums[2])>0){ ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list outdoor_place_swatches make_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6 class="custmaketitle">Outdoor Albums From Saved</h6></div>
					<div class="swatches"> 
                	 <?php 
					

							foreach($saved_albums[2] as $album){ 
								$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album));
								if($get_single_album['category_id'] == 2){
					?>
						 <div class="col-md-3 col-sm-3 col-xs-6 swatch_blocks">
						   <div class="inner_div">
							   <img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" data-id="<?php echo $get_single_album['id']; ?>" >
						   </div>
						   <a href="<?php echo base_url().'home/samplereq/'.$get_single_album['id']; ?>"  data-id="<?php echo $get_single_album['id']; ?>" class="request_sample_link request_for_sample_saved a_request_sample" >Request Sample</a>
						</div>

					<?php } } ?>
					</div>
				</div>
				<?php }} ?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list outdoor_place_swatches1 make_img"  style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6 class="custmaketitle">Outdoor Albums From Saved</h6></div>
					<div class="swatches"> </div>
				</div>	
				<?php 
					if($gallery_outdoor_albums!=false){ 
				?>
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list make_img">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6 class="custmaketitle">Outdoor Albums From Gallery</h6></div>
				<?php 
						foreach($gallery_outdoor_albums as $album){	
				?>
				   <div class="col-md-3 col-sm-3 col-xs-6 swatch_blocks">
					   <div class="inner_div">
						   <img src="<?php echo base_url(); ?>images/<?php echo $album['org_image_name']; ?>" data-id="<?php echo $album['id']; ?>" >
					   </div>
					   <a  href="<?php echo base_url().'home/samplereq/'.$album['id']; ?>" data-id="<?php echo $album['id']; ?>" class="request_sample_link request_for_sample_saved a_request_sample" >Request Sample</a>
					</div>

				<?php  } ?>
					</div>
				<?php } ?>
                	
				<div class="col-md-12 col-sm-12 col-xs-12 saved_result_list make_img outdoor_gallery_swatches" style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12"><h6 class="custmaketitle">Outdoor Albums From Gallery</h6></div>
					<div class="swatches"> </div>
				</div>
				<div class="row make_image_section" style="margin-top:20px;">
				
				<div class="col-md-12 col-xs-12 paddingzero custmakeblock1" >
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
					
					
					<div class="col-lg-4 col-md-12 paddingzero" style="margin-top: 15px !important;margin-bottom: 15px !important;">
						<button type="button" id="save_to_gallery_make" name="save_to_gallery1" class="btn placecenres" >Save To Gallery</button>	<!--placesame     -->
						
					</div>
					<div class="col-md-8 col-sm-12 col-xs-12 nav_buttons_all_step_left hidden-xs" style="margin-top: 15px !important;margin-bottom: 15px !important;">
						<div class="step-links">			
							<a class="btn noleft leftcss go_to_place step4_next" href="#">BACK</a>
							<a class="btn right rightcss" style="float:right" href="<?php echo base_url(); ?>home/make_logo">NEXT</a>
						</div>
					</div>
					
				</div>
		</div>
			</div>
				<div class="clearfix">&nbsp;</div>
				<div><img src="" id="img_captured"></div>
			</div>
		</div>
		</div>	
	</div>
 	</div>
	<?php $this->load->view('login_reg_form'); ?>
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
						<input type="email" name="emailT" id="emailTo" value="" class="form-control" placeholder="Enter Email"/>
					</fieldset>
				</form>
			</div>
		  <div class="modal-footer">
            <button type="button" class="btn red" id="image_send_withgal" name="image_send">Send</button>
          </div>
		  </div>
		</div>
	</div>
	<div class="col-xs-12 hidden-lg hidden-md hidden-sm nav_buttons_step_below">
		<div class="step-links">			
			<a class="btn left leftcss go_to_place step4_next" href="#">BACK</a>
			<a class="btn right rightcss" href="<?php echo base_url(); ?>home/make_logo">NEXT</a>
		</div>	
	</div>
</div>
</div>	
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script> 
<script>
$(document).ready(function () {
    var dataURL = {};
    $("#send_to_email").click(function() {
        
           html2canvas(document.getElementById('canvas_img')).then(function(canvas) {
               // document.body.appendChild(canvas);
                //console.log(canvas.toDataURL());  
                dataURL = canvas.toDataURL();
                
                
//var base64URL = canvas.toDataURL('image/jpeg').replace('image/jpeg', 'image/octet-stream');
$("img#img_captured").attr("src", dataURL);

            });
    });
});
</script>