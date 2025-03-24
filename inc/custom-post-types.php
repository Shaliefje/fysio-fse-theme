<?php
function register_services_cpt() {
    register_post_type('service', array(
        'labels' => array(
            'name' => 'Services',
            'singular_name' => 'Service'
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true, // Enables Gutenberg blocks
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-heart',
        'taxonomies' => array('service_category') // Allows categorization
    ));
}
add_action('init', 'register_services_cpt');

// Register Taxonomy for Service Selection
function register_service_taxonomy() {
    register_taxonomy('service_category', 'service', array(
        'label' => 'Service Categories',
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_service_taxonomy');
?>