    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  id="edit_color_frm" name="edit_color_frm" method="post" enctype="multipart/form-data">
              <div class="box-body">
				 
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="color_name">Name</label>
						<input type="text" name="color_name" id="color_name" class="form-control" placeholder="Name" value="<?php if($details!=false){ echo $details['name']; } ?>"  readonly />
					</div>
				</div>
				 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="color_haxcode">Company </label>
					  <input type="text" class="form-control" id="color_haxcode" name="color_haxcode" placeholder="Company" value="<?php if($details!=''){ echo $details['company']; } ?>" readonly />
					</div>
				</div>
				 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="color_haxcode">Address </label>
					  <input type="text" class="form-control" id="color_haxcode" name="color_haxcode" placeholder="Address" value="<?php if($details!=''){ echo $details['address']; } ?>" readonly />
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="color_haxcode">City </label>
					  <input type="text" class="form-control" id="color_haxcode" name="color_haxcode" placeholder="City" value="<?php if($details!=''){ echo $details['city']; } ?>" readonly />
					</div>
				</div>
				  <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="color_haxcode">State </label>
					  <input type="text" class="form-control" id="color_haxcode" name="color_haxcode" placeholder="State" value="<?php if($details!=''){ echo $details['state']; } ?>" readonly />
					</div>
				</div>
				 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="color_haxcode">Zipcode </label>
					  <input type="text" class="form-control" id="color_haxcode" name="color_haxcode" placeholder="Zipcode" value="<?php if($details!=''){ echo $details['zipcode']; } ?>" readonly />
					</div>
				</div>
				 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="color_haxcode">Email Id </label>
					  <input type="text" class="form-control" id="color_haxcode" name="color_haxcode" placeholder="Email Id" value="<?php if($details!=''){ echo $details['email_id']; } ?>" readonly />
					</div>
				</div>
				 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="color_haxcode">Telephone </label>
					  <input type="text" class="form-control" id="color_haxcode" name="color_haxcode" placeholder="Telephone" value="<?php if($details!=''){ echo $details['telephone']; } ?>" readonly />
					</div>
				</div>
				  <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="color_haxcode">Fax </label>
					  <input type="text" class="form-control" id="color_haxcode" name="color_haxcode" placeholder="Fax" value="<?php if($details!=''){ echo $details['fax']; } ?>" readonly />
					</div>
				</div>
				  <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="color_haxcode">Tell us about yourself </label>
					  <input type="text" class="form-control" id="color_haxcode" name="color_haxcode" placeholder="Tell us about yourself" value="<?php if($details!=''){ echo $details['yourself']; } ?>" readonly />
					</div>
				</div>
				   <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="color_haxcode">Please tell us a little about the project you’re working on. (i.e. commercial, residential, square footage) </label>
					  <textarea class="form-control" placeholder="Description" readonly ><?php if($details!=''){ echo $details['self_description']; } ?></textarea>
					</div>
				</div>
              </div>
              <!-- /.box-body -->
			
            </form>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
        
        </div>
      </div>
      <!-- /.row -->
    </section>
 
 