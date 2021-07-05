<style type="text/css">
	
</style>
<?php /*?><div class="container-fluid header_container"  >
    <div class="row first_div">
        <img  src="<?php echo base_url().'homepage_assests/image/landing-image-sample.jpg'; ?>"   class="first_image" />
        <div class="second_div">
            <img src="<?php echo base_url().'homepage_assests/image/landing-tile-texture-border.png'; ?>" />
        </div>
        <div  class="third_div">
            <div class="col-md-4 col-md-offset-8">
            	<h2 class="page-title"><span>Headline</span><br>Message</h2>
            	<div class="subhead">
                	<img src="<?php echo base_url(); ?>homepage_assests/image/tile_square.png" class="tile_square">
                	NEXT STEP<sub>TM</sub><span>Walk Soft</span>
            	</div>
            	<span class="lux_tit" >Luxury Vinyl Tile</span>
            
            	<p class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<?php echo $home['top_content']; ?></p>
            </div>
            <div class="col-md-4 col-md-offset-8" style="text-align:center;" >
                <div class="btn btn_skewx" >
                    <a href="<?php echo base_url();?>front_end/products">
                        <div class="text-skewx"><span>More Info</span></div>
                    </a>
                </div>
            </div>
        </div>
        <div  class="fourth_div">
            <img src="<?php echo base_url().'homepage_assests/image/landing-tile-right-border.png'; ?>"/>
        </div>
    </div>   
</div><?php */?>
<div class="container-fluid" style="padding:0px;position:relative;">
	<img src="<?php echo base_url();?>uploads/home_banner_image/<?php echo $home['banner_image'];?>" class="cust_banner_home" alt="homepage_banner" style="width:100%;height:auto;" />
	<div class="container" style="">	
        <div class="small_bgpic">
            <div class="background"></div>
            <div class="banner_content col-sm-12 new_header_content">
                <?php /*?><h2 class="page-title"><span>Headline</span><br>Message</h2><?php */?>
                <h2 class="page-title common_class"><span><?php echo $home['top_content_title']; ?></span></h2>
                <div class="subhead">
                    <img src="<?php echo base_url(); ?>homepage_assests/new_images_1/summit-flooring-nature-collection.png" class="" alt="dinofelx_nuture_collection">
                </div>					
                <div class="row">
                    <p class="col-md-2 col-sm-1"></p>
                    <p class="col-md-12 text-right col-md-10 col-sm-10 top_content common_class cust_home_contain2">&nbsp;<?php echo $home['top_content']; ?></p>
                </div>
                
                <div class="learn_more_button">
                    <div class="col-md-6 col-sm-1"></div>
                        <div class="col-md-4 col-sm-10 btn_skewx text-center home_text_skewx" >
                            <a href="<?php echo base_url();?>front_end/products/natures-collection">
                                <div class="text-skewx"><img src="<?php echo base_url(); ?>homepage_assests/new_images_1/summit-flooring-button-icon.svg" alt="dinoflex_button" class="top_learn_more_btn"><span>Learn More</span></div>
                            </a>
                        </div>
                    </div>
                </div>					
            </div>
        </div>
</div>
<!-- <div class="container-fluid banner banner_header_2" style="display:block !important;">
	<div class="banner_content_container_indx" style="background-image:url('<?php echo base_url();?>uploads/home_banner_image/<?php echo $home['banner_image'];?>')">
		<div class="background_small_scr"></div>
			<div class="container">	
                <div class="row small_bgpic">
                    <div class="background"></div>
                	<div class="banner_content col-sm-12 new_header_content">
						<?php /*?><h2 class="page-title"><span>Headline</span><br>Message</h2><?php */?>
                        <h2 class="page-title"><span><?php echo $home['top_content_title']; ?></span></h2>
						<div class="subhead">
							<img src="<?php echo base_url(); ?>homepage_assests/new_images_1/summit-flooring-nature-collection.png" class="">
						</div>					
						<div class="row">
							<p class="col-md-2 col-sm-1"></p>
							<p class="text-right col-md-10 col-sm-10 top_content"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<?php echo $home['top_content']; ?></p>
						</div>
						
						<div class="row learn_more_button">
							<div class="col-md-6 col-sm-1"></div>
								<div class="col-md-4 col-sm-10 btn_skewx text-center" >
									<a href="<?php echo base_url();?>front_end/main_content">
                                    	<div class="text-skewx"><img src="<?php echo base_url(); ?>homepage_assests/new_images_1/summit-flooring-button-icon.svg" class="top_learn_more_btn"><span>Learn More</span></div>
									</a>
								</div>
							</div>
						</div>					
					</div>
				</div>
			</div>
            
        </div> -->
        
		<div class="container  main_content cust_home_contain1">
            <div class="row">
            <h4 class="homepage_product_title common_class cust_size"><span><?php echo $home['middle_content_title_1'];?></span></h4>
			  <div class="col-md-12 common_class text-center" style="margin-bottom:3rem;">
			  <?php echo $home['middle_content_1']; ?>
			  </div>
              <div class="row">
                <?php if($get_latest_product != false) {
					foreach($get_latest_product as $product) {
						if(file_exists(FCPATH.'uploads/homepage_products_image/'.$product['homepage_product_image']) && !is_dir(FCPATH.'uploads/homepage_products_image/'.$product['homepage_product_image'])){
					?>
                    <div class="col-md-3 margin_top_bottom_15" align="center">
                    <div class="homepage_product_image">
                        <a href="<?php echo base_url();?>front_end/products/<?php echo $product['product_url']; ?>"><img src="<?php echo base_url(); ?>uploads/homepage_products_image/<?php echo $product['homepage_product_image'];?>" alt="dinoflex_product_image" class="img-responsive">
                       <div class="magnify_div"><img src="<?php echo base_url(); ?>homepage_assests/new_images_1/image-magnifying-glass.svg" class="img-responsive"></div>
                        </a>
                        </div> 
                        <div class="col-sm-12">   
                        <a href="<?php echo base_url();?>front_end/products/<?php echo $product['product_url']; ?>"><img src="<?php echo base_url(); ?>uploads/homepage_title_products_image/<?php echo $product['homepage_title_product_image'];?>"  alt="dinoflex_title_prduct_image" class="img-responsive show_img_title">
                        </a>
                        </div>
                    </div>
                    <?php } } } ?>
              </div>
                <div class="row">
				<div class="col-md-3 col-sm-10 new_bottom_browse text-center">
				<br/>
					<a href="<?php echo base_url();?>front_end/product_category">
						<div class="new_browse_btn cust_btn"><img src="<?php echo base_url(); ?>homepage_assests/new_images_1/summit-flooring-button-icon.svg" class="top_learn_more_btn" alt="dinoflex_button"><span>Browse Products</span></div>
					</a>
				</div>
				</div>
            </div>      
       	</div>
<!--<div class="banner_content_corner"><img src="image/landing-tile-right-border.png"></div>-->


<div class=" show_mid_content ">
		<div class="container section1">
			<div class="row">
				<h4 class="homepage_mid_content_title common_class"><?php echo $home['middle_content_title_2'];?></h4>
                <div class="col-md-12 homepage_mid_content common_class"><?php echo $home['middle_content_2']; ?></div>
			</div>
            
		</div>
</div>

<div class="custom_idea_section container margin_top">

	<div class="row">
    	<div class="col-md-12">
			<div class="col-md-6">
       			 <div class="custom_idea_content_title "><h4 class="common_class cust_size"><?php echo $home['middle_content_title_3'];?></h4></div>
                 <div class="fixed_height_div">
                     <div class="cust_img">
                        <img src="<?php echo base_url(); ?>homepage_assests/new_images_1/new_color_innovator_img.png" class="img-responsive" alt="dinoflex_color_innovator">
                     </div>
                     <div class="col-md-12 custom_idea_content common_class cust_home_contain3"><?php echo $home['middle_content_3'];?></div>
                 </div>
                <div class="col-md-4 col-sm-10 custom_idea_btn text-center show_in_mobile">
                    <a href="<?php echo base_url();?>">
                        <img src="<?php echo base_url(); ?>homepage_assests/new_images_1/create_button.png" class="new_create_img" alt="dinoflex_create_button">
                    </a>
                </div>
	   		</div>
		 	<div class="col-md-6">
        		 <div class="case_studies"><h4 class="common_class cust_size"><?php echo $home['bottom_content_title'];?></h4></div>
                 <div class="fixed_height_div">
                     <div class="cust_img"><img src="<?php echo base_url(); ?>homepage_assests/new_images_1/summit-flooring-casestudy-image.jpg" class="img-responsive" alt="dinoflex_case_study"></div><img src="<?php echo base_url();?>homepage_assests/new_images_1/image-magnifying-glass.svg" class="case_stydy_magnify" alt="dinoflex_case_stydy_magnify">
                     <div class="col-md-12 case_stydy_content common_class cust_home_contain3"><?php echo $home['bottom_content'];?></div>
                 </div>
                 <div class="col-md-4 col-sm-10 case_study_2 text-center show_in_mobile">
                    <a href="<?php echo base_url();?>front_end/main_content">
                        <div class="case_study_learn_more cust_btn"><img src="<?php echo base_url(); ?>homepage_assests/new_images_1/summit-flooring-button-icon.svg" class="top_learn_more_btn" alt="dinoflex_button"><span>Learn More</span></div>
                    </a>
                </div>
        </div>
        </div>
		<div class="col-md-12 margin_bottom hide_in_mobile">
			<div class="col-md-6">
				<div class="col-md-4 col-sm-10 custom_idea_btn text-center">
                    <a href="<?php echo base_url();?>">
                        <img src="<?php echo base_url(); ?>homepage_assests/new_images_1/create_button.png" class="new_create_img" alt="dinoflex_create_button">
                    </a>
                </div>
			</div>
			<div class="col-md-6">
				 <div class="col-md-4 col-sm-10 case_study_2 text-center">
                    <a href="<?php echo base_url();?>front_end/case_studies">
                        <div class="case_study_learn_more cust_btn"><img src="<?php echo base_url(); ?>homepage_assests/new_images_1/summit-flooring-button-icon.svg" class="top_learn_more_btn" alt="dinoflex_button"><span>Learn More</span></div>
                    </a>
                </div>
			</div>
		</div>
	</div>

</div>
<div class="show_testimonial_content">
	<div class="container section1">
		<div class="row">
			<div class="col-md-12 testimonial_content">
				<div class="testimonial_quotes_first">
				
					<div class="testimonial_quotes">"</div>
					<?php //echo $home['testimonial_content']; ?>
                    <div class="testimonial_content_2 common_class home_testimonial_content_2">It's a great product - durable, sustainable, easy to maintain and attractive. The installation in my office has become a great way of convincing my clients to use the products. If they are initially put off by the idea of rubber flooring made from recycled tires, see how great it looks quickly changes their minds.</div>
				</div><br />
				<div class="testimonial_content_3">
                	<div class="testimonial_content_4">Kevin Hanvey, MAIBC, &nbsp;</div><div class="testimonial_content_5"> Principal & Director of sustainability, Omicron Architecture</div>
                </div>
            </div>
		</div>
	</div>
</div>

<!--<div class="custom_idea_section container">
	<div class="container  main_content">
		<div class="row">
			<?php if($home['bottom_info_title'] != '') {?>
				<h4 class="homepage_product_title common_class"><span><?php echo $home['bottom_info_title'];?></span></h4>
			<?php } ?>
			<div class="row">
				<?php echo $home['bottom_info_content']; ?>
				<div class="col-md-3 col-sm-10 new_bottom_browse text-center">
					<a href="<?php echo base_url();?>front_end/product_category">
						<div class="new_browse_btn cust_btn"><img src="<?php echo base_url(); ?>homepage_assests/new_images_1/summit-flooring-button-icon.svg" class="top_learn_more_btn" alt="dinoflex_button"><span>Browse Products</span></div>
					</a>
				</div>
			</div>
			<div class="col-sm-1"></div>
		</div>
	</div>
	</div>-->
