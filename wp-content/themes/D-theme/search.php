<?php
/**
 * Search Results Template
 *
 * @package D_Theme
 * @since 1.0.0
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        <header class="page-header" style="margin-bottom: 2rem;">
            <h1 class="page-title">
                <?php
                printf(esc_html__('Search Results for: %s', 'd-theme'), '<span>' . get_search_query() . '</span>');
                ?>
            </h1>
        </header>

        <?php
        if (have_posts()) {
            echo '<div class="posts-grid">';

            while (have_posts()) {
                the_post();
                get_template_part('pages/template-parts/archive-parts/post-card');
            }

            echo '</div>';

            the_posts_pagination();
        } else {
            get_template_part('pages/template-parts/archive-parts/no-posts');
        }
        ?>
    </div>
</main>

<?php
get_footer();
