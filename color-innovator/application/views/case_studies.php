<style type="text/css">

	.display_round_img{
		vertical-align: middle;
   	 border-radius: 50%;
   	 width: 250px !important;
   	 height: 250px !important;
	     margin: 0 auto;
	}
	
	.display_round_img_1{
		vertical-align: middle;
   	 border-radius: 50%;
   	 width: 250px !important;
   	 height: 250px !important;
	     margin: 0 auto;
	}
	
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

	.flex-direction-nav a::before{
		 color:#333 !important;
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
	
	@media screen and (max-width: 767px){
		.first_section img {
			height: 25% !important;
		}
	}
</style>

<div class="container-fluid banner product first_section product_category_page_banner" style="padding:0px;position:relative;">
	<img src="<?php echo base_url();?>uploads/case_study_category_image/<?php echo $case_study['banner_image'];?>" alt="case_study_banner_image" style="width:100%;height:auto;" />
    <div class="container">
        <div class="banner_product">
            <div class="background_small_image"></div>
            <div class="banner_txt col-sm-12">
                <div class="bg_small_img"></div> 
                <h3 class="page_title hosp_title case_title"><span><?php echo $case_study['header_title'];?></span></h3>
                <div class="row cust_container1 case_cust_container1">
                    <p class="col-md-12 common_class"><strong><?php echo $case_study['header_content'];?></strong></p>
                </div>
            </div> 
        </div>
    </div>
</div>

<!-- 19-09-2018 -->

<div class="container case_cust_container2">
	<div class="case_cust_logo">
    
    	<div class="col-md-12">
        	<h3 class="page-title hosp_des_title common_class case_cust_size"><?php echo $case_study['section_title1'];?></h3>
            <p class="des common_class case_cust_size"><?php echo $case_study['section_content1'];?></p>
			<div class="row">
                <div class="col-md-12 flexslider products_carousal_granite">
                    <ul>
                	<?php foreach($case_studies as $casestudy){ ?>
   
                    <li>
                    <div class="col-md-12">
                        <div class="col-md-4">
                        <a href="<?php echo base_url();?>uploads/case_study_category_document/<?=$casestudy['document']?>" target="_blank" >
                            <?php
                            $display = $casestudy['image'];
                            $title = $casestudy['title'];
							$content = $casestudy['content'];
                            if($display != "")
                            { ?>
                                <img class="case_study_img_section1 case_cust_img display_round_img" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" alt="case_study_section_image1" height="168px"/>
                    <?php   }else{ ?>
                                <img class="case_study_img_section1 case_cust_img display_round_img" src="<?php echo base_url();?>uploads/img.jpg" alt="case_study_section_image1" height="168px" />
                        <?php } ?>
                        </a>
                        </div>
                        <div class="col-md-8">
                        	<div class="col-md-12">
                        		<h4 class="cmt_title"><?=$title?></h4>
                            </div>
                            <div class="col-md-12" style="    margin: 20px 0px 25px 0px;">
                        		<?=$content;?>
                        	</div>
                            <div class="col-md-4">
                            	<a class=" request_quote_btn" href="<?php echo base_url();?>uploads/case_study_category_document/<?=$casestudy['document']?>" target="_blank">
									<div class="new_browse_btn_product_category"><span>Download PDF</span></div>
								</a>
                			</div>
                        </div>
                    </div>
                   </li>
                <?php } ?>   
                        </ul>
                </div>
		</div>

        </div>
	</div>
</div>

<!-- / 19-09-2018 -->
<!--- old content --->
<?php /*?><div class="container case_cust_container2">
	<div class="case_cust_logo">
		<div class="col-md-4 ctm_class">
			<div>
				<img src="<?php echo base_url();?>uploads/case_study_category_image/<?php echo $case_study['section_logo1'];?>" alt="case_study_section_logo1" class="cas_img" />
			</div>
		</div>
	
		<div class="col-md-8">
			<h3 class="page-title hosp_des_title common_class case_cust_size"><?php echo $case_study['section_title1'];?></h3>
			<p class="des common_class case_cust_size"><?php echo $case_study['section_content1'];?></p>
			<div class="col-md-12 flexslider products_carousal_granite">
				<ul >
            <?php foreach($case_studies as $casestudy){ ?>
                <li>
                <a href="<?php echo base_url();?>uploads/case_study_category_document/<?=$casestudy['document']?>" target="_blank" >
                    <?php
                    $display = $casestudy['image'];
					$title = $casestudy['title'];
                    if($display != "")
                    { ?>
    					<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" alt="case_study_section_image1" height="168px" />
                        <h4 class="cmt_title"><?=$title?></h4>
    		<?php   }else{ ?>
             			<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/img.jpg" alt="case_study_section_image1" height="168px" />
                        <h4 class="cmt_title"><?=$title?></h4>
     			<?php } ?>
                </a>
               </li>
            <?php } ?>   
					</ul>
			</div>
		</div>
	</div>
</div><?php */?>
<!--- / old content --->

<!--<div class="container-fluid banner product">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<h3 class="cmt_title">Testimonials</h3>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="flexslider products_carousal_testimonial">
			<ul >
		
				<li>
					<a href="#" >
						<?php
						/*$display = $casestudy['image'];
						$title = $casestudy['title'];
						if($display != "")
						{ ?>
							<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" alt="case_study_section_image1" height="168px" />
							<h4 class="cmt_title"><?=$title?></h4>
				<?php   }else{ */ ?>
							<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/img.jpg" alt="case_study_section_image1" height="168px" />
							<h4 class="cmt_title open_testimonial"><?php echo "Testional1"; ?></h4>
					<?php //} ?>
					</a>
			   </li>
				<li>
					<a href="#" >
						<?php
						/*$display = $casestudy['image'];
						$title = $casestudy['title'];
						if($display != "")
						{ ?>
							<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" alt="case_study_section_image1" height="168px" />
							<h4 class="cmt_title"><?=$title?></h4>
				<?php   }else{ */ ?>
							<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/img.jpg" alt="case_study_section_image1" height="168px" />
							<h4 class="cmt_title open_testimonial"><?php echo "Testional2"; ?></h4>
					<?php //} ?>
					</a>
			   </li>
				<li>
					<a href="#" >
						<?php
						/*$display = $casestudy['image'];
						$title = $casestudy['title'];
						if($display != "")
						{ ?>
							<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" alt="case_study_section_image1" height="168px" />
							<h4 class="cmt_title"><?=$title?></h4>
				<?php   }else{ */ ?>
							<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/img.jpg" alt="case_study_section_image1" height="168px" />
							<h4 class="cmt_title open_testimonial"><?php echo "Testional3"; ?></h4>
					<?php //} ?>
					</a>
			   </li>
				<li>
					<a href="#" >
						<?php
						/*$display = $casestudy['image'];
						$title = $casestudy['title'];
						if($display != "")
						{ ?>
							<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" alt="case_study_section_image1" height="168px" />
							<h4 class="cmt_title"><?=$title?></h4>
				<?php   }else{ */ ?>
							<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/img.jpg" alt="case_study_section_image1" height="168px" />
							<h4 class="cmt_title open_testimonial"><?php echo "Testional4"; ?></h4>
					<?php //} ?>
					</a>
			   </li><li>
					<a href="#" >
						<?php
						/*$display = $casestudy['image'];
						$title = $casestudy['title'];
						if($display != "")
						{ ?>
							<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" alt="case_study_section_image1" height="168px" />
							<h4 class="cmt_title"><?=$title?></h4>
				<?php   }else{ */ ?>
							<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/img.jpg" alt="case_study_section_image1" height="168px" />
							<h4 class="cmt_title open_testimonial" ><?php echo "Testional5"; ?></h4>
					<?php //} ?>
					</a>
			   </li>
				<li>
					<a href="#" >
						<?php
						/*$display = $casestudy['image'];
						$title = $casestudy['title'];
						if($display != "")
						{ ?>
							<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" alt="case_study_section_image1" height="168px" />
							<h4 class="cmt_title"><?=$title?></h4>
				<?php   }else{ */ ?>
							<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/img.jpg" alt="case_study_section_image1" height="168px" />
							<h4 class="cmt_title open_testimonial"><?php echo "Testional6"; ?></h4>
					<?php //} ?>
					</a>
			   </li>
				<li>
					<a href="#" >
						<?php
						/*$display = $casestudy['image'];
						$title = $casestudy['title'];
						if($display != "")
						{ ?>
							<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" alt="case_study_section_image1" height="168px" />
							<h4 class="cmt_title"><?=$title?></h4>
				<?php   }else{ */ ?>
							<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/img.jpg" alt="case_study_section_image1" height="168px" />
							<h4 class="cmt_title open_testimonial"><?php echo "Testional7"; ?></h4>
					<?php //} ?>
					</a>
			   </li>
				<li>
					<a href="#" >
						<?php
						/*$display = $casestudy['image'];
						$title = $casestudy['title'];
						if($display != "")
						{ ?>
							<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" alt="case_study_section_image1" height="168px" />
							<h4 class="cmt_title"><?=$title?></h4>
				<?php   }else{ */ ?>
							<img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/img.jpg" alt="case_study_section_image1" height="168px" />
							<h4 class="cmt_title open_testimonial"><?php echo "Testional8"; ?></h4>
					<?php //} ?>
					</a>
			   </li>
				
			</ul>
		</div>
	</div>
</div>-->

<div class="container-fluid banner product product_category_page_banner" style="padding:0px;position:relative;">
	<div class="case1">
		<div class="container">
            <div class="row">
                <div class="col-md-12 testimonial_content">
                    <?php echo $case_study['testimonial1'];?>
                </div>
            </div>	
        </div>
    </div>
</div>

<div class="container-fluid">
	<div class="container case_cust_container2">
	<div class="case_cust_logo">
		<?php /*?><div class="col-md-4 ctm_class">
			<div>
				<img src="<?php echo base_url();?>uploads/img.jpg" alt="case_study_section_logo1" class="cas_img" />
			</div>
		</div><?php */?>
	
    <div class="row">
		<div class="col-md-12">
			<h3 class="page-title hosp_des_title common_class case_cust_size"><?php echo "Testimonials"; ?></h3>
			<p class="des common_class case_cust_size"></p>
			<div class="row">
			<div class="flexslider products_carousal_testimonial">
			<ul>
		
				<li>
                	<div class="col-md-4">
                        <a href="#" >
                            <?php
                            /*$display = $casestudy['image'];
                            $title = $casestudy['title'];
                            if($display != "")
                            { ?>
                                <img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" alt="case_study_section_image1" height="168px" />
                                <h4 class="cmt_title"><?=$title?></h4>
                    <?php   }else{ */ ?>
                                <img class="case_study_img_section1 case_cust_img display_round_img_1" src="<?php echo base_url();?>dinoflext_testimonial_images/home_gym.jpg" alt="case_study_section_image1" height="168px" />
                                
                        <?php //} ?>
                        </a>
                    </div>
                    
                    <div class="col-md-8">
                    	<h4 class="cmt_title open_testimonial"><?php echo "Fitness One Vega, Jordan"; ?></h4>
                        
                         <div class="col-md-12" style="margin: 20px 0px 25px 0px;">
                        	"On behalf of Kazem and the Fitness One Vega Family, we extend our appreciation to all the support and cooperation you have extended throughout this project. We really felt comfortable with you from the first time we met and time has proved the genuine foundation of us all."
                        </div>
                    </div>
			   </li>
               
				<li>
                	<div class="col-md-4">
                        <a href="#" >
                            <?php
                            /*$display = $casestudy['image'];
                            $title = $casestudy['title'];
                            if($display != "")
                            { ?>
                                <img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" alt="case_study_section_image1" height="168px" />
                                <h4 class="cmt_title"><?=$title?></h4>
                    <?php   }else{ */ ?>
                                <img class="case_study_img_section1 case_cust_img display_round_img_1" src="<?php echo base_url();?>dinoflext_testimonial_images/mwr_fitness.jpg" alt="case_study_section_image1" height="168px" />
                        <?php //} ?>
                        </a>
                    </div>
                    
                    <div class="col-md-8">
                     	<h4 class="cmt_title open_testimonial"><?php echo "MWR Fitness - Yokosuka, Japan"; ?></h4>
                        
                        <div class="col-md-12" style="margin: 20px 0px 25px 0px;">
                        	"The DINOFLEX flooring has been an excellent upgrade to our fitness facility. It was easy to install, and immediately transformed the professional look of our gym. Since our first installation I have ordered this flooring for all my facilities".
                        </div>
                    </div>
			   </li>
               
				<li>
                	<div class="col-md-4">
                        <a href="#" >
                            <?php
                            /*$display = $casestudy['image'];
                            $title = $casestudy['title'];
                            if($display != "")
                            { ?>
                                <img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" alt="case_study_section_image1" height="168px" />
                                <h4 class="cmt_title"><?=$title?></h4>
                    <?php   }else{ */ ?>
                                <img class="case_study_img_section1 case_cust_img display_round_img_1" src="<?php echo base_url();?>dinoflext_testimonial_images/ok_college.jpg" alt="case_study_section_image1"  height="168px" />
                        <?php //} ?>
                        </a>
                    </div>
                    <div class="col-md-8">
                    	<h4 class="cmt_title open_testimonial"><?php echo "OK College, Penticton BC"; ?></h4>
                        
                        <div class="col-md-12" style="margin: 20px 0px 25px 0px;">
                        "The use of Summit Flooring flooring was a great fit for the Centre of Excellence project: a product manufactured locally with high recycled content and no red list materials in full accordance with the tough goals of the Living Building Challenge, and a product that meets the needs of faculty and students to provide a durable, resilient finish without compromising the performance of the radiant flooring system."
                        </div>
                    </div>
			   </li>
				<li>
                	<div class="col-md-4">
                        <a href="#" >
                            <?php
                            /*$display = $casestudy['image'];
                            $title = $casestudy['title'];
                            if($display != "")
                            { ?>
                                <img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" alt="case_study_section_image1" height="168px" />
                                <h4 class="cmt_title"><?=$title?></h4>
                    <?php   }else{ */ ?>
                                <img class="case_study_img_section1 case_cust_img display_round_img_1" src="<?php echo base_url();?>dinoflext_testimonial_images/ryan.jpg" alt="case_study_section_image1" height="168px" />
                                
                        <?php //} ?>
                        </a>
                    </div>
                    <div class="col-md-8">
                    	<h4 class="cmt_title open_testimonial"><?php echo "Fitness Facility"; ?></h4>
                        
                        <div class="col-md-12" style="margin: 20px 0px 25px 0px;">
                        	"The use of Summit Flooring flooring was a great fit for the Centre of Excellence project: a product manufactured locally with high recycled content and no red list materials in full accordance with the tough goals of the Living Building Challenge, and a product that meets the needs of faculty and students to provide a durable, resilient finish without compromising the performance of the radiant flooring system."
                        </div>
                    </div>
			   </li>
               
               <li>
               		<div class="col-md-4">
                        <a href="#" >
                            <?php
                            /*$display = $casestudy['image'];
                            $title = $casestudy['title'];
                            if($display != "")
                            { ?>
                                <img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" alt="case_study_section_image1" height="168px" />
                                <h4 class="cmt_title"><?=$title?></h4>
                    <?php   }else{ */ ?>
                                <img class="case_study_img_section1 case_cust_img display_round_img_1" src="<?php echo base_url();?>dinoflext_testimonial_images/spring.jpg" alt="case_study_section_image1" height="168px" />
                        <?php //} ?>
                        </a>
                    </div>
                    <div class="col-md-8">
                    	<h4 class="cmt_title open_testimonial" ><?php echo "Springbank Park - Calgary, AB"; ?></h4>
                        
                        <div class="col-md-12" style="margin: 20px 0px 25px 0px;">
                        	"After the initial installation in 2002 of our lobby and arena areas, we have since ordered more Summit Flooring products that now cover our players' rooms, preschool, hallways, offices and more. I can't say enough about this product!"
                        </div>
                    </div>
			   </li>
				<li>
                	<div class="col-md-4">
                        <a href="#" >
                            <?php
                            /*$display = $casestudy['image'];
                            $title = $casestudy['title'];
                            if($display != "")
                            { ?>
                                <img class="case_study_img_section1 case_cust_img" src="<?php echo base_url();?>uploads/case_study_category_image/thumbs/<?=$display; ?>" alt="case_study_section_image1" height="168px" />
                                <h4 class="cmt_title"><?=$title?></h4>
                    <?php   }else{ */ ?>
                                <img class="case_study_img_section1 case_cust_img display_round_img_1" src="<?php echo base_url();?>dinoflext_testimonial_images/sunset.jpg" alt="case_study_section_image1" height="168px" />
                        <?php //} ?>
                        </a>
                    </div>
                    <div class="col-md-8">
                    	 <h4 class="cmt_title open_testimonial"><?php echo "Sunset High School - Portland, OR"; ?></h4>
                         
                         <div class="col-md-12" style="margin: 20px 0px 25px 0px;">
                         	Sunset High School first purchased DINOFLEX Sport Mat Flooring in 1997 for our fitness room. At that time, 1500 sq ft of 3/8" interlocking product along with a water jet cut verson of our team logo, the Apollos.
                         </div>
                    </div>
			   </li>
				
			</ul>
		</div>
			</div>
		</div>
        </div>
	</div>
</div>
</div>

<div class="modal fade" id="Ryan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">Fitness Facility</h4>
			</div>
			<div class="modal-body">
				<h1>Fitness Facility</h1>
				<p>
					"I recently decided to upgrade the flooring in my home training facility – the room where I spend a great deal of my time. I wanted a high-quality product that was visually pleasing and easy to maintain. I also needed it to be durable enough to withstand rigorous everyday use.
				</p>
				<p>
					Summit Flooring recommended their Sport Mat Flooring because it reduces noise levels, absorbs shock, prevents slipping and is environmentally friendly. The project called for a variety of customized features, including the creation of two separate logos and the use of customized colours. The installation took just two days and was completed using sophisticated interlocking tiles rather than glue.
				</p>
				<p>
					The finished floor is exactly what I envisioned. I am completely satisfied with Summit Flooring’s work and I would highly recommend them for any flooring needs."
				</p>
				<p>
					- Ryan "Captain Canada" Smyth 
				</p>
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
		
		jQuery('.products_carousal_granite ul').addClass('slides');	
	
		jQuery('.products_carousal_granite').flexslider({
			animation: "slide",
			animationLoop: false,
			before: function(){
				//var active_rel = $(this).find('.flex-active-slide').attr('rel');
				//alert('test');
			},
			after:function(){
				//var active_rel = $(this).find('.flex-active-slide').attr('rel');
				//alert('after');
			},
			/*itemWidth: 177,
			itemMargin: 5,
			
			minItems: 2,
			maxItems: 5,*/
			start: function(slider){
			  jQuery('body').removeClass('loading');

			  jQuery('.popup-link-granite').magnificPopup({
					type: 'image',
					gallery:{enabled:true}
				});

			}
		  }); 
		jQuery('.products_carousal_testimonial ul').addClass('slides');
		jQuery('.products_carousal_testimonial').flexslider({
			animation: "slide",
			animationLoop: false,
			//itemWidth: 177,
			//itemMargin: 5,
			//minItems: 2,
			//maxItems: 5,
			start: function(slider){
			  jQuery('body').removeClass('loading');

			  jQuery('.popup-link-granite').magnificPopup({
					type: 'image',
					gallery:{enabled:true}
				});

			}
		  }); 
		$(".open_testimonial").on('click',function(){
			//$("#Ryan").modal('show');
		});
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