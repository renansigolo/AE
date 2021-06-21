<?php
get_header();

the_post();
?>
<div class="single-page-bootcamp">
	<div class="single-polygon">
		<img src="<?php echo home_url() . '/wp-content/uploads/2020/04/single-polygon.png'; ?>" alt="">
	</div>
	<div class="small-polygon">
		<img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="">
	</div>
	<div class="col-12 offset-md-1 col-md-10 single-bootcamp-container">
		<div class="col-12 bootcamp-structure">
			<div class="row">
				<div class="col-12 bootcamp-structure-title">
					<h1><?php echo get_field('bootcamp_structure_title'); ?></h1>
				</div>
				<div class="col-12 col-md-5 bootcamp-structure-img">
					<img src="<?php echo get_field('bootcamp_structure_image'); ?>" alt="">
				</div>
				<div class="col-12 col-md-5 bootcamp-structure-info">
					<div class="sub-label">
						<p id="structure-sub-label"><?php echo get_field('bootcamp_structure_sub_label'); ?></p>
						<hr>
					</div>
					<?php
					$duration = get_field('bootcamp_structure_duration');
					$time = get_field('bootcamp_structure_time');
					$date = get_field('bootcamp_structure_date');
					$location = get_field('bootcamp_structure_location');
					$cost = get_field('bootcamp_structure_cost');

					if($duration != '') :  echo '<label>DURATION</label><h4>'. $duration .'</h4>';  endif;
					if($time != '') :  echo '<label>TIME</label><h4>'. $time .'</h4>';  endif;
					if($date != '') :  echo '<label>DATE</label><h4>'. $date .'</h4>';  endif;
					if($location != '') :  echo '<label>LOCATION</label><h4>'. $location .'</h4>';  endif;
					if($cost != '') :  echo '<label>COST</label><h4>'. $cost .'</h4>';  endif;
					?>
				</div>
			</div>
		</div>
		<div class="col-12 bootcamp-learn-how">
			<div class="row">
				<div class="col-12 bootcamp-learn-title">
					<h1><?php echo get_field('learn_how_label'); ?></h1>
				</div>
				<div class="col-12 offset-md-1 col-md-10 bootcamp-learn-body">
					<div class="row">
						<div class="col-12 first-content">
							<div class="row">
								<div class="col-12 col-md-6 first-content-img">
									<!-- <img src="<?php the_post_thumbnail_url(); ?>" alt=""> -->
									<div class="embed-video-bootcamp">
										<?php echo get_field('bootcamp_video'); ?>
									</div>
								</div>
								<div class="col-12 col-md-6 first-content-text">
									<p><?php echo get_field('learn_how_content'); ?></p>
								</div>
							</div>
						</div>
						<hr id="learn-how-line">
						<div class="col-12 offset-md-1 col-md-10 learn-how-second-header">
							<h3><?php echo get_field('learn_how_second_header'); ?></h3>
						</div>
						<div class="col-12 second-content">
							<div class="row">
								<div class="col-12 col-md-6 second-content-text">
									<p><?php echo get_field('learn_how_second_content'); ?></p>
								</div>
								<div class="col-12 col-md-6 second-content-sched">
									<p><?php echo get_field('learn_how_schedule'); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
?>
