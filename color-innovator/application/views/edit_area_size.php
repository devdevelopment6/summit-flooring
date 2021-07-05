<?php $this->load->view('notification'); ?>
<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Area Size</h5>
	</div>
	
<div class="widget-body">
	<div class="widget-main">
		<div id="page-wrapper">	
			<form class="form-horizontal" id="homecontent" action="<?php echo base_url(); ?>area_size/update_area_size" method="post" enctype="multipart/form-data">
				
                <div class="form-group">
					<label for="area_size_name" class="col-sm-2 control-label">Name : </label>
					<div class="col-sm-8">
						<input type="text" id="area_size_name" name="area_size_name" placeholder="Area Size"  value="<?php echo $area_size['size_name']; ?>" required />
				   </div>
				</div>
				<input type="hidden" name="size_id" id="size_id" value="<?php echo $area_size['id']; ?>" />
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