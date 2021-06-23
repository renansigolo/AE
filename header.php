<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MLQDHPD"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

	<header>
		<?php if ($page_id == 2) { ?>
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

		<div class="row">
			<div class="col-12">
				<h6 class="login-portal"><span id="lp_link"><a href="<?php echo get_field('header_login_link',2); ?>" class="badge rounded-pill bg-dark" target="_blank"><?php echo get_field('header_login_label',2); ?></a></span></h6>
				<div class="row">
					<div class="col-12 offset-md-1 col-md-4 navigation">
						<div class="navigation-bar">
							<div class="nav-logo">
								<a href="<?php echo home_url(); ?>">
									<img src="<?php echo $image[0]; ?>" alt="">
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
					</div>
					<?php if($page_id == 2){ ?>
					<div class="col-12 offset-md-1 col-md-5 home-info-slider">
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
									<?php
											while( $homeslider->have_posts() ) :
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
											<?php
												if($home_header_btn_label != '' && $home_header_btn_link != '') {
													echo '<a href="'.$home_header_btn_link.'"><button class="btn-link-general">'.$home_header_btn_label.'</button></a>';
												}
											?>
										</div>

										<?php endwhile; ?>
									</div>
						</div>
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
						<?php
						}
						wp_reset_query();
						?>
					</div>

					<?php
					} else if ($page_id == 20 || $page_id == 482 || $page_id == 471){
						$content_post = get_post($page_id);
						$content = $content_post->post_content;
						$content = apply_filters('the_content', $content);
						$header_form_label = get_field('header_form_label', $page_id);
						$header_form_sublabel = get_field('header_form_sub_label', $page_id);
					?>
					<div class="col-12 offset-md-1 col-md-6 contact-page-header">
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
									if($page_id == 20):
										echo do_shortcode( '[wpforms id="173"]' );
									elseif ($page_id == 482):
										echo do_shortcode( '[wpforms id="469"]' );
									elseif ($page_id == 471):
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
					</div>

				<?php
					}else if ($page_id == 16){
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
			<div class="col-12 offset-md-1 col-md-6 home-page-info">
				<div class="page-content">
					<h1><?php echo $page_title ?></h1>
					<div class="text-content">
						<p><?php echo $content; ?></p>
					</div>
				</div>
			</div>
</div>

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
					<div class="col-12 offset-md-1 col-md-6 home-page-info">
						<div class="page-content">
							<div class="blog-date-author">
								<p><?php echo $date; ?> | <?php echo $author; ?></p>
					
					<?php the_field('authors_name'); ?>
							</div>
							<div class="text-content">
								<h3><?php echo $page_title ?></h3>
							</div>
							<?php
								if($button_label != '' && $button_link != ''){
									echo '<a href="'.$button_link.'"><button class="btn-link-general">'.$button_label.'</button></a>';
								}
							?>
						</div>
					</div>
				<?php
				}else{
					$content_post = get_post($page_id);
					$page_title = get_the_title( $page_id );
					$content = $content_post->post_content;
					$content = apply_filters('the_content', $content);
					$button_label = get_field('header_button_label', $page_id);
					$button_link = get_field('header_button_link', $page_id);
					?>
					<div class="col-12 offset-md-1 col-md-6 home-page-info">
						<div class="page-content">
							<h1><?php echo $page_title ?></h1>
							<div class="text-content">
								<p><?php echo $content; ?></p>
							</div>
							<?php
								if($button_label != '' && $button_link != ''){
									echo '<a href="'.$button_link.'"><button class="btn-link-general">'.$button_label.'</button></a>';
								}
							?>
						</div>
					</div>
		<?php
		}

		if($page_id != 2) {
		?>
		<style media="screen">
			footer .footer-body .partners-icon-body{
				display: none;
			}
		</style>
		<?php } ?>
				</div>
			</div>
		</div>
	</header>
