<?php

/**

 * Displays About section

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */



?>
<section class="recent-blog">
	<div class="container padding-clas">
		<div class="row">
			<div class="col-md-12">
				<div class="watch-more">
					<h2>From our Blog</h2>
					<span class="title-highlight"></span>
				</div>
			</div>
		</div>
	</div>

			<div class="container-fluid">
			<div class="row">
			<?php query_posts('showposts=8'); if (have_posts()) : while (have_posts()) : the_post(); ?>	
					<div class="col-lg-3 col-md-6 col-sm-6">

						<div class="post-box">

							<a class="post-content" href="<?php the_permalink(); ?>">
								<span class="link-icon"></span>
								<!-- <img class="" src="<?php echo get_template_directory_uri();?>/assets/images/blog.jpg" alt="" class="img-fluid">	 -->	

								<?php the_post_thumbnail('full'); ?>						
								<div class="post-content-detail">
									<div class="post-date">Jun 4, 2021</div>
									<div class="post-title"><?php the_title(); ?></div>
									<div class="post-text">
										<?php echo get_the_excerpt();?>							
									</div>
									<div class="post-readmore">read more</div>

								</div>
							</a>
						</div>

					</div>
				<?php endwhile; endif; wp_reset_query();?>
			</div>
			<div class="row ">
				<div class="col-md-12">
					<div class="blog-btn-div">
					<a href="<?php echo site_url();?>/blog/" class="btn btn-blue" title="READ ALL NEWS">READ ALL NEWS</a>
					</div>
				</div>
			</div>
		</div>
	</section>