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
    <div id="wrapper">
      <div id="sidebar-wrapper">
      <div class="container">
      <button class="close-btn"><i class="fa fa-window-close-o" aria-hidden="true"></i><span>Close Menu</span></button>
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
      <?php if(is_front_page()){ ?>
      <div id="page-content-wrapper">
        <?php }else{ ?>
      <div id="page-content-wrapper" class="page-content-wrapper-inner">
        <?php
          }
          do_action('get_header');
          get_template_part('templates/header');
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
            <?php if (Setup\display_sidebar()) : ?>
              <aside class="sidebar">
                <?php include Wrapper\sidebar_path(); ?>
              </aside><!-- /.sidebar -->
            <?php endif; ?>
            <main class="main">
              <?php include Wrapper\template_path(); ?>
            </main><!-- /.main -->
          </div><!-- /.content -->
        </div><!-- /.wrap -->
        <?php
          do_action('get_footer');
          get_template_part('templates/footer');
          wp_footer();
        ?>
        </div>
      </div>
  </body>
</html>
