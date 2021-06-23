<?php
/*
		Template Name: Partners Page
*/
get_header();

$srchCountry = '';
$srchContinent = '';
if ( isset ($_GET['continent']) ) {
	$srchContinent = $_GET['continent'];
}
if ( isset ($_GET['country']) ) {
	$srchCountry = $_GET['country'];
}
?>
<div class="page-partner-container">
	<div class="col-12 offset-md-2 col-md-9 partner-body">
		<div class="row">
			<div class="col-12 col-md-4 partner-img">
				<img src="<?php echo get_field('content_image'); ?>" alt="Partner Image">
			</div>
			<div class="col-12 col-md-4 partner-countries">
				<?php
				$continents = get_terms( array(
						'taxonomy' => 'partner_countries',
						'hide_empty' => false,
						'parent' => 0
				) );
				?>
				<ul class="list-continent">
					<?php
						foreach ($continents as $continent) {
							$contiID = $continent->term_id;
							$contiName = $continent->name;
							$link = get_term_link($continent->slug,'partner_countries');
							if($srchContinent != '' && $srchContinent == $contiID ){
								echo '<li><h2>' . $contiName . '<i id="drop-list" class="fas fa-plus rotate fa-minus"></i></h2>';
							}else{
								echo '<li><h2>' . $contiName . '<i id="drop-list" class="fas fa-plus"></i></h2>';
							}

						$parent_continent_id = $continent->term_id;
						$countries = get_terms(array(
							'taxonomy' => 'partner_countries',
							'hide_empty' => false,
							'parent' => $parent_continent_id
						));
						if($countries){
							if($srchContinent != '' && $srchContinent == $contiID ){
									echo '<ul class="list-country" id="country_list" style="display: block;" >';
							}else{
									echo '<ul class="list-country" id="country_list" style="display: none;">';
							}
							foreach ($countries as $country ) {
								$countID =$country->term_id;
								$countName = $country->name;
								$sub_link =  home_url() . "/our-partners/?continent=" . $contiID . "&country=" . $countID;

								if($srchCountry != '' && $srchCountry == $countID ){
										echo '<li><a href="'.$sub_link.'"><p style="color: #bfa664;">'. $countName .'</p></a></li>';

								}else{
										echo '<li><a href="'.$sub_link.'"><p>'. $countName .'</p></a></li>';
								}
							}
							echo '</ul>';
						}
						echo '</li>';
					} ?>
				</ul>
			</div>

			<div class="col-12 col-md-4 partners-info">
				<div class="row">
						<?php
						$args = array(
							'post_type' => 'partners',
							'post_status' => 'publish',
							'posts_per_page' => -1,
							'orderby' => 'date'
						);

							if($srchCountry != ""){
								$args['tax_query'] = array(
									array(
											'taxonomy' => 'partner_countries',
											'field' => 'term_id',
											'terms' => $srchCountry,
											'operator' => 'IN'
								),
								);
							}

						$partner = new WP_Query( $args );
						if( $partner->have_posts() ) {
							while( $partner->have_posts() ) {
								$partner->the_post();
						?>
						<div class="col-12 partner-content">
							<p class="content-title"><h4><?php echo the_title(); ?></h4></p>
							<p class="content-text"><?php echo the_content(); ?></p>
						</div>
						<?php
							}
						}
						wp_reset_query();
						?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
?>
