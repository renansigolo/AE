<footer>
  <div class="footer-body">
    <div class="partners-icon-body">
      <!-- <div class="partners-1">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Partners Icon 1") ) : ?>
        <?php endif;?>
      </div> -->
      <div class="partners-2">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Partners Icon 2") ) : ?>
        <?php endif;?>
      </div>
    </div>
    <?php
    $footer_bg = get_field('footer_apply_now_background_image',2);
    ?>
    <div class="apply-now-body" style="background-image:url(<?php echo $footer_bg; ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
      <div class="background-transparency">
        <div class="float-rectangle">
          <img src="<?php echo home_url() . '/wp-content/uploads/2020/04/footer-Rectangle.png'; ?>" alt="">
        </div>
      </div>
        <div class="col-12">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-6 offset-lg-3" >
              <p class="apply-now-text"><?php echo get_field('footer_apply_now_text',2); ?></p>
              <a href="<?php echo get_field('footer_apply_now_button_link',2); ?>"><button class="btn-link-general">APPLY NOW</button></a>
            </div>
          </div>
        </div>
    </div>
    <div class="footer-nav-body">
      <div class="footer-menus">
        <div class="col-12 col-md-12 col-lg-10 offset-lg-1">
          <div class="row ">
            <div class="col-12 col-lg-3 col-md col-sm-6 footer-icon-social">
              <div class="website-icon">
                <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
                $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );?>
                <a href="<?php echo home_url(); ?>">
                  <img src="<?php echo $image[0]; ?>" alt="">
                </a>
              </div>
              <div class="icons">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Social Icon") ) : ?>
                <?php endif;?>
              </div>
              <div class="whatsapp-link">
                <?php echo do_shortcode( '[chat style=4   s4_text_color=#ffffff  s4_background_color=#212121  ]' ); ?>
              </div>
            </div>
            <div class="col-6 col-lg-4 col-md-4 col-sm-6 footer-menu-1">
              <div class="footer-menu-header">
                <p>PROGRAMS WE DELIVER</p>
                <hr>
              </div>
              <div class="menu">
                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu-1' ) ); ?>
              </div>
            </div>
            <!-- <div class="col-6 col-lg-2 col-md col-sm-6 footer-menu-2">
              <div class="footer-menu-header">
                <p>ABOUT US</p>
                <hr>
              </div>
              <div class="menu">
                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu-4' ) ); ?>
              </div>
            </div>
            <div class="col-6 col-lg-2 col-md col-sm-6 footer-menu-3">
              <div class="footer-menu-header">
                <p>AUSTRALIA</p>
                <hr>
              </div>
              <div class="menu">
                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu-3' ) ); ?>
              </div>
            </div> -->
            <div class="col-6 col-lg-4 col-md-4 col-sm-6 footer-menu-4">
              <div class="footer-menu-header">
                <p>ABOUT US</p>
                <hr>
              </div>
              <div class="menu">
                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu-2' ) ); ?>
              </div>
           </div>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="col-12">
          <div class="row">
            <div class="col-12 copy-text">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Copyright") ) : ?>
              <?php endif;?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<script>
  AOS.init({
    duration: 1200,
  });
</script>
<?php wp_footer(); ?>
</body>
</html>
<!-- <style media="screen">
  .button-fake{
    position: relative;
  }
  .button-fake .btn-link-general{
    position: absolute;
    bottom: 35px;
    left: 45%;
    text-align: center;
  }
</style>
<div class="button-fake">
<img id="#fake-footer" src="wp-content/themes/AE/assets/images/fake-footer.png" alt="" width="100%">
    <a id="btn" href="#"><button class="btn-link-general">APPLY NOW</button></a>
</div> -->
