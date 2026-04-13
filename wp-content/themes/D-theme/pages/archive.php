<?php
/**
 * Archive Template
 *
 * Display archive pages (blog posts, categories, tags, etc.)
 *
 * @package D_Theme
 * @since 1.0.0
 */
?>

<div class="archive-wrapper">
    <header class="archive-header mb-3">
        <h1 class="archive-title">
            <?php
            if (is_category()) {
                single_cat_title();
            } elseif (is_tag()) {
                single_tag_title();
            } elseif (is_author()) {
                echo 'Author: ' . get_the_author();
            } elseif (is_year()) {
                echo get_the_date('Y');
            } elseif (is_month()) {
                echo get_the_date('F Y');
            } elseif (is_day()) {
                echo get_the_date('F j, Y');
            } elseif (is_search()) {
                printf(esc_html__('Search Results for: %s', 'd-theme'), '<span>' . get_search_query() . '</span>');
            } else {
                echo 'Blog';
            }
            ?>
        </h1>
        <?php
        if (is_category() || is_tag()) {
            echo category_description() ?: tag_description();
        }
        ?>
    </header>

    <?php
    if (have_posts()) {
        echo '<div class="posts-grid">';

        while (have_posts()) {
            the_post();
            get_template_part('pages/archive/post-card');
        }

        echo '</div>';

        // Pagination
        the_posts_pagination([
            'mid_size'           => 2,
            'prev_text'          => __('&larr; Previous', 'd-theme'),
            'next_text'          => __('Next &rarr;', 'd-theme'),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'd-theme') . ' </span>',
        ]);
    } else {
        get_template_part('pages/archive/no-posts');
    }
    ?>
</div>

<style>
    .posts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    @media (max-width: 768px) {
        .posts-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
