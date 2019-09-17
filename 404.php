<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div id="subpage_content_container">
					<?php get_sidebar(); ?>
					<div id="subpage_content">
						<header class="page-header">
							<h1 class="page-title"><?php _e( '', 'twentythirteen' ); ?></h1>
						</header>
						<h2>Hello there, I'm afraid there is no content on this page</h2>
						<p>You might want to try heading back to the homepage or trying a search...</p>
						<?php get_search_form(); ?>
					</div><!-- #subpage_content -->
					<div id="subpage_sidebar">
						<?php get_template_part('right-sidebar'); ?>
					</div>
				</div><!-- #subpage_content_container -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>