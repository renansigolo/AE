<?php
/*
		Template Name: Home Page
*/
get_header();
?>

<?php
		$first_home_banner  = get_field( 'home_first_banner' );
		$second_home_banner = get_field( 'home_second_banner' );
		$third_home_banner  = get_field( 'home_third_banner' );

		// Section - About Us
		$about_title        = get_the_title( 6 );
		$about_post         = get_post( 6 );
		$about_content      = $about_post->post_content;
		$about_content      = apply_filters( 'the_content', $about_content );
		$about_featured_url = wp_get_attachment_url( get_post_thumbnail_id( 6 ) );
?>

<div class="page-home-container">
	<div class="home-container">
		<section class="container counting-numbers-container" id="start_count">
			<div class="row">
				<?php
				$args5 = array(
					'post_type'   => 'counting_numbers',
					'post_status' => 'publish',
					'orderby'     => 'date',
					'order'       => 'ASC',
				);

				$counting_items = new WP_Query( $args5 );
				while ( $counting_items->have_posts() ) :
					$counting_items->the_post();
					?>
				<div class="col-12 col-md-6 counting-item-container">
					<div class="counting-item mr-5">
						<p class="counter-value" data-count="<?php echo get_field( 'counting_number' ); ?>">0</p>
					</div>
					<div class="counting-label">
						<p>
							<?php echo get_field( 'first_label' ); ?> <?php echo the_title(); ?>
						</p>
					</div>
				</div>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</section>
		
		<section class="first-banner">
			<a href="https://academy-of-entrepreneurs.square.site/" target="blank">
				<img class="banner-bg-img" src="<?php echo $first_home_banner; ?>" alt="First Banner" />
			</a>
		</section>
		
		<section class="container mt-5 event-workshop">
					<div class="first-title">
						<h2><?php echo get_field( 'first_section_label_vertical' ); ?></h2>
					</div>
				<div class="row">
					<div class="col-12 ew-title">
						<h1><?php echo get_field( 'first_section_label_horizontal' ); ?></h1>
					</div>
					<div class="col-12 ew-body">
						<div class="row">
							<div class="col-12 events-container">
								<div class="row">
									<?php
									$meta_query = array(
										array(
											'key'     => 'event_date',
											'value'   => date( 'Ymd' ),
											'type'    => 'DATE',
											'compare' => '>=',
										),
									);
									$args       = array(
										'post_type'      => 'events_post_type',
										'post_status'    => 'publish',
										'posts_per_page' => 2,
										'meta_key'       => 'event_date',
										'meta_query'     => $meta_query,
									);

									$events = new WP_Query( $args );
									if ( $events->have_posts() ) {
										while ( $events->have_posts() ) {
											$events->the_post();
											$date     = get_field( 'event_date' );
											$price    = get_field( 'event_price' );
											$content  = get_the_content();
											$preview  = get_the_excerpt();
											$timefrom = get_field( 'time_from' );
											$timeTo   = get_field( 'time_to' );
											$sched    = $timefrom . ' - ' . $timeTo . ' AEST';
											$free     = get_field( 'is_it_free' );
											$location = get_field( 'event_location' );

											if ( $free == 'yes' ) {
												$price = 'Free';
											}
											?>
									<div class="col-12 col-md-6 event">
										<div class="card-like-no-padding">
										<a href="<?php echo get_field( 'event_bright_link' ); ?>" target="_blank">
											<div class="event-card">
											<div class="event-img">
													<img src="<?php the_post_thumbnail_url(); ?>" alt="Event Post Image">
												</div>
												<div class="event-info m-2 pb-2">
													<div class="event-date-author">
														<p id="date"><?php echo $date; ?></p>
														<p id="price"><?php echo $price; ?> </p>
													</div>
													<div class="event-location-time">
														<p id="sched"><?php echo $sched; ?></p>
														<p id="location"><?php echo $location; ?></p>
													</div>
													<div class="event-content mt-2">
														<h4><?php the_title(); ?></h4>
														<p>
														<?php
														if ( strlen( $preview ) <= 90 ) {
															echo $preview;
														} else {
															echo substr( $preview, 0, 90 ) . '...'; }
														?>
														</p>
													</div>
												</div>
											</div>
										</a>
								</div>
								</div>
											<?php
										}
									}
									wp_reset_query();
									?>
								<div class="col-12 text-center">
									<a href="<?php echo get_field( 'events_button_link' ); ?>" class="btn btn-primary btn-lg" role="button"><?php echo get_field( 'events_button_label' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="second-banner d-flex">
			<div class="container hashtag-container animate-title">
				<h2 class="m-0"><?php echo get_field( 'hashtag_text' ); ?></h2>
			</div>
		</section>

		<section class="pt-5 study-courses">
			<div class="container">
				<div class="first-title">
					<h2><?php echo get_field( 'courses_first_label_vertical' ); ?></h2>
				</div>
				<div class="row">
					<div class="col-12 courses-title">
						<h1><?php echo get_field( 'courses_first_label' ); ?></h1>
						<p id="course-first-desc"><?php echo get_field( 'courses_first_desc' ); ?></p>
					</div>
					<div class="col-12 courses-body">
						<div class="row">
							<div class="col-12 courses-container">
								<div class="row">
										<?php
										$terms = get_terms(
											'study_course',
											array(
												'order'  => 'DESC',
												'hide_empty' => 0,
												'parent' => 0,
											)
										);
										foreach ( $terms as $term ) {
											$termid     = $term->term_id;
											$termname   = $term->name;
											$pagePostID = get_field( 'study_course_page', $term->taxonomy . '_' . $term->term_id );
											$content    = get_post_field( 'post_content', $pagePostID );
											$img_url    = wp_get_attachment_url( get_post_thumbnail_id( $pagePostID ) );
											?>
											<div class="col-12 col-md-6 courses">
												<div class="card-like">
													<div class="row">
														<div class="col-12 col-md-6 courses-img">
															<img src="<?php echo $img_url; ?>" alt="Course Image">
														</div>
														<div class="col-12 col-md-6 d-flex flex-column justify-content-between courses-info">
																<div>
																	<h3><?php echo $termname; ?></h3>
																	<p><?php echo substr( $content, 0, 100 ) . ''; ?></p>
																</div>
																<a href="<?php echo get_permalink( $pagePostID ); ?>" class="btn btn-primary fw-bold w-100 mt-3" role="button">Learn More</a>
														</div>
													</div>
												</div>
											</div>
											<?php
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
		</section>

		<section class="container mt-3 third-banner">
			<img src="<?php echo $third_home_banner; ?>" class="img-fluid" alt="Third Banner" />
		</section>

		<hr />

		<section class="container mt-5 bootcamps-container">
			<div class="first-title">
				<h2><?php echo get_field( 'bootcamp_first_label_vertical' ); ?></h2>
			</div>
			<div class="row">
				<div class="col-12 bootcamps-title">
					<h1><?php echo get_field( 'bootcamp_first_label' ); ?></h1>
					<p id="bootcamp-first-desc"><?php echo get_field( 'bootcamp-first-desc' ); ?></p>
				</div>
				<div class="col-12  bootcamps-body">
					<div class="row">
						<div class="col-12 bootcamp-container">
							<div class="row">
									<?php
									$args2 = array(
										'post_type'      => 'bootcamps',
										'post_status'    => 'publish',
										'posts_per_page' => 4,
										'order'          => 'DESC',
									);

									$bootcamps = new WP_Query( $args2 );
									if ( $bootcamps->have_posts() ) {
										while ( $bootcamps->have_posts() ) {
											$bootcamps->the_post();
											$content  = get_the_content();
											$link     = get_field( 'header_button_link' );
											$date     = get_field( 'bootcamp_start_date' );
											$duration = get_field( 'bootcamp_structure_duration' );
											$time     = get_field( 'bootcamp_structure_time' );
											$location = get_field( 'bootcamp_structure_location' );
											$price    = get_field( 'bootcamp_structure_cost' );
											$day      = date( 'l', strtotime( $date ) );
											?>
									<div class="col-12 col-md-3 bootcamp" id ="<?php echo get_the_id(); ?>">
										<div class="card" style="height: 500px;">
											<a href="<?php echo $link; ?>" class="text-decoration-none" target="_blank">
												<img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" style="height: 220px; object-fit: cover;" alt="Card Image">
													<div class="card-body">
														<h5 class="card-title"><?php echo the_title(); ?></h5>

														<div class="bootcamp-info">
															<!-- <p id="date" style="font-weight: 300"><i class="fas fa-calendar-alt"></i><?php echo $date; ?></p> -->
															<p id="duration" style="font-weight: 300"><i class="fas fa-hourglass-start"></i><?php echo $duration; ?></p>
															<p id="time" style="font-weight: 300"><i class="far fa-clock"></i><?php echo $time; ?></p>
															<p id="location" style="font-weight: 300"><i class="fas fa-map-pin"></i><?php echo $location; ?></p>
															<p id="price" style="font-weight: 300"><i class="fas fa-tag"></i>
															<?php
															if ( $price != '' ) {
																	echo $price;
															} else {
																echo 'FREE';
															}
															?>
															</p>
														</div>
													</div>
											</a>
										</div>
									</div>
											<?php
										}
									}
									wp_reset_query();
									?>
									<div class="col-12 mt-4 text-center">
										<?php
										$link = get_field( 'bootcamp_see_all_button' );
										if ( $link ) :
											$link_url    = $link['url'];
											$link_title  = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
											?>
										<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-primary btn-lg" role="button"><?php echo esc_html( $link_title ); ?></a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</section>
		
		<section class="py-5 video-list-container">
			<div class="container">
				<div class="video-title">
					<h2 class="mb-4"><?php echo get_field( 'second_section_label_vertical' ); ?></h2>
				</div>
				
				<div class="video-displays">
					<div class="d-flex">
					<?php
						$args3 = array(
							'post_type'   => 'videos',
							'post_status' => 'publish',
						);

						$videos = new WP_Query( $args3 );
						while ( $videos->have_posts() ) :
							$videos->the_post();
							?>
					<div class="video-items">
						<div class="ratio ratio-16x9">
							<?php echo get_field( 'video_link' ); ?>
						</div>
						<div class="video-info">
							<h5><?php echo the_title(); ?></h5>
							<p><?php echo get_field( 'video_description' ); ?></p>
						</div>
					</div>
							<?php
					endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</section>

		<section class="py-5 about-us-new-body">
			<div class="container">
				<div class="col-12 about-us-container">
					<div class="row">
						<div class="col-12 text-center text-white mb-3"><h1 class="fw-bolder"><?php echo $about_title; ?></h1></div>
						<div class="col-12 col-md-6 about-img">
							<img src="<?php echo $about_featured_url; ?>" class="rounded" alt="About Us Image">
						</div>
						<div class="col-12 col-md-6 about-info">
							<p><?php echo $about_content; ?></p>
							<div class="about-us-btn">
								<a href="<?php echo home_url() . '/about'; ?>" class="btn btn-light btn-lg" role="button">Learn More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="container testimonial-container">
			<div class="col-12 testimonial-header">
				<h1><?php echo get_field( 'testimonial_label' ); ?></h1>
			</div>
			<div class="row">
				<div class="col-12 testimony-list">
					<?php
					$args4 = array(
						'post_type'   => 'testimonial',
						'post_status' => 'publish',
						'orderby'     => 'date',
					);

					$testimonial = new WP_Query( $args4 );
					while ( $testimonial->have_posts() ) :
						$testimonial->the_post();
						?>
					<div class="col-12 testimonials">
						<div class="row">
							<div class="col-12 col-md-6 testimony-img">
								<img src="<?php the_post_thumbnail_url(); ?>" alt="Testimony Image">
								<div class="country">
										<p><?php // the_title(); ?></p>
								</div>
							</div>
							<div class="col-12 col-md-6 testimony-info">
								<p><?php the_content(); ?></p>
								<div class="author">
									<p id='name'><?php the_title(); ?></p>
									<p id='desc'><?php echo get_field( 'description' ); ?></p>
								</div>
							</div>
						</div>
					</div>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				<div class="testimonial-navigation">
					<i class="fas fa-chevron-left" id="tm-left"></i>
					<i class="fas fa-chevron-right" id="tm-right"></i>
				</div>
				</div>
			</div>
		</section>
	</div>
</div>
<?php
get_footer();
?>
