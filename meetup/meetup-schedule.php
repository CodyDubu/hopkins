<article id="program" <?php post_class(); ?>>
    <div class="meetup-content-wrap">
        <div class="meetup-schedule-listing">
            <?php
            $schedules = get_post_meta( get_the_id(), 'schedule' );
            $days = array();

            if ( $schedules ) {
                foreach ($schedules as $schedule) {
                    $date = date( 'Ymd', $schedule['time'] );

                    $days[$date][] = $schedule;
                } ?>
                <div class="container">
                <h2 class="block-back">Programs</h2>
                <div id="timeline" class="row">
                <div class="dates-back col-md-6">
                <a href="#" id="next"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> <!-- optional -->
                <ul id="dates">  
                    <?php foreach ($days as $date => $day_events) {
                        $this_day = date_i18n( 'F j, Y', strtotime( $date ) ); 
                        
                            foreach ($day_events as $key=>$agenda) { ?>   
                            <li>
                                <a href="#date<?php echo $key; ?>">             
                                    <span class="text-left date-time"><?php echo date_i18n( 'g:i a', $agenda['time'] ); ?></span>
                                    <span class="text-left date-agenda"><?php echo $agenda['agenda']; ?></span>  
                                </a>
                            </li>     
                            <?php } 
                    } ?>
                </ul>
                <a href="#" id="prev"><i class="fa fa-chevron-up" aria-hidden="true"></i></a> <!-- optional -->
                </div>
                <ul id="issues" class="col-md-6">
                    <?php foreach ($days as $date => $day_events) {
                    $this_day = date_i18n( 'F j, Y', strtotime( $date ) );
                        foreach ($day_events as $key=>$agenda) { ?>    
                        <li id="date<?php echo $key; ?>">           
                                <span><?php echo wp_kses_post( $agenda['comments'] ); ?></span>
                                </li>
                        <?php } 
                    } ?>  
                </ul>
                </div>
                </div>
            <?php } else {
                _e( 'No schedules have been made yet!', 'meetup' );
            }


            // var_dump( $schedule );
            // var_dump( $days );
            ?>
        </div>

    </div>

</article><!-- #post-<?php the_ID(); ?> -->
