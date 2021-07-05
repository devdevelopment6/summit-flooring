<?php

/**

 * Displays footer widgets if assigned

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.0

 */

$footer_logo = get_field('footer_logo', 12);
$footer_internationl = get_field('footer_internationl', 12);
$footer_bb_ratting = get_field('footer_bb_ratting', 12);

$all_rights_reserved = get_field('all_rights_reserved', 12);

?>



<div class="col-md-3 mb-5 text-center">
				<div class="footer-image">
				<a href="<?php echo site_url();?>">	
				<?php 
					if($footer_logo){
					   	echo wp_get_attachment_image( $footer_logo,'' );
					 }
					?>
				</a>	
				</div>
			</div>
			<div class="col-md-3 mb-5 text-center">
				<div class="footer-image">
				<?php 
					if($footer_internationl){
					   	echo wp_get_attachment_image( $footer_internationl,'' );
					 }
					?>
				</div>			
			</div>
			<div class="col-md-3 mb-5 text-center">
				<div class="footer-image">
				<?php 
					if($footer_bb_ratting){
					   	echo wp_get_attachment_image( $footer_bb_ratting,'' );
					 }
					?>
				</div>			
			</div>
