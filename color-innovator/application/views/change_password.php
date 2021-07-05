<?php $this->load->view('notification'); ?>



<div class="row">

  <div class="col-xs-12"> 

    <!-- PAGE CONTENT BEGINS -->

    <form id="homecontent" class="form-horizontal" role="form" action="<?php echo base_url(); ?>admin/check_verify_password/" method="post">

      <div class="form-group">

        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Current Password </label>

        <div class="col-sm-9">

          <input type="password" id="current_password" placeholder="Current Password" class="col-xs-10 col-sm-5" name="current_password"/>

        </div>

      </div>

      <div class="form-group">

        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> New Password </label>

        <div class="col-sm-9">

          <input type="password" id="new_password" placeholder="New Password" class="col-xs-10 col-sm-5" name="new_password"/>

        </div>

      </div>

      <div class="form-group">

        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Retype New Password </label>

        <div class="col-sm-9">

          <input type="password" id="rpt_new_password" placeholder="Retype New Password" class="col-xs-10 col-sm-5" name="rpt_new_password"/>

        </div>

      </div>

      <div class="space-4"></div>

      <div class="clearfix form-actions">

        <div class="col-md-offset-3 col-md-9">

          <button class="btn btn-info" type="submit"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>

          &nbsp; &nbsp; &nbsp;

          <button class="btn" type="reset"> <i class="ace-icon fa fa-undo bigger-110"></i> Reset </button>

        </div>

      </div>

    </form>

  </div>

  <!-- /.col --> 

</div>

<!-- /.row -->																																																			 <script type="text/javascript">																																										 $(document).ready(function(){ 
  $("#homecontent").validate({
    rules: {
     	current_password: {
   		required:true
     	},																																																		 		new_password: {																																																					 		required:true																																																									 		},																																																							 		rpt_new_password: {																																																										 		required:true																																																									 		}
  },
  messages: {
   current_password: {
   required:" Current Password is required."
     },
   new_password: {
   required:" New Password is required."
     },
   rpt_new_password: {
   required:"Confirm Password is required."
     },
    },
   });
  });
</script>