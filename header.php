<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="AE Study Website">
		<meta name="author" content="Renan Sigolo">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<title>AE Study</title>
		<!-- Google Tag Manager -->
		<script>
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-MLQDHPD');
		</script>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120265849-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-120265849-1');
		</script>
		<!-- End Google Tag Manager -->
		<?php wp_head();
		global $post;

		$page_id = $post->ID;
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		$page_featured_url = wp_get_attachment_url( get_post_thumbnail_id($page_id ) );

		// $pagebackground = get_field('page_background',2);
		?>

	</head>
<body>
		<!-- Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MLQDHPD" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<!-- End Google Tag Manager (noscript) -->

	<header>
	<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-link active" aria-current="page" href="#">Home</a>
					<a class="nav-link" href="#">Features</a>
					<a class="nav-link" href="#">Pricing</a>
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</div>
			</div>
		</div>
	</nav> -->
	<!-- <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="https://placeholder.pics/svg/1400x1000" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Responsive left-aligned hero with image</h1>
        <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4">Primary</button>
        </div>
      </div>
    </div>
  </div> -->
		<!-- <?php echo the_ID(); ?> -->
		
		<!-- START Background Image -->
		<!-- Page ID 2 is homepage -->
		<?php if ($page_id === 2) { ?>
			<div class="header-body">
		 <?php $args = array(
				 'post_type' => 'home_header',
				 'posts_per_page' => -1,
				 'post_status'    => 'publish',
				 'orderby'        => 'date'
			 );
			 $homeslider = new WP_Query( $args );

			 if( $homeslider->have_posts() ) :
			 ?>
			 <?php
						while( $homeslider->have_posts() ) :
						 $homeslider_id = get_the_id();
						 $homeslider->the_post();
						 $homeBackground = get_field('header_background');
			 ?>
			 <div class="home-header-background" style="background-image: url('<?php echo $homeBackground; ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;"></div>
			 <?php endwhile; endif; wp_reset_query(); ?>
		<?php } else { ?>
			 <div class="header-body" style="background-image: url('<?php echo $page_featured_url; ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">
		<?php } ?>
		<!-- END Background Image -->

		<div class="row">
			<div class="col-12">
				<div class="row">
					
					<section class="col-12 offset-md-1 col-md-4 navigation">
						<div class="navigation-bar">
							<div class="nav-logo">
								<a href="<?php echo home_url(); ?>">
									<img src="<?php echo $image[0]; ?>" alt="Logo">
								</a>
							</div>
							<div class="nav-list">
								<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
							</div>
							<div class="mobile-nav-menu">
								<a href="javascript:void(0);" id="burger-menu" class="icon">
									 <i class="fa fa-bars"></i>
								</a>
								<div id="menu_list" class="menu_list">
										<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
								</div>
							</div>
						</div>
					</section>
					
					<!-- START Home Slider -->
					<?php if($page_id === 2) { ?>
					<section class="col-12 offset-md-1 col-md-5 home-info-slider">
						<div class="row">
								<?php $args = array(
										'post_type' => 'home_header',
										'posts_per_page' => -1,
										'post_status'    => 'publish',
										'orderby'        => 'date'
									);

									$homeslider = new WP_Query( $args );

									if( $homeslider->have_posts() ) {
									?>
									<div class="info-slider-body p-5">
										<?php while( $homeslider->have_posts() ) :
														$homeslider_id = get_the_id();
														$homeslider->the_post();
														$home_header = get_field('home_header_label');
														$content = apply_filters('the_content', $post->post_content);
														$home_header_btn_label = get_field('homeheader_button_label');
														$home_header_btn_link = get_field('homeheader_button_link');
											?>
										<div class="info-slider-body-list" id="<?php echo $homeslider_id; ?>">
											<h1><?php echo $home_header ?></h1>
											<div class="header-info-text">
												<p><?php echo $content; ?></p>
											</div>
											<?php if($home_header_btn_label !== '' && $home_header_btn_link !== '') {
													echo '<a href="'.$home_header_btn_link.'"><button class="btn-link-general">'.$home_header_btn_label.'</button></a>';
												} ?>
										</div>
										<?php endwhile; ?>
									</div>
							</div>
						
						<!-- START Home Slider Navbar -->
						<div class="info-slider-navigation">
							<ul class="d-none d-lg-block info-slider-navigation-list">
							<?php $number = 1;
								while( $homeslider->have_posts() ) {
									$homeslider->the_post();
									$homeslider_id = get_the_id();
									echo '<li id="'.$homeslider_id.'">'.sprintf('%02s', $number).'</li>';
									$number ++;
								}
							?>
							</ul>
						</div>
						<!-- END Home Slider Navbar -->
						<?php }
							wp_reset_query();
						?>
					</section>
					<!-- END Home Slider -->

					<!-- START Logic for pages with Contact Form
						ID 20 -> Contact Us
						ID 482 -> ???
						ID 471 -> ???
					-->
					<?php } else if ($page_id === 20 || $page_id === 482 || $page_id === 471){
						$content_post = get_post($page_id);
						$content = $content_post->post_content;
						$content = apply_filters('the_content', $content);
						$header_form_label = get_field('header_form_label', $page_id);
						$header_form_sublabel = get_field('header_form_sub_label', $page_id);
					?>
					<section class="col-12 offset-md-1 col-md-6 contact-page-header">
						<div class="col-12 page-content">
							<div class="row">
								<div class="col-12 form-header">
									<h1><?php echo $header_form_label; ?></h1>
									<div class="form-sub-header">
										<p><?php echo $header_form_sublabel; ?></p>
									</div>
								</div>
								<div class="col-12 col-md-8 py-3 form-fields" id='form-id-<?php echo $page_id; ?>'>
									<?php
										if($page_id === 20):
											echo do_shortcode( '[wpforms id="173"]' );
										elseif ($page_id === 482):
											echo do_shortcode( '[wpforms id="469"]' );
										elseif ($page_id === 471):
											echo do_shortcode( '[wpforms id="174"]' );
										endif;
									?>
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
					<!-- END Logic for pages with Contact Form -->
				
					<!-- START Header for Events and Workshops Page -->
					<?php } else if ($page_id === 16) {
								session_start();

								if ( isset ($_GET['btn_current']) ) {
									$txtSelected = $_GET['btn_current'];
									$_SESSION['set_which_event'] = $txtSelected;
								}else{
									$_SESSION['set_which_event'] = 'CURRENT EVENTS';
								}

							$content_post = get_post($page_id);
							$page_title = get_the_title( $page_id );
							$content = $content_post->post_content;
							$content = apply_filters('the_content', $content);
						?>
					<section class="col-12 offset-md-1 col-md-6 home-page-info">
						<div class="page-content">
							<h1><?php echo $page_title ?></h1>
							<div class="text-content">
								<p><?php echo $content; ?></p>
							</div>
						</div>
					</section>

				</div>

			<!-- POSTS -->
			<?php } else if (is_singular('post')) {
				$content_post = get_post($page_id);
				$page_title = get_the_title( $page_id );
				$content = $content_post->post_content;
				$content = apply_filters('the_content', $content);
				$button_label = get_field('header_button_label', $page_id);
				$button_link = get_field('header_button_link', $page_id);
				$date = get_the_date('F j, Y', $page_id);
				$authorid = get_post_field( 'post_author', $post_id );
				$fnameAuthor = get_the_author_meta('first_name', $authorid);
				$lnameAuthor = get_the_author_meta('last_name', $authorid);
				$author = $fnameAuthor. ' ' . $lnameAuthor;
				?>
					<section class="col-12 offset-md-1 col-md-6 home-page-info">
						<div class="page-content">
							<div class="blog-date-author">
								<p><?php echo $date; ?> | <?php echo $author; ?></p>
								<?php the_field('authors_name'); ?>
							</div>
							<div class="text-content">
								<h3><?php echo $page_title ?></h3>
							</div>
							<?php
								if ( $button_label != '' && $button_link != '' ) {
									echo '<a href="'.$button_link.'"><button class="btn-link-general">'.$button_label.'</button></a>';
								}
							?>
						</div>
					</section>
					<?php
						} else {
							$content_post = get_post($page_id);
							$page_title = get_the_title( $page_id );
							$content = $content_post->post_content;
							$content = apply_filters('the_content', $content);
							$button_label = get_field('header_button_label', $page_id);
							$button_link = get_field('header_button_link', $page_id);
						?>
						<section class="col-12 offset-md-1 col-md-6 home-page-info">
							<div class="page-content">
								<h1><?php echo $page_title ?></h1>
								<div class="text-content">
									<p><?php echo $content; ?></p>
								</div>
								<?php
									if($button_label != '' && $button_link != '') {
										echo '<a href="'.$button_link.'"><button class="btn-link-general">'.$button_label.'</button></a>';
									}
								?>
							</div>
						</section>
					<?php } ?>
				</div>
			</div>
		</div>

	</header>
