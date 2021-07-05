<?php

/**

 * The template for displaying all pages

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
 
 * Template Name: Videos

 */



get_header(); ?>


<?php get_template_part( 'template-parts/banner/banner');?>

<div class="wrap">

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">


			<?php

			while ( have_posts() ) :

				the_post();



				get_template_part( 'template-parts/videos' );


			endwhile; // End the loop.

			?>



		</main><!-- #main -->

	</div><!-- #primary -->

</div><!-- .wrap -->



<?php

get_footer();

