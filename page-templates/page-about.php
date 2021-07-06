<?php
/*
		Template Name: About Page
*/
get_header();

?>
<div class="container pt-5 page-about-container">
	<div class="col-12 offset-md-2 col-md-8 about-info-1">
		<div class="ratio ratio-16x9">
			<?php echo get_field( 'about_info_1_video_link' ); ?>
		</div>
		<div class="info-desc">
			<div class="info-desc-text">
				<p><?php echo get_field( 'about_info_1_description' ); ?></p>
			</div>
		</div>
	</div>

	<div class="col-12 offset-md-2 col-md-8 about-info-2">
		<div class="row">
			<div class="col-12 banner-header-hashtag">
				<h1><?php echo get_field( 'about_info_2_banner_title' ); ?></h1>
				<h4><?php echo get_field( 'about_info_2_hashtag' ); ?></h4>
			</div>
			<div class="col-12 col-md-6 info-2-image">
				<?php
				echo do_shortcode( '[smartslider3 slider=3]' );
				?>
			</div>
			<div class="col-12 col-md-6 info-2-desc">
				<p><?php echo get_field( 'about_info_2_description' ); ?></p>
			</div>
		</div>
	</div>

	<div class="col-12 offset-md-2 col-md-8 about-info-3">
		<div class="row">
			<div class="col-12 col-md-6 info-3-image">
				<div class="image-container">
					<img src="<?php echo get_field( 'about_info_3_image' ); ?>" alt="Info Image">
				</div>
			</div>
			<div class="col-12 col-md-6 info-3-desc">
				<div class="i3-desc-1">
					<p><?php echo get_field( 'about_info_3_description_1' ); ?></p>
				</div>
				<div class="i3-desc-2">
					<p><?php echo get_field( 'about_info_3_description_2' ); ?></p>
				</div>
				<div class="i3-desc-3">
					<p><?php echo get_field( 'about_info_3_description_3' ); ?></p>
				</div>
			</div>
		</div>
	</div>


</div>
<?php
get_footer();
?>
