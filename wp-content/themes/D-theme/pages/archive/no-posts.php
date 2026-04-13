<?php
/**
 * No Posts Found Template
 *
 * Display message when no posts are found
 *
 * @package D_Theme
 * @since 1.0.0
 */
?>

<div class="no-posts-found" style="text-align: center; padding: 3rem 2rem;">
    <h2><?php echo __('Nothing Found', 'd-theme'); ?></h2>
    <p>
        <?php
        if (is_search()) {
            echo __('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'd-theme');
        } else {
            echo __('Sorry, but we could not find what you were looking for. It is possible that some of the posts have been removed or scheduled for later.', 'd-theme');
        }
        ?>
    </p>
    
    <?php
    if (is_search()) {
        get_search_form();
    }
    ?>
</div>
