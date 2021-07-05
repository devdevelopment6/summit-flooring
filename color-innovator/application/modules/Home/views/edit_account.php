<style>

.nav-tabs li a:focus,
.panel-heading a:focus {
    outline: none;
}
	.myaccount_tabs a{
		color:#0c4d7d;
	}
</style>

<div class="main-wapper">

     <?php $this->load->view('inner_header'); ?>

	 <div class="col-md-12 col-sm-12 col-xs-12" >
		  <?php $this->load->view('mobile_view_links'); ?>
		  <div class="mid-conttainer">
			   <div class="step-heading">
				   <div class="row" style="margin:0;">
						<div class="col-md-6 col-sm-6 col-xs-12" style="text-align:left;">
							  <h1>My Account</h1>
						</div>
					    <?php $this->load->view('desktop_view_links'); ?>
					</div>
				</div>
			  <div class="col-md-12 col-xs-12 col-sm-12">
				   <ul class="myaccount_tabs nav nav-tabs">
					  <li class="active"><a data-toggle="tab" href="#my_profile">My Profile</a></li>
					  <li><a data-toggle="tab" href="#my_contact_information">My Contact Information</a></li>
					</ul>

					<div class="tab-content">
					  <div id="my_profile" class="tab-pane active">
						<div class="col-md-3 col-sm-3 col-xs-12"></div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<form class="edit_account_frm" id="edit_account" name="edit_account" method="post" action = "<?php echo base_url().'home/update_account'; ?>">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="col-md-6 col-sm-6 col-xs-12 form_fields">
										<div class="form-group">
											<label>User Name</label>
											<input type="text" name="name" id="name" class="form-control" placeholder="Your Name" value="<?php echo $user_details['name']; ?>" required />
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12 form_fields">
										<div class="form-group">
											<label>Email Id</label>
											<input type="email" name="email" id="email" class="form-control" placeholder="Your Email" value="<?php echo $user_details['email']; ?>" required />
										</div>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="col-md-6 col-sm-6 col-xs-12 form_fields">
										<div class="form-group">
											<label>Password</label>
											<input type="password" name="password" id="password" class="form-control" placeholder="Password" />
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12 form_fields">
										<div class="form-group">
											<label>Confirm Password</label>
											<input type="password" name="con_password" id="con_password" class="form-control" placeholder="Confirm Password" />
										</div>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<!--<div class="col-md-6 col-sm-6 col-xs-12 form_fields">
										<div class="form-group">
											<label>Mobile Number</label>
											<input type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Mobile Number" value="<?php echo $user_details['mobile']; ?>" required />
										</div>
									</div>-->
									<div class="form-group col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
										<div  style="margin-bottom:10px;">
											<button type="submit" class="btn blue" >Update Settings</button>		
										
											<a href="#" class="btn delete_account" >Delete Account</a>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12"></div>
					  </div>
					  <div id="my_contact_information" class="tab-pane ">
						<div class="col-md-3 col-sm-3 col-xs-12"></div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<form class="edit_account_frm" id="edit_contact" name="edit_contact" method="post" action = "<?php echo base_url().'home/update_contact_information'; ?>">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="col-md-6 col-sm-6 col-xs-12 form_fields">
										<div class="form-group">
											<label>Address</label>
											<input type="text" name="address" id="address" class="form-control" placeholder="Address" value="<?php echo $user_details['address']; ?>" required />
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12 form_fields">
										<div class="form-group">
											<label>City</label>
											<input type="text" name="city" id="city" class="form-control" placeholder="City" value="<?php echo $user_details['city']; ?>" required />
										</div>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="col-md-6 col-sm-6 col-xs-12 form_fields">
										<div class="form-group">
											<label>State</label>
											<input type="text" name="state" id="state" class="form-control" placeholder="State"  value="<?php echo $user_details['state']; ?>" required />
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12 form_fields">
										<div class="form-group">
											<label>Zipcode</label>
											<input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Zipcode" value="<?php echo $user_details['zipcode']; ?>" />
										</div>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="col-md-6 col-sm-6 col-xs-12 form_fields">
										<div class="form-group">
											<label>Mobile Number</label>
											<input type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Mobile Number" value="<?php echo $user_details['mobile']; ?>" required />
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12 form_fields">
										<div class="form-group">
											<label>Fax</label>
											<input type="text" name="fax" id="fax" class="form-control" placeholder="Fax" value="<?php echo $user_details['fax']; ?>" />
										</div>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<!--<div class="col-md-6 col-sm-6 col-xs-12 form_fields">
										<div class="form-group">
											<label>Mobile Number</label>
											<input type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Mobile Number" value="<?php echo $user_details['mobile']; ?>" required />
										</div>
									</div>-->
									<div class="form-group col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
										<div  style="margin-bottom:10px;">
											<button type="submit" class="btn blue" >Update Information</button>		
										
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12"></div>
					  </div>
					</div>
			  </div>
			  
			  	
		 </div>
		   <?php $this->load->view('inner_footer'); ?>
	 </div>
</div>
<?php $this->load->view('login_reg_form'); ?>
<div class="modal login-registration fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h2>View Saved Swatch</h2>
			</div>
			<div class="modal-body">
			  <img src="" class="enlargeImageModalSource" style="width: 100%;">
			</div>
		  </div>
		</div>
	</div>


