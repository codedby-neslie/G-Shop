<?php
declare(strict_types=1);

/**
 * Register Custom Blocks
 *
 * Register all custom Gutenberg blocks for the theme
 *
 * @package D_Theme
 * @since 1.0.0
 */

/**
 * Register custom blocks
 */
if (!function_exists('d_theme_register_blocks')) {
    function d_theme_register_blocks() {
        // Get all block directories
        $blocks_dir = D_THEME_INC_PATH . '/blocks';
        
        if (!is_dir($blocks_dir)) {
            return;
        }

        $block_folders = array_filter(
            scandir($blocks_dir),
            function ($item) use ($blocks_dir) {
                return $item !== '.' && $item !== '..' && is_dir($blocks_dir . '/' . $item);
            }
        );

        foreach ($block_folders as $block_folder) {
            if ($block_folder === 'register-blocks.php') {
                continue;
            }

            $block_file = $blocks_dir . '/' . $block_folder . '/block.php';

            if (file_exists($block_file)) {
                register_block_type($blocks_dir . '/' . $block_folder);
            }
        }
    }
}
add_action('init', 'd_theme_register_blocks');

/**
 * Helper function to register a custom block
 *
 * @param string $block_name The block name
 * @param array  $args       Registration arguments
 * @return void
 */
function d_theme_register_block($block_name, $args = []) {
    $block_path = D_THEME_INC_PATH . '/blocks/' . $block_name;

    if (!is_dir($block_path)) {
        return;
    }

    // Merge default arguments
    $default_args = [
        'render_callback' => null,
        'attributes'      => [],
    ];

    $args = array_merge($default_args, $args);

    // Check for block.json
    $block_json_path = $block_path . '/block.json';
    if (file_exists($block_json_path)) {
        register_block_type($block_path);
    }
}
