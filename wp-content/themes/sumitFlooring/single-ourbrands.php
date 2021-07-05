<?php

/* Template Name: Our Brand

 * The template for displaying all pages

 *

 * This is the template that displays all pages by default.

 * Please note that this is the WordPress construct of pages

 * and that other 'pages' on your WordPress site may use a

 * different template.

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.0

 */



get_header();

?>
<link href="<?php echo get_template_directory_uri();?>/assets/css/innerStyle.css" rel="stylesheet" type="text/css" />
<div class="content_primary">


    	<?php

    // Show the selected front page content.

    if ( have_posts() ) :

      while ( have_posts() ) :

        the_post();

        //get_template_part( 'template-parts/innerpage/inner', 'page' );
        get_template_part( 'template-parts/ourbrands/brands', 'page' );

      endwhile;

    else :

      get_template_part( 'template-parts/post/content', 'none' );

    endif;

    ?>




    </div>	
		

<?php

get_footer();

?>