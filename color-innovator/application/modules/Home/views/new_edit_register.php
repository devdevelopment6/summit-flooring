<div class="container">
	<div class="main-wapper">
<!--======== Mid Containmer ========-->
<div class="">
	<form class="edit_account_frm" id="edit_account" name="edit_account" method="post" action = "<?php echo base_url().'home/update_account'; ?>">
		<div class="mid-conttainer">
			<!-- Indor Out Door -->
				<div class="col-sm-1 col-md-2 col-lg-2"></div>
				<div class="col-sm-10 col-xs-12 col-md-8 col-lg-8">
					<div class="slogan">
					 	<h3>Edit YOUR ACCOUNT</h3>
					</div>
					<div style="margin-top: 50px;">
						<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_details['id']; ?>" />
						
						<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" class="csrf_token" value="<?= $this->security->get_csrf_hash(); ?>" />
				
						
						<div class="row regfirstrow">
							<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 editac">
								<div class="form-group">
									<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
										<label class="name_label">User Name</label>
									</div>
									<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
										<input type="text" class="form-control fullsp" name ="name" id="uname" placeholder="Your Name" value="<?php echo $user_details['name']; ?>"/>
									</div>
								 </div>
							</div>
							
							<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 editac">
								<div class="form-group">
									<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
										<label class="name_label">Email ID</label>
									</div>
									<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
										<input type="email" class="form-control fullsp" name="email" id="email" placeholder="Your Email" value="<?php echo $user_details['email']; ?>"/>
									</div>
								</div>
							</div>
						
							<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 editac">
								<div class="form-group">
									<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
										<label class="name_label">Mobile Number</label>
									</div>
									<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
										<input type="text" class="form-control fullsp" name="mobile" id="mobile" placeholder="Mobile Number" value="<?php echo $user_details['mobile']; ?>"/>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 editac">
								<div class="form-group">
									<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
										<label class="name_label">Password</label>
									</div>
									<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
										<input type="text" class="form-control fullsp" name="password" id="password" placeholder="Password" value=""/>
									</div>
								</div>
							</div>
						
							<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 editac">
								<div class="form-group">
									<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
										<label class="name_label">Confirm Password</label>
									</div>
									<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
										<input type="text" class="form-control fullsp" name="con_password" id="con_password" placeholder="Confirm Password" value=""/>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>				
				<div class="col-sm-1 col-md-2 col-lg-2"></div>
				
		</div>
		<div class="step-links custnewregblock">
			<div class="form-group">
				<input type="submit" class="btn custblue text-right" name="submit" value="SAVE"/>
				<a class="btn transreg text-right spacesideac leftcss delete_account" href="#">DELETE ACCOUNT</a>
			</div>
		</div>
	</form>
</div>
<?php $this->load->view('login_reg_form'); ?>
</div>
</div>