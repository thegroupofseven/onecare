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
    <div class="service_filter ten columns offset-by-one">
      <h1>Our Services</h1>
      <?php the_field('services_content','5'); ?>
    </div>
    <div class="service_list twelve columns">
      <div class="row">
      <?php while ( have_posts() ) : the_post(); ?>
      
        <?php $terms = get_the_terms( $post->ID, 'type' ); ?>
        <div class="service_item <?php foreach($terms as $term) { echo $term->slug; } ?>">
          
          <div class="service_icon"><a href="<?php echo get_permalink(); ?>">
            <img src="<?php the_field('service_icon'); ?>" class="svg"></a>
          </div>
          <div class="service_text">
          <h3><?php the_title(); ?></h3>
          <a href="<?php echo get_permalink(); ?>" class="btn">View service</a>
          </div>
				</div>
      <?php endwhile; ?>
      </div>
    </div>
    
	</div>
</section>
<?php else : endif; ?>