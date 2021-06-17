<?php
/*
    Template Name: About Page
*/
get_header();

?>
<div class="page-about-container">
  <div class="right-rectangle">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Rectangle-16-about-right.png'; ?>" alt="">
  </div>
  <div class="left-rectangle">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Rectangle-16-about-left.png'; ?>" alt="">
  </div>
  <div class="col-12 offset-md-2 col-md-8 about-info-1">
    <div class="row">
      <div class="col-12 col-md-6 info-video" data-aos="fade-right">
        <?php echo get_field('about_info_1_video_link'); ?>
      </div>
      <div class="col-12 col-md-6 info-desc" data-aos="fade-left">
        <div class="info-desc-text">
          <p><?php echo get_field('about_info_1_description'); ?></p>
        </div>
      </div>
    </div>
    <div class="small-polygon">
      <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="">
    </div>
  </div>

  <div class="col-12 offset-md-2 col-md-8 about-info-2">
    <div class="row">
      <div class="col-12 banner-header-hashtag" data-aos="zoom-in">
        <h1><?php echo get_field('about_info_2_banner_title'); ?></h1>
        <h4><?php echo get_field('about_info_2_hashtag'); ?></h4>
      </div>
      <div class="col-12 col-md-6 info-2-image" data-aos="fade-right">
        <?php
        echo do_shortcode('[smartslider3 slider=3]');
        ?>
      </div>
      <div class="col-12 col-md-6 info-2-desc" data-aos="fade-left">
        <p><?php echo get_field('about_info_2_description'); ?></p>
      </div>
    </div>
    <div class="big-polygon">
      <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="">
    </div>
  </div>

  <div class="col-12 offset-md-2 col-md-8 about-info-3">
    <div class="row">
      <div class="col-12 col-md-6 info-3-image" data-aos="fade-right">
        <div class="image-container">
          <img src="<?php echo get_field('about_info_3_image'); ?>" alt="">
        </div>
        <div class="fade-rectangle">
          <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/about-mid-rectangle.png'; ?>" alt="">
        </div>
      </div>
      <div class="col-12 col-md-6 info-3-desc" data-aos="fade-left">
        <div class="i3-desc-1">
          <p><?php echo get_field('about_info_3_description_1'); ?></p>
        </div>
        <div class="i3-desc-2">
          <p><?php echo get_field('about_info_3_description_2'); ?></p>
        </div>
        <div class="i3-desc-3">
          <p><?php echo get_field('about_info_3_description_3'); ?></p>
        </div>
      </div>
    </div>
  </div>


</div>
<?php
get_footer();
?>
