<?php $curl = current_url(); ?>	
<?php if ($this->session->userdata('logedin_user') == "") { ?>		
		  <div class="links login_section">
		  	<?php  if($curl == base_url()."home/step_3"){ ?>
		  		<a href="#" class="btn hidden-xs">
		  			<span class="reset_and_go_to_home">
		  		RESET
		  		</span>
		  	</a>
		  	<?php } ?>
				<a href="#" class="btn hidden-xs"><i class="fa  fa-phone-circle"></i> 1-877-496-3566 (9:00-5:00 EST)</a>
				<a href="#!" class="btn help_modal"><i class="fa  fa-question-circle"></i> Help</a>
				<a href="#" class="btn login_btn_popup" data-toggle="modal" data-target="#myModal" id="login_btn">Login</a>
				<a href="<?php echo base_url();?>index.php/home/reg" class="btn register_btn_popup" data-toggle="modal" data-target="#register-modal" id="register_btn">Register</a>
	 	 </div>
	 	<?php }else{ ?> 


			<div class="links logout_sec" style="">
			  <?php if($this->session->userdata('logedin_user') == ''){ ?>
				<a href="<?php echo base_url();?>index.php/home/login" class="btn hrl_3 custuc custlogin" data-toggle="modal" data-target="#" id="">Login</a>
				<a href="<?php echo base_url();?>index.php/home/reg" class="btn hrl_3 login_btn custuc custreg" data-toggle="modal" data-target="#" id="register_btn">Register</a>
			<?php } else { ?>				
				<a href="<?php echo base_url();?>index.php/home/logout" class="btn hrl_3 custuc custlogin" data-toggle="modal" data-target="#" id="">Logout</a>
				<a href="<?php echo base_url(); ?>home/edit_account" class="btn hrl_3 login_btn custuc custreg">My Account</a>			
			<?php } ?>

			
			
			</div>
		<?php } ?>

		
