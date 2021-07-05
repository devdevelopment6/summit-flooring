
<div class='blog_section'>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1 class="link_news"><?php echo $news_content['news_title']; ?></h1>
				<span class="blog_date_box">
					By <span class="author"><?php echo $news_content['author']; ?></span> |
					<span class="glyphicon glyphicon-time"></span> &nbsp;<?php echo date('F j, Y',strtotime($news_content['publish_date'])); ?></span>
				<br /><br /><img src="<?php echo base_url();?>uploads/news_images/<?php echo $news_content['images']; ?>" alt="<?php echo $news_content['news_title']; ?>" title="Welcome to the New Health Gauge Blog!" class="img-responsive" rel="" width="900" /><br /><br /><div id="news_content"><?php echo $news_content['news_content']; ?></div><br /><br />			</div>


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
						<div class="post-content"><a href="<?php echo base_url(); ?>front_end/news_page/<?php echo $recent_news['id'];?>"><p><?php echo $recent_news['news_title']; ?></p></a>&nbsp;<?php echo date('F j, Y',strtotime($recent_news['publish_date'])); ?></div>					</div>
				</div>
			
			</div>
		</div>

	</div>
</div>

		
