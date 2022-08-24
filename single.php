<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

					<header class="entry-header">
						<div class="subpage-entry-title">
							<div class="subpage-entry-title-header">
								<h2 class="single_post_subheader"><?php the_field('page_subheader'); ?></h2>
								<h1><?php the_title(); ?></h1>
							</div>
						</div>
					</header><!-- .entry-header -->

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div id="subpage_content_container">
				  <?php // get_sidebar(); ?>
				  <div id="subpage_content" class="news_layout">
						<div id="job_description_container">

							<?php 
             							if ( has_post_thumbnail() ) {
              							the_post_thumbnail();
               							} 
              						?>

							<p class="post_date"><?php echo get_the_date(); ?>
							<h2 class="single_subheader">
								<?php the_title(); ?>
							</h2>

							<p>
								<?php the_content(); ?>
							</p>

						

							<p class="job_salary">
								<?php the_field('salary'); ?>
							</p>

							<p class="job_application_date">
								<?php the_field('closing_date'); ?> <?php the_field('application_date'); ?>
							</p>

							<p class="job_url_title">
								<br><a href="<?php the_field('job_url'); ?>"><?php the_field('job_url_title'); ?> <?php the_title(); ?></a>
							</p>

							


							<p class="job_description">
								<?php the_field('job_description'); ?>
							</p>

							<div id="download_job_description">
								<a class="job_description_button" href="<?php the_field('job_description_document'); ?>" style="margin-right:10px;" target="_blank">Download job description</a> <a class="job_description_button" href="/wp-content/uploads/2014/11/Application-for-Employmentform-One-Care-Consortium.doc" target="_blank">Download application form</a>
						</div>
					</div>
							<div id="find_your_nearest_clinic">
								<h2 class="underline"><?php the_title(); ?><span><br><p style="margin: 0;"><?php the_field('are_they_a_one_care_clinic'); ?></p></span></h2>

								<p><?php the_field('address'); ?><br>
								<strong>T:</strong> <?php the_field('phone_number'); ?><br>
								<a href="<?php the_field('website_address'); ?>" target="_blank">Visit surgery website ></a></p>

								<div style="display:<?php the_field('include_occ_content'); ?>;">
									<?php the_field('one_care_practice_content', 1084); ?>
								</div>

								<div style="display:<?php the_field('include_non_occ_content'); ?>;">
									<?php the_field('non_one_care_practice', 1092); ?>
								</div>
								
								
							</div>

							<div id="social_sharing">
								<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

							<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button"></div>
<script src="http://cdn.instaemail.net/js/app.js"></script><a href="#" onclick="pfEmail.init()" title="Email this page."> <img alt="Email this page." src="http://cdn.instaemail.net/images/email-button.png" /></a>

							<script>var pfHeaderImgUrl = '';var pfHeaderTagline = '';var pfdisableClickToDel = 0;var pfHideImages = 0;var pfImageDisplayStyle = 'right';var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if('https:' == document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script><a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Printer Friendly and PDF"><img style="border:none;-webkit-box-shadow:none;box-shadow:none;" src="http://cdn.printfriendly.com/button-print-gry20.png" alt="Print Friendly and PDF"/></a>

							</div>

							<!-- Pagination -->

							<div class="pagination_left">
								<?php echo previous_post_link('%link', 'Previous', $in_same_cat = true); ?>
							</div>

							<div class="pagination_right">
								<?php echo next_post_link('%link', 'Next', $in_same_cat = true); ?>
							</div>

							<!-- end of pagination -->


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

					</div><!-- #subpage_content_container -->
					</article>

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>