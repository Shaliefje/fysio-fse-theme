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
        'https://use.typekit.net/xes3clj.css',
        false
    );
}
add_action('wp_enqueue_scripts', 'my_fse_enqueue_adobe_fonts');

function my_fse_enqueue_theme_styles() {
    wp_enqueue_style('my-fse-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_fse_enqueue_theme_styles');



function my_fse_register_block_patterns() {
    register_block_pattern_category('fysio-sections', array('label' => __('Secties', 'my-fse-theme')));

    // Inline pattern: Hero block (v2)
    register_block_pattern(
        'my-fse-theme/hero-v2',
        array(
            'title'       => __('Hero', 'my-fse-theme'),
            'description' => __('Hero with heading, paragraph, and image', 'my-fse-theme'),
            'categories'  => array('fysio-sections'),
            'content'     =>
                '<!-- wp:group {"className":"hero-section","backgroundColor":"primary","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->' .
                '<!-- wp:group {"className":"hero-text","layout":{"type":"constrained"}} -->' .
                '<!-- wp:heading {"level":1} -->Welkom bij Fysiotherapie Leiden<!-- /wp:heading -->' .
                '<!-- wp:paragraph -->Persoonlijke zorg voor lichaam en geest.<!-- /wp:paragraph -->' .
                '<!-- /wp:group -->' .
                '<!-- wp:image {"url":"https://via.placeholder.com/600x400","alt":"Hero afbeelding","sizeSlug":"large"} /-->' .
                '<!-- /wp:group -->'
        )
    );

    // Inline pattern: Selection Buttons (v2)
    register_block_pattern(
        'my-fse-theme/selection-buttons-v2',
        array(
            'title'       => __('Selection Buttons', 'my-fse-theme'),
            'description' => __('Three navigation buttons with color schemes', 'my-fse-theme'),
            'categories'  => array('fysio-sections'),
            'content'     =>
                '<!-- wp:group {"layout":{"type":"constrained"},"className":"selection-buttons"} -->' .
                '<!-- wp:buttons -->' .
                '<!-- wp:button {"backgroundColor":"primary","url":"/fysiotherapie/"} -->Fysiotherapie<!-- /wp:button -->' .
                '<!-- wp:button {"backgroundColor":"secondary","url":"/specialiteit-handen/"} -->Specialiteit Handen<!-- /wp:button -->' .
                '<!-- wp:button {"backgroundColor":"musician","url":"/muziek-performance/"} -->Muziek & Performance<!-- /wp:button -->' .
                '<!-- /wp:buttons -->' .
                '<!-- /wp:group -->'
        )
    );

    // Inline pattern: CTA (v2)
    register_block_pattern(
        'my-fse-theme/cta-v2',
        array(
            'title'       => __('CTA', 'my-fse-theme'),
            'description' => __('Call to action block with only text, no image', 'my-fse-theme'),
            'categories'  => array('fysio-sections'),
            'content'     =>
                '<!-- wp:group {"layout":{"type":"constrained"},"className":"cta-section"} -->' .
                '<!-- wp:paragraph -->Wil je weten wat de mogelijkheden zijn voor je klachten? Maak hier een afspraak bij de fysiotherapeut Leiden<!-- /wp:paragraph -->' .
                '<!-- /wp:group -->'
        )
    );

    // Inline pattern: Query Loop Colored (v2)
    register_block_pattern(
        'my-fse-theme/query-loop-colored-v2',
        array(
            'title'       => __('Query Loop – Muzikanten', 'my-fse-theme'),
            'description' => __('Purple background query loop for Muzikanten category', 'my-fse-theme'),
            'categories'  => array('fysio-sections'),
            'content'     =>
                '<!-- wp:group {"className":"query-loop-colored","backgroundColor":"musician","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->' .
                '<!-- wp:group {"className":"query-text","layout":{"type":"constrained"}} -->' .
                '<!-- wp:paragraph -->Speciaal voor muzikanten: onze gespecialiseerde zorg.<!-- /wp:paragraph -->' .
                '<!-- /wp:group -->' .
                '<!-- wp:group {"className":"query-buttons","layout":{"type":"constrained"}} -->' .
                '<!-- wp:query {"query":{"postType":"service","taxQuery":[{"taxonomy":"service_category","terms":["muzikanten"],"field":"slug"}]}} -->' .
                '<!-- wp:post-template -->' .
                '<!-- wp:post-title {"isLink":true} /-->' .
                '<!-- /wp:post-template -->' .
                '<!-- /wp:query -->' .
                '<!-- /wp:group -->' .
                '<!-- /wp:group -->'
        )
    );

    // Inline pattern: Query Loop White (v2)
    register_block_pattern(
        'my-fse-theme/query-loop-white-v2',
        array(
            'title'       => __('Query Loop – White', 'my-fse-theme'),
            'description' => __('White background query loop for general service posts', 'my-fse-theme'),
            'categories'  => array('fysio-sections'),
            'content'     =>
                '<!-- wp:group {"className":"query-loop-white","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->' .
                '<!-- wp:group {"className":"query-text","layout":{"type":"constrained"}} -->' .
                '<!-- wp:paragraph -->Ontdek onze behandelingen binnen dit specialisme.<!-- /wp:paragraph -->' .
                '<!-- /wp:group -->' .
                '<!-- wp:group {"className":"query-buttons","layout":{"type":"constrained"}} -->' .
                '<!-- wp:query {"query":{"postType":"service"}} -->' .
                '<!-- wp:post-template -->' .
                '<!-- wp:post-title {"isLink":true} /-->' .
                '<!-- /wp:post-template -->' .
                '<!-- /wp:query -->' .
                '<!-- /wp:group -->' .
                '<!-- /wp:group -->'
        )
    );

    // Inline pattern: Appointment Placeholder (v2)
    register_block_pattern(
        'my-fse-theme/appointment-placeholder-v2',
        array(
            'title'       => __('Afspraak Placeholder', 'my-fse-theme'),
            'description' => __('Placeholder section for embedded appointment form', 'my-fse-theme'),
            'categories'  => array('fysio-sections'),
            'content'     =>
                '<!-- wp:group {"className":"appointment-placeholder","layout":{"type":"constrained"}} -->' .
                '<!-- wp:image {"url":"https://via.placeholder.com/800x400","alt":"Afspraak embed placeholder"} /-->' .
                '<!-- wp:paragraph -->Hier komt de embed voor het afsprakenformulier.<!-- /wp:paragraph -->' .
                '<!-- /wp:group -->'
        )
    );

    // Inline pattern: Contact Placeholder (v2)
    register_block_pattern(
        'my-fse-theme/contact-placeholder-v2',
        array(
            'title'       => __('Contact Placeholder', 'my-fse-theme'),
            'description' => __('Placeholder section for contact form plugin', 'my-fse-theme'),
            'categories'  => array('fysio-sections'),
            'content'     =>
                '<!-- wp:group {"className":"contact-form-placeholder","layout":{"type":"constrained"}} -->' .
                '<!-- wp:image {"url":"https://via.placeholder.com/800x400","alt":"Contactformulier placeholder"} /-->' .
                '<!-- wp:paragraph -->Het contactformulier wordt hier geplaatst via een plugin.<!-- /wp:paragraph -->' .
                '<!-- /wp:group -->'
        )
    );

    register_block_pattern(
    'my-fse-theme/query-loop-buttons-v2',
    array(
        'title'       => __('Query Loop Buttons', 'my-fse-theme'),
        'description' => __('Dynamic post titles styled as buttons from a specific category', 'my-fse-theme'),
        'categories'  => array('fysio-sections'),
        'content'     =>
            '<!-- wp:group {"className":"query-loop-buttons","layout":{"type":"constrained"}} -->' .
            '<!-- wp:query {"query":{"postType":"service","perPage":6}} -->' .
            '<!-- wp:post-template -->' .
            '<!-- wp:buttons -->' .
            '<!-- wp:button {"className":"is-style-outline","backgroundColor":"secondary"} -->' .
            '<!-- wp:post-title {"isLink":true} /-->' .
            '<!-- /wp:button -->' .
            '<!-- /wp:buttons -->' .
            '<!-- /wp:post-template -->' .
            '<!-- /wp:query -->' .
            '<!-- /wp:group -->'
    )
    );






}

add_action('init', 'my_fse_register_block_patterns');



function add_body_class_by_specialization($classes) {
    if (is_front_page()) {
        $classes[] = 'color-scheme-primary'; // hardcoded fallback for front-page.html
    } elseif (is_page()) {
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
            $classes[] = 'color-scheme-primary';
        }
    }
    return $classes;
}

add_filter('body_class', 'add_color_scheme_to_post');

add_filter('theme_page_templates', function($templates) {
    $templates['templates/front-page.html'] = __('Startpagina', 'my-fse-theme');
    $templates['templates/page-musician.html'] = __('Voor Muzikanten Pagina', 'my-fse-theme');
    $templates['templates/page-category.html'] = __('Categorie Pagina', 'my-fse-theme');
    $templates['templates/page.html'] = __('Standaard Pagina', 'my-fse-theme');
    $templates['templates/single-service.html'] = __('Post page', 'my-fse-theme');
    return $templates;
});

// Load additional PHP files
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/admin-customization.php';
?>