<style>
</style>
<div class="container">
	<div class="main-wapper custpage3">
		<?php 
		$old_color_array = $this->session->userdata('colors_list');
		$cat_array = $this->session->userdata('colors_category_list');
		
	//	print_r($old_color_array);
		?>


		<!--======== Mid Containmer ========-->
		<div class="mid-conttainer">
			<div class="row">
			<!-- Step header -->
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 hidden-lg hidden-md hidden-sm hidden-xs">
					<div class="col-md-2 col-lg-2 col-xs-12 col-sm-4" >
						<h4 class="step_3_heading_4" style=""><?php echo ($cat_array['category']=='1')?"Indoor":"Outdoor"; ?></h4>
					</div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 sloganpre">
				<div class="slogan custsloganstep3">
				<?php if($cat_array['category']=='1'){ ?>    
				 <h3><?php echo $sitesettings['step_three_title']; ?></h3>
				 <!--<h3>INNOVATION STATION</h3>-->
				 <?php echo $sitesettings['step_three_editor']; ?>
				 <?php }
				 else{ ?>
				 <h3><?php echo $sitesettings['step_three_title_2']; ?></h3>
				 <!--<h3>INNOVATION STATION</h3>-->
				 <?php echo $sitesettings['step_three_editor_2']; ?>
				
				 <?php } ?>
				</div>
			</div>
			
			
			
			<input type="hidden" name="save_gallery_indoor_albums" id="save_gallery_indoor_albums" value="<?php echo ($gallery_indoor_albums!= false)?"1":"0"; ?>">
			    
			    
     <input type="hidden" name="save_gallery_outdoor_albums" id="save_gallery_outdoor_albums" value="<?php echo ($gallery_outdoor_albums!= false)?"1":"0"; ?>">
			
			
			<!-- selected Colors -->
				<!--<div class="col-md-1 col-lg-1"></div>-->
				<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
					<div class="" >
						<h4 class="step_3_heading_4" style=""><?php echo ($cat_array['category']=='1')?"Indoor":"Outdoor"; ?></h4>
					</div>
					<div class="selected-color-final">
						<ul class="main-list">
							<!--default black-->
							<div class="custnewpage3 col-md-4 col-lg-4 col-xs-12 col-sm-6">

							<li id="delete_part1_0" data-count_var="0" class="">
								<figure> 
									<img src="<?php echo base_url(); ?>uploads/colors/	2019071810200953.jpg" alt="">
								</figure>
								<div class="content">
<?php //echo '<pre>'; print_r($old_color_array); ?>
									<div  class="name">Black</div>
									<ul class="coarse_fine">
										<li id="fine1_0" data-colid="0" data-count="0" class="fine_1 fine_1_1_0 active">
											<span class="fine" data-id="1" data-coarse="0" data-fine="1">Fine</span>
										</li>
										<li><span style="background-color: transparent;width: 75px;border-color: transparent;height: 24px;"></span></li>						
									</ul>
									
									<div class="slider_dropdown">
										<input type='button' value='-' class='qtyminus' field='slider_value_text1_0' /><input type="number" name="slider_value_text1_0" id="slider_value_text1_0" value="<?php if(!empty($old_color_array) && array_key_exists(0,$old_color_array)){ echo $old_color_array[0]['value']; } else { if($cat_array['category']=='1'){echo 5;}else{echo 20;} } ?>" min="0" max="100" class="slider_text_box" data-cnt="0" data-id="1" readonly /><input type='button' value='+' class='qtyplus' field='slider_value_text1_0' />
									</div>
								</div>
								
								
								<div class="color_slider slider_range fine" data-id='1' aria-disabled="false" style="width: 100%;" id="slide01" data-hexcode="#000000" data-count="0"  >
									
										
										
											<input type="hidden" name="fixed_min_value_black" id="fixed_min_value_black" value="<?php  if($cat_array['category']=='1'){echo 5;}else{echo 20;}  ?>" />
										
								
									  	<input type="hidden" name="slider_value1_0" id="slider_value1_0" value="<?php if(!empty($old_color_array) && array_key_exists(0,$old_color_array)){ echo $old_color_array[0]['value']; } else { if($cat_array['category']=='1'){echo 5;}else{echo 20;} } ?>" />

								  </div>
<?php //echo $old_color_array[0]['value']; ?>
								 <div class="filled-color center_text progress-value progress-value1_0"><?php if(!empty($old_color_array) && array_key_exists(0,$old_color_array)){ echo $old_color_array[0]['value']; } else { if($cat_array['category']=='1'){echo 5;}else{echo 20;} } ?>%</div>
							 </li>
							</div>
							<!--default black-->
							<?php 
							if($old_color_array!=''){ 
							$i=1;
//print_r($old_color_array);
							foreach($old_color_array as $array){
								$condition = array('status' => '1','id' => $array['id']);
								$get_color = $this->common_model->get_single('color_room',$condition);
								if($get_color!=false){
									//$cork_class = '';
									$readonly = '';
									if($get_color['id']!=1){
										//$cork_class ="cork_class";
									//	$readonly = 'readonly';
									//}
					  ?>

					<div class="custnewpage3 col-md-4 col-lg-4 col-xs-12 col-sm-6" >
					<li id="delete_part<?php echo $array['id']; ?>_<?php echo $i; ?>" data-count_var="<?php echo $i; ?>" class="<?php //echo $cork_class; ?>">
					  <a data-id="<?php echo $array['id']; ?>" data-count="<?php echo $i; ?>" class="remove"><span aria-hidden="true">×</span></a>
					  <figure> 
						  <img src="<?php echo base_url(); ?>uploads/colors/<?php echo $get_color['color_img']; ?>" alt="">

						</figure>
					  <div class="content">
						<div  class="name"> <?php echo $get_color['color_title']; ?> </div>
						 <ul class="coarse_fine">
								<?php if($get_color['fine'] == 1 && $get_color['coarse'] !=1 && $get_color['color_title']!='Black'){ ?>
								<li id="fine<?php echo $get_color['id']; ?>_<?php echo $i; ?>" data-colid="<?php echo $get_color['id']; ?>" data-count="<?php echo $i; ?>" class="fine_1 fine_1_<?php echo $get_color['id']; ?>_<?php echo $i; ?> active">
									<span class="fine" data-id="<?php echo $get_color['id']; ?>" data-coarse="<?php echo $get_color['coarse']; ?>" data-fine="<?php echo $get_color['fine']; ?>">Fine</span>
								</li>
								<li><span style="background-color: transparent;width: 75px;border-color: transparent;height: 24px;"></span></li>
								<?php } ?>
								<?php if($get_color['coarse'] == 1 && $get_color['fine'] !=1   && $get_color['color_title']!='Black'){ ?>
								<li id="coarse<?php echo $get_color['id']; ?>_<?php echo $i; ?>" data-colid="<?php echo $get_color['id']; ?>" data-count="<?php echo $i; ?>" class="coarse_1 coarse_1_<?php echo $get_color['id']; ?>_<?php echo $i; ?> active">
									<span class="coarse" data-id="<?php echo $get_color['id']; ?>" data-coarse="<?php echo $get_color['coarse']; ?>" data-fine="<?php echo $get_color['fine']; ?>">Coarse</span>
								</li>
								<li><span style="background-color: transparent;width: 56px;border-color: transparent;height: 24px;"></span></li>
								<?php } ?>

								<?php if($get_color['coarse'] == 1 && $get_color['fine']==1 && $get_color['color_title']!='Black'){ ?>
									<li id="fine<?php echo $get_color['id']; ?>_<?php echo $i; ?>" data-colid="<?php echo $get_color['id']; ?>" data-count="<?php echo $i; ?>" class="fine_1 fine_1_<?php echo $get_color['id']; ?>_<?php echo $i; ?> <?php echo ($array['fine']==1)?"active":""; ?>">
									<span class="fine" data-id="<?php echo $get_color['id']; ?>" data-coarse="<?php echo $get_color['coarse']; ?>" data-fine="<?php echo $get_color['fine']; ?>" >Fine</span>
								</li>
								<li id="coarse<?php echo $get_color['id']; ?>_<?php echo $i; ?>" data-colid="<?php echo $get_color['id']; ?>" data-count="<?php echo $i; ?>" class="coarse_1 coarse_1_<?php echo $get_color['id']; ?>_<?php echo $i; ?> <?php echo  ($array['coarse']==1)?"active":""; ?>">
									<span class="coarse" data-id="<?php echo $get_color['id']; ?>" data-coarse="<?php echo $get_color['coarse']; ?>" data-fine="<?php echo $get_color['fine']; ?>" >Coarse</span>
								</li>
								<?php } ?>

								<?php if($get_color['color_title']=='Black'){ ?>
								<li><span style="background-color: transparent;width: 69px;border-color: transparent;height: 24px;"></span></li>
								<li><span style="background-color: transparent;width: 69px;border-color: transparent;height: 24px;"></span></li>
								<?php } ?>
							</ul>
						<?php /*echo ($array['fine']==1)?"Fine":"Coarse";*/ ?>
						<div class="slider_dropdown">
							<input type='button' value='-' class='qtyminus' field='slider_value_text<?php echo $get_color['id'].'_'.$i; ?>' /><input type="number" name="slider_value_text<?php echo $get_color['id'].'_'.$i; ?>" id="slider_value_text<?php echo $get_color['id'].'_'.$i; ?>" value="<?php echo $array['value']; ?>" min="0" max="100" class="slider_text_box" data-cnt="<?php echo $i; ?>" data-id="<?php echo $array['id']; ?>"  <?php echo $readonly; ?> readonly /><input type='button' value='+' class='qtyplus' field='slider_value_text<?php echo $get_color['id'].'_'.$i; ?>' />
						</div>
					  </div>


					  <div class="color_slider slider_range <?php echo ($array['fine']==1)?"fine":"coarse"; ?>" data-id='<?php echo $array['id']; ?>' aria-disabled="false" style="width: 100%;" id="slide<?php echo $i.$array['id']; ?>" data-hexcode="<?php echo $get_color['hex_code']; ?>" data-count="<?php echo $i; ?>"  >
						  <input type="hidden" name="slider_value<?php echo $get_color['id'].'_'.$i; ?>" id="slider_value<?php echo $get_color['id'].'_'.$i; ?>" value="<?php echo $array['value']; ?>" />

					  </div>

					 <div class="filled-color center_text progress-value progress-value<?php echo $get_color['id'].'_'.$i; ?>">
						<?php //echo $array['value']; ?>0%
					 </div>
					</li>
					  </div>
					<?php } } $i++; }} ?>
						</ul>
					</div>		
					<!-- process bar -->
					<div class="processbar">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<h4>Progress</h4>
							</div>

							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="proces">
								0%
								</div>
							</div>
						</div>
						<div class="row" style="margin-top:10px;">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="progress_total" style="opacity:0;">
								</div>
								<div style="" class="progress_color_div">
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 nav_buttons_all_step hidden-xs">
								<div class="step-links">			
									<!--<a class="btn noleft2 leftcss reset_and_go_to_home" href="#">RESET</a>-->
									<a class="btn noleft leftcss" href="<?php echo base_url(); ?>home/step_2">BACK</a>
									<a class="btn right rightcss mix_it" href="#">MIX IT</a>
								</div>
							</div>
						</div>
						<input type="hidden" name="tot_progress_input" id="tot_progress_input" value="0" class="slidebgcolor">
					</div>
				</div>
				<!--<div class="col-md-1 col-lg-1"></div>-->
			</div>
		</div>
		<?php $this->load->view('login_reg_form'); ?>
		<div class="col-xs-12 hidden-lg hidden-md hidden-sm nav_buttons_step_below">
			<div class="step-links">			
				<a class="btn left leftcss" href="<?php echo base_url(); ?>home/step_2">BACK</a>
				<a class="btn right rightcss mix_it" href="#">MIX IT</a>
			</div>	
		</div>	
	</div>
</div>