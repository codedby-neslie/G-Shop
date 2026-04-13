<?php
/**
 * Author Box Template
 *
 * Display author information on single posts
 *
 * @package D_Theme
 * @since 1.0.0
 */

if (post_type_supports(get_post_type(), 'author')) {
    ?>
    <div class="author-box" style="background: #f9f9f9; padding: 1.5rem; border-radius: 8px; margin: 2rem 0;">
        <div style="display: flex; gap: 1rem; align-items: flex-start;">
            <div class="author-avatar">
                <?php echo get_avatar(get_the_author_meta('ID'), 100, '', '', ['class' => 'avatar', 'style' => 'border-radius: 50%;']); ?>
            </div>
            <div class="author-info">
                <h3 class="author-name" style="margin: 0 0 0.5rem 0;">
                    <?php the_author_posts_link(); ?>
                </h3>
                <p class="author-bio" style="margin: 0; color: #666;">
                    <?php echo get_the_author_meta('description') ?: __('No bio available.', 'd-theme'); ?>
                </p>
            </div>
        </div>
    </div>
    <?php
}
