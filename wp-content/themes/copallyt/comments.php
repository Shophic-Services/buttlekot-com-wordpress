<?php function copallyt_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?>>
    <article id="comment-<?php comment_ID(); ?>">
      <header class="comment-author">
        <?php echo get_avatar($comment,$size='48'); ?>
        <div class="author-meta">
          <?php printf('<cite class="fn">%s</cite>', get_comment_author_link()) ?>
          <time datetime="<?php echo comment_date('c') ?>"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(esc_html__('%1$s', 'copallyt'), get_comment_date(),  get_comment_time()) ?></a></time>
          <?php edit_comment_link(esc_html__('(Edit)', 'copallyt'), '', '') ?>
        </div>
      </header>
      
      <?php if ($comment->comment_approved == '0') : ?>
            <div class="notice alert-box">
              <p class="bottom"><?php echo esc_html__('Your comment is awaiting moderation.', 'copallyt') ?></p>
            </div>
      <?php endif; ?>
      
      <section class="comment clearfix">
        <?php comment_text() ?>
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </section>

    </article>
<?php } ?>

<?php

  if ( post_password_required() ) { ?>
  <section id="comments">
    <div class="notice alert-box">
      <p class="bottom"><?php echo esc_html__('This post is password protected. Enter the password to view comments.', 'copallyt'); ?></p>
    </div>
  </section>
  <?php
    return;
  }
?>
<?php // You can start editing here. Customize the respond form below ?>
<?php if ( have_comments() ) : ?>
  <section id="comments">
    <h3><?php comments_number(esc_html__('No Responses to', 'copallyt'), esc_html__('One Response to', 'copallyt'), esc_html__('% Responses to', 'copallyt') ); ?> &#8220;<?php the_title(); ?>&#8221;</h3>
    <ol class="commentlist">
    <?php wp_list_comments('callback=copallyt_comments'); ?>
    
    </ol>
    <footer>
      <nav id="comments-nav">
        <div class="comments-previous"><?php previous_comments_link( esc_html__( '&larr; Older comments', 'copallyt' ) ); ?></div>
        <div class="comments-next"><?php next_comments_link( esc_html__( 'Newer comments &rarr;', 'copallyt' ) ); ?></div>
      </nav>
    </footer>
  </section>
<?php else : // this is displayed if there are no comments so far ?>
  <?php if ( comments_open() ) : ?>
  <?php else : // comments are closed ?>
  <section id="comments">
    <div class="notice alert-box">
      <p class="bottom"><?php echo esc_html__('Comments are closed.', 'copallyt') ?></p>
    </div>
  </section>
  <?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<section id="respond">
  <h3><?php comment_form_title( esc_html__('Leave a Reply', 'copallyt'), esc_html__('Leave a Reply to %s', 'copallyt') ); ?></h3>
  <p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
  <?php if ( copallyt_get_option('comment_registration') && !is_user_logged_in() ) : ?>
  <p><?php printf( esc_html__('You must be <a href="%s">logged in</a> to post a comment.', 'copallyt'), wp_login_url( get_permalink() ) ); ?></p>
  <?php else : ?>
  <form action="<?php echo esc_attr(copallyt_get_option('siteurl')); ?>/wp-comments-post.php" method="post" id="commentform">
    <?php if ( is_user_logged_in() ) : ?>
    <p><?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'copallyt'), copallyt_get_option('siteurl'), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php echo esc_attr__('Log out of this account', 'copallyt'); ?>"><?php echo esc_html__('Log out &raquo;', 'copallyt'); ?></a></p>
    <?php else : ?>
    <p>
      <label for="author"><?php echo esc_html__('Name', 'copallyt'); if ($req) esc_html__(' *', 'copallyt'); ?></label>
      <input type="text" class="five" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>
    </p>
    <p>
      <label for="email"><?php echo esc_html__('email (will not be published)', 'copallyt'); if ($req) esc_html__(' *', 'copallyt'); ?></label>
      <input type="text" class="five" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>
    </p>
    <p>
      <label for="url"><?php echo esc_html__('Website', 'copallyt'); ?></label>
      <input type="text" class="five" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3">
    </p>
    <?php endif; ?>
    <p>
      <label for="comment"><?php echo esc_html__('Comment *', 'copallyt'); ?></label>
      <textarea name="comment" id="comment" tabindex="4" rows="5"></textarea>
    </p>
    <p id="allowed_tags" class="small"><strong>XHTML:</strong> <?php echo esc_html__('You can use these tags:','copallyt'); ?> <code><?php echo allowed_tags(); ?></code></p>
    <p><input name="submit" class="small radius button" type="submit" id="submit" tabindex="5" value="<?php echo esc_html__('Post Comment', 'copallyt'); ?>"></p>
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>
  </form>
  <?php endif; // If registration required and not logged in ?>
</section>
<?php endif; // if you delete this the sky will fall on your head ?>