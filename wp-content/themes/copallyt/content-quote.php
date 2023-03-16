<article>
    <div class="post-box">

        <div class="post-body-container">
            <div class="quote-format">
                <blockquote>
                    <?php the_excerpt() ?>
                </blockquote>
                <div class="author">
                    <?php echo esc_html__('Post By : ', 'copallyt') ?>
                    <span><?php the_author(); ?></span>
                </div>
            </div>
        </div>
    </div>
</article>