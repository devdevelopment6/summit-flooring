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


   <!-- https://wordpress.stackexchange.com/questions/145125/display-content-from-a-specific-category -->      
<section class="page-content bg-light-grey">
	<div class="container">
		<div id="reference-category">
			<div id="filters" class="reference-category-list">
				
						<a class="active" data-filter="*">							
							All
						</a>
						<!-- https://wordpress.stackexchange.com/questions/165610/get-posts-under-custom-taxonomy -->
					<?php
						$taxonomies = get_terms( array(
						    'taxonomy' => 'productvideo',
						    'hide_empty' => false,
						    'orderby'=> 'name',
								'order' => 'DESC'
						) );
						https://wordpress.stackexchange.com/questions/165610/get-posts-under-custom-taxonomy
						if ( !empty($taxonomies) ) :
							foreach( $taxonomies as $category ) {     
					 ?>
					
						<a data-filter=".<?php echo esc_html( $category->slug ); ?>" class="">
							<?php echo esc_html( $category->name ); ?>
						</a>

					<?php 	}
						endif;
						?>
											
					
				</div>
		</div>