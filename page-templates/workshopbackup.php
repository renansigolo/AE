<!-- <div class="col-12 workshop-container">
		 <div class="row">
			 <?php
			 $content_diploma = get_post(8);
			 $content_diploma = $content_diploma->post_content;
			 $content_bootcamp = get_post(12);
			 $content_bootcamp = $content_bootcamp->post_content;
			 ?>
			 <div class="col-12 col-md-6 diploma-desc">
				 <a href="<?php echo get_field('courses_first_label_link'); ?>"> -->
					 <h1><?php echo get_field('courses_first_label');?></h1>
				 <!-- </a> -->
				 <p><?php echo get_field('courses_first_desc');?></p>
			 </div>
			 <div class="col-12 col-md-6 bootcamp-desc">
				 <a href="<?php echo get_field('bootcamp_first_label_link'); ?>">
					 <h1><?php echo get_field('bootcamp_first_label');?></h1>
				 </a>
				 <p><?php echo get_field('bootcamp-first-desc');?></p>
			 </div>
			 <?php
			 $args = array(
				 'post_type' => 'diploma_studies',
				 'post_status'    => 'publish',
				 'posts_per_page'  => 5,
				 'orderby' => 'rand'
			 );

			 $studies = new WP_Query( $args );
			 while ( $studies->have_posts() ) : $studies->the_post();
				 $content = get_the_content();
			 ?>
			 <div class="col-12 col-md-6 diploma" id ="<?php echo get_the_id(); ?>">
				 <div class="row">
					 <div class="col-12 col-md-6 diploma-img">
						 <img src="<?php the_post_thumbnail_url();?>" alt="">
					 </div>
					 <div class="col-12 col-md-6 diploma-info">
						 <h3><?php the_title(); ?></h3>
						 <p><?php echo substr($content, 0, 200)."..."; ?></p>
						 <div class="diploma-read-more">
							 <a href="<?php echo the_permalink(); ?>"><button class="btn-link-general">DIG UP MORE</button></a>
						 </div>
					 </div>
				 </div>
			 </div>
			 <?php
			 // the_content();
			 endwhile;
			 // Reset Post Data
			 wp_reset_postdata();

			 $args2 = array(
				 'post_type' => 'bootcamps',
				 'post_status' => 'publish',
				 'posts_per_page' => 3,
				 'orderby' => 'rand'
			 );

			 $bootcamps = new WP_Query( $args2 );
			 if( $bootcamps->have_posts() ) {
				 while( $bootcamps->have_posts() ) {
					 $bootcamps->the_post();
					 // $date = get_field('bootcamp_start_date');
					 // $day = date('l', strtotime($date));
					 $content = get_the_content();
			 ?>
			 <div class="col-12 col-md-6 bootcamps" id ="<?php echo get_the_id(); ?>">
				 <div class="row">
					 <div class="col-12 col-md-6 bootcamp-img">
						 <img src="<?php the_post_thumbnail_url(); ?>" alt="">
					 </div>
					 <div class="col-12 col-md-6 bootcamp-info">
						 <h3><?php the_title(); ?></h3>
						 <p><?php echo substr($content, 0, 200)."..."; ?></p>
						 <div class="bootcamp-read-more">
							 <a href="<?php echo the_permalink(); ?>"><button class="btn-link-general">DIG UP MORE</button></a>
						 </div>
					 </div>
				 </div>
			 </div>
			 <?php
				 }
			 }
			 wp_reset_query();

			 echo '<div class="col-12 col-md-6 diploma-navigation">';
			 $studies = new WP_Query( $args );
			 while ( $studies->have_posts() ) : $studies->the_post();
				 $content = get_the_content();
				 echo '<p id="<?php echo get_the_id(); ?>"></p>';
				 // the_content();
			 endwhile;
				 // Reset Post Data
			 wp_reset_postdata();
			 echo '</div>';

			 echo '<div class="col-12 col-md-6 bootcamp-navigation">';
				 $bootcamps = new WP_Query( $args2 );
					 while ( $bootcamps->have_posts() ) : $bootcamps->the_post();
						 $content = get_the_content();
						 echo '<p id="<?php echo get_the_id(); ?>"></p>';
					 endwhile;
				 wp_reset_postdata();
			 echo '</div>';
			 ?>
		 </div>
 </div>  -->

 // .workshop-container{
 //   .diploma-desc{
 //     b,strong{
 //       color: #c1a364;
 //     }
 //     h1{
 //       color: #c1a364;
 //       font-weight: 700;
 //     }
 //     a{
 //       color: #ffffff;
 //       h1{
 //         color: #c1a364;
 //         font-weight: 700;
 //         &:hover{
 //           color: #ffffff;
 //         }
 //       }
 //       &:hover{
 //         text-decoration: none;
 //         color: #c1a364;
 //       }
 //     }
 //       @extend %regular-text-white;
 //       p{
 //         font-size: 10px;
 //         text-transform: uppercase;
 //       }
 //   }
 //   .bootcamp-desc{
 //     b,strong{
 //       color: #c1a364;
 //     }
 //     a{
 //       h1{
 //         color: #c1a364;
 //         font-weight: 700;
 //         &:hover{
 //           color: #ffffff;
 //         }
 //       }
 //       &:hover{
 //         text-decoration: none;
 //       }
 //     }
 //       @extend %regular-text-white;
 //       p{
 //         font-size: 10px;
 //         text-transform: uppercase;
 //       }
 //   }
 //   .diploma{
 //     height: 230px;
 //     .diploma-img{
 //       img{
 //         width: 100%;
 //         object-fit: cover;
 //         height: 200px;
 //       }
 //     }
 //     .diploma-info{
 //       @extend %text-content-h1-6-12-600-15;
 //       h3{
 //         text-transform: uppercase;
 //       }
 //       @extend %regular-text-white;
 //       p{
 //         font-size: 10px;
 //         text-transform: uppercase;
 //       }
 //       border-top: 1px solid #c1a364;
 //     }
 //   }
 //   .diploma-navigation{
 //     margin-top: 10px;
 //     p{
 //       padding: 5px 20px;
 //       background-color: #d1d3d5;
 //       display: inline-block;
 //       margin-right: 5px;
 //       cursor: pointer;
 //
 //       &:hover{
 //         background-color: #c1a364;
 //       }
 //     }
 //     p.active{
 //       background-color: #c1a364;
 //     }
 //   }
 //   .bootcamps{
 //     height: 230px;
 //     .bootcamp-img{
 //       img{
 //         width: 100%;
 //         object-fit: cover;
 //         height: 200px;
 //       }
 //     }
 //     .bootcamp-info{
 //       @extend %text-content-h1-6-12-600-15;
 //       h3{
 //         text-transform: uppercase;
 //       }
 //       border-top: 1px solid #c1a364;
 //       @extend %regular-text-white;
 //       p{
 //         font-size: 10px;
 //         text-transform: uppercase;
 //       }
 //     }
 //   }
 //   .bootcamp-navigation{
 //     margin-top: 10px;
 //     p{
 //       padding: 5px 20px;
 //       background-color: #d1d3d5;
 //       display: inline-block;
 //       margin-right: 5px;
 //       cursor: pointer;
 //
 //       &:hover{
 //         background-color: #c1a364;
 //       }
 //     }
 //     p.active{
 //       background-color: #c1a364;
 //     }
 //   }
 // }


 // $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .diploma').hide();
 // $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .diploma:first').show();
 // $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .diploma-navigation p:first').addClass('active');
 // $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .diploma-navigation p').click(function() {
 //   $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .diploma-navigation p').removeClass("active");
 //   $(this).addClass("active");
 //   $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .diploma').fadeOut(0);
 //   var indexer = $(this).index();
 //   $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .diploma:eq(' + indexer + ')').fadeIn(200);
 // });
 //
 // var totalDivDiploma = $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .diploma-navigation p').length;
 // var indexInDiploma = 1;
 //
 // function sliderHeaderDiploma(){
 //   if(indexInDiploma  >= totalDivDiploma){
 //     indexInDiploma = 0;
 //   }
 //   $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .diploma').hide();
 //   $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .diploma-navigation p').removeClass("active");
 //   $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .diploma-navigation p:eq(' + indexInDiploma + ')').addClass("active");
 //   $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .diploma:eq(' + indexInDiploma + ')').fadeIn(200);
 //
 //   indexInDiploma++;
 // }
 //
 // setInterval(sliderHeaderDiploma, 5000);
 //
 // $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .bootcamps').hide();
 // $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .bootcamps:first').show();
 // $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .bootcamp-navigation p:first').addClass('active');
 // $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .bootcamp-navigation p').click(function() {
 //   $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .bootcamp-navigation p').removeClass("active");
 //   $(this).addClass("active");
 //   $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .bootcamps').fadeOut(0);
 //   var indexer = $(this).index();
 //   $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .bootcamps:eq(' + indexer + ')').fadeIn(200);
 // });
 //
 // var totalDivBootcamp = $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .bootcamp-navigation p').length;
 // var indexInBootcamp = 1;
 //
 // function sliderHeaderBootcamp(){
 //   if(indexInBootcamp  >= totalDivBootcamp){
 //     indexInBootcamp = 0;
 //   }
 //   $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .bootcamps').hide();
 //   $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .bootcamp-navigation p').removeClass("active");
 //   $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .bootcamp-navigation p:eq(' + indexInBootcamp + ')').addClass("active");
 //   $('.page-home-container .home-container .event-workshop .ew-body .workshop-container .bootcamps:eq(' + indexInBootcamp + ')').fadeIn(200);
 //
 //   indexInBootcamp++;
 // }
 //
 // setInterval(sliderHeaderBootcamp, 5000);
