<?php
/*
Template name: Who we are
*/
?>

<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<section class="profile_page">
  <div class="container">
    <div class="profile_title ten columns offset-by-one">
      <h1><?php the_title(); ?></h1>
      <?php the_field('page_content'); ?>
    </div>
    <?php if(get_field('steering_group')): ?>
    <div class="profile_list twelve columns">
      <div class="row">
				<?php while(has_sub_field('steering_group')): ?>
				<div class="profile_item">
				  <?php $img=get_sub_field('profile_picture'); ?>
          <img src="<?php echo $img['sizes']['thumbnail']; ?>" width="150" height="150" alt="<?php the_sub_field('name'); ?>" onError="this.src='/wp-content/uploads/2014/11/profile-picture-default.png';">
          <h3><?php the_sub_field('name'); ?></h3>
					<p class="job_title"><?php the_sub_field('job_title'); ?></p>
          <p><?php the_sub_field('profile_information'); ?></p>
				</div>
				<?php endwhile; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>