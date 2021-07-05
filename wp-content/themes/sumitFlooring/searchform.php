<?php

/**

 * Template for displaying search forms in Global

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.0

 */



?>



<?php $unique_id = esc_attr( global_unique_id( 'search-form-' ) ); ?>



<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<label for="<?php echo $unique_id; ?>">

		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'global' ); ?></span>

	</label>

	<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'global' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />

	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'global' ); ?></span></button>

</form>

