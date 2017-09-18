<?php do_action( 'meetup_before_header' ); ?>
<?php
$post_id    = get_the_id();

$secondTitle       = get_post_meta( $post_id, 'secondTitle', true );
$from       = get_post_meta( $post_id, 'from', true );
$to         = get_post_meta( $post_id, 'to', true );
$capacity   = get_post_meta( $post_id, 'capacity', true );
$location   = get_post_meta( $post_id, 'location', true );
$reg_starts = get_post_meta( $post_id, 'reg_starts', true );
$reg_ends   = get_post_meta( $post_id, 'reg_ends', true );
$book_limit = get_post_meta( $post_id, 'book_limit', true );

$current_time = time();
$same_day   = true;

if ( date( 'dmY', $from ) !== date( 'dmY', $to ) ) {
    $same_day = false;
}
?>
<header class="meetup-entry-header">
    <div class="meetup-cover-wrap">
        <div class="meetup-cover">
            <?php if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'full', ['class' => 'img-fluid', 'title' => 'Feature image'] );
            } ?>
        </div>

        <div class="meetup-event-header">
            <div class="meetup-content-wrap">
                    <div class="meetup-col-right">
                <ul>
                    <li>
                        <div class="meetup-icon">
                            <i class="fa fa-calendar"></i>
                        </div>

                        <div class="meetup-details">
                            <a class="meetup-add-to-calendar" href="#"><?php echo date_i18n( 'F j, Y', $from ); ?></a>

                            <div class="meetup-add-calendar-wrap">
                                <?php
                                $gmt_offset = get_option( 'gmt_offset' ) * HOUR_IN_SECONDS;

                                $google_calendar = add_query_arg( array(
                                    'text'     => urlencode( get_the_title() ),
                                    'dates'    => date( "Ymd\THis\Z", ( $from + $gmt_offset ) ) . '/' . date( "Ymd\THis\Z", ($to + $gmt_offset) ),
                                    'details'  => urlencode( sprintf( __( 'For details, link here: %s', 'meetup' ), get_permalink() ) ),
                                    'location' => urlencode( $address )
                                ), 'https://www.google.com/calendar/render?action=TEMPLATE' );

                                $ical_ics = add_query_arg( array(
                                    'meetup_action' => 'ical_gen',
                                    '_wpnonce'      => wp_create_nonce( 'meetup-ical-gen' )
                                ), get_permalink() );
                                ?>
                                <ul class="meetup-calendar-provider">
                                    <li><a href="<?php echo $google_calendar; ?>" target="_blank" rel="nofollow"><?php _e( 'Google Calendar', 'meetup' ); ?></a></li>
                                    <li><a href="<?php echo $ical_ics; ?>"><?php _e( 'Apple iCal', 'meetup' ); ?></a></li>
                                    <li><a href="<?php echo $ical_ics; ?>"><?php _e( 'Microsoft Outlook', 'meetup' ); ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <?php if ( $address ) { ?>
                        <li>
                            <div class="meetup-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>

                            <div class="meetup-details">
                                <address>
                                    <?php echo nl2br( $address ); ?>
                                </address>

                                <?php if ( $location ) { ?>
                                    <div id="meetup-map"></div>

                                    <script type="text/javascript">
                                        jQuery(function($){
                                            var curpoint = new google.maps.LatLng(<?php echo $location['lat']; ?>, <?php echo $location['long']; ?>);

                                            var gmap = new google.maps.Map( $('#meetup-map')[0], {
                                                center: curpoint,
                                                zoom: 17,
                                                mapTypeId: window.google.maps.MapTypeId.ROADMAP
                                            });

                                            var marker = new window.google.maps.Marker({
                                                position: curpoint,
                                                map: gmap,
                                                draggable: true
                                            });
                                        });
                                    </script>
                                <?php } ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div><!-- .meetup-col-right -->
            </div>
            <div class="meetup-date-title-wrap">
                <div class="meetup-title">
                    <div class="meetup-entry-title">
                    <?php if ( is_singular( 'meetup' ) ) { ?>
                        <h3>The Johns Hopkins Research Symposium</h3>
                        <h1><?php the_title(); ?></h1>
                        <h2>"<?php echo $secondTitle; ?>"</h2>
                    <?php } else { ?>
                        <h3>The Johns Hopkins Research Symposium</h3>
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1> 
                        <h2>"<?php echo $secondTitle; ?>"</h2>
                    <?php } ?>
                    </div>
                </div>
            </div><!-- .meetup-date-title-wrap -->
         </div><!-- .meetup-event-header -->
    </div><!-- .meetup-cover-wrap -->

    <div class="meetup-nav-wrap">
        <div class="meetup-nav">
            <ul class="meetup-navigation">
            <li><a href="#presenter">Presenters</a></li>
            <li><a href="#program">Program</a></li>
            <li><a href="#pastSym">Past Symposiums</a></li>
            <li><a href="#meetupDirection">Directions &amp; Contact</a></li>
            </ul>
        </div><!-- .meetup-nav -->

        <?php
        $capacity       = meetup_get_capacity( $post_id );
        $booked         = meetup_num_booked_seat( $post_id );
        $seat_available = meetup_num_available_seat( $post_id );
        ?>

        <!-- <div class="meetup-actions-wrap">
            <ul class="meetup-actions">
                <li>
                    <div class="meetup-count"><?php echo $capacity; ?></div>
                    <div class="meetup-span-text"><?php _e( 'Capacity', 'meetup' ); ?></div>
                </li>
                <li>
                    <div class="meetup-count"><?php echo $booked; ?></div>
                    <div class="meetup-span-text"><?php _e( 'Booked', 'meetup' ); ?></div>
                </li>
                <li>
                    <div class="meetup-count"><?php echo $seat_available; ?></div>
                    <div class="meetup-span-text"><?php _e( 'Available', 'meetup' ); ?></div>
                </li>
            </ul>
        </div>.meetup-actions-wrap -->
    </div><!-- .meetup-nav-wrap -->

</header><!-- .meetup-entry-header -->

<?php do_action( 'meetup_after_header' ); ?>