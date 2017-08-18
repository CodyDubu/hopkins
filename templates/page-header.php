<?php use Roots\Sage\Titles; ?>
<?php if(is_front_page()){ ?>
<?php }elseif(is_home() || is_category()){ ?>
<div class="container inner-contain">
<div class="row">
<div class="col-md-12">
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