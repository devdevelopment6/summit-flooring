
<div class="container">
<div class="main-wapper">
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
		    if(isset($image_session)){
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
    <div class="mid-conttainer">
		<!--<?php $this->load->view('mobile_view_links'); ?>-->
      	<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" >			
				<div class="placeinoutmain">
					<a class="btn palceinout select_place_category <?php echo ($this->session->userdata('place_category') == 1)?"active":""; ?>" data-cat = "1" >Indoor</a>	
					<a class="btn palceinout select_place_category <?php echo ($this->session->userdata('place_category') == 2)?"active":""; ?>" data-cat = "2">Outdoor</a>				
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" >			
<?php if($this->session->userdata('place_category') == 1){ ?>
		 <div class="">
			<div id="carousel" class="flexslider12">
			  <ul class="slides slider">
				<li class="img_opacity_new active" data-id="<?php echo base_url(); ?>slider_images/indoor-1.png">
				  <img src="<?php echo base_url(); ?>slider_images/indoor-1.png" alt="">
				</li>
				 <li class="img_opacity_new inactive" data-id="<?php echo base_url(); ?>slider_images/indoor-2.png">
				  <img src="<?php echo base_url(); ?>slider_images/indoor-2.png" alt="">
				</li>
				 <li class="img_opacity_new inactive" data-id="<?php echo base_url(); ?>slider_images/indoor-3.png">
				  <img src="<?php echo base_url(); ?>slider_images/indoor-3.png" alt="">
				</li>
				 <li class="img_opacity_new inactive" data-id="<?php echo base_url(); ?>slider_images/indoor-4.png">
				 <img src="<?php echo base_url(); ?>slider_images/indoor-4.png" alt="">
				</li>
				<li class="img_opacity_new inactive" data-id="<?php echo base_url(); ?>slider_images/indoor-5.png">
				  <img src="<?php echo base_url(); ?>slider_images/indoor-5.png" alt="">
				</li>
				<li class="img_opacity_new inactive" data-id="<?php echo base_url(); ?>slider_images/indoor-6.png">
				  <img src="<?php echo base_url(); ?>slider_images/indoor-6.png" alt="">
				</li>
				<li class="img_opacity_new inactive" data-id="<?php echo base_url(); ?>slider_images/indoor-7.png">
				  <img src="<?php echo base_url(); ?>slider_images/indoor-7.png" alt="">
				</li>
			  	<li class="img_opacity_new inactive" data-id="<?php echo base_url(); ?>slider_images/indoor-8.png">
				  <img src="<?php echo base_url(); ?>slider_images/indoor-8.png" alt="">
				</li>
				
			  </ul>
			</div>
		 </div>
		  <?php } ?>
		   <?php if($this->session->userdata('place_category') == 2){ ?>
		   <div class="">
			<div id="carousel1" class="flexslider12">
			  <ul class="slides slider">
				<li class="img_opacity_new active" data-id="<?php echo base_url(); ?>slider_images/outdoor-1.png">
				 <img src="<?php echo base_url(); ?>slider_images/outdoor-1.png" alt="">
				</li>
				<li class="img_opacity_new inactive" data-id="<?php echo base_url(); ?>slider_images/outdoor-2.png">
				  <img src="<?php echo base_url(); ?>slider_images/outdoor-2.png" alt="">
				</li>
				<li class="img_opacity_new inactive" data-id="<?php echo base_url(); ?>slider_images/outdoor-3.png">
				  <img src="<?php echo base_url(); ?>slider_images/outdoor-3.png" alt="">
				</li>
				<li class="img_opacity_new inactive" data-id="<?php echo base_url(); ?>slider_images/outdoor-4.png">
				 <img src="<?php echo base_url(); ?>slider_images/outdoor-4.png" alt="">
				</li>
				<!--<li class="img_opacity_new inactive" data-id="<?php echo base_url(); ?>slider_images/outdoor-5.png">
				  <img src="<?php echo base_url(); ?>slider_images/outdoor-5.png" alt="">
				</li>-->
				<li class="img_opacity_new inactive" data-id="<?php echo base_url(); ?>slider_images/outdoor-6.png">
				  <img src="<?php echo base_url(); ?>slider_images/outdoor-6.png" alt="">
				<!--</li>
				 <li class="img_opacity_new inactive" data-id="<?php echo base_url(); ?>slider_images/outdoor-7.png">
				 <img src="<?php echo base_url(); ?>slider_images/outdoor-7.png" alt="">
				</li>-->
				<li class="img_opacity_new inactive" data-id="<?php echo base_url(); ?>slider_images/outdoor-8.png">
				  <img src="<?php echo base_url(); ?>slider_images/outdoor-8.png" alt="">
				</li>
			  </ul>
			</div>
		</div>
		  <?php } ?>
			</div>
		</div>
		<div class="row">
        	<div class="custnewpage5 color-slider">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 custplacespacebelow1" >
				
				
				<div class="saved_result_list custplaceblock1">
					<div class="slogan custhead5">
						<!--<h3>PLACE</h3>-->
						<h3><?php echo $sitesettings['step_five_title']; ?></h3>
					</div>
							 			
					<!--<div class="color-formula" style="<?php if($cat_array=='' || $old_color_array==''|| $image_session==''){ echo 'display:none;'; } ?>" >
                <div class="title" style="padding:0 !important;">
					
				<input type="hidden" name="swatch_cat" id="swatch_cat" value="<?php echo $created_swatch_cat; ?>" />
				<div class="final-color">
				  <figure style="<?php if($cat_array=='' || $old_color_array==''|| $image_session==''){ echo 'display:none;'; } ?>">
					<img id = "result_image" src="<?php echo $img; ?>" alt="">
				  </figure>
				</div>
                
              </div>
			 <div class="links">
                <button type="button" class="btn red" id="save_to_swatch" name="save_to_swatch"  <?php //echo ($album_name!='')?"disabled":""; ?> >Save To Album</button>
				<button type="button" class="btn yellow" id="request_for_sample" name="request_for_sample" style="display:none;" >Request Sample</button>
              </div>
				
              <div class="name">
                <h3><?php echo $category_name; ?></h3>
              </div>

              <div class="formula">
                <h3>Your Formula</h3>
                <?php echo $html_formula; ?>
              </div>


            </div>-->
					
					<div class="swatch-gallery" >
						<?php 
							  if($this->session->userdata('place_category') == 1){ 
									$saved_albums = $this->session->userdata('saved_album_session');
									if($saved_albums!=''){ 
										if(array_key_exists(1,$saved_albums) && count($saved_albums[1])>0){
											echo '<div class="col-md-12 col-sm-12 col-xs-12"><h4 class="step_place_heading_2">Select Your Indoor Swatch</h4></div>
							<ul class="saved-swatch">';
									foreach($saved_albums[1] as $album){ 
										$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album));
										if($get_single_album['category_id'] == 1){
								?>
									<li style ="padding : 1px;" id="del<?php echo $get_single_album['id']; ?>" class="col-md-3 col-sm-4 col-xs-6 inner_div" data-id="<?php echo $get_single_album['id']; ?>">
										<figure>
											<img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" class="img-responsive zoom_image_small" data-id="<?php echo $get_single_album['id']; ?>">
										</figure><br>
										<a  href="<?php echo base_url();?>home/samplereq/<?php echo $get_single_album['id']; ?>" data-id="<?php echo $get_single_album['id']; ?>" class="request_sample_link request_for_sample_saved a_request_sample">Request Sample</a>
								   </li>
									
								<?php } } }} ?>
								<?php if($gallery_indoor_albums!=false){ 
										echo '<div class="col-md-12 col-sm-12 col-xs-12"><h4 class="custplacehead3">Indoor Albums From Gallery</h4></div>
							<ul class="saved-swatch">';
										foreach($gallery_indoor_albums as $album){	
								?>
								   <li style ="padding : 1px;" id="del<?php echo $album['id']; ?>" class="col-md-3 col-sm-4 col-xs-6 inner_div" data-id="<?php echo $album['id']; ?>">
										<figure>
											<img src="<?php echo base_url(); ?>images/<?php echo $album['org_image_name']; ?>" class="img-responsive zoom_image_small" data-id="<?php echo $album['id']; ?>">
										</figure><br>
									  	<a  href="<?php echo base_url();?>home/samplereq/<?php echo $album['id']; ?>" data-id="<?php echo $album['id']; ?>" class="request_sample_link request_for_sample_saved a_request_sample" >Request Sample</a>
								   </li>
								   

								<?php }}?>
							  </ul>
								<?php } ?>
							  <?php 
									if($this->session->userdata('place_category') == 2){ 
									$saved_albums = $this->session->userdata('saved_album_session');
									if($saved_albums!=''){ 
										if(count($saved_albums)>0 && array_key_exists(2,$saved_albums) && count($saved_albums[2])>0){
											echo '<div class="col-md-12 col-sm-12 col-xs-12"><h4 class="step_place_heading_2">Select Your Outdoor Swatch</h4></div>
							<ul class="saved-swatch">';
									foreach($saved_albums[2] as $album){ 
										$get_single_album = $this->common_model->get_single('saved_album',array('id'=>$album));
										if($get_single_album['category_id'] == 2){
								?>
									<li style ="padding : 1px;" id="del<?php echo $get_single_album['id']; ?>" class="col-md-3 col-sm-4 col-xs-6 inner_div" data-id="<?php echo $get_single_album['id']; ?>">
										<figure>
											<img src="<?php echo base_url(); ?>images/<?php echo $get_single_album['org_image_name']; ?>" class="img-responsive zoom_image_small" data-id="<?php echo $get_single_album['id']; ?>">
										</figure><br>
										<a href="<?php echo base_url();?>home/samplereq/<?php echo $get_single_album['id']; ?>" data-id="<?php echo $get_single_album['id']; ?>" class="request_sample_link request_for_sample_saved a_request_sample">Request Sample</a>
								   </li>
									
								<?php }} }} ?>
								<?php if($gallery_outdoor_albums!=false){
											echo '<div class="col-md-12 col-sm-12 col-xs-12"><h4 class="custplacehead3">Outdoor Albums From Gallery</h4></div>
							<ul class="saved-swatch">';									
										foreach($gallery_outdoor_albums as $album){	
								?>
								   <li style ="padding : 1px;" id="del<?php echo $album['id']; ?>" class="col-md-3 col-sm-4 col-xs-6 inner_div" data-id="<?php echo $album['id']; ?>">
										<figure>
											<img src="<?php echo base_url(); ?>images/<?php echo $album['org_image_name']; ?>" class="img-responsive zoom_image_small" data-id="<?php echo $album['id']; ?>">
										</figure><br>
									  	<a href="<?php echo base_url();?>home/samplereq/<?php echo $album['id']; ?>"  data-id="<?php echo $album['id']; ?>" class="request_sample_link request_for_sample_saved a_request_sample" >Request Sample</a>
								   </li>
								   

								<?php }} ?>
							  </ul>
				  				<?php } ?>
						  </div>
				</div>
				
	  		<?php if($this->session->userdata('logedin_user')!=''){ ?>
	  		<div class="col-12" style="float: left; padding: 15px;">
	  		        <p>
				        Saved  your album in gallery for future use: 
				    </p>
					<div class="save-to-gallery custstg">
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
					
					<button type="button" id="save_to_gallery1" name="save_to_gallery1" class="btn placecenres placesame">Save To Gallery</button>	
					</div>				
				</div>
	  		<?php } ?>
			</div>
				<!--<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 custplacespacebelow2">
			<?php if($this->session->userdata('place_category') == 1){ ?>
				 <ul class="slides imgbox">
					 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<li class="imgleft img_opacity active" data-id="<?php echo base_url(); ?>slider_images/color-conductor-lockerroom.png">
					  <img  src="<?php echo base_url(); ?>slider_images/color-conductor-lockerroom.png" alt="">
					</li>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <li class="imgright img_opacity" data-id="<?php echo base_url(); ?>slider_images/color-conductor-office.png">
					  <img  src="<?php echo base_url(); ?>slider_images/color-conductor-office.png" alt="">
					</li>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					  <li class="imgleft img_opacity" data-id="<?php echo base_url(); ?>slider_images/color-conductor-playplace.png">
					  <img  src="<?php echo base_url(); ?>slider_images/color-conductor-playplace.png" alt="">
					</li>
					</div >
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					  <li class="imgright img_opacity" data-id="<?php echo base_url(); ?>slider_images/color-conductor-den.png">
					 <img  src="<?php echo base_url(); ?>slider_images/color-conductor-den.png" alt="">
					</li >
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<li class="imgleft img_opacity" data-id="<?php echo base_url(); ?>slider_images/color-conductor-gym.png">
					  <img  src="<?php echo base_url(); ?>slider_images/color-conductor-gym.png" alt="">
					</li>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<li class="imgright img_opacity" data-id="<?php echo base_url(); ?>slider_images/color-conductor-library.png">
					  <img  src="<?php echo base_url(); ?>slider_images/color-conductor-library.png" alt="">
					</li>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<li class="imgleft img_opacity" data-id="<?php echo base_url(); ?>slider_images/Commercial-cutout.png">
					  <img  src="<?php echo base_url(); ?>slider_images/Commercial-cutout.png" alt="">
					</li>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <li class="imgright img_opacity" data-id="<?php echo base_url(); ?>slider_images/Office-cutout.png">
					  <img  src="<?php echo base_url(); ?>slider_images/Office-cutout.png" alt="">
					</li>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					  <li class="imgleft img_opacity" data-id="<?php echo base_url(); ?>slider_images/floor_view_1.png">
					  <img  src="<?php echo base_url(); ?>slider_images/floor_view_1.png" alt="">
					</li>
					</div >
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					  <li class="imgright img_opacity" data-id="<?php echo base_url(); ?>slider_images/floor_view_2.png">
					 <img  src="<?php echo base_url(); ?>slider_images/floor_view_2.png" alt="">
					</li >
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<li class="imgleft img_opacity" data-id="<?php echo base_url(); ?>slider_images/floor_view_3.png">
					  <img  src="<?php echo base_url(); ?>slider_images/floor_view_3.png" alt="">
					</li>
					</div>
				</ul>
		  	<?php } ?>
			<?php if($this->session->userdata('place_category') == 2){ ?>
			 	<ul class="slides imgbox">
				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<li class="imgleft img_opacity active" data-id="<?php echo base_url(); ?>slider_images/color-innovator-playground.png">
				 <img src="<?php echo base_url(); ?>slider_images/color-innovator-playground.png" alt="">
				</li>
				 </div>
				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<li class="imgright img_opacity" data-id="<?php echo base_url(); ?>slider_images/color-innovator-rooftop.png">
				  <img src="<?php echo base_url(); ?>slider_images/color-innovator-rooftop.png" alt="">
				</li>
				</div>
				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<li class="imgleft img_opacity" data-id="<?php echo base_url(); ?>slider_images/color-innovator-patio.png">
				  <img src="<?php echo base_url(); ?>slider_images/color-innovator-patio.png" alt="">
				</li>
				</div>
				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<li class="imgright img_opacity" data-id="<?php echo base_url(); ?>slider_images/color-innovator-outdoor-04.png">
				 <img src="<?php echo base_url(); ?>slider_images/color-innovator-outdoor-04.png" alt="">
				</li>
				</div>
				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 
				<li class="imgleft img_opacity" data-id="<?php echo base_url(); ?>slider_images/color-innovator-outdoor-05.png">
				  <img src="<?php echo base_url(); ?>slider_images/color-innovator-outdoor-05.png" alt="">
				</li>
				</div>
				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<li class="imgright img_opacity" data-id="<?php echo base_url(); ?>slider_images/color-innovator-outdoor-06.png">
				  <img src="<?php echo base_url(); ?>slider_images/color-innovator-outdoor-06.png" alt="">
				</li>
				</div>
				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				  <li class="imgleft img_opacity" data-id="<?php echo base_url(); ?>slider_images/color-innovator-outdoor-07.png">
				 <img src="<?php echo base_url(); ?>slider_images/color-innovator-outdoor-07.png" alt="">
				</li>
				</div>
				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<li class="imgright img_opacity" data-id="<?php echo base_url(); ?>slider_images/color-innovator-outdoor-08.png">
				  <img src="<?php echo base_url(); ?>slider_images/color-innovator-outdoor-08.png" alt="">
				</li>
				</div>
				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<li class="imgleft img_opacity" data-id="<?php echo base_url(); ?>slider_images/color-innovator-outdoor-09.png">
				  <img src="<?php echo base_url(); ?>slider_images/color-innovator-outdoor-09.png" alt="">
				</li>
				</div>
				
			  </ul>
			<?php } ?>
			</div>-->
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 custplacespacebelow3 nav_buttons_all_step_left">
				 <?php if($this->session->userdata('place_category') == 1){ ?>
			 	<div id="slider" class="flexslider">
				 <ul class="slides">
					<li  class="sliderpath">
						<img id="urldis" class="urldis" src="<?php echo base_url(); ?>slider_images/indoor-1.png" alt="">
					</li>
					<!--<li>
						<img src="<?php echo base_url(); ?>slider_images/color-conductor-lockerroom.png" alt="">
					</li>
					 <li>
						<img src="<?php echo base_url(); ?>slider_images/color-conductor-office.png" alt="">
					</li>
					 <li>
						<img src="<?php echo base_url(); ?>slider_images/color-conductor-playplace.png" alt="">
					</li>
					 <li>
						<img src="<?php echo base_url(); ?>slider_images/color-conductor-den.png" alt="">
					</li>
					<li>
						<img src="<?php echo base_url(); ?>slider_images/color-conductor-gym.png" alt="">
					</li>
					<li>
						<img src="<?php echo base_url(); ?>slider_images/color-conductor-library.png" alt="">
					</li>					 
					<li>
					  <img src="<?php echo base_url(); ?>slider_images/Commercial-cutout.png" alt="">
					</li>
					 <li>
					  <img src="<?php echo base_url(); ?>slider_images/Office-cutout.png" alt="">
					</li>
					  <li>
					  <img src="<?php echo base_url(); ?>slider_images/floor_view_1.png" alt="">
					</li>
					 <li>
					 <img src="<?php echo base_url(); ?>slider_images/floor_view_2.png" alt="">
					</li>
					<li>
					  <img src="<?php echo base_url(); ?>slider_images/floor_view_3.png" alt="">
					</li>-->
				  </ul>
				</div>
				<?php } ?>
				 <?php if($this->session->userdata('place_category') == 2){ ?>
				
				<div id="slider1" class="flexslider">
				 <ul class="slides">
					<li  class="sliderpath">
						 <img id="urldis" class="urldis" src="<?php echo base_url(); ?>slider_images/outdoor-1.png" alt="">
					</li>
					<!--<li>
					 	<img src="<?php echo base_url(); ?>slider_images/color-conductor-outdoor-04.png" alt="">
					</li>
					<li>
					 	<img src="<?php echo base_url(); ?>slider_images/color-conductor-outdoor-05.png" alt="">
					</li>
					<li>
					 	<img src="<?php echo base_url(); ?>slider_images/color-conductor-outdoor-06.png" alt="">
					</li>
					<li>
					 	<img src="<?php echo base_url(); ?>slider_images/color-conductor-outdoor-07.png" alt="">
					</li>
					<li>
					 	<img src="<?php echo base_url(); ?>slider_images/color-conductor-outdoor-08.png" alt="">
					</li>
					 <li>
					 	<img src="<?php echo base_url(); ?>slider_images/color-conductor-outdoor-09.png" alt="">
					</li>
					 <li>
					 	<img src="<?php echo base_url(); ?>slider_images/color-conductor-patio.png" alt="">
					</li>
					<li>
					 	<img src="<?php echo base_url(); ?>slider_images/color-innovator-playground.png" alt="">
					</li>
					<li>
					  	<img src="<?php echo base_url(); ?>slider_images/color-innovator-rooftop.png" alt="">
					</li>
					<li>
					  <img src="<?php echo base_url(); ?>slider_images/color-innovator-patio.png" alt="">
					</li>-->
				  </ul>
				</div>
				<?php } ?>
				
				<div class="links text-center">
					<button type="button" class="btn" id="send_to_email_gallery_swatch" name="send_to_email_gallery_swatch">Send To Email</button>
				  </div>
				
			</div>
	  		</div>
	  		
	  		<div class="step-links hidden-xs" style="width: 30%; float: right;padding: 15px;">			
					<a class="btn noleft leftcss" href="<?php echo base_url(); ?>home/step_4">BACK</a>
				<a class="btn right rightcss" href="<?php echo base_url(); ?>home/make">Add Background</a>
				</div>
	  		
	  		
      	</div>

 		</div>
   		<?php $this->load->view('login_reg_form'); ?>
		<div class="col-xs-12 hidden-lg hidden-md hidden-sm nav_buttons_step_below">	
			<div class="step-links">			
				<a class="btn left leftcss" href="<?php echo base_url(); ?>home/step_4">BACK</a>
				<a class="btn right rightcss" href="<?php echo base_url(); ?>home/make">Add Background</a>
			</div>
		</div>
  	</div>
</div>