<div class="container-fluid banner product product_category_page_banner"  style="padding:0px;position:relative;">
	<img src="<?php echo base_url();?>homepage_assests/banner/hospital-banner.jpg" style="width:100%;height:auto;" alt="indoor_product_banner_image" class="cust_banner_prod_cat" />
    <div class="container">
        <div class="banner_product">
            <div class="background_small_image"></div>
            <div class="banner_txt col-sm-12">
                <div class="bg_small_img"></div> 
                <h3 class="page_title common_class"><span><?php echo $product_1['name']; ?></span></h3>			
                <div class="row cust_container1">
                    <p class="col-md-12 common_class"><?php echo $product_1['category_content']; ?></p>
                </div>
            </div> 
        </div>
    </div>
</div>

<div class="container product_category_section2 cust_container2">
	<div class="row" id="f_start">
		
       <?php $i = 1;
		if($product!=false){
    	foreach($product as $p){
			
			/*if($p['banner_product_image'] == '' || $p['banner_product_image'] == 'Image.jpg')
			{
			
		?>  
        	 <div class='col-md-4 product_img_div'>
                <a href="<?php echo base_url();?>front_end/products/<?php echo $p['id'];?>"><img class="img_border img-responsive" title="<?php echo $p['product_name'];?>" src="<?php echo base_url(); ?>admin_assets/frontend/include/Image.jpg" alt="<?php echo $p['product_name'];?>"></a>
            </div>
            
           <?php } else {*/ ?>
            <div class='col-md-4 product_img_div'>
                <div class="image_tips" data-id="data_<?=$i;?>">
                	<a href="<?php echo base_url();?>front_end/products/<?php echo $p['product_url']; ?>">
                    	<?php if($p['banner_product_image'] == '' || $p['banner_product_image'] == 'Image.jpg') {?>
                        	<img class="img_border img-responsive" title="<?php echo $p['product_name'];?>" src="<?php echo base_url(); ?>homepage_assests/image/img-noimage.png" alt="<?php echo $p['product_name'];?>">
                            
                        <?php } else {?>
                        
                    	<img class="img_border img-responsive cust_indoor_image" title="<?php echo $p['product_name'];?>" src="<?php echo base_url(); ?>uploads/products_banner/<?php echo $p['banner_product_image'];?>" alt="<?php echo $p['product_name'];?>" />
                        
                        <?php } ?>
                    </a>
            		<span class="image_tips_hover" id="data_<?=$i;?>">
                    	<div class="hover_div section1">
                        	<a href="<?php echo base_url();?>front_end/products/<?php echo $p['product_url'];?>">
                            <!--<img src="<?php echo base_url(); ?>uploads/products_banner/<?php echo $p['banner_product_image'];?>" />	-->
                                <div id="tool_imgs"><?php echo mb_strimwidth($p['short_description'], 0, 150, "..."); ?></div>
                            </a>
                            <div class="hover_product_title"><a href="<?php echo base_url();?>front_end/products/<?php echo $p['product_url'];?>"><?php echo $p['product_name'];?></a></div>
                            <div class="btn_skewx">
                                <div class="text-skewx">
                                    <a href="<?php echo base_url();?>front_end/products/<?php echo $p['product_url'];?>">discover</a>
                                </div>
                            </div>
                        </div>
                    </span>
				</div>
            </div>
        
        <?php //} 
		$i++;} }?>
        
	 </div>
	
</div>

<script type="text/javascript">

	$(document).ready(function() {
		$(".image_tips_hover").css("display","block");
	});
</script>