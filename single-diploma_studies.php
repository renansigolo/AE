<?php
get_header();

the_post();

$post_id = get_the_id();
$previous = get_previous_post(true,'','study_course');
$next = get_next_post(true,'','study_course');
$category = array();
$term = get_queried_object();
$terms = get_the_terms( $post_id, 'study_course' );
foreach($terms as $term) {
  array_push($category,$term->term_id);
}
$pagePostID = get_field('study_course_page',$term->taxonomy . '_' . $term->term_id);
?>
<div class="single-page-diploma">
  <div class="col-12 offset-md-2 col-md-8 single-diploma">
    <div class="row">
      <div class="col-12 post-content" data-aos="zoom-out">
        <div class="back-btn">
          <a href="<?php echo get_permalink($pagePostID); ?>">BACK</a>
          <!-- <?php
          if($category_id == 1): ?>
          <a href="<?php echo home_url().'\diploma'; ?>">BACK</a>
          <?php
          elseif ($category_id == 35): ?>
          <a href="<?php echo home_url().'\advanced-diploma'; ?>">BACK</a>
          <?php
          endif;
          ?> -->
        </div>
        <div class="blog-date-author">
          <p><?php echo $date; ?> | <?php echo $author; ?></p>
          <hr>
        </div>
        <div class="blog-title">
          <h4><?php the_title(); ?></h4>
        </div>
        <div class="text-content">
          <div class="thumbnail-content">
            <?php  the_post_thumbnail(); ?>
          </div>
          <p><?php echo the_content(); ?></p>
          <p><?php echo get_field('second_content_text_editor'); ?></p>
        </div>
      </div>
      <div class="col-12 post-tags" data-aos="fade-right">
        <i class="fas fa-tags"></i>
          <?php
          foreach( $post_tags as $tag ) {
            $tag_id[] = $tag->term_id;
            echo '<p class="tag">'.$tag->name.'</p>';
            }
          ?>

      </div>
      <div class="col-12 post-next-prev">
        <div class="row">
          <div class="col-6 col-md-5 offset-md-1 previous-nav" data-aos="fade-right">
            <?php
            if(get_previous_post()){
            ?>
            <div class="previous-link">
              <?php
                  echo '<p>'.previous_post_link('%link', '<i class="fas fa-arrow-left"></i> PREVIOUS POST', TRUE,'','study_course').'</p>';
              ?>
            </div>
            <div class="previous-title">
              <?php
              if (!empty( $previous )):
                  echo '<p>'.get_the_title($previous).'</p>';
                  endif;
              ?>
            </div>
              <?php
            }
            ?>
          </div>
          <div class="col-6 col-md-5 next-nav" data-aos="fade-left">
            <?php
            if(get_next_post()){
            ?>
            <div class="next-link">
              <?php
                  echo '<p>'.next_post_link('%link', 'NEXT POST <i class="fas fa-arrow-right"></i>', TRUE,'','study_course').'</p>';
              ?>
            </div>
            <div class="next-title">
              <?php
              if (!empty( $next )):
                  echo '<p>'.get_the_title($next).'</p>';
                  endif;
              ?>
            </div>
              <?php
            }
            ?>
          </div>
        </div>

      </div>
      <div class="col-12 author-info" data-aos="fade-up">
        <div class="row">
          <div class="col-12 col-md-10 author-desc" data-aos="zoom-in">
            <div class="author-name">
              <h5><?php echo $author; ?></h5>
            </div>
            <div class="author-description">
              <p><?php echo the_author_description(); ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 related-post">
        <div class="row">
          <div class="col-12 related-title" data-aos="zoom-in">
            <p>
             <?php echo 'Other '. $term->name. ' Units';?>
              <!-- <?php
            // if($category_id == 1):
            // echo get_field('single_page_other_posts_label',8);
            // elseif ($category_id == 35):
            // echo get_field('single_page_other_posts_label',10);
            // endif;
            ?> -->
          </p>
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
              if( $my_query->have_posts() ) {
              while ($my_query->have_posts()) : $my_query->the_post();
            ?>
            <div class="col-12 col-md-4 r-post" data-aos="fade-up">
              <div class="row">
                <div class="col-12 r-post-img">
                  <a href="<?php echo the_permalink(); ?>">
                  <img src="<?php echo get_field('icon'); ?>" alt="">
                  </a>
                </div>
                <div class="col-12 r-post-title">
                  <a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
                </div>
              </div>
            </div>
            <?php
              endwhile;
              }
              wp_reset_query();
            ?>
          </div>
          <div class="r-post-diploma_navigation">
            <i class="fas fa-chevron-left" id="tm_left"></i>
            <i class="fas fa-chevron-right" id="tm_right"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
?>
