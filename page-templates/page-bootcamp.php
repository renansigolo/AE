<?php
/*
    Template Name: Bootcamp Page
*/
get_header();
?>
<div class="page-bootcamp-container">
  <div class="right-rectangle">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/home-right-line.png'; ?>" alt="">
  </div>
  <div class="left-rectangle">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/home-left-line.png'; ?>" alt="">
  </div>
  <div class="small-polygon">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="">
  </div>
  <div class="col-12 offset-md-1 col-md-10 bootcamp-container">
    <div class="col-12 bootcamp-list-container">
      <div class="row">
        <div class="col-12 bootcamp-list-title">
          <h1><?php echo get_field('bootcamp_list_title'); ?></h1>
        </div>
        <div class="col-12 bootcamp-body">
          <div class="row">
              <?php
              $args = array(
                'post_type' => 'bootcamps',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC'
              );
              $bootcamps = new WP_Query( $args );
              if( $bootcamps->have_posts() ) {
                while( $bootcamps->have_posts() ) {
                  $bootcamps->the_post();
                  $date = get_field('bootcamp_start_date');
                  $duration = get_field('bootcamp_structure_duration');
                  $time = get_field('bootcamp_structure_time');
                  $location = get_field('bootcamp_structure_location');
                  $price = get_field('bootcamp_structure_cost');
                  $day = date('l', strtotime($date));
              ?>
              <div class="col-12 col-md-4 bootcamp">
                  <div class="bootcamp-img">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                    <div class="btn_learnmore">
                      <a href="<?php the_permalink(); ?>"><button class="btn-link-general">Learn More</button></a>
                    </div>
                  </div>
                  <div class="bootcamp-title">
                    <h3><?php echo the_title(); ?></h3>
                  </div>
                  <div class="bootcamp-info">
                    <p id="date"><i class="fas fa-calendar-alt"></i><?php echo $date; ?></p>
                    <p id="duration"><i class="fas fa-hourglass-start"></i><?php echo $duration; ?></p>
                    <p id="time"><i class="far fa-clock"></i><?php echo $time; ?></p>
                    <p id="location"><i class="fas fa-map-pin"></i><?php echo $location; ?></p>
                    <p id="price"><i class="fas fa-tag"></i><?php
                    if($price != ""){
                        echo $price;
                    }else{
                      echo "FREE";
                    }
                    ?></p>
                  </div>
              </div>
                  <?php
                }
              }
              wp_reset_query();
              ?>
              <div class="col-12 col-md-4 next-term-img">
                <img src="<?php echo get_field('list_next_term_image'); ?>" alt="">
                <div class="fade-rectangle">
                  <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/about-mid-rectangle.png'; ?>" alt="">
                </div>
              </div>
              <div class="col-12 col-md-4 next-term-title">
                <div class="term-title">
                  <h3><?php echo get_field('list_next_term_label'); ?></h3>
                  <a href="<?php  echo get_field('list_next_term_button_link'); ?>"><button class="btn-link-general"><?php echo get_field('list_next_term_button_label'); ?></button></a>
                  </div>
                </div>
              <div class="col-12 col-md-4 next-term-other-info">
                <div class="info">
                  <p><?php echo get_field('list_next_term_other_info'); ?></p>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
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
    </div>
  </div>
</div>
<?php
get_footer();
?>
