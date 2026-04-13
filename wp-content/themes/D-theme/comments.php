<?php
/**
 * Comments Template
 *
 * @package D_Theme
 * @since 1.0.0
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
    if (have_comments()) {
        ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ($comments_number === 1) {
                esc_html_e('1 comment', 'd-theme');
            } else {
                printf(
                    /* translators: %1$d: Number of comments. */
                    esc_html(_n('%d comment', '%d comments', $comments_number, 'd-theme')),
                    $comments_number
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments([
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 42,
            ]);
            ?>
        </ol>

        <?php
        the_comments_pagination([
            'prev_text' => __('&larr; Older comments', 'd-theme'),
            'next_text' => __('Newer comments &rarr;', 'd-theme'),
        ]);
    }

    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) {
        ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'd-theme'); ?></p>
        <?php
    }

    comment_form([
        'label_submit' => __('Post Comment', 'd-theme'),
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x('Comment', 'noun', 'd-theme') . '</label><textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></p>',
    ]);
    ?>
</div>
