<article>
  		<div>
  		 <i class="fa fa-image"></i>
	  		<ul class="wd-gallery-images-holder clearfix">
	  			<?php $portfolio_image_gallery_val = get_post_meta($post -> ID, 'wd_portfolio-image-gallery', true);
				if ($portfolio_image_gallery_val != '')
					$portfolio_image_gallery_array = explode(',', $portfolio_image_gallery_val);
						if (isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array) != 0) :
							foreach ($portfolio_image_gallery_array as $gimg_id) :
							$gimage_wp = wp_get_attachment_image_src($gimg_id, 'copallyt_blog-thumb', true);
							echo '<li class="wd-gallery-image-holder"><img src="' . esc_url($gimage_wp[0]) . ' " alt= "'.get_the_title().'"/></li>';
							endforeach;
						endif;
	  			?>
	  		</ul>
  		</div>
	<header>
		<h2 class="node-title" datatype="" property="dc:title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
		<ul class="post-infos clearfix">
			<li><?php echo get_the_date(); ?></li>
			<li><?php echo esc_html__('By:','copallyt');  the_author() ?></li>
			<li><?php echo esc_html__('Category:','copallyt');  the_category(', '); ?></li>
			<li class="comment-count"><?php comments_number( '0', '1', '% responses' ); echo esc_html__(' comment', 'copallyt') ?></li>
		</ul>
	</header>
	<div class="body text-secondary">
		<p><?php echo wp_trim_words(get_the_content(),60); ?></p>
	</div>
	<div class="read-more"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html__('Read More', 'copallyt'); ?></a></div>
</article>