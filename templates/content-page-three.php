<?php if(is_page(174)){ ?>
		<div class="container-fluid">
			<div class="row">
				<?php echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="3" category="headline" button_label="Load More"]'); ?>
			</div> 
		</div>	
<?php }elseif(is_page(188)){ ?>
		<div class="container-fluid">
			<div class="row">
				<?php echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="3" category="spotlight" button_label="Load More"]'); ?>
			</div> 
		</div>
<?php }else{ ?>
<?php the_content(); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
<?php } ?>
</div>
<div class="col-md-4">
<?php dynamic_sidebar('sidebar-blog'); ?>
</div>
</div>
</div>
