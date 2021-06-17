<?php
function ae_scripts() {
	// Style Libs
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css');
	wp_enqueue_style( 'stylesheet', get_template_directory_uri() . '/style.css' );
	// wp_enqueue_style( 'bootstrap-csss', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
	wp_enqueue_style( 'bootstrap-fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
	// Javascript Libs
	wp_enqueue_script( 'bootstrap-jss', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '3.0.0', true  );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.min.js', array('jquery'), '3.0.0', true );
	wp_enqueue_script( 'customjs', get_template_directory_uri() . '/assets/js/custom-script.js');
	wp_enqueue_script( 'mapjs', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBwbuq1wo486UUaBvb7z5UcnIyP2tXtuYE');
}

add_action( 'wp_enqueue_scripts', 'ae_scripts' );

// function ae_google_fonts() {
// 				wp_register_style('Montserrat', 'http://fonts.googleapis.com/css?family=Montserrat:100,200,400,600,700,800');
// 				wp_enqueue_style( 'Montserrat');
// 		}

// add_action('wp_print_styles', 'ae_google_fonts');

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_theme_support('widgets');

function register_my_menu() {
	register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu-1' => __( 'Footer Menu 1' ),
      'footer-menu-2' => __( 'Footer Menu 2' ),
      'footer-menu-3' => __( 'Footer Menu 3' ),
      'footer-menu-4' => __( 'Footer Menu 4' ),
			'forms-menu-1' => __( 'Forms Menu 1' ),
			'forms-menu-2' => __( 'Forms Menu 2' ),
			'forms-menu-3' => __( 'Forms Menu 3' ),
			'hr-policies-menu-1' => __( 'HR Policies Menu 1' ),
			'hr-policies-menu-2' => __( 'HR Policies Menu 2' ),
			'hr-policies-menu-3' => __( 'HR Policies Menu 3' ),
			'hr-forms-menu-1' => __( 'HR Forms Menu 1' ),
			'hr-forms-menu-2' => __( 'HR Forms Menu 2' ),
			'hr-forms-menu-3' => __( 'HR Forms Menu 3' )
    )
  );
}
add_action( 'init', 'register_my_menu' );

function home_header_posts() {
  $args = array(
		'label' => 'Home Header',
			'public' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array('slug' => 'home_header'),
			'query_var' => true,
			'supports' => array(
					'title',
					'editor',
					'author',)
	);
  register_post_type( 'home_header', $args );
}
add_action( 'init', 'home_header_posts' );

if ( function_exists('register_sidebar') ) {
	  register_sidebar(array(
	    'name' => 'Footer Partners Icon 1',
			'id' => 'footer-partners-1-icon',
	    'before_widget' => '<div class="partners_icons">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3>',
	    'after_title' => '</h3>',
	  )
		);

		register_sidebar(array(
			'name' => 'Footer Partners Icon 2',
			'id' => 'footer-partners-2-icon',
			'before_widget' => '<div class="partners_icons">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		)
		);

		register_sidebar(array(
			'name' => 'Social Icon',
			'id' => 'social-icon',
			'before_widget' => '<div class="social-icons">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		)
		);
		register_sidebar(array(
			'name' => 'Footer Copyright',
			'id' => 'footer-copyright',
			'before_widget' => '<div class="copyright">',
			'after_widget' => '</div>',
			'before_title' => '<p class="copy-title">',
			'after_title' => '</p>',
		)
		);
		register_sidebar(array(
			'name' => 'Popular Post Blog',
			'id' => 'blog-popular-posts',
			'before_widget' => '<div class="popular-post-list">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="post-title">',
			'after_title' => '</h4>',
		)
		);
		register_sidebar(array(
			'name' => 'Student Handbook Collapse',
			'id' => 'student-handbook-collapse',
			'before_widget' => '<div class="handbook-list">',
			'after_widget' => '</div>',
			'before_title' => '<div class="container-title"><h3>',
			'after_title' => '</h3><i class="fas fa-chevron-down"></i></div>',
		)
		);
}

function my_acf_google_map_api( $api ){

	$api['key'] = 'AIzaSyBwbuq1wo486UUaBvb7z5UcnIyP2tXtuYE';

	return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

//FILTER
function filter_cars_by_taxonomies( $post_type, $which ) {

	// Apply this only on a specific post type
	if ( 'partners' !== $post_type )
		return;

	// A list of taxonomy slugs to filter by
	$taxonomies = array( 'partner_countries');

	foreach ( $taxonomies as $taxonomy_slug ) {

		// Retrieve taxonomy data
		$taxonomy_obj = get_taxonomy( $taxonomy_slug );
		$taxonomy_name = $taxonomy_obj->labels->name;

		// Retrieve taxonomy terms
		$terms = get_terms( $taxonomy_slug );

		// Display filter HTML
		echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
		echo '<option value="">' . sprintf( esc_html__( 'Show All %s', 'text_domain' ), $taxonomy_name ) . '</option>';
		foreach ( $terms as $term ) {
			printf(
				'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
				$term->slug,
				( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
				$term->name,
				$term->count
			);
		}
		echo '</select>';
	}

}
add_action( 'restrict_manage_posts', 'filter_cars_by_taxonomies' , 10, 2);
