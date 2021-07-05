<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

$logo = get_field('logo', 12);

$size = '600';

$size2 = '330';

$phoneno = get_field('phone', 34);
$email = get_field('email', 34);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">


	

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    
    <header>
<div class="container">
	<div class="top-head">
		
	
		
	<div class="logo">
		<!-- <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" alt="" class="img-fluid"> -->
		<a href="<?php echo site_url();?>">
		<?php 
		if($logo){
		   	echo wp_get_attachment_image( $logo,'' );
		 }
		?>
		</a>
	</div>

	 <?php if ( has_nav_menu( 'top' ) ) : ?>

  	<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?> 

   <?php endif; ?>				
</div>	
</header>

	<!-- #masthead -->


	<div class="site-content-contain">
		<div id="content" class="site-content">
