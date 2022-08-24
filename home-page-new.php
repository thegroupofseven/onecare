<div id="homepage_content_first_column_thirds">
						<h2 class="underline">Contact One Care</h2>
						<?php echo do_shortcode('[ufb form_id="1"]'); ?>
</div>

<div id="homepage_content_second_column_two_thirds">

	<h2 class="underline">Key benefits</h2>

	<div class="homepage_content_second_column_two_thirds_sub_first_third">
		<?php if(get_field('key_benefits')): ?>
			<?php while(has_sub_field('key_benefits')): ?>

			<div class="key_benefit">
				<div class="benefit_icon">
					<img src="<?php the_sub_field('icon'); ?>" alt="<?php the_sub_field('title'); ?>" width="33">
				</div>
				<div class="benefit_title key_benefit_name">
					<p><strong><?php the_sub_field('title'); ?></strong></p>
				</div>
			</div>

			<?php endwhile; ?>
		<?php endif; ?>
	</div>

	<div class="homepage_content_second_column_two_thirds_sub_second_third">
		<div class="section">

			  <ul class="tabs">
			    <li class="current first_tab">Video ></li>
			    <li class="second_tab">Video ></li>
			    <li class="third_tab info_tab">Info ></li>
			    <li class="fourth_tab info_tab">Info ></li>
			    <li class="fifth_tab info_tab">Info ></li>
			    <li class="sixth_tab info_tab">Info ></li>
			    <li class="seventh_tab info_tab">Info ></li>
			    <li class="eighth_tab info_tab">Info ></li>
			    <li class="ninth_tab info_tab">Info ></li>
			  </ul>

			  <div class="box visible">

			    <iframe width="403" height="210" src="https://www.youtube.com/embed/KhkceYBPX5g" frameborder="0" allowfullscreen></iframe>
			    <p><strong>Web based access</strong></p>
			    <p>Patients from a number of practices can now consult with their surgery through their practice websites, and can receive advice from clinicians without having to leave their home. Patients will also have access to a wealth of self-help and pharmacist information.</p>
			    <a href="/webbasedaccess/">Read more ></a>

			  </div>

			  <div class="box">

			    <iframe width="403" height="210" src="https://www.youtube.com/embed/IOFSqrAtvPY" frameborder="0" allowfullscreen></iframe>

			    <p><strong>Seven-day access</strong></p>
			    <p>Patients can now be seen at the weekend if the doctor feels that it is necessary, to potentially avoid a stay in hospital or to support an early discharge.</p>
			    <p>In the near future, patients can be seen for more routine procedures in our nurse-led clinics.</p>
			    <a href="/services/weekendreviews/">Read more ></a>

			  </div>

			  <div class="box">

			    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/channel_shift.png" alt="urgent access" width="292">

			    <p><strong>Channel shift</strong></p>
			    <p>One Care is exploring ways to better match patients to the most appropriate person for their condition.</p>
			    <p>This could be a pharmacist, a nurse practitioner or another member of staff in the practice, and will save time for both patients and staff alike.</p>

			  </div>

			  <div class="box">

			    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/process_improvement.png" alt="urgent access" width="292">

			    <p><strong>Process improvement</strong></p>
			    <p>One Care is working with practices to improve the way they operate and deal with their administration.</p>
			    <p>More timely and efficient working will save time for patients and staff, reduce errors and lower the risk of duplication.</p>

			  </div>

			  <div class="box">

			    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/telephone_access.png" alt="urgent access" width="292">

			    <p><strong>Telephone access</strong></p>
			    <p>One Care is working with practices to make sure that phone calls are answered efficiently and by the right person. The work of One Care will help practices manage busy periods to ensure the best outcomes for their patients.</p>

			  </div>

			  <div class="box">

			    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/patient_staff_engagement.png" alt="urgent access" width="292">

			    <p><strong>Patient and staff engagement</strong></p>
			    <p>One Care listens to the patients and staff of its member practices, and welcomes all feedback and comments.
			    <p>Input from patients and staff alike helps to shape the work that we do, now and in the future, to be able to offer the right care all the time, every time.</p>

			  </div>

			  <div class="box">

			    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/self_care_information.png" alt="urgent access" width="292">

			    <p><strong>Self-care information</strong></p>
			    <p>Patients will have access to comprehensive self-care information to help manage their healthcare needs, and may be able to treat their condition without having to contact their practice.</p>

			  </div>

			  <div class="box">

			    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/video_urgenct_access.png" alt="urgent access" width="292">

			    <p><strong>Service access</strong></p>
			    <p>Thanks to One Care, patients can trust that their practice will be the ‘first port of call’ for advice and treatment, but can be easily directed to other community services when needed.</p>
			    <p>This is to help reduce unnecessary visits to Emergency Departments.</p>

			  </div>

			  <div class="box">

			    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/share_patient_record.png" alt="urgent access" width="292">

			    <p><strong>Shared patient record</strong></p>
			    <p>As part of One Care’s ambition to provide innovative and responsive 24/7 primary care, information is to be shared across a number of local healthcare providers.</p>
			    <p>Staff will have access to the relevant information they need to ensure patients always receive the best care.</p>

			  </div>
		</div>
	</div>
</div>

<script>
	$(function() {

	  $('ul.tabs').delegate('li:not(.current)', 'click', function() {
	    $(this).addClass('current').siblings().removeClass('current')
	      .parents('div.section').find('div.box').eq($(this).index()).fadeIn(150).siblings('div.box').hide();
	  })

	})
</script>