<?php $this->load->view('notification'); ?>
<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Application Details</h5>
	</div>
	
<div class="widget-body">
	<div class="widget-main">
		<div id="page-wrapper">	
			<form class="form-horizontal" id="add_app_details" action="<?php echo base_url(); ?>manage_applications/insert_application_details" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="select_product" class="col-sm-2 control-label">Select Product : </label>
					<div class="col-sm-8">
						<select name="select_product" id="select_product" >
							<option value="">-- Select --</option>
							<?php if($products!=false){
									foreach($products as $pro){
							?>	
							<option value="<?php echo $pro['id']; ?>"><?php echo $pro['product_name']; ?></option>
							<?php }} ?>
						</select>					
					</div>
				</div>
				
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
					<label for="select_sub_category" class="col-sm-2 control-label">Select Sub Category : </label>
					<div class="col-sm-8">
						<select name="select_sub_category" id="select_sub_category" >
							<option value="">-- Select --</option>
						</select>					
					</div>
				</div>
				<div class="form-group">
					<label for="select_size" class="col-sm-2 control-label">Select Size : </label>
					<div class="col-sm-8">
						<div class="row append_size"></div>	
						<label id="available_size[]-error" class="error" for="available_size[]"></label>
					</div>
				</div>
				<div class="form-group">
					<label for="application_status" class="col-sm-2 control-label">Status : </label>
					<div class="col-sm-8">
						<input type="checkbox" id="application_status" name="application_status" value="1" checked />
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
	$("#select_category").on("change",function(){
		var cat_id = $(this).val();
		$.ajax({
			url : "<?php echo base_url(); ?>manage_applications/get_sub_categories",
			type : "POST",
			data : {'cat_id': cat_id,},
			success : function (res){
				if(res!=false){
					$("#select_sub_category").html(res);
				}
			},
		});
	});
	$("#select_product").on("change",function(){
		var pro_id = $(this).val();
		$.ajax({
			url : "<?php echo base_url(); ?>manage_applications/get_products_size",
			type : "POST",
			data : {'pro_id': pro_id,},
			success : function (res){
				if(res!=false){
					$(".append_size").html(res);
				}
			},
		});
	});
	$("#add_app_details").validate({
    rules:{
		select_product:{
			required : true,
		},
		select_category:{
			required : true,
		},
		select_sub_category: {
				required:true
		},
		"available_size[]": {
            required:true,
          }
 	 },
 	messages:{
		select_product:{
			required : "Select Product",
		},
		select_category:{
			required : "Select category",
		},
		select_sub_category: {
	   				required:"Sub Category is required."
		 	},
		"available_size[]": {
			required:"select atleast one size"
		}
    },
   });
});
</script>