<?php

//  Add custom "Invoice" post type

add_action('init', 'invoicewizard_addposttypes');

function invoicewizard_addposttypes(){

	$labels = array(
		'name'               => _x( 'Invoices', 'post type general name', 'invoicewizard' ),
		'singular_name'      => _x( 'Invoice', 'post type singular name', 'invoicewizard' ),
		'menu_name'          => _x( 'Invoices', 'admin menu', 'invoicewizard' ),
		'name_admin_bar'     => _x( 'Invoice', 'add new on admin bar', 'invoicewizard' ),
		'add_new'            => _x( 'Add New', 'Invoice', 'invoicewizard' ),
		'add_new_item'       => __( 'Add New Invoice', 'invoicewizard' ),
		'new_item'           => __( 'New Invoice', 'invoicewizard' ),
		'edit_item'          => __( 'Edit Invoice', 'invoicewizard' ),
		'view_item'          => __( 'View Invoice', 'invoicewizard' ),
		'all_items'          => __( 'All Invoices', 'invoicewizard' ),
		'search_items'       => __( 'Search Invoices', 'invoicewizard' ),
		'parent_item_colon'  => __( 'Parent Invoices:', 'invoicewizard' ),
		'not_found'          => __( 'No Invoices found.', 'invoicewizard' ),
		'not_found_in_trash' => __( 'No Invoices found in Trash.', 'invoicewizard' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'invoicewizard' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'invoice' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'menu_icon'			 =>	'dashicons-chart-line',
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title')
	);

	register_post_type('invoice', $args);

		$labels = array(
		'name'               => _x( 'Clients', 'post type general name', 'invoicewizard' ),
		'singular_name'      => _x( 'Client', 'post type singular name', 'invoicewizard' ),
		'menu_name'          => _x( 'Clients', 'admin menu', 'invoicewizard' ),
		'name_admin_bar'     => _x( 'Client', 'add new on admin bar', 'invoicewizard' ),
		'add_new'            => _x( 'Add New', 'Client', 'invoicewizard' ),
		'add_new_item'       => __( 'Add New Client', 'invoicewizard' ),
		'new_item'           => __( 'New Client', 'invoicewizard' ),
		'edit_item'          => __( 'Edit Client', 'invoicewizard' ),
		'view_item'          => __( 'View Client', 'invoicewizard' ),
		'all_items'          => __( 'All Clients', 'invoicewizard' ),
		'search_items'       => __( 'Search Clients', 'invoicewizard' ),
		'parent_item_colon'  => __( 'Parent Clients:', 'invoicewizard' ),
		'not_found'          => __( 'No Clients found.', 'invoicewizard' ),
		'not_found_in_trash' => __( 'No Clients found in Trash.', 'invoicewizard' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'invoicewizard' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'client' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'menu_icon'			 =>	'dashicons-groups',
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title')
	);

	register_post_type('client', $args);
	remove_post_type_support('invoice','editor');
	remove_post_type_support('client','editor');
}




