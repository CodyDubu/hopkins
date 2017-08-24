<?php 
$query = new WP_Query( array( 'post_type' => 'explore_projects' ) );
while ($query->have_posts()) : $query->the_post(); ?>
<?php $tax_terms = wp_get_post_terms($post->ID, 'explore_project');?>
<div <?php post_class('row row-projects'); ?>>
<div class="col-md-2">
<picture>
<?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
</picture>
</div>
<div class="col-md-10">
    <p><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></p>

    <ul class="projects-tax"><?php 
    foreach ( $tax_terms as $tax_term ) { ?>
    	<li class="<?php echo $tax_term->slug; ?>"><?php echo $tax_term->name; ?></li>
    	<?php }?></ul>
    <p><?php the_excerpt(); ?></p>
  </div>
</div>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
</div>
</div>
</div>
