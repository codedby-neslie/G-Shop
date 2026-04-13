<?php
declare(strict_types=1);

/**
 * Register Shortcodes
 *
 * Register all custom shortcodes for the theme
 *
 * @package D_Theme
 * @since 1.0.0
 */

// Load individual shortcode files
require_once D_THEME_INC_PATH . '/shortcodes/hero-shortcode.php';

/**
 * Register all shortcodes
 *
 * This function acts as a central registry for shortcodes
 */
if (!function_exists('d_theme_register_shortcodes')) {
    function d_theme_register_shortcodes() {
        // Shortcodes are registered in their individual files
        // This function can be used for any shortcode initialization
    }
}
add_action('init', 'd_theme_register_shortcodes');

/**
 * Helper function to safely output HTML in shortcodes
 *
 * @param string $html The HTML to output
 * @return string  Escaped HTML
 */
function d_theme_safe_html($html) {
    $allowed_html = [
        'div'    => ['class' => true, 'style' => true],
        'h1'     => ['class' => true],
        'h2'     => ['class' => true],
        'h3'     => ['class' => true],
        'p'      => ['class' => true],
        'a'      => ['href' => true, 'class' => true],
        'button' => ['class' => true],
        'span'   => ['class' => true, 'style' => true],
    ];

    return wp_kses_post($html);
}
