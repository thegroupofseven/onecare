<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<section class="archive_service">
  <div class="container">
    <div class="service_filter ten columns offset-by-one">
      <h1>What we do</h1>
      <?php the_field('services_content','5'); ?>
    </div>
    <div class="service_list twelve columns">
      
      
      
      <div class="row">
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="service_item">
          <div class="service_icon"><a href="<?php echo get_permalink(); ?>">
            <img src="<?php the_field('service_icon'); ?>" class="svg"></a>
          </div>
          <div class="service_text">
            <h3><?php the_title(); ?></h3>
          </div>
          <div class="service_button">
            <a href="<?php echo get_permalink(); ?>" class="btn">View service</a>
          </div>
      </div>
      <?php endwhile; ?>
      </div>
    </div>
  </div>
</section>
<?php else : endif; ?>