<?php

/**

 * Displays content for front page

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.0

 */


?>

<?php 
get_template_part( 'template-parts/home/slider'); 
get_template_part( 'template-parts/home/home', 'partner');
get_template_part( 'template-parts/home/service');
get_template_part( 'template-parts/home/blog');

?>

