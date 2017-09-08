<?php
$post_id    = get_the_id();
$address    = get_post_meta( $post_id, 'address', true );
?>


<section class="sub-footer-meetup">
<div class="previous-symposium" id="pastSym">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2>View The 2016 Symposium</h2>
<a class="past-sym" href="#">Past Symposiums <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
</div>
</div>
</div>
</div>

<?php if ( $address ) { ?>
<div class="container" id="meetupDirection">
<div class="row justify-content-center no-gutters">
<div class="col-md-7 text-center">
<em>Johns Hopkins University, Welch Medical Library</em>
<address>
<?php echo nl2br( $address ); ?>
</address>
<a class="map-link" target="_blank" rel="noopener noreferrer" href="https://maps.google.com/?q=<?php echo nl2br( $address ); ?>"> <i class="fa fa-map-marker"></i> Get Directions</a>
</div>
</div>
</div>
<div class="container-fluid" id="meetupDirectionTwo">
<div class="row justify-content-center no-gutters">
<div class="col-md-4">
<address>
<?php echo nl2br( $address ); ?>
</address>
<a class="map-link" href="https://maps.google.com/?q=<?php echo nl2br( $address ); ?>"> <i class="fa fa-map-marker"></i> <span><?php echo nl2br( $address ); ?></span></a>
</div>
</div>
</div>
<?php } ?>

</section>
<footer class="content-info">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
</footer>
