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
$size = 'servicein'; // (thumbnail, medium, large, full or custom size)
?>
<div class="innerpage">
<section class="slider">
<?php if ( has_post_thumbnail() ) {
the_post_thumbnail('inner-banner', array( 'class' => 'banner' ));
} else { ?>
<img src="/wp-content/uploads/2021/05/innerbanner.jpg" alt="<?php the_title(); ?>" class="banner" />
<?php } ?>

	<div class="container">
		<div class="tag">
                <?php if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}?>
		</div>
	</div>
</section>


</div>
	