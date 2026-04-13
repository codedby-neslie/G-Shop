<?php
/**
 * Generic Index Template
 *
 * Default fallback template
 *
 * @package D_Theme
 * @since 1.0.0
 */
?>

<div class="content-wrapper">
    <?php
    if (have_posts()) {
        echo '<div class="posts-grid">';

        while (have_posts()) {
            the_post();
            get_template_part('pages/archive/post-card');
        }

        echo '</div>';
    } else {
        get_template_part('pages/archive/no-posts');
    }
    ?>
</div>
