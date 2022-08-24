<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<section class="archive_service">
  <div class="container">
    <div class="service_filter ten columns offset-by-one">
      <h1>What we do</h1>
      <?php the_field('services_content','5'); ?>
    </div>
    <div class="service_list twelve columns">
      <?php $taxonomy = 'types'; $tax_terms = get_terms($taxonomy); foreach ($tax_terms as $tax_term) { ?>
      <?php $query = query_posts("post_type=services&types=".$tax_term->name); if ( have_posts() ) { ?>

      <div class="service_item">
        <div class="tab">
        <div class="accordionItem close" id="<?php echo $tax_term->slug; ?>">
          <h3 class="accordionItemHeading">
            <div class="icon">
            <img src="<?php the_field('type_icon', $tax_term); ?>" class="svg" />
            </div>
            <div class="title">
              <?php echo $tax_term->name; ?>
            </div>
          </h3>
          <div class="accordionItemContent">
            <div class="content">
              <?php the_field('type_description', $tax_term); ?>
              <ul>
              <?php while ( have_posts() ) { the_post(); $post = get_post();?>
                <li><a href="<?php the_permalink(); ?>"><img src="<?php the_field('service_icon'); ?>" class="svg mini"> <?php the_title(); ?></a></li>
              <?php } ?>  
              </ul>       
            </div>
          </div>
        </div>
      </div>
      
      </div>
      <?php } ?>
		
    <?php } ?>
		<div class="service_item">
        <div class="tab">
        <div class="accordionItem close" id="support-across-the-uk">
          <h3 class="accordionItemHeading">
            <div class="icon">
            <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2020/03/OC_ICONS_WWD_UK-support.svg" class="svg" />
            </div>
            <div class="title">
              Support across the UK 
            </div>
          </h3>
          <div class="accordionItemContent">
            <div class="content">
				<p><a href="<?php echo get_site_url(); ?>/contact">Get in touch</a> if you're a practice, federation or another organisation from outside Bristol, North Somerset and South Gloucestershire and you want to talk about how we might be able to help you.</p> 
            </div>
          </div>
        </div>
      </div>
      
      </div>
    </div>
  </div>
</section>
<script>
  // Get # from URL to open accodrion items
  
  var hash = location.hash.substr(1);
  console.log(hash);
  
  var element = document.getElementById(hash);
  element.classList.remove("close");
  element.classList.add("open");

</script>
<?php else : endif; ?>
<?php get_footer(); ?>