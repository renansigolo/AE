<?php
get_header();

the_post();

$post_id = get_the_id();
$previous = get_previous_post(true,'','study_course');
$next = get_next_post(true,'','study_course');
$category = array();
$term = get_queried_object();
$terms = get_the_terms( $post_id, 'study_course' );

$fnameAuthor = get_the_author_meta('first_name');
$lnameAuthor = get_the_author_meta('last_name');
$author = $fnameAuthor. ' ' . $lnameAuthor;

foreach($terms as $term) {
	array_push($category,$term->term_id);
}

$pagePostID = get_field('study_course_page',$term->taxonomy . '_' . $term->term_id);
?>
<div class="single-page-diploma">
	<div class="col-12 offset-md-1 col-md-10 single-diploma">
		<div class="row">
			<div class="col-12 post-content">
				<div class="back-btn">
					<a href="<?php echo get_permalink($pagePostID); ?>"><i class="fas fa-chevron-left"></i> BACK</a>
				</div>
				<div class="blog-date-author">
					<p><?php echo $date; ?> | <?php echo $author; ?></p>
				</div>
				<br />
				<div class="blog-title">
					<h4><?php the_title(); ?></h4>
				</div>
				<div class="small-divider"></div>
				<div class="text-content">
					<div class="thumbnail-content">
						<?php  the_post_thumbnail(); ?>
					</div>
					<p><?php echo the_content(); ?></p>
					<p><?php echo get_field('second_content_text_editor'); ?></p>
				</div>
			</div>
			<div class="col-12 post-next-prev">
				<div class="row">
					<div class="col-6 col-md-5 offset-md-1 previous-nav">
						<?php
							if(get_previous_post()) :
						?>
						<div class="previous-link">
							<?php
									echo '<p>'.previous_post_link('%link', '<i class="fas fa-arrow-left"></i> PREVIOUS POST', TRUE,'','study_course').'</p>';
							?>
						</div>
						<div class="previous-title">
							<?php if (!empty( $previous )) { echo '<p>'.get_the_title($previous).'</p>'; } ?>
						</div>
							<?php endif; ?>
					</div>
					<div class="col-6 col-md-5 next-nav">
						<?php if(get_next_post()) : ?>
						<div class="next-link">
							<?php echo '<p>'.next_post_link('%link', 'NEXT POST <i class="fas fa-arrow-right"></i>', TRUE,'','study_course').'</p>'; ?>
						</div>
						<div class="next-title">
							<?php if (!empty( $next )) { echo '<p>'.get_the_title($next).'</p>'; } ?>
						</div>
							<?php endif; ?>
					</div>
				</div>

			</div>
			
			<section class="col-12 author-info text-center pt-5">
					<div class="author-desc">
						<div class="author-name">
							<h5><?php echo $author; ?></h5>
						</div>
						<div class="author-description">
							<p><?php echo the_author_description(); ?></p>
						</div>
					</div>
			</section>
			
			<section class="col-12 related-post">
				<div class="row">
					<div class="col-12 related-title">
						<h5 class="text-white my-2"><?php echo 'Other '. $term->name. ' Units';?></h5>
					</div>
					<div class="r-post-slider">
						<?php
							$args=array(
								'post_type' => 'diploma_studies',
								'post_status'    => 'publish',
								'orderby' => 'date',
								'order' => 'ASC',
								'post__not_in' => array($post_id),
								'posts_per_page'=>-1,
								'tax_query' =>array(
									array(
										'taxonomy' => 'study_course',
										'field' => 'term_id',
										'terms' => $category
									)
								)
							);
							$my_query = new WP_Query($args);
							if( $my_query->have_posts() ) :
							while ($my_query->have_posts()) : $my_query->the_post();
						?>
						<div class="col-12 col-md-4 r-post">
						<a href="<?php echo the_permalink(); ?>" class="text-decoration-none">
							<div class="row">
								<div class="r-post-img mb-2">
									<img src="<?php echo get_field('icon'); ?>" alt="">
								</div>
								<div class="r-post-title">
									<p class="text-decoration-none"><?php echo the_title(); ?></p>
								</div>
							</div>
							</a>
						</div>
						<?php
							endwhile;
						endif;
							wp_reset_query();
						?>
					</div>
					<div class="r-post-diploma_navigation">
						<i class="fas fa-chevron-left" id="tm-left"></i>
						<i class="fas fa-chevron-right" id="tm-right"></i>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

<?php
get_footer();
?>
