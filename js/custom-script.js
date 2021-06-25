jQuery(
	function ($) {
		// HEADER SCRIPT
		$( ".navigation .mobile-nav-menu #menu_list" ).hide();
		$( ".navigation .mobile-nav-menu #burger-menu" ).on(
			"click",
			function () {
				$( ".navigation #menu_list" ).toggle( 100 );
			}
		);

		let countA      = 0;
		window.onscroll = function () {
			scrollFunction();
			startCount();
		};

		function startCount() {
			let oTop;
			if ($( "#start_count" ).length !== 0) {
				oTop = $( "#start_count" ).offset().top - window.innerHeight;
			}
			if (countA === 0 && $( window ).scrollTop() > oTop) {
				let i = 0;
				$( ".counter-value" ).each(
					function () {
						const $this = $( this ),
						countTo     = $this.attr( "data-count" );
						$(
							{
								countNum: $this.text(),
							}
						).animate(
							{ countNum: countTo },
							{
								duration: 2000,
								easing: "swing",
								step() {
									$this.text( Math.floor( this.countNum ) );
								},
								complete() {
									if (i === 2) {
										$this.text( this.countNum + "M" );
									} else {
										$this.text( this.countNum );
									}
									i++;
								},
							}
						);
					}
				);
				countA = 1;
			}
		}

		function scrollFunction() {
			if (
			document.body.scrollTop > 20 ||
			document.documentElement.scrollTop > 20
			) {
				$( ".header-body .navigation .navigation-bar .mobile-nav-menu" ).addClass( "sticky" );
			} else {
				$( ".header-body .navigation .navigation-bar .mobile-nav-menu" ).removeClass( "sticky" );
			}
		}

		$( ".home-info-slider .row .info-slider-body-list" ).hide();
		$( ".home-info-slider .row .info-slider-body-list:first" ).show();
		$( ".header-body .home-header-background" ).hide();
		$( ".header-body .home-header-background:first" ).show();
		$( ".home-info-slider .info-slider-navigation .info-slider-navigation-list li:first" ).addClass( "active" );
		$( ".home-info-slider .info-slider-navigation .info-slider-navigation-list li" ).on(
			"click",
			function () {
				$( ".home-info-slider .info-slider-navigation .info-slider-navigation-list li" ).removeClass( "active" );
				$( this ).addClass( "active" );
				$( ".home-info-slider .row .info-slider-body-list" ).fadeOut( 0 );
				$( ".header-body .home-header-background" ).fadeOut( "slow" );
				const indexer = $( this ).index();
				$( ".home-info-slider .row .info-slider-body-list:eq(" + indexer + ")" ).fadeIn( 200 );
				$( ".header-body .home-header-background:eq(" + indexer + ")" ).fadeIn( "slow" );
			}
		);

		const totalDiv = $( ".home-info-slider .info-slider-navigation .info-slider-navigation-list li" ).length;
		let indexIn    = 1;

		function sliderHeader() {
			if (indexIn >= totalDiv) {
				indexIn = 0;
			}
			$( ".home-info-slider .row .info-slider-body-list" ).hide();
			$( ".header-body .home-header-background" ).hide();
			$( ".home-info-slider .info-slider-navigation .info-slider-navigation-list li" ).removeClass( "active" );
			$( ".home-info-slider .info-slider-navigation .info-slider-navigation-list li:eq(" + indexIn + ")" ).addClass( "active" );
			$( ".home-info-slider .row .info-slider-body-list:eq(" + indexIn + ")" ).fadeIn( 200 );
			$( ".header-body .home-header-background:eq(" + indexIn + ")" ).fadeIn( "slow" );
			indexIn++;
		}

		setInterval( sliderHeader, 8000 );

		// FOOTER SCRIPT
		$( ".footer-nav-body .footer-menus .footer-icon-social .icons .social-icons a[href^='https://']" ).attr( "target", "_blank" );

		// MAP SCRIPT
		function newMap($el) {
			const $markers = $el.find( ".marker" );
			const args     = {
				zoom: 16,
				center: new google.maps.LatLng( 0, 0 ),
				mapTypeId: google.maps.MapTypeId.ROADMAP,
			};

			const map   = new google.maps.Map( $el[0], args );
			map.markers = [];

			$markers.each(
				function () {
					addMarker( $( this ), map );
				}
			);

			centerMap( map );
			return map;
		}

		function addMarker($marker, map) {
			const latlng = new google.maps.LatLng(
				$marker.attr( "data-lat" ),
				$marker.attr( "data-lng" )
			);
			const marker = new google.maps.Marker(
				{
					position: latlng,
					map,
				}
			);

			map.markers.push( marker );

			if ($marker.html()) {
				const infowindow = new google.maps.InfoWindow(
					{
						content: $marker.html(),
					}
				);
				google.maps.event.addListener(
					marker,
					"click",
					function () {
						infowindow.open( map, marker );
					}
				);
			}
		}
		function centerMap(map) {
			const bounds = new google.maps.LatLngBounds();

			$.each(
				map.markers,
				function (i, marker) {
					const latlng = new google.maps.LatLng(
						marker.position.lat(),
						marker.position.lng()
					);
					bounds.extend( latlng );
				}
			);

			if (map.markers.length === 1) {
				map.setCenter( bounds.getCenter() );
				map.setZoom( 16 );
			} else {
				map.fitBounds( bounds );
			}
		}

		let map = null;

		$(
			function() {
				$( ".acf-map" ).each(
					function () {
						// create map
						map = newMap( $( this ) );
					}
				);
			}
		);

		$( ".page-partner-container .partner-body ul li:has(ul) " ).click(
			function () {
				$( this ).find( "i.fa-plus" ).toggleClass( "rotate" );
				$( this ).find( "i.fa-plus" ).toggleClass( "fa-minus" );
				$( this ).children( "ul" ).toggle( 300 );
			}
		);

		$( ".page-handbook-container .handbook-container .handbook-collapse-container .handbook-list .container-title " ).on(
			"click",
			function () {
				$( this ).find( "i.fa-chevron-down" ).toggleClass( "rotate" );
				$( this ).find( "i.fa-chevron-down" ).toggleClass( "fa-chevron-up" );
				$( this ).parent().find( ".textwidget" ).toggle( 300 );
			}
		);

		$( ".page-blog-container .blog-container .search-popular .popular-posts .popular-post-list .wpp-list li .wpp-post-title" ).after( "<hr />" );
		$( ".page-blog-container .blog-container .search-popular .popular-posts .popular-post-list .wpp-list li .wpp-meta .wpp-date" ).each(
			function () {
				const text = $( this ).text();
				$( this ).text( text.replace( "posted on", "" ) );
			}
		);

		$( ".page-adv-diploma-container .ad-container .diploma-studies .listing-studies .study-content" ).hide();
		$( ".page-adv-diploma-container .ad-container .diploma-studies .listing-studies .study-content:first" ).show();
		$( ".page-adv-diploma-container .ad-container .diploma-studies .listing-studies .studies-list .study-title:first" ).addClass( "active" );
		$( ".page-adv-diploma-container .ad-container .diploma-studies .listing-studies .studies-list .study-title p" ).on(
			"click",
			function () {
				$( ".page-adv-diploma-container .ad-container .diploma-studies .listing-studies .studies-list .study-title" ).removeClass( "active" );
				$( this ).parents( "div" ).addClass( "active" );
				$( ".page-adv-diploma-container .ad-container .diploma-studies .listing-studies .study-content" ).fadeOut( 0 );
				const indexer = $( this ).parent( "div" ).index();
				$( ".page-adv-diploma-container .ad-container .diploma-studies .listing-studies .study-content:eq(" + indexer + ")" ).fadeIn( 200 );
			}
		);

		const testimony = $( ".page-home-container .home-container .testimonial-container .testimony-list .testimonials" );
		let testinow    = 0;
		testimony.hide().first().show();

		$( ".testimonial-navigation #tm-left" ).on(
			'click',
			function () {
				testimony.eq( testinow ).hide( "fast" );
				testinow = testinow + 1 < testimony.length ? testinow + 1 : 0;
				testimony.eq( testinow ).show( "fast" ); // show next
			}
		);

		$( ".testimonial-navigation #tm-right" ).on(
			'click',
			function () {
				testimony.eq( testinow ).hide( "fast" );
				testinow = testinow > 0 ? testinow - 1 : testimony.length - 1;
				testimony.eq( testinow ).show( "fast" );
			}
		);

		$( ".r-post-diploma_navigation #tm-left" ).on(
			'click',
			function () {
				$( ".r-post-slider" ).animate( { scrollLeft: "-=300px" }, "slow" );
			}
		);

		$( ".r-post-diploma_navigation #tm-right" ).on(
			'click',
			function () {
				$( ".r-post-slider" ).animate( { scrollLeft: "+=300px" }, "slow" );
			}
		);
	}
);
