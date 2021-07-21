<?php
/*
		Template Name: Event Page
*/
get_header();

?>
<div class="page-event-container">
	<div class="col-12 event-container-body">
		<div class="col-12 offset-md-1 col-md-10 event-container">
			<div class="row">
				<div class="col-12 event-title-header">
					<h1>EVENTS</h1>
				</div>

				<style media="screen">
					.current-previous-btn #previous{
						color: var(--pink);
					}
				</style>
				<div class="col-12 previous-events">
					<div class="row">
						<?php
						$args       = array(
							'post_type'      => 'events_post_type',
							's'              => $txtEventSearch,
							'post_status'    => 'publish',
							'orderby'        => 'date',
							'order'          => 'DESC',
							'posts_per_page' => 4,
							'paged'          => get_query_var( 'paged' ),
							'meta_key'       => 'event_date',
							'meta_query'     => $meta_query,
						);

						$events = new WP_Query( $args );
						if ( $events->have_posts() ) {
							while ( $events->have_posts() ) {
								$events->the_post();
								$date     = get_field( 'event_date' );
								$content  = get_the_content();
								$preview  = get_the_excerpt();
								$timefrom = get_field( 'time_from' );
								$timeTo   = get_field( 'time_to' );
								$sched    = $timefrom . ' - ' . $timeTo . ' AEST';
								?>
						<div class="col-12 col-md-6 event-box">
							<div class="row">
								<div class="col-12 col-md-6 event-img">
									<img src="<?php the_post_thumbnail_url(); ?>" alt="Event Image">
								</div>
								<div class="col-12 col-md-6 event-info">
									<div class="event-date-author">
										<p id="date"><?php echo $date; ?></p>
										<p id="price"><?php echo $price; ?> </p>
									</div>
									<div class="event-location-time">
										<p id="sched"><?php echo $sched; ?></p>
										<p id="location"><?php echo $location; ?></p>
									</div>
									<div class="event-content">
										<a href="<?php echo get_field( 'event_bright_link' ); ?>" target="_blank"><h4><?php the_title(); ?></h4></a>
										<p>
												<?php
												if ( strlen( $preview ) <= 90 ) {
													echo $preview;
												} else {
													echo substr( $preview, 0, 90 ) . '...';
												}
												?>
									 </p>
									</div>
								</div>
							</div>
						</div>
								<?php
							}
							echo '<div class="col-12 page-navigation">';
							wp_pagenavi( array( 'query' => $events ) );
							echo '</div>';
						}
						wp_reset_query();
						?>
					</div>
				</div>

			</div>
		</div>
</div>
</div>

<?php
get_footer();
?>
