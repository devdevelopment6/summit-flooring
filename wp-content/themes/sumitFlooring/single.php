<?php

/**

 * The template for displaying all single posts

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post

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
<?php 
	$image= wp_get_attachment_image_src( get_post_thumbnail_id(  $post->ID ));

?>
			
	<section class="page-banner" style="background-image: url(<?php echo $image[0];?>);">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<h1 class="page-title"><?php the_title();?></h1>
				</div>
			</div>
		</div>
	</section>

	<section class="page-content">
		<?php
					
			while ( have_posts() ) :
			the_post()
		?>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8 col-md-10 mb-5">
						<span class="post-info-box">
							<span class="post-date"><?php echo get_the_date( 'd M, Y' );?></span>
						</span>
					</div>
					<div class="col-lg-8 col-md-10">
						<?php get_template_part( 'template-parts/post/content', get_post_format() );?>
					</div>
				</div>
			</div>
		<?php
		endwhile; // End the loop.
		?>
	</section>

</div>

<?php

get_footer();

