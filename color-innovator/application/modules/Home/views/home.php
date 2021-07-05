<div class="container">
	<div class="main-wapper custpage1resc1">
		<!--======== Mid Containmer ========-->
		<div class="mid-conttainer">
			<div class="row">
				<!-- Indor Out Door -->
				<div class="col-xs-12	col-sm-12	col-md-12  col-lg-12">
					<div class="slogan">
					 <h3><?php echo $sitesettings['step_one_title']; ?></h3>
					 <!--<h3>CHOOSE APPLICATION</h3>-->
					 <p class="custdetailhome"><?php echo $sitesettings['step_one_editor']; ?></p>
					 <!--<p class="custdetailhome">All colors with a Coarse / Fine option may be selected twice.</p>-->
					</div>
				</div>
				
				
				 <input type="hidden" name="save_gallery_indoor_albums" id="save_gallery_indoor_albums" value="<?php echo ($gallery_indoor_albums!= false)?"1":"0"; ?>">
			    
			    
			     <input type="hidden" name="save_gallery_outdoor_albums" id="save_gallery_outdoor_albums" value="<?php echo ($gallery_outdoor_albums!= false)?"1":"0"; ?>">

				<div class="col-xs-12	col-sm-12	col-md-12 col-lg-12">
					<div class="indoor-outdoor go_to_step2">
					  <a  class="indoor <?php if($cat_array!='' && $cat_array['category'] == '1'){ echo 'active'; } ?>">
						  <i class="main-img">
							  <?php //include "indor_svg.php";?>
							  <img src="<?php echo base_url(); ?>home_assets/images/in_door_new.png" alt="">
						  </i>
						  <i class="hover-img">
							  <?php //include "indor_svg.php";?>
							  <img src="<?php echo base_url(); ?>home_assets/images/in_door_hover_new.png" alt="">
						  </i>
						  <span>Indoor</span>
					  </a>

					  <a  class="outdoor <?php if($cat_array!='' && $cat_array['category'] == '2'){ echo 'active'; } ?>">
						  <i class="main-img">
							  <?php //include "outdor_svg.php";?>
							  <img src="<?php echo base_url(); ?>home_assets/images/out_door_new.png" alt="">
						  </i>
						  <i class="hover-img">
							  <?php // include "outdor_svg.php";?>
							  <img src="<?php echo base_url(); ?>home_assets/images/out_door_hover_new.png" alt="">
						  </i>
						  <span>Outdoor</span>
					  </a>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('login_reg_form'); ?>
		<!--<div class="step-links" type="hidden">			
		  	<a class="btn right rightcss go_to_step2" href="#">NEXT</a>
		</div>-->
	</div>
</div>