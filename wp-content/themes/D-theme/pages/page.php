<?php
/**
 * Generic Page Template
 *
 * Display generic page templates
 *
 * @package D_Theme
 * @since 1.0.0
 */

while (have_posts()) {
    the_post();
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
        <header class="entry-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </header>

        <?php if (has_post_thumbnail()) : ?>
            <div class="page-thumbnail" style="margin-bottom: 2rem;">
                <?php
                the_post_thumbnail('full', [
                    'style' => 'width: 100%; height: auto; border-radius: 8px;',
                    'alt'   => the_title_attribute(['echo' => false])
                ]);
                ?>
            </div>
        <?php endif; ?>

        <div class="entry-content">
            <?php
            the_content();

            wp_link_pages([
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'd-theme'),
                'after'  => '</div>',
            ]);
            ?>
        </div>
    </article>

    <?php
    if (comments_open() || get_comments_number()) {
        comments_template();
    }
}
