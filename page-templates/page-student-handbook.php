<?php
/*
    Template Name: Student Handbook Page
*/
get_header();
?>
<div class="page-handbook-container">
  <div class="right-rectangle">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/blog-right-line.png'; ?>" alt="">
  </div>
  <div class="left-rectangle">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/blog-left-line.png'; ?>" alt="">
  </div>
  
<div class="big-polygon">
      <!--img src="<!-- ?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="" --> 
  </div>
	
  <div class="small-polygon">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="">
  </div>
	
  <div class="col-12 offset-md-1 col-md-10 handbook-container">

    <div class="col-12 company-info">
      <div class="row">
        <div class="col-12 col-md-6 c-info-img" data-aos="fade-right">
          <img src="<?php echo get_field('company_info_image'); ?>" alt="">
        </div>
        <div class="col-12 col-md-6 c-info-desc" data-aos="fade-left">
          <p><?php echo get_field('company_info'); ?></p>
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Social Icon") ) : ?>
          <?php endif;?>
        </div>
      </div>
    </div>

    <div class="col-12 handbook-collapse-container" data-aos="fade-up">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Student Handbook Collapse") ) : ?>
      <?php endif;?>
    </div>

    <div class="col-12 handbook-forms-container" data-aos="fade-up">
      <div class="col-12 header-title">
        <h1><?php echo get_field('forms_link_label');?></h1>
      </div>
      <div class="col-12 form-links-container">
        <div class="row">
          <div class="col-12 col-md-4 col-sm-6 col-xs-12 links column-1">
            <?php wp_nav_menu( array( 'theme_location' => 'forms-menu-1' ) ); ?>
          </div>
          <div class="col-12 col-md-4 col-sm-6 col-xs-12 links column-2">
            <?php wp_nav_menu( array( 'theme_location' => 'forms-menu-2' ) ); ?>
          </div>
          <div class="col-12 col-md-4 col-sm-6 col-xs-12 links column-3">
            <?php wp_nav_menu( array( 'theme_location' => 'forms-menu-3' ) ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
?>
