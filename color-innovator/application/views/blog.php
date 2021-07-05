<div class="container-fluid banner product contact_page_banner" style="padding:0px;position:relative;">
	<?php /*if($category_details['banner_image'] !='' && $category_details['banner_image']!=NULL && file_exists(FCPATH.'uploads/category_banner_images/'.$category_details['id'].'/'.$category_details['banner_image'])){*/ ?>
	<img src="<?php echo base_url();?>homepage_assests/new_images_1/new_2_dinoflex-made-flat-stays-flat-bg_1.jpg" class="cust_banner_prod_cat" alt="location_category_banner_image" style="width:100%;height:auto;">
	<?php //} ?>
	<div class="container">
		<div class="banner_product">
			<div class="background_small_image"></div>
			<div class="banner_txt col-sm-12">
				<div class="bg_small_img"></div>
				<h2 class="page_title hosp_title"><span><?php echo 'Blogs';?></span></h2>
			
			</div>
		</div>
	</div>
</div>



<!--<div class="row contact_us">        
	<img src='<?php echo base_url(); ?>homepage_assests/image/about-testimonial.jpg' class='img img-responsive contact_img'>
</div>-->

<div class='blog_section'>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="row blog_row">
				
                <?php 
                	 	foreach($blog_results as $blog)
						{
							if($blog->images == 'Image.jpg' || $blog->images == '')
							{
					 ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="blog_image_box">
								<a href="<?php echo base_url(); ?>front_end/blogs_page/<?php echo $blog->blog_url;?>">
                                <img class="img-responsive" src="<?php echo base_url(); ?>/uploads/default_images/blog_default_img.jpg"  alt="blog_default_img">
                                </a>
                             </div>
                             <?php 
							}
							else
							{
								?>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="blog_image_box">
                                        <a href="<?php echo base_url(); ?>front_end/blogs_page/<?php echo $blog->blog_url;?>">
                                        <img class="img-responsive" src="<?php echo base_url(); ?>/uploads/blogs_images/<?php echo $blog->images; ?>"  alt="blogs_images">
                                        </a>
                                     </div>
                             <?php } ?>

							<div class="blog_post_content_wrap">

								<h3><a href="<?php echo base_url(); ?>front_end/blogs_page/<?php echo $blog->blog_url;?>" class="blog_title"><?php echo substr(strip_tags($blog->blog_title),0,30).'...'; ?></a></h3>
								<br>

								<span class="blog_date_box">
									By <span class="author"><?php echo $blog->author; ?></span> |
									<span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo date('F j, Y',strtotime($blog->publish_date)); ?>
								</span>

								<div class="clearfix"></div>
								<div class="blog_post_content">
									<p><?php echo substr(strip_tags($blog->short_content),0,140).'...'; ?></p><a href="<?php echo base_url(); ?>front_end/blogs_page/<?php echo $blog->blog_url;?>" class="btn  btn-green btn-radius-15 blog_post_button">read more</a>
								</div>
							</div>
						</div>
                       <?php 
					   	}
						?>                        
				 </div>
                 
                 <p>
                    <?php foreach ($blog_links as $link) {
                        echo $link;
                        } ?></p>
				
			</div>

			<div class="col-md-offset-1 col-md-3 col-sm-12 col-xs-12">
					<form action="https://healthgauge.ca/blog/search" name="form" method="get" accept-charset="utf-8">
					<div id="custom-search-input">
						<div class="input-group custom-search-form">
							<input type="text" class="form-control" name="search_keyword">
							<span class="input-group-btn">
								<button class="btn btn-green searchBtn" type="submit">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</span>
						</div>
					</div>
					</form>

					<div class="blog-recent-post">
						<h3><strong>RECENT POSTS </strong></h3>
						<div class="post-content"><a href="<?php echo base_url(); ?>front_end/blogs_page/<?php echo $recent_blog->blog_url;?>"><p><?php echo $recent_blog->blog_title;?></p></a>&nbsp;<?php echo date('F j, Y',strtotime($recent_blog->publish_date)); ?></div>
					</div>
				</div>
					</div>

			</div>
</div>