<?php

/**

 * The main template file

 *

 * This is the most generic template file in a WordPress theme

 * and one of the two required files for a theme (the other being style.css).

 * It is used to display a page when nothing more specific matches a query.

 * E.g., it puts together the home page when no home.php file exists.

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.0

 */



get_header(); ?>



<div class="js-offcanvas" id="mobile-nav"></div>
		</div>

<div class="content_primary">

	<section class="page-banner" style="background-image: url(https://www.summit-flooring.com/inc/upload/images/PLANKX-1.jpg);">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<h1 class="page-title">Blog</h1>
				</div>
			</div>
		</div>
	</section>

<section class="page-content">
	<div class="container">
		<div class="row">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
				the_post()
			?>
				<div class="col-lg-4 col-md-6">

					<div class="post-box">

						<a class="post-content" href="<?php the_permalink(); ?>">
							<span class="link-icon"></span>
							<?php if(has_post_thumbnail()) { the_post_thumbnail('full'); }?>
							<div class="post-content-detail">
								<div class="post-date"><?php echo get_the_date( 'd M, Y' );?></div>
								<div class="post-title"><?php the_title();?></div>
								<div class="post-text">
									<?php echo get_the_excerpt();?>								</div>
								<div class="post-readmore">read more</div>

							</div>
						</a>
					</div>

				</div>

			<?php get_template_part( 'template-parts/pagination' ); ?>
			<?php endwhile; endif;?>	
			<nav class="pagination">
				<?php pagination_bar(); ?>
			</nav>
				
			
		</div>

		
	</div>
</section>


		</div>



<?php

get_footer();

