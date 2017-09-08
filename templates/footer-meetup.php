<?php
$post_id    = get_the_id();
$address    = get_post_meta( $post_id, 'address', true );
$pfx_date = get_the_date('Y', $post_id ); 

$past_query = new WP_Query( array(
    'post_type' => 'meetup',
    'order' => 'ASC',
    'posts_per_page' => -1,
    'date_query' => array(
        array(
            'before' => $pfx_date,
        )
    ),
) );
?>


<section class="sub-footer-meetup">
<?php if ($past_query->have_posts()) { ?>
	<?php while($past_query->have_posts()) : $past_query->the_post(); ?>
		<div class="previous-symposium" id="pastSym" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<?php $year = the_date('Y', '<h2>View The ', ' Symposium</h2>'); ?>
						<?php echo $year; ?> 
						<a class="past-sym" href="<?php the_permalink() ?>">Past Symposiums <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
<?php }else{ ?>
	<div class="previous-symposium" id="pastSym" style="background-color: #061458;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
		<h2>No Previous Symposiums</h2>
		<a class="past-sym" href="#wrapper">Return to Top <i class="fa fa-arrow-up" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php wp_reset_postdata(); ?>

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
