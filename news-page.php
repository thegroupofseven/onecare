<?php
/*
Template name: News overview
*/
?>

<?php
/**
 * The template for displaying the news overview page
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
			<?php while ( have_posts() ) : the_post(); ?>
				<header class="entry-header">
					<div class="subpage-entry-title">
						<div class="subpage-entry-title-header">
							<h2 class="single_post_subheader"><?php the_field('page_subheader'); ?></h2>
							<h1><?php the_title(); ?></h1>
						</div>
					</div>
				</header><!-- .entry-header -->
			<?php endwhile; ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div id="subpage_content_container">
						<div id="subpage_content" class="news_layout">
							<h2 class="underline"><?php the_field('content_subheader'); ?></h2>

							<div class="overview_news_content">
								<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									$args = array(
										'post_type'      => 'post',
										'order'          => 'DESC',
										'post_status'    => 'publish',
										'paged'          => $paged
									); 
									query_posts($args); ?>
								<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
								
								
 								<div class="news_post">
								<?php if (has_post_thumbnail( $post->ID ) ): ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
									<a href="<?php echo the_permalink(); ?>"><div class="custom-bg" style="background-image: url('<?php echo $image[0]; ?>');"></div></a>
								<?php endif; ?>
									<div class="news_info">
										<p class="news_date_overview"><strong><?php echo get_the_date('j F'); ?></strong></p>
										<h5><a href="<?php echo the_permalink(); ?>" style="color:#574759;"><?php echo get_the_title(); ?></a></h5>
										<p><?php 
												$content = get_the_content();
												$trimmed_content = wp_trim_words( $content, 27, '<a href="'. get_permalink() .'"> <br>Read more ></a>' );
												echo $trimmed_content;
											?></p>
									</div>
								</div>
								<?php endwhile; ?>
								<?php numeric_posts_nav(); ?>
								<?php else : ?>
								<!-- No posts found -->
								<?php endif; wp_reset_query(); ?>
							</div>
							
						</div>

						<div id="subpage_sidebar">
							<h2 class="underline">Twitter</h2>
								<div class="twitter_widget"> 
									<?php echo do_shortcode( '[twitter-widget username="onecaretweets" items=2 dateFormat="d F Y"]' ); ?>
								</div>
						</div>
					</div>
				</article><!-- #post -->
						
		</div><!-- #content -->
	</div><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>