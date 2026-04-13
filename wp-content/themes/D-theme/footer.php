<?php
/**
 * Footer Template
 *
 * @package D_Theme
 * @since 1.0.0
 */
?>

    <footer id="colophon" class="site-footer">
        <div class="site-footer-wrapper" style="max-width: 1200px; margin: 0 auto;">
            <div class="footer-content">
                <div class="footer-widget">
                    <h3><?php bloginfo('name'); ?></h3>
                    <p><?php bloginfo('description'); ?></p>
                </div>

                <div class="footer-widget">
                    <h3><?php echo __('Quick Links', 'd-theme'); ?></h3>
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'fallback_cb'    => false,
                        'container'      => false,
                    ]);
                    ?>
                </div>

                <div class="footer-widget">
                    <h3><?php echo __('Contact', 'd-theme'); ?></h3>
                    <p>
                        <?php
                        $contact = get_option('blogdescription');
                        echo __('Get in touch with us for more information.', 'd-theme');
                        ?>
                    </p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>
                    <?php
                    printf(
                        esc_html__('&copy; %1$d %2$s. All Rights Reserved. Powered by %3$s', 'd-theme'),
                        date('Y'),
                        get_bloginfo('name'),
                        '<a href="https://wordpress.org">WordPress</a>'
                    );
                    ?>
                </p>
            </div>
        </div>
    </footer>

</body>
</html>

<?php wp_footer(); ?>
