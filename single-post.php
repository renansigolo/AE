<?php
get_header();

the_post();

$post_id = get_the_id();
$date    = get_the_date( 'F j, Y' );

$fnameAuthor = get_the_author_meta( 'first_name' );
$lnameAuthor = get_the_author_meta( 'last_name' );
$author      = $fnameAuthor . ' ' . $lnameAuthor;

$post_tags = get_the_tags();
$tag_id    = array();
$previous  = get_previous_post();
$next      = get_next_post();

?>
<div class="single-page-post">
	<div class="single-post">
			<div class="container post-content">
				<div class="back-btn">
					<a href="<?php echo home_url() . '\blog'; ?>"><i class="fas fa-chevron-left"></i> BACK</a>
				</div>
				<br />
				<div class="blog-date-author">
					<p><?php echo $date; ?> | <?php echo $author; ?></p>
				</div>
				<div class="small-divider"></div>
				<br />
				<div class="blog-title">
					<h4><?php the_title(); ?></h4>
				</div>
				<div class="text-content">
					<p><?php echo the_content(); ?></p>
				</div>
			</div>
			<div class="post-tags">
				<div class="container d-flex">
				<i class="fas fa-tags"></i>
					<?php
					foreach ( $post_tags as $tag ) {
						$tag_id[] = $tag->term_id;
						echo '<p class="tag">' . $tag->name . '</p>';
					}
					?>
				</div>
			</div>
			<div class="post-next-prev">
				<div class="row">
					<div class="col-6 col-md-5 offset-md-1 previous-nav">
						<?php
						if ( get_previous_post() ) {
							?>
						<div class="previous-link">
							<?php
									echo '<p>' . previous_post_link( '%link', '<i class="fas fa-arrow-left"></i> PREVIOUS POST', false ) . '</p>';
							?>
						</div>
						<div class="previous-title">
							<?php
									echo '<p>' . get_the_title( $previous ) . '</p>';
							?>
						</div>
							<?php
						}
						?>
					</div>
					<div class="col-6 col-md-5 next-nav">
						<?php
						if ( get_next_post() ) {
							?>
						<div class="next-link">
							<?php
									echo '<p>' . next_post_link( '%link', 'NEXT POST <i class="fas fa-arrow-right"></i>', false ) . '</p>';
							?>
						</div>
						<div class="next-title">
							<?php
									echo '<p>' . get_the_title( $next ) . '</p>';
							?>
						</div>
							<?php
						}
						?>
					</div>
				</div>

			</div>
			
			<div class="author-info text-center">
				<div class="row">
					<div class="col-12 author-desc">
						<div class="author-name mt-3">
							<h5><?php echo $author; ?></h5>
						</div>
						<div class="author-description">
							<p><?php echo the_author_description(); ?></p>
						</div>
					</div>
				</div>
			</div>

			<div class="related-post">
				<div class="row">
					<div class="col-12 related-title">
						<h5 class="m-0 py-2"><?php echo get_field( 'single_page_other_posts_label', 18 ); ?></h5>
					</div>

					<div class="container py-5">
						<div class="row">
						<?php
							$args     = array(
								'tag__in'        => $tag_id,
								'post__not_in'   => array( $post_id ),
								'posts_per_page' => 3,
								'orderby'        => 'rand',
								'order'          => 'DESC',
							);
							$my_query = new WP_Query( $args );
							if ( $my_query->have_posts() ) {
								while ( $my_query->have_posts() ) :
									$my_query->the_post();
									?>
						<div class="col-12 col-md-4 r-post">
						<a href="<?php echo the_permalink(); ?>" class="text-decoration-none">
							<div class="row">
								<div class="col-12 mb-2 r-post-img">
									<img src="<?php the_post_thumbnail_url(); ?>" alt="Related Image Thumbnail">
								</div>
								<div class="col-12 r-post-title">
									<p class="text-decoration-none"><?php echo the_title(); ?></p>
								</div>
							</div>
						</a>
						</div>
									<?php
							endwhile;
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
