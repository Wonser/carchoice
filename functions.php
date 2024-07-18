<?php

## Отключает Гутенберг (новый редактор блоков в WordPress).
## ver: 1.2
if( 'disable_gutenberg' ){
    remove_theme_support( 'core-block-patterns' ); // WP 5.5

    add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );

    // отключим подключение базовых css стилей для блоков
    // ВАЖНО! когда выйдут виджеты на блоках или что-то еще, эту строку нужно будет комментировать
    remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' );

    // Move the Privacy Policy help notice back under the title field.
    add_action( 'admin_init', function(){
        remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] );
        add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] );
    } );
}


/**
 * carchoice functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package carchoice
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'carchoice_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function carchoice_setup() {
		/*
		 * Make theme carchoiceilable for carchoicelation.
		 * carchoicelations can be filed in the /languages/ directory.
		 * If you're building a theme based on carchoice, use a find and replace
		 * to change 'carchoice' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'carchoice', get_template_directory() . '/languages' );

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
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => 'Основное меню',
				'footer-menu' => 'Футер меню',
				'modal-menu' => 'Меню модальное',
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
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'carchoice_setup' );


add_rewrite_rule( 'thanks/?$', 'index.php?pagename=thanks', 'top' );
add_rewrite_rule( 'informacziya-dlya-lizing-menedzherov/?$', 'index.php?pagename=informacziya-dlya-lizing-menedzherov', 'top' );
add_rewrite_rule( 'partnerskaya-programma/?$', 'index.php?pagename=partnerskaya-programma', 'top' );
add_rewrite_rule( 'about/?$', 'index.php?pagename=about', 'top' );
add_rewrite_rule( 'blog/?$', 'index.php?pagename=blog', 'top' );
add_rewrite_rule( 'cars/?$', 'index.php?post_type=cars', 'top' );
add_rewrite_rule( 'contacts/?$', 'index.php?pagename=contacts', 'top' );

add_rewrite_rule( 'services/(.*)/?$', 'index.php?services=$matches[1]', 'top' );


add_rewrite_rule( 'cars/brand/(.*)/?$', 'index.php?cars-cat=$matches[1]', 'top' );
add_rewrite_rule( 'cars/(.*)/?$', 'index.php?cars=$matches[1]', 'top' );


add_rewrite_rule( 'blog/category/(.*)/?$', 'index.php?category_name=$matches[1]', 'top' );
add_rewrite_rule( 'blog/(.*)/(.*)/?$', 'index.php?name=$matches[2]', 'top' );




/**
 * Enqueue scripts and styles.
 */
function carchoice_scripts() {
	wp_enqueue_style( 'carchoice-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style('carchoice-swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), _S_VERSION);
	wp_enqueue_style('carchoice-modal', get_template_directory_uri() . '/assets/css/jquery.arcticmodal-0.3.css', array(), _S_VERSION);
	wp_enqueue_style('carchoice-fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css', array(), _S_VERSION);
	wp_enqueue_style('carchoice-main', get_template_directory_uri() . '/assets/css/main.min.css', array(), "1.00000001");

	wp_enqueue_script('jquery');
	wp_enqueue_script('carchoice-modal', get_template_directory_uri() . '/assets/js/jquery.arcticmodal-0.3.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('carchoice-cookie', get_template_directory_uri() . '/assets/js/jquery.cookie.js', array(), _S_VERSION, true);
	wp_enqueue_script('carchoice-swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('carchoice-fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', array(), _S_VERSION, true);
	wp_enqueue_script('carchoice-mask', get_template_directory_uri() . '/assets/js/mask.js', array(), _S_VERSION, true);
	wp_enqueue_script('carchoice-main', get_template_directory_uri() . '/assets/js/main.js', array(), "1.00000001", true);
}
add_action( 'wp_enqueue_scripts', 'carchoice_scripts' );


remove_filter( 'the_content', 'wptexturize' );
remove_filter( 'the_title', 'wptexturize' );
add_filter( 'run_wptexturize', '__return_false' );
add_filter('wpcf7_autop_or_not', '__return_false');


/**
 * ACF Options Page
 */
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'Настройки сайта',
		'menu_title'	=> 'Настройки сайта',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}



add_image_size( 'catalog_thumbnail', 395, 300, true );
add_image_size( 'content_thumbnail', 800, 535, true );
add_image_size( 'test_thumbnail', 680, 560, true );
add_image_size( 'cars_thumbnail', 850, 600, true );
add_image_size( 'services_thumbnail', 430, 430, true );
add_image_size( 'blog_thumbnail', 470, 335, true );
add_image_size( 'card_thumbnail', 950, 950, true );
add_image_size( 'steps_thumbnail', 840, 940, true );
add_image_size( 'geo_thumbnail', 460, 100, true );
add_image_size( 'partner_thumbnail', 705, 740, true );
add_image_size( 'auto_thumbnail', 520, 370, true );
add_image_size( 'thumbnail_60', 60, 60, true );
add_image_size( 'thumbnail_85', 85, 85, true );
add_image_size( 'thumbnail_100', 100, 100, true );
add_image_size( 'thumbnail_500', 500, 500, true );
add_image_size( 'thumbnail_600', 600, 600, true );
add_image_size( 'thumbnail_700', 700, 700, true );
add_image_size( 'thumbnail_800', 800, 800, true );
add_image_size( 'thumbnail_900', 900, 900, true );
add_image_size( 'thumbnail_1000', 1000, 1000, true );
add_image_size( 'large_horizontal', 1920, 800, true );
add_image_size( 'large_vertical', 1920, 1200, true );


function webp_upload_mimes( $existing_mimes ) {
    // add webp to the list of mime types
    $existing_mimes['webp'] = 'image/webp';
    // return the array back to the function with our added mime type
    return $existing_mimes;
}
add_filter( 'mime_types', 'webp_upload_mimes' );
//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );
        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }
    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);

/**
 * Add custom post type
 */
function wonser_customposttype_init()
{

	register_post_type('catalog', array(
		'labels'             => array(
			'name'               => 'Каталог',
			'singular_name'      => 'Машина',
			'add_new'            => 'Добавить новую',
		),
		'description'        => __('Description.', 'wonser'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => '/', 
			'with_front' => false
		),
		'capability_type'    => 'post',
		'has_archive'        => 'catalog',
		'hierarchical'       => true,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-admin-post',
		'show_in_rest'       => true,
		'supports'           => array('title', 'thumbnail', 'editor', 'page-attributes'),
		'menu_position'      => 6,
	));


	register_post_type('cars', array(
		'labels'             => array(
			'name'               => 'Подобранные авто',
			'singular_name'      => 'Подобранное авто',
			'add_new'            => 'Добавить новую',
		),
		'description'        => __('Description.', 'wonser'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => 'cars', 
			'with_front' => false
		),
		'capability_type'    => 'post',
		'has_archive'        => 'cars',
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-admin-post',
		'show_in_rest'       => true,
		'supports'           => array('title', 'thumbnail', 'gallery', 'editor'),
		'menu_position'      => 6,
	));

	// Register Taxonomy
	register_taxonomy(
		'cars-cat',
		'cars',
		array(
			'label' => esc_html__('Марка'),
			'rewrite' => array(
				'slug' => 'cars/brand',
				'with_front' => false
			),
			'hierarchical' => 'brand',
			'show_in_rest' => true,
		)
	);

	register_post_type('services', array(
		'labels'             => array(
			'name'               => 'Услуги',
			'singular_name'      => 'Услуга',
			'add_new'            => 'Добавить новую',
		),
		'description'        => __('Description.', 'wonser'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => '/services/services', 
			'with_front' => false
		),
		'capability_type'    => 'post',
		'has_archive'        => 'services',
		'hierarchical'       => true,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-admin-post',
		'show_in_rest'       => true,
		'supports'           => array('title', 'thumbnail', 'editor', 'page-attributes'),
		'menu_position'      => 6,
	));
}
add_action('init', 'wonser_customposttype_init');


function remove_custom_service_slug( $post_link, $post ) {
    if ( ('services' === $post->post_type || 'catalog' === $post->post_type) && 'publish' === $post->post_status ) {
        if( $post->post_parent ) {
            $parent = get_post($post->post_parent);
            $post_link = str_replace( '/' . $post->post_type . '/' . $parent->post_name . '/', '/', $post_link );
        } else {
            $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'remove_custom_service_slug', 10, 2 );

function change_slug_struct( $query ) {

    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'services', 'page', 'catalog' ) );
    } elseif ( ! empty( $query->query['pagename'] ) && false === strpos( $query->query['pagename'], '/' ) ) {
        $query->set( 'post_type', array( 'post', 'services', 'page', 'catalog' ) );

        // We also need to set the name query var since redirect_guess_404_permalink() relies on it.
        $query->set( 'name', $query->query['pagename'] );
    }
}
add_action( 'pre_get_posts', 'change_slug_struct' );



function true_301_redirect() {
    $uri = $_SERVER['REQUEST_URI'];
    $uri = current(explode('?', $uri));

    /* в массиве указываем все старые=>новые ссылки  */
    $rules = array(
        array('old'=>'/services/podbor-novogo-i-b-u-avtomobilya/','new'=>'/'),
    );
    foreach( $rules as $rule ) :
        // если URL совпадает с одним из указанных в массиве, то редиректим
        if(urldecode($uri) == $rule['old'] ) :
            wp_redirect( site_url( $rule['new'] ), 301 );
            exit();
        endif;
    endforeach;
}

add_action('template_redirect', 'true_301_redirect');




/**
 * The data markup navigation menu, wp_nav_menu
**/
function nav_menu_schema($content) {
	$pattern = "<a";
	$replacement = '<a itemprop="url"';
	$content = str_replace($pattern, $replacement, $content);
	return $content;
}
add_filter('wp_nav_menu', 'nav_menu_schema');