<?php

/*

Template name: A-Z contraceptive

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



	<div id="primary" class="content-area <?php echo km_get_user_role(); ?>">

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



							<div><?php the_content(); ?></div>



						<?php $args = array( 'posts_per_page' => -1, 'post_type' => 'contraceptive', 'orderby' => 'title', 'order' => 'asc' );

							$the_query = new WP_Query( $args );

							while ( $the_query->have_posts() ) : $the_query->the_post(); ?>



							  <div class="contraceptive_clinic">



								<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>

								<p><?php echo do_shortcode('[gmw_post_address fields="formatted_address"]'); ?></p>



								<?php if( get_field('staff_member') ): ?>

								  <p><strong>Fitters:</strong>

								  <?php while(has_sub_field('staff_member')): ?>

									<div id="privacyNotice" class="<?php the_sub_field('are_you_happy_sharing_your_data'); ?><?php if( get_sub_field('checkboxes') ): ?> <?php echo implode(' ', get_sub_field('checkboxes')); ?><?php endif; ?>">

										<p>The information for this fitter is not available.</p>

									</div>

							  	  <span id="cc_Fitter" class="<?php the_sub_field('are_you_happy_sharing_your_data'); ?><?php if( get_sub_field('checkboxes') ): ?> <?php echo implode(' ', get_sub_field('checkboxes')); ?><?php endif; ?>">

						    		    <?php if( have_rows('fitter_information') ): ?>

								      	<?php while( have_rows('fitter_information') ): the_row(); ?>

											<?php if( have_rows('fitters_details') ): ?>

									  		<?php while( have_rows('fitters_details') ): the_row(); ?>

												<span class="comma"><?php the_sub_field('title'); ?> <?php the_sub_field('name_of_larc_fitter'); ?></span>

									  		<?php endwhile; ?>

											<?php endif; //if( get_sub_field('fitters_details') ): ?>

								      	<?php endwhile; ?>

								    	<?php endif; //if( get_sub_field('fitter_information') ): ?>

									</span>

								  <?php endwhile; ?>

								<?php endif; ?>

							  </div>



							<?php endwhile; wp_reset_postdata(); ?>



						</div>



						<?php endwhile; wp_reset_postdata(); ?>

						<div id="subpage_sidebar">

							<?php get_template_part('right-sidebar'); ?>

						</div>

					</div>

					

				</article><!-- #post -->





		</div><!-- #content -->

	</div><!-- #primary -->



<?php get_footer(); ?>