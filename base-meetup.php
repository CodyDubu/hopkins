<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <div id="wrapper" class="sym-wrap">
            <div class="meetup-navigation-fixed">
            <div class="meetup-navigation-fixed-wrap">
            <a href="#" id="menu-toggle-two"><i class="fa fa-bars" aria-hidden="true" ></i> Menu</a>
            <a href="#presenter">Presenters</a>
            <a href="#program">Program</a>
            <a class="brand text-center" href="#wrapper">
              <img src="<?php bloginfo('template_url'); ?>/assets/images/logo-purp.png" class="img-fluid" alt="<?php bloginfo('name'); ?>" />
            </a>
            <a href="#pastSym">Symposiums</a>
            <a href="#meetupDirection">Contact</a>
            <a class="register" href="#">Register Now <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            </div>
            </div>
      <div id="sidebar-wrapper">
      <div class="container">
      <button class="close-btn"><i class="fa fa-window-close-o" aria-hidden="true"></i></button>
      <?php get_search_form(); ?>
         <?php
          wp_nav_menu([
           'menu'            => 'top',
           'theme_location'  => 'secondary_navigation',
           'menu_id'         => false,
           'menu_class'      => 'sidebar-nav',
           'depth'           => 2,
           'fallback_cb'     => 'bs4navwalker::fallback',
           'walker'          => new bs4navwalker()
          ]);
        ?>
        </div>
      </div>
      <div id="page-content-wrapper" class="page-content-wrapper-inner">
        <?php
          do_action('get_header');
          get_template_part('templates/header-meetup');
        ?>
        <?php if (Setup\display_sidebar()) : ?>
        <div class="wrap sidebar-side" role="document">
        <?php else: ?>
        <div class="wrap container no-sidebar" role="document">
        <?php endif; ?>
        <?php if(is_front_page()){ ?>
          <div class="content row">
          <?php }else{ ?>
          <div class="content">
          <?php }?>
            <main class="main">
              <?php include Wrapper\template_path(); ?>
            </main><!-- /.main -->
          </div><!-- /.content -->
        </div><!-- /.wrap -->
        <?php
          do_action('get_footer');
          get_template_part('templates/footer-meetup');
          wp_footer();
        ?>
        </div>
      </div>
  </body>
</html>
<link rel="stylesheet" type="text/css" href="/wp-content/themes/hopkins/safari-fix.css" />
