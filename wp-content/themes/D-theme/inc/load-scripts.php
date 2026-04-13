<?php
declare(strict_types=1);

/**
 * Load Scripts and Styles
 *
 * Enqueue all JavaScript and CSS files for the theme
 *
 * @package D_Theme
 * @since 1.0.0
 */

/**
 * Enqueue theme scripts and styles
 */
if (!function_exists('d_theme_enqueue_assets')) {
    function d_theme_enqueue_assets() {
        $theme_version = D_THEME_VERSION;
        $is_dev = (defined('WP_DEBUG') && WP_DEBUG);

        // Enqueue main stylesheet
        wp_enqueue_style('d-theme-style', D_THEME_URI . '/assets/stylesheets/style.css', [], $theme_version, 'all');

        // Enqueue main script
        wp_enqueue_script('d-theme-script', D_THEME_URI . '/assets/javascripts/main.js', ['jquery'], $theme_version, true );

        // Localize script data
        wp_localize_script('d-theme-script', 'dThemeData', ['ajax_url'   => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('d_theme_nonce'), 'theme_url'  => D_THEME_URI, 'is_mobile'  => wp_is_mobile(), ]);

        // Add custom CSS for editor
        add_editor_style(D_THEME_URI . '/assets/stylesheets/editor-style.css');
    }
}
add_action('wp_enqueue_scripts', 'd_theme_enqueue_assets');

/**
 * Enqueue admin styles and scripts
 */
if (!function_exists('d_theme_enqueue_admin_assets')) {
    function d_theme_enqueue_admin_assets($hook) {
        wp_enqueue_style('d-theme-admin', D_THEME_URI . '/assets/stylesheets/admin-style.css', [], D_THEME_VERSION);
        wp_enqueue_script('d-theme-admin', D_THEME_URI . '/assets/javascripts/admin.js', ['wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'], D_THEME_VERSION );
    }
}
add_action('admin_enqueue_scripts', 'd_theme_enqueue_admin_assets');

/**
 * Enqueue styles in Gutenberg block editor
 */
if (!function_exists('d_theme_enqueue_block_editor_assets')) {
    function d_theme_enqueue_block_editor_assets() {
        wp_enqueue_script('d-theme-blocks-editor', D_THEME_URI . '/assets/javascripts/blocks-editor.js', ['wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-compose'] ,D_THEME_VERSION);
        wp_enqueue_style('d-theme-blocks-editor', D_THEME_URI . '/assets/stylesheets/blocks-editor.css', [],  D_THEME_VERSION);

        // Pass theme data to block editor
        wp_localize_script('d-theme-blocks-editor', 'dThemeBlocksData', ['theme_colors' => d_theme_get_color_palette(), ]);
    }
}
add_action('enqueue_block_editor_assets', 'd_theme_enqueue_block_editor_assets');

/**
 * Get color palette
 *
 * @return array
 */
function d_theme_get_color_palette() {
    return [
        ['name' => 'Primary', 'slug' => 'primary', 'color' => '#0066cc'],
        ['name' => 'Secondary', 'slug' => 'secondary', 'color' => '#ff6b6b'],
        ['name' => 'Dark', 'slug' => 'dark', 'color' => '#1a1a1a'],
        ['name' => 'Light', 'slug' => 'light', 'color' => '#f5f5f5'],
    ];
}

/**
 * Dequeue unnecessary scripts and styles
 */
if (!function_exists('d_theme_dequeue_assets')) {
    function d_theme_dequeue_assets() {
        // Dequeue jQuery Migrate
        wp_dequeue_script('jquery-migrate');

        // Dequeue WordPress emoji script if not needed
        // remove_action('wp_head', 'print_emoji_detection_script', 7);
    }
}
add_action('wp_enqueue_scripts', 'd_theme_dequeue_assets', 999);
