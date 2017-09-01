<?php
/**
 * You can override this template
 *
 * If you would like to edit this file, copy it to your current theme's directory in "meetup" folder and edit it there.
 * Meetup will always look in your theme's directory first, before using this default template.
 *
 * @package Meetup
 */
?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				$part = 'content';
				$speaker = 'speakers';
				$schedule = 'schedule';

				if ( meetup_is_sponsor_page() ) {
					$part = 'sponsors';

				} elseif ( meetup_is_attendies_page() ) {
					$part = 'attendies';

				} elseif ( meetup_is_gallery_page() ) {
					$part = 'gallery';
				}

				$part = apply_filters( 'meetup_single_template_part', $part );
				$speaker = apply_filters( 'meetup_single_template_part', $speaker );
				$schedule= apply_filters( 'meetup_single_template_part', $schedule ); ?>

				<?php meetup_get_template_part( 'meetup', $part ); ?>
				<hr>
				<?php meetup_get_template_part( 'meetup', $speaker ); ?>
				<hr>
				<?php meetup_get_template_part( 'meetup', $schedule ); ?>
				?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
