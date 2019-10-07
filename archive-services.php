<?php
/**
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
 
get_header(); ?>

<?php if ( have_posts() ) : ?>
<section class="archive_service">
  <div class="container">
    <div class="service_filter eight columns offset-by-two">
      <h1>Our Services</h1>
      <p>Services to practices, primary care networks and localities. Paid-for services are offered to external audiences outside of our core stakeholder group.</p>
      <a href="#" class="btn wide active">All services</a> <a href="#" class="btn wide">Paid-for services</a> <a href="#" class="btn wide">Core service offer</a>
    </div>
    <div class="service_list twelve columns">
      <?php while ( have_posts() ) : the_post(); ?>
      
        <?php $terms = get_the_terms( $post->ID, 'type' ); ?>
        <div class="service_item <?php foreach($terms as $term) { echo $term->slug; } ?> three columns">
          <?php if ($term->slug == "paid") { ?><div class="paid-for">Paid-for</div><?php } ?>
          <div class="service_icon">
            <img src="<?php the_field('service_icon'); ?>">
          </div>
          <div class="service_text">
          <h3><?php the_title(); ?></h3>
          <a href="<?php echo get_permalink(); ?>" class="btn">See service</a>
          </div>
				</div>
      <?php endwhile; ?>
    </div>
    
	</div>
</section>
<?php else : endif; ?>