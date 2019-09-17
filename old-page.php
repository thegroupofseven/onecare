<?php 
/*
Template name: Old default
*/
?>
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<h1 class="entry-title"><?php the_title(); ?>
						<p class="white subheader"><?php the_field('page_subheader'); ?></p>
						</h1>
						
					</header><!-- .entry-header -->

					<div id="subpage_content_container">
						<div id="subpage_content">
							<h2 class="underline"><?php the_field('content_subheader'); ?></h2>
							<p><?php the_field('page_content'); ?></p>
						</div>

						<div id="subpage_sidebar">
							<h2 class="underline">Latest news</h2>

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

						</div>

					</div>


					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->

					
				</article><!-- #post -->

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>