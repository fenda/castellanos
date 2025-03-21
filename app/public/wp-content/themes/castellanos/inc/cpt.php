<?php

// add post types
add_action('init', 'testimonials');
add_action('init', 'team');
add_action('init', 'faq');
add_action('init', 'services');
add_action('init', 'service_type');

function testimonials()
{
	register_post_type('testimonials', array (
		'labels' => array(
			'name' => __('Testimonials', 'cstln'), // Rename these to suit
			'singular_name' => __('Testimonial', 'cstln'),
			'add_new' => __('Add New', 'cstln'),
			'add_new_item' => __('Add New Testimonial', 'cstln'),
			'edit' => __('Edit', 'cstln'),
			'edit_item' => __('Edit Testimonial', 'cstln'),
			'new_item' => __('New Testimonial', 'cstln'),
			'view' => __('View Testimonials', 'cstln'),
			'view_item' => __('View Testimonial', 'cstln'),
			'search_items' => __('Search Testimonials', 'cstln'),
			'not_found' => __('No Testimonial found', 'cstln'),
			'not_found_in_trash' => __('No Testimonials found in Trash', 'cstln')
		),
		'public' => true,
		'hierarchical' => false,
		'has_archive' => false,
		'menu_icon'   => 'dashicons-format-status',
		'publicly_queryable'  => false,
		'show_in_rest' => true,
		'supports' => array(
			'title',
			'editor',
			// 'excerpt',
			'thumbnail'
		),
		'can_export' => true, // Allows export in Tools > Export
		'exclude_from_search' => true,
	));
}

function team()
{
	register_post_type('team', array (
		'labels' => array(
			'name' => __('Team', 'cstln'), // Rename these to suit
			'singular_name' => __('Team', 'cstln'),
			'add_new' => __('Add New', 'cstln'),
			'add_new_item' => __('Add New Team', 'cstln'),
			'edit' => __('Edit', 'cstln'),
			'edit_item' => __('Edit Team Member', 'cstln'),
			'new_item' => __('New Team Member', 'cstln'),
			'view' => __('View Team', 'cstln'),
			'view_item' => __('View Team', 'cstln'),
			'search_items' => __('Search Team', 'cstln'),
			'not_found' => __('No Team Member found', 'cstln'),
			'not_found_in_trash' => __('No Team Member found in Trash', 'cstln')
		),
		'public' => true,
		'hierarchical' => false,
		'has_archive' => false,
		'menu_icon'   => 'dashicons-nametag',
		'publicly_queryable'  => false,
		'show_in_rest' => true,
		'supports' => array(
			'title',
			'editor',
			// 'excerpt',
			'thumbnail'
		),
		'can_export' => true, // Allows export in Tools > Export
		'exclude_from_search' => true,
	));
}

function faq()
{
	register_post_type('faq', array (
		'labels' => array(
			'name' => __('FAQs', 'cstln'), // Rename these to suit
			'singular_name' => __('FAQ', 'cstln'),
			'add_new' => __('Add New', 'cstln'),
			'add_new_item' => __('Add New FAQ', 'cstln'),
			'edit' => __('Edit', 'cstln'),
			'edit_item' => __('Edit FAQ', 'cstln'),
			'new_item' => __('New FAQ', 'cstln'),
			'view' => __('View FAQs', 'cstln'),
			'view_item' => __('View FAQ', 'cstln'),
			'search_items' => __('Search FAQs', 'cstln'),
			'not_found' => __('No FAQ found', 'cstln'),
			'not_found_in_trash' => __('No FAQ found in Trash', 'cstln')
		),
		'public' => true,
		'hierarchical' => false,
		'has_archive' => false,
		'menu_icon'   => 'dashicons-lightbulb',
		'publicly_queryable'  => false,
		'show_in_rest' => true,
		'supports' => array(
			'title',
			'editor',
			// 'excerpt',
			// 'thumbnail'
		),
		'can_export' => true, // Allows export in Tools > Export
		'exclude_from_search' => true,
	));
}

// custom post type for services
function services() {
	register_post_type('services', array(
		'labels' => array(
			'name' => __('Services', 'cstln'),
			'singular_name' => __('Service', 'cstln'),
			'add_new' => __('Add New', 'cstln'),
			'add_new_item' => __('Add New Service', 'cstln'),
			'edit' => __('Edit', 'cstln'),
			'edit_item' => __('Edit Service', 'cstln'),
			'new_item' => __('New Service', 'cstln'),
			'view' => __('View Services', 'cstln'),
			'view_item' => __('View Service', 'cstln'),
			'search_items' => __('Search Services', 'cstln'),
			'not_found' => __('No Service found', 'cstln'),
			'not_found_in_trash' => __('No Service found in Trash', 'cstln')
		),
		'public' => true,
		'hierarchical' => false,
		'has_archive' => false,
		'menu_icon'   => 'dashicons-admin-tools',
		'publicly_queryable'  => false,
		'show_in_rest' => true,
		'supports' => array(
			'title',
			'editor',
			'thumbnail'
		),
		'can_export' => true, // Allows export in Tools > Export
		'exclude_from_search' => true,
	));
}

// taxonomy Type for Services
function service_type() {
	register_taxonomy('service_type', 'services', array(
		'labels' => array(
			'name' => __('Service Types', 'cstln'),
			'singular_name' => __('Service Type', 'cstln'),
			'search_items' => __('Search Service Types', 'cstln'),
			'all_items' => __('All Service Types', 'cstln'),
			'parent_item' => __('Parent Service Type', 'cstln'),
			'parent_item_colon' => __('Parent Service Type:', 'cstln'),
			'edit_item' => __('Edit Service Type', 'cstln'),
			'update_item' => __('Update Service Type', 'cstln'),
			'add_new_item' => __('Add New Service Type', 'cstln'),
			'new_item_name' => __('New Service Type Name', 'cstln'),
			'menu_name' => __('Service Types', 'cstln'),
		),
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'rewrite' => array('slug' => 'service-types'),
	));
}



