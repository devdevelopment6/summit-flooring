<?php

/**

 * Category

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */
$about_image = get_field('team_image');


?>

<div class="container my-5">
<div class="row">
<div class="col-md-8">
<?php the_field('team_content');?>
</div>

<div class="col-md-4">
	<?php 
	 if($about_image){
		echo wp_get_attachment_image( $about_image,'' );
	}

	?>
<p class="text-center mt-3"><?php the_field('team_title');?></p>
</div>
</div>
</div>
</section>