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
			<a href="<?php echo get_site_url(); ?>/services" class="back">Back to what we do</a>
      <?php $current_post = $post->ID;
        query_posts(array( 
          'post_type' => 'services',
          'showposts' => -1,
          'orderby'   => 'title',
          'order'     => 'ASC',
        ));  
        ?>
        <ul class="widget service">
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <li <?php if( $current_post == $post->ID ) { echo ' class="current"'; } ?>><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
        </ul>
        <?php else : endif; wp_reset_query(); ?>
    </div>
    
    <div class="nine columns">
      <h1>What we do</h1>       
      <h2><?php the_title(); ?></h2>
      
      <?php if( get_field('overview') ): ?>
      <div class="overview">
      <h3>Overview</h3>
        <?php the_field('overview'); ?>
      </div>
      <?php endif; ?>
           
      <?php if( have_rows('benefits') ): ?>
      <div class="benefits">
      <h3>What are the benefits?</h3>
      	<?php while( have_rows('benefits') ): the_row(); 
      		$benefit = get_sub_field('benefit');
        ?>
        <div class="benefit">
          <span class="icon"><img src="<?php echo the_sub_field('benefit_icon'); ?>" class="svg"></span><div class="benefit_text"><?php echo $benefit; ?></div>
        </div>
      	<?php endwhile; ?>
      </div>
      <?php endif; ?>
      
      <!--<div class="offering row">
        <?php if( get_field('core') ): ?>
        <div class="core_offer six columns">
          <span class="core-btn">Core offer</span>
          <h3>What’s the core offer?</h3>
          <?php the_field('core'); ?>
        </div>
        <?php endif; ?>
        
        <?php if( get_field('paid') ): ?>
        <div class="paid_offer six columns">
          <span class="paid-btn">Non-core</span>
          <h3>Can I access additional paid support?</h3>
          <?php the_field('paid'); ?>
        </div>
        <?php endif; ?>
      </div>-->
      
      <?php the_field('additional_content'); ?>
      
      <?php if( get_field('find_out_more') ): ?>
      <div class="more_info">
        <h3>How can I find out more?</h3>
        <?php the_field('find_out_more'); ?>
      </div>
      <p><?php the_field('footnotes'); ?></p>
      <?php endif; ?>
      
      <?php if( get_field('quote') ): ?>

      <div class="quote eight columns">
        <blockquote><?php the_field('quote'); ?></blockquote>
        <p class="attribution"><?php the_field('quote_attribution'); ?></p>
      </div>
      <div class="quote_image four columns">
        <?php
        $field = get_field_object( 'quote_image' );
        $value = $field['value'];
        $label = $field['choices'][ $value ];
        ?>
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/<?php echo esc_html($value); ?>.svg" />   
      </div>
      <?php endif; ?>
      
    </div>
  </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>