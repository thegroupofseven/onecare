<?php /* Template name: Home (V2) */ 

 /*
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post (); ?>
<section class="home_header">
  <div class="container">
    <div class="five columns">
      <h2>We’ve re-launched our programme of practice and primary care services</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <a href="<?php echo get_site_url(); ?>/services" class="btn white">About services</a>
    </div>
  </div>
</section>
<!-- Services -->
<section class="our_services">
  <div class="container">
    <div class="alignment">
      <div class="eight columns offset-by-two">
        <h3>Our services</h3>
        <p>Services to practices, primary care networks and localities. Paid-for services are offered to external audiences outside of our core stakeholder group.</p>
      </div>
      <div class="twelve columns">
        
      </div>
    </div>
  </div>
</section>
<!-- Reports -->
<section class="reports-full-width">
  <div class="background"></div>
  <div class="container">
    <div class="reports one-half column">
      <h3>General practice intelligence reports</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="reports-icon one-half column">

    </div>
  </div>
</section>
<!-- Browse -->
<section class="browse">
  <div class="container">
    <div class="twelve columns">
      <p>Browse and compare all of One Care’s primary care network services</p>
  </div>
</section>
<!-- Support -->
<section class="support">
  <div class="container">
    <div class="twelve columns">
      <h3>Direct support for primary care networks</h3>
      <p>Primary Care Networks (PCNs) can access all of One Care’s services, just as individual practices can. We’ve compiled a list of those services which we think are most relevant at PCN level, and described the support services which we offer specifically to PCNs.</p>
  </div>
</section>
<!-- News -->
<section class="news-full-width">
  <div class="background"></div>
  <div class="container">
    <div class="news-icon one-half column">

    </div>
    <div class="latest-news one-half column">
      <h3>Latest news</h3>
      <div class="news-slider">
      <?php $args = array('post_type'=> 'post','order' => 'DESC','post_status' => 'publish','posts_per_page'=> 1); query_posts($args); ?>
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <div class="news_item">
            <div class="content">
              <?php the_time('j F Y'); ?>
              <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="button secondary reversed">Read more</a>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else : endif; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>
<!-- Map -->
<section class="map_heading">
  <div class="container">
    <div class="twelve columns">
      <h3>Find your local practice or surgery</h3>
      <p>Search for a One Care affiliated practise near you</p>
    </div>
  </div>
</section>
<div id="homepage_map">
  <?php echo do_shortcode('[gmw_global_map form="1"]'); ?>
</div>
<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>