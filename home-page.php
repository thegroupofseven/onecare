<?php
/*
Template name: Home (V1)
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

<style>#main_header_container {height:123px;}</style>

	<div id="homepage_slider">
		<?php echo get_new_royalslider(4); ?>
	</div>

	<div id="homepage_mobile_slider_replacement">
		<h2 class="mobile_tagline">Developing integrated and responsive 24/7 GP access</h2>
	</div>

	<div id="primary" class="content-area">
		<div id="content" class="site-content homepage_content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="homepage_content_block_1_container">
					<div id="homepage_content_block_1">
						<div class="homepage_content_block_two_column">
							<h2 class="underline"><?php the_field('main_title'); ?></h2>
							<div class="homepage_content_block_two_column_quarter">
								<img src="<?php the_field('what_is_one_care_image'); ?>" alt="one care" class="what_is_one_care_image" />
							</div>
							<div class="homepage_content_block_two_column_quarter second_column">
								<?php the_field('what_is_one_care'); ?>
							</div>
						</div>
						<div class="homepage_content_block_two_column no_margin column_padding">
							<h2 class="underline">Key benefits</h2>
							<?php get_template_part('icons'); ?>
						</div>
					</div>
				</div>
				<div id="homepage_content_block_2_container">
					<div id="homepage_content_block_2">
						<div class="homepage_content_block_three_column">
							<h2 class="underline_three_column">Information for practices</h2>
							<img src="<?php the_field('information_for_practices_image'); ?>" alt="Information for practices" class="image_border_radius three_column_image" onerror="this.onerror=null;this.src='/wp-content/uploads/2014/11/information-for-patients.png';">
							<?php the_field('information_for_practices'); ?>
							
						</div>
						<div class="homepage_content_block_three_column">
							<h2 class="underline_three_column">Work with us</h2>
							<img src="<?php the_field('work_with_us_image'); ?>" alt="Work with us" class="image_border_radius three_column_image" onerror="this.onerror=null;this.src='wp-content/uploads/2014/11/work-with-us.png';">
							<?php the_field('work_with_us'); ?>
						</div>
						<div class="homepage_content_block_three_column">
							<h2 class="underline_three_column">Latest news</h2>
							<?php $cat_id = 1; //the certain category ID
								$latest_cat_post = new WP_Query( array('posts_per_page' => 3, 'category__in' => array($cat_id)));
								if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?> 
							<div class="news_content_block">
								<div class="news_image">

								<?php if (has_post_thumbnail( $post->ID ) ): ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
									<a href="<?php echo get_permalink(); ?>">
										<div class="news_image_background" style="background-image: url('<?php echo $image[0]; ?>')">
										</div>
									</a>
								<?php endif; ?>
								</div>
							
							<div class="news_content">
								<p class="news_date">
									<?php echo get_the_date('j F'); ?>
								</p>
								<p><?php 
										$content = get_the_content();
										$trimmed_content = wp_trim_words( $content, 13, '<a href="'. get_permalink() .'"> <br>Read more ></a>' );
										echo $trimmed_content;

								?></p>
								</div></div>
								<?php endwhile; endif; ?>
							
							
						</div>
					</div>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

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