
<div class="container-fluid" style="display:block !important;padding:0px;position: relative;">
	<div class="product_page_header cust_inside_product">
			<img src="http://oneco.ca/~summit-flooring/Color_innovator/homepage_assests/new_images_1/summit-flooring-sport-mat-banner-01.jpg" alt="summit-flooring-sport-mat-banner" style="width:100%;height:auto;" />
	</div>
			<div class="container">	
                <div class="row small_bgpic product_bgpic_1" style="">
                    <!--<div class="background"></div>
                	<div class="banner_content col-sm-12 new_header_content">
						<h2 class="product-page-title"><span></span></h2>
						<div class="product_subheading">
							<img src="<?php echo base_url(); ?>homepage_assests/new_images_1/tile_square.png" class="sport_mat_logo">
                            <div class="sport_mat_line"><?php echo $product_1['product_name'];?></div>
						</div>					
						<div class="row">
                        	<div class="col-md-12">
                                <div class="col-md-10 	"><?php echo $product_1['product_header_content'];?></div>
                            </div>
						</div>
						
						<div class="row">
                        	<div class="col-md-12">
                                <div class="col-md-7 col-sm-1"></div>
                                    <div class="col-md-5 col-sm-10 btn_skewx text-center" >
                                        <a href="<?php echo base_url();?>front_end/main_content">
                                            <div class="text-skewx"><img src="<?php echo base_url(); ?>homepage_assests/new_images_1/summit-flooring-button-icon.svg" class="top_learn_more_btn"><span>Learn More</span></div>
                                        </a>
                                    </div>
                                </div>
							</div>
						</div>		-->
					<div class="banner_content col-sm-12 new_header_content products_banner_div">
						<h1 class="page-title2"><span><?php echo $product_1['product_name'];?></span></h1>
						<div class="subhead">
							<img src="<?php echo base_url(); ?>homepage_assests/new_images_1/tile_square.png" class="sport_mat_logo" alt="tile_square">
							
						</div>	
						<h2 class="sport_mat_line"><?php echo $product_1['head_line'];?></h2>
						<div class="row">
							<p class="col-md-2 col-sm-1"></p>
							<p class="text-right col-md-10 col-sm-10 top_content"><?php echo $product_1['product_header_content'];?></p>
						</div>
						
						<!--<div class="row learn_more_button">
							<div class="col-md-6 col-sm-1"></div>
								<div class="col-md-4 col-sm-10 btn_skewx text-center cust_text_skewx">
									<a href="<?php echo base_url();?>front_end/main_content">
                                    	<div class="text-skewx"><img src="<?php echo base_url();?>homepage_assests/new_images_1/summit-flooring-button-icon.svg" class="top_learn_more_btn"><span>Learn More</span></div>
									</a>
								</div>
							</div>-->
						</div>
					
					</div>
				</div>
			</div>
       
       
     
     <?php if($product_1['video_link_1'] == '' && $product_1['video_link_2'] == '' && $product_1['video_link_3'] == '' && $product_1['section_2_content'] != '') { ?>  
       <div class="container product_mid_content_main">
            <div class="row">
            	<div class="col-md-12">
                		<h4 class="common_class"><?php echo $product_1['section_2_title'];?></h4>
                        <p class=" product_mid_content cust_product_mid_content">
                        	<?php echo $product_1['section_2_content'];?>
                        </p>
	            </div>
            </div>      
       	</div>
      <?php } else { ?> 
               
        <div class="container product_mid_content_main">
            <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12">
                	<div class="col-md-7">
   			         	<h4 class="col-md-12 product_mid_title common_class"><span><?php echo $product_1['section_2_title'];?></span></h4>
                        <div class="col-md-12 product_mid_content common_class inside_product_mid_content">
                        	<?php echo $product_1['section_2_content'];?>
                        </div>
                     </div>

                        <div class="col-md-5">
                        	<div class="col-md-12">
                            <?php if($product_1['video_link_1'] != '') { ?>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                	<img src="<?php echo base_url(); ?>homepage_assests/new_images_1/summit-flooring-sparkling-hill-resort.png" alt="summit-flooring-sparkling-hill-resort" class="img-responsive product_img_1" id="myModal1" data-video_link="<?php echo $product_1['video_link_1'];?>">
                                </div>
                                <?php } ?>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                	<?php if($product_1['video_link_2'] != '') { ?>
                                	<div class="product_mid_img_1"><img src="<?php echo base_url(); ?>homepage_assests/new_images_1/summit-flooring-crossfit-vernon.png" class="img-responsive product_mid_img" id="myModal" data-video_link="<?php echo $product_1['video_link_2'];?>"></div>
                                    <?php } ?>
                                    <?php if($product_1['video_link_3'] != '') { ?>
                                    	<div class=""><img src="<?php echo base_url(); ?>homepage_assests/new_images_1/summit-flooring-crossfit-vernon.png" class="img-responsive product_mid_img" id="myModal2" data-video_link="<?php echo $product_1['video_link_3'];?>"></div>
                                    <?php } ?>
                                </div>
                             </div>                           
                        </div>
                       
                        
                 </div>
            </div>      
       	</div>
        <?php } ?>
 <div class="banner2"> 
    <div class="product_mid_img_2 container-fluid banner product product_category_page_banner">
    	<div class="container">
            <div class="row atheletic_main_div">
                <?php if($product_1['mid_content_title'] != '') { ?>
                    <div class="col-md-12 athletic_facilities">
                         <?php echo $product_1['mid_content_title'];?>
                    </div>
                <?php } ?>
                <?php if($product_1['middle_content'] != '') { ?>
                    <div class="col-md-12 atheletic_div">
                        <div class="athletic_facilities_content common_class"><?php echo $product_1['middle_content'];?></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>   
 </div>
 <div class="container features_container">
    <?php if($product_1['features'] != '' && $product_1['best_applications'] != '' && $product_1['measurement'] != '') { ?>
        <div class="row">
            <div class="col-md-12">
            
                <?php if($product_1['features'] != '') { ?>
                <div class="col-md-4 feature_section_1">
                    <div class="feature_section_div">
                        <div><img src="<?php echo base_url(); ?>homepage_assests/new_images_1/product-features.png" class="img-responsive feature_section_1_img"></div>
                        <div class="feature_title common_class">Features</div>
                    </div>
                  <?php echo $product_1['features'];?>
                </div>
                
                <?php } ?>
                
                <?php if($product_1['best_applications'] != '') { ?>
                <div class="col-md-5 feature_first_div">
                    <div class="col-md-12 feature_section_2">
                        <div class="best_app_main_div">
                            <div><img src="<?php echo base_url(); ?>homepage_assests/new_images_1/product-applications.png" class="img-responsive feature_section_1_img"></div>
                            <div class="feature_title common_class">Best Application</div>
                        </div>
                        <?php echo $product_1['best_applications'];?>
                    </div>
                    <?php } ?>
                    
                   <?php if(count($product_docs) > 0)
                        {
                            if($product_docs['document_title_1'] != '') { ?>
                                        
                    <div class="col-md-12 feature_section_3">
                        <div class="download_title">
                            <div><img src="<?php echo base_url(); ?>homepage_assests/new_images_1/product-download.png" class="img-responsive"></div>
                            <div class="feature_title common_class">Downloads</div>
                        </div>
                        <div class="col-md-12">
                            <ul class="product_downloads_lists">
                                <?php if($product_docs['document_title_1'] != '') { ?>
                                    <li><a href="<?php echo base_url();?>uploads/products_pdf/<?php echo $product_docs['download_link_1']; ?>"><?php echo $product_docs['document_title_1']; ?></a></li>
                                <?php } ?>
                                <?php if($product_docs['document_title_2'] != '') { ?>
                                    <li><a href="<?php echo base_url();?>uploads/products_pdf/<?php echo $product_docs['download_link_2']; ?>"><?php echo $product_docs['document_title_2']; ?></a></li>
                                 <?php } ?>
                                <?php if($product_docs['document_title_3'] != '') { ?>
                                    <li><a href="<?php echo base_url();?>uploads/products_pdf/<?php echo $product_docs['download_link_3']; ?>"><?php echo $product_docs['document_title_3']; ?></a></li>
                                 <?php } ?>
                                <?php if($product_docs['document_title_4'] != '') { ?>
                                    <li><a href="<?php echo base_url();?>uploads/products_pdf/<?php echo $product_docs['download_link_4']; ?>"><?php echo $product_docs['document_title_4']; ?></a></li>
                                <?php } ?>
                                <?php if($product_docs['document_title_5'] != '') { ?>
                                    <li><a href="<?php echo base_url();?>uploads/products_pdf/<?php echo $product_docs['download_link_5']; ?>"><?php echo $product_docs['document_title_5']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
               <?php } }?>
                                        
                </div>
                
                <?php if($product_1['measurement'] != '') { ?>
                <div class="col-md-3 feature_section_4">
                    <div class="size_section_title">
                            <div><img src="<?php echo base_url(); ?>homepage_assests/new_images_1/product-sizes.png" class="img-responsive"></div>
                            <div class="feature_title common_class">Size</div>
                    </div>
                    <?php echo $product_1['measurement'];?>
                </div>
              <?php } ?>  
            </div>
         </div> 
          <?php } ?>  
          
      <?php if($product_1['gallery_link'] != '') { ?>
          <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 colours_section unique_color_section display_property_1">
                            <div class="col-md-5"></div>
                            <div class="colors_section_title">
                                <div><img src="<?php echo base_url(); ?>homepage_assests/new_images_1/product-sizes.png" class="img-responsive"></div>
                                <h4 class="feature_title common_class">Colors</h4>
                            </div>
                            
                            <?php echo $product_1['gallery_link'];?>
                    </div>
               </div>
            </div>
         <?php } ?>   
            
        <?php     if(!empty($gallery))  { ?>
            <div class="row">
                 <div class="col-md-12 gallery_main_div">
                    <h4 class="gallery_title common_class">Gallery</h4>
                </div>
                <div class="col-md-12 slider_section">
       
                    <div class="col-md-12" id="gallery">
                      <center>  <div class="flexslider carousel" id="onetwo">
							
                            <ul class="slides">
                                  <?php 
                                        foreach($gallery as $display){
                                            $gallerys[] = $display['gallery'];
                                        }
                                        $count = count($gallerys);
                                        for ($i=0; $i<$count; $i++) {
                                            if ($i % 2 == 0){
                                                if($gallerys[$i] != ""){
                                    ?>
                                    <li>
                                     <a class="popup-link-gallery" href="<?php echo base_url(); ?>uploads/products_gallery/<?php echo $gallerys[$i]; ?>"><img src="<?php echo base_url(); ?>uploads/products_gallery/thumbs/<?php echo $gallerys[$i]; ?>" draggable="false"></a>
                                        <?php if($gallerys[$i+1] != ""){ ?>
                                        <a class="popup-link-gallery" href="<?php echo base_url(); ?>uploads/products_gallery/<?php echo $gallerys[$i+1]; ?>"><img src="<?php echo base_url(); ?>uploads/products_gallery/thumbs/<?php echo $gallerys[$i+1]; ?>" draggable="false" /></a>
                                            <?php } ?>
                                    </li>
                                    <?php 		}
                                        }
                                    } ?>
								</ul>
							
                            </div>
						  </center>
							 <ul class="flex-direction-nav">
								<li><a class="flex-prev" href="#">Previous</a></li>
								<li><a class="flex-next" href="#">Next</a></li>
							 </ul>
                        </div>
                </div>        
             </div>
           <?php } ?>
             
            <div class="container">
                 <div class="row">
                    <div class="col-md-12 last_section">
                        <h4 class="last_section_title common_class">Interested in this product?</h4>
                    </div>
                    <div class=" col-sm-12 text-center">
                        <div class="col-md-3 request_quote_div">
                            <a class="sample_request request_quote_btn">
                                <div class="new_browse_btn"><img src="<?php echo base_url();?>homepage_assests/new_images_1/summit-flooring-button-icon.svg" class="top_learn_more_btn"><span>Request a sample</span></div>
                            </a>
                        </div></div>
                  </div>
              </div>
    </div>
     
     
       
<?php /*?><div class="container-fluid header_container">
    <div class="row first_div">
        <img  src="<?php echo base_url().'uploads/products/'.$product_1['product_image']; ?>" class="first_image" />
        <div class="second_div">
            <img src="<?php echo base_url().'homepage_assests/image/home-landing-tile-texture-border.png'; ?>" />
        </div>
        <div  class="third_div">
            <div class="container">
             <!--col-md-4 col-md-offset-8  -->
             	<div class="col-md-4 col-md-offset-8 banner_title">
                    <h2 class="page-title"><span><?php echo $product_1['product_name'];?></span></h2>
                    <div class="subhead">
                        <img src="<?php echo base_url(); ?>homepage_assests/image/tile_square.png" class="tile_square">
                            <?php echo $product_1['product_name'];?>
                        <p class="short_description">
                            <b><?php echo $product_1['short_description'];?></b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div  class="fourth_div">
            <img src="<?php echo base_url().'homepage_assests/image/landing-tile-right-border.png'; ?>"/>
        </div>
    </div>   
</div><?php */?>

<?php /*?><div class="mobile_container">
    <div class="m_first">
        <img  src="<?php echo base_url().'uploads/products_mobile/'.$product_1['product_image_mobile'] ;?>" class="first_image" />
    </div> 
    <div class="m_second">
        <img src="<?php echo base_url().'homepage_assests/image/mobile_home-landing-tile-texture-border.png'; ?>" />
    </div>
    <div class="m_third" style="margin-top:20px;">
        <div class="col-md-4 col-md-offset-8"><?php */?>
            <?php /*?><h2 class="page-title"><span><?php echo $product_1['product_name'];?></span></h2><?php */?>
                <?php /*?><div class="subhead">
                    <div>
                        <img src="<?php echo base_url(); ?>homepage_assests/image/tile_square.png" class="tile_square" style="margin-right: 12px; float: left; margin-top: 8px;" />
                        <h2><?php echo $product_1['product_name'];?></h2>
                    </div>
                    <p class="short_description">
                        <b><?php echo $product_1['short_description'];?></b>
                    </p>
                </div>
        </div>
    </div>
</div>    <?php */?>

<div class="container">
	
    <?php /*?><div style="margin-top:5%;">&nbsp;</div>
	<div><?php print_r($product_1['description']); ?></div>
    <div style="margin-top:5%;">&nbsp;</div><?php */?>
	<?php /*?><div class="row">
		<div class="col-md-4">	
        		
			<div class="fetures product_link active products_property best_app" data-id="<?php echo $product_1['id']; ?>" data-feature="features">
				<div class="logs active"><i class="fa fa-cloud-download pro_link" aria-hidden="true"></i>
				</div><div class="log_tit1 active pro_features"><a class="pro_features">Features</a></div>
			</div>
			
			<div class="size products_property" data-id="<?php echo $product_1['id']; ?>" data-feature="best_app">
				<div class="logs"><i class="fa fa-calendar-check-o pro_link" aria-hidden="true"></i></div>
				<div class="log_tit1"><a class="pro_best_app">Best Applications</a></div>
			</div>
            
			<div class="size products_property" data-id="<?php echo $product_1['id']; ?>" data-feature="size">
				<div class="logs"><i class="fa fa-clone pro_link"  aria-hidden="true"></i></div>
				<div class="log_tit1 pro_size"><a class="pro_size">Size</a></div>
			</div>
            
			<div class="downloads products_property" data-id="<?php echo $product_1['id']; ?>" data-feature="download_link">
				<div class="logs"><i class="fa fa-cloud-download pro_link" aria-hidden="true"></i></div>
				<div class="log_tit1 pro_download"><a class="pro_download">Downloads</a></div>
			</div>	
            
            <div class="Gallery products_property" data-id="<?php echo $product_1['id']; ?>" data-feature="gallery">
				<div class="logs" style="padding: 10px;">
					<svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					     fill="#FFFFFF" viewBox="0 0 35 35"
					     style="display: block;transform: rotate(45deg);" xml:space="preserve">
						<rect x="12.2" y="3.7" transform="matrix(0.7071 0.7071 -0.7071 0.7071 11.4774 -9.7278)" class="st0" width="10.6" height="10.6"/>
						<rect x="20.7" y="12.2" transform="matrix(0.7071 0.7071 -0.7071 0.7071 20.0057 -13.2603)" class="st0" width="10.6" height="10.6"/>
						<rect x="3.7" y="12.2" transform="matrix(0.7071 0.7071 -0.7071 0.7071 14.9943 -1.2372)" class="st0" width="10.6" height="10.6"/>
						<rect x="12.2" y="20.7" transform="matrix(0.7071 0.7071 -0.7071 0.7071 23.5226 -4.7697)" class="st0" width="10.6" height="10.6"/>
					</svg>

				</div>
				<div class="log_tit1 pro_gallery"><a class="pro_gallery">Colors</a></div>
			</div>

		</div>
        <div class="col-md-8" id="slide_here">
            <div class="details_pro">
                <div class="display_property">
                    <div class="col-md-12 display_property_1">
                        <?php echo $product_1['features']; ?>
                    </div>
                </div>
            </div>
        </div>		
	</div>
	<div>&nbsp;</div><?php */?>
<?php /*?><?php     if(!empty($gallery))  { 
	?>
	    <div align="center"><h2>Gallery</h2></div>
            <div class="row">	
                <div class="col-md-8 col-md-offset-2" id="gallery">
                     <div class="flexslider carousel" id="onetwo">
                         <ul class="slides">
                            <?php 
                                foreach($gallery as $display){
                                    $gallerys[] = $display['gallery'];
                                }
                                $count = count($gallerys);
                                for ($i=0; $i<$count; $i++) {
                                    if ($i % 2 == 0){
                                        if($gallerys[$i] != ""){
                            ?>
                                <li>
                                    <a class="popup-link" href="<?php echo base_url(); ?>uploads/products_gallery/<?php echo $gallerys[$i]; ?>"><img src="<?php echo base_url(); ?>uploads/products_gallery/<?php echo $gallerys[$i]; ?>" draggable="false"></a>
                                    <?php if($gallerys[$i+1] != ""){ ?>
                                    <a class="popup-link" href="<?php echo base_url(); ?>uploads/products_gallery/<?php echo $gallerys[$i+1]; ?>"><img src="<?php echo base_url(); ?>uploads/products_gallery/<?php echo $gallerys[$i+1]; ?>" draggable="false" /></a>
                                        <?php } ?>
                                </li>
                           <?php 		}
                                    }
                                } ?>
                            </ul>
                        </div>
                            <ul class="flex-direction-nav">
                                <li><a class="flex-prev" href="#">Previous</a></li>
                                <li><a class="flex-next" href="#">Next</a></li>
                            </ul>
                    </div>
            </div>
        <div>&nbsp;</div>
        <!--<div align="center">
            <h2>Watch to learn more</h2>
            <iframe width="100%" height="400" src="https://www.youtube.com/embed/gmH1Or04n3A?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>-->
       <?php  } ?>
       <div align="center">
            <h2>Watch to learn more</h2>
            <iframe width="100%" height="400" src="https://www.youtube.com/embed/gmH1Or04n3A?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
	<div class="container">
       <?php /*?> <div class="row section1">
            <div class="col-md-4"></div>
                <div class="col-md-4 all_products">
                    <div class="btn_skewx">
                        <div class="text-skewx">
                            <a class="" href="javascript: history.go(-1)">Go Back</a>
                        </div>
                    </div>				
                </div>
            <div class="col-md-4"></div>
        </div>
        <div>&nbsp;</div><?php */?>
       <?php /*?> <div class="row">
             <h2 align="center" class="interested">Interested in this product?</h2>
        </div>
        <div class="row section1">
            <div class="col-md-4"></div>
            <div class="col-md-4 all_products" style="margin-top:30px; margin-bottom:30px;">
                <div class="btn_skewx">
                    <div class="text-skewx">
                        <a class="sample_request">Request Quote</a>
                    </div>
                </div>                                    
            </div>
        </div>
        <div class="row section1">
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
</div>

<div id="GSCCModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<!--<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<h4 class="modal-title" id="myModalLabel">Modal title</h4>
      		</div>-->
      		<div class="modal-body">
            	<div id="videoContainer">
  					<?php /*?><iframe width="450" height="300" src="https://www.youtube.com/embed/gmH1Or04n3A?wmode=transparent" frameborder="0" allowfullscreen wmode="Opaque"></iframe><?php */?>
				</div>
      		</div>
            <div class="modal-footer">
            	<button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
            </div>
    	</div>
  	</div>
</div>

<div id="GSCCModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-body">
            	<div id="videoContainer1">
  					<?php /*?><iframe width="450" height="300" src="https://www.youtube.com/embed/3psPGihvO7I?wmode=transparent" frameborder="0" allowfullscreen wmode="Opaque"></iframe><?php */?>
				</div>
      		</div>
            <div class="modal-footer">
            	<button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
            </div>
    	</div>
  	</div>
</div>

<div id="GSCCModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<!--<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<h4 class="modal-title" id="myModalLabel">Modal title</h4>
      		</div>-->
      		<div class="modal-body">
            	<div id="videoContainer2">
  					<?php /*?><iframe width="450" height="300" src="https://www.youtube.com/embed/gmH1Or04n3A?wmode=transparent" frameborder="0" allowfullscreen wmode="Opaque"></iframe><?php */?>
				</div>
      		</div>
            <div class="modal-footer">
            	<button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
            </div>
    	</div>
  	</div>
</div>


<script>
$(document).ready(function(){
	
	
	$('#myModal').click(function(){
		var video_link = $(this).data('video_link');
		$('#GSCCModal #videoContainer').html('<iframe width="450" height="300" src="'+video_link+'" frameborder="0" allowfullscreen wmode="Opaque"></iframe>');
		jQuery('#GSCCModal').modal({
    		show: 'false'
		}); 
	});			
	$('#myModal1').click(function(){
		var video_link = $(this).data('video_link');
		//$("#videoContainer").html('<iframe width="450" height="300" src="https://www.youtube.com/embed/3psPGihvO7I?wmode=transparent" frameborder="0" allowfullscreen wmode="Opaque"></iframe>');
		$('#GSCCModal1 #videoContainer1').html('<iframe width="450" height="300" src="'+video_link+'" frameborder="0" allowfullscreen wmode="Opaque"></iframe>');
		jQuery('#GSCCModal1').modal({
    		show: 'false'
		}); 
	});
	
	$('#myModal2').click(function(){
		var video_link = $(this).data('video_link');
		$('#GSCCModal2 #videoContainer2').html('<iframe width="450" height="300" src="'+video_link+'" frameborder="0" allowfullscreen wmode="Opaque"></iframe>');
		jQuery('#GSCCModal2').modal({
    		show: 'false'
		}); 
	});
	
	$('.youtube-video-1').magnificPopup({
      type: 'iframe'
   });
   $('.youtube-video-2').magnificPopup({
      type: 'iframe'
   });

   $("#colorslider1 ul").addClass("slides");
   $("#colorslider2 ul").addClass("slides");
   $("#colorslider3 ul").addClass("slides");
   $("#colorslider4 ul").addClass("slides");
   $("#colorslider5 ul").addClass("slides");
   $("#colorslider6 ul").addClass("slides");
   $("#colorslider7 ul").addClass("slides");
   
   
   
   	$('.owl-carousel').owlCarousel({
		loop:true,
		margin:10,
		nav:true,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:3
			},
			1000:{
				items:5
			}
    	}
	});

	$("#slider_yourtubes ul").addClass("slides");

	$('#slider_yourtubes').flexslider({
		animation: "slide",
		itemWidth: 375,
		itemMargin: 4
	});
	
	jQuery('.products_carousal_decor ul').addClass('slides');
	
	
	jQuery('.products_carousal_decor').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
        minItems: 2,
        maxItems: 5,
        start: function(slider){
          jQuery('body').removeClass('loading');
		  
		  jQuery('.popup-link-color').magnificPopup({
				type: 'image',
				gallery:{enabled:true}
			});
			
        }
      }); 
	  
	  
	jQuery('.products_carousal_elite ul').addClass('slides');	
	
	jQuery('.products_carousal_elite').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
        minItems: 2,
        maxItems: 5,
        start: function(slider){
          jQuery('body').removeClass('loading');
		  
		  jQuery('.popup-link-elite').magnificPopup({
				type: 'image',
				gallery:{enabled:true}
			});
			
        }
      }); 
	
	jQuery('.products_carousal_granite ul').addClass('slides');	
	
	jQuery('.products_carousal_granite').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
        minItems: 2,
        maxItems: 5,
        start: function(slider){
          jQuery('body').removeClass('loading');
		  
		  jQuery('.popup-link-granite').magnificPopup({
				type: 'image',
				gallery:{enabled:true}
			});
			
        }
      }); 
	 
	  
	  jQuery('.products_carousal_metro ul').addClass('slides');	
	
	jQuery('.products_carousal_metro').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
        minItems: 2,
        maxItems: 5,
        start: function(slider){
          jQuery('body').removeClass('loading');
		  
		  jQuery('.popup-link-metro').magnificPopup({
				type: 'image',
				gallery:{enabled:true}
			});
			
        }
      }); 
	  
	    
	jQuery('.products_carousal_standard ul').addClass('slides');	
	
	jQuery('.products_carousal_standard').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
        minItems: 2,
        maxItems: 5,
        start: function(slider){
          jQuery('body').removeClass('loading');
		  
		  jQuery('.popup-link-standard').magnificPopup({
				type: 'image',
				gallery:{enabled:true}
			});
			
        }
      }); 
	  
	  
	  jQuery('.products_carousal_stone ul').addClass('slides');	
	
	jQuery('.products_carousal_stone').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
        minItems: 2,
        maxItems: 5,
        start: function(slider){
          jQuery('body').removeClass('loading');
		  
		  jQuery('.popup-link-stone').magnificPopup({
				type: 'image',
				gallery:{enabled:true}
			});
			
        }
      }); 
	  
	  
	  	  jQuery('.products_carousal_twocolor ul').addClass('slides');	
	
	jQuery('.products_carousal_twocolor').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
        minItems: 2,
        maxItems: 5,
        start: function(slider){
          jQuery('body').removeClass('loading');
		  
		  jQuery('.popup-link-twocolor').magnificPopup({
				type: 'image',
				gallery:{enabled:true}
			});
			
        }
      }); 
	  
	  jQuery('#onetwo').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
        minItems: 2,
        maxItems: 5,
        start: function(slider){
          jQuery('body').removeClass('loading');
		  
		  jQuery('.popup-link-gallery').magnificPopup({
				type: 'image',
				gallery:{enabled:true}
			});
        }
      }); 
	  
});

jQuery('a.introVid').click(function(){
	autoPlayVideo('gmH1Or04n3A','450','300');
});

/*jQuery('#GSCCModal').click(function(){
	$("#videoContainer").html('<iframe width="450" height="300" src="https://www.youtube.com/embed/gmH1Or04n3A?wmode=transparent" frameborder="0" allowfullscreen wmode="Opaque"></iframe>');
});*/

/*function autoPlayVideo(vcode, width, height){
	"use strict";
	$("#videoContainer").html('<iframe width="'+width+'" height="'+height+'" src="https://www.youtube.com/embed/'+vcode+'?autoplay=1&loop=1&rel=0&wmode=transparent" frameborder="0" allowfullscreen wmode="Opaque"></iframe>');
}*/

jQuery('a.introVid1').click(function(){
	autoPlayVideo1('3psPGihvO7I','450','300');
});

jQuery('#GSCCModal1').click(function(){
	$("#videoContainer").html('<iframe width="450" height="300" src="https://www.youtube.com/embed/3psPGihvO7I?wmode=transparent" frameborder="0" allowfullscreen wmode="Opaque"></iframe>');
});


function autoPlayVideo1(vcode, width, height){
	"use strict";
	$("#videoContainer1").html('<iframe width="'+width+'" height="'+height+'" src="https://www.youtube.com/embed/'+vcode+'?autoplay=1&loop=1&rel=0&wmode=transparent" frameborder="0" allowfullscreen wmode="Opaque"></iframe>');
}


	  
function setImage(image_name, downloadlink)
{
	$("#pdf_image").html('<a href="<?php echo base_url() ?>uploads/products_pdf/'+downloadlink+'" target="_blank">'+
		'<img src="<?php echo base_url() ?>uploads/products_pdf/'+image_name+'" style="width:100%"></a>');
}

</script>