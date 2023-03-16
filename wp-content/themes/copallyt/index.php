<?php get_header();  ?>
    <section class="titlebar ">
    	<div class="row">
    		<div class="box">
    			<h1 id="page-title" class="title">
                    <?php
                    if(copallyt_is_blog()){
                        $copallyt_blog_id = get_option('page_for_posts');
                        if($copallyt_blog_id == false) {
							if (!is_archive()) {
								echo esc_html__('Blog', 'copallyt');
							} elseif (is_category()) {
								echo esc_html__('Category Archives', 'copallyt');
								echo "  " . strip_tags(category_description());
							} elseif (is_tag()) {
								echo esc_html__('Tag Archives', 'copallyt');
							} elseif (is_year()) {
								echo esc_html__('Yearly Archives', 'copallyt');
							} elseif (is_month()) {
								echo esc_html__('Monthly Archives', 'copallyt');
							} elseif (is_date()) {
								echo esc_html__('Daily Archives', 'copallyt');
							} elseif (is_author()) {
								echo esc_html__('Author Archives', 'copallyt');
							}
						}else {
							echo get_the_title($copallyt_blog_id);
						}
					}else{
						the_title();
					}

                    ?>
                </h1>
    		</div>
    		<div class="breadcrumb_box">
    			<?php copallyt_breadcrumb(); ?>
    		</div>
    	</div>
    </section>
    <!-- content  -->
    <main class="row l-main">
      <div class="large-8 main columns blog-post-listing">
        <div class="blog-post">
          <!-- loop ... -->
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post();

              ?>
              <div <?php post_class(); ?>>
               
                  <div class="blog-posts">

                    <?php get_template_part('content', get_post_format()); ?>


                  </div>
                
              </div>
            <?php endwhile;
          endif;


          if (comments_open()) {
            comments_template('', true);
          }
          ?>
          <!-- /loop.. ********-->
        </div>
        <!-- Pagination -->
        <div class="wd-pagination">
          <?php echo paginate_links(); ?>
        </div>
        <!-- /Pagination -->
      </div>
      <?php get_sidebar(); ?>
    </main>
    <!-- /content  -->

<?php get_footer();