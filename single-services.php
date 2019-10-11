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
    <div class="three columns">
			<a href="<?php echo get_site_url(); ?>/services" class="back">Back to services</a>
      <?php       
        query_posts(array( 
          'post_type' => 'services',
          'showposts' => -1,
          'orderby'   => 'rand',
          'order'     => 'ASC',
          'tax_query' => array(
              array(
                'taxonomy' => 'type',
                'field' => 'term_id',
                'terms' => 17
              )
          ),
        ));  
        ?>
        <ul class="widget service">
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
        </ul>
        <?php else : endif; wp_reset_query(); ?>
        
        <?php       
        query_posts(array( 
          'post_type' => 'services',
          'showposts' => -1,
          'orderby'   => 'rand',
          'order'     => 'ASC',
          'tax_query' => array(
              array(
                'taxonomy' => 'type',
                'field' => 'term_id',
                'terms' => 16
              )
          ),
        ));  
        ?>
        <ul class="widget service paid">
          <h4>Paid for services:</h4>
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
        </ul>
        <?php else : endif; wp_reset_query(); ?>
    </div>
    
    <div class="nine columns">
      <h1>Our Services</h1>       
      <h2><?php the_title(); ?></h2>
      <h3>Overview</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <h3>What are the benefits?</h3>
      <ul class="benefits larger">
        <li>Lorem ipsum dolor sit amet</li>
        <li>Consectetur adipisicing elit</li>
        <li>Sed do eiusmod tempor incididunt ut labore</li>
        <li>Et dolore magna aliqua. Ut enim ad minim veniam</li>
        <li>Quis nostrud exercitation ullamco laboris nisi ut aliquip</li>
      </ul>
      <h3>What's the core offer?</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <h3>Can I access additional paid support?</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <div class="more_info">
        <h3>How can I find out more?</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <?php the_content(); ?>
    </div>
  </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>