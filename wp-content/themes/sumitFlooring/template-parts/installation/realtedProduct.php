<?php

/**

 * Category

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */



?>

 <?php 
      $related_product = get_field('reated_product');
      if( $related_product ): 
  ?>
<section class="related-product bg-light-grey">

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-10">
				<h2>RELATED PRODUCTS</h2>
				<div class="row">
					<?php foreach( $related_product as $related_product ): 
                    $permalink = get_permalink( $related_product->ID );
                    $title = get_the_title( $related_product->ID );
                    $featured_img_url = get_the_post_thumbnail_url($related_product->ID,'medium_large');
                   
                    $custom_field = get_field( 'field_name', $related_product->ID );
                    ?>
						<div class="col-md-4">

							<div class="product-box">

								<a class="product-content" href="<?php echo esc_url( $permalink ); ?>">
									<span class="link-icon"></span>
									<?php echo get_the_post_thumbnail( $related_product->ID, 'thumbnail');?>		
									<!-- <img class="" src="https://summit-flooring.com/inc/upload/images/OC_Product_Page_-_Shari_medium.jpg" alt="" /> -->					</a>
								<div class="product-content-detail">
									<div class="product-title"><?php echo $title;?></div>
								</div>
							</div>

						</div>
<?php endforeach; ?>
					
						

									</div>
			</div>
		</div>
	</div>

</section>
<?php endif; ?>