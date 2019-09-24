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

<?php while ( have_posts() ) : the_post(); ?>
<section class="single_service">
  <div class="container">
    <div class="one-third column">
			<a href="<?php echo get_site_url(); ?>/services" class="btn white">Back to services</a>
      <?php get_sidebar(); ?>
    </div>
    
    <div class="two-thirds column">
      <h1>Our Services</h1>
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
    </div>
  </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>