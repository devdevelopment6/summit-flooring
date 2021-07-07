<?php

/**

 * Watch Video

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
<div class="content_primary">

	<section class="page-banner" style="background-image: url(<?php echo $image;?>);">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h1 class="page-title"><?php echo the_title(); ?></h1>
			</div>
		</div>
	</div>
</section>

<section class="page-content bg-light-grey">
	<div class="container">
		<div id="brand-category">
			<div id="filters" class="brand-category-list">				
				<a class="active" data-filter="*">All</a>					
			</div>
		</div>

		<div id="brand-item-list" class="row">
			<?php if( have_rows('brands') ): 

			  while( have_rows('brands') ): the_row(); 
			    $brand_image = get_sub_field('brand_image');
			 
			?>
				<div class="col-md-3 col-sm-4 col-xs-6 element-item our_brands" data-category="our_brands">

					<div class="brand-box">
						<a href="<?php echo get_sub_field('brand_link');  ?>" target="_blank">
							<div class="brand-thumb">
								<img class="img-fluid" src="<?php echo wp_get_attachment_url( $brand_image);?>" alt="" />							</div>
							<div class="brand-name"><?php echo get_sub_field('brand_title');  ?></div>
						</a>
					</div>

				</div>
			<?php 
	           endwhile;
	           endif; 
	        ?>
				
		</div>
	</div>
</section>
</div>