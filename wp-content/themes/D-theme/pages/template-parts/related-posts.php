<?php
/**
 * Related Posts Template
 *
 * Display related posts based on categories and tags
 *
 * @package D_Theme
 * @since 1.0.0
 */

$post_id = get_the_ID();
$categories = get_the_category($post_id);

if ($categories) {
    $category_ids = array_map(function($cat) {
        return $cat->term_id;
    }, $categories);

    $related_posts = new WP_Query([
        'post__not_in'           => [$post_id],
        'posts_per_page'         => 3,
        'category__in'           => $category_ids,
        'orderby'                => 'date',
        'order'                  => 'DESC',
        'no_found_rows'          => true,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false,
    ]);

    if ($related_posts->have_posts()) {
        ?>
        <div class="related-posts" style="margin: 3rem 0;">
            <h3><?php echo __('Related Posts', 'd-theme'); ?></h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 2rem; margin-top: 1.5rem;">
                <?php
                while ($related_posts->have_posts()) {
                    $related_posts->the_post();
                    get_template_part('pages/archive/post-card');
                }
                ?>
            </div>
        </div>
        <?php
    }

    wp_reset_postdata();
}
