<?php

/**

 * Displays top navigation

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */

$image = get_field('in_serve_tag', 34);
$size = 'servicein';

?>
<div class="innerpage">
<section class="slider">
	<img src="/wp-content/uploads/2021/05/innerbanner.jpg" alt="<?php the_title(); ?>" class="banner" />
		<div class="container">
		<div class="tag">
                <?php if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}?>
		</div>
	</div>
</section>
	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section class="innercontent">
	<div class="container">
    <?php the_title( '<h1 class="pagetitle">', '</h1>' ); ?>
    <div class="entry-content">

		<?php

			the_content();



			wp_link_pages(

				array(

					'before' => '<div class="page-links">' . __( 'Pages:', 'global' ),

					'after'  => '</div>',

				)

			);

			?>

	</div>
    <?php get_template_part( 'template-parts/post/service', 'faq');?>
	</div>
</section>

	

	<!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
