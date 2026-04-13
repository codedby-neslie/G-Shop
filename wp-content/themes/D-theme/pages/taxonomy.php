<?php
/**
 * Taxonomy Template
 *
 * Display taxonomy archive pages
 *
 * @package D_Theme
 * @since 1.0.0
 */
?>

<div class="taxonomy-wrapper">
    <header class="taxonomy-header mb-3">
        <h1 class="taxonomy-title">
            <?php single_term_title(); ?>
        </h1>
        <div class="taxonomy-description">
            <?php echo term_description(); ?>
        </div>
    </header>

    <?php
    if (have_posts()) {
        echo '<div class="posts-grid">';

        while (have_posts()) {
            the_post();
            get_template_part('pages/template-parts/archive-parts/post-card');
        }

        echo '</div>';

        // Pagination
        the_posts_pagination([
            'mid_size'           => 2,
            'prev_text'          => __('&larr; Previous', 'd-theme'),
            'next_text'          => __('Next &rarr;', 'd-theme'),
        ]);
    } else {
        get_template_part('pages/template-parts/archive-parts/no-posts');
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
