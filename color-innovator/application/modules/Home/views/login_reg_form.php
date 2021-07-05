<style>
/*.modal-body {
    max-height: calc(100% - 120px);
    overflow-y: scroll;
}*/
</style> 
<!-- Log in Modal -->
<div id="dialog2"  class="modal  login-registration fade" >
	<div class="modal-dialog modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		</div>
		<div class="modal-body">
			<form>
				<fieldset>
					<label for="email">Email:</label>
					<input type="email" name="emailTo2" id="emailTo2" value="" class="form-control" placeholder="Enter Email"/>
					<input type="hidden" name="gallery_image" id="gallery_image" />
					<input type="hidden" name="swatch_id" id="swatch_id" />
						<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" class="csrf_token" value="<?= $this->security->get_csrf_hash(); ?>" />
				</fieldset>
			</form>
		</div>
	  <div class="modal-footer">
		<button type="button" class="btn " id="image_gallery_send" name="image_gallery_send">Send</button>
	  </div>
	  </div>
	</div>
</div>

<div id="dialog3"  class="modal  login-registration fade" >
	<div class="modal-dialog modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		</div>
		<div class="modal-body">
			<form>
			    	<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" class="csrf_token" value="<?= $this->security->get_csrf_hash(); ?>" />
				<fieldset>
					<label for="email">Email:</label>
					<input type="email" name="emailTo3" id="emailTo3" value="" class="form-control" placeholder="Enter Email"/>
					<!--<input type="hidden" name="swatch_id" id="swatch_id" />-->
				</fieldset>
			</form>
		</div>
	  <div class="modal-footer">
		<button type="button" class="btn " id="image_send_gal" name="image_send_gal">Send</button>
	  </div>
	  </div>
	</div>
</div>
    <div class="modal login-registration fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2>Login</h2>
          </div>
			<form id="login-frm" >
          <div class="modal-body">
            <ul class="form">
                <li>
                    	<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" class="csrf_token" value="<?= $this->security->get_csrf_hash(); ?>" />
                </li>
              <li>
                <input type="text" placeholder="Email:" name="email" id="email" value="">
              </li>
              <li>
                <input type="password" placeholder="Password:" name="pwd" id="pwd" value="">
              </li>
				<li><a href="#" class="forgot_password">Forgot Your Password?</a></li>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn ">Login</button>
          </div>
			</form>
        </div>
      </div>
    </div>
<div class="modal fade" id="forgot_password_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content modal-sm">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3>Forgot Password</h3>
          </div>
			<form id="forgot-password-frm" >
          <div class="modal-body">
            <ul class="form">
                <li>
                    	<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" class="csrf_token" value="<?= $this->security->get_csrf_hash(); ?>" />
                </li>
              <li>
                <input type="email" placeholder="Email:" name="forgot_email" id="forgot_email" value="" required>
              </li>
             
            </ul>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn">Get Password</button>
          </div>
			</form>
        </div>
      </div>
    </div>

	<!--<div class="modal login-registration fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2>Login</h2>
          </div>
			<form id="login-frm1" >
          <div class="modal-body">
            <ul class="form">
              <li>
                <input type="text" placeholder="Email:" name="email" id="email" value="">
              </li>
              <li>
                <input type="password" placeholder="Password:" name="pwd" id="pwd" value="">
              </li>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn ">Login</button>
          </div>
			</form>
        </div>
      </div>
    </div>-->

    <!-- Log in Modal -->
    <div class="modal login-registration fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2>Register</h2>
          </div>
			<form id="registration-frm" >
          <div class="modal-body">
            <ul class="form">
                <li>
                    	<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" class="csrf_token" value="<?= $this->security->get_csrf_hash(); ?>" />
                </li>
              <li>
                <input type="text" placeholder="Your Name:" name="name" id="name" value="">
              </li>
              <li>
                <input type="text" placeholder="Email:" name="newemail" id="newemail" value="">
              </li>
              <!--<li>
                <input type="password" placeholder="Password:" name="newpwd" id="newpwd" value="">
              </li>
              <li>
                <input type="password" placeholder="Confirm Password:" name="connewpwd" id="connewpwd" value="">
              </li>-->
				<li>
					<div class="g-recaptcha" data-sitekey="6Lf3WH8UAAAAAGAnQONl8l8bodoEW_7yPgozQwNm"></div>
					
					<label id="g-recaptcha-response-error" class="error" for="g-recaptcha-response"></label>
				</li>
				
            </ul>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn ">Register</button>
          </div>
			</form>
        </div>
      </div>
    </div>
<div class="modal fade" id="help-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="overflow-y:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
		  <div class="col-md-6">
            <h2><i class="fa fa-question-circle"></i> Help</h2>
		  </div>
		  <div class="col-md-6 text-right">
		  <img src="https://www.summit-flooring.com/color-conductor/home_assets/images/logo.png" alt="" width="150px">&nbsp;&nbsp;
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  </div>
          </div>
		  <div class="modal-body">
			 <div class="row">
				  <div class="col-md-12 col-sm-12 col-xs-12">
					  <h3 class="col-md-12 col-sm-12 col-xs-12"><label>The Color Conductor</label></h3>
					   <ul class="col-md-12 col-sm-12 col-xs-12">
							<li class="form-group">
								Welcome to Summit International Flooring’s Color Conductor. This tool has been designed to allow you to customize and create your very own rubber flooring tiles. Simply choose from an assortment of color options and then select how much of each color you would like to incorporate into your unique tile!
							</li>
						   <li class="form-group">
								Feeling creative? With the Color Conductor, you can create and save up to eight tile swatches for indoor applications! However, you must register an account in order to save your tile swatch. This will allow you to save and revisit your swatches for up to six months. Please note, if you do not make an account, your swatches will be deleted once you exit the Color Conductor. 
							</li>
						   <li class="form-group">
						   		Please refer to the instructions at the top of each page as you go through the process of building your custom tile. If you have any confusion along the way, helpful prompts will appear on the screen in order to assist you.
						   </li>
						   <li class="form-group">
						   		
							   		<h4><b>Building Guidelines:</b></h4>
							   
						   </li>
					   </ul>
					  <ul class="col-md-12 col-sm-12 col-xs-12">
					  	 <li class="form-group"><label>1. Maximum of 6 colors allowed per swatch tile.</label></li>
						 <li class="form-group"><label>2. Cork counts as a color.</label></li>
						 <li class="form-group"><label>3. The percentage of Cork cannot be changed. It is automatically set at 10%.</label></li>
						 <li class="form-group"><label>4. You can use the same color as a “fine” and “coarse”.  However, if you choose a “chunk” option, you can only choose the same color in a “coarse” option.</label></li>
						 <li class="form-group"><label>5. There is a minimum of 15% of “fine” size required for any swatch tile.</label></li>
						 <li class="form-group"><label>6. All color percentages are rounded off to the nearest 5%. IE: If you manually input a value of 62% of one color, it would be rounded down to 60%. If you input 63%, it would be rounded up to 65%. If you are using the sliders for percentage values, please note that they have been prebuilt to only increase/decrease by 5% increments.</label></li>
						 <li class="form-group"><label>7. If you choose to use “chunks” in your tile swatch, you will only be allowed to use a maximum of two different “chunk” colors. The total amount of chunks may not exceed 30%.</label></li>
						 <li class="form-group"><label>8. Each swatch tile you compose has a random pattern. This is meant to provide you with a composite look that is similar to the real product.</label></li>
						 <li class="form-group"><label>9. Make sure that the total of any tile is 100% before you “Mix It”.</label></li>
						 <li class="form-group"><label>10. You can request a sample of any swatch you create.</label></li>
						 <li class="form-group"><label>11. You can place your creations into sample room scenes.</label></li>
						 <li class="form-group"><label>12. Every swatch can be sent as an email should you need to send it to others, or simply just want to keep it for yourself. In addition, your custom room scene can also be sent via email.</label></li>
						 <li class="form-group"><label>13. If you’d like to keep your swatch tile creations, please register an account. This will allow for your creations to be saved for 6 months in your Gallery. Please note: only one Gallery can be created per email address.</label></li>
						 <li class="form-group"><label>14. If you choose not to register an account, your swatch creations will be erased when you leave the Color Conductor.</label></li>
					  </ul>
				  </div>
			 </div>	 
		  </div>
        </div>
      </div>
    </div>

 <div style="overflow-y:auto;" class="modal fade" id="request_sample" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2>Request a Product Sample</h2>
          </div>
			<form id="request_sample_frm" >
          <div class="modal-body">
			  <div class="row">
			      	<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" class="csrf_token" value="<?= $this->security->get_csrf_hash(); ?>" />
				  <div class="col-md-12 col-sm-12 col-xs-12">
					  
						  
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
					  <div class="col-md-6 col-sm-6 col-xs-12">
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
					   <div class="col-md-6 col-sm-6 col-xs-12">
							<ul class="form">
								<li>
									<label>Contact Information:</label>
								</li>
								<li class="form-group">
									<input type="text" placeholder="Your Name *" name="request_name" id="request_name" required>
								</li>
								<li class="form-group">
									<input type="text" placeholder="Company Name" name="request_company" id="request_company"  >
								</li>
								<li class="form-group">
									<input type="text" placeholder="Address *" name="request_address" id="request_address" required>
								</li>
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
							</ul>
						</div>
					  </div>
				  </div>
			  </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn blue">Submit</button>
          </div>
			</form>
        </div>
      </div>
    </div>
