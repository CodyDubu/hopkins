<?php use Roots\Sage\Titles; ?>
<?php if(is_front_page()){ ?>
<?php }elseif(is_home() || is_category()){ ?>
<div class="container inner-contain">
<div class="row">
<div class="col-md-12">
<div class="page-header-mobile">
  <a href="#" class="inner-mobile-toggle">Sidebar Menu</a>
</div>
<?php }elseif(is_page(238) || is_page(243) || is_page(247) || is_page(245)){ ?>
<div class="container inner-contain">
<div class="row fade-in">
<div class="col-md-12">

<div class="dropdown text-right">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Sort by
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="<?= esc_url(home_url('/')); ?>people/faculty/"">Faculty</a>
    <a class="dropdown-item" href="<?= esc_url(home_url('/')); ?>people/postdocs/">Postdocs</a>
    <a class="dropdown-item" href="<?= esc_url(home_url('/')); ?>people/staff/">Staff</a>
    <a class="dropdown-item" href="<?= esc_url(home_url('/')); ?>people/students/">Students</a>
  </div>
</div>
<div class="page-header-mobile">
  <a href="#" class="inner-mobile-toggle">Sidebar Menu</a>
</div>
<?php }else{ ?>
<div class="container-fluid inner-contain">
<div class="row no-gutter">
<div class="col-md-12">
<div class="page-header-mobile">
  <a href="#" class="inner-mobile-toggle">Sidebar Menu</a>
</div>
<?php } ?>