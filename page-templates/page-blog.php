<?php
/*
		Template Name: Blog Page
*/
get_header();
?>
<div class="page-blog-container">
	<div class="big-polygon">
		<img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="Polygon Image">
	</div>
	
<div class="container">
<div class="col-12 blog-container">
		<div class="row">
			<section class="col-12 col-lg-9 blog-list">
					<?php
					$args = array(
						'post_type' => 'post',
						's' => $txtBlogSearch,
						'post_status'=>'publish',
						'orderby' => 'date',
						'posts_per_page' => 8,
						'paged'          => get_query_var( 'paged' )
					);
					$blogs = new WP_Query( $args );

					if( $blogs->have_posts() ) :
						echo '<div class="row">';
						while( $blogs->have_posts() ) :
							$blogs->the_post();
							$date = get_the_date('F j, Y');
							$content = get_the_content();
							$preview = get_the_excerpt();
							$fnameAuthor = get_the_author_meta('first_name');
							$lnameAuthor = get_the_author_meta('last_name');
							$author = $fnameAuthor. ' ' . $lnameAuthor;
					?>
					<div class="col-lg-6 d-flex align-items-stretch">
						<div class="blog card">
							<img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top img-fluid" alt="Blog Article Image">
							<div class="blog-info card-body">
								<div class="blog-date-author">
									<p><?php echo $date; ?> </p>
								</div>
								<div class="divider"></div>
								<div class="blog-content">
									<?php the_field('authors_name'); ?>
									<h5 class="mt-2"><?php the_title(); ?></h5>
									<p><?php if (strlen($preview) <=200) { echo $preview; } else { echo substr($preview, 0, 200) . '...'; } ?></p>
								</div>
								<a href="<?php the_permalink(); ?>" class="btn btn-primary fw-normal" role="button">Read More</a>
							</div>
						</div>
					</div>
					
				<?php
					endwhile;
					echo '<div class="col-12 page-navigation">';
					wp_pagenavi( array( 'query' => $blogs ) );
					echo '</div>';
					echo '</div>';
				endif;
				wp_reset_query();
				?>
			</section>


			<?php
			$txtBlogSearch = '';
			if ( isset ($_GET['txtBlogSearch']) ) {
				$txtBlogSearch = $_GET['txtBlogSearch'];
				if ($txtBlogSearch !== ''){
					echo '<div class="col-12 result-search">';
					echo '<h3>Result for: <span>'.$txtBlogSearch.'</span></h3>';
					echo '</div>';
				}
			}
			?>
			<section class="col-12 col-lg-3 search-popular">
					<div class="search-form">
						<form action="<?php echo home_url() . '/blog'?>" method="get">
							<input class="search-blog" type="text" name="txtBlogSearch" placeholder="Search Here">
							<button type="submit" class="btn-search">
								<i class="fas fa-search"></i>
							</button>
						</form>
					</div>
					<div class="popular-posts mt-3">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Popular Post Blog") ) : ?>
						<?php endif;?>
						<div class="small-polygon">
							<img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="Small Polygon Image">
						</div>
					</div>
			</section>

		</div>
	</div>
</div>
</div>
<?php
get_footer();
?>
