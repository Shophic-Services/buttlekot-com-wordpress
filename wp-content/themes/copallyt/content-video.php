<article>
										<h2 class="node-title" datatype="" property="dc:title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
										<div>
									<?php $copallyt_video_type = get_post_meta(get_the_ID(), "video_type", true);?>
									
									<?php if($copallyt_video_type == "youtube") { ?>
										
										<iframe src="<?php echo get_post_meta(get_the_ID(), "wd_youtube_link", true);  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
									
									<?php } else if ($copallyt_video_type == "vimeo"){ ?>
										
										<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta(get_the_ID(), "wd_vimeo_id", true);  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
									
									<?php } else if ($copallyt_video_type == "self_hosted"){ ?>
										
										
										<video
							        controls preload="auto" width="723" height="287" >
							       <source src="<?php echo get_post_meta(get_the_ID(), "wd_video_mp4", true) ?>" type='video/mp4' />
							       <source src="<?php echo get_post_meta(get_the_ID(), "wd_video_webm", true)?>" type='video/webm' />
							       <source src="<?php echo get_post_meta(get_the_ID(), "wd_video_ogv", true);  ?>" type='video/ogg' />
							       
							      </video>
										
								<?php } ?>
										</div>
										<div class="body text-secondary">
											<?php echo wp_trim_words(get_the_content(),100); ?>
										</div>
</article>