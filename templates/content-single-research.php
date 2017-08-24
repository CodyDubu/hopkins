<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
    <h2 class="entry-title"><?php the_title(); ?></h2>
      <!--<?php get_template_part('templates/entry-meta'); ?>-->
    </header>
    <div class="row">
    <div class="col-md-3">
    <div class="thumb">
        <?php if ( get_the_post_thumbnail($post_id) != '' ) { ?>
        <a href="<?php the_permalink() ?>" class="wpanch">
        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid']); ?>
        </a>
        <?php } else { ?>
        <a href="<?php the_permalink(); ?>"> <?php echo '<img src="' . catch_that_image() . '" class="img-fluid" />' ?> </a>
        <?php } ?>
    </div>
    </div>
    <div class="col-md-9">
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    </div>
    </div>
  </article>
<?php endwhile; ?>
