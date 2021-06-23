<?php
/*
		Template Name: HR Portal Page
*/
get_header();
?>
<div class="page-hr-portal-container container">
	<div class="big-polygon">
		<img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="Polygon Image">
	</div>
	<div class="small-polygon">
		<img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="Small Polygon Image">
	</div>

	<div class="offset-md-1 col-md-10 hr-portal-container">
		<div class="col-12 hr-portal-content">
			<div class="row">
				
				<div class="col-12 content">
					<?php echo get_field('first_content');?>
				</div>
				
				<div class="col-12 content-links content-policies">
					<div class="col-12 header-title">
						<h1><?php echo get_field('first_label');?></h1>
					</div>
					<div class="col-12 form-links-container">
						<div class="row">
							<div class="col-12 col-md-4 col-sm-6 col-xs-12 links column-1">
								<?php wp_nav_menu( array( 'theme_location' => 'hr-policies-menu-1' ) ); ?>
							</div>
							<div class="col-12 col-md-4 col-sm-6 col-xs-12 links column-2">
								<?php wp_nav_menu( array( 'theme_location' => 'hr-policies-menu-2' ) ); ?>
							</div>
							<div class="col-12 col-md-4 col-sm-6 col-xs-12 links column-3">
								<?php wp_nav_menu( array( 'theme_location' => 'hr-policies-menu-3' ) ); ?>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-12 content-links content-forms">
					<div class="col-12 header-title">
						<h1><?php echo get_field('second_label');?></h1>
					</div>
					<div class="col-12 form-links-container">
						<div class="row">
							<div class="col-12 col-md-4 col-sm-6 col-xs-12 links column-1">
								<?php wp_nav_menu( array( 'theme_location' => 'hr-forms-menu-1' ) ); ?>
							</div>
							<div class="col-12 col-md-4 col-sm-6 col-xs-12 links column-2">
								<?php wp_nav_menu( array( 'theme_location' => 'hr-forms-menu-2' ) ); ?>
							</div>
							<div class="col-12 col-md-4 col-sm-6 col-xs-12 links column-3">
								<?php wp_nav_menu( array( 'theme_location' => 'hr-forms-menu-3' ) ); ?>
							</div>
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
