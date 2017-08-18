<?php if(is_page(7)){

}else{ ?>
<section class="apply-now">
	<div class="container">
		<div class="row justify-content-center">
			<h2 class="text-center">The future of healthcare<br> starts <span class="unl">here.</span></h2>
			<?php echo do_shortcode('[formidable id=7]'); ?>
		</div>
	</div>
</section>
<?php } ?>
<section class="sub-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-2">
					    <a class="brand" href="<?= esc_url(home_url('/')); ?>">
					      <img src="<?php bloginfo('template_url'); ?>/assets/images/uni.png" class="img-fluid" alt="<?php bloginfo('name'); ?>" />
					    </a>
					</div>
					<div class="col-md-10">
						<p><strong>The Malone Center for Engineering in Healthcare</strong><br>
							<strong>Johns Hopkins University, Whiting School of Engineering</strong>
						</p>
						<p>Malone Hall 430<br>
							3400 North Charles Street, Baltimore, MD 21218-2682
						</p>
						<p>
							<a href="tel:410-516- 5117"><i class="fa fa-phone" aria-hidden="true"></i> 410-516- 5117</a><br>
							<a href="mailto:malonecenter@jhu.edu"> <i class="fa fa-envelope-o" aria-hidden="true"></i> malonecenter@jhu.edu</a>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 links-social">
		         <?php
		          wp_nav_menu([
		           'menu'            => 'top',
		           'theme_location'  => 'footer_navigation',
		           'menu_id'         => false,
		           'menu_class'      => 'submenu-footer',
		           'depth'           => 2,
		           'fallback_cb'     => 'bs4navwalker::fallback',
		           'walker'          => new bs4navwalker()
		          ]);
		        ?>
		        <?php dynamic_sidebar('social-footer'); ?>
			</div>
		</div>
	</div>
</section>
<footer class="content-info">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
</footer>
