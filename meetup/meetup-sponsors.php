<article id="posters" <?php post_class(); ?>>
<h2>Poster Presentations</h2>
        <div class="container">
            <?php
            $speakers = get_post_meta( get_the_id(), 'speakers' );

            if ( $speakers ) {
                ?>

                <div class="row">

                <?php foreach ($speakers as $speaker) { ?>


                        <div class="col-md-6">
                            <div class="row no-gutters">
                                <div class="col-md-1">
                                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                </div>
                                <div class="col-md-11">
                                    <h4 class="topic-name"><?php echo $speaker['preTitle'] ?></h4>
                                    <h5 class="topic-name">Presenter: <?php echo $speaker['presenterInfo'] ?></h5>
                                </div>
                            </div>
                        </div>

                <?php } ?>

                </div>

            <?php } else { ?>

                <?php _e( 'No speaker found!', 'meetup' ); ?>

            <?php } ?>

        </div>

</article><!-- #post-<?php the_ID(); ?> -->