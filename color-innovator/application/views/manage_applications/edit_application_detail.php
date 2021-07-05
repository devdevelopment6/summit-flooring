<?php $this->load->view('notification'); ?>
<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Application Details</h5>
	</div>
	
<div class="widget-body">
	<div class="widget-main">
		<div id="page-wrapper">	
			<form class="form-horizontal" id="add_app_details" action="<?php echo base_url(); ?>manage_applications/update_application_detail" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="select_product" class="col-sm-2 control-label">Select Product : </label>
					<div class="col-sm-8">
						<select name="select_product" id="select_product" >
							<option value="">-- Select --</option>
							<?php if($products!=false){
									foreach($products as $pro){
							?>	
							<option value="<?php echo $pro['id']; ?>" <?php echo ($pro['id']==$application_details['product_id'])?"selected":"";?>><?php echo $pro['product_name']; ?></option>
							<?php }} ?>
						</select>					
					</div>
				</div>
				<input type="hidden" id="app_id" name="app_id" value="<?php echo $application_details['id']; ?>" />
				<div class="form-group">
					<label for="select_category" class="col-sm-2 control-label">Select Category : </label>
					<div class="col-sm-8">
						<select name="select_category" id="select_category" >
							<option value="">-- Select --</option>
							<?php if($categories!=false){
									foreach($categories as $cat){
							?>	
							<option value="<?php echo $cat['id']; ?>"  <?php echo ($cat['id']==$application_details['category_id'])?"selected":"";?> ><?php echo $cat['category_name']; ?></option>
							<?php }} ?>
						</select>					
					</div>
				</div>
                <div class="form-group">
					<label for="select_sub_category" class="col-sm-2 control-label">Select Sub Category : </label>
					<div class="col-sm-8">
						<select name="select_sub_category" id="select_sub_category" >
							<option value="">-- Select --</option>
							<?php if($sub_categories!=false){
									foreach($sub_categories as $scat){
							?>	
							<option value="<?php echo $scat['id']; ?>"  <?php echo ($scat['id']==$application_details['sub_category_id'])?"selected":"";?> ><?php echo $scat['sub_category_name']; ?></option>
							<?php }} ?>
						</select>					
					</div>
				</div>
				<div class="form-group">
					<label for="select_size" class="col-sm-2 control-label">Select Size : </label>
					<div class="col-sm-8">
						<div class="row append_size">
							<?php
							$selected_array = array();
							if($application_details['available_size']!='' &&  $application_details['available_size']!=NULL){
								$selected_array = explode(",",$application_details['available_size']);
							}
							$new_selected_array = array_map(function($piece){
								return (int) $piece;
							}, $selected_array);
							$checkbox='';
							$flag=$this->common_model->get_single("application_products",array('id'=>$application_details['product_id']));
							if($flag!=false && $flag['available_size']!=NULL){
								$size_array=explode(",",$flag['available_size']);
								
								if(count($size_array)>0){
									foreach($size_array as $size){
										$get_size=$this->common_model->get_single('area_size',array('id'=>$size));
										if($get_size!=false){
											if(in_array($get_size['id'],$new_selected_array)){
												$checked = 'checked';
											}
											else{
												$checked = '';
											}
										$checkbox.='<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="'.$get_size['id'].'" '.$checked.'  />  '.$get_size['size_name'].'</div>';
										}
									}
								}
							}
							echo $checkbox;
							?>
						</div>	
						<label id="available_size[]-error" class="error" for="available_size[]"></label>
					</div>
				</div>
				<div class="form-group">
					<label for="application_status" class="col-sm-2 control-label">Status : </label>
					<div class="col-sm-8">
						<input type="checkbox" id="application_status" name="application_status" value="1" <?php echo ($application_details['status']==1)?"checked":""; ?> />
				   </div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-2">
					<button type="submit" class="btn-yellow btn" name="add">Update</button>
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