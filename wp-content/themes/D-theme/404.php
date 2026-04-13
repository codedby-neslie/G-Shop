<?php
/**
 * 404 Not Found Template
 *
 * @package D_Theme
 * @since 1.0.0
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        <div class="error-404 not-found" style="text-align: center; padding: 3rem 2rem; min-height: 60vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <h1 class="page-title" style="font-size: 4rem; color: #999; margin-bottom: 1rem;">404</h1>
            <p style="font-size: 1.25rem; margin-bottom: 2rem;">
                <?php esc_html_e('Oops! That page can&rsquo;t be found.', 'd-theme'); ?>
            </p>
            <p style="margin-bottom: 2rem; color: #666;">
                <?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'd-theme'); ?>
            </p>

            <?php get_search_form(); ?>

            <div style="margin-top: 2rem;">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="button" style="display: inline-block; padding: 12px 30px; background-color: #0066cc; color: white; text-decoration: none; border-radius: 4px; font-weight: 600;">
                    <?php esc_html_e('Go to Home Page', 'd-theme'); ?>
                </a>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
