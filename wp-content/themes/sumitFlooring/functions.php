<?php

/**

 * Global Theme functions and definitions

 *

 * @link https://developer.wordpress.org/themes/basics/theme-functions/

 *

 * @package WordPress

 * @subpackage Global Theme

 * @since Global Theme 1.0

 */



/**

 * Global Theme only works in WordPress 4.7 or later.

 */

 

// Add default posts and comments RSS feed links to head.

	add_theme_support( 'automatic-feed-links' );



	/*

	 * Let WordPress manage the document title.

	 * By adding theme support, we declare that this theme does not use a

	 * hard-coded <title> tag in the document head, and expect WordPress to

	 * provide it for us.

	 */

	add_theme_support( 'title-tag' );



	/*

	 * Enables custom line height for blocks

	 */

	add_theme_support( 'custom-line-height' );



	/*

	 * Enable support for Post Thumbnails on posts and pages.

	 *

	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/

	 */

	add_theme_support( 'post-thumbnails' ); 

	

// This theme uses wp_nav_menu() in two locations.

	register_nav_menus(

		array(

			'top'    => __( 'Top Menu', 'global' ),

			'footer' => __( 'Footer Menu', 'global' ),

		)

	);



	/*

	 * Switch default core markup for search form, comment form, and comments

	 * to output valid HTML5.

	 */

	add_theme_support(

		'html5',

		array(

			'comment-form',

			'comment-list',

			'gallery',

			'caption',

			'script',

			'style',

			'navigation-widgets',

		)

	);



	/*

	 * Enable support for Post Formats.

	 *

	 * See: https://wordpress.org/support/article/post-formats/

	 */

	add_theme_support(

		'post-formats',

		array(

			'aside',

			'image',

			'video',

			'quote',

			'link',

			'gallery',

			'audio',

		)

	);



	// Add theme support for Custom Logo.

	add_theme_support(

		'custom-logo',

		array(

			'width'      => 347,

			'height'     => 86,

			'flex-width' => false,

		)

	);



	// Add theme support for selective refresh for widgets.

	add_theme_support( 'customize-selective-refresh-widgets' );

	

/**



 * Add custom image sizes attribute to enhance responsive image functionality



 * for post thumbnails.



 *



 * @since Global 1.0



 *



 * @param array $attr       Attributes for the image markup.



 * @param int   $attachment Image attachment ID.



 * @param array $size       Registered image size or flat array of height and width dimensions.



 * @return array The filtered attributes for the image markup.



 */



function global_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {



	if ( is_archive() || is_search() || is_home() ) {



		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';



	} else {



		$attr['sizes'] = '100vw';



	}







	return $attr;



}



add_filter( 'wp_get_attachment_image_attributes', 'global_post_thumbnail_sizes_attr', 10, 3 );	

/**

 * Register widget area.

 *

 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar

 */

function global_widgets_init() {

	register_sidebar(

		array(

			'name'          => __( 'Right Side bar', 'global' ),

			'id'            => 'sidebar-1',

			'description'   => __( 'Add widgets here to appear in your sidebar on Contact Us.', 'global' ),

			'before_widget' => '<section id="%1$s" class="widget %2$s">',

			'after_widget'  => '</section>',

			'before_title'  => '<h2 class="widget-title">',

			'after_title'   => '</h2>',

		)

	);



	register_sidebar(

		array(

			'name'          => __( 'Footer 1', 'global' ),

			'id'            => 'sidebar-2',

			'description'   => __( 'Add widgets here to appear in your footer.', 'global' ),

			'before_widget' => '<section id="%1$s" class="widget %2$s">',

			'after_widget'  => '</section>',

			'before_title'  => '<h2 class="widget-title">',

			'after_title'   => '</h2>',

		)

	);



	register_sidebar(

		array(

			'name'          => __( 'Footer Social Icon', 'global' ),

			'id'            => 'sidebar-3',

			'description'   => __( 'Add widgets here to appear in your Social Icon', 'global' ),

			'before_widget' => '<section id="%1$s" class="widget %2$s">',

			'after_widget'  => '</section>',

			'before_title'  => '<h2 class="widget-title">',

			'after_title'   => '</h2>',

		)

	);

	register_sidebar(

		array(

			'name'          => __( 'Footer All Rights Reserved', 'global' ),

			'id'            => 'sidebar-4',

			'description'   => __( 'Add widgets here to appear in your Footer All Rights Reserved', 'global' ),

			'before_widget' => '<section id="%1$s" class="widget %2$s">',

			'after_widget'  => '</section>',

			'before_title'  => '<h2 class="widget-title">',

			'after_title'   => '</h2>',

		)

	);

}

add_action( 'widgets_init', 'global_widgets_init' );	



// Enqueue scripts

function global_scripts() {
wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css' );
wp_enqueue_style( 'owl-theme-css', get_template_directory_uri().'/assets/css/owl.theme.default.min.css' );	
wp_enqueue_style( 'Owl-css', get_template_directory_uri().'/assets/css/owl.carousel.min.css' );
wp_enqueue_style( 'style', get_template_directory_uri().'/assets/css/style.css' ); 


 wp_enqueue_script( 'jqueryslim-min', get_template_directory_uri().'/assets/js/jquery-3.5.1.slim.min.js', array(), false, true );
 
  wp_enqueue_script( 'jquery-min', get_template_directory_uri().'/assets/js/jquery.min.js', array(), false, true );

  wp_enqueue_script( 'proper-min', get_template_directory_uri().'/assets/js/popper.min.js', array(), false, true );
  
  wp_enqueue_script( 'bootstrap-min', get_template_directory_uri().'/assets/js/bootstrap.min.js', array(), false, true );

    wp_enqueue_script( 'Owl-carousel', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array(), false, true );

	 wp_enqueue_script( 'particles', get_template_directory_uri().'/assets/js/particles.js', array(), false, true );
    wp_enqueue_script( 'app', get_template_directory_uri().'/js/app.js', array(), false, true );
  wp_enqueue_script( 'fontawesome', 'https://kit.fontawesome.com/d95d67860c.js', array(), false, true );

   wp_enqueue_script( 'custom', get_template_directory_uri().'/assets/js/custom.js', array(), false, true );
 

  
}
add_action( 'wp_enqueue_scripts', 'global_scripts' );

// THEME LOGO



function themeslug_theme_customizer( $wp_customize ) {



    $wp_customize->add_section( 'themeslug_logo_section' , array(



    'title'       => __( 'Logo', 'themeslug' ),



    'priority'    => 30,



    'description' => 'Upload a logo to replace the default site name and description in the header',



) );



$wp_customize->add_setting( 'themeslug_logo' );



$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(



    'label'    => __( 'Logo', 'themeslug' ),



    'section'  => 'themeslug_logo_section',



    'settings' => 'themeslug_logo',



) ) );



}

// Woocommerce Theme Support

function mytheme_add_woocommerce_support() {

    add_theme_support( 'woocommerce' );

}



add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

function disable_new_posts() {

// Hide sidebar link

global $submenu;

unset($submenu['edit.php?post_type=global1'][10]);



// Hide link on listing page

if (isset($_GET['post_type']) && $_GET['post_type'] == 'global1') {

    echo '<style type="text/css">

    #favorite-actions, .add-new-h2, .tablenav { display:none; }

    </style>';

}

}

add_action('admin_menu', 'disable_new_posts');







// hide "add new" on wp-admin menu

function raghu_admin_css() {

global $post_type;

if($post_type == 'global1') {

echo '<style type="text/css">#edit-slug-box,#view-post-btn,.page-title-action,

#post-preview,span.trash,.updated p a{display: none;}.view{display:none;}</style>';

}

}

add_action('admin_head', 'raghu_admin_css'); 



// Add wp sizes

add_action( 'after_setup_theme', 'wpdocs_theme_setup' );

function wpdocs_theme_setup() {

add_image_size( 'logo', 110, 103 ); 

add_image_size( 'slider-thumb', 1920, 885 ); 

add_image_size( 'servicein', 104, 104 ); 

add_image_size( 'service-icon', 146, 104 ); 

add_image_size( 'usp-icon', 58, 66 ); 

add_image_size( 'inner-banner', 1920, 543 ); 

add_image_size( 'service-thumb', 575, 522 );

add_image_size( 'video-thumb', 570, 501 );

}

/**

 * Filter the except length to 20 words.

 *

 * @param int $length Excerpt length.

 * @return int (Maybe) modified excerpt length.

 */

function wpdocs_custom_excerpt_length( $length ) {

    return 35;

}

add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



function pagination_bar() {
    global $wp_query;
 
    $total_pages = $wp_query->max_num_pages;
 
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
 
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}
function na_remove_slug( $post_link, $post, $leavename ) {

    if ( 'service' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );
function na_parse_request( $query ) {

    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'service', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'na_parse_request' );




/**
 * Add new rewrite rule
 */
function create_new_url_querystring() {
    add_rewrite_rule(
        'blog/([^/]*)$',
        'index.php?name=$matches[1]',
        'top'
    );

    add_rewrite_tag('%blog%','([^/]*)');
}
add_action('init', 'create_new_url_querystring', 999 );


/**
 * Modify post link
 * This will print /blog/post-name instead of /post-name
 */
function append_query_string( $url, $post, $leavename ) {

	if ( $post->post_type != 'post' )
        	return $url;
	
	
	if ( false !== strpos( $url, '%postname%' ) ) {
        	$slug = '%postname%';
	}
	elseif ( $post->post_name ) {
        	$slug = $post->post_name;
	}
	else {
		$slug = sanitize_title( $post->post_title );
	}
    
	$url = home_url( user_trailingslashit( 'blog/'. $slug ) );

	return $url;
}
add_filter( 'post_link', 'append_query_string', 10, 3 );


/**
 * Redirect all posts to new url
 * If you get error 'Too many redirects' or 'Redirect loop', then delete everything below
 */
function redirect_old_urls() {

	if ( is_singular('post') ) {
		global $post;

		if ( strpos( $_SERVER['REQUEST_URI'], '/blog/') === false) {
		   wp_redirect( home_url( user_trailingslashit( "blog/$post->post_name" ) ), 301 );
		   exit();
		}
	}
}
add_filter( 'template_redirect', 'redirect_old_urls' );

