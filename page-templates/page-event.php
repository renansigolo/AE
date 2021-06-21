<?php
/*
		Template Name: Event Page
*/
get_header();

$selected_events = $_SESSION['set_which_event'];
?>
<div class="page-event-container">
	<div class="col-12 event-container-body">
		<div class="col-12 offset-md-1 col-md-10 event-container">
			<div class="row">
				<div class="col-12 event-title-header">
					<h1>EVENTS</h1>
				</div>
				<?php
					$txtEventSearch = '';
					if ( isset ($_GET['txtSearchEvent']) ) {
						$txtEventSearch = $_GET['txtSearchEvent'];
					}
					if ( isset ($_GET['dateSearchEvent']) ) {
						$txtsrchdate = $_GET['dateSearchEvent'];
					}

					if($txtEventSearch != '' || $txtsrchdate != ''){
					?>
						<div class="col-12 result-search">
							<h3>Result for: <br>
							<?php
								if ($txtEventSearch != ''){
									echo '<span><b>Search: </b>'.$txtEventSearch.'</span>';
								}
								if($txtsrchdate != ''){
									echo '<span><b>Date: </b>'.$txtsrchdate.'</span>';
								}
							?>
						</h3>
					</div>
					<?php
					}else {
					?>
					<div class="col-12 current-previous-btn">
						<p>
						<form class="" action="<?php echo home_url().'\events'; ?>" method="get">
							<input type="submit" id="current" name="btn_current" value="CURRENT EVENTS">
						</form>
						<p id="half">|</p>
						<form class="" action="<?php echo home_url().'\events'; ?>" method="get">
							<input type="submit" id="previous" name="btn_current" value="PREVIOUS EVENTS">
						</form>
					</p>
					</div>
				<?php
				}
				if($selected_events != 'PREVIOUS EVENTS'){
				?>
				<style media="screen">
					.current-previous-btn #current{
						color: #ec4e68;
					}
				</style>
				<div class="col-12 current-events">
					<div class="row">
						<?php
						if($txtEventSearch != '' || $txtsrchdate != ''){
							if($txtsrchdate != ''){
								$meta_query = array(
									array(
										'key' => 'event_date',
										'value' => $txtsrchdate,
										'type' => 'DATE',
										'compare' => '='
									)
								);
							}else {
								$meta_query = '';
							}

						}else{
							$meta_query = array(
								array(
									'key' => 'event_date',
									'value' => date('Ymd'),
									'type' => 'DATE',
									'compare' => '>='
								)
							);
						}

						$args = array(
							'post_type' => 'events_post_type',
							's' => $txtEventSearch,
							'post_status'=>'publish',
							'orderby' => 'date',
							'order' => 'ASC',
							'posts_per_page' => 4,
							'paged'          => get_query_var( 'paged' ),
							'meta_key' => 'event_date',
							'meta_query' => $meta_query
						);

						$events = new WP_Query( $args );
						if( $events->have_posts() ) {
						while( $events->have_posts() ) {
							$events->the_post();
							$date = get_field('event_date');
							$price = get_field('event_price');
							$content = get_the_content();
							$preview = get_the_excerpt();
							$timefrom = get_field('time_from');
							$timeTo = get_field('time_to');
							$sched = $timefrom .' - '.$timeTo.' AEST';
							$free = get_field('is_it_free');
							$location = get_field('event_location');

							if($free == 'yes'){
								$price = 'Free';
							}
						?>
						<div class="col-12 col-md-6 event-box">
							<div class="row">
								<div class="col-12 col-md-6 event-img">
									<img src="<?php the_post_thumbnail_url(); ?>" alt="">
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
										<a href="<?php echo get_field('event_bright_link');  ?>" target="_blank"><h4><?php the_title(); ?></h4></a>
										<p>
									<?php
								if (strlen($preview) <=90) {
									echo $preview;
								} else {
									echo substr($preview, 0, 90) . '...';
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
			<?php }else{ ?>
				<style media="screen">
					.current-previous-btn #previous{
						color: #ec4e68;
					}
				</style>
				<div class="col-12 previous-events">
					<div class="row">
						<?php
						$meta_query = array(
							array(
								'key' => 'event_date',
								'value' => date('Ymd'),
								'type' => 'DATE',
								'compare' => '<='
							)
						);
						$args = array(
							'post_type' => 'events_post_type',
							's' => $txtEventSearch,
							'post_status'=>'publish',
							'orderby' => 'date',
							'order' => 'DESC',
							'posts_per_page' => 4,
							'paged'          => get_query_var( 'paged' ),
							'meta_key' => 'event_date',
							'meta_query' => $meta_query
						);

						$events = new WP_Query( $args );
						if( $events->have_posts() ) {
						while( $events->have_posts() ) {
							$events->the_post();
							$date = get_field('event_date');
							$content = get_the_content();
							$preview = get_the_excerpt();
							$timefrom = get_field('time_from');
							$timeTo = get_field('time_to');
							$sched = $timefrom .' - '.$timeTo.' AEST';
						?>
						<div class="col-12 col-md-6 event-box">
							<div class="row">
								<div class="col-12 col-md-6 event-img">
									<img src="<?php the_post_thumbnail_url(); ?>" alt="">
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
										<a href="<?php echo get_field('event_bright_link');  ?>" target="_blank"><h4><?php the_title(); ?></h4></a>
										<p>
												<?php
											if (strlen($preview) <=90) {
												echo $preview;
											} else {
												echo substr($preview, 0, 90) . '...';
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
				<?php
				}
				?>
			</div>
		</div>
</div>
</div>

<?php
get_footer();
?>
