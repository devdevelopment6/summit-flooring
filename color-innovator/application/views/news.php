
<img src='<?php echo base_url(); ?>homepage_assests/image/about-testimonial.jpg' class='img img-responsive contact_img'>

<div class='blog_section'>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row blog_row">
                <?php 
				foreach($results as $news)
				{
					?>
				 	<div class="col-md-12 col-sm-12">
                    
						<div class='col-md-4'>
							<div class="blog_image_box ">
                            
								<a href="<?php echo base_url(); ?>front_end/news_page/<?php echo $news->id;?>">
									<img class="img img-responsive news_image" src="<?php echo base_url();?>uploads/news_images/<?php echo $news->images; ?>" width='100%' alt="">
								</a>
							</div>
						</div>
						<div class='col-md-8'>
								<div class="news_post_content_wrap">
 										<h3><a href="<?php echo base_url(); ?>front_end/news_page/<?php echo $news->id;?>" class="blog_title"><?php echo $news->news_title; ?></a></h3>
							 	<span class="blog_date_box">
									By <span class="author"><?php echo $news->author; ?></span> |
									<span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo date('F j, Y',strtotime($news->publish_date)); ?>
								</span>		
 								<div class="clearfix"></div>
								  	<div class="blog_post_content">
										<p><?php echo $news->short_content; ?></p><a href="<?php echo base_url(); ?>front_end/news_page/<?php echo $news->id;?>" class="btn  btn-green btn-radius-15 blog_post_button">read more</a>
									</div>
								</div>
						 </div>
					 </div>
                     <?php
				}
            	?>         
				</div>
                        <p>
                    <?php foreach ($links as $link) {
                        echo $link;
                        } ?></p>
			</div>

			<div class="col-md-offset-1 col-md-3">
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
					<h3><strong>RECENT NEWS </strong></h3>

					<div class="post-content"><a href="<?php echo base_url(); ?>front_end/news_page/<?php echo $recent_news->id;?>"><p><?php echo $recent_news->news_title; ?></p></a>&nbsp;<?php echo date('F j, Y',strtotime($recent_news->publish_date)); ?></div>
				</div>
			</div>
		</div>

			
	</div>
</div>
