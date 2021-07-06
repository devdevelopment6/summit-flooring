<?php

/**

 * Category

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */


//$image= wp_get_attachment_image_src( get_post_thumbnail_id( $post->id));
$image = get_field('banner');
?>

<section class="product-top">
	<div class="container-fluid">
		<div class="row">
							<div class="col-xl-5 product-banner" style="background-image: url(<?php echo wp_get_attachment_url( $image);?>);"></div>
						<div class="col-xl-6 product-banner-content">
				<h1 class="mb-5"><?php the_title(); ?></h1>
				<h2><?php echo get_field('instaation_title');?></h2>

				<?php echo get_field('instaation_content');?>
				
				
			</div>
		</div>
	</div>
</section>