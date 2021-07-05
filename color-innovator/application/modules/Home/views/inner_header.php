   <!--======== HEADER ========-->
<input type="hidden" id="user_id" value="<?php if ($this->session->userdata('logedin_user') != "") {
				print_r($this->session->userdata['logedin_user']['id']);
			} ?>" >
      <header>

            <div class="col-sm-12 col-xs-12">
				<div class="submit-flooring col-xs-5 hidden-lg hidden-sm hidden-md pull-left">
					<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>home_assets/images/logo.png" alt=""></a>
				</div>
				<div class="col-xs-5  hidden-lg hidden-sm hidden-md pull-right">
					<div class="submit-flooring hidden-lg hidden-md hidden-sm">
						<a href="#!">
						  <img src="<?php echo base_url(); ?>home_assets/images/submit-flooring.png" alt="">
						</a>
					</div>
				</div>
					
              <figure class="hidden-xs">
				  
                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>home_assets/images/logo.png" alt=""></a>
				
              </figure>

              <div class="header-links col-xs-6 col-sm-6 col-lg-5 col-md-5">
                <a href="<?php echo base_url().'home'; ?>" class="<?php echo ($active_menu == 'choose')?"active":""; ?>">
                  <div class="cont">
                    <i class="main-img"><img src="<?php echo base_url(); ?>home_assets/images/choose.png" alt=""></i>
                    <i class="hover-img"><img src="<?php echo base_url(); ?>home_assets/images/choose-hover-icon.png" alt=""></i>
                    <span>Choose</span>
                  </div>
                </a>
				<a href="<?php echo base_url().'home/step_4'; ?>" class="<?php echo ($active_menu == 'mix')?"active":""; ?>">
                  <div class="cont">
                    <i class="main-img"><img src="<?php echo base_url(); ?>home_assets/images/mix.png" alt=""></i>
                    <i class="hover-img"><img src="<?php echo base_url(); ?>home_assets/images/mix-hover.png" alt=""></i>
                    <span style="padding-top:15px;">Mix</span>
                  </div>
                </a>

                <a href="<?php if($this->session->userdata('saved_album_session') && !empty($this->session->userdata('saved_album_session')) && ((array_key_exists(1,$this->session->userdata('saved_album_session')) && !empty($this->session->userdata['saved_album_session'][1])) || (array_key_exists(2,$this->session->userdata('saved_album_session')) && !empty($this->session->userdata['saved_album_session'][2])))){ echo base_url().'home/place'; }else if($this->session->userdata('saved_album_session')!='' && $this->session->userdata('created_image_data')==''){ echo base_url().'home/step_3'; }else{ echo '#'; } ?>" class="<?php echo ($this->session->userdata('saved_album_session') && !empty($this->session->userdata('saved_album_session')) && ((array_key_exists(1,$this->session->userdata('saved_album_session')) && empty($this->session->userdata['saved_album_session'][1])) && (array_key_exists(2,$this->session->userdata('saved_album_session')) && empty($this->session->userdata['saved_album_session'][2]))))?"go_to_place ":""; ?> <?php echo ($active_menu == 'place')?"active":""; ?>">
                  <div class="cont">
                    <i class="main-img"><img src="<?php echo base_url(); ?>home_assets/images/place.png" alt=""></i>
                    <i class="hover-img"><img src="<?php echo base_url(); ?>home_assets/images/place-hover.png" alt=""></i>
                    <span>Compose</span>
                  </div>
                </a>

                 <a href="<?php 
						  if($this->session->userdata('logedin_user') == ""){ 
							  //echo base_url().'home/step_4'; 
							  $saved_alb_session = $this->session->userdata('saved_album_session');
							  if(!empty($saved_alb_session)){
							  	if((array_key_exists(1,$saved_alb_session) && !empty($saved_alb_session[1])) || (array_key_exists(2,$saved_alb_session) && !empty($saved_alb_session[2]))){
									echo base_url().'home/step_4';
								}
								else{
									echo '#';
								}  
							  }
							  else{
							  	echo '#';
							  }
						  }
						  else 
						  {
							  echo base_url().'home/view_gallery';
						  } ?>"
						class="request_sample <?php 
						  if($this->session->userdata('logedin_user') == ""){ 
							  //echo base_url().'home/step_4'; 
							  $saved_alb_session = $this->session->userdata('saved_album_session');
							  if(empty($saved_alb_session)){
							  		echo 'no_swatch_created';
							  }
							  else if(!empty($saved_alb_session)){
								  if((array_key_exists(1,$saved_alb_session) && empty($saved_alb_session[1])) && (array_key_exists(2,$saved_alb_session) && empty($saved_alb_session[2]))){
								  	 echo 'no_swatch_created';
								  }
								  else if((array_key_exists(1,$saved_alb_session) && empty($saved_alb_session[1])) && !array_key_exists(2,$saved_alb_session)){
								  	echo 'no_swatch_created';
								  }
								  else if((array_key_exists(2,$saved_alb_session) && empty($saved_alb_session[2])) && !array_key_exists(1,$saved_alb_session)){
								  	echo 'no_swatch_created';
								  }
							  }
						  } 
							   ?>"
					>
                  <!--<div class="cont request_for_sample_form">-->
				  <div class="cont">	  
                    <i class="main-img"><img src="<?php echo base_url(); ?>home_assets/images/request-sample-icon.svg" alt=""></i>
                    <i class="hover-img"><img src="<?php echo base_url(); ?>home_assets/images/request-sample-hover-icon.svg" alt=""></i>
                    <span>Request Sample</span>
                  </div>
                </a>
				
					 <!-- <img src="https://theoneco.forttechnology.net/~summitflooring/color_conductor/home_assets/images/submit-flooring.png" alt="">-->
              </div>
              
              
              <div class="top-head col-xs-6 col-sm-12 col-lg-4 col-md-4 pull-left  <?php if($active_submenu != 'step_1' && $active_submenu != 'step_2' && $active_submenu != 'step_3'){ /*echo 'empaty_div';*/ } ?> ">
				  	 <?php 
						if($active_submenu == 'step_1'){
							echo $sitesettings['step_one_editor'];
						}
						else if($active_submenu == 'step_2'){
							echo $sitesettings['step_two_editor'];
						}
						else if($active_submenu == 'step_3'){
							echo $sitesettings['step_three_editor'];
						}
				  		else if($active_submenu == 'step_4'){
							echo $sitesettings['step_four_editor'];
						}
				  		else if($active_submenu == 'step_5'){
							echo $sitesettings['step_five_editor'];
						}
				  		
					?>
					
				</div>
              <div class="hidden-sm col-lg-2 col-xs-6 col-md-2 pull-right top-right-logo hidden-xs">
              	<!--<div class="submit-flooring" style="text-align: right;">
					
				 </div>-->
              </div>
            </div>
      </header>
	<!--======== Piano bar ========-->
     <div class="col-sm-12 col-xs-12 meanuheader">
       <div class="piano-bar">
          <a href="<?php echo base_url().'home'; ?>" class="<?php echo ($active_submenu == 'step_1' || $active_submenu == 'step_2' || $active_submenu == 'step_3' || $active_submenu == 'step_4' || $active_submenu == 'step_5' || $active_submenu == 'step_6')?"active":""; ?>" title="<?php echo $sitesettings['step_one_title']; ?>">1</a>
          <a href="<?php echo ($this->session->userdata('colors_category_list')!='')?base_url().'home/step_2':'#'; ?>" class="<?php echo ($this->session->userdata('colors_category_list')=='')?"go_to_step2 ":""; ?><?php echo ($active_submenu == 'step_2' || $active_submenu == 'step_3' || $active_submenu == 'step_4' || $active_submenu == 'step_5' || $active_submenu == 'step_6')?"active":""; ?>" title="<?php echo $sitesettings['step_two_title']; ?>">2</a>
          <a href="<?php echo ($this->session->userdata('colors_list')!='')?base_url().'home/step_3':'#'; ?>" class="<?php echo ($this->session->userdata('colors_list')=='')?"go_to_step3 ":""; ?> <?php echo ($active_submenu == 'step_3' || $active_submenu == 'step_4' || $active_submenu == 'step_5' || $active_submenu == 'step_6')?"active":""; ?>" title="<?php echo $sitesettings['step_three_title']; ?>">3</a>
          <a href="<?php echo ($this->session->userdata('created_image_data')!='' || $this->session->userdata('saved_album_session')!='')?base_url().'home/step_4':'#'; ?>" class="<?php echo ($this->session->userdata('created_image_data')=='' && $this->session->userdata('saved_album_session')=='')?"mix_it ":""; ?> <?php echo ($active_submenu == 'step_4' || $active_submenu == 'step_5' || $active_submenu == 'step_6')?"active":""; ?>" title="<?php echo $sitesettings['step_four_title']; ?>">4</a>
          <a href="<?php  if($this->session->userdata('saved_album_session') && !empty($this->session->userdata('saved_album_session')) && ((array_key_exists(1,$this->session->userdata('saved_album_session')) && !empty($this->session->userdata['saved_album_session'][1])) || (array_key_exists(2,$this->session->userdata('saved_album_session')) && !empty($this->session->userdata['saved_album_session'][2])))){ echo base_url().'home/place'; }else{ echo '#'; } ?>" class="<?php echo ($this->session->userdata('saved_album_session')=='' && $this->session->userdata('created_image_data')!='')?"go_to_place ":""; ?> <?php echo ($active_submenu == 'step_5' || $active_submenu == 'step_6')?"active":""; ?>" title="<?php echo $sitesettings['step_five_title']; ?>">5</a>
          <a href="<?php 
						  if($this->session->userdata('logedin_user') == ""){ 
							  //echo base_url().'home/step_4'; 
							  $saved_alb_session = $this->session->userdata('saved_album_session');
							  if(!empty($saved_alb_session)){
							  	if((array_key_exists(1,$saved_alb_session) && !empty($saved_alb_session[1])) || (array_key_exists(2,$saved_alb_session) && !empty($saved_alb_session[2]))){
									echo base_url().'home/step_4';
								}
								else{
									echo '#';
								}  
							  }
							  else{
							  	echo '#';
							  }
						  }
						  else 
						  {
							  echo base_url().'home/view_gallery';
						  } ?>"   
			 			class="<?php 
						  if($this->session->userdata('logedin_user') == ""){ 
							  //echo base_url().'home/step_4'; 
							  $saved_alb_session = $this->session->userdata('saved_album_session');
							  if(empty($saved_alb_session)){
							  		echo 'no_swatch_created';
							  }
							  else if(!empty($saved_alb_session)){
								  if((array_key_exists(1,$saved_alb_session) && empty($saved_alb_session[1])) && (array_key_exists(2,$saved_alb_session) && empty($saved_alb_session[2]))){
								  	 echo 'no_swatch_created';
								  }
								  else if((array_key_exists(1,$saved_alb_session) && empty($saved_alb_session[1])) && !array_key_exists(2,$saved_alb_session)){
								  	echo 'no_swatch_created';
								  }
								  else if((array_key_exists(2,$saved_alb_session) && empty($saved_alb_session[2])) && !array_key_exists(1,$saved_alb_session)){
								  	echo 'no_swatch_created';
								  }
							  }
						  } 
							   ?>" title="Step 6 - Request Sample">6</a>
       </div>
     </div>
