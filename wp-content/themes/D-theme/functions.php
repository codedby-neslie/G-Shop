<?php
declare(strict_types=1);

/**
 * D-Theme Functions
 *
 * @package D_Theme
 * @since 1.0.0
 */

// Define theme constants
define('D_THEME_VERSION', '1.0.0');
define('D_THEME_PATH', get_template_directory());
define('D_THEME_URI', get_template_directory_uri());
define('D_THEME_INC_PATH', D_THEME_PATH . '/inc');

/**
 * Load theme configuration and utilities
 */
require_once D_THEME_INC_PATH . '/load-scripts.php';
require_once D_THEME_INC_PATH . '/blocks/register-blocks.php';
require_once D_THEME_INC_PATH . '/cpts/blog-cpt.php';
require_once D_THEME_INC_PATH . '/patterns/register-patterns.php';
require_once D_THEME_INC_PATH . '/shortcodes/register-shortcodes.php';

/**
 * Theme Setup
 *
 * Enable theme features and support
 */
if (!function_exists('d_theme_setup')) {
    function d_theme_setup() {
        // Load text domain for translations
        load_theme_textdomain('d-theme', D_THEME_PATH . '/languages');

        // Add theme support
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        // Add Gutenberg support
        add_theme_support('wp-block-styles');
        add_theme_support('editor-styles');
        
        // Add custom color palette
        add_theme_support('editor-color-palette', [
            [
                'name'  => __('Primary', 'd-theme'),
                'slug'  => 'primary',
                'color' => '#0066cc',
            ],
            [
                'name'  => __('Secondary', 'd-theme'),
                'slug'  => 'secondary',
                'color' => '#ff6b6b',
            ],
            [
                'name'  => __('Dark', 'd-theme'),
                'slug'  => 'dark',
                'color' => '#1a1a1a',
            ],
            [
                'name'  => __('Light', 'd-theme'),
                'slug'  => 'light',
                'color' => '#f5f5f5',
            ],
        ]);

        // Register navigation menus
        register_nav_menus([
            'primary' => __('Primary Menu', 'd-theme'),
            'footer'  => __('Footer Menu', 'd-theme'),
        ]);

        // Add custom logo support
        add_theme_support('custom-logo', [
            'height'      => 100,
            'width'       => 300,
            'flex-height' => true,
            'flex-width'  => true,
        ]);
    }
}
add_action('after_setup_theme', 'd_theme_setup');

/**
 * Set content width
 */
if (!isset($content_width)) {
    $content_width = 1200;
}

/**
 * Custom template include for pages
 *
 * This allows dynamic template loading from /pages folder
 */
if (!function_exists('d_theme_locate_template')) {
    function d_theme_locate_template($template) {
        $basename = basename($template);
        $custom_template = D_THEME_PATH . '/pages/' . str_replace('.php', '', $basename) . '.php';

        if (file_exists($custom_template)) {
            return $custom_template;
        }

        return $template;
    }
}
add_filter('template_include', 'd_theme_locate_template');

/**
 * Theme initialization on plugins loaded
 */
if (!function_exists('d_theme_plugins_loaded')) {
    function d_theme_plugins_loaded() {
        // Theme initialization code can go here
    }
}
add_action('plugins_loaded', 'd_theme_plugins_loaded');
