<div class="container">
<div class="main-wapper">
	<!--======== Mid Containmer ========-->
    <div class="">
		<div class="mid-conttainer">
			<!-- Indor Out Door -->
			<form method="post" action="#" name="login-frm" id="login-frm" >
				<div class="col-sm-1 col-md-4 col-lg-4"></div>
				<div class="col-xs-12 col-sm-10 col-md-4 col-lg-4">
					<div class="slogan">
					 <!--<h3><?php echo $sitesettings['step_one_title']; ?></h3>-->
					 <h3 class="ltextsize">LOGIN YOUR ACCOUNT</h3>
					</div>
					
					<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" class="csrf_token" value="<?= $this->security->get_csrf_hash(); ?>" />
				
					
					<div style="margin-top: 50px;">
							<div class="row">
								<div class="form-group">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
										<label class="name_label">Email ID</label>
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
										<input type="email" class="form-control fullsp" name="email" id="email">
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="form-group">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
										<label class="name_label">Password</label>
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
										<input type="password" class="form-control fullsp" name="pwd" id="pwd">
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="form-group">
									<div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
										<a href="<?php echo base_url(); ?>Home/forgot_password" class="forgot_password">Forgot Your Password?</a>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
										<input type="submit" class="btn custblue text-right" name="submit" value="LOGIN"/>
									</div>
								</div>	
							</div>	
						</div>
				</div>	
				<div class="col-sm-1 col-md-4 col-lg-4"></div>
				</form>
			</div>
		</div>
  <?php $this->load->view('login_reg_form'); ?>
</div>
</div>