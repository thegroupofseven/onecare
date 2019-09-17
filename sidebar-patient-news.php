<h2 class="underline">News for our patients</h2>

	<!-- NEWS PHP -->
	<?php $cat_id = 1; //the certain category ID
		$latest_cat_post = new WP_Query( array('posts_per_page' => 2, 'category__in' => array($cat_id)));
		if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?> 

							<div class="news_content_block">
								<div class="news_image">

								<?php if (has_post_thumbnail( $post->ID ) ): ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
									<a href="<?php echo get_permalink(); ?>">
										<div class="news_image_background" style="background-image: url('<?php echo $image[0]; ?>')">
										</div>
									</a>
								<?php endif; ?>
								</div>

							<div class="news_content_sidebar">
															<p class="news_date">
									<?php echo get_the_date('j F'); ?>
								</p>
								<p><?php 
										$content = get_the_content();
										$trimmed_content = wp_trim_words( $content, 13, '<a href="'. get_permalink() .'"> <br>Read more ></a>' );
										echo $trimmed_content;

								?></p>
								</div>
							</div>
								<?php endwhile; endif; ?> 
							
							<!-- End of NEWS PHP -->
							
							<h2 class="underline">Twitter</h2>

								<div class="twitter_widget"> 
									<?php echo do_shortcode( '[twitter-widget username="onecaretweets" items=2 dateFormat="d F Y"]' ); ?>
								</div>
