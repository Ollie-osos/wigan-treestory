<?php 

// add options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Global Settings',
		'menu_title'	=> 'Global Settings',
	));	
} 

// to add custom post types to the sites menu
add_action( 'init', 'create_post_type' );

function create_post_type() {
	register_post_type( 'treestory',
		array(
			'labels' => array(
				'name' => __( 'TreeStories' ),
				'singular_name' => __( 'TreeStory' )
			),
		'public' => true,
		'show_in_nav_menus' => true,
		'has_archive' => true,
		'taxonomies' => array('category', 'post_tag'),
		'supports' => array('title', 'thumbnail', 'author','editor')
		// 	'menu_icon' => get_template_directory_uri() . '/assets/images/theme/admin-icons/icon-howtouse.svg'
		)
	);

	register_post_type( 'news',
		array(
			'labels' => array(
				'name' => __( 'News' ),
				'singular_name' => __( 'News' )
			),
		'public' => true,
		'show_in_nav_menus' => true,
		'has_archive' => true,
		'taxonomies' => array('category', 'post_tag'),
		'supports' => array('title', 'thumbnail', 'author','editor')
		// 	'menu_icon' => get_template_directory_uri() . '/assets/images/theme/admin-icons/icon-howtouse.svg'
		)
	);
}