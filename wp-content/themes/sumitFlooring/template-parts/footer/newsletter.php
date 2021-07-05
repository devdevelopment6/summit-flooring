<?php

/**

 * Displays top navigation

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */
$newsletter = get_field('newsletter_shortcode', 34);
?>

	  <?php echo do_shortcode( $newsletter ); ?>