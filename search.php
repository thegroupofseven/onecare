<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

					<header class="entry-header">
						<div class="subpage-entry-title">
							<div class="subpage-entry-title-header">
								<h2><?php printf( __( 'Search Results for:', 'twentythirteen' ), get_search_query() ); ?></h2>
								<h1><?php printf( __( ' %s', 'twentythirteen' ), get_search_query() ); ?>
							</div>
						</div>
					</header><!-- .entry-header -->

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div id="subpage_content_container">
						<?php get_sidebar(); ?>
						<div id="subpage_content">
							<?php /* The loop */ ?>
							  <?php while ( have_posts() ) : the_post(); ?>
							    <div class="search_result">
								<h1 class="search_results_title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h1>
								<p><?php the_content(); ?> <?php the_field('page_content'); ?></p>
								<p class="results_read_more"><a href="<?php echo the_permalink(); ?>">Read more ></a></p>
							    </div>
							  <?php endwhile; ?>
							<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
						</div>
					<?php endif; ?>
					<?php twentythirteen_paging_nav(); ?>
					</div>

					<div id="subpage_sidebar">
						<?php get_template_part('right-sidebar'); ?>
					</div>
				</article>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>