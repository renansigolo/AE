<?php
/*
    Template Name: Contact Page
*/
get_header();
?>
<div class="page-contact-container">
  <div class="location-contact-container">
    <div class="col-12 offset-md-2 col-md-8 location-contact">
      <div class="row">
        <div class="col-12 col-md-4 location-description">
          <h3><?php echo get_field('location_label'); ?></h3>
          <hr>
          <p><?php echo get_field('location_address'); ?></p>
        </div>
        <div class="col-12 col-md-8 location-map">
          <?php
          $location = get_field('location_map');
          if( !empty($location) ):
          ?>
          <div class="acf-map">
          	<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
          </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="left-polygon">
        <img src="<?php echo home_url().'/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="">
      </div>
    </div>

    <div class="right-rectangle">
      <img src="<?php echo home_url().'/wp-content/uploads/2020/04/Elements-up.png'; ?>" alt="">
    </div>
    <div class="left-rectangle">
      <img src="<?php echo home_url().'/wp-content/uploads/2020/04/Elements-down.png'; ?>" alt="">
    </div>
  </div>


  <?php
  $book_bg = get_field('book_header_background');
  ?>

</div>
<?php
get_footer();
?>
