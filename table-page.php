<?php

/*

Template name: Table

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



							  <div class="contraceptive_table">

								<div class="contraceptive_row contraceptive_first_row">

								  <div class="contraceptive_width">

									<p><strong>Clinic name</strong></p>

								  </div>

								  <div class="contraceptive_width">

									<p><strong>Doctors</strong><span class="view_all_doctors"><a name="expand_doctors">Expand all</a></span></p>

								  </div>

								</div>



						<?php $args = array( 'posts_per_page' => -1, 'post_type' => 'contraceptive', 'orderby' => 'title', 'order' => 'asc' );

							$the_query = new WP_Query( $args );

							while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<div class="contraceptive_row">

								  <div class="contraceptive_width">

										<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>

										<p><?php echo do_shortcode('[gmw_post_location_fields fields="formatted_address"]'); ?></p>

								  </div>

								  <div class="contraceptive_width">



								<?php if( get_field('staff_member') ): ?>

								  <?php while(has_sub_field('staff_member')): ?>



									<div class="contraceptive_width_right <?php the_sub_field('are_you_happy_sharing_your_data'); ?><?php if( get_sub_field('checkboxes') ): ?> <?php echo implode(' ', get_sub_field('checkboxes')); ?><?php endif; ?>">



				    					<?php if( have_rows('fitter_information') ): ?>

									  <?php while( have_rows('fitter_information') ): the_row(); ?>

				    					    <?php if( have_rows('fitters_details') ): ?>

									      <?php while( have_rows('fitters_details') ): the_row(); ?>

										<p><?php the_sub_field('title'); ?> <?php the_sub_field('name_of_larc_fitter'); ?><span class="price_arrow" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/doctorarrow.png" width="22" alt="LARC fitter arrow"></span></p>

											<div class="contraceptive_row">

											    <p class="doctor_info"><strong>GP or Nurse?</strong> <?php the_sub_field('is_fitter_a_gp_or_nurse'); ?></p>

											    <?php if( get_sub_field('fitters_practice_email_address') ): ?>

											      <p class="doctor_info"><strong>Email address:</strong> <a href="mailto:<?php the_sub_field('fitters_practice_email_address'); ?>"><?php the_sub_field('fitters_practice_email_address'); ?></a></p>

											    <?php endif; ?>

											</div>

								

								

									      <?php endwhile; ?>

									    <?php endif; //if( get_sub_field('fitters_details') ): ?>











				    			<?php if( have_rows('frsh_qualifications') ): ?>

							  <?php while( have_rows('frsh_qualifications') ): the_row(); ?>

							  <div class="contraceptive_row">

							    <div class="<?php the_sub_field('does_the_fitter_have_fsrh_qualifications'); ?>">

							  	<h5>FRSH qualifications</h5>

								<p class="<?php the_sub_field('does_fitter_have_a_frsh_loc_iut_qualification'); ?>">								<?php if( get_sub_field('date_of_letter_of_competence_in_intrauterine_techniques') ): ?>

<?php $date = get_sub_field('date_of_letter_of_competence_in_intrauterine_techniques', false, false); $date = new DateTime($date); ?><strong>Date of Letter of Competence in Intrauterine Techniques:</strong> <?php echo $date->format('j M Y'); ?><br>(LoC IUT) or Last Re-certification</p>

								<?php endif; ?>

								<?php if( get_sub_field('frsh_loc_iut_number') ): ?>

									<p><strong>FRSH LoC IUT number:</strong> <?php the_sub_field('frsh_loc_iut_number'); ?></p>

								<?php endif; ?>

								<p class="<?php the_sub_field('does_fitter_have_a_frsh_loc_sdi_qualification'); ?>">								<?php if( get_sub_field('date_of_letter_of_competence_in_subdermal_implant_techniques') ): ?>

<?php $date = get_sub_field('date_of_letter_of_competence_in_subdermal_implant_techniques', false, false); $date = new DateTime($date); ?><strong>Date of Letter of Competence in Intrauterine Techniques:</strong> <?php echo $date->format('j M Y'); ?><br>(LoC IUT) or Last Re-certifcation</p>

								<?php endif; ?>

								<?php if( get_sub_field('frsh_loc_sdi_number') ): ?>

									<p><strong>FRSH LoC SDI number:</strong> <?php the_sub_field('frsh_loc_sdi_number'); ?></p>

								<?php endif; ?>

								<p class="<?php the_sub_field('does_fitter_have_frsh_diploma_qualication'); ?>"><?php $date = get_sub_field('date_of_fsrh_diploma_qualification', false, false); $date = new DateTime($date); ?><strong>Date of FSRH Diploma Qualification:</strong> <?php echo $date->format('j M Y'); ?><br>(DFSRH for GPs, NDFSRH for nurses)</p>

								<p class="<?php the_sub_field('does_fitter_have_a_fsrh_faculty_trainer_(frt)_qualification'); ?>"><?php $date = get_sub_field('date_of_fsrh_faculty_trainer_(frt)_qualification', false, false); $date = new DateTime($date); ?><strong>Date of FSRH Faculty Trainer (FRT) Qualification:</strong> <?php echo $date->format('j M Y'); ?><br>Date or Last Re-certification Date</p>

							      </div>

							    </div>

							  <?php endwhile; ?>

							<?php endif; //if( get_sub_field('frsh_qualifcations') ): ?>



				    			<?php if( have_rows('bnssg_local_qualifications') ): ?>

							  <?php while( have_rows('bnssg_local_qualifications') ): the_row(); ?>

							  <div class="contraceptive_row">

							    <h5 class="<?php the_sub_field('do_you_have_a_bnssg_letter_of_competence_-_iut'); ?> <?php the_sub_field('do_you_have_a_bnssg_letter_of_competence_-_sdi'); ?>">BNSSG local qualifications</h5>

							    <div class="<?php the_sub_field('do_you_have_a_bnssg_letter_of_competence_-_iut'); ?>">

								<p><?php $date = get_sub_field('date_of_bnssg_letter_of_competence_-_iut', false, false); $date = new DateTime($date); ?><strong>Date of BNSSG Letter of Competence - IUT:</strong> <?php echo $date->format('j M Y'); ?></p>

							    </div>

							    <div class="<?php the_sub_field('do_you_have_a_bnssg_letter_of_competence_-_sdi'); ?>">

								<p><?php $date = get_sub_field('date_of_letter_of_competence_in_subdermal_implant_techniques', false, false); $date = new DateTime($date); ?><strong>Date of BNSSG Letter of Competence - SDI:</strong> <?php echo $date->format('j M Y'); ?></p>

							    </div>

							  </div>

							  <?php endwhile; ?>

							<?php endif; //if( get_sub_field('bnssg_local_qualifications') ): ?>





				    			<?php if( have_rows('general_information') ): ?>

							  <div class="contraceptive_row">

							    <h5>General information</h5>

							    <?php while( have_rows('general_information') ): the_row(); ?>



								<p><strong>If fitter's re-certification is due in the next 12 months are they intending to re-certify or convert to a Faculty LoC:</strong> <?php the_sub_field('if_fitters_re-certification_is_due_in_the_next_12_months_are_they_intending_to_re-certify_or_convert_to_a_faculty_loc'); ?></p>



								<?php if( get_sub_field('if_you_have_answered_no_or_not_sure_can_you_provide_some_more_details') ): ?>

									<p><?php the_sub_field('if_you_have_answered_no_or_not_sure_can_you_provide_some_more_details'); ?></p>

								<?php endif; ?>



								<p><strong>Is fitter currently fitting LARC as part of the role that they have in the practice? </strong> <?php the_sub_field('is_fitter_currently_fitting_larc_as_part_of_the_role_that_they_have_in_the_practice'); ?></p>

								<?php if( get_sub_field('if_you_answered_no_can_you_provide_some_more_details') ): ?>

									<p><?php the_sub_field('if_you_answered_no_can_you_provide_some_more_details'); ?></p>

								<?php endif; ?>



							  <?php endwhile; ?>

							  </div>

							<?php endif; //if( get_sub_field('general_information') ): ?>



				    			<?php if( have_rows('other_qualifications_relating_to_fitting') ): ?>

							  <?php while( have_rows('other_qualifications_relating_to_fitting') ): the_row(); ?>

							  <div class="contraceptive_row">

							    <div id="other_qualifications" class="<?php the_sub_field('does_fitter_have_any_additional_fitter-related_qualifications'); ?>">

							    <h5>Other qualifications</h5>

				    				<?php if( have_rows('qualifications') ): ?>

								  <?php while( have_rows('qualifications') ): the_row(); ?>



									<?php if( get_sub_field('title_of_qualification') ): ?>

										<p><strong>Qualification:</strong> <?php the_sub_field('title_of_qualification'); ?></p>

									<?php endif; ?>

									<?php if( get_sub_field('date_awarded') ): ?>

										<p><strong>Date awarded:</strong> <?php the_sub_field('date_awarded'); ?></p>

									<?php endif; ?>

									<?php if( get_sub_field('awarding_body') ): ?>

										<p><strong>Awarding body:</strong> <?php the_sub_field('awarding_body'); ?></p>

									<?php endif; ?>



								  <?php endwhile; ?>

								<?php endif; //if( get_sub_field('qualifications') ): ?>

							    </div>

							  </div>



							  <?php endwhile; ?>

							<?php endif; //if( get_sub_field('other_qualifications_relating_to_fitting') ): ?>

















									  <?php endwhile; ?>

									<?php endif; //if( get_sub_field('fitter_information') ): ?>





				    			<?php if( have_rows('frsh_qualifications') ): ?>

							  <h5 class="doctor_info">FRSH qualifications</h5>

							  <?php while( have_rows('frsh_qualifications') ): the_row(); ?>

								<div class="contraceptive_row">

									<p class="doctor_info"><?php $date = get_sub_field('date_of_letter_of_competence_in_intrauterine_techniques', false, false); $date = new DateTime($date); ?><strong>Date of Letter of Competence in Intrauterine Techniques:</strong> <?php echo $date->format('j M Y'); ?><br>(LoC IUT) or Last Re-certifcation</p>

									<p class="doctor_info"><?php $date = get_sub_field('date_of_letter_of_competence_in_subdermal_implant_techniques', false, false); $date = new DateTime($date); ?><strong>Date of Letter of Competence in Subdermal Implant Techniques:</strong> <?php echo $date->format('j M Y'); ?><br>(LoC SDI) or Last Re-certifcation Date</p>

									<p class="doctor_info"><?php $date = get_sub_field('date_of_fsrh_diploma_qualification', false, false); $date = new DateTime($date); ?><strong>Date of FSRH Diploma Qualification:</strong> <?php echo $date->format('j M Y'); ?><br>(DFSRH for GPs, NDFSRH for nurses)</p>

									<p class="doctor_info"><?php $date = get_sub_field('date_of_fsrh_faculty_trainer_(frt)_qualification', false, false); $date = new DateTime($date); ?><strong>Date of FSRH Faculty Trainer (FRT) Qualification:</strong> <?php echo $date->format('j M Y'); ?><br>Date or Last Re-certification Date</p>

								</div>



							  <?php endwhile; ?>

							<?php endif; //if( get_sub_field('frsh_qualifcations') ): ?>



				    			<?php if( have_rows('bnssq_local_qualifications') ): ?>

								<div class="contraceptive_row">

							  		<h5 class="doctor_info">BNSSG local qualifications</h5>

							  		<?php while( have_rows('bnssq_local_qualifications') ): the_row(); ?>

									  <p class="doctor_info"><?php $date = get_sub_field('date_of_bnssg_letter_of_competence_-_iut', false, false); $date = new DateTime($date); ?><strong>Date of BNSSG Letter of Competence - IUT:</strong> <?php echo $date->format('j M Y'); ?></p>

									  <p class="doctor_info"><?php $date = get_sub_field('date_of_letter_of_competence_in_subdermal_implant_techniques', false, false); $date = new DateTime($date); ?><strong>Date of BNSSG Letter of Competence - SDI:</strong> <?php echo $date->format('j M Y'); ?></p>

									<?php endwhile; ?>

								</div>

							<?php endif; //if( get_sub_field('frsh_qualifcations') ): ?>









									</div>

								  <?php endwhile; ?>

								<?php endif; ?>

								  </div>

								</div>



							<?php endwhile; wp_reset_postdata(); ?>



							  </div>

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