<?php
/*
		Template Name: Booking Page
*/
get_header();

$numberColumn = get_field( 'number_of_column' );
?>
<div class="page-booking-container">
	<div class="col-12 offset-md-2 col-md-8 common-container">
		<div class="col-12 common-content">
			<div class="row">
				<div class="col-12 content">
					<?php echo get_field( 'booking_form' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
?>
