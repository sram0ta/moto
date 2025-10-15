<?php
/**
 * moto functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package moto
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function moto_setup() {
	load_theme_textdomain( 'moto', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'moto' ),
		)
	);

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

	add_theme_support(
		'custom-background',
		apply_filters(
			'moto_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'moto_setup' );

function moto_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'moto_content_width', 640 );
}
add_action( 'after_setup_theme', 'moto_content_width', 0 );

function moto_scripts() {
	wp_enqueue_style( 'moto-style', get_stylesheet_uri(), array(), _S_VERSION );

    wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/src/index.css'  );
    wp_enqueue_style( 'swiper-css', get_stylesheet_directory_uri() . '/src/css/vendor/swiper-bundle.min.css'  );

    wp_enqueue_script( 'gsap-js', get_stylesheet_directory_uri() . '/src/js/vendor/gsap.min.js'  );
    wp_enqueue_script( 'gsap-scroll-trigger-js', get_stylesheet_directory_uri() . '/src/js/vendor/gsap-scroll-trigger.min.js'  );
    wp_enqueue_script( 'gsap-split-js', get_stylesheet_directory_uri() . '/src/js/vendor/gsap-SplitText.js'  );
    wp_enqueue_script( 'swiper-js', get_stylesheet_directory_uri() . '/src/js/vendor/swiper-bundle.min.js'  );
    wp_enqueue_script( 'fs-lightbox-js', get_stylesheet_directory_uri() . '/src/js/vendor/fslightbox.js'  );

    wp_enqueue_script( 'index-js', get_stylesheet_directory_uri() . '/src/index.js');
}
add_action( 'wp_enqueue_scripts', 'moto_scripts' );

add_action("admin_menu", "remove_menus");
function remove_menus() {
    remove_menu_page("edit.php");                 # Записи
    remove_menu_page("edit-comments.php");        # Комментарии
}

add_filter('wpcf7_autop_or_not', '__return_false');

add_action('wp_ajax_get_course_data', 'get_course_data');
add_action('wp_ajax_nopriv_get_course_data', 'get_course_data');

// ajax курсы
function get_course_data() {
    $course_id = intval($_POST['course_id']);
    if (!$course_id) {
        wp_send_json_error(['message' => 'Неверный ID курса']);
    }

    $title = get_the_title($course_id);
    $price = get_field('price', $course_id);
    $time = get_field('time', $course_id);
    $description = get_field('description_big', $course_id);

    wp_send_json_success([
        'title' => $title,
        'price' => $price,
        'time' => $time,
        'description' => $description,
    ]);
}
