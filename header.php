<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	
	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta name="resource-type" content="document" />
	<meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
	<meta http-equiv="content-language" content="en-us" />
	<meta name="author" content="One Care" />
	<meta name="contact" content="enquiries@onecare.org.uk" />
	<meta name="copyright" content="Copyright (c)2014 One Care. All Rights Reserved." />
	<meta name="description" content="The One Care' intentions, plans and job board" />
	<meta name="keywords" content="One, Care, NHS, Medical, Healthcare, GP, Clinicians, Jobs" />

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/new.css" rel="stylesheet" type="text/css">

	<!-- fonts -->

	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<meta name="google-translate-customization" content="e1c4a902d07e49d8-472f7608e2ab67a6-gd5cb9d7e78e19c4a-16"></meta>

	<!-- Font sizing plus / minus -->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57298540-1', 'auto');
  ga('send', 'pageview');

</script>

	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</a>
			<div id="top_navbar">
				<div id="top_navbar_menu">
					<ul class="top_navbar_list">
						<!-- <li class="top_navbar_list_bullet"><a href="#">Intranet</a></li> -->
						<li class="top_navbar_list_bullet"><a href="/press-media">Press / Media</a></li>
						<li class="top_navbar_list_bullet accessibility_tab">Accessibility 
							<a href="#" id="small">A</a>
    							<a href="#" id="medium" class="selected">A</a>
    							<a href="#" id="large">A</a>
						</li>
						<li class="top_navbar_list_bullet google_mobile"><div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        </li>						
						<?php get_search_form( ); ?>
						<a href="http://www.england.nhs.uk/ourwork/qual-clin-lead/calltoaction/pm-ext-access/" target="_blank"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/11/NHS-logo.png" alt="The NHS logo" class="nhs_logo" width="54"></a>
					</ul>
				</div>

			</div>

			<div id="main_header_container">
				<div id="main_header">
				  <div class="inline_block">
					<div class="main_header_2_columns">
						<a href="/"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/10/one_care_logo_retina.png" width="253px" alt="One Care Logo" class="onecare_logo" /></a>
					</div>
					<div class="main_header_2_columns main_header_right_column">
						<h2 class="slogan_mobile">Enabling general practice to both survive and thrive</h2>
						
					</div>

					<div id="navbar" class="navbar">
						<div id="mobile_search">
							<button class="search_button"><img src="<?php echo get_site_url(); ?>/wp-content/themes/twentythirteen-child-01/images/search_icon.png" alt="Search icon" width="24"></button>
						</div>
						<div id="mobile_logo">
							<a href="/"><img src="<?php echo get_site_url(); ?>/wp-content/themes/twentythirteen-child-01/images/one_care_logo_white.png" alt="One Care Logo" width="120" /></a>
						</div>
						<nav id="site-navigation" class="navigation main-navigation" role="navigation">
							<button class="menu-toggle menu_animation mobile_menu_animation"><?php _e( '', 'twentythirteen' ); ?><span></span></button>
							<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
							<div id="mobile_social">
   							  <a href="/contact"><img src="<?php echo get_site_url(); ?><?php echo get_site_url(); ?>/wp-content/uploads/2014/10/header_phone_icon.png" alt="telephone icon" width="24"></a>
   							  <a href="mailto:enquiries@onecare.org.uk"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/10/header_email_icon.png" alt="email icon" width="24"></a>
   							  <a href="https://twitter.com/onecaretweets" target="_blank"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/10/header_twitter_icon.png" alt="twitter icon" width="24"></a>
							  <a href="https://www.facebook.com/One-Care-BNSSG-Ltd-2051923954868275/" target="_blank"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/12/header_facebook_icon.png" alt="facebook icon" width="24"></a>

							<div class="intranet_mobile"><a href="https://portal.gpteamnet.co.uk/Topics/Public/d2091920-33c1-4a41-9c5c-a80b00a9c4f7" title="One Care portal" alt="One Care portal" target="_blank">One Care portal</a>
							</div>
							</div><!-- #mobile_social -->
							<h2 class="mobile_tagline">Enabling general practice to both survive and thrive</h2>
						</nav><!-- #site-navigation -->

						<div id="header_social">

							<div class="intranet_button">
								<a href="https://portal.gpteamnet.co.uk/Topics/Public/d2091920-33c1-4a41-9c5c-a80b00a9c4f7" title="One Care portal" alt="One Care portal" target="_blank">One Care portal</a>
							</div>
						
							<div class="footer_icon social_icons">
   								<a href="/contact"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/10/header_phone_icon.png" alt="telephone icon" class="social_icon_image" width="24">
    								</a>
							</div>

							<div class="footer_icon social_icons">
   								<a href="mailto:enquiries@onecare.org.uk"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/10/header_email_icon.png" alt="email icon" class="social_icon_image" width="24">
    								</a>
							</div>


							<!-- <div class="footer_icon social_icons">
   								<a href="/"><img src="/wp-content/uploads/2014/10/header_facebook_icon.png" alt="facebook icon" class="social_icon_image" width="24">
    								</a>
							</div> -->

							<div class="footer_icon social_icons">
   								<a href="https://twitter.com/onecaretweets" target="_blank"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/10/header_twitter_icon.png" alt="twitter icon" class="social_icon_image" width="24">
    								</a>
							</div>
							
							<div class="footer_icon social_icons">
   								<a href="https://www.facebook.com/One-Care-BNSSG-Ltd-2051923954868275/" target="_blank"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/12/header_facebook_icon.png" alt="facebook icon" class="social_icon_image" width="24">
    								</a>
							</div>

						</div>
					</div><!-- #navbar -->
					<div id="mobile_search_bar">
						<?php get_search_form( ); ?>
					</div>
				  </div>
				</div>
			</div>


		</header><!-- #masthead -->

		<div id="main" class="site-main">