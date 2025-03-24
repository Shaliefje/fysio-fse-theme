<?php
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
?>
