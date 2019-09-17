<?php
/*
Template name: Services
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
								<h1><?php the_title(); ?></h1>
							</div>
						</div>
						
						
					</header><!-- .entry-header -->

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				

					<div id="subpage_content_container">
						<?php get_sidebar(); ?>
						<div id="subpage_content">
								<h2 class="underline"><?php the_field('content_subheader'); ?></h2>

								<!--<div class="sfc_service_title" style="background: #574759"><p>Overview</p></div>
								<div class="sfc_service_description">
									<div class="toggler">
 										<div class="blup" style="display: block;">--><?php the_field('page_content'); ?><!--</div>
										<img src="/wp-content/themes/twentythirteen-child-01/images/downwards_arrow.png" alt="downward arrow" class="toggler_downwards_arrow" width="20">
									</div>
								</div>-->

								<?php if(get_field('services')): ?>
							      	  <?php while(the_repeater_field('services')): ?>
									<div class="sfc_service">
									 <div class="sfc_service_title" style="background: <?php the_sub_field('service_colour'); ?>">
										<p><?php the_sub_field('title'); ?></p>
									 </div>
									 <div class="sfc_service_description">
										<div class="toggler">
 									   		<div class="blup"><?php the_sub_field('description'); ?></div>
											<img src="/wp-content/themes/twentythirteen-child-01/images/downwards_arrow.png" alt="downward arrow" alt="downward arrow" class="toggler_downwards_arrow" width="20">
										</div>
								 	 </div>
									</div>

							      	 <?php endwhile; ?>
					      		    	<?php endif; ?>

								<script>
									$(function() {
									    $('.toggler').click(function() {
									        $(this).find('.blup').slideToggle();
									    });
									});
								</script>

								<?php the_content(); ?>
						</div>

						<div id="subpage_sidebar">
							<?php get_template_part('sidebar-patient-news'); ?>
						</div>

					</div>
					
				</article><!-- #post -->

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>