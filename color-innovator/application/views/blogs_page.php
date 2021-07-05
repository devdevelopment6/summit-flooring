<div class="container-fluid banner product contact_page_banner" style="padding:0px;position:relative;">
	<?php /*if($category_details['banner_image'] !='' && $category_details['banner_image']!=NULL && file_exists(FCPATH.'uploads/category_banner_images/'.$category_details['id'].'/'.$category_details['banner_image'])){*/ ?>
	<img src="<?php echo base_url();?>homepage_assests/new_images_1/summit-flooring-made-flat-stays-flat-bg_1.jpg" class="cust_banner_prod_cat" alt="location_category_banner_image" style="width:100%;height:auto;">
	<?php //} ?>
	<div class="container">
		<div class="banner_product">
			<div class="background_small_image"></div>
			<div class="banner_txt col-sm-12">
				<div class="bg_small_img"></div>
				<h2 class="page_title hosp_title"><span><?php echo 'Blog';?></span></h2>
			
			</div>
		</div>
	</div>
</div>
<div class='blog_section'>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1 class=""><?php echo $blogs_content['blog_title']; ?></h1>
				<span class="blog_date_box">
					By <span class="author"><?php echo $blogs_content['author']; ?></span> |
					<span class="glyphicon glyphicon-time"></span> &nbsp;<?php echo date('F j, Y',strtotime($blogs_content['publish_date'])); ?></span>
				<br /><br />
                <?php
					if($blogs_content['images'] == '' || $blogs_content['images'] == 'Image.jpg')
					{
					?>
                <img src="<?php echo base_url();?>uploads/default_images/blog_default_img.jpg" alt="<?php echo $blogs_content['news_title']; ?>" title="<?php echo $blogs_content['news_title']; ?>" class="img-responsive" rel="" width="900" />
                	<?php 
					}
					else
					{
					?>
                <img src="<?php echo base_url();?>uploads/blogs_images/<?php echo $blogs_content['images']; ?>" alt="<?php echo $blogs_content['news_title']; ?>" title="<?php echo $blogs_content['news_title']; ?>" class="img-responsive" rel="" width="900" />
               <?php } ?>
                <br /><br /><div><?php echo $blogs_content['news_content']; ?></div><br /><br />			</div>


			<div class="col-md-offset-1 col-md-3 link_news_2">
				<form action="#" name="form" method="get" accept-charset="utf-8">
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
						<h3><strong>RECENT POSTS</strong></h3>
						<div class="post-content"><a href="<?php echo base_url(); ?>front_end/blogs_page/<?php echo $recent_blog['id'];?>"><p><?php echo $recent_blog['blog_title']; ?></p></a>&nbsp;<?php echo date('F j, Y',strtotime($recent_blog['publish_date'])); ?></div>					</div>
				</div>
			
			</div>
		</div>

	</div>
</div>