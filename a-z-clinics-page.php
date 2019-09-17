<?php 
/*
Template name: A-Z of Clinics
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
							<!-- <p><?php the_content(''); ?></p> -->
							
							<!-- find your nearest A-Z -->

							
							<?php
								$args=array(
								'orderby' => 'title',
								'order' => 'ASC',
								'post_type' => 'find_your_nearest',
								'post_status' => 'publish',
								'offset' => 1,
								'caller_get_posts'=> 1,
								'posts_per_page' => 1
								);
								$my_query = null;
								$my_query = new WP_Query($args);
								if( $my_query->have_posts() ) {
									while ($my_query->have_posts()) : $my_query->the_post(); ?>

								<?php 
								$letter=' '; 
								query_posts( array ( 'orderby' => 'title', 'order' => 'ASC', 'post_type' => 'find_your_nearest', 'post_status' => 'publish', 'offset' => 1, 'caller_get_posts'=> 1, 'posts_per_page' => -1) );
								if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   
        								<?php 
        									$title=get_the_title(); 
        									$initial=strtoupper(substr($title,0,1));
        									if($initial!=$letter)
         									{
          									echo "<h7>$initial</h7>";
          									$letter=$initial;
          									}
        
        									?>
  										<div class="a_z_entry">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>, <?php the_field('address'); ?>
										</div>
								
								<?php endwhile; endif; wp_reset_query(); ?>	
								<?php endwhile;  } wp_reset_query();  // Restore global post data stomped by the_post(). ?>

							<!-- End of Find your nearest clinic -->

						</div>

						<div id="subpage_sidebar">
							<?php get_template_part('right-sidebar'); ?>
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