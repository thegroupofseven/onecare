<?php

/*

Template name: Home (V2)

*/

?>



<?php

/**

 * The template for displaying the homepage

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



	<div id="homepage_slider">

	  <div id="homepage_slider_boxes">

		<div class="container">

			<?php if(get_field('hero_image')): ?>

			  <?php while(has_sub_field('hero_image')): ?>

				<p><strong><?php the_sub_field('subheader'); ?></strong></p>

				<h2><?php the_sub_field('header'); ?></h2>

				<div class="slide_text_2"><?php the_sub_field('copy'); ?></div>

				<a href="<?php the_sub_field('link'); ?>" class="read_more">Read more ></a>

				<div id="slide_image">

					<img src="/wp-content/uploads/2017/06/OC_map_V05_DP_01062017.png" alt="One Care logo in a speech bubble">

				</div>

			  <?php endwhile; ?>

			<?php endif; ?>

		</div>

	  </div>

	</div>



	<div id="primary" class="content-area">

		<div id="content" class="site-content homepage_content" role="main">



			<?php /* The loop */ ?>

			<?php while ( have_posts() ) : the_post(); ?>



				<div id="hp_container_1">

				  <div class="container">

				    <div class="inline_block">

					<div class="three_column">

					<?php if(get_field('about_us')): ?>

					  <?php while(has_sub_field('about_us')): ?>

						<h2 class="underline"><?php the_sub_field('heading'); ?></h2>

						<img src="/wp-content/uploads/2016/10/Website-illustrations_1.png" width="403" alt="About One Care" />

						<p><?php the_sub_field('copy'); ?> <a href="<?php the_sub_field('link'); ?>">Read more ></a></p>

					  <?php endwhile; ?>

					<?php endif; ?>



					</div><!-- .three_column -->

					<div class="three_column">

					<?php if(get_field('what_we_offer')): ?>

					  <?php while(has_sub_field('what_we_offer')): ?>

						<h2 class="underline"><?php the_sub_field('heading'); ?></h2>

						<img src="/wp-content/uploads/2016/10/Website-illustrations_2.png" width="403" alt="What we offer at One Care" />

						<p><?php the_sub_field('copy'); ?> <a href="<?php the_sub_field('link'); ?>">Read more ></a></p>

					  <?php endwhile; ?>

					<?php endif; ?>

					</div><!-- .three_column -->

					<div class="three_column">





	<h2 class="underline">Latest News</h2>

	<?php $cat_id = 1; //the certain category ID

	  $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));

	    if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?> 

		<div class="news_content_block">

			<a href="<?php echo get_permalink(); ?>">

			<div class="news_image_home"></div>

			<div class="news_content_home">

				<h2 class="news_title_home"><?php echo get_the_title(); ?></h2></a>

				<p class="news_date"><?php echo get_the_date('d F Y'); ?></p>

				<p><?php $content = get_the_content(); $trimmed_content = wp_trim_words( $content, 35, '<a href="'. get_permalink() .'"> <br> <br> Read more ></a>' ); echo $trimmed_content; ?></p>

			</div>

		</div><!-- #homepage_content_first_column_thirds -->

	  <?php endwhile; endif; ?>

	<?php wp_reset_query(); ?>

					</div><!-- .three_column -->

				    </div><!-- .inline_block -->

				  </div><!-- .container -->

				</div><!-- #hp_container_1 -->





				<!-- <div id="homepage_content_block_1_container">

					<div id="homepage_content_block_2">

					</div>

				</div> -->

				<div id="homepage_map">

					<?php echo do_shortcode('[gmw_global_map form="1"]'); ?>

				</div>



				<div id="homepage_content_block_1_container">

					<div id="homepage_content_block_2">

						<?php get_template_part('home-page-new'); ?>

					</div>

				</div>



				<!-- <div id="homepage_content_block_2_container">

					<div id="homepage_content_block_2">

						<div class="homepage_content_block_three_column">

							<h2 class="underline_three_column">Information for practices</h2>

							<img src="<?php the_field('information_for_practices_image'); ?>" alt="Information for practices" class="image_border_radius three_column_image" onerror="this.onerror=null;this.src='/wp-content/uploads/2014/11/information-for-patients.png';">

							<?php the_field('information_for_practices'); ?>

							

						</div>

						<div class="homepage_content_block_three_column">

							<h2 class="underline_three_column">Information for patients</h2>

							<img src="<?php the_field('work_with_us_image'); ?>" alt="Information for patients" class="image_border_radius three_column_image" onerror="this.onerror=null;this.src='wp-content/uploads/2014/11/work-with-us.png';">

							<?php the_field('work_with_us'); ?>

						</div>

						<div class="homepage_content_block_three_column">

							<h2 class="underline_three_column"><?php the_field('main_title'); ?></h2>

							<img src="<?php the_field('what_is_one_care_image'); ?>" alt="one care" class="what_is_one_care_image" />

							<?php the_field('what_is_one_care'); ?>

						</div>

					</div>

				</div> -->



				</article><!-- #post -->



			<?php endwhile; ?> 



		</div><!-- #content -->

	</div><!-- #primary -->



<?php get_sidebar(); ?>

<?php get_footer(); ?>