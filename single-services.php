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
			<a href="<?php echo get_site_url(); ?>/services" class="back">< Back to services</a>
      <?php       
        query_posts(array( 
          'post_type' => 'services',
          'showposts' => -1,
          'orderby'   => 'title',
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
          'orderby'   => 'title',
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
      
      <?php if( get_field('overview') ): ?>
      <h3>Overview</h3>
      <?php the_field('overview'); ?>
      <?php endif; ?>
           
      <?php if( have_rows('benefits') ): ?>
      <h3>What are the benefits?</h3>
      <ul class="benefits larger">
      	<?php while( have_rows('benefits') ): the_row(); 
      		$benefit = get_sub_field('benefit');
        ?>
        <li><?php echo $benefit; ?></li>
      	<?php endwhile; ?>
      </ul>
      <?php endif; ?>
      
      <?php the_field('additional_content'); ?>
      
      <?php if( get_field('find_out_more') ): ?>
      <div class="more_info">
        <h3>How can I find out more?</h3>
        <?php the_field('find_out_more'); ?>
      </div>
      <p>* This service is subject to practices providing One Care with the appropriate Data Sharing Agreements (DSA)</p>
      <?php endif; ?>
      
      <?php if( get_field('quote') ): ?>
      <div class="quote eight columns">
        <blockquote><?php the_field('quote'); ?></blockquote>
        <p class="attribution"><?php the_field('quote_attribution'); ?></p>
      </div>
      <?php endif; ?>
      
    </div>
  </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>