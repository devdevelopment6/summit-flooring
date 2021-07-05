<div id="myModal_zoom" class="modal">
	<div class="modal-dialog modal-lg">
	<div class="modal-content  ">
		<div class="modal-header">
			<span class="close">&times;</span>
		</div>
		<div class="modal-body">
			<img id="img01">
		</div>
	</div>
	</div>
</div>
<div id="forgot_password_modal" class="modal">
	<div class="modal-dialog modal-md">
	<div class="modal-content ">
		<div class="modal-header">
			<span>Forgot Your Password</span>
			<button type="button" class="close" data-dismiss="modal">
				<span class="fa fa-close"></span>
			</button>
		</div>
		<div class="modal-body">
			<form id="forgot_your_password">
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="forgot_email" id="forgot_email" placeholder="Enter Your Email"  class='form-control' />
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-success" >Get New Password</button>
				</div>	
			</form>
		</div>
	</div>
	</div>	
</div>	
<div class="modal fade login-register-form" role="dialog" id="">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span class="fa fa-close"></span>
				</button>
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#login-form"> Login <span class="fa fa-user"></span></a></li>
					<li><a data-toggle="tab" href="#registration-form"> Register <span class="fa fa-pencil"></span></a></li>
				</ul>
			</div>
			<div class="modal-body">
				<div class="tab-content">
					<div id="login-form" class="tab-pane fade in active">
						<form id="login-frm" name="login-frm">
							<div class="form-group">
								<label class="login_error error"></label>
							</div>
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
							</div>
							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
							</div>
							<div class="checkbox">
								<a class="forgot_pwd"> Forgot Your Password</a>
							</div>
							<button type="submit" class="btn btn-success">Login</button>
						</form>
					</div>
					<div id="registration-form" class="tab-pane fade">
						<form id="registration-frm" name="registration-frm">
							<div class="form-group">
								<label for="name">Your Name:</label>
								<input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
							</div>
							<div class="form-group">
								<label for="newemail">Email:</label>
								<input type="email" class="form-control" id="newemail" placeholder="Enter new email" name="newemail" required>
							</div>
							<div class="form-group">
								<div class="g-recaptcha" data-sitekey="6LcYZ0AUAAAAANSNv7WOxoLHEn229F7vDHQFaHVT"></div>
							</div>
							<label id="g-recaptcha-response-error" class="error" for="g-recaptcha-response"></label>
							<div class="form-group">
							<button type="submit" class="btn btn-success">Register</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade user-edit-form" role="dialog" id="">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span class="fa fa-close"></span>
				</button>
			
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#user-edit-form"> My Profile</a></li>
					<li><a data-toggle="tab" href="#contact-information-form"> Contact Information</a></li>
				</ul>
			
			</div>
			<div class="modal-body">
				<div class="tab-content">	
					<div id="user-edit-form" class="tab-pane fade in active">
						<form id="user-edit-frm" name="user-edit-frm">
							<div class="form-group">
								<label for="name">Your Name:</label>
								<input type="text" class="form-control" id="user_name" placeholder="Enter your name" name="user_name" required>
							</div>
							<div class="form-group">
								<label for="newemail">Email:</label>
								<input type="email" class="form-control" id="useremail" placeholder="Enter new email" name="useremail" required>
							</div>
							<div class="form-group">
								<label for="usernewpwd">Password:</label>
								<input type="password" class="form-control" id="usernewpwd" placeholder="password" name="usernewpwd" >
							</div>
							<div class="form-group">
								<label for="userconnewpwd">Confirm Password:</label>
								<input type="password" class="form-control" id="userconnewpwd" placeholder="Confirm password" name="userconnewpwd" >
							</div>
							
							<button type="submit" class="btn btn-success">Update Settings</button>
						</form>
					</div>
					<div id="contact-information-form" class="tab-pane fade">
						<form id="contact-information-frm" name="contact-information-frm">
							<div class="form-group">
								<label for="address">Address:</label>
								<input type="text" class="form-control" id="address" placeholder="Address" name="address" >
							</div>
							<div class="form-group">
								<label for="city">City:</label>
								<input type="text" class="form-control" id="city" placeholder="City" name="city" >
							</div>
							<div class="form-group">
								<label for="state">State:</label>
								<input type="text" class="form-control" id="state" placeholder="State" name="state" >
							</div>
							<div class="form-group">
								<label for="zipcode">Zipcode:</label>
								<input type="text" class="form-control" id="zipcode" placeholder="Zipcode" name="zipcode" >
							</div>
							<div class="form-group">
								<label for="mobile">Mobile Number:</label>
								<input type="text" class="form-control" id="mobile" placeholder="Mobile Number" name="mobile" >
							</div>
							<div class="form-group">
								<label for="fax">Fax:</label>
								<input type="text" class="form-control" id="fax" placeholder="Fax" name="fax" >
							</div>
							<button type="submit" class="btn btn-success">Update Contact Information</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="dialog1" title="Email your Swatch With Logo">
	<form>
		<fieldset>
			<label for="email">Email:</label>
			<input type="email" name="emailTo1" id="emailTo1" value="" class="form-control" placeholder="Enter Email"/>
		</fieldset>
	</form>
</div>
<div id="dialog" title="Email your Swatch">
	<form>
		<fieldset>
			<label for="emailTo">Email:</label>
			<input type="email" name="emailTo" id="emailTo" value="" class="form-control" placeholder="Enter Email"/>
		</fieldset>
	</form>
</div>
<?php /* <div class="modal fade request-sample-form" role="dialog" id="">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span class="fa fa-close"></span>
				</button>
				<h6> Request a Product Sample </h6>
			</div>
			<div class="modal-body">
				<div class="tab-content">	
					<div id="request-sample-form" class="tab-pane fade in active">
						<div class="form-group">
							<label>In order for us to best serve you, please ensure that the following form is completely filled out. For additional sales and product information:</p>
							<label>Email : <a href="mailto:info@summit-flooring.com">info@summit-flooring.com</a></label>
						</div>
						<form id="request_sample_frm" name="request_sample_frm">
							 <div class="row">
							 	<div class="col-md-12 col-sm-12 col-xs-12">
									 <div class="col-md-6 col-sm-6 col-xs-12">
										<img src="" style="width:100%;cursor:pointer;" class="zoom_single_image" id="swatch_image_request">
									  </div>
									  <div class="col-md-6 col-sm-6 col-xs-12">
										 <ul class="formula_list"></ul>
									  </div>
								 </div>
									<input type="hidden" name="swatch_image_path" id="swatch_image_path" />
									<input type="hidden" name="swatch_image_formula" id="swatch_image_formula" />
									 
								  <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top : 10px;">
									<div class="form-group  col-lg-6  col-md-12 col-sm-6 col-xs-12">
										<label for="current_project"><b>Current Project:</b></label>
										<input type="text" class="form-control col-12 col-lg-10 col-xl-10 col-md-12 col-sm-12" id="current_project" placeholder="Enter Current Project" name="current_project" value="">
									</div>
									<div class="form-group  col-lg-6 col-md-12 col-sm-6 col-xs-12">
										<label for="future_project"><b>Future Project</b></label>
										<input type="text" class="form-control  col-lg-10 col-xl-10 col-md-12 col-sm-12" id="future_project" placeholder="Enter Future Project" name="future_project">
									</div>
									<div class="form-group  col-lg-12 col-xs-12 col-md-12 col-sm-12">
										<label for="square_footage"><b>Square Footage of Project?</b></label>
										<input type="text" class="form-control col-12 col-lg-10 col-xl-10 col-md-12 col-sm-12" id="square_footage" placeholder="Enter Square Footage" name="square_footage">
									</div>
									  
									<div class="form-group col-lg-12 col-xs-12 col-md-12 col-sm-12 ">
										<label ><b>Which Products you are Interested in:</b></label>
									</div>
									<div class="form-group col-lg-12 col-xs-12 col-md-12 col-sm-12 ">
									<label class="left"><b>Interior Flooring</b></label><br>
									</div>
									<div class="form-group  col-lg-6 col-xs-12 col-md-6 col-sm-12 ">


										<input type="checkbox" name="interior_floor[]" value="Sport Mat Flooring">
										<label for="Sport_Mat_Flooring">Sport Mat Flooring</label><br>

										<input type="checkbox" name="interior_floor[]" value="Evolution Flooring">
										<label for="Evolution_Flooring">Evolution Flooring</label><br>

										<input type="checkbox" name="interior_floor[]" value="Stride Fitness Tiles">
										<label for="Stride_Fitness_Tiles">Stride Fitness Tiles</label><br>
										
										<input type="checkbox" name="interior_floor[]" value="Dinomat">
										<label for="Dinomat">Dinomat®</label><br>
									</div>
									<div class="form-group  col-lg-6 col-xs-12 col-md-6 col-sm-12e">

										<input type="checkbox" name="interior_floor[]" value="Next Step Walk Soft">
										<label for="Next_Step_Walk_Soft">Next Step Walk Soft</label><br>

										<input type="checkbox" name="interior_floor[]" value="Next Step Luxury">
										<label for="Next_Step_Luxury">Next Step Luxury</label><br>
										
										<input type="checkbox" name="interior_floor[]" value="Next Step High Impact">
										<label for="Next_Step_High_Impact">Next Step High Impact</label><br>

										
									</div>
									<div class="form-group col-lg-12 col-xs-12 col-md-12 col-sm-12 ">
									  <label class="left"><b>Exterior Surfacing</b></label><br>
									</div>
									<div class="form-group col-lg-12 col-xs-12 col-md-12 col-sm-12">


										<input type="checkbox" name="exterior_floor[]" value="Cushion Walk Pavers">
										<label for="Cushion_Walk_Pavers">Cushion Walk Pavers</label><br>

										<input type="checkbox" name="exterior_floor[]" value="Playground Tiles">
										<label for="Playground_Tiles">Playground Tiles</label><br>

										<input type="checkbox" name="exterior_floor[]" value="NuVista Tiles">
										<label for="NuVista_Tiles">NuVista Tiles</label><br>
									</div>
									<div class="form-group  col-lg-12 col-xs-12 col-md-12 col-sm-12">
										<label for="other_products"><b>Other Products</b></label>
										<input type="text" class="form-control" id="other_products" placeholder="Enter Other Products" name="other_products">
									</div>
									 <div class="col-md-6 col-sm-6 col-xs-12">

											<label>Tell us about yourself:</label><br>

											<input type="radio" name="yourself" id="Architect" value="Architect">
											<span for="Architect">Architect</span><br>

											<input type="radio" name="yourself" id="Building_Owner" value="Building_Owner">
											<span for="Building_Owner">Building Owner</span><br>


											<input type="radio" name="yourself" id="Facility_Manager" value="Facility_Manager">
											<span for="Facility_Manager">Facility Manager</span><br>

											<input type="radio" name="yourself" id="Interior_Design_Consultant" value="Interior_Design_Consultant">
											<span for="Interior_Design_Consultant">Interior Design Consultant</span><br>


											<input type="radio" name="yourself" id="Flooring_Contractor" value="Flooring_Contractor">
											<span for="Flooring_Contractor">Flooring Contractor</span><br>

											<input type="radio" name="yourself" id="General_Contractor" value="General_Contractor">
											<span for="General_Contractor">General Contractor</span>
											<br>

											<input type="radio" name="yourself" id="Retailer" value="Retailer">
											<span for="Retailer">Retailer</span><br>


											<input type="radio" name="yourself" id="Student" value="Student">
											<span for="Student">Student</span><br>


											<input type="radio" name="yourself" id="Home_Owner" value="Home_Owner">
											<span for="Home_Owner">Home Owner</span><br>

											<input type="radio" name="yourself" id="Other" value="Other" checked >
											<span for="Other">Other</span>
										 	<br>
										 	<label>Please tell us a little about the project you’re working on. (i.e. commercial, residential, square footage)</label>
											<br>
											<textarea name="project_description" id="project_description" placeholder="Description" class="form-control" ></textarea>
									 		<div class="form-group">
												<input type="checkbox" name="save_as_contact" id="save_as_contact" value="1" /> Save As Contact
											</div>	
									  </div>
									 <div class="col-md-6 col-sm-6 col-xs-12">
										<label>Contact Information:</label>
										<div class="form-group">
											<input type="text" placeholder="Your Name *" name="request_name" id="request_name" required class="form-control" >
										</div>
										<div class="form-group">
											<input type="text" placeholder="Company Name" name="request_company" id="request_company" class="form-control" >
										</div>
										<div class="form-group">
											<input type="text" placeholder="Address *" name="request_address" id="request_address" required class="form-control" >
										</div>
										<div class="form-group">
											<input type="text" placeholder="City *" name="request_city" id="request_city" required class="form-control" >
										</div> 
										<div class="form-group">
											<input type="text" placeholder="State/Province *" name="request_state" id="request_state" required class="form-control">
										</div>
										<div class="form-group">
											<input type="text" placeholder="Zip/Postal *" name="request_zipcode" id="request_zipcode" required class="form-control" >
										</div>
										<div class="form-group">
											<input type="email" placeholder="Email *" name="request_email" id="request_email" required class="form-control" >
										</div>
										<div class="form-group">
											<input type="text" placeholder="Telephone" name="request_telephone" id="request_telephone" class="form-control" >
										</div> 
										 <div class="form-group">
											<input type="text" placeholder="Fax" name="request_fax" id="request_fax" class="form-control" >
										</div> 
									</div>
								  </div>
							</div>
							<button type="submit" class="btn btn-success">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	*/ ?>