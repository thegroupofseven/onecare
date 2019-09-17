<?php 
/*
Template name: Members
*/
?>

<?php
/**
 * The template for displaying the protected members page
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
							<div class="entry-content_members">
							<div id="logged-in-info">
								<h6>These pages contain information for all wave one members of One Care.</h6>
								<p>Please email enquiries@onecareconsortium.co.uk if you have any log on queries or have forgotten your password.</p>
							</div>

								<?php the_content(); ?>
								<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
							</div><!-- .entry-content_members -->
						</div>

						<div id="subpage_sidebar">
							<?php get_template_part('right-sidebar'); ?>
						</div>
					</div>
					
				</article><!-- #post -->

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>