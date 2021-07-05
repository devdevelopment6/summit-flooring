<?php

/**

 * Banner

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */



//$image= wp_get_attachment_image_src( get_post_thumbnail_id( $post->id ));
 $thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, '', true);
 $image = $thumb_url_array[0];
?>

<section class="page-banner" style="background-image: url(<?php echo $image;?>);">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</section>