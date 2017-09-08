<?php use Roots\Sage\Titles; ?>
<header class="banner">
  <div class="menu-bar">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 mobile-fix">
          <div class="container">
            <div class="row justify-content-end no-gutters">
              <div class="col-md-12 menu-cnt">
                <nav class="navbar navbar-toggleable-md navbar-light nav-primary text-left">
                  <a href="#" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true" ></i> Menu</a>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 mobile-fix">
          <a class="brand text-center" href="<?= esc_url(home_url('/')); ?>">
            <img src="<?php bloginfo('template_url'); ?>/assets/images/logo.png" class="img-fluid" alt="<?php bloginfo('name'); ?>" />
          </a>
        </div>
        <div class="col-md-4 text-right menu-cnt mobile-fix">
          <a class="register" href="#">Register Now <i class="fa fa-arrow-right" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</header>