<?php
/*
		Template Name: Student Handbook Page
*/
get_header();
?>
<div class="page-handbook-container">  
	<div class="big-polygon">
			<!--img src="?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="Polygon Image" --> 
	</div>
	
	<div class="small-polygon">
		<img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="Small Polygon Image">
	</div>
	
	<div class="container handbook-container">

		<section class="company-info">
			<div class="row">
				<div class="col-12 col-md-6 c-info-img">
					<img src="<?php echo get_field( 'company_info_image' ); ?>" alt="Company Image">
				</div>
				<div class="col-12 col-md-6 c-info-desc">
					<p><?php echo get_field( 'company_info' ); ?></p>
					<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'Social Icon' ) ) : ?>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<section class="handbook-collapse-container">
			<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'Student Handbook Collapse' ) ) : ?>
			<?php endif; ?>
		</section>

		<section class="handbook-forms-container">
			<div class="col-12 header-title">
				<h1><?php echo get_field( 'forms_link_label' ); ?></h1>
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
			</section>

	</div>
</div>
<?php
get_footer();
?>
