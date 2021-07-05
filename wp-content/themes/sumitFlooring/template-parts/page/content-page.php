<?php

/**

 * Template part for displaying page content in page.php

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.0

 */



?>
<?php get_template_part( 'template-parts/banner/banner');?>


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
	</div>
</section>

	

	<!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

