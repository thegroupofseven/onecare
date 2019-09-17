<?php /* Template name: Home (V2) */ 

 /*
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
					<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2017/06/OC_map_V05_DP_01062017.png" alt="One Care logo in a speech bubble">
				</div>
			  <?php endwhile; ?>
			<?php endif; ?>
		  </div>
	  </div>
	</div>
<?php while ( have_posts() ) : the_post(); ?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content homepage_content" role="main">
				<div id="homepage_map">
					<?php echo do_shortcode('[gmw_global_map form="1"]'); ?>
				</div>
		</div>
	</div>
<?php endwhile; ?>

<?php wp_reset_query(); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>