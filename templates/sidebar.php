<?php if(is_home()){
	dynamic_sidebar('sidebar-blog');
}elseif(is_page(7)){

}elseif(is_page(174) || is_page(188) || is_archive()){
  wp_nav_menu([
   'menu'            => 'top',
   'theme_location'  => 'news_navigation',
   'menu_id'         => false,
   'menu_class'      => 'nav',
   'depth'           => 2,
   'fallback_cb'     => 'bs4navwalker::fallback',
   'walker'          => new bs4navwalker()
  ]);      
}else{ ?>
<h3>
<?php 	
$current = $post->ID;
$parent = $post->post_parent;
$grandparent_get = get_post($parent);
$grandparent = $grandparent_get->post_parent;

if ($root_parent = get_the_title($grandparent) !== $root_parent = get_the_title($current)) {
	echo get_the_title($grandparent);
}else {
	echo get_the_title($parent); 
	}
?>
</h3>
<?php
    if ($post->post_parent) {
        $page = $post->post_parent;
    } else {
        $page = $post->ID;
    }

    $children = wp_list_pages(array(
        'child_of' => $page,
        'echo' => '0',
        'title_li' => ''
    ));

    if ($children) {
        echo "<ul>\n".$children."</ul>\n";
    } 
} ?>
<?php if(is_page(7)){ ?>
<h3>Contact</h3>
<div class="email-wrap contact-email">
	<div class="broch container">
	<a href="tel:410-516-5117"><i class="fa fa-mobile" aria-hidden="true"></i> 410-516-5117</a>
	<a href="mailto:malonecenter@jhu.edu"><i class="fa fa-envelope" aria-hidden="true"></i> malonecenter@jhu.edu</a>
	<a style="border-bottom:0;align-items: flex-start;" href="http://maps.google.com/maps"><i class="fa fa-map-marker" aria-hidden="true"></i> <address>3400 North Charles Street<br>Baltimore, MD 21218-2608</address></a>
	<?php echo FrmFormsController::get_form_shortcode( array( 'id' => 8, 'title' => false, 'description' => false ) ); ?>
	</div>
</div>
<?php }else{ ?>
<div class="email-wrap">
	<div class="broch container">
		<div class="row no-gutters">
			<div class="col-md-3">
				<img src="<?php bloginfo('template_url'); ?>/assets/images/logo-purp.png" class="img-fluid" alt="<?php bloginfo('name'); ?>" />
			</div>
			<div class="col-md-9">
				<h3>Want more info?<br> Download our brochure...</h3>
			</div>
		</div>
		<?php echo do_shortcode('[formidable id=5]'); ?>
	</div>
</div>
<?php } ?>
