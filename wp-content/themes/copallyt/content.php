<article>
  <div>
    <?php the_post_thumbnail('copallyt_blog-thumb'); ?>
  </div>

  <header>
    <h2 class="node-title" datatype="" property="dc:title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
    <ul class="post-infos clearfix">
      <li><?php echo get_the_date(); ?></li>
      <li><?php echo esc_html__('By:','copallyt');  the_author() ?></li>
      <li><?php echo esc_html__('Category:','copallyt');   the_category(', '); ?></li>
      <li class="comment-count"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></li>
    </ul>
  </header>

  <div class="body text-secondary">
    <p><?php echo wp_trim_words(get_the_content(),60); ?></p>
  </div>
  <div class="read-more"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html__('Read More', 'copallyt'); ?></a></div>
</article>