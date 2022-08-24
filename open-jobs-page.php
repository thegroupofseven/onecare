<?php
/*
Template name: Open jobs
*/
?>

<?php
/**
 * The template for displaying the available jobs
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header();

$active_location = isset($_GET['job_location']) ? $_GET['job_location'] : false;
$active_field = isset($_GET['job_field']) ? $_GET['job_field'] : false;
$openJobsLocationQuery = $active_location ? [
	'taxonomy' => 'job_location',
	'field' => 'slug',
	'terms' => $active_location,
] : [];
$openJobsFieldQuery = $active_field ? [
	'taxonomy' => 'job_field',
	'field' => 'slug',
	'terms' => $active_field,
] : [];
$openJobsQueryArgs = [
	'post_type' => 'open_jobs',
	'posts_per_page' => -1,
];
if (!empty($openJobsLocationQuery) || !empty($openJobsFieldQuery)) {
	$openJobsQueryArgs['tax_query'] = [
		'relation' => 'AND',
	];
}
if (!empty($openJobsLocationQuery)) {
	$openJobsQueryArgs['tax_query'][] = $openJobsLocationQuery;
}
if (!empty($openJobsFieldQuery)) {
	$openJobsQueryArgs['tax_query'][] = $openJobsFieldQuery;
}
$openJobsQuery = new WP_Query($openJobsQueryArgs);

$locations = get_terms([
	'taxonomy' => 'job_location',
	'hide_empty' => false,
]);
$fields = get_terms([
	'taxonomy' => 'job_field',
	'hide_empty' => false,
]);

$currentLink = get_the_permalink();
$today = date('Y-m-d');

?>

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
							<h2 class="underline"><?php the_field('content_subheader'); ?></h2>
							<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
							<div class="entry-thumbnail">
								<?php the_post_thumbnail(); ?>
							</div>
							<?php endif; ?>
							<div><?php the_field('page_content'); ?></div>
							<?php
								if ($locations || $fields) { ?>
									<div class="open-jobs-filter">
										<?php
											if ($locations) { ?>
												<div class="open-jobs-filter__button-wrapper">
													<?php
														if (!$active_location) { ?>
															<button class="open-jobs-filter__button open-jobs-filter__button--button open-jobs-filter__button--placeholder"><?php _e( 'Location', 'twentythirteen' ); ?></button>
														<?php } else {
															$linkParams = $_GET;
															$linkParams['job_location'] = null;
															?>
															<a href="<?php echo modify_url_query($currentLink, $linkParams); ?>" class="open-jobs-filter__button open-jobs-filter__button--clear open-jobs-filter__button--link"><?php _e( 'Clear selection', 'twentythirteen' ); ?></a>
														<?php }
														foreach ($locations as $location) {
															if (($location->slug === $active_location)) { ?>
																<button class="open-jobs-filter__button open-jobs-filter__button--button"><?php echo $location->name; ?></button>
															<?php } else {
																$linkParams = $_GET;
																$linkParams['job_location'] = $location->slug;
																?>
																<a href="<?php echo modify_url_query($currentLink, $linkParams); ?>" class="open-jobs-filter__button open-jobs-filter__button--link"><?php echo $location->name; ?></a>
															<?php }
														}
													?>
												</div>
											<?php }
											if ($fields) { ?>
												<div class="open-jobs-filter__button-wrapper">
													<?php
														if (!$active_field) { ?>
															<button class="open-jobs-filter__button open-jobs-filter__button--button open-jobs-filter__button--placeholder"><?php _e( 'Department', 'twentythirteen' ); ?></button>
														<?php } else {
															$linkParams = $_GET;
															$linkParams['job_field'] = null;
															?>
															<a href="<?php echo modify_url_query($currentLink, $linkParams); ?>" class="open-jobs-filter__button open-jobs-filter__button--clear open-jobs-filter__button--link"><?php _e( 'Clear selection', 'twentythirteen' ); ?></a>
														<?php }
														foreach ($fields as $field) {
															if (($field->slug === $active_field)) { ?>
																<button class="open-jobs-filter__button open-jobs-filter__button--button"><?php echo $field->name; ?></button>
															<?php } else {
																$linkParams = $_GET;
																$linkParams['job_field'] = $field->slug;
																?>
																<a href="<?php echo modify_url_query($currentLink, $linkParams); ?>" class="open-jobs-filter__button open-jobs-filter__button--link"><?php echo $field->name; ?></a>
															<?php }
														}
													?>
												</div>
											<?php }
										?>
									</div>
								<?php }
								if ($openJobsQuery->have_posts()) { ?>
									<div class="open-jobs">
										<?php
											while ($openJobsQuery->have_posts()) {
												$openJobsQuery->the_post();
												$name = get_the_title();
												$applyLink = get_field('acf_open_job_apply_link');
												$nhsApplyLink = get_field('acf_open_job_nhs_apply_link');
												$closingDate = get_field('acf_open_job_closing_date');
												$closingDateString = __( 'Closing date for applications', 'twentythirteen' );
												$isPassed = false;
												if ($closingDate && strtotime($closingDate) <= strtotime($today)) {
													$isPassed = true;
													$closingDateString .= ' <strong>'. __( 'was', 'twentythirteen' ) .'</strong> ';
												} else {
													$closingDateString .= ' '. __( 'is', 'twentythirteen' ) .' ';
												}
												$closingDateString .= date_i18n('j F Y', strtotime($closingDate));
												?>
												<div class="open-jobs__item<?php echo $isPassed ? ' open-jobs__item--passed' : ''; ?>">
													<strong class="open-jobs__item-title"><?php echo $name; ?></strong>
													<div class="open-jobs__item-links">
														<a class="open-jobs__item-link open-jobs__item-link--red" href="<?php the_permalink(); ?>"><?php _e( 'Full job description', 'twentythirteen' ); ?></a>
														<?php
															if ($applyLink && !$isPassed) { ?>
																<a class="open-jobs__item-link open-jobs__item-link--gray" href="<?php echo $applyLink; ?>" target="_blank"><?php _e( 'Apply', 'twentythirteen' ); ?></a>
															<?php }
															if ($nhsApplyLink && !$isPassed) { ?>
																<a class="open-jobs__item-link open-jobs__item-link--lightgray" href="<?php echo $nhsApplyLink; ?>" target="_blank"><?php _e( 'Apply via NHS', 'twentythirteen' ); ?></a>
															<?php }
														?>
													</div>
													<span class="open-jobs__item-date"><?php echo $closingDateString; ?></span>
												</div>
											<?php }
											wp_reset_postdata();
										?>
									</div>
								<?php } else { ?>
									<div class="open-jobs open-jobs--no-results">
										<span><?php _e( 'No results', 'twentythirteen' ); ?></span>
									</div>	
								<?php }
							?>
						</div>

					<?php endwhile; ?>

						<div id="subpage_sidebar">
							<?php get_template_part('right-sidebar'); ?>
						</div>

					</div>
					
				</article><!-- #post -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
