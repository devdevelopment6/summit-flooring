<?php $this->load->view('notification'); ?>
<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Appliation Product</h5>
	</div>
	
<div class="widget-body">
	<div class="widget-main">
		<div id="page-wrapper">	
			<form class="form-horizontal" id="add_app_product" action="<?php echo base_url(); ?>application_products/insert_application_product" method="post" enctype="multipart/form-data">
				
                <div class="form-group">
					<label for="product_name" class="col-sm-2 control-label">Product Name : </label>
					<div class="col-sm-8">
						<input type="text" id="product_name" name="product_name" placeholder="Product Name" required />
				   </div>
				</div>
				<div class="form-group">
					<label for="available_size" class="col-sm-2 control-label">Select Size : </label>
					<div class="col-sm-8">
						<div class="row">
						<?php 
						if($all_area_size!=false){
							for( $i=0; $i<count($all_area_size); $i++ ) { 
								
						?>
						<div class="col-sm-4"><input type="checkbox" name="available_size[]" id="available_size" value="<?php echo $all_area_size[$i]['id']; ?>" />  <?php echo $all_area_size[$i]['size_name']; ?></div>
						<?php   
							}
						} ?>
						</div>
						<label id="available_size[]-error" class="error" for="available_size[]"></label>
				   </div>
				</div>
				 <div class="form-group">
					<label for="product_name" class="col-sm-2 control-label">Product Title Image : </label>
					<div class="col-sm-8">
						<input type="file" id="product_image_name" name="product_image_name"  />
				   </div>
				</div>
				<div class="form-group">
					<label for="select_product" class="col-sm-2 control-label">Select Main Product : </label>
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
					<label for="product_status" class="col-sm-2 control-label">Status : </label>
					<div class="col-sm-8">
						<input type="checkbox" id="product_status" name="product_status" value="1" checked />
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
	$("#add_app_product").validate({
    rules:{
		product_name: {
   					required:true
     		},
		"available_size[]": {
            required:true,
          }
 	 },
 	messages:{
		product_name: {
	   				required:"Product Name is required."
		 	},
		"available_size[]": {
			required:"select atleast one size"
		}
    },
   });
});
</script>