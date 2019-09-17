<?php
/*
Template name: Spreadsheet
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

<style>html {background-color: #fff !important;} table {width: 3000px !important;} th {min-width: 200px;}</style>

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

					<div id="subpage_content_container" class="spreadsheet">
						<?php get_sidebar(); ?>
						<div id="subpage_content">
						  
							<h2 class="underline"><?php the_field('content_subheader'); ?></h2>

							
<script src="https://cdn.jsdelivr.net/clipboard.js/1.6.0/clipboard.min.js"></script>
<script>
    var clipboard = new Clipboard('.btn');

    clipboard.on('success', function(e) {
        console.log(e);
    });

    clipboard.on('error', function(e) {
        console.log(e);
    });
</script>
<button class="btn" data-clipboard-action="copy" data-clipboard-target="#table" style="margin: 0 0 20px; width: auto;">Copy the spreadsheet</button>


<table id="table">

<tr style="background-color: rgba(87, 71, 89, 0.1);">

<th style="color: #ED1651;text-indent: 6px;"><strong>Clinic</strong></th>
<th style="color: #ED1651;text-indent: 6px;"<strong>CCG</strong></th>
<th><strong>&nbsp;</strong></th>
<th><strong>&nbsp;</strong></th>
<th><strong>&nbsp;</strong></th>
<th><strong>&nbsp;</strong></th>
<th><strong>&nbsp;</strong></th>
<th><strong>&nbsp;</strong></th>
<th><strong>&nbsp;</strong></th>
<th><strong>&nbsp;</strong></th>
<th><strong>&nbsp;</strong></th>
<th><strong>&nbsp;</strong></th>
<th><strong>&nbsp;</strong></th>
<th><strong>&nbsp;</strong></th>
<th><strong>&nbsp;</strong></th>
<th><strong>&nbsp;</strong></th>
<th><strong>&nbsp;</strong></th>
<th><strong>&nbsp;</strong></th>

</tr>

<tr style="background-color: rgba(87, 71, 89, 0.05);">

<th style="text-indent: 6px;"><strong>Staff</strong></th>
<th style="text-indent: 6px;"><strong>Fitter role</strong></th>
<th><strong>Are you happy to share your information with all of the practices?</strong></th>
<th><strong>Date of FLoC IUT</strong></th>
<th>FLoC IUT #</th>
<th>Date of FLoC SDI</th>
<th>FLoC SDI #</th>
<th>Date of FRSH Diploma Qualification</th>
<th>Date of Faculty Trainer</th>
<th>Date of Local LoC IUT</th>
<th>Date lof Local LoC SDI</th>
<th>Other Quals</th>
<th>Other Quals Awarding Body</th>
<th>Other Quals Date</th>
<th>If your recert is within 12 months are you intending to</th>
<th>If not why</th>
<th>Are you currently fitting?</th>
<th>If not why</th>

</tr>

<?php $args = array( 'posts_per_page' => -1, 'post_type' => 'contraceptive', 'orderby' => 'title', 'order' => 'asc' );
	$the_query = new WP_Query( $args );
	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


<tr>
<th style="color: #ED1651;"><strong><?php the_title(); ?></strong></th>
<th style="color: #ED1651;">
<?php if( get_field('practice_questions') ): ?>
  <?php while(has_sub_field('practice_questions')): ?>

	<?php the_sub_field('what_is_your_ccg'); ?>

  <?php endwhile; ?>
<?php endif; ?>
&nbsp;</th>


<?php if( get_field('staff_member') ): ?>
  <?php while(has_sub_field('staff_member')): ?>

	<tr>

	<?php if( have_rows('fitter_information') ): ?>
	  <?php while( have_rows('fitter_information') ): the_row(); ?>

		<?php if( have_rows('fitters_details') ): ?>
		  <?php while( have_rows('fitters_details') ): the_row(); ?>

				<th><?php the_sub_field('title'); ?> <?php the_sub_field('name_of_larc_fitter'); ?></th>
				<th><?php the_sub_field('is_fitter_a_gp_or_nurse'); ?></th>
		  <?php endwhile; ?>
		<?php endif; ?>

	  <?php endwhile; ?>
	<?php endif; ?>

	<th><?php the_sub_field('are_you_happy_sharing_your_data'); ?> <?php the_sub_field('checkboxes'); ?></th>

	<?php if( have_rows('fitter_information') ): ?>
	  <?php while( have_rows('fitter_information') ): the_row(); ?>

		<?php if( have_rows('frsh_qualifications') ): ?>
		  <?php while( have_rows('frsh_qualifications') ): the_row(); ?>
			<th><?php if( get_sub_field('date_of_letter_of_competence_in_intrauterine_techniques') ): ?>
<?php $date = get_sub_field('date_of_letter_of_competence_in_intrauterine_techniques', false, false); $date = new DateTime($date); ?><?php echo $date->format('j M Y'); ?><?php endif; ?>&nbsp;</th>
			<th><?php if( get_sub_field('frsh_loc_iut_number') ): ?><?php the_sub_field('frsh_loc_iut_number'); ?><?php endif; ?>&nbsp;</th>
			<th><?php if( get_sub_field('date_of_letter_of_competence_in_subdermal_implant_techniques') ): ?><?php $date = get_sub_field('date_of_letter_of_competence_in_subdermal_implant_techniques', false, false); $date = new DateTime($date); ?><?php echo $date->format('j M Y'); ?><?php endif; ?>&nbsp;</th>
			<th><?php if( get_sub_field('frsh_loc_sdi_number') ): ?><?php the_sub_field('frsh_loc_sdi_number'); ?><?php endif; ?>&nbsp;</th>
			<th><?php if( get_sub_field('date_of_fsrh_diploma_qualification') ): ?><?php $date = get_sub_field('date_of_fsrh_diploma_qualification', false, false); $date = new DateTime($date); ?><?php echo $date->format('j M Y'); ?><?php endif; ?>&nbsp;</th>
			<th><?php if( get_sub_field('date_of_fsrh_faculty_trainer_(frt)_qualification') ): ?><?php $date = get_sub_field('date_of_fsrh_faculty_trainer_(frt)_qualification', false, false); $date = new DateTime($date); ?><?php echo $date->format('j M Y'); ?><?php endif; ?>&nbsp;</th>

		  <?php endwhile; ?>
		<?php endif; //if( get_sub_field('frsh_qualifcations') ): ?>

		<?php if( have_rows('bnssg_local_qualifications') ): ?>
		  <?php while( have_rows('bnssg_local_qualifications') ): the_row(); ?>
			<th><?php if( get_sub_field('date_of_bnssg_letter_of_competence_-_iut') ): ?>
<?php $date = get_sub_field('date_of_bnssg_letter_of_competence_-_iut', false, false); $date = new DateTime($date); ?><?php echo $date->format('j M Y'); ?><?php endif; ?>&nbsp;</th>
			<th><?php if( get_sub_field('what_is_your_frsloc_number_-_iut') ): ?><?php the_sub_field('what_is_your_frsloc_number_-_iut'); ?><?php endif; ?>&nbsp;</th>
		  <?php endwhile; ?>
		<?php endif; //if( get_sub_field('bnssg_local_qualifications') ): ?>

		<?php if( have_rows('other_qualifications_relating_to_fitting') ): ?>
		  <?php while( have_rows('other_qualifications_relating_to_fitting') ): the_row(); ?>

			<th>

			<?php if( have_rows('qualifications') ): ?>
			  <?php while( have_rows('qualifications') ): the_row(); ?>

				<span class="comma"><?php the_sub_field('title_of_qualification'); ?></span>

			  <?php endwhile; ?>
			<?php endif; //if( get_sub_field('qualifications') ): ?>

			&nbsp;</th>

			<th>

			<?php if( have_rows('qualifications') ): ?>
			  <?php while( have_rows('qualifications') ): the_row(); ?>

				<span class="comma"><?php the_sub_field('awarding_body'); ?></span>

			  <?php endwhile; ?>
			<?php endif; //if( get_sub_field('qualifications') ): ?>

			&nbsp</th>

			<th>

			<?php if( have_rows('qualifications') ): ?>
			  <?php while( have_rows('qualifications') ): the_row(); ?>

				<?php if( get_sub_field('date_awarded') ): ?><span class="comma"><?php $date = get_sub_field('date_awarded', false, false); $date = new DateTime($date); ?><?php echo $date->format('j M Y'); ?></span><?php endif; ?>

			  <?php endwhile; ?>
			<?php endif; //if( get_sub_field('qualifications') ): ?>

			&nbsp</th>


		  <?php endwhile; ?>
		<?php endif; //if( get_sub_field('other_qualifications_relating_to_fitting') ): ?>

		<?php if( have_rows('general_information') ): ?>
		  <?php while( have_rows('general_information') ): the_row(); ?>

			<th><?php the_sub_field('if_fitters_re-certification_is_due_in_the_next_12_months_are_they_intending_to_re-certify_or_convert_to_a_faculty_loc'); ?></th>

			<th><?php the_sub_field('if_you_have_answered_no_or_not_sure_can_you_provide_some_more_details'); ?></th>

			<th><?php the_sub_field('is_fitter_currently_fitting_larc_as_part_of_the_role_that_they_have_in_the_practice'); ?></th>

			<th><?php the_sub_field('if_you_answered_no_can_you_provide_some_more_details'); ?></th>

			  <?php endwhile; ?>
			<?php endif; //if( get_sub_field('general_information') ): ?>

	  <?php endwhile; ?>
	<?php endif; ?>

	</tr>

  <?php endwhile; ?>
<?php endif; ?>

</tr>
	<?php endwhile; wp_reset_postdata(); ?>

</div>

<?php endwhile; wp_reset_postdata(); ?>
</table>

					
				</article><!-- #post -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>