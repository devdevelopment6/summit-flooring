<style type="text/css">
	.app_cat_heading{
		color: #556c11;
	}
	.view_more_section{
		text-align:center;
		padding: 10px 0 20px;
	}
	.single_product_section{
		margin-top:10px;margin-bottom:10px;
	}
	.single_product_section h4{
		color: #034d86;
	}
	.single_product_section h5{
		color:#f99f38;
	}
	.single_product_section_inner{
		height: 200px;
		border: 1px solid #0f0f0f30;
		border-radius: 10px;
	}
	.single_product_section_inner ul{
		padding:0 15px;
	}
	.loading {
		position: absolute;
		top: 50%;
		left: 50%;
	}
	.loading-bar {
		display: inline-block;
		width: 4px;
		height: 18px;
		border-radius: 4px;
		animation: loading 1s ease-in-out infinite;
	}
	.loading-bar:nth-child(1) {
		background-color: #3498db;
		animation-delay: 0;
	}
	.loading-bar:nth-child(2) {
		background-color: #c0392b;
		animation-delay: 0.09s;
	}
	.loading-bar:nth-child(3) {
		background-color: #f1c40f;
		animation-delay: .18s;
	}
	.loading-bar:nth-child(4) {
		background-color: #27ae60;
		animation-delay: .27s;
	}

	@keyframes loading {
		0% {
			transform: scale(1);
		}
		20% {
			transform: scale(1, 2.2);
		}
		40% {
			transform: scale(1);
		}
	}
</style>
<!--<div class="banner product application_page">
	<img src="<?php echo base_url();?>homepage_assests/banner/hospital-banner.jpg" style="width:100%;height:auto;" />
			<div class="banner_content_container">
				<div class="background_small_image"></div>
				<div class="container-fluid">

					<div class="row banner_product">

					<div class="banner_content col-sm-12">
						<div class="bg_small_img"></div>
						<h2 class="page-title"><span><?php echo $product_1['title']; ?></span></h2>
						<div class="subhead">
							<img src="<?php echo base_url(); ?>homepage_assests/image/tile_square.png" class="tile_square">
							NEXT STEP<sub>TM</sub><span>Walk Soft</span>
						</div>
						<span>Luxury Vinyl Tile</span>
						<div class="row">
							<p class="col-md-3 col-sm-1"></p>
							<p class="text-right col-md-9 col-sm-10 top_content_category"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<?php echo $product_1['header_content']; ?>
							</p>
						</div>

						<div class="row">
							<div class="col-md-6 col-sm-1"></div>
								<div class="col-md-4 col-sm-10 btn_skewx text-center" >
									<a href="<?php echo base_url(); ?>front_end/product_category"><div class="text-skewx"><span>more info</span>
												</div>
									</a>
								</div>
						</div>

					</div>

					</div>
				</div>
			</div>
</div>-->
<div class="container-fluid banner product product_category_page_banner" style="padding:0px;position:relative;">
	<img src="<?php echo base_url();?>uploads/location_category_image/<?php echo $location['banner_image'];?>" class="cust_banner_prod_cat" alt="location_category_banner_image" style="width:100%;height:auto;">
	<div class="container">
		<div class="banner_product">
			<div class="background_small_image"></div>
			<div class="banner_txt col-sm-12">
				<div class="bg_small_img"></div>
				<h2 class="page_title hosp_title"><span><?php echo $location['header_title'];?></span></h2>
				<div class="row cust_container1">
					<p class="col-md-12 common_class"><?php echo  $location['header_content'];?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container cust_container2">
	<div class="row">
		<div class="col-md-4">
			<div class="img_section">
				<img src="<?php echo base_url();?>uploads/location_category_image/<?php echo $location['section_image'];?>" class="cust_product_img" alt="location_category_section_image" style="width:100%;height:auto;" />
			</div>
		</div>

		<div class="col-md-8 cust_container3">

			<h4 class="common_class cust_size"><span><?php echo $location['section_title'];?></span></h4>
			<p class="col-md-12 common_class"><span><?php echo $location['section_content'];?></span></p>
		</div>
		<!--<input type="hidden" name="cat_id" id="cat_id" value="<?php echo $category_details['id']; ?>" />
		<input type="hidden" name="subcat_id" id="subcat_id" />
		<h3 class="app_cat_heading" ><?php echo $category_details['category_name']; ?></h3>
		<div class="row">
		<?php
		if($sub_categories!=false){
			foreach($sub_categories as $sub_cat){
				?>
			<div class="col-md-4 col-sm- col-xs-6"><span><a data-cat_id="<?php echo $category_details['id']; ?>" data-subcat_id="<?php echo $sub_cat['id']; ?>" class="get_products" style="cursor:pointer;font-weight: 600;"><?php echo $sub_cat['sub_category_name']; ?></a></span></div>
		<?php } } ?>
		</div>
		<hr>
		<div class="row products_section">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h3 class="sub_cat_name app_cat_heading" ></h3>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="loading" style="display:none;">
					  <div class="loading-bar"></div>
					  <div class="loading-bar"></div>
					  <div class="loading-bar"></div>
					  <div class="loading-bar"></div>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 append_products">
				</div>
			</div>
		</div>-->
	</div>


</div>
<div class="container-fluid banner product product_category_page_banner" style="padding:0px;position:relative;">
	<img src="<?php echo base_url();?>homepage_assests/banner/summit-flooring-about-02.jpg" class="cust_container4" alt="location_category_application_area" style="width:100%;height:auto;">
	<div class="container">
		<div class="row">
			<div class="banner_product inner_content">
				<div class="section_hosp2 col-md-12">
					<h4 class="common_class cust_size" style="color:#fff;"><span>Application Areas</span></h4>
				</div>
				<div class="content_txt col-md-4 col-xs-4 col-sm-4 col-lg-4">

					<h2 class="page_title"><span></span></h2>
					<ul class="listing common_class cust_listing">
						<li>Lobby</li>
						<li>Workout Facility</li>
						<li>Laundry/back of House</li>
					</ul>
				</div>
				<div class="content_txt col-md-4 col-xs-4 col-sm-4 col-lg-4">
					<h2 class="page_title"><span></span></h2>
					<ul class="listing common_class cust_listing">
						<li>Staff Area</li>
						<li>Retail/Gift Shop</li>
						<li>Outdoor Play Area</li>
					</ul>
				</div>
				<div class="content_txt col-md-4 col-xs-4 col-sm-4 col-lg-4">
					<h2 class="page_title"><span></span></h2>
					<ul class="listing common_class cust_listing">
						<li>Corridors</li>
						<li>Spa Area</li>
						<li>Roof top Patio</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="sub_cat_name app_cat_heading common_class cust_size">Corridors</h4>
		</div>
		<div class="col-md-4">
			<div class="corridore1 cust_corridore">
				<div class="corridore_img"><img src="<?php echo base_url();?>homepage_assests/banner/summit-flooring-sport-mat.png" alt="summit-flooring-sport-mat" ></div>
				<h4 class="page_title"><span>Area Size</span></h4>
				<ul class="common_class">
					<li>6mm</li>
				</ul>
			</div>
		</div>
		<div class="col-md-4">
			<div class="corridore2 cust_corridore">
				<div class="corridore_img"><img src="<?php echo base_url();?>homepage_assests/banner/summit-flooring-next-step-luxery.png" alt="summit-flooring-next-step-luxery"></div>
				<h4 class="page_title"><span>Area Size</span></h4>
				<ul class="common_class">
					<li>6mm</li>
					<li>8mm</li>
				</ul>
			</div>
		</div>
		<div class="col-md-4">
			<div class="corridore3 cust_corridore">
				<div class="corridore_img1"><img src="<?php echo base_url();?>homepage_assests/banner/summit-flooring-evolution.png" alt="summit-flooring-evolution"></div>
				<h4 class="page_title"><span>Area Size</span></h4>
				<ul class="common_class">
					<li>6mm</li>
					<li>8mm</li>
					<li>9mm</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var offset = 0;
	var	fetch = 6;
	var catid = $("#cat_id").val();
	var subcatid = $("#subcat_id").val();
	$(document).ready(function(){
		$(".view_more").hide(0);
		$(".get_products").on("click",function(){
			subcatid  = $(this).data('subcat_id');
			catid = $("#cat_id").val();
			$("#subcat_id").val(subcatid);
			initialize();
			get_products();
			$('html, body').animate({
				scrollTop: $('.products_section').offset().top
			}, 2000);
		});
		$(".view_more").click(function(){ get_products(); });
	});
	var result1;
	function get_products(){
		$(".loading").show(0);
		$.ajax({
			url : base_url+'front_end/get_products',
			type : "POST",
			data : {'cat_id':catid,'subcat_id' : subcatid,"offset" : offset, "fetch" : fetch,},
			success : function(res){
				//console.log(res);
				result1= $.parseJSON(res);
			},
			complete:function(res){
				if(result1.status=='200'  && result1.total > 0){
					$(".append_products").append(result1.response);
					offset  = result1.limit.offset;
					if(result1.last)
					{
						$(".view_more").hide(0);
					}else
					{
						$(".view_more").show(0);
					}
				}
				else if(result1.status == 500){
					$(".append_products").html('<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:10px;margin-bottom:10px;"><div class="col-md-12 col-sm-12 col-xs-12"><h4 style="color:red;">Products Not Available!!!</h4></div></div>');					$(".view_more").hide(0);
				}
				else {
					//$(".no_results").removeClass("hidden");
					$(".view_more").hide(0);
				}
				if(res.sub_cat_details!=false){
					$(".sub_cat_name").text(result1.sub_cat_details.sub_category_name);
				}
				$(".loading").hide(0);
			}
		});

	}
	function initialize(){
		offset = 0;
		fetch = 6;
		catid = $("#cat_id").val();
		subcatid = $("#subcat_id").val();
		$(".append_products").html("");
	}
</script>