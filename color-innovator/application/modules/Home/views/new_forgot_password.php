<div class="container">
<div class="main-wapper">  
    <!--======== Mid Containmer ========-->
    <div class="">
		<div class="mid-conttainer">
			<!-- Indor Out Door -->
			<form method="post" action="#" name="forgot-password-frm" id="forgot-password-frm" >
				<div class="col-sm-1 col-md-4 col-lg-4"></div>
				<div class="col-xs-12 col-sm-10 col-md-4 col-lg-4">
					<div class="slogan">
					 <!--<h3><?php echo $sitesettings['step_one_title']; ?></h3>-->
					 <h3 class="ltextsize">Forgot Password</h3>
					</div>
				
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" class="csrf_token" value="<?= $this->security->get_csrf_hash(); ?>" />
				
					<div style="margin-top: 50px;">
							<div class="row">
								<div class="form-group">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
										 <input type="email" placeholder="Email:" name="forgot_email" id="forgot_email" value="" class="fullsp" required>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="form-group">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
										<button type="submit" class="btn custblue text-right">Get Password</button>
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