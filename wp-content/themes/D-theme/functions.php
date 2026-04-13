<?php
declare(strict_types=1);

// Define theme constants
define('D_THEME_VERSION', '1.0.0');
define('D_THEME_PATH', get_template_directory());
define('D_THEME_URI', get_template_directory_uri());
define('D_THEME_INC_PATH', D_THEME_PATH . '/inc');

// Load theme configuration and utilities
require_once D_THEME_INC_PATH . '/hooks.php';
require_once D_THEME_INC_PATH . '/load-scripts.php';
require_once D_THEME_INC_PATH . '/blocks/register-blocks.php';
require_once D_THEME_INC_PATH . '/cpts/blog-cpt.php';
require_once D_THEME_INC_PATH . '/patterns/register-patterns.php';
require_once D_THEME_INC_PATH . '/shortcodes/register-shortcodes.php';
