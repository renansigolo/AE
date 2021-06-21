<?php
/*
		Template Name: Home Page
*/
get_header();
?>
<div class="page-home-container">
	<div class="small-polygon">
		<img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="">
	</div>
	<div class="offset-md-1 col-md-10 home-container">
	<div class="background-img">
		<div class="col-12 counting-numbers-container" id="start_count">
			<div class="row">
				<?php
				$args5 = array(
					'post_type' => 'counting_numbers',
					'post_status'    => 'publish',
					'orderby' => 'date',
					'order' => 'ASC'
				);

				$counting_items = new WP_Query( $args5 );
				while ( $counting_items->have_posts() ) : $counting_items->the_post();
				?>
				<div class="col-12 col-md-3 counting-item-container">
					<div class="first-item-label">
						<p><?php echo get_field('first_label');?></p>
					</div>
					<div class="counting-item">
						<p class="counter-value" data-count="<?php echo get_field('counting_number');?>">0</p>
					</div>
					<div class="second-item-label">
						<p><?php echo the_title(); ?></p>
					</div>
				</div>
				<?php
						// the_content();
				endwhile;

				// Reset Post Data
				wp_reset_postdata();
				?>
			</div>
		</div>
		<?php
		$first_home_banner = get_field('home_first_banner');
		$second_home_banner = get_field('home_second_banner');
		$third_home_banner = get_field('home_third_banner');
		?>
		<div class="col-12 first-banner">
		<a href="https://academy-of-entrepreneurs.square.site/" target="blank">
			<img class="banner-bg-img" src="<?php echo $first_home_banner; ?>" />
		</a>
		</div>
		<div class="col-12 mt-5 event-workshop">
			<!-- <div class="light-orange-background"></div> -->
			<div class="col-12 first-title">
				<h1><?php echo get_field('first_section_label_vertical');?></h1>
			</div>
				<div class="row">
					<div class="col-12 ew-title">
						<h1><?php echo get_field('first_section_label_horizontal');?></h1>
					</div>
					<div class="col-12  ew-body">
						<div class="row">
							<div class="col-12 events-container">
								<div class="row">
									<?php
									$meta_query = array(
										array(
											'key' => 'event_date',
											'value' => date('Ymd'),
											'type' => 'DATE',
											'compare' => '>='
										)
									);
									$args = array(
										'post_type' => 'events_post_type',
										'post_status'=>'publish',
										'orderby' => 'rand',
										'posts_per_page' => 2,
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
									<div class="col-12 col-md-6 event">
										<div class="card-like-no-padding">
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
								</div>
								<?php
									}
								}
								wp_reset_query();
								?>
								<div class="col-12 event-btn">
									<a href="<?php echo get_field('events_button_link'); ?>"><button class="btn-link-general"><?php echo get_field('events_button_label'); ?></button></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-12 second-banner">
			<div class="coral-background"></div>
			<div class="col-12 hashtag-container">
				<h1><?php echo get_field('hashtag_text'); ?></h1>
			</div>
		</div>

		<div class="col-12 pt-5 study-courses">
			<div class="light-coral-background"></div>
			<div class="col-12 first-title">
				<h1><?php echo get_field('courses_first_label_vertical');?></h1>
			</div>
			<div class="row">
				<div class="col-12 courses-title">
					<h1><?php echo get_field('courses_first_label');?></h1>
					<p id="course-first-desc"><?php echo get_field('courses_first_desc');?></p>
				</div>
				<div class="col-12  courses-body">
					<div class="row">
						<div class="col-12 courses-container">
							<div class="row">
									<?php
									$terms = get_terms('study_course', array('order' => 'DESC','hide_empty' => 0, 'parent' =>0));
									foreach ( $terms as $term ) {
										$termid = $term->term_id;
										$termname = $term->name;
										$pagePostID = get_field('study_course_page',$term->taxonomy . '_' . $term->term_id);
										$content = get_post_field('post_content', $pagePostID);
										$img_url = wp_get_attachment_url( get_post_thumbnail_id($pagePostID) );
									?>
										<div class="col-12 col-md-6 courses">
											<div class="card-like">
												<div class="row">
													<div class="col-12 col-md-6 courses-img">
														<img src="<?php echo $img_url; ?>" alt="">
													</div>
													<div class="col-12 col-md-6 courses-info">
														<!-- <div class="courses-date-author">
														</div> -->
														<div class="courses-content">
															<h3><?php echo $termname ?></h3>
															<p><?php echo substr($content, 0, 100).""; ?></p>
															<div class="courses-read-more">
																<a href="<?php echo get_permalink($pagePostID); ?>"><button class="btn-link-general">LEARN MORE</button></a>
															</div>
														</div>
												</div>
												</div>
											</div>
									</div>
									<?php
									}
									?>
									<!-- <div class="col-12 courses-btn">
										<a href="<?php echo get_permalink($pagePostID); ?>"><button class="btn-link-general"><?php echo get_field('events_button_label'); ?></button></a>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>

		<div class="col-12 mt-3 third-banner">
			<img src="<?php echo $third_home_banner; ?>" class="img-fluid" alt="Third Banner" />
		</div>

		<hr />

		<div class="col-12 mt-5 bootcamps-container">
			<!-- <div class="light-orange-background"></div> -->
			<div class="col-12 first-title">
				<h1><?php echo get_field('bootcamp_first_label_vertical');?></h1>
			</div>
			<div class="row">
				<div class="col-12 bootcamps-title">
					<h1><?php echo get_field('bootcamp_first_label');?></h1>
					<p id="bootcamp-first-desc"><?php echo get_field('bootcamp-first-desc');?></p>
				</div>
				<div class="col-12  bootcamps-body">
					<div class="row">
						<div class="col-12 bootcamp-container">
							<div class="row">
									<?php
									$args2 = array(
										'post_type' => 'bootcamps',
										'post_status' => 'publish',
										'posts_per_page' => 4,
										'orderby' => 'rand',
										'order'    => 'ASC'
									);

									$bootcamps = new WP_Query( $args2 );
									if( $bootcamps->have_posts() ) {
										while( $bootcamps->have_posts() ) {
											$bootcamps->the_post();
											// $date = get_field('bootcamp_start_date');
											// $day = date('l', strtotime($date));
											$content = get_the_content();
											$date = get_field('bootcamp_start_date');
											$duration = get_field('bootcamp_structure_duration');
											$time = get_field('bootcamp_structure_time');
											$location = get_field('bootcamp_structure_location');
											$price = get_field('bootcamp_structure_cost');
											$day = date('l', strtotime($date));
									?>
									<div class="col-12 col-md-3 bootcamp" id ="<?php echo get_the_id(); ?>">
										<div class="card" style="height: 500px;">
											<img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" style="height: 220px; object-fit: cover;" alt="Card Image">
												<div class="card-body">
													<a href="<?php the_permalink(); ?>" class="text-decoration-none">
														<h5 class="card-title"><?php echo the_title(); ?></h5>
													</a>

													<div class="bootcamp-info">
														<!-- <p id="date" style="font-weight: 300"><i class="fas fa-calendar-alt"></i><?php echo $date; ?></p> -->
														<p id="duration" style="font-weight: 300"><i class="fas fa-hourglass-start"></i><?php echo $duration; ?></p>
														<p id="time" style="font-weight: 300"><i class="far fa-clock"></i><?php echo $time; ?></p>
														<p id="location" style="font-weight: 300"><i class="fas fa-map-pin"></i><?php echo $location; ?></p>
														<p id="price" style="font-weight: 300"><i class="fas fa-tag"></i><?php
														if($price != ""){
																echo $price;
														}else{
															echo "FREE";
														}
														?></p>
													</div>
												</div>
										</div>
									</div>
									<?php
										}
									}
									wp_reset_query();
									?>
									<div class="col-12 mt-4 bootcamp-btn">
										<?php
										$link = get_field('bootcamp_see_all_button');
										if( $link ):
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
											?>
										<a href="<?php echo esc_url($link_url); ?>"><button class="btn-link-general"><?php echo esc_html($link_title); ?></button></a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
		
		<section class="video-list-container py-5">
			<div class="gray-background"></div>
			
			<div class="first-title">
				<h1><?php echo get_field('second_section_label_vertical');?></h1>
			</div>
			
			<div class="row">
				<div class="video-displays">
				<?php
				$args3 = array(
					'post_type' => 'videos',
					'post_status'    => 'publish',
					'orderby' => 'rand'
				);

				$videos = new WP_Query( $args3 );
				while ( $videos->have_posts() ) : $videos->the_post();
				?>
				<div class="col-10 col-md-5 video-items">
					<div class="video-frame">
						<?php echo get_field('video_link'); ?>
					</div>
					<div class="video-info">
						<h3><?php echo the_title(); ?></h3>
						<p><?php echo get_field('video_description'); ?></p>
					</div>
				</div>
				<?php
						// the_content();
				endwhile;

				// Reset Post Data
				wp_reset_postdata();
				?>
								</div>
			</div>
		</section>

</div>

<div class="col-12 about-us-new-body">
	<div class="coral-background"></div>
	<?php
	$about_title = get_the_title( 6 );
	$about_post = get_post(6);
	$about_content = $about_post->post_content;
	$about_content = apply_filters('the_content', $about_content);
	$about_featured_url = wp_get_attachment_url( get_post_thumbnail_id(6 ) );
	?>
			<div class="col-12 about-us-container">
				<div class="row">
					<div class="col-12 text-center text-white mb-3"><h1 class="font-weight-bolder"><?php echo $about_title; ?></h1></div>
					<div class="col-12 col-md-6 about-img">
						<img src="<?php echo $about_featured_url; ?>" class="rounded" alt="">
					</div>
					<div class="col-12 col-md-6 about-info">
						<p><?php echo $about_content; ?></p>
						<div class="about-us-btn">
							<a href="<?php echo home_url().'/about'; ?>"><button class="btn-link-general">LEARN MORE</button></a>
						</div>
					</div>
				</div>
			</div>
</div>

		<div class="col-12 testimonial-container">
			<div class="col-12 testimonial-header">
				<h1><?php echo get_field('testimonial_label'); ?></h1>
			</div>
			<div class="row">
				<div class="col-12 testimony-list">
					<?php
					$args4 = array(
						'post_type' => 'testimonial',
						'post_status'    => 'publish',
						'orderby' => 'date'
					);

					$testimonial = new WP_Query( $args4 );
					while ( $testimonial->have_posts() ) : $testimonial->the_post();
					?>
					<div class="col-12 testimonials">
						<div class="row">
							<div class="col-12 col-md-6 testimony-img">
								<img src="<?php  the_post_thumbnail_url(); ?>" alt="">
								<div class="country">
										<p><?php //the_title(); ?></p>
								</div>
							</div>
							<div class="col-12 col-md-6 testimony-info">
								<p><?php the_content(); ?></p>
								<div class="author">
									<p id='name'><?php the_title(); ?></p>
									<p id='desc'><?php echo get_field('description'); ?></p>
								</div>
							</div>
						</div>
					</div>
					<?php
							// the_content();
					endwhile;

					// Reset Post Data
					wp_reset_postdata();
					?>
				</div>
				<div class="testimonial_navigation">
					<i class="fas fa-chevron-left" id="tm-left"></i>
					<i class="fas fa-chevron-right" id="tm-right"></i>
				</div>
			</div>
		</div>
	</div>

	<!-- <div class="homepage-video-container">
		<img id="video-bg" src="<?php echo home_url().'/wp-content/uploads/2019/01/home-bg-video.png'; ?>" alt="">
		<div class="homepage-video">
			<?php echo get_field('home_page_video'); ?>
		</div>
	</div> -->
</div>
<?php
get_footer();
?>
