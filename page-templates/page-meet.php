<?php
/*
		Template Name: Meet Page
*/
get_header();
?>
<div class="page-meet-container">
	<div class="left-polygon">
		<img src="<?php echo home_url().'/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="">
	</div>

	<div class="col-12 offset-md-1 col-md-10 meet-container">
		<div class="row">
			<?php
			$category_id = get_field('which_ml_category');
			$args = array(
				'post_type' => 'mentors_legends',
				'post_status'    => 'publish',
		'posts_per_page' => -1
			);
			$args['tax_query'] = array(
				array(
						'taxonomy' => 'mentor_or_legend',
						'field' => 'term_id',
						'terms' => $category_id,
						'operator' => 'IN'
			),
			);
			$profiles = new WP_Query( $args );
			while ( $profiles->have_posts() ) : $profiles->the_post();
					//inside the loop
			?>
				<div class="col-12 col-md-4 col-sm-6 col-xs-12 ml-profile">
					<div class="row">
						<div class="col-12 ml-profile-video">
							<?php echo the_post_thumbnail();?>
						</div>
						<div class=" col-12 ml-profile-desc">
							<a href="<?php echo home_url() . '/booking'; ?>">
								<h3><?php echo the_title(); ?></h3>
							</a>
							<p><?php echo the_content();?></p>
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
	</div>
</div>
<?php
get_footer();
?>
