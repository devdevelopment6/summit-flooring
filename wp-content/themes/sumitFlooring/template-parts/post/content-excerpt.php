<?php

/**

 * Template part for displaying posts with excerpts

 *

 * Used in Search Results and for Recent Posts in Front Page panels.

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */



?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	<header class="entry-header">



		<?php

		if ( is_front_page() && ! is_home() ) {



			// The excerpt is being displayed within a front page section, so it's a lower hierarchy than h2.

			the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );

		} else {

			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

		}

		?>

	</header><!-- .entry-header -->



	<div class="entry-summary">

		<?php the_excerpt(); ?>

	</div><!-- .entry-summary -->



</article><!-- #post-<?php the_ID(); ?> -->

