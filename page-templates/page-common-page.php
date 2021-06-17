<?php
/*
    Template Name: Common Page
*/
get_header();

$numberColumn = get_field('number_of_column');
?>
<div class="page-common-container">
  <div class="right-rectangle">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/blog-right-line.png'; ?>" alt="">
  </div>
  <div class="left-rectangle">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/blog-left-line.png'; ?>" alt="">
  </div>
  <div class="big-polygon">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="">
  </div>
  <div class="small-polygon">
    <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="">
  </div>

  <div class="col-12 offset-md-2 col-md-8 common-container">
    <div class="col-12 common-content">
      <div class="row">
      <?php if($numberColumn == 'one') {?>
        <div class="col-12 content" data-aos="fade-up">
          <?php echo get_field('first_column_content');?>
        </div>
      <?php }else {?>
        <div class="col-12 col-md-6 content first-column" data-aos="fade-right">
          <?php echo get_field('first_column_content');?>
        </div>
        <div class="col-12 col-md-6 content second-column" data-aos="fade-left">
          <?php echo get_field('second_column_content');?>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
?>
