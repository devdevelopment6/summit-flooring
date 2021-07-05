<div class="container">
<div class="main-wapper">
<!--======== Mid Containmer ========-->
<div class="">
	<div class="mid-conttainer">
		<form method="post" action="#" id="registration-frm">
			<div class="col-sm-1 col-md-4 col-lg-4"></div>
			<div class="col-xs-12 col-sm-10 col-md-4 col-lg-4">
				<div class="slogan">
				 	<h3 class="ltextsize">Add YOUR ACCOUNT</h3>
				</div>
				<div style="margin-top: 50px;">
						<div class="row">
							<div class="form-group">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
									<label class="name_label">User Name</label>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
									<input type="text" class="form-control fullsp" name ="name" id="uname" placeholder="Your Name"/>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="form-group">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
									<label class="name_label">Email ID</label>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
									<input type="email" class="form-control fullsp" name="newemail" id="email" placeholder="Your Email"/>
								</div>
							</div>
						</div>
						<br>
						<!--<div class="row">
							<div class="form-group">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
									<label class="name_label">Mobile Number</label>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
									<input type="text" class="form-control fullsp" name="mobile" id="mobile" placeholder="Mobile Number"/>
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
									<input type="password" class="form-control fullsp" name="newpwd" id="newpwd" placeholder="Password"/>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="form-group">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
									<label class="name_label">Confirm Password</label>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
									<input type="password" class="form-control fullsp" name="connewpwd" id="connewpwd" placeholder="Confirm Password"/>
								</div>
							</div>
						</div>
						<br>-->
						
						<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" class="csrf_token" value="<?= $this->security->get_csrf_hash(); ?>" />
						
						
						
						<div class="row">
							<div class="form-group text-center">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
									<input type="submit" class="btn custblue" name="submit" value="SAVE"/>
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