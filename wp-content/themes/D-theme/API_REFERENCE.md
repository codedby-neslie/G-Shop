# Theme API Reference

Quick reference for common theme functions and hooks.

## Theme Constants

```php
D_THEME_VERSION    // Theme version (1.0.0)
D_THEME_PATH       // Theme directory path
D_THEME_URI        // Theme directory URL
D_THEME_INC_PATH   // Theme inc directory path
```

## Core Functions

### Asset Management

```php
// Enqueue stylesheet
wp_enqueue_style('handle', $src, $deps, $version, $media);

// Enqueue script
wp_enqueue_script('handle', $src, $deps, $version, $in_footer);

// Localize script data
wp_localize_script('handle', 'object_name', $data);
```

### Template Tags

```php
// Display theme-related information
bloginfo('name');              // Site title
bloginfo('description');       // Tagline
get_template_directory_uri();  // Theme URL
get_template_directory();      // Theme path

// Navigation
wp_nav_menu($args);            // Display menu
register_nav_menus($menus);    // Register menus

// Custom logo
has_custom_logo();             // Check for logo
the_custom_logo();             // Display logo
```

### Post Functions

```php
// Get posts
get_posts($args);
new WP_Query($args);

// Display post data
the_title();                   // Post title
the_content();                 // Post content
the_excerpt();                 // Post excerpt
the_permalink();               // Post URL
the_author();                  // Post author
get_the_date($format);         // Post date

// Post thumbnails
has_post_thumbnail();          // Check thumbnail
the_post_thumbnail($size, $attr);
get_the_post_thumbnail_url($size);
```

### Custom Taxonomy Functions

```php
// Register taxonomy
register_taxonomy('taxonomy_name', 'post_type', $args);

// Get terms
get_terms($args);
get_the_terms($post_id, 'taxonomy');

// Display terms
the_terms($post_id, 'taxonomy', $before, $sep, $after);
```

## Theme Hooks

### Action Hooks

```php
// Initialization
add_action('after_setup_theme', 'callback');      // Theme setup
add_action('wp_enqueue_scripts', 'callback');     // Frontend styles/scripts
add_action('admin_enqueue_scripts', 'callback');  // Admin styles/scripts

// Content
add_action('wp_head', 'callback');                // Inside <head>
add_action('wp_body_open', 'callback');           // After <body>
add_action('wp_footer', 'callback');              // Before </body>

// Post
add_action('save_post', 'callback');              // After save
add_action('delete_post', 'callback');            // Before delete
```

### Filter Hooks

```php
// Template
add_filter('template_include', 'callback');       // Change template file
add_filter('archive_template', 'callback');       // Archive template

// Content
add_filter('the_content', 'callback');            // Filter post content
add_filter('the_excerpt', 'callback');            // Filter excerpt
add_filter('the_title', 'callback');              // Filter title

// Posts query
add_filter('posts_where', 'callback');            // Modify WHERE clause
add_filter('posts_orderby', 'callback');          // Modify ORDER BY
```

## Common Code Patterns

### Get All Posts of a Custom Post Type

```php
$args = [
    'post_type'      => 'blog',
    'posts_per_page' => 10,
    'orderby'        => 'date',
    'order'          => 'DESC',
];
$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        // Display post
    }
    wp_reset_postdata();
}
```

### Enqueue Multiple Assets

```php
wp_enqueue_style('font-family', 'https://fonts.googleapis.com/...');

wp_enqueue_style('d-theme-main', D_THEME_URI . '/assets/stylesheets/style.css');

wp_enqueue_script('d-theme-main', D_THEME_URI . '/assets/javascripts/main.js', 
    ['jquery'], D_THEME_VERSION, true);
```

### Create a Meta Box

```php
add_action('add_meta_boxes', function() {
    add_meta_box(
        'meta_box_id',
        'Meta Box Title',
        'd_theme_meta_box_callback',
        'post'
    );
});

function d_theme_meta_box_callback($post) {
    $value = get_post_meta($post->ID, '_meta_key', true);
    ?>
    <input type="text" name="meta_field" value="<?php echo esc_attr($value); ?>">
    <?php
}

add_action('save_post', function($post_id) {
    if (isset($_POST['meta_field'])) {
        update_post_meta($post_id, '_meta_key', sanitize_text_field($_POST['meta_field']));
    }
});
```

### Register a Shortcode

```php
add_shortcode('d_shortcode', function($atts) {
    $atts = shortcode_atts(['title' => 'Default'], $atts);
    return '<div>' . esc_html($atts['title']) . '</div>';
});
```

### Add AJAX Handler

```php
// Frontend script
wp_localize_script('handle', 'dTheme', ['ajaxurl' => admin_url('admin-ajax.php')]);

// JavaScript
fetch(dTheme.ajaxurl, {
    method: 'POST',
    body: new FormData(/* ... */)
});

// Backend PHP
add_action('wp_ajax_my_action', 'd_theme_ajax_handler');
add_action('wp_ajax_nopriv_my_action', 'd_theme_ajax_handler');

function d_theme_ajax_handler() {
    check_ajax_referer('d_theme_nonce');
    // Process request
    wp_send_json_success(['message' => 'Success']);
}
```

## Security Functions

```php
// Escape output
esc_html($text);              // Escape HTML
esc_attr($text);              // Escape attribute
esc_url($url);                // Escape URL
esc_js($text);                // Escape JavaScript

// Sanitize input
sanitize_text_field($input);  // Sanitize text
sanitize_email($input);       // Sanitize email
sanitize_url($input);         // Sanitize URL
sanitize_hex_color($input);   // Sanitize color

// Verification
wp_verify_nonce($nonce, 'action');    // Verify nonce
wp_create_nonce('action');             // Create nonce
current_user_can('capability');        // Check capability
```

## Database Functions

```php
global $wpdb;

// Get results
$wpdb->get_results("SELECT * FROM table");
$wpdb->get_var("SELECT COUNT(*) FROM table");
$wpdb->get_row("SELECT * FROM table WHERE id = %d", ARRAY_A, 1);

// Insert
$wpdb->insert('table', ['col' => 'val']);

// Update
$wpdb->update('table', ['col' => 'val'], ['id' => 1]);

// Delete
$wpdb->delete('table', ['id' => 1]);
```

## Options API

```php
// Get option
$value = get_option('option_name');

// Update option
update_option('option_name', $value);

// Add option
add_option('option_name', $value);

// Delete option
delete_option('option_name');
```

## Meta Boxes & Post Meta

```php
// Get post meta
$value = get_post_meta($post_id, 'meta_key', true);  // Single value
$values = get_post_meta($post_id, 'meta_key');       // All values

// Update post meta
update_post_meta($post_id, 'meta_key', $value);

// Add post meta (for new values)
add_post_meta($post_id, 'meta_key', $value);

// Delete post meta
delete_post_meta($post_id, 'meta_key', $value);
```

## Conditional Tags

```php
// Post type checks
is_single();                   // Single post page
is_archive();                  // Archive page
is_home();                     // Blog home
is_front_page();               // Front page
is_page();                     // Static page
is_search();                   // Search results
is_404();                      // 404 error
is_tax();                      // Taxonomy page

// Specific checks
is_post_type_archive('blog');  // Blog archive
is_category($cat);             // Category page
is_tag($tag);                  // Tag page
is_author($user);              // Author page
```

## WP_Query Arguments

```php
$args = [
    's'              => '',           // Search term
    'post_type'      => 'post',       // Post type
    'posts_per_page' => 10,           // Posts per page
    'paged'          => 1,            // Page number
    'orderby'        => 'date',       // Order by
    'order'          => 'DESC',       // Sort order
    'meta_key'       => '',           // Meta key
    'meta_value'     => '',           // Meta value
    'tax_query'      => [],           // Taxonomy query
    'post_parent'    => 0,            // Parent post
    'post__in'       => [],           // Include posts
    'post__not_in'   => [],           // Exclude posts
];
```

---

For more information, visit the [WordPress Code Reference](https://developer.wordpress.org/reference/).
