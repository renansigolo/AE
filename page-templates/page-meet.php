<?php
/*
		Template Name: Meet Page
*/
get_header();
?>
<div class="page-meet-container">
	<div class="container meet-container">
		<div class="row">
			<?php
			$category_id       = get_field( 'which_ml_category' );
			$args              = array(
				'post_type'      => 'mentors_legends',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
			);
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'mentor_or_legend',
					'field'    => 'term_id',
					'terms'    => $category_id,
					'operator' => 'IN',
				),
			);
			$profiles          = new WP_Query( $args );
			while ( $profiles->have_posts() ) :
				$profiles->the_post();
				?>
				<div class="col-12 col-md-4 col-sm-6 ml-profile">
					<div class="row">
						<div class="ml-profile-video mb-3">
							<?php echo the_post_thumbnail(); ?>
						</div>
						<div class="ml-profile-desc">
							<h3><?php echo the_title(); ?></h3>
							<p><?php echo the_content(); ?></p>
						</div>
					</div>
				</div>
				<?php
			endwhile;
				wp_reset_postdata();
			?>
		</div>
	</div>
</div>

<?php
get_footer();
?>
