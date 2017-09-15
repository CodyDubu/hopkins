<?php use Roots\Sage\Titles; ?>
<?php if(is_front_page()){ ?>
<header class="banner">
  <div class="menu-bar">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-xs-12 col-md-3">
          <a class="brand" href="<?= esc_url(home_url('/')); ?>">
            <img src="<?php bloginfo('template_url'); ?>/assets/images/logo-front.png" class="img-fluid" alt="<?php bloginfo('name'); ?>" />
          </a>
        </div>
        <div class="col-xs-12 col-md-9">
          <div class="container">
            <div class="row justify-content-end no-gutters">
              <div class="col-md-10 text-right">
                <nav class="navbar navbar-toggleable-md navbar-light nav-primary text-right">
                  <a href="#" id="menu-toggle-close"><i class="fa fa-window-close-o" aria-hidden="true"></i> Close Menu</a>
                  <div id="bs4navbar">
                  <?php
                  wp_nav_menu([
                   'menu'            => 'top',
                   'theme_location'  => 'primary_navigation',
                   'menu_id'         => false,
                   'menu_class'      => 'nav justify-content-end',
                   'depth'           => 2,
                   'fallback_cb'     => 'bs4navwalker::fallback',
                   'walker'          => new bs4navwalker()
                  ]);
                  ?>
                  </div>
                  <a href="#" id="menu-toggle">Menu <i class="fa fa-bars" aria-hidden="true"></i></a>
                </nav>
              </div>
              <div class="col-md-2 search-hide">
                <?php get_search_form(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<?php masterslider(2); ?>
<?php }else{ ?>
<header class="banner">
  <div class="menu-bar">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-2">
          <a class="brand" href="<?= esc_url(home_url('/')); ?>">
            <img src="<?php bloginfo('template_url'); ?>/assets/images/logo_small_horizontal.png" class="img-fluid" alt="<?php bloginfo('name'); ?>" />
          </a>
        </div>
        <div class="col-xs-12 col-md-10">
          <div class="container" style="margin-right: 10px 0;">
            <div class="row justify-content-end no-gutters">
              <div class="col-md-12 text-right">
                <nav class="navbar navbar-toggleable-md navbar-light nav-primary text-right">
                  <a href="#" id="menu-toggle-close" class="fade-in"><i class="fa fa-window-close-o" aria-hidden="true"></i> Close Menu</a>
                  <div id="bs4navbar">
                  <?php
                  wp_nav_menu([
                   'menu'            => 'top',
                   'theme_location'  => 'primary_navigation',
                   'menu_id'         => false,
                   'menu_class'      => 'nav justify-content-end',
                   'depth'           => 2,
                   'fallback_cb'     => 'bs4navwalker::fallback',
                   'walker'          => new bs4navwalker()
                  ]);
                  ?>
                  </div>
                  <a href="#" id="menu-toggle" class="fade-in">Menu <i class="fa fa-bars" aria-hidden="true"></i></a>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<?php 
  if(is_home() || is_author() || is_single() || is_archive()){ ?>
    <div class="jumbotron jumbo-inner" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/images/back-default.jpg);" >
    <div class="container">
    <div class="row justify-content-center featured-blog-wrap">
      <div class="col-md-6">
      <?php if(is_page('events')){ ?>
        <h2>Event Calendar</h2>
      <?php }else{ ?>
        <h2><?= Titles\title(); ?></h2>
      <?php } ?>
      </div>
    </div>
  </div>
  <?php }else{
  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post(); 
      if ( has_post_thumbnail() ) {   
        // Get the post thumbnail URL
        $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
      } else {  
        // Get the default featured image in theme options
        $feat_image = get_bloginfo( 'stylesheet_directory' ). '/assets/images/back-default.jpg';
      }
}
wp_reset_postdata();
}
?>
    <div class="jumbotron jumbo-inner" style="background-image: url(<?php echo $feat_image; ?>);" >
      <div class="container">
          <div class="row justify-content-center featured-blog-wrap">
          <?php if(is_page(174) || is_page(188)){ ?>
          <div class="container">
            <div class="row align-items-center justify-content-start">
              <div class="col-md-6">
              <h2>News &amp; Events</h2>
              </div>
              <div class="col-md-6">
                <?php
                if( function_exists('fa_display_slider') ){
                    fa_display_slider( 161 );
                }
                ?> 
              </div>
            </div>
          </div>
          <?php } ?>
            <div class="col-md-6">
            <?php if ( have_posts() ) : while(have_posts()) : the_post(); ?>
              <h2><?php echo get_post_meta(get_the_ID(), 'header-title', true); ?></h2>
            <?php endwhile; else :?>
              <h2><?= Titles\title(); ?></h2>
            <?php endif; ?>
            </div>
          </div>
    </div>
<?php } // end while
?>
</div>
<?php } ?>