<?php
/**
 * Functions
 */

/******************************************************************************
 * Included Functions
 ******************************************************************************/

// Helpers function
require_once get_stylesheet_directory() . '/inc/helpers.php';
// Install Recommended plugins
//require_once get_stylesheet_directory() . '/inc/recommended-plugins.php';
// Walker modification
require_once get_stylesheet_directory() . '/inc/class-foundation-navigation.php';
// Home slider function
include_once get_stylesheet_directory() . '/inc/home-slider.php';
// Dynamic admin
include_once get_stylesheet_directory() . '/inc/class-dynamic-admin.php';
// SVG Support
include_once get_stylesheet_directory() . '/inc/svg-support.php';
// Extend WP Search with Custom fields
include_once get_stylesheet_directory() . '/inc/custom-fields-search.php';
// Constants
define( 'IMAGE_PLACEHOLDER', get_stylesheet_directory_uri() . '/images/placeholder.jpg' );


/******************************************************************************
 * Global Functions
 ******************************************************************************/

// By adding theme support, we declare that this theme does not use a
// hard-coded <title> tag in the document head, and expect WordPress to
// provide it for us.
add_theme_support( 'title-tag' );

//  Add widget support shortcodes
add_filter( 'widget_text', 'do_shortcode' );

// Support for Featured Images
add_theme_support( 'post-thumbnails' );

// Custom Background
add_theme_support( 'custom-background', array( 'default-color' => 'fff' ) );

// Custom Header
add_theme_support( 'custom-header', array(
	'default-image' => get_template_directory_uri() . '/images/custom-logo.png',
	'height'        => '200',
	'flex-height'   => true,
	'uploads'       => true,
	'header-text'   => false
) );

// Custom Logo
add_theme_support( 'custom-logo', array(
	'height'      => '150',
	'flex-height' => true,
	'flex-width'  => true,
) );

function show_custom_logo() {
	if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) {
		$attachment_array = wp_get_attachment_image_src( $custom_logo_id, 'medium' );
		$logo_url         = $attachment_array[0];
	} else {
		$logo_url = get_stylesheet_directory_uri() . '/images/custom-logo.png';
	}
	$logo_image = '<img src="' . $logo_url . '" class="custom-logo" itemprop="siteLogo" alt="' . get_bloginfo( 'name' ) . '">';
	$html       = sprintf( '<div class="logo text-center medium-text-left"><a href="%1$s" class="custom-logo-link" rel="home" title="%2$s" itemscope>%3$s</a></div>', esc_url( home_url( '/' ) ), get_bloginfo( 'name' ), $logo_image );
	echo apply_filters( 'get_custom_logo', $html );
}

function show_custom_logo2() {
	if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) {
		$attachment_array = wp_get_attachment_image_src( $custom_logo_id, 'medium' );
		$logo_url         = $attachment_array[0];
	} else {
		$logo_url = get_stylesheet_directory_uri() . '/images/custom-logo.png';
	}
	$logo_image = '<img src="' . $logo_url . '" class="custom-logo" itemprop="siteLogo" alt="' . get_bloginfo( 'name' ) . '">';
	$html       = sprintf( '<div class="logo text-center medium-text-left"><a href="%1$s" class="custom-logo-link" rel="home" title="%2$s" itemscope>%3$s</a></div>', esc_url( home_url( '/' ) ), get_bloginfo( 'name' ), $logo_image );
	return apply_filters( 'get_custom_logo', $html );
}

// Add HTML5 elements
add_theme_support( 'html5', array(
	'comment-list',
	'search-form',
	'comment-form',
	'gallery',
	'caption'
) );

// Add excerpt to pages
add_post_type_support('page','excerpt');

// Register Navigation Menu
register_nav_menus( array(
	'header-menu' => 'Header Menu',
	'mobile-menu' => 'Mobile Menu',
	'service-page-sub-menu' => 'Service Page Sub-Menu',
	'software-page-sub-menu' => 'Software Page Sub-Menu',
	'resource-page-sub-menu' => 'Resource Page Sub-Menu',
	'footer-menu' => 'Footer Menu'
) );

// Create pagination
function foundation_pagination( $query = '' ) {
	if ( empty( $query ) ) {
		global $wp_query;
		$query = $wp_query;
	}

	$big = 999999999;

	$links = paginate_links( array(
			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'    => '?paged=%#%',
			'prev_next' => true,
			'prev_text' => '&laquo;',
			'next_text' => '&raquo;',
			'current'   => max( 1, get_query_var( 'paged' ) ),
			'total'     => $query->max_num_pages,
			'type'      => 'list'
		) );

	$pagination = str_replace( 'page-numbers', 'pagination', $links );

	echo $pagination;
}

// Register Sidebars
function foundation_widgets_init() {
	/* Sidebar Right */
	register_sidebar( array(
		'id'            => 'foundation_sidebar_right',
		'name'          => __( 'Sidebar Right' ),
		'description'   => __( 'This sidebar is located on the right-hand side of each page.' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}

add_action( 'widgets_init', 'foundation_widgets_init' );

// Remove #more anchor from posts
function remove_more_jump_link( $link ) {
	$offset = strpos( $link, '#more-' );
	if ( $offset ) {
		$end = strpos( $link, '"', $offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end - $offset );
	}

	return $link;
}

add_filter( 'the_content_more_link', 'remove_more_jump_link' );


/******************************************************************************************************************************
 * Enqueue Scripts and Styles for Front-End
 *******************************************************************************************************************************/

function foundation_scripts_and_styles() {
	if ( ! is_admin() ) {

		// Load Stylesheets
		//core
		wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.min.css', null, '6.3.0' );

		//plugins
		wp_enqueue_style( 'font-fontawesome', get_template_directory_uri() . '/css/plugins/fontawesome.min.css', null, '5.3.1' );
		wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/plugins/slick.css', null, '1.6.0' );
		wp_enqueue_style( 'fancybox.v2', get_template_directory_uri() . '/css/plugins/jquery.fancybox.v2.css', null, '2.1.5' );
//		wp_enqueue_style( 'fancybox.v3', get_template_directory_uri() . '/css/plugins/jquery.fancybox.v3.css', null, '3.4.1' );

		//system
		wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css', null, '1.3.4' );/*3rd priority*/
		wp_enqueue_style( 'media-screens', get_template_directory_uri() . '/css/media-screens.css', null, '1.1.0');/*2nd priority*/
		wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', null, '1.4.3' );/*1st priority*/

		// Load JavaScripts
		//core
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'foundation.min', get_template_directory_uri() . '/js/foundation.min.js', null, '6.3.0', true );

		//plugins
		wp_enqueue_script( 'html5shiv-respond', get_template_directory_uri() . '/js/plugins/html5shiv_respond.js', null, null, false );
		wp_script_add_data( 'html5shiv-respond', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/plugins/slick.min.js', null, '1.6.0', true );
		wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/plugins/jquery.matchHeight-min.js', null, '0.7.0', true );
		wp_enqueue_script( 'fancybox.v2', get_template_directory_uri() . '/js/plugins/jquery.fancybox.v2.js', null, '2.1.5', true );
		wp_enqueue_script( 'clipboard', get_template_directory_uri() . '/js/plugins/clipboard.min.js');
//		wp_enqueue_script( 'fancybox.v3', get_template_directory_uri() . '/js/plugins/jquery.fancybox.v3.js', null, '3.4.1', true );
//		wp_enqueue_script( 'google.maps.api', 'https://maps.googleapis.com/maps/api/js?key=' . (get_theme_mod( 'google_maps_api' ) ?: 'AIzaSyAs19C89zcw7bQ12hJEKgtPGK9Q8iuLkQ4') . '&v=3.exp', null, null, true );

		//custom javascript
		wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js', null, '0.0.5', true ); /* This should go first */

	}
}

add_action( 'wp_enqueue_scripts', 'foundation_scripts_and_styles' );

// Initialise Foundation JS
function foundation_js_init() {
	echo '<script>!function ($) { $(document).foundation(); }(window.jQuery); </script>';
}

add_action( 'wp_footer', 'foundation_js_init', 50 );

/******************************************************************************
 * Additional Functions
 *******************************************************************************/

// Enable revisions for all custom post types
add_filter( 'cptui_user_supports_params', function () {
	return array( 'revisions' );
} );

if ( function_exists( 'cptui_get_post_type_data' ) ) {
	add_filter( 'wp_revisions_to_keep', 'limit_revisions_number', 10, 2 );

	function limit_revisions_number( $num, $post ) {
		$custom_post_types = cptui_get_post_type_data();

		if ( ! $custom_post_types) {
			return $num;
		}

		foreach ( $custom_post_types as $custom_post_type ) {
			$cpt_names[] = $custom_post_type['name'];
		}
		if ( isset($cpt_names) && in_array( $post->post_type, $cpt_names ) ) {
			$num = 15;
		}

		return $num;
	}
}

// Register Post Type Slider
function post_type_slider() {
	$post_type_slider_labels = array(
		'name'               => _x( 'Slider', 'post type general name' ),
		'singular_name'      => _x( 'Slide', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'slide' ),
		'add_new_item'       => __( 'Add New' ),
		'edit_item'          => __( 'Edit' ),
		'new_item'           => __( 'New ' ),
		'all_items'          => __( 'All' ),
		'view_item'          => __( 'View' ),
		'search_items'       => __( 'Search for a slide' ),
		'not_found'          => __( 'No slides found' ),
		'not_found_in_trash' => __( 'No slides found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Slider'
	);
	$post_type_slider_args   = array(
		'labels'        => $post_type_slider_labels,
		'description'   => 'Display Slider',
		'public'        => true,
		'menu_icon'     => 'dashicons-format-gallery',
		'menu_position' => 5,
		'supports'      => array(
			'title',
			'thumbnail',
			'page-attributes',
			'editor'
		),
		'has_archive'   => true,
		'hierarchical'  => true
	);
	register_post_type( 'slider', $post_type_slider_args );
}

add_action( 'init', 'post_type_slider' );

// Stick Admin Bar To The Top
if ( ! is_admin() ) {
	add_action( 'get_header', 'my_filter_head' );

	function my_filter_head() {
		remove_action( 'wp_head', '_admin_bar_bump_cb' );
	}

	function stick_admin_bar() {
		echo "
			<style type='text/css'>
				body.admin-bar {margin-top:32px !important}
				@media screen and (max-width: 782px) {
					body.admin-bar { margin-top:46px !important }
				}
			</style>
			";
	}

	add_action( 'admin_head', 'stick_admin_bar' );
	add_action( 'wp_head', 'stick_admin_bar' );
}

// Customize Login Screen
function wordpress_login_styling() {
	if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) {
		$custom_logo_img = wp_get_attachment_image_src( $custom_logo_id, 'medium' );
		$custom_logo_src = $custom_logo_img[0];
	} else {
		$custom_logo_src = 'wp-admin/images/wordpress-logo.svg?ver=20131107';
	}
	?>
	<style type="text/css">
		.login #login h1 a {
			background-image: url('<?php echo $custom_logo_src; ?>');
			background-size: contain;
			background-position: 50% 50%;
			width: auto;
			height: 120px;
		}

		body.login {
			background-color: #f1f1f1;
			<?php if ($bg_image = get_background_image()) {?>
			background-image: url('<?php echo $bg_image; ?>') !important;
			<?php } ?>
			background-repeat: repeat;
			background-position: center center;
		}
	</style>
<?php }

add_action( 'login_enqueue_scripts', 'wordpress_login_styling' );

function admin_logo_custom_url() {
	$site_url = get_bloginfo( 'url' );
	return ( $site_url );
}

add_filter( 'login_headerurl', 'admin_logo_custom_url' );

// ACF Pro Options Page

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );

}

// Set Google Map API key

function set_custom_google_api_key() {
	acf_update_setting( 'google_api_key', get_theme_mod('google_maps_api') ?: 'AIzaSyAs19C89zcw7bQ12hJEKgtPGK9Q8iuLkQ4' );
}

add_action( 'acf/init', 'set_custom_google_api_key' );

// Disable Emoji

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_wp_emojis_in_tinymce' );
function disable_wp_emojis_in_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

// Wrap any iframe and emved tag into div for responsive view

function iframe_wrapper( $content ) {
	// match any iframes
	$pattern = '~<iframe.*?<\/iframe>|<embed.*?<\/embed>~';
	preg_match_all( $pattern, $content, $matches );

	foreach ( $matches[0] as $match ) {
		// Check if it is a video player iframe
		if ( strpos( $match, 'youtu' ) || strpos( $match, 'vimeo' ) ) {
			// wrap matched iframe with div
			$wrappedframe = '<div class="responsive-embed widescreen">' . $match . '</div>';
			//replace original iframe with new in content
			$content = str_replace( $match, $wrappedframe, $content );
		}
	}

	return $content;
}

add_filter( 'the_content', 'iframe_wrapper' );


// Dynamic Admin
if ( is_admin() ) {
	$dynamic_admin = new DynamicAdmin();
//	$dynamic_admin->addField( 'page', 'template', 'Page Template', 'template_detail_field_for_page' );

	$dynamic_admin->run();
}

// Register Google Maps API key settings in customizer

function register_google_maps_settings( $wp_customize ) {
	$wp_customize->add_section( 'google_maps' , array(
		'title'      => __( 'Google Maps', 'foundation' ),
		'priority'   => 30,
	) );
	$wp_customize->add_setting( 'google_maps_api' , array(
		'default'   => 'AIzaSyAs19C89zcw7bQ12hJEKgtPGK9Q8iuLkQ4',
	) );

	$wp_customize->add_control(
		'google_maps_api',
		array(
			'label'    => __( 'Google Maps API key', 'foundation' ),
			'section'  => 'google_maps',
			'settings' => 'google_maps_api',
			'type'     => 'text',
		)
	);
}
add_action( 'customize_register', 'register_google_maps_settings' );

// Enable GF Honeypot for all forms

add_action( 'gform_after_save_form', 'enable_honeypot_on_new_form_creation', 10, 2 );

function enable_honeypot_on_new_form_creation($form, $is_new ){
	if ( $is_new ) {
		$form['enableHoneypot'] = true;
		$form['is_active'] = 1;
		GFAPI::update_form( $form );
	}
}


/*********************** PUT YOU FUNCTIONS BELOW ********************************/

add_image_size( 'full_hd', 1920, 1080, array('center', 'center'));
// add_image_size( 'name', width, height, array('center','center'));

add_filter( 'gform_confirmation_anchor', '__return_false' );


add_shortcode('wpbsearch', 'get_search_form');
add_shortcode('showcustomlogo2', 'show_custom_logo2');

function myprefix_button_shortcode( $atts, $content = null ) {

	// Extract shortcode attributes
	extract( shortcode_atts( array(
		'url'    => '',
		'title'  => '',
		'target' => '',
		'text'   => '',
		'width'   => '',
		'color'  => '',
		'position'  => '',
		'type'  => '',
	), $atts ) );

	// Use text value for items without content
	$content = $text ? $text : $content;
    
    if( !$type ) {
		$color = 'blue';
	}

	// Return button with link
	if ( $url ) {

		$link_attr = array(
			'href'   => esc_url( $url ),
			'title'  => esc_attr( $title ),
			'target' => ( 'blank' == $target ) ? '_blank' : '',
			'style'  => 'width:' . esc_attr( $width ),
			'class'  => 'lifo-button color-' . esc_attr( $color ) . ' ' .esc_attr( $position ) . ' ' .esc_attr( $type ),
		);

		$link_attrs_str = '';

		foreach ( $link_attr as $key => $val ) {
			if ( $val ) {
				$link_attrs_str .= ' ' . $key . '="' . $val . '"';
			}
		}

		return '<a' . $link_attrs_str . '><span>' . do_shortcode( $content ) . '</span></a>';
	}

	// No link defined so return button as a span
	else {

		return '<span class="lifo-button"><span>' . do_shortcode( $content ) . '</span></span>';

	}

}
add_shortcode( 'button', 'myprefix_button_shortcode' );




/*******************************************************************************/

/**
 * Custom styles in TinyMCE
 */

function custom_style_selector( $buttons ) {
	array_unshift( $buttons, 'styleselect' );

	return $buttons;
}

add_filter( 'mce_buttons_2', 'custom_style_selector' );

function insert_custom_formats( $init_array ) {
	// Define the style_formats array
	$style_formats               = array(
		array(
			'block' => 'div',
			'title'    => 'Level 2',
			'classes'  => 'level-2',
			'wrapper'  => true,
		),
		array(
			'block' => 'div',
			'title'    => 'Level 3',
			'classes'  => 'level-3',
			'wrapper'  => true,
		),
		array(
			'block' => 'div',
			'title'    => 'level 4',
			'classes'  => 'level-4',
			'wrapper'  => true,
		),
	);
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}

add_filter( 'tiny_mce_before_init', 'insert_custom_formats' );

add_editor_style();

/******************* HIDE/SHOW WORDPRESS PLUGINS MENU ITEM *********************/

/**
 * Remove and Restore ability to Add new plugins to site
 */

function remove_plugins_menu_item($role_name){
	$role = get_role( $role_name );
	$role->remove_cap( 'activate_plugins' );
	$role->remove_cap( 'install_plugins' );
	$role->remove_cap( 'upload_plugins' );
	$role->remove_cap( 'update_plugins' );
}

function restore_plugins_menu_item($role_name){
	$role = get_role( $role_name );
	$role->add_cap( 'activate_plugins' );
	$role->add_cap( 'install_plugins' );
	$role->add_cap( 'upload_plugins' );
	$role->add_cap( 'update_plugins' );
}

// remove_plugins_menu_item('administrator');
restore_plugins_menu_item('administrator');


/*******************************************************************************/

/*********************** Change from on email ********************************/

function lifo_new_mail_from_name($old) {
	return 'LIFO-Pro, Inc.';
}
add_filter('wp_mail_from_name', 'lifo_new_mail_from_name', 50);

/*********************** Email pdf icon for export toolbar ********************************/
function lifo_wp_email_pdf_icon($url) {
	return get_stylesheet_directory_uri() . '/images/email-pdf.png';
}
add_filter('wp_email_pdf_icon', 'lifo_wp_email_pdf_icon', 50);

/*********************** Init ********************************/
function wpb_init() {
	/* add sub menu on about us
	*****************************/
	register_nav_menus(
		array(
			'sub-menu-about' => __( 'Sub menu About Us' )
		)
	);
}
add_action( 'init', 'wpb_init' );
add_filter( 'body_class', 'lifo_body_class' );
function lifo_body_class( $classes ) {
    if ( is_page( 'offerings' ) || is_post_type_archive('offerings') ) {
        $classes[] = 'offerings-template-default';
		$classes[] = 'single';
		$classes[] = 'single-offerings';

		$idx = array_search('page', $classes);
		$idx2 = array_search('page-template-default', $classes);
		if( $idx !== false ) {
			unset( $classes[$idx] );
		}
		if( $idx2 !== false ) {
			unset( $classes[$idx2] );
		}
		
    }
    return $classes;
}

// /**
//  * Custom Link POST 
//  */
add_action('init', 'lifo_posts_blog_rewrite', 10, 0);
function lifo_posts_blog_rewrite() {
  add_rewrite_rule( 
      '^blog/([^/]+)/?$',
      'index.php?post_type=post&name=$matches[1]',
      'top'
  );
}

/**
 * Show /offerings/lifo-offerings/ on the /offerings/ archive page
 */
function lifo_offerings_archive_page( WP_Query $wp_query ) {
    if ( $wp_query->is_main_query() && is_post_type_archive( 'offerings' ) && !is_admin() ) {
		$wp_query->set('name', 'lifo-offerings');
        $wp_query->set( 'posts_per_page', 1 );
    }
}
add_action( 'pre_get_posts', 'lifo_offerings_archive_page' );

function lifo_blog_post_links( $post_link, $id = 0 ) {
  $post = get_post( $id );
  if( is_object( $post ) && $post->post_type == 'post' && !is_admin() ) {
    return home_url( '/blog/' . $post->post_name );
  }
  return $post_link;
}
add_filter( 'post_link', 'lifo_blog_post_links', 1, 3 );