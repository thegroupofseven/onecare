<?php 
/*
Template name: Search postcode results
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

					<header class="entry-header">
						<div class="subpage-entry-title">
							<div class="subpage-entry-title-header">
								<h2 class="single_post_subheader"><?php the_field('page_subheader'); ?></h2>
								<h1><?php the_title(); ?></h1>
								<button class="sub_menu_button"></button>
							</div>
						</div>
					</header><!-- .entry-header -->

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div id="subpage_content_container">
						<?php get_sidebar(); ?>
						<div id="subpage_content">
							<h2 class="underline"><?php the_field('content_subheader'); ?></h2>
							<p><?php the_field('page_content'); ?></p>
							<?php the_content(); ?>
							
						</div>

			<?php endwhile; ?>

						<div id="subpage_sidebar">
							<?php get_template_part('right-sidebar'); ?>
						</div>

					</div>
					
				</article><!-- #post -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>