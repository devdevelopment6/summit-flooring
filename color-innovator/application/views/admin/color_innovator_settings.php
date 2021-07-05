<?php $this->load->view('notification'); ?>



<div class="row">

  <div class="col-xs-12"> 

    <!-- PAGE CONTENT BEGINS -->

    <form id="homecontent_settings" class="form-horizontal" role="form" action="<?php echo base_url(); ?>admin/manage_color_inovator_settings" method="post">

      <div class="form-group">

        <label class="col-sm-3 control-label no-padding-right" for="make_section_content"> Make Section Content </label>

        <div class="col-sm-9">

			<textarea placeholder="Make Section Content" id="make_section_content" name="make_section_content" class="col-xs-10 col-sm-5"><?php echo ($settings != false)?$settings['make_section_content']:"";?></textarea>

        </div>

      </div>

      <div class="form-group">

        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Login Section Content </label>

        <div class="col-sm-9">

			<textarea placeholder="Login Section Content" id="logo_section_content" name="logo_section_content" class="col-xs-10 col-sm-5"><?php echo ($settings != false)?$settings['logo_section_content']:"";?></textarea>

        </div>

      </div>

    
      <div class="space-4"></div>

      <div class="clearfix form-actions">

        <div class="col-md-offset-3 col-md-9">

          <button class="btn btn-info" type="submit"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>

         
        </div>

      </div>

    </form>

  </div>

  <!-- /.col --> 

</div>

<!-- /.row -->
<script type="text/javascript">
$(document).ready(function(){ 
  $("#homecontent_settings").validate({
    rules: {
     	make_section_content: {
   			required:true
     	},
		logo_section_content: {
   			required:true
     	},
  },
  messages: {
   make_section_content: {
   	required:" Make Section content is required."
   },
   logo_section_content: {
   		required:" Logo Section content is required."
    },
   
    },
   });
});
</script>