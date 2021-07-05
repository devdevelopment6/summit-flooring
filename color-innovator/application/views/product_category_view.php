<?php /*?>
<div class="banner banner_header_2 product_category_page" style="display:block !important">
	<div class="product_category_container_indx" style="background:url('<?php echo base_url();?>uploads/product_category_image/<?php echo $product['banner_image'];?>')">
		<div class="background_small_scr"></div>
		<div class="container-fluid">	
			<div class="row small_bgpic">
				<div class="background"></div>
				<div class="banner_content col-sm-12 new_header_content">
					<h2 class="product-category-title"><span><?php echo $product['title']; ?></span></h2>	
					<div class="row">
						<p class="col-md-2 col-sm-1"></p>
						<p class="text-right col-md-10 col-sm-10 top_content_category"><?php echo $product['header_content']; ?></p>
					</div>
				</div>					
			</div>
		</div>
	</div>
</div>

<div class="container-fluid banner product product_category_page"  style="padding:0px;position:relative;">
	<img src="<?php echo base_url();?>homepage_assests/new_images/3.jpg" style="width:100%;height:auto;" />
    <div class="container">
        <div class=" banner_product">
            <div class="background_small_image"></div>
            <div class="banner_content col-sm-12">
                <div class="bg_small_img"></div> 
                <h2 class="page-title"><span><?php echo $product['title']; ?></span></h2>
                <div class="subhead">
                    <img src="<?php echo base_url(); ?>homepage_assests/image/tile_square.png" class="tile_square">
                    NEXT STEP<sub>TM</sub><span>Walk Soft</span>
                </div>
                <span>Luxury Vinyl Tile</span>						
                <div class="row">
                    <p class="col-md-3 col-sm-1"></p>
                    <p class="text-right col-md-9 col-sm-10"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<?php echo $product['header_content']; ?>
                    </p>
                </div>
            </div> 
        </div>
    </div>
</div>
<?php */?>	
<div class="container-fluid banner product product_category_page_banner"  style="padding:0px;position:relative;">
	<img src="<?php echo base_url();?>homepage_assests/banner/hospital-banner.jpg" class="cust_product_banner" alt="product_category_banner_image" style="width:100%;height:auto;" />
    <div class="container">
        <div class="banner_product">
            <div class="background_small_image"></div>
            <div class="banner_txt col-sm-12">
                <div class="bg_small_img"></div> 
                <h3 class="page_title common_class"><span><?php echo $product['title']; ?></span></h3>			
                <div class="row cust_prod_container1">
                    <p class="col-md-12 common_class"><?php echo $product['header_content']; ?></p>
                </div>
            </div> 
        </div>
    </div>
</div>
<div class="container margin_top">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class='col-md-12 col-sm-12 col-xs-12 text-center'>
			<p class="common_class"><?php echo $product['product_content2']; ?></p>
		</div>
	</div>
</div>
<div class="container product_category_section2 cust_product_container2">
	<div class="row">
      <!--  <div class="col-md-12 last_section_category">
            <div class="last_section_title"><?php echo $product['title']; ?></div>
        </div>	-->
		<?php // foreach($categories as $cat){ ?>
		<div class='col-md-4'>
			<div class='product_category_box'>
				<center>
                	<h2><a href='<?php echo base_url();?>front_end/indoor_products' class="indoor_class"><img src="<?php echo base_url();?>homepage_assests/category_images/interior-icons.svg" alt="Indoor" class="indoor"/><img src="<?php echo base_url();?>homepage_assests/banner/interior-icons1.svg" alt="Indoor_product" class="indoor_hover"/>Indoor</a></h2>
                </center>
			</div>
		</div>
		<div class='col-md-4'>
			<div class='product_category_box'>
				<center>
                	<h2><a href='<?php echo base_url();?>front_end/outdoor_products' class="outdoor"><img src="<?php echo base_url();?>homepage_assests/category_images/exterior-icons.svg" alt="Outdoor_product" class="outdoor_img"/>
					<img src="<?php echo base_url();?>homepage_assests/banner/outdoor.svg" alt="Indoor" class="outdoor_hover"/>Outdoor</a></h2>
                </center>
			</div>
		</div>
		<div class='col-md-4'>
			<div class='product_category_box'>
				<center>
                	<h2><a href='<?php echo base_url();?>front_end/speciality_products' class="speciality"><img src="<?php echo base_url();?>homepage_assests/category_images/special-icons.svg" alt="Specialty_product" class="specialty_img" />
					<img src="<?php echo base_url();?>homepage_assests/banner/special-icons.svg" alt="Indoor" class="specialty_hover"/>Specialty</a></h2>
                </center>
			</div>
		</div>
		<?php // } ?>
	</div>
	 
    
          
	<div class="row margin_top custom_design_para">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo $product['custom_design_content']; ?>
		</div>
	</div>
	<div class="row custom_logo_colors_para">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo $product['custom_logo_colors_content']; ?>
		</div>
	</div>
	<div class="row custom_products_para">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo $product['custom_products_content']; ?>
		</div>
	</div>
	<div class="row inquiries_para">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo $product['inquiries_content']; ?>
		</div>
	</div>
	
	 <div class="row">
		<div class=" col-sm-12 text-center product_category_main">
			<div class="col-md-3 product_category_request_quote">
				<a class="sample_request request_quote_btn">
					<div class="new_browse_btn_product_category"><img src="<?php echo base_url();?>homepage_assests/new_images_1/summit-flooring-button-icon.svg" alt="summit-flooring-button-icon" class="top_learn_more_btn_category"><span>Request Quote</span></div>
				</a>
			</div>
		 </div>
	  </div>
	 <?php /*?><div class="row section1">
		<div class="col-md-4"></div>
			<div class="col-md-4 all_products">
				
				<div class="btn_skewx">
					<div class="text-skewx">
						<a class="sample_request">Request Quote</a>
					</div>
				</div>
								
			</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 sit_logo">
			<img src="<?php echo base_url(); ?>homepage_assests/image/gsa-logo.png">
			<img src="<?php echo base_url(); ?>homepage_assests/image/scs-logo.png">
			<img src="<?php echo base_url(); ?>homepage_assests/image/cgbc-logo.png">
			<img src="<?php echo base_url(); ?>homepage_assests/image/recycled-rubber-floor-logo.png">
			<img src="<?php echo base_url(); ?>homepage_assests/image/usgbc-logo.png">
			<img src="<?php echo base_url(); ?>homepage_assests/image/floor-score-logo.png">
		</div>
		<div class="col-md-2"></div>
	</div><?php */?>
</div>

<script type="text/javascript">

$(document).ready(function() {
	$(".indoor_hover").hide();
	$(".specialty_hover").hide();
	$(".outdoor_hover").hide();

	$("a.indoor_class").hover(
	  function () {
			$(".indoor_hover").show();
			$(".indoor").hide();
	  },
	  function () {
			$(".indoor_hover").hide();
			$(".indoor").show();
	  }
	);
		$("a.outdoor").hover(
	  function () {
			$(".outdoor_hover").show();
			$(".outdoor_img").hide();
	  },
	  function () {
			$(".outdoor_hover").hide();
			$(".outdoor_img").show();
	  }
	);
		$("a.speciality").hover(
	  function () {
			$(".specialty_hover").show();
			$(".specialty_img").hide();
	  },
	  function () {
			$(".specialty_hover").hide();
			$(".specialty_img").show();
	  }
	);
	
});
</script>