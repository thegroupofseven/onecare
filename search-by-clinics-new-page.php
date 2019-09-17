<?php
/*
Template name: New - Search for clinics
*/
?>

<?php
/**
 * The template for displaying search for clinic pages
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
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<div class="subpage-entry-title" style="background: url('/wp-content/uploads/2014/10/banner-background.png') <?php the_field('header_background_colour'); ?>; background-position: center; background-repeat: no-repeat;">
							<div class="subpage-entry-title-header" style="background: url(<?php the_field('header_background_image'); ?>)">
								<h2 class="single_post_subheader"><?php the_field('page_subheader'); ?></h2>
								<h1 style="line-height:1;"><?php the_title(); ?></h1>
							</div>
						</div>
						
						
					</header><!-- .entry-header -->

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				

					<div id="subpage_content_container">
						<div id="subpage_content">

								<h2 class="underline"><?php the_field('content_subheader'); ?></h2>

								<?php the_content(); ?>

								<!-- search results code -->

								<?php the_field('page_content'); ?>

								<div class="search_by_name_title">	
									<p>Surgery name</p>
								</div>
								<div class="search_by_postcode_title">	
									<p>Postcode</p>
								</div>

								<div class="search_by_name">
									<!-- <?php get_search_form('home-page'); ?> -->
									<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
								</div>

								<div class="search_by_postcode">
									<?php echo do_shortcode('[FYN_searchform]'); ?>
								</div>
								<!-- end of SR code -->
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