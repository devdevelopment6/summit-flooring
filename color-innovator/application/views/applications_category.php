<style type="text/css">
	.content_txt span a{
		font-size: 18px;
    	color: #fff;
	}
	.app_cat_heading{
		color: #556c11;
	}
	.view_more_section{
		text-align:center;
		padding: 10px 0 20px;
	}
	.applications{
		 column-count: 3;
    	-webkit-column-count: 3;
		list-style-type: none;
		padding-inline-start: 1px;
		
	}
	.single_product_section{
		margin-top:10px;margin-bottom:10px;
	}
	
	.scroll_used{	
		overflow-x: hidden;
	    overflow-y: auto;
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
	.product_category_page_banner1 {
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center;
		padding-top: 2%;
		padding-bottom: 2%;
		background-color: #444242;
		color: #FFFFFF;
		background:url('../../homepage_assests/banner/summit-flooring-about-02.jpg');
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
	.first_section img{ max-height: 600px; }
	@media screen and (max-width: 767px){
		.first_section img { height: 65% !important; }
		.second_section .banner_product.inner_content ul{ display:grid;	}
		.second_section .banner_product.inner_content{ position: absolute !important; margin-top: 0% !important; top: 8% !important;	}
		ul.applications{
			    column-count: 2;
				-moz-column-count: 2;
				-webkit-column-count: 2;
		}
		ul.applications .content_txt span a {
			font-size: 16px;
		}
	}
	@media screen and (max-width: 400px){
		.first_section img { height: 25% !important; }
	}
	@media only screen and (max-width: 320px){
		.cust_container4 {
			height: 88% !important;
		}
	}
	@media only screen and (min-width: 321px) and (max-width: 414px){
		.cust_container4 {
			height: 55% !important;
		}
	}
	@media only screen and (width: 375px){
		.cust_container4 {
			height: 63% !important;
		}
	}
</style>

<div class="container-fluid banner product product_category_page_banner" style="padding:0px;position:relative;">
	<?php if($category_details['banner_image'] !='' && $category_details['banner_image']!=NULL && file_exists(FCPATH.'uploads/category_banner_images/'.$category_details['id'].'/'.$category_details['banner_image'])){ ?>
	<img src="<?php echo base_url();?>uploads/category_banner_images/<?php echo $category_details['id'].'/'.$category_details['banner_image'];?>" class="cust_banner_prod_cat" alt="location_category_banner_image" style="width:100%;height:auto;">
	<?php } ?>
	<div class="container">
		<div class="banner_product">
			<div class="background_small_image"></div>
			<div class="banner_txt col-sm-12">
				<div class="bg_small_img"></div>
				<h2 class="page_title hosp_title"><span><?php echo $category_details['header_title'];?></span></h2>
				<div class="row cust_container1">
					<p class="col-md-12 common_class"><?php echo  $category_details['header_content'];?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container cust_container2 margin_top margin_bottom">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="img_section">
				<?php if($category_details['section_image'] !='' && $category_details['section_image']!=NULL && file_exists(FCPATH.'uploads/category_section_images/'.$category_details['id'].'/'.$category_details['section_image'])){ ?>
				<img src="<?php echo base_url();?>uploads/category_section_images/<?php echo $category_details['id'].'/'.$category_details['section_image'];?>" class="cust_product_img" alt="location_category_section_image" />
				<?php } ?>
			</div>
		</div>

		<div class="col-md-8 col-sm-8 col-xs-12 cust_container3">

			<h4 class="common_class"><span><?php echo $category_details['section_title'];?></span></h4>
			<p class="col-md-12 common_class"><span><?php echo $category_details['section_content'];?></span></p>
		</div>
	</div>
</div>
<div class="container-fluid banner product second_section product_category_page_banner1" style="position:relative;background:url('../../uploads/category_application_images/<?php echo $category_details['id'].'/'.$category_details['application_banner_image']; ?>');">
	<?php /*if($category_details['application_banner_image']!= '' && file_exists(FCPATH.'uploads/category_application_images/'.$category_details['id'].'/'.$category_details['application_banner_image']) && !is_dir(FCPATH.'uploads/category_application_images/'.$category_details['id'].'/'.$category_details['application_banner_image'])){ ?>
		<img src="<?php echo base_url();?>uploads/category_application_images/<?php echo $category_details['id'].'/'.$category_details['application_banner_image']; ?>" class="cust_container4" alt="hospitality_category_application_area" style="width:100%;height:auto;">
	<?php } else { ?>
	<img src="<?php echo base_url();?>homepage_assests/banner/summit-flooring-about-02.jpg" class="cust_container4" alt="hospitality_category_application_area" style="width:100%;height:auto;">
	<?php }*/ ?>
	<div class="container">
		<div class="row">
			<!--<div class="banner_product inner_content">-->
				<div class="col-md-12">
					<h4 class="common_class cust_size" style="color:#fff;"><span>Application Areas</span></h4>
				</div>
				<input type="hidden" name="cat_id" id="cat_id" value="<?php echo $category_details['id']; ?>" />
				<input type="hidden" name="subcat_id" id="subcat_id" />
                
                 <ul class="applications">
				<?php 
				if($sub_categories!=false){
					foreach($sub_categories as $sub_cat){
						$i=1;
				?>  

				 	<li>
                    	<div class="content_txt col-md-12 col-sm-12 col-xs-12">
                            <span>
                                <a data-cat_id="<?php echo $category_details['id']; ?>" data-subcat_id="<?php echo $sub_cat['id']; ?>" class="get_products" style="cursor:pointer;font-weight: 600;"><?php echo $sub_cat['sub_category_name']; ?>
                                </a>
                            </span>
                        </div>
                    </li>
                
				<?php $i++; } }?>
                 </ul>
			<!--</div>-->
		</div>
	</div>
</div>
<div class="container margin_top margin_bottom">
	<div class="row products_section">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<h3 class="col-md-12 col-sm-12 col-xs-12 sub_cat_name app_cat_heading" ></h3>
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
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 view_more_section" >
			<button class="btn btn-info view_more">View More</button>
		</div>
	</div>
</div>
<script type="text/javascript">
	var offset = 0;
	var	fetch = 6;
	var catid = $("#cat_id").val();
	var subcatid = $("#subcat_id").val();
	$(document).ready(function(){
		get_products();
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