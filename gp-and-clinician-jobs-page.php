<?php
/*
Template name: GP and Clinician jobs
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
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<div class="subpage-entry-title" style="background: url('/wp-content/uploads/2014/10/banner-background.png') <?php the_field('header_background_colour'); ?>; background-position: center; background-repeat: no-repeat;">
							<div class="subpage-entry-title-header" style="background: url(<?php the_field('header_background_image'); ?>)">
								<h1 style="line-height:1;"><?php the_title(); ?></h1>
							</div>
						</div>
						
					</header><!-- .entry-header -->

					<div id="subpage_content_container">
						<div id="subpage_content">
							<h2 class="underline">Positions available</h2>
							<!-- <h2 class="underline"><?php the_field('content_subheader'); ?></h2> -->

							<!-- NEWS PHP -->
							
							<div class="overview_news_content">

								<?php the_content() ?>
							<div id="job_posts_overview">
								<div style="width:100%;height:1px;background:#574759;margin-bottom:20px;"></div>

								<?php $cat_id = 1; //the certain category ID
								$latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
								if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?>
 
								<?php
									query_posts( array( 'post_type' => 'gp-jobs', 'admin' => 'gp-jobs' ) );
									if ( have_posts() ) : while ( have_posts() ) : the_post();
								?>

  								<p class="job_overview"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></p>
								<p class="job_overview"><?php the_field('salary'); ?></p>
								<?php echo custom_field_excerpt(); ?><a href="<?php echo the_permalink(); ?>" class="read_more see_job">Full job description ></a>


								<?php endwhile; endif; wp_reset_query(); ?>
								<?php endwhile; endif; ?> 
							</div>
								
								
								

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