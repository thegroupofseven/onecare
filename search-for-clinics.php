<?php
/*
Template name: Search for clinics
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
							<div id="search_buttons">
								<h2 class="underline"><?php the_field('content_subheader'); ?></h2>

								<div class="sfc_service_title" style="background: #574759"><p>Overview</p></div>
								<div class="sfc_service_description">
									<div class="toggler">
 										<div class="blup"><?php the_field('page_content'); ?></div>
										<img src="/wp-content/uploads/2015/08/downwards_arrow.png" alt="downward arrow" class="toggler_downwards_arrow" width="20">
									</div>
								</div>

								<?php if(get_field('services')): ?>
							      	  <?php while(the_repeater_field('services')): ?>
									<div class="sfc_service">
									 <div class="sfc_service_title" style="background: <?php the_sub_field('service_colour'); ?>">
										<p><?php the_sub_field('title'); ?></p>
									 </div>
									 <div class="sfc_service_description">
										<div class="toggler">
 									   		<div class="blup"><?php the_sub_field('description'); ?></div>
											<img src="/wp-content/uploads/2015/08/downwards_arrow.png" alt="downward arrow" class="toggler_downwards_arrow" width="20">
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

								<!-- search results code -->

								<p>Over 70 practices in the area are now part of One Care. You can see if your practice is a member by using the search bar below. Simply enter the name of your practice, or your postcode, to find out.</p>

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
								<?php the_content(); ?>
						</div>

						<div id="subpage_sidebar">
							<h2 class="underline">Latest news</h2>

							<!-- NEWS PHP -->

							
							
							<?php $cat_id = 1; //the certain category ID
								$latest_cat_post = new WP_Query( array('posts_per_page' => 2, 'category__in' => array($cat_id)));
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

							<div class="news_content_sidebar">
															<p class="news_date">
									<?php echo get_the_date('j F'); ?>
								</p>
								<p><?php 
										$content = get_the_content();
										$trimmed_content = wp_trim_words( $content, 13, '<a href="'. get_permalink() .'"> <br>Read more ></a>' );
										echo $trimmed_content;

								?></p>
								</div>
							</div>
								<?php endwhile; endif; ?> 
							
							<!-- End of NEWS PHP -->
							
							<h2 class="underline">Twitter</h2>

								<div class="twitter_widget"> 
									<?php echo do_shortcode( '[twitter-widget username="onecaretweets" items=2 dateFormat="d F Y"]' ); ?>
								</div>

						</div>

					</div>


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