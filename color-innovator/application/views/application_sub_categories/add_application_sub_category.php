<?php $this->load->view('notification'); ?>
<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Application Sub Category</h5>
	</div>
	
<div class="widget-body">
	<div class="widget-main">
		<div id="page-wrapper">	
			<form class="form-horizontal" id="add_app_sub_cat" action="<?php echo base_url(); ?>application_sub_categories/insert_application_sub_category" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="select_category" class="col-sm-2 control-label">Select Category : </label>
					<div class="col-sm-8">
						<select name="select_category" id="select_category" >
							<option value="">-- Select --</option>
							<?php if($categories!=false){
									foreach($categories as $cat){
							?>	
							<option value="<?php echo $cat['id']; ?>"><?php echo $cat['category_name']; ?></option>
							<?php }} ?>
						</select>					
					</div>
				</div>
                <div class="form-group">
					<label for="sub_cat_name" class="col-sm-2 control-label">Sub Category Name : </label>
					<div class="col-sm-8">
						<input type="text" id="sub_cat_name" name="sub_cat_name" placeholder="Sub Category Name" required />
				   </div>
				</div>
				<div class="form-group">
					<label for="category_status" class="col-sm-2 control-label">Status : </label>
					<div class="col-sm-8">
						<input type="checkbox" id="category_status" name="category_status" value="1" checked />
				   </div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-2">
					<button type="submit" class="btn-yellow btn" name="add">Add</button>
					</div>								
				</div>
			</form>

 		</div>
	</div>
</div>

</div>			

<style>
	div.inline { float:left; }
	.clearBoth { clear:both; }
	.cls-chk{
		display:inline-block;
		margin-bottom:7px;
		width:30%;
	}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$("#add_app_sub_cat").validate({
    rules:{
		select_category:{
			required : true,
		},
		sub_cat_name: {
   					required:true
     		},
 	 },
 	messages:{
		select_category:{
			required : "Select category",
		},
		sub_cat_name: {
	   				required:"Sub Category Name is required."
		 	},
    },
   });
});
</script>