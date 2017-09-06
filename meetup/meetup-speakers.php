<article id="presenter" <?php post_class(); ?>>

    <div class="meetup-content-wrap">

        <div class="meetup-speaker-listing">
            <?php
            $post_id    = get_the_id();
            $speakers = get_post_meta( get_the_id(), 'speakers' );
            $shortcode       = get_post_meta( $post_id, 'shortcode', true );

            if ( $speakers ) {
                ?>

                <div class="meetup-listing container">
                <div class="row">
                <?php echo do_shortcode( $shortcode); ?>
                </div>

                </div>

            <?php } else { ?>

                <?php _e( 'No speaker found!', 'meetup' ); ?>

            <?php } ?>

        </div>

    </div>

</article><!-- #post-<?php the_ID(); ?> -->