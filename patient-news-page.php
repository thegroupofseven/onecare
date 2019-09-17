<?php
/*
Template name: Patient news
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

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<div class="subpage-entry-title">
							<div class="subpage-entry-title-header">
								<h2 class="single_post_subheader"><?php the_field('page_subheader'); ?></h2>
								<h1><?php the_title(); ?></h1>
								<button class="sub_menu_button"></button>
							</div>
						</div>
					</header><!-- .entry-header -->

					<div id="subpage_content_container">
						<?php get_sidebar(); ?>
						<div id="subpage_content">
							<h2 class="underline"><?php the_field('content_subheader'); ?></h2>

							<!-- NEWS PHP -->
							
							<div class="overview_news_content">
							  <?php 
							   query_posts(array( 
								'taxonomy'=>'category',
							  	'cat' => 25,
							  	'post_type' => 'patientnews',
							  	'showposts' => -1
							  	) );  
							  ?>
							  <?php while (have_posts()) : the_post(); ?>

								<?php if (has_post_thumbnail( $post->ID ) ): ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
									<div id="custom-bg" style="border-radius:2px; margin:0 20px 30px 0; height: 102px; width: 102px; background-size: cover; float: left; background-image: url('<?php echo $image[0]; ?>');">
									</div>
								<?php endif; ?>

								<div class="news_info">
									<p class="news_date_overview">
										<?php echo get_the_date('j F'); ?>
									</p>
									<p class="news_date" style="margin:0 0 10px;font-weight:normal;">
										<a href="<?php echo the_permalink(); ?>" style="color:#574759;"><?php echo get_the_title(); ?></a>
									</p>
									<p>
										<?php 
											$content = get_the_content();
											$trimmed_content = wp_trim_words( $content, 27, '<a href="'. get_permalink() .'"> <br>Read more ></a>' );
											echo $trimmed_content;
										?>
									</p>
								</div>
														
							  

							  <?php endwhile;?>
							  <?php wp_reset_query(); ?>

							</div>
							
							<!-- End of NEWS PHP -->
						</div>

						<div id="subpage_sidebar">
							
							
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