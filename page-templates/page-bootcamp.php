<?php
/*
		Template Name: Bootcamp Page
*/
get_header();
?>
<div class="page-bootcamp-container">
	<div class="small-polygon">
		<img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="Small Polygon Image">
	</div>
	
	<section class="container bootcamp-container">
		<div class="bootcamp-list-container">
			<h1 class="bootcamp-list-title mb-3">
				<?php echo get_field( 'bootcamp_list_title' ); ?>
			</h1>
			
			<div class="bootcamp-body">
				<div class="row">
						<?php
						$args      = array(
							'post_type'      => 'bootcamps',
							'post_status'    => 'publish',
							'posts_per_page' => -1,
							'orderby'        => 'date',
							'order'          => 'DESC',
						);
						$bootcamps = new WP_Query( $args );

						if ( $bootcamps->have_posts() ) :
							while ( $bootcamps->have_posts() ) :
								$bootcamps->the_post();
								$link     = get_field( 'header_button_link' );
								$date     = get_field( 'bootcamp_start_date' );
								$duration = get_field( 'bootcamp_structure_duration' );
								$time     = get_field( 'bootcamp_structure_time' );
								$location = get_field( 'bootcamp_structure_location' );
								$price    = get_field( 'bootcamp_structure_cost' );
								$day      = date( 'l', strtotime( $date ) );
								?>
						<div class="col-12 col-md-4">
							<a href="<?php echo $link; ?>" class="text-decoration-none" target="_blank">
							<div class="card bootcamp">
								<div class="bootcamp-img">
									<img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top mb-3" alt="Bootcamp Post Image">
								</div>
								<div class="card-body">
									<div class="bootcamp-title">
										<h4><?php echo the_title(); ?></h4>
									</div>
									<div class="bootcamp-info">
										<!-- <p id="date"><i class="fas fa-calendar-alt"></i><?php echo $date; ?></p> -->
										<p id="duration"><i class="fas fa-hourglass-start"></i><?php echo $duration; ?></p>
										<p id="time"><i class="far fa-clock"></i><?php echo $time; ?></p>
										<p id="location"><i class="fas fa-map-pin"></i><?php echo $location; ?></p>
										<p id="price"><i class="fas fa-tag"></i>
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
							</div>
							</a>
						</div>
								<?php
							endwhile;
						endif;
						wp_reset_query();
						?>
						<div class="col-12 col-md-4 next-term-img">
							<img src="<?php echo get_field( 'list_next_term_image' ); ?>" alt="Term Image">
						</div>
						<div class="col-12 col-md-4 next-term-title">
							<div class="term-title">
								<h3><?php echo get_field( 'list_next_term_label' ); ?></h3>
								<a href="<?php echo get_field( 'list_next_term_button_link' ); ?>"><button class="btn-link-general"><?php echo get_field( 'list_next_term_button_label' ); ?></button></a>
								</div>
							</div>
						<div class="col-12 col-md-4 next-term-other-info">
							<div class="info">
								<p><?php echo get_field( 'list_next_term_other_info' ); ?></p>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>
<?php
get_footer();
?>
