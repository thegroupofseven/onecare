<?php
/*
Template name: Information for patients
*/
?>

<?php get_header(); ?>

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
							<h2 class="underline">
								<?php the_field('content_subheader'); ?>
							</h2>

							<?php the_field('content_1'); ?>
								  <?php if(get_field('testimonial_1')): ?>
									<?php while(has_sub_field('testimonial_1')): ?>
							<div class="ifp_testimonial <?php the_sub_field('left_or_right'); ?>">
								<div class="ifp_quote <?php the_sub_field('left_or_right'); ?>">
										<?php the_sub_field('copy'); ?>
								</div>
								<div class="ifp_illustration">
									<img src="<?php the_sub_field('illustration'); ?>" alt="illustration" width="157">
								</div>
									<?php endwhile; ?>
								  <?php endif; ?>
							</div>

							<div id="subpage_content_2">
								<img src="/wp-content/themes/twentythirteen-child-01/images/what_is_one_care_image.png" alt="What is One Care?" width="460" class="ifp_one_care_image">
							  <div id="subpage_content_2_copy">
								<?php if(get_field('content_2')): ?>
	  							  <?php while(the_repeater_field('content_2')): ?>

									<p class="ifp_services_overview"><?php the_sub_field('services_overview'); ?></p>

									<?php if( have_rows('services') ): ?>
									  <?php while( have_rows('services') ): the_row(); ?>

									    <div class="ifp_service">
										<div class="ifp_service_icon">
											<img src="<?php the_sub_field('icon'); ?>" alt="<?php the_sub_field('title'); ?>" width="45">
										</div><!-- .ifp_service_icon -->
										<div class="ifp_service_copy">
											<p class="no_margin"><strong><?php the_sub_field('title'); ?></strong></p>
											<p><?php the_sub_field('description'); ?></p>
										</div><!-- .ifp_service_copy -->
									    </div><!-- .ifp_service -->

									  <?php endwhile; ?>
									<?php endif; //if( get_sub_field('services') ): ?>

								  <?php endwhile; // while( has_sub_field('content_2') ): ?>
								<?php endif; // if( get_field('content_2') ): ?>
							  </div><!-- #subpage_content_2_copy -->
							</div><!-- #subpage_content_2 -->
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