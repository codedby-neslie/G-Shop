<?php
/**
 * Post Card Template
 *
 * Display a single post in archive/list view
 *
 * @package D_Theme
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    <div class="post-card-inner" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease; height: 100%;">
        
        <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail" style="overflow: hidden; height: 200px;">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail('medium', ['style' => 'width: 100%; height: 100%; object-fit: cover;']); ?>
                </a>
            </div>
        <?php endif; ?>

        <div class="post-card-content" style="padding: 1.5rem;">
            <header class="entry-header">
                <h2 class="entry-title" style="margin: 0 0 10px 0;">
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                        <?php the_title(); ?>
                    </a>
                </h2>
                
                <?php if ('post' === get_post_type()) : ?>
                    <div class="entry-meta" style="font-size: 0.875rem; color: #666; margin-bottom: 1rem;">
                        <span class="posted-on">
                            <?php echo get_the_date(); ?>
                        </span>
                        <span class="byline">
                            <?php echo 'by ' . get_the_author(); ?>
                        </span>
                    </div>
                <?php endif; ?>
            </header>

            <div class="entry-summary" style="margin-bottom: 1rem;">
                <?php
                if (has_excerpt()) {
                    the_excerpt();
                } else {
                    echo wp_trim_words(get_the_content(), 20, '...');
                }
                ?>
            </div>

            <footer class="entry-footer">
                <a href="<?php the_permalink(); ?>" class="read-more" style="color: #0066cc; font-weight: 600; text-decoration: none;">
                    <?php echo __('Read More →', 'd-theme'); ?>
                </a>
            </footer>
        </div>
    </div>
</article>
