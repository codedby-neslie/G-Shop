<?php
declare(strict_types=1);

/**
 * Hero Shortcode
 *
 * Shortcode: [d_hero title="Title" subtitle="Subtitle" button_text="Button Text" button_url="#" background_color="#0066cc"]
 *
 * @package D_Theme
 * @since 1.0.0
 */

/**
 * Register hero shortcode
 */
if (!function_exists('d_theme_hero_shortcode')) {
    function d_theme_hero_shortcode($atts) {
        // Parse attributes with defaults
        $atts = shortcode_atts(
            [
                'title'             => 'Hero Title',
                'subtitle'          => 'Hero Subtitle',
                'button_text'       => 'Click Me',
                'button_url'        => '#',
                'background_color'  => '#0066cc',
                'text_color'        => '#ffffff',
                'height'            => '400px',
            ],
            $atts,
            'd_hero'
        );

        // Sanitize attributes
        $title            = sanitize_text_field($atts['title']);
        $subtitle         = sanitize_text_field($atts['subtitle']);
        $button_text      = sanitize_text_field($atts['button_text']);
        $button_url       = esc_url($atts['button_url']);
        $background_color = sanitize_hex_color($atts['background_color'] ?? '#0066cc');
        $text_color       = sanitize_hex_color($atts['text_color'] ?? '#ffffff');
        $height           = sanitize_text_field($atts['height']);

        // Build inline styles
        $wrapper_style = "
            background-color: {$background_color};
            color: {$text_color};
            height: {$height};
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border-radius: 8px;
        ";

        $content_style = "
            text-align: center;
            padding: 40px;
            max-width: 600px;
            position: relative;
            z-index: 2;
        ";

        $button_style = "
            display: inline-block;
            padding: 12px 30px;
            background-color: white;
            color: {$background_color};
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: 20px;
        ";

        $html = '<div class="d-theme-hero-shortcode" style="' . $wrapper_style . '">';
        $html .= '<div class="d-hero-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(135deg, rgba(0,0,0,0.2), rgba(0,0,0,0.4));"></div>';
        $html .= '<div class="d-hero-content" style="' . $content_style . '">';
        
        if ($title) {
            $html .= '<h2 class="d-hero-title" style="font-size: 2.5em; margin: 0 0 20px 0; font-weight: 700;">' . $title . '</h2>';
        }
        
        if ($subtitle) {
            $html .= '<p class="d-hero-subtitle" style="font-size: 1.1em; margin: 0 0 30px 0; line-height: 1.6; opacity: 0.95;">' . $subtitle . '</p>';
        }
        
        if ($button_text && $button_url) {
            $html .= '<a href="' . $button_url . '" class="d-hero-button" style="' . $button_style . '">' . $button_text . '</a>';
        }
        
        $html .= '</div></div>';
        
        return $html;
    }
}
add_shortcode('d_hero', 'd_theme_hero_shortcode');
