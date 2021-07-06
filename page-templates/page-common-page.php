<?php
/*
		Template Name: Common Page
*/
get_header();

$numberColumn = get_field( 'number_of_column' );
?>
<div class="page-common-container">
	<div class="col-12 col-md-8 mx-auto common-container">
		<div class="common-content">
			<div class="row">
			<?php if ( $numberColumn == 'one' ) { ?>
				<div class="col-12 content">
					<?php echo get_field( 'first_column_content' ); ?>
				</div>
			<?php } else { ?>
				<div class="col-12 col-md-6 content first-column">
					<?php echo get_field( 'first_column_content' ); ?>
				</div>
				<div class="col-12 col-md-6 content second-column">
					<?php echo get_field( 'second_column_content' ); ?>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
?>
