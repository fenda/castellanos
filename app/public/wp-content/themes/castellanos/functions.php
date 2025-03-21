<?php
/**
 * il functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package il
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.1' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function cstln_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on il, use a find and replace
		* to change 'cstln' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'cstln', get_template_directory() . '/languages' );

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
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	require get_template_directory() . '/inc/thumbnails.php';

	// This theme uses wp_nav_menu() in these locations.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'cstln' ),
			'menu-2' => esc_html__( 'Footer', 'cstln' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add support for full width blocks for Gutenberg
	add_theme_support('align-wide');

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			// 'height'      => 250,
			// 'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'cstln_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cstln_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cstln_content_width', 640 );
}
add_action( 'after_setup_theme', 'cstln_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function cstln_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'cstln' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'cstln' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'cstln_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cstln_scripts() {
	wp_enqueue_style( 'il-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'il-style', 'rtl', 'replace' );

	// wp_deregister_script('jquery');
	// wp_enqueue_script('jquery', get_template_directory_uri() . '/js/lib/jquery.js', array(), '3.6.0');

	wp_enqueue_script( 'il-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cstln_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}





/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/wpbakery-blogcategories.php';


/**
 * functions from developer
 */

// Removes wp-emoji-release.min.js and css
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Deativate heartbeat
add_action( 'init', 'stop_heartbeat', 1 );
function stop_heartbeat() {
	wp_deregister_script('heartbeat');
}

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

// add ACF pref page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Site Options',
		'menu_title'	=> 'Site Options',
		'menu_slug' 	=> 'pms-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

// add css and js
function cstln_header_scripts() {
	if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
		// wp_register_script('tinySlider', get_template_directory_uri() . '/js/lib/tiny-slider-min.js', array());
		// wp_enqueue_script('tinySlider');
		wp_register_script('splide', get_template_directory_uri() . '/js/lib/splide.min.js', array());
		wp_enqueue_script('splide');
	}
}

add_action( 'wp_enqueue_scripts', function () {
	wp_register_script( 'scripts', get_stylesheet_directory_uri() . '/js/scripts-min.js' );
	wp_enqueue_script( 'scripts' );

} );

add_filter( 'script_loader_tag', function ( $tag, $handle ) {
	if ( 'scripts' !== $handle ) {
		return $tag;
	}
	return str_replace( ' src', ' defer src', $tag ); // defer the script
	//return str_replace( ' src', ' async src', $tag ); // OR async the script
	//return str_replace( ' src', ' async defer src', $tag ); // OR do both!

}, 10, 2 );

function cstln_styles() {
	// wp_register_style('tinySlider', get_template_directory_uri() . '/sass/lib/tiny-slider.css', array(), '1.0', 'all');
	// wp_enqueue_style('tinySlider'); // Enqueue it!
	wp_register_style('splide', get_template_directory_uri() . '/sass/lib/splide-core.min.css', array(), '1.0', 'all');
	wp_enqueue_style('splide'); // Enqueue it!
}

add_action('init', 'cstln_header_scripts');
add_action('wp_enqueue_scripts', 'cstln_styles');

// Allow SVG upload
function cstln_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
  add_filter('upload_mimes', 'cstln_mime_types');

// Create the Custom Excerpts callback
function cstln_custom_post($length) {
	return 30;
}

function cstln_excerpt($length_callback = '', $more_callback = '') {
	global $post;
	if (function_exists($length_callback)) {
		add_filter('excerpt_length', $length_callback);
	}
	if (function_exists($more_callback)) {
		add_filter('excerpt_more', $more_callback);
	}
	$output = get_the_excerpt();
	$output = apply_filters('wptexturize', $output);
	$output = apply_filters('convert_chars', $output);
	$output = '<p>' . $output . '</p>';
	echo $output;
}

// limit excerpt size
add_filter( 'excerpt_length', function($length) {
    return 28;
}, PHP_INT_MAX );

// Custom View Article link to Post
function cstln_view_article($more) {
	global $post;
	return '...';
}
add_filter('excerpt_more', 'cstln_view_article');

// create posts pagination
function cstln_pagination() {
	global $wp_query;
	$big = 999999999;
	echo paginate_links(array(
		'base' => str_replace($big, '%#%', get_pagenum_link($big)),
		'format' => '?paged=%#%',
		'current' => max(1, get_query_var('paged')),
		'total' => $wp_query->max_num_pages
	));
}
add_action('init', 'cstln_pagination');  


// Remove paragraphs from Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

function allow_iframes_in_acf($allowed_tags) {
	$allowed_tags['iframe'] = [
			'src'             => true,
			'width'           => true,
			'height'          => true,
			'frameborder'     => true,
			'allowfullscreen' => true,
			'allow'           => true,
	];
	return $allowed_tags;
}
add_filter('wp_kses_allowed_html', 'allow_iframes_in_acf', 10, 1);


require get_template_directory() . '/inc/shortcodes.php';
require get_template_directory() . '/inc/cpt.php';
require get_template_directory() . '/inc/walker_menu.php';

// Register the custom walker with your menus
function register_custom_walker($args) {
    return array_merge($args, array(
        'walker' => new Custom_Walker_Nav_Menu()
    ));
}

add_filter('wp_nav_menu_args', 'register_custom_walker');

