<?php
/**
 * Single page for available jobs
 *
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header();

?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post();
			$fields = get_the_terms(get_the_ID(), 'job_field');
			$fieldName = '';
			if ($fields) {
				foreach ($fields as $key => $field) {
					if ($key > 0) {
						$fieldName .= ', ';
					}
					$fieldName .= $field->name;
				}
			}
			$locations = get_the_terms(get_the_ID(), 'job_location');
			$locationDescription = '';
			if ($locations) {
				foreach ($locations as $key => $location) {
					if ($key > 0) {
						$locationDescription .= '<br /> ';
					}
					$locationDescription .= $location->description ? $location->description : $location->name;
				}
			}
			$today = date('Y-m-d');
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
			$applyLink = get_field('acf_open_job_apply_link');
			$nhsApplyLink = get_field('acf_open_job_nhs_apply_link');
			?>
					<header class="entry-header">
						<div class="subpage-entry-title">
							<div class="subpage-entry-title-header">
								<h1><?php _e( 'Current vacancies', 'twentythirteen' ); ?></h1>
							</div>
						</div>
					</header><!-- .entry-header -->

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div id="subpage_content_container" class="open-job">
						<?php get_sidebar(); ?>
						<div id="subpage_content">
							<h2><?php the_title(); ?></h2>
							<?php if ( has_post_thumbnail() ) : ?>
							<div class="entry-thumbnail">
								<?php the_post_thumbnail(); ?>
							</div>
							<?php endif; ?>
							<div><?php the_content(); ?></div>
							<div class="open-job__info">
								<h3><?php _e( 'About us', 'twentythirteen' ); ?></h3>
								<table>
									<tbody>
										<tr>
											<th><?php _e( 'Role title', 'twentythirteen' ); ?></th>
											<td><?php echo $fieldName; ?></td>
										</tr>
										<tr>
											<th><?php _e( 'Location', 'twentythirteen' ); ?></th>
											<td><?php echo $locationDescription; ?></td>
										</tr>
										<?php
											if (get_field('acf_open_job_contract_type')) { ?>
												<tr>
													<th><?php _e( 'Contract', 'twentythirteen' ); ?></th>
													<td><?php the_field('acf_open_job_contract_type'); ?></td>
												</tr>
											<?php }
										?>
										<?php
											if (get_field('acf_open_job_responsibilities')) { ?>
												<tr>
													<th><?php _e( 'Responsible to', 'twentythirteen' ); ?></th>
													<td><?php the_field('acf_open_job_responsibilities'); ?></td>
												</tr>
											<?php }
										?>
										<?php
											if (get_field('acf_open_job_accountabilities')) { ?>
												<tr>
													<th><?php _e( 'Accountable to', 'twentythirteen' ); ?></th>
													<td><?php the_field('acf_open_job_accountabilities'); ?></td>
												</tr>
											<?php }
										?>
										<?php
											if (get_field('acf_open_job_relationships')) { ?>
												<tr>
													<th><?php _e( 'Key working relationships', 'twentythirteen' ); ?></th>
													<td><?php the_field('acf_open_job_relationships'); ?></td>
												</tr>
											<?php }
										?>
										<?php
											if (get_field('acf_open_job_salary')) { ?>
												<tr>
													<th><?php _e( 'Salary', 'twentythirteen' ); ?></th>
													<td><?php the_field('acf_open_job_salary'); ?></td>
												</tr>
											<?php }
										?>
										<tr>
											<th><?php _e( 'Closing date', 'twentythirteen' ); ?></th>
											<td><?php echo $closingDateString; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<?php
							if (get_field('acf_open_job_description')) { ?>
								<div class="open-job__description">
									<?php the_field('acf_open_job_description'); ?>
								</div>
								<?php }
								if (!$isPassed) { ?>
									<div class="open-job__footer">
										<span><?php echo $closingDateString; ?></span>
										<div class="open-job__apply-buttons">
										<?php
											if ($applyLink) { ?>
												<a class="open-job__apply-button open-jobs__item-link open-jobs__item-link--gray" href="<?php echo $applyLink; ?>" target="_blank"><?php _e( 'Apply', 'twentythirteen' ); ?></a>
											<?php }
											if ($nhsApplyLink) { ?>
												<a class="open-job__apply-button open-jobs__item-link open-jobs__item-link--lightgray" href="<?php echo $nhsApplyLink; ?>" target="_blank"><?php _e( 'Apply via NHS', 'twentythirteen' ); ?></a>
											<?php }
										?>
										</div>
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
