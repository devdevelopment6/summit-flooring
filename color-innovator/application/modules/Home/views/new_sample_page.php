<div class="main-wapper">
<!--======== Mid Containmer ========-->
<div class="col-sm-12 col-xs-12">
	<div class="mid-conttainer">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
			<form id="request_sample_frm" >
          	<div class="slogan">
				 	<h3>Request a Product Sample</h3>
				</div>
			  <div class="row">
				  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					  
						  
					  <div class="col-md-12 col-sm-12 col-xs-12">
						  <ul class="col-md-12 col-sm-12 col-xs-12">
							<li class="form-group">
								In order for us to best serve you, please ensure that the following form is completely filled out. For additional sales and product information:<br>
								<!--Phone: 1.877.713.1899--> Email: <a href="mailto:info@summit-flooring.com">info@summit-flooring.com</a>
							</li>
						  </ul>
						  <div class="col-md-6 col-sm-6 col-xs-12">
							<img src="" style="width:100%;cursor:pointer;" class="zoom_single_image" id="swatch_image_request">
						  </div>
						  <div class="col-md-6 col-sm-6 col-xs-12">
							 <ul class="formula_list"></ul>
						  </div>
					  </div>
					 
					  <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top : 10px;">
					  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<ul class="form">
							<input type="hidden" name="swatch_image_path" id="swatch_image_path" />
							<input type="hidden" name="swatch_image_formula" id="swatch_image_formula" />
							<li class="form-group">
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
							</li>
							<li class="form-group">
								<label>Please tell us a little about the project you’re working on. (i.e. commercial, residential, square footage)</label>
								<br>
								<textarea name="project_description" id="project_description" placeholder="Description" ></textarea>
							</li>
							
						</ul>
					  </div>
					   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<ul class="form">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
									<div>
										<label>Contact Information:</label>
									</div>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
									<div class="form-group">
										<input type="text" placeholder="Your Name *" name="request_name" id="request_name" required>
									</div>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
									<div class="form-group">
										<input type="text" placeholder="Company Name" name="request_company" id="request_company"  >
									</div>
									<div class="form-group">
										<input type="text" placeholder="Address *" name="request_address" id="request_address" required>
									</div>
									<li class="form-group">
										<input type="text" placeholder="City *" name="request_city" id="request_city" required >
									</li>
									<li class="form-group">
										<input type="text" placeholder="State/Province *" name="request_state" id="request_state" required>
									</li>
									<li class="form-group">
										<input type="text" placeholder="Zip/Postal *" name="request_zipcode" id="request_zipcode" required >
									</li>
									<li class="form-group">
										<input type="email" placeholder="Email *" name="request_email" id="request_email" required >
									</li>
									<li class="form-group">
										<input type="text" placeholder="Telephone" name="request_telephone" id="request_telephone"  >
									</li>
									<li class="form-group">
										<input type="text" placeholder="Fax" name="request_fax" id="request_fax" >
									</li>
									<li class="form-group">
										<input type="checkbox" name="save_as_contact" id="save_as_contact" value="1" />  Save Contact information for next request
									</li>
								</div>	
							</ul>
						</div>
					  </div>
				  </div>
			  </div>
          
          <div class="modal-footer">
            <button type="submit" class="btn red">Submit</button>
          </div>
			</form>
		</div>	
	</div>	
</div>
<?php $this->load->view('login_reg_form'); ?>
</div>