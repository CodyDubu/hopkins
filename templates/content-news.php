<article <?php post_class('news-posts container-fluid'); ?>>
	<div class="row">
		<div class="col-md-8">
		  <header>
		    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		    <?php get_template_part('templates/entry-meta'); ?>
		  </header>
		  <div class="entry-summary">
		    <?php the_excerpt(); ?>
		  </div>
		</div>
		<div class="col-md-4">
			<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid']); ?>
		</div>
	</div>
</article>
