<?php
/*
    Template Name: Blog Page
*/
get_header();
?>
<div class="page-blog-container">
  <div class="right-rectangle">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/blog-right-line.png'; ?>" alt="">
  </div>
  <div class="left-rectangle">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/blog-left-line.png'; ?>" alt="">
  </div>
  <div class="big-polygon">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="">
  </div>
    <div class="col-12 offset-md-2 col-md-9 blog-container">
      <div class="row">
        <div class="col-12 col-md-9 blog-list">
          <div class="row">
            <?php
            $txtBlogSearch = '';;
            if ( isset ($_GET['txtBlogSearch']) ) {
              $txtBlogSearch = $_GET['txtBlogSearch'];
              if ($txtBlogSearch != ''){
                echo '<div class="col-12 result-search">';
                echo '<h3>Result for: <span>'.$txtBlogSearch.'</span></h3>';
                echo '</div>';
              }
            }

            $args = array(
              'post_type' => 'post',
              's' => $txtBlogSearch,
              'post_status'=>'publish',
              'orderby' => 'date',
              'posts_per_page' => 4,
              'paged'          => get_query_var( 'paged' )
            );

            $blogs = new WP_Query( $args );
            if( $blogs->have_posts() ) {
            while( $blogs->have_posts() ) {
              $blogs->the_post();
              $date = get_the_date('F j, Y');
              $content = get_the_content();
			  $preview = get_the_excerpt();
              $fnameAuthor = get_the_author_meta('first_name');
              $lnameAuthor = get_the_author_meta('last_name');
              $author = $fnameAuthor. ' ' . $lnameAuthor;
            ?>
            <div class="col-12 blog">
              <div class="row">
                <div class="col-12 col-md-7 blog-img" data-aos="fade-right">
                  <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                </div>
                <div class="col-12 col-md-5 blog-info" data-aos="fade-left">
                  <div class="blog-date-author">
                    <p><?php echo $date; ?> </p>
					
                  </div>
                  <div class="blog-content">
					    <?php the_field('authors_name'); ?>
                    <h4><?php the_title(); ?></h4>
					  <p>
						    <?php
// 				echo $preview;
								if (strlen($preview) <=200) {
								  echo $preview;
								} else {
								  echo substr($preview, 0, 200) . '...';
								}
							  ?>
					  </p>

                  </div>
                  <div class="blog-read-more">
                    <a href="<?php the_permalink(); ?>"><button class="btn-link-general">Read More</button></a>
                  </div>
                </div>
              </div>
            </div>
          <?php
            }
            echo '<div class="col-12 page-navigation">';
            wp_pagenavi( array( 'query' => $blogs ) );
            echo '</div>';
          }
          wp_reset_query();
          ?>
          </div>
        </div>

        <div class="col-12 col-md-3 search-popular" data-aos="fade-up">
          <div class="row">
            <div class="col-12 col-md-12 search-form">
              <form class="" action="<?php echo home_url() . '/blog'?>" method="get">
                <input class="search-blog" type="text" name="txtBlogSearch" placeholder="Search Here">
                <button type="submit" class="btn-search">
                  <i class="fas fa-search"></i>
                </button>
              </form>
            </div>
            <div class="col-12 col-md-12 popular-posts">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Popular Post Blog") ) : ?>
              <?php endif;?>

              <div class="small-polygon">
                <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="">
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
