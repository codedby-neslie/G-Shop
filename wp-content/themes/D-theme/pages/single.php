<?php
/**
 * Single Post Template
 *
 * Display single post pages
 *
 * @package D_Theme
 * @since 1.0.0
 */

while (have_posts()) {
    the_post();
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
        <header class="entry-header mb-3">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            
            <div class="entry-meta" style="color: #666; font-size: 0.95rem; margin-bottom: 1.5rem;">
                <span class="posted-on">
                    <strong><?php echo __('Published:', 'd-theme'); ?></strong> 
                    <?php echo get_the_date(); ?>
                </span>
                <span class="byline">
                    <strong><?php echo __('By:', 'd-theme'); ?></strong> 
                    <?php the_author_posts_link(); ?>
                </span>
                <?php
                $categories = get_the_category();
                if ($categories) {
                    echo '<span class="cat-links"><strong>' . __('Categories:', 'd-theme') . '</strong> ';
                    echo implode(', ', array_map(function($cat) {
                        return '<a href="' . get_category_link($cat) . '">' . $cat->name . '</a>';
                    }, $categories));
                    echo '</span>';
                }
                ?>
            </div>
        </header>

        <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail" style="margin-bottom: 2rem;">
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

        <footer class="entry-footer mt-3" style="padding-top: 2rem; border-top: 1px solid #ddd;">
            <?php
            $tags = get_the_tags();
            if ($tags) {
                echo '<div class="tags-list" style="margin-bottom: 1rem;">';
                echo '<strong>' . __('Tags:', 'd-theme') . '</strong> ';
                echo implode(', ', array_map(function($tag) {
                    return '<a href="' . get_tag_link($tag) . '" class="tag">' . $tag->name . '</a>';
                }, $tags));
                echo '</div>';
            }
            ?>
        </footer>
    </article>

    <?php
    // Author Box
    get_template_part('pages/template-parts/author-box');

    // Related Posts
    get_template_part('pages/template-parts/related-posts');

    // Comments
    if (comments_open() || get_comments_number()) {
        comments_template();
    }
}
