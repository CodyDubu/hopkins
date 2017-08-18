<?php
/**
 * Template Name: Three Column
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header-three'); ?>
  <?php get_template_part('templates/content', 'page-three'); ?>
<?php endwhile; ?>