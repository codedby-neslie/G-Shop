<?php
declare(strict_types=1);

/**
 * Register Block Patterns
 *
 * Register custom block patterns for the theme
 *
 * @package D_Theme
 * @since 1.0.0
 */

/**
 * Register pattern category
 */
if (!function_exists('d_theme_register_pattern_categories')) {
    function d_theme_register_pattern_categories() {
        register_block_pattern_category(
            'd-theme',
            [
                'label'       => __('D-Theme Patterns', 'd-theme'),
                'description' => __('Custom patterns for D-Theme', 'd-theme'),
            ]
        );
    }
}
add_action('init', 'd_theme_register_pattern_categories');

/**
 * Register block patterns
 */
if (!function_exists('d_theme_register_patterns')) {
    function d_theme_register_patterns() {
        // Hero Pattern
        register_block_pattern(
            'd-theme/hero-pattern',
            [
                'title'       => __('Hero Section', 'd-theme'),
                'description' => _x('A hero section with title and call-to-action button', 'Block pattern description', 'd-theme'),
                'content'     => '<!-- wp:d-theme/hero-block {"title":"Welcome to Our Site","description":"Create amazing content with our modern theme","buttonText":"Get Started","buttonUrl":"#","backgroundColor":"#0066cc"} /-->',
                'categories'  => ['d-theme'],
                'keywords'    => ['hero', 'welcome', 'section'],
            ]
        );

        // Featured Content Pattern
        register_block_pattern(
            'd-theme/featured-content',
            [
                'title'       => __('Featured Content', 'd-theme'),
                'description' => _x('Display featured content with image and text', 'Block pattern description', 'd-theme'),
                'content'     => '<!-- wp:group {"layout":{"type":"flex"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"300px","height":"300px"} -->
<figure class="wp-block-image is-resized"><img src="https://via.placeholder.com/300" alt="" width="300" height="300"/></figure>
<!-- /wp:image -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">Featured Title</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Add your featured content description here. This pattern is perfect for showcasing important content.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
                'categories'  => ['d-theme'],
                'keywords'    => ['featured', 'content', 'image'],
            ]
        );

        // Call to Action Pattern
        register_block_pattern(
            'd-theme/call-to-action',
            [
                'title'       => __('Call to Action', 'd-theme'),
                'description' => _x('A prominent call-to-action section', 'Block pattern description', 'd-theme'),
                'content'     => '<!-- wp:group {"backgroundColor":"primary","layout":{"type":"flex","justify":"center","flexWrap":"wrap"}} -->
<div class="wp-block-group has-primary-background-color has-background"><!-- wp:heading {"textColor":"light"} -->
<h2 class="wp-block-heading has-light-color has-text-color">Ready to Get Started?</h2>
<!-- /wp:heading -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"light","textColor":"primary"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button has-primary-color has-light-background-color has-text-color has-background" href="#">Click Here</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
                'categories'  => ['d-theme'],
                'keywords'    => ['call', 'action', 'cta'],
            ]
        );
    }
}
add_action('init', 'd_theme_register_patterns', 10);
