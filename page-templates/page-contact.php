<?php
/*
		Template Name: Contact Page
*/
get_header();
?>

<?php 
$page_id = null;
// $page_id = $post->ID;
// $content_post = get_post($page_id);
// $content = $content_post->post_content;
// $content = apply_filters('the_content', $content);
// $header_form_label = get_field('header_form_label', $page_id);
// $header_form_sublabel = get_field('header_form_sub_label', $page_id);
?>

<div class="page-contact-container">
	<div class="container">
		<div class="col-12 col-lg-8 mx-auto location-contact">
			<div class="row">
				<div class="col-12 col-lg-4 location-description">
					<h3><?php echo get_field('location_label'); ?></h3>
					<div class="divider"></div>
					<br />
					<p><?php echo get_field('location_address'); ?></p>
				</div>
				<div class="col-12 col-lg-8 location-map">
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
				<img src="<?php echo home_url().'/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="Polygon Image">
			</div>
		</div>
	</div>

	<?php $book_bg = get_field('book_header_background'); ?>

</div>
<?php
get_footer();
?>

<?php if($page_id === 20) : ?>
<div class="row">
	<section class="col-12 col-md-8 mx-auto bg-primary contact-page-header">
		<div class="col-12 page-content">
			<div class="row">
				<div class="col-12 form-header">
					<h1><?php echo $header_form_label; ?></h1>
					<div class="form-sub-header">
						<p><?php echo $header_form_sublabel; ?></p>
					</div>
				</div>
				<div class="col-12 col-md-8 py-3 form-fields" id='form-id-<?php echo $page_id; ?>'>
					<?php echo do_shortcode( '[wpforms id="173"]' ); ?>
				</div>
				<div class="col-12 col-md-4 sched-and-info">
					<div class="text-content">
						<p><?php echo $content; ?></p>
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Social Icon") ) : ?>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php endif; ?>