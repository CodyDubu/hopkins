<?php function is_tribe_calendar() { } // detect if we're on an Events Calendar page ?>
<?php if(is_home()){ ?>
<div class="page-header-mobile">
  <a href="#" class="inner-mobile-toggle">Close Menu</a>
</div>
	<?php dynamic_sidebar('sidebar-blog');
}elseif(is_page(7)){

}elseif(tribe_is_event() || tribe_is_event_category() || tribe_is_in_main_loop() || tribe_is_view() || 'tribe_events' == get_post_type() || is_singular( 'tribe_events' )) { ?>
<div class="inner-contain">
<div class="page-header-mobile">
  <a href="#" class="inner-mobile-toggle">Close Menu</a>
</div>
<?php dynamic_sidebar('sidebar-blog'); ?>
</div>
<?php }elseif(is_page(174) || is_page(188) || is_archive() || is_single()){ ?>
<div class="page-header-mobile">
  <a href="#" class="inner-mobile-toggle">Close Menu</a>
</div>
  <?php wp_nav_menu([
   'menu'            => 'top',
   'theme_location'  => 'news_navigation',
   'menu_id'         => false,
   'menu_class'      => 'nav',
   'depth'           => 2,
   'fallback_cb'     => 'bs4navwalker::fallback',
   'walker'          => new bs4navwalker()
  ]);      
}else{ ?>
<div class="page-header-mobile">
  <a href="#" class="inner-mobile-toggle">Close Menu</a>
</div>
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
<div class="page-header-mobile">
  <a href="#" class="inner-mobile-toggle">Close Menu</a>
</div>
<h3>Contact</h3>
<div class="email-wrap contact-email">
	<div class="broch container">
	<a href="tel:410-516-5117"><i class="fa fa-mobile" aria-hidden="true"></i> 410-516-5117</a>
	<a href="mailto:malonecenter@jhu.edu"><i class="fa fa-envelope" aria-hidden="true"></i> malonecenter@jhu.edu</a>
	 <a style="border-bottom:0;align-items: flex-start;" href="https://www.google.com/maps/search/3400+North+Charles+Street+Baltimore,+MD+21218-2608/@39.32835,-76.6226535,17z/data=!3m1!4b1" target="_blank" rel="noopener noreferrer"><i class="fa fa-map-marker" aria-hidden="true"></i> <address>3400 North Charles Street<br>Baltimore, MD 21218-2608</address></a>
	<?php echo FrmFormsController::get_form_shortcode( array( 'id' => 8, 'title' => false, 'description' => false ) ); ?>
	</div>
</div>
<?php } ?>
