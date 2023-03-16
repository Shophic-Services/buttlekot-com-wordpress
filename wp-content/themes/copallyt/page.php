<?php get_header();

if (!(is_front_page())) {
  if (get_post_meta(get_the_ID(), 'wd_page_show_title_area', true) != 'no') { ?>
    <section class="titlebar ">
      <div class="row">
        <div class="box">
          <?php
          if (get_post_meta(get_the_ID(), 'wd_page_show_title', true) != 'no'):
            ?>
            <h1 id="page-title"
                class="title <?php echo 'text-' . get_post_meta(get_the_ID(), 'wd_page_title_position', true) ?>"><?php the_title(); ?></h1>
            <?php
          endif;
          ?>
        </div>
        <div class="breadcrumb_box">
          <?php copallyt_breadcrumb(); ?>
        </div>
      </div>
    </section>
    <?php
  }
} ?>

  <!-- content  -->
  <main class="l-main row">
    <div class="main large-12 columns">
      <?php if (have_posts()) :
        while (have_posts()) : the_post(); ?>
          <article>
            <div class="body field clearfix ">
              <?php the_content(); ?>
            </div>
            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'copallyt' ), 'after' => '</div>' ) ); ?>
          </article>


          <?php
          if (comments_open() && !is_front_page()) {
            comments_template('', true);
          } ?>

        <?php endwhile;
      endif; ?>

    </div>
  </main>
  <!-- /content  -->

<?php get_footer(); ?>