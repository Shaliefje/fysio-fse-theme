<?php
function my_fse_theme_setup() {
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
}
add_action('after_setup_theme', 'my_fse_theme_setup');


function my_fse_enqueue_adobe_fonts() {
    wp_enqueue_style(
        'adobe-fonts',
        'https://use.typekit.net/xes3clj.css', // Replace with your real embed URL
        false
    );
}
add_action('wp_enqueue_scripts', 'my_fse_enqueue_adobe_fonts');


function my_fse_enqueue_theme_styles() {
    wp_enqueue_style('my-fse-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_fse_enqueue_theme_styles');

function my_fse_register_block_patterns() {
    register_block_pattern_category(
        'fysio-sections',
        array('label' => __('Secties', 'my-fse-theme'))
    );

    $patterns = array(
        'hero',
        'selection-buttons',
        'query-loop-white',
        'query-loop-colored',
        'cta',
        'appointment-placeholder',
        'contact-placeholder'
    );

    foreach ($patterns as $pattern) {
        register_block_pattern(
            "my-fse-theme/$pattern",
            array(
                'title'       => ucwords(str_replace('-', ' ', $pattern)),
                'description' => 'Pattern: ' . $pattern,
                'categories'  => array('fysio-sections'),
                'content'     => file_get_contents(get_template_directory() . "/patterns/$pattern.php")
            )
        );
    }
}
add_action('init', 'my_fse_register_block_patterns');


function add_body_class_by_specialization($classes) {
    if (is_page()) {
        $color_scheme = get_post_meta(get_the_ID(), 'color_scheme', true);
        if ($color_scheme) {
            $classes[] = 'color-scheme-' . sanitize_html_class($color_scheme);
        }
    }
    return $classes;
}
add_filter('body_class', 'add_body_class_by_specialization');

function add_color_scheme_to_post($classes) {
    if (is_singular('service')) {
        // Try to detect referring page color scheme
        if (isset($_SERVER['HTTP_REFERER'])) {
            $ref = esc_url_raw($_SERVER['HTTP_REFERER']);
            if (strpos($ref, 'muzikanten') !== false) {
                $classes[] = 'color-scheme-musician';
            } elseif (strpos($ref, 'algemene-zorg') !== false) {
                $classes[] = 'color-scheme-secondary';
            } else {
                $classes[] = 'color-scheme-primary';
            }
        } else {
            $classes[] = 'color-scheme-primary'; // Fallback
        }
    }
    return $classes;
}
add_filter('body_class', 'add_color_scheme_to_post');


add_filter('theme_page_templates', function($templates) {
    $templates['templates/page-musician.html'] = __('Voor Muzikanten Pagina', 'my-fse-theme');
    $templates['templates/page-category.html'] = __('Categorie Pagina', 'my-fse-theme');
    return $templates;
});



// Load additional PHP files
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/admin-customization.php';
?>