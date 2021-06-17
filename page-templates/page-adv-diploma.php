<?php
/*
    Template Name: DiplomaAdvanced Page
*/
get_header();
?>
<div class="page-adv-diploma-container">
  <div class="right-rectangle">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/adv-diploma-right-line.png'; ?>" alt="">
  </div>
  <div class="left-rectangle">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/adv-diploma-line-left.png'; ?>" alt="">
  </div>
  <div class="small-polygon">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="">
  </div>
  <div class="big-polygon">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="">
  </div>
  <div class="col-12 offset-md-1 col-md-10 ad-container">
    <div class="col-12 diploma-studies">
      <div class="row">
        <div class="col-12 col-md-7 studies-title" data-aos="fade-right">
          <h1><?php echo get_field('ad_second_page_header'); ?></h1>
        </div>
        <div class="col-12 listing-studies">
          <div class="row">
            <div class="col-12 studies-list">
              <?php
              $category_id = get_field('which_category');
              $args = array(
                'post_type' => 'diploma_studies',
                'post_status'    => 'publish',
                'orderby' => 'date',
                'order' => 'ASC',
                'tax_query' =>array(
                  array(
                    'taxonomy' => 'study_course',
                    'field' => 'term_id',
                    'terms' => $category_id
                  )
                )
              );

              $studies = new WP_Query( $args );
              while ( $studies->have_posts() ) : $studies->the_post();
                  //inside the loop
              ?>
              <div class="study-title"  data-aos="zoom-in">
                <p id="<?php echo get_the_id(); ?>"><?php echo the_title(); ?></p>
              </div>
              <?php
                  // the_content();
              endwhile;

              // Reset Post Data
              wp_reset_postdata();
              ?>
            </div>
            <?php
            while ( $studies->have_posts() ) : $studies->the_post();
                //inside the loop
                $content2 = get_field('second_content_text_editor');
            ?>
            <div class="col-12 offset-md-1 col-md-10 study-content" id="<?php echo get_the_id(); ?>">
              <div class="row">
                <div class="col-12 col-md-3 study-img" data-aos="fade-right">
                  <?php echo the_post_thumbnail();?>
                </div>
                <div class="col-12 col-md-3 study-labels" data-aos="fade-right">
                  <hr>
                  <a href="<?php echo the_permalink(); ?>">
                  <h3><?php the_title(); ?></h3>
                  </a>
                  <p><?php the_content(); ?></p>
                </div>
                <div class="col-12 col-md-6 study-description" data-aos="fade-left">
                  <hr>
                  <p><?php echo $content2; ?></p>
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
    </div>
    <div class="col-12 diploma-sched">
      <div class="gray-background"></div>
      <div class="row">
        <div class="col-12 sched-title" data-aos="fade-right">
          <h1><?php echo get_field('ad_page_first_header'); ?></h1>
        </div>
        <div class="col-12 col-md-5 sched-img" data-aos="fade-right">
          <img src="<?php echo get_field('ad_first_section_image'); ?>" alt="">
        </div>
        <div class="col-12 offset-md-1 col-md-6 schedules-details">
          <div class="row">
            <div class="col-12 schedule-table" data-aos="fade-left">
              <?php
              $table = get_field( 'ad_start_dates' );
              if ( $table ) {
                  echo '<table border="0">';
                      if ( $table['header'] ) {
                          echo '<thead>';
                              echo '<tr>';
                                  foreach ( $table['header'] as $th ) {
                                      echo '<th><div id="hr">';
                                          echo $th['c'];
                                      echo '</div></th>';
                                  }
                              echo '</tr>';
                          echo '</thead>';
                      }
                      echo '<tbody>';
                          foreach ( $table['body'] as $tr ) {
                              echo '<tr>';
                                  foreach ( $tr as $td ) {
                                      echo '<td>';
                                          echo $td['c'];
                                      echo '</td>';
                                  }
                              echo '</tr>';
                          }
                      echo '</tbody>';
                  echo '</table>';
              }
              ?>
            </div>
            <div class="col-12 btn-schedule">
              <a href="<?php  echo get_field('ad_start_date_button_link'); ?>"><button class="btn-link-general"><?php echo get_field('ad_start_date_button_label'); ?></button></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 application-details">
      <div class="row">
        <div class="col-12 ready-title" data-aos="fade-right">
          <h1><?php echo get_field('ad_third_page_header'); ?></h1>
        </div>
        <div class="col-12 offset-md-1 col-md-10 applications-informations">
          <div class="row">
            <div class="col-12 informations-body">
              <div class="row">
                <!-- <div class="col-12 col-md-0 info-img">
                  <img src="<?php echo get_field('ad_info_image'); ?>" alt="">
                  <div class="fade-rectangle">
                    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/about-mid-rectangle.png'; ?>" alt="">
                  </div>
                </div> -->
                <div class="col-12 col-md-12 info-labels-description">
                  <div class="row">
                    <div class="col-12 label-description">
                      <div class="row">
                        <div class="col-12 col-md-4 info-label" data-aos="fade-right">
                          <h3><?php echo get_field('ad_info_1_label'); ?></h3>
                        </div>
                        <div class="col-12 col-md-8 info-description" data-aos="fade-left">
                          <p><?php echo get_field('ad_info_1_description'); ?></p>
                        </div>
                        <div class="col-12 col-md-4 info-label" data-aos="fade-right">
                          <h3><?php echo get_field('ad_info_2_label'); ?></h3>
                        </div>
                        <div class="col-12 col-md-8 info-description" data-aos="fade-left">
                          <p><?php echo get_field('ad_info_2_description'); ?></p>
                        </div>
                        <div class="col-12 col-md-4 info-label" data-aos="fade-right">
                          <h3><?php echo get_field('ad_info_3_label'); ?></h3>
                        </div>
                        <div class="col-12 col-md-8 info-description" data-aos="fade-left">
                          <p><?php echo get_field('ad_info_3_description'); ?></p>
                        </div>
                        <div class="col-12 col-md-4 info-label" data-aos="fade-right">
                          <h3><?php echo get_field('ad_info_4_label'); ?></h3>
                        </div>
                        <div class="col-12 col-md-8 info-description" data-aos="fade-left">
                          <p><?php echo get_field('ad_info_4_description'); ?></p>
                        </div>
                        <div class="col-12 col-md-4 info-label" data-aos="fade-right">
                          <h3><?php echo get_field('ad_info_5_label'); ?></h3>
                        </div>
                        <div class="col-12 col-md-8 info-description" data-aos="fade-left">
                          <p><?php echo get_field('ad_info_5_description'); ?></p>
                        </div>
                        <div class="col-12 col-md-4 info-label" data-aos="fade-right">
                          <h3><?php echo get_field('ad_info_6_label'); ?></h3>
                        </div>
                        <div class="col-12 col-md-8 info-description" data-aos="fade-left">
                          <p><?php echo get_field('ad_info_6_description'); ?></p>
                        </div>
                        <div class="col-12 col-md-4 info-label" data-aos="fade-right">
                          <h3><?php echo get_field('ad_info_7_label'); ?></h3>
                        </div>
                        <div class="col-12 col-md-8 info-description" data-aos="fade-left">
                          <p><?php echo get_field('ad_info_7_description'); ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 requirements-details">
      <div class="row">
        <div class="col-12 requirements-title" data-aos="fade-right">
          <h1><?php echo get_field('ad_fourth_page_header'); ?></h1>
        </div>
        <div class="col-12 offset-md-1 col-md-10 requirements-descriptions">
          <div class="row">
            <div class="col-12 col-md-6 first-requirement-details" data-aos="fade-right">
              <p><?php echo get_field('ad_requirements_1'); ?></p>
            </div>
            <div class="col-12 col-md-6 second-requrement-details" data-aos="fade-left">
              <p><?php echo get_field('ad_requirements_2'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 apply-button-container">
      <div class="row">
        <div class="col-12  apply-label" data-aos="fade-up">
          <a href="<?php echo get_field('ad_apply_now_link');?>">
            <button class="btn-link-general"><?php echo get_field('ad_apply_label'); ?></button>
          </a>
        </div>
        <div class="col-12 apply-button" data-aos="fade-right">
          <a href="<?php echo get_field('ad_apply_button_link'); ?>"><p><?php echo get_field('ad_apply_button_label'); ?></p></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
?>
