<?php $this->load->view('notification');

print_r($categories);die;
?>
<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Product Category</h5>
	</div>
	
<div class="widget-body">
	<div class="widget-main">
		<div id="page-wrapper">	
			<form class="form-horizontal" id="homecontent" action="<?php echo base_url(); ?>product_category/update_product_category/<?php echo $categories['id'];?>" method="post" enctype="multipart/form-data">
				<input type='hidden' name='category_id' value='<?php echo $$categories['id']; ?>'>
				<div class="form-group">
					<label for="category_name" class="col-sm-2 control-label">Name : </label>
					<div class="col-sm-8">
						<input type="text" id="category_name" name="category_name" value='<?php  echo $categories['name'];?>'  required/>
				   </div>
				</div>
                
				<div class="form-group">
					<label class="col-sm-2 control-label">Active Status</label>
					<div class="col-sm-8">
						<input type="radio" name="status" value="<?php $checked=($categories['status']==1)?"checked":""; echo $checked;?>">Active
						<input type="radio" name="status" value="<?php $checked=($categories['status']==0)?"checked":""; echo $checked;?>" >Not Active
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-2">
					<button type="submit" class="btn-yellow btn" name="update">update Category</button>
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