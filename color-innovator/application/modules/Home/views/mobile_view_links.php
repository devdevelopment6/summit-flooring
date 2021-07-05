<!-- <div class="col-xs-12 hidden-md hidden-sm hidden-lg" style=" margin:10px auto;"> -->

	<?php if ($this->session->userdata('logedin_user') == "") { ?>

	  <div class="links login_section">
		<a href="#!" class="btn blue help_modal" ><i class="fa fa-question-circle"></i> Help</a>

		<a href="#!" class="btn blue login_btn_popup" data-toggle="modal" data-target="#myModal" id="login_btn">Login</a>

		<a href="#!" class="btn blue register_btn_popup" data-toggle="modal" data-target="#register-modal" id="register_btn">Register</a>

	  </div>

	<?php }else{ ?>

	<div class="links" style="text-align:center;">

		<a href="#!" class="btn blue help_modal" ><i class="fa fa-question-circle"></i> Help</a>

		<a href="<?php echo base_url(); ?>home/edit_account" class="btn blue">My Account</a>

		<a href="<?php echo base_url(); ?>home/view_gallery" class="btn blue">View Gallery</a>

		<a href="<?php echo base_url(); ?>home/logout" class="btn blue" >Logout</a>

	</div>

	<?php } ?>

	<div class="links logout_sec" style="display:none;" style="text-align:center;">

		<a href="#!" class="btn blue help_modal" ><i class="fa fa-question-circle"></i> Help</a>

		<a href="<?php echo base_url(); ?>home/edit_account" class="btn blue">My Account</a>

		<a href="<?php echo base_url(); ?>home/view_gallery" class="btn blue">View Gallery</a>

		<a href="<?php echo base_url(); ?>home/logout" class="btn blue" >Logout</a>

	</div>

<!-- </div> -->