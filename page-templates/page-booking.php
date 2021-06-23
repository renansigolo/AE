<?php
/*
		Template Name: Booking Page
*/
get_header();

$numberColumn = get_field('number_of_column');
?>
<div class="page-booking-container">
	<div class="big-polygon">
		<img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="Polygon Image">
	</div>
	<div class="small-polygon">
		<img src="<?php echo home_url() . '/wp-content/uploads/2020/04/Polygon-2-small.png'; ?>" alt="Small Polygon Image">
	</div>

	<div class="col-12 offset-md-2 col-md-8 common-container">
		<div class="col-12 common-content">
			<div class="row">
				<div class="col-12 content">
					<?php echo get_field('booking_form');?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
?>
