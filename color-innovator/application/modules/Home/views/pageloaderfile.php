<div class="container">
	<div class="main-wapper custpage1resc1">
		<!--======== Mid Containmer ========-->
		<div class="">
			<div class="mid-conttainer">
				<!-- Indor Out Door -->
				<div class="col-xs-12	col-sm-12	col-md-12  col-lg-12">
					<div class="slogan">
					 <!--<h3><?php echo $sitesettings['step_one_title']; ?></h3>-->
					 <h3>CHOOSE APPLICATION</h3>
					 <!--<p><?php echo $sitesettings['step_one_editor']; ?></p>-->
					<p class="custdetailhome">All colors with a Coarse / Fine option may be selected twice.</p>
					</div>
				</div>

				<div class="col-xs-12	col-sm-12	col-md-12 col-lg-12">
					<div class="indoor-outdoor">
					  <a  class="indoor <?php if($cat_array!='' && $cat_array['category'] == '1'){ echo 'active'; } ?>">
						  <i class="main-img">
							  <?php //include "indor_svg.php";?>
							  <img src="<?php echo base_url(); ?>home_assets/images/in_door.png" alt="">
						  </i>
						  <i class="hover-img">
							  <?php //include "indor_svg.php";?>
							  <img src="<?php echo base_url(); ?>home_assets/images/in_door_hover.png" alt="">
						  </i>
						  <span>Indoor</span>
					  </a>

					  <a  class="outdoor <?php if($cat_array!='' && $cat_array['category'] == '2'){ echo 'active'; } ?>">
						  <i class="main-img">
							  <?php //include "outdor_svg.php";?>
							  <img src="<?php echo base_url(); ?>home_assets/images/out_door.png" alt="">
						  </i>
						  <i class="hover-img">
							  <?php // include "outdor_svg.php";?>
							  <img src="<?php echo base_url(); ?>home_assets/images/out_door_hover.png" alt="">
						  </i>
						  <span>Outdoor</span>
					  </a>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('login_reg_form'); ?>
	</div>
</div>