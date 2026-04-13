<?php
/**
 * Base Template
 *
 * Reusable default template for all page types
 *
 * @package D_Theme
 * @since 1.0.0
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        <?php
        if (is_home() || is_archive() || is_search()) {
            get_template_part('pages/archive');
        } elseif (is_single()) {
            get_template_part('pages/single');
        } elseif (is_tax()) {
            get_template_part('pages/taxonomy');
        } elseif (is_page()) {
            get_template_part('pages/page');
        } else {
            get_template_part('pages/index');
        }
        ?>
    </div>
</main>

<?php
get_footer();
