<div class="container">
	<div class="main-wapper custviewgalcss">
	<?php 
		$first_gallery_swatch = false;
		if($gallery_indoor_albums!= false){ 
			$first_gallery_swatch = $gallery_indoor_albums[0];
		}
		else if($gallery_indoor_albums== false && $gallery_outdoor_albums!=false){
			$first_gallery_swatch = $gallery_outdoor_albums[0];
		}
		$return_array = array();
		if($first_gallery_swatch != false){
			$formula_list = '';
				$swatch = $this->common_model->get_single('saved_album',array('id'=>$first_gallery_swatch['id']));
				if($swatch!=false)
				{
					$formula = $swatch['org_image_name'];
					$formula1 = explode("-",$formula);
					$cnt = count($formula1) - 1;
					for($i=0;$i<count($formula1);$i++){
						$array = array();
						if($i!=$cnt)
						{
							$fomula_ele = explode("_",$formula1[$i]);
							//print_r($fomula_ele[1]);
							$array['percent'] = $fomula_ele[1];
							$array['r'] = $fomula_ele[2];
							$array['g'] = $fomula_ele[3];
							$array['b'] = $fomula_ele[4];
							$array['flecks_size'] = $fomula_ele[5];
							$array['id'] = $fomula_ele[0];
							$info[] = $array;
						}
						else if($i==$cnt){
							$info[] = array('time_stamp' => $formula1[$i]);
						}
					}			
				}
				for($i=0;$i<count($info)-1;$i++){
					$single_color = $this->common_model->get_single('color_room',array('id'=>$info[$i]['id']));
					if($single_color != false){
						$formula_list .= '<li class="col-md-12 col-sm-6 col-xs-12">
										<div class="col-md-3 col-xs-6 col-sm-6">
											<img src="'.base_url().'uploads/colors/'.$single_color['color_img'].'" style="">
										</div>
										<div class="col-md-9 col-xs-6 col-sm-6 gal">
											<h5 class="galtitle">'.$single_color['color_title'].'</h5>
											<h5>'.$info[$i]['flecks_size'].' - '.$info[$i]['percent'].'%</h5>
										</div>
									</li>';
					}
				}
				$return_array['catid'] = $swatch['category_id'];
				$return_array['id'] = $first_gallery_swatch['id'];
				$return_array['formula_list'] = $formula_list;
				$return_array['swatch_image'] = $swatch['org_image_path'];
				$return_array['swatch_name'] = $swatch['swatch_name'];
		}
?>

	<div class="mid-conttainer" >  
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="slogan custheadgal">
					<h3>Manage Your Gallery</h3>
				</div>			
			</div>
		</div>
		<div class="row">
			<div class="custgalpage" style="margin-bottom:20px;">
			<!--<div class="col-lg-1 col-md-1"></div>-->
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			    
			    <input type="hidden" name="save_gallery_indoor_albums" id="save_gallery_indoor_albums" value="<?php echo ($gallery_indoor_albums!= false)?"1":"0"; ?>">
			    
			    
			     <input type="hidden" name="save_gallery_outdoor_albums" id="save_gallery_outdoor_albums" value="<?php echo ($gallery_outdoor_albums!= false)?"1":"0"; ?>">

			  	<?php if($gallery_indoor_albums!= false){ ?>
				<div class="">
			   	<div class="col-md-12 col-sm-12 col-xs-12 save-gallery-new album_avail custsttitle"><h3 class="col-md-12 col-sm-12 col-xs-12 ">Indoor</h3></div>
				</div>
				<?php 
					foreach($gallery_indoor_albums as $album){
			 	?>
				<div class="">
				<div class="col-md-4 col-sm-4 col-xs-4 resdelimg" id="delete_sec<?php echo $album['id']; ?>">
				<div class="">
					<img src="<?php echo base_url().'images/'.$album['org_image_name']; ?>" style="width:100%;cursor:pointer;" class="view_single_image <?php echo (!empty($return_array) && $return_array['id'] == $album['id'])?"active":""; ?>"  data-id = "<?php echo $album['id']; ?>" />
				</div>
				<div class="" >
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 view-gallery-font" style="text-align:left;">
							<h4 class=""><?php echo $album['swatch_name']; ?><a href="#"><i data-id = "<?php echo $album['id']; ?>" data-catid="<?php echo $album['category_id']; ?>" class="fa fa-trash delete_swatch_gal right" style="color:red;"></i></a></h4>
							<a href="<?php echo base_url();?>home/samplereq/<?php echo $album['id']; ?>" data-id="<?php echo $album['id']; ?>" class="request_sample_link_gallery request_for_sample_saved a_request_sample" >Request Sample</a>
							<!---->
						</div>
						<!--<div class="col-md-3 col-sm-3 col-xs-6" style="text-align:right;" > 
							<i class="fa fa-trash delete_gallery_album" style="margin-top: 10px;margin-bottom: 10px;color:red;cursor:pointer;" data-id="<?php echo $album['id']; ?>" ></i>
						</div>-->
					</div>
					<?php /* <div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 view-gallery-font" >
							<p><?php echo str_replace(array("Your Formula","%"),array("<b>Your Formula</b><br>","%<br>"),$album['image_info']); ?></p>
						</div>

					</div> */ ?>
				</div>
			</div>
				</div>
		 		<?php }} ?>
			  	<?php if($gallery_outdoor_albums!= false){  ?>
				<div class="">
			  	<div class="col-md-12 col-sm-12 col-xs-12 custsttitle"><h3 class="col-md-12 col-sm-12 col-xs-12 custoutnew album_avail">Outdoor</h3></div>
				</div>
				<?php
					foreach($gallery_outdoor_albums as $album){
		 		?>
				<div class="">
				<div class="col-md-4 col-sm-4 col-xs-4 resdelimg" id="delete_sec<?php echo $album['id']; ?>">
				<div class="">
					<img src="<?php echo base_url().'images/'.$album['org_image_name']; ?>" style="width:100%;cursor:pointer;" class="view_single_image <?php echo (!empty($return_array) && $return_array['id'] == $album['id'])?"active":""; ?>"  data-id = "<?php echo $album['id']; ?>" />
				</div>
				<div class="" >
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 view-gallery-font" style="text-align:left;">
							<h4><?php echo $album['swatch_name']; ?><a href="#"><i data-id = "<?php echo $album['id']; ?>" data-catid="<?php echo $album['category_id']; ?>" class="fa fa-trash delete_swatch_gal right" style="color:red;"></i></a></h4>
							<a href="<?php echo base_url();?>home/samplereq/<?php echo $album['id']; ?>" data-id="<?php echo $album['id']; ?>" class="request_sample_link_gallery request_for_sample_saved a_request_sample" >Request Sample</a>
						</div>

					</div>

				</div>
			</div>
				</div>
		 		<?php }} ?>
		    </div>			    
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 div_left_border" >
			  <div id="view_swatch_details" <?php if(empty($return_array)){ echo 'style="display:none;"'; } ?> >
				<div class="col-sm-12 col-lg-5 col-md-5 col-xs-12 save-gallery-new save-gallery-new2">
				  <h3 style="margin-top: 0;" id="swatch_title"><?php echo (empty($return_array))?'SWATCH NAME':$return_array['swatch_name']; ?> </h3>
				  <?php 
					/*$cat_array = $this->session->userdata('colors_category_list');
					$image_session = $this->session->userdata('created_image_data'); 
					if($image_session!=''){
						$img = $image_session['img_src'];
						$html_formula = $image_session['html_formula'];
					}
					else
					{*/
						$img = (empty($return_array))?base_url()."home_assets/images/color-plate.png":$return_array['swatch_image'];
						$html_formula = '';
					//}
				  ?>
				<div class="custome-swatch" style="margin: 0 auto;">
					<div class="final-color final-color-gal" style="text-align:center;">
					  <figure>
						<img id = "result_image1" src="<?php echo $img; ?>" alt="">
					  </figure>

					  <div class="social">
						<a href="#!" class="zoom_swatch_image" data-src='<?php echo $img; ?>'> <img src="<?php echo base_url(); ?>home_assets/images/zoom.png" alt=""> </a>
						<a href="#" class="delete_swatch_from_gal" data-id = "<?php echo (!empty($return_array))?$return_array['id']:""; ?>" data-cat-id="<?php echo (!empty($return_array))?$return_array['catid']:""; ?>"> <img src="<?php echo base_url(); ?>home_assets/images/delete.png" alt=""> </a>
						<a href="#!" id="twit_share"> <img src="<?php echo base_url(); ?>home_assets/images/twitter.png" alt=""> </a>
						<a href="#!" id="fb_share"> <img src="<?php echo base_url(); ?>home_assets/images/facebook.png" alt=""> </a>
					  </div>
						<!--<div class="links">
							<button type="button" class="btn red" id="send_to_email_gal" name="send_to_email_gal">Send To Email</button>
						</div>-->
					</div>
				</div>
			  </div>
				<div class="col-sm-12 col-lg-7 col-md-7 col-xs-12 save-gallery-new save-gallery-new3 custgalformula nav_buttons_all_step">
					<h3 style="margin-top: 0;">Your Formula</h3>
				   <ul class="formula_list">
					   <?php if(empty($return_array)){ ?>
						<li class="col-md-12 col-sm-6 col-xs-12">
							<div class="col-md-3 col-xs-6 col-sm-6">
								<img src="<?php echo $img; ?>" />
							</div>
							<div class="col-md-9 col-xs-6 col-sm-6 gal">
								<h5 class="galtitle">Color Name</h5>
								<h5>Fine - 50%</h5>
							</div>
						</li>
					   <?php }else{ 
							echo $return_array['formula_list'];
						} ?>
				   </ul>
					<!--<div class="step-links hidden-xs">			
						<a class="btn left leftcss" href="<?php echo base_url(); ?>home/make">BACK</a>
					</div>-->
			   </div>
			 </div>
		  </div>
			<!--<div class="col-lg-1 col-md-1"></div>-->
		  </div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="nav_buttons_all_step">
					 <div class="step-links hidden-xs">	
							<a class="btn noleft leftcss" href="<?php echo base_url(); ?>home/make">BACK</a>
							<a href="<?php echo base_url(); ?>home/place" class="btn right rightcss placegal">Place Your Swatches into Floor</a>
					 </div> 
				 </div> 
			</div>
		</div>
	</div>
</div>
	<?php $this->load->view('login_reg_form'); ?>
	<!--<div class="col-xs-12 hidden-lg hidden-md hidden-sm nav_buttons_step_below">
		<div class="step-links">			
			<a class="btn left leftcss" href="<?php echo base_url(); ?>home/make">BACK</a>
		</div>
	</div>-->
	<div class="row">
		<div class="col-xs-12 hidden-lg hidden-md hidden-sm nav_buttons_step_below">		
			<div class="step-links">			
				<a class="btn left leftcss" href="<?php echo base_url(); ?>home/make">BACK</a>
				<a href="<?php echo base_url(); ?>home/place" class="btn right rightcss placegal">Place Your Swatches into Floor</a>
			</div>
		</div>
	</div>
	<div class="modal login-registration fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h2>View Saved Swatch</h2>
			</div>
			<div class="modal-body">
			  <img src="" class="enlargeImageModalSource" style="width: 100%;">
			</div>
		  </div>
		</div>
	</div>
</div>

