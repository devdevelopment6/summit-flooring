<?php

/**

 * The template for displaying services

 *

 * This is the template that displays all pages by default.

 * Please note that this is the WordPress construct of pages

 * and that other 'pages' on your WordPress site may use a

 * different template.

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.0

 */

 ?>


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
		<div class="service-panel">
		<div class="row">
        <?php
$loop = new WP_Query( array(
    'post_type' => 'service',
    'posts_per_page' => -1,
	'orderby' => 'title', 
    'order' => 'ASC',
	'post_status' => 'publish', 
  )
);
?>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<div class="col-sm-6">
<div class="service-box">
<div class="service-thumb">
<?php the_post_thumbnail('service-thumb');?>
</div>
<h3><?php the_field('service_title'); ?></h3>

<?php the_field('short_description'); ?></br>

<a href="<?php the_permalink();?>" class="stylebtn">Know more</a>
</div>

</div>
<?php endwhile; wp_reset_query(); ?>	
</div>
</div></br>
<h2>Your Partners in Excellence Since 1967</h2>
<p><!-- wp:paragraph -->
<p>Offering function, as well as aesthetic appeal, implants have become a mainstay in contemporary dental practices. At IDL, we use proven methods and best-in-class materials to ensure optimal fit of implant restorations, along with expert case selection for long term stability. Our custom implant abutments have several unique features that you may not find elsewhere. <strong><a href="/contact" data-type="URL" data-id="/contact">Know More…</a></strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Contact Image Dental Laboratory to learn more about our dental laboratory services and treatment planning offerings.</strong></p>
<!-- /wp:paragraph --></p>
	</div>
	</div>
</section>

	

	<!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

