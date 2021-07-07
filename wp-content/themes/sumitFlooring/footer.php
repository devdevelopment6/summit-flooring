<?php

/**

 * The template for displaying the footer

 *

 * Contains the closing of the #content div and all content after.

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */

?>



	</div>



	


<footer>
	<div class="footer-content">
	<div class="container">
		<div class="row">
			<?php  get_template_part( 'template-parts/footer/footer', 'widgets') ?>
			<div class="col-md-3">
				<?php get_template_part( 'template-parts/footer/contact', 'info'); ?>
			</div>
		</div>
	</div>
</div>

<div class="copyright">
	<div class="container">
		<div class="row">
			<?php get_template_part( 'template-parts/footer/site', 'info');?>
		</div>
	</div>
</div>
</footer>






<?php wp_footer(); ?>



</body>

</html>

