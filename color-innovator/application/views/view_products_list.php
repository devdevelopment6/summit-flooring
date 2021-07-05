<?php if($applications!=false){ 
		foreach($applications as $app){
			$href= "#";
			$product = $this->common_model->get_single('application_products',array('id'=>$app['product_id']));
			if($product!=false){
				$main_product = $this->common_model->get_single('products',array('id'=>$product['main_product_id']));
				if($main_product!=false){
					$href = base_url().'front_end/products/'.$main_product['product_url']; 
				}
			}
?>
	<div class="col-md-4 col-sm-4 col-xs-12 single_product_section">
		<div class="col-md-12 col-sm-12 col-xs-12 single_product_section_inner scroll_used" >
			<?php if($product['product_name']!='' && file_exists(FCPATH.'uploads/application_products/'.$product['id'].'/'.$product['product_image']) && !is_dir(FCPATH.'uploads/application_products/'.$product['id'].'/'.$product['product_image'])){ ?>
				<a href="<?php echo $href; ?>" ><img src="<?php echo base_url(); ?>uploads/application_products/<?php echo $product['id'].'/'.$product['product_image']; ?>" style="height:60px;width: auto;"/></a>
			<?php } else { ?>
				<a href="<?php echo $href; ?>"><h4><?php echo $product['product_name']; ?></h4></a>
			<?php } ?>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h5>Area Size</h5>
				<div>
					<ul>
					<?php 
						$size_array= explode(",",$app['available_size']);
						if(count($size_array)>0){
							foreach($size_array as $size){
								$get_size = $this->common_model->get_single('area_size',array('id'=>$size));
								if($get_size!=false){ ?>
								<li><?php echo $get_size['size_name']; ?></li>
					<?php 
								}
							}
						}
					?>
					</ul>
				</div>	
			</div>
		</div>
	</div>
<?php }}else {  ?>
		<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:10px;margin-bottom:10px;">
			<h3>Products Not Available!!!</h3>
		</div>
<?php } ?>