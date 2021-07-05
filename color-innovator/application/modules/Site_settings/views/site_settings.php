 <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Settings</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  id="update_settings" name="update_settings" method="post" action="<?php echo base_url().'site_settings/update_settings'?>" enctype="multipart/form-data">
              <div class="box-body">
				 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="step_one_title">Step 1 Title</label>
					  	<input type="text" name="step_one_title" id="step_one_title" class="form-control" placeholder="Step 1 Title" required value="<?php echo ($settings!=false)?$settings['step_one_title']:""; ?>" />
					</div>
				</div>
				  <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="step_one_editor">Step 1 Content</label>
					  <textarea id="step_one_editor" name="step_one_editor" class="editor_cls"><?php echo ($settings!=false)?$settings['step_one_editor']:""; ?></textarea>
					</div>
				</div>
				 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="step_two_title">Step 2 Title</label>
					  	<input type="text" name="step_two_title" id="step_two_title" class="form-control" placeholder="Step 2 Title" required value="<?php echo ($settings!=false)?$settings['step_two_title']:""; ?>" />
					</div>
				</div>
				  <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="step_two_editor">Step 2 Content</label>
					  <textarea id="step_two_editor" name="step_two_editor" class="editor_cls"><?php echo ($settings!=false)?$settings['step_two_editor']:""; ?></textarea>
					</div>
				</div>
				 <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="step_three_title">Step 3 Title</label>
					  	<input type="text" name="step_three_title" id="step_three_title" class="form-control" placeholder="Step 3 Title" required value="<?php echo ($settings!=false)?$settings['step_three_title']:""; ?>" />
					</div>
				</div>
				  <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="step_three_editor">Step 3 Content</label>
					  <textarea id="step_three_editor" name="step_three_editor" class="editor_cls"><?php echo ($settings!=false)?$settings['step_three_editor']:""; ?></textarea>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="step_four_title">Step 4 Title</label>
					  	<input type="text" name="step_four_title" id="step_four_title" class="form-control" placeholder="Step 4 Title" required value="<?php echo ($settings!=false)?$settings['step_four_title']:""; ?>" />
					</div>
				</div>
				  <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="step_four_editor">Step 4 Content</label>
					  <textarea id="step_four_editor" name="step_four_editor" class="editor_cls"><?php echo ($settings!=false)?$settings['step_four_editor']:""; ?></textarea>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="step_five_title">Step 5 Title</label>
					  	<input type="text" name="step_five_title" id="step_five_title" class="form-control" placeholder="Step 5 Title" required value="<?php echo ($settings!=false)?$settings['step_five_title']:""; ?>" />
					</div>
				</div>
				  <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					  <label for="step_five_editor">Step 5 Content</label>
					  <textarea id="step_five_editor" name="step_five_editor" class="editor_cls"><?php echo ($settings!=false)?$settings['step_five_editor']:""; ?></textarea>
					</div>
				 </div>
              </div>
              <!-- /.box-body -->
			 <div class="box-footer">
				 <div class="col-md-12 col-sm-12 col-xs-12">
                	<input type="submit" class="btn btn-primary" value="Update Settings">
				 </div>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
        
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
<script type="text/javascript">
    $(document).ready(function(){
	
        $("#update_settings").validate({
            rules:{
                step_one_title:{
                    required:true,
                },
                step_two_title:{
                    required: true,
                },
                step_three_title:{
                    required:true,
                },
				step_four_title:{
                    required:true,
                },
				step_five_title:{
                    required:true,
                },
            },
        });
    });
</script>
 