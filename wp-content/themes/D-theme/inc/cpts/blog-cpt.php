<?php
declare(strict_types=1);

/**
 * Register Blog Custom Post Type
 *
 * Register a custom post type for blog articles
 *
 * @package D_Theme
 * @since 1.0.0
 */

/**
 * Register blog CPT
 */
if (!function_exists('d_theme_register_blog_cpt')) {
    function d_theme_register_blog_cpt() {
        $labels = [
            'name'                  => _x('Blog Posts', 'Post type general name', 'd-theme'),
            'singular_name'         => _x('Blog Post', 'Post type singular name', 'd-theme'),
            'menu_name'             => _x('Blog', 'Admin Menu text', 'd-theme'),
            'name_admin_bar'        => _x('Blog Post', 'Add New on Toolbar', 'd-theme'),
            'add_new'               => __('Add New', 'd-theme'),
            'add_new_item'          => __('Add New Blog Post', 'd-theme'),
            'new_item'              => __('New Blog Post', 'd-theme'),
            'edit_item'             => __('Edit Blog Post', 'd-theme'),
            'view_item'             => __('View Blog Post', 'd-theme'),
            'all_items'             => __('All Blog Posts', 'd-theme'),
            'search_items'          => __('Search Blog Posts', 'd-theme'),
            'parent_item_colon'     => __('Parent Blog Posts:', 'd-theme'),
            'not_found'             => __('No Blog Posts found.', 'd-theme'),
            'not_found_in_trash'    => __('No Blog Posts found in Trash.', 'd-theme'),
            'archives'              => __('Blog Post Archives', 'd-theme'),
            'attributes'            => __('Blog Post Attributes', 'd-theme'),
            'insert_into_item'      => __('Insert into Blog Post', 'd-theme'),
            'uploaded_to_this_item' => __('Uploaded to this Blog Post', 'd-theme'),
            'featured_image'        => __('Featured Image', 'd-theme'),
            'set_featured_image'    => __('Set featured image', 'd-theme'),
            'remove_featured_image' => __('Remove featured image', 'd-theme'),
            'use_featured_image'    => __('Use as featured image', 'd-theme'),
            'filter_items_list'     => __('Filter Blog Posts list', 'd-theme'),
            'items_list_navigation' => __('Blog Posts list navigation', 'd-theme'),
            'items_list'            => __('Blog Posts list', 'd-theme'),
            'item_published'        => __('Blog Post published.', 'd-theme'),
            'item_published_privately' => __('Blog Post published privately.', 'd-theme'),
            'item_reverted_to_draft' => __('Blog Post reverted to draft.', 'd-theme'),
            'item_scheduled'        => __('Blog Post scheduled.', 'd-theme'),
            'item_updated'          => __('Blog Post updated.', 'd-theme'),
            'item_link'             => __('Blog Post Link', 'd-theme'),
            'item_link_description' => __('A link to a Blog Post.', 'd-theme'),
        ];

        $args = [
            'label'              => __('Blog', 'd-theme'),
            'labels'             => $labels,
            'description'        => __('Blog posts for the website', 'd-theme'),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'show_in_admin_bar'  => true,
            'show_in_rest'       => true,
            'rest_base'          => 'blog',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'has_archive'        => true,
            'hierarchical'       => false,
            'can_export'         => true,
            'delete_with_user'   => false,
            'exclude_from_search' => false,
            'capability_type'    => 'post',
            'map_meta_cap'       => true,
            'supports'           => [
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'revisions',
                'custom-fields',
            ],
            'taxonomies'         => ['blog_category', 'blog_tag'],
            'rewrite'            => [
                'slug'       => 'blog',
                'with_front' => true,
            ],
            'menu_position'      => 5,
            'menu_icon'          => 'dashicons-edit',
        ];

        register_post_type('blog', $args);
    }
}
add_action('init', 'd_theme_register_blog_cpt', 0);

/**
 * Register Blog Category Taxonomy
 */
if (!function_exists('d_theme_register_blog_category')) {
    function d_theme_register_blog_category() {
        $labels = [
            'name'              => _x('Blog Categories', 'taxonomy general name', 'd-theme'),
            'singular_name'     => _x('Blog Category', 'taxonomy singular name', 'd-theme'),
            'search_items'      => __('Search Blog Categories', 'd-theme'),
            'all_items'         => __('All Blog Categories', 'd-theme'),
            'parent_item'       => __('Parent Blog Category', 'd-theme'),
            'parent_item_colon' => __('Parent Blog Category:', 'd-theme'),
            'edit_item'         => __('Edit Blog Category', 'd-theme'),
            'update_item'       => __('Update Blog Category', 'd-theme'),
            'add_new_item'      => __('Add New Blog Category', 'd-theme'),
            'new_item_name'     => __('New Blog Category Name', 'd-theme'),
            'menu_name'         => __('Categories', 'd-theme'),
        ];

        $args = [
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_in_rest'      => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => 'blog-category'],
        ];

        register_taxonomy('blog_category', ['blog'], $args);
    }
}
add_action('init', 'd_theme_register_blog_category', 0);

/**
 * Register Blog Tag Taxonomy
 */
if (!function_exists('d_theme_register_blog_tag')) {
    function d_theme_register_blog_tag() {
        $labels = [
            'name'          => _x('Blog Tags', 'taxonomy general name', 'd-theme'),
            'singular_name' => _x('Blog Tag', 'taxonomy singular name', 'd-theme'),
            'search_items'  => __('Search Blog Tags', 'd-theme'),
            'all_items'     => __('All Blog Tags', 'd-theme'),
            'edit_item'     => __('Edit Blog Tag', 'd-theme'),
            'update_item'   => __('Update Blog Tag', 'd-theme'),
            'add_new_item'  => __('Add New Blog Tag', 'd-theme'),
            'new_item_name' => __('New Blog Tag Name', 'd-theme'),
            'menu_name'     => __('Tags', 'd-theme'),
        ];

        $args = [
            'hierarchical'      => false,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_in_rest'      => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => 'blog-tag'],
        ];

        register_taxonomy('blog_tag', ['blog'], $args);
    }
}
add_action('init', 'd_theme_register_blog_tag', 0);
