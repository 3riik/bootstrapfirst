<?php
/**
 * Proper way to register and enqueue scripts and styles
 */    
function bootstrapfirst_theme_stylesheets() {
    wp_register_style( 'bootstrap-min',  get_template_directory_uri() .'/css/bootstrap.min.css', array(), null, 'all' );
    wp_enqueue_style( 'bootstrap-min' );
    wp_enqueue_style('style', get_stylesheet_uri());

}
add_action( 'wp_enqueue_scripts', 'bootstrapfirst_theme_stylesheets' );

function bootstrapfirst_theme_scripts() {
	wp_enqueue_script(bootstrap, get_template_directory_uri() .'/js/bootstrap.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script(menu, get_template_directory_uri() .'/js/menu.js', array( 'jquery' ),'1.0.0',true);
	
}
add_action('wp_enqueue_scripts', 'bootstrapfirst_theme_scripts');


//Theme setup
function learningWordPress_setup() {
	
	$defaults = array(
			'width'                  => 780,
			'height'                 => 200,
			'flex-height'            => true,
			'flex-width'             => false,
			'uploads'                => true,
	);
	
	$logo_args = array(
			'width' 	=> 250,
			'height'	=> 250,
	);
	// Navigation Menus
	register_nav_menus(array(
			'primary' => __( 'Primary Menu'),
			'footer' => __( 'Footer Menu'),
	));
	
	// Add featured image support
	add_theme_support('post-thumbnails');
	add_image_size('small-thumbnail', 180, 120, true);
	add_image_size('banner-image', 920, 210, array('left', 'top'));
	
	// Add post type support
	add_theme_support('post-formats', array('aside', 'gallery', 'link'));
	add_theme_support( 'custom-header',$defaults );
	add_theme_support( 'custom-logo' ,$logo_args);
	
}

add_action('after_setup_theme', 'learningWordPress_setup');


//Changing current menu item class to active
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
	if (in_array('current-menu-item', $classes) ){
		$classes[] = 'active ';
	}
	return $classes;
}