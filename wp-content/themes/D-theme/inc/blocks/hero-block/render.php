<?php
/**
 * Render Hero Block
 *
 * @param array    $attributes The block attributes
 * @param string   $content    The block content
 * @param WP_Block $block      The block object
 * @return string
 */

$title        = isset($attributes['title']) ? sanitize_text_field($attributes['title']) : '';
$description  = isset($attributes['description']) ? sanitize_text_field($attributes['description']) : '';
$button_text  = isset($attributes['buttonText']) ? sanitize_text_field($attributes['buttonText']) : '';
$button_url   = isset($attributes['buttonUrl']) ? esc_url($attributes['buttonUrl']) : '';
$bg_color     = isset($attributes['backgroundColor']) ? sanitize_hex_color($attributes['backgroundColor']) : '#0066cc';
$text_color   = isset($attributes['textColor']) ? sanitize_hex_color($attributes['textColor']) : '#ffffff';
$image_url    = isset($attributes['imageUrl']) ? esc_url($attributes['imageUrl']) : '';
$height       = isset($attributes['height']) ? sanitize_text_field($attributes['height']) : '500px';

// Build inline styles
$hero_style = "background-color: {$bg_color}; color: {$text_color}; height: {$height}; display: flex; align-items: center; justify-content: center; background-image: url('{$image_url}'); background-size: cover; background-position: center; position: relative;";

?>
<div class="wp-block-d-theme-hero-block hero-block" style="<?php echo $hero_style; ?>">
    <div class="hero-block__overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.4);"></div>
    <div class="hero-block__content" style="position: relative; z-index: 1; text-align: center; padding: 40px; max-width: 800px;">
        <?php if ($title) : ?>
            <h1 class="hero-block__title" style="font-size: 3em; margin-bottom: 20px; font-weight: 700;">
                <?php echo $title; ?>
            </h1>
        <?php endif; ?>

        <?php if ($description) : ?>
            <p class="hero-block__description" style="font-size: 1.2em; margin-bottom: 30px; line-height: 1.6;">
                <?php echo $description; ?>
            </p>
        <?php endif; ?>

        <?php if ($button_text && $button_url) : ?>
            <a href="<?php echo $button_url; ?>" class="hero-block__button" style="display: inline-block; padding: 12px 30px; background-color: white; color: <?php echo $bg_color; ?>; text-decoration: none; border-radius: 4px; font-weight: 600; transition: all 0.3s ease;">
                <?php echo $button_text; ?>
            </a>
        <?php endif; ?>
    </div>
</div>
