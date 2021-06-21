jQuery(document).ready(function ($) {
  //HEADER SCRIPT
  $('.navigation .mobile-nav-menu #menu_list').hide()
  $('.navigation .mobile-nav-menu #burger-menu').click(function () {
    $('.navigation #menu_list').toggle(100)
  })

  var countA = 0
  window.onscroll = function () {
    scrollFunction()

    startCount()
  }

  function startCount() {
    if ($('#start_count').length != 0) {
      var oTop = $('#start_count').offset().top - window.innerHeight
    }
    if (countA == 0 && $(window).scrollTop() > oTop) {
      var i = 0
      $('.counter-value').each(function () {
        var $this = $(this),
          countTo = $this.attr('data-count')
        $({
          countNum: $this.text(),
        }).animate(
          {
            countNum: countTo,
          },

          {
            duration: 2000,
            easing: 'swing',
            step: function () {
              $this.text(Math.floor(this.countNum))
            },
            complete: function () {
              if (i == 2) {
                $this.text(this.countNum + 'M')
              } else {
                $this.text(this.countNum)
              }
              i++
            },
          }
        )
      })
      countA = 1
    }
  }
  function scrollFunction() {
    if (
      document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 20
    ) {
      $('.header-body .navigation .navigation-bar .mobile-nav-menu').addClass(
        'sticky'
      )
    } else {
      $(
        '.header-body .navigation .navigation-bar .mobile-nav-menu'
      ).removeClass('sticky')
    }
  }

  $('.home-info-slider .row .info-slider-body-list').hide()
  $('.home-info-slider .row .info-slider-body-list:first').show()
  $('.header-body .home-header-background').hide()
  $('.header-body .home-header-background:first').show()
  $(
    '.home-info-slider .info-slider-navigation .info-slider-navigation-list li:first'
  ).addClass('active')
  $(
    '.home-info-slider .info-slider-navigation .info-slider-navigation-list li'
  ).click(function () {
    $(
      '.home-info-slider .info-slider-navigation .info-slider-navigation-list li'
    ).removeClass('active')
    $(this).addClass('active')
    $('.home-info-slider .row .info-slider-body-list').fadeOut(0)
    $('.header-body .home-header-background').fadeOut('slow')
    var indexer = $(this).index()
    $(
      '.home-info-slider .row .info-slider-body-list:eq(' + indexer + ')'
    ).fadeIn(200)
    $('.header-body .home-header-background:eq(' + indexer + ')').fadeIn('slow')
  })

  var totalDiv = $(
    '.home-info-slider .info-slider-navigation .info-slider-navigation-list li'
  ).length
  var indexIn = 1

  function sliderHeader() {
    if (indexIn >= totalDiv) {
      indexIn = 0
    }
    $('.home-info-slider .row .info-slider-body-list').hide()
    $('.header-body .home-header-background').hide()
    $(
      '.home-info-slider .info-slider-navigation .info-slider-navigation-list li'
    ).removeClass('active')
    $(
      '.home-info-slider .info-slider-navigation .info-slider-navigation-list li:eq(' +
        indexIn +
        ')'
    ).addClass('active')
    $(
      '.home-info-slider .row .info-slider-body-list:eq(' + indexIn + ')'
    ).fadeIn(200)
    $('.header-body .home-header-background:eq(' + indexIn + ')').fadeIn('slow')

    indexIn++
  }

  setInterval(sliderHeader, 8000)

  //FOOTER SCRIPT
  $(
    ".footer-nav-body .footer-menus .footer-icon-social .icons .social-icons a[href^='https://']"
  ).attr('target', '_blank')

  //MAP SCRIPT
  function new_map($el) {
    var $markers = $el.find('.marker')
    var args = {
      zoom: 16,
      center: new google.maps.LatLng(0, 0),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
    }

    var map = new google.maps.Map($el[0], args)
    map.markers = []

    $markers.each(function () {
      add_marker($(this), map)
    })

    center_map(map)
    return map
  }

  function add_marker($marker, map) {
    var latlng = new google.maps.LatLng(
      $marker.attr('data-lat'),
      $marker.attr('data-lng')
    )
    var marker = new google.maps.Marker({
      position: latlng,
      map: map,
    })

    map.markers.push(marker)

    if ($marker.html()) {
      var infowindow = new google.maps.InfoWindow({
        content: $marker.html(),
      })
      google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map, marker)
      })
    }
  }
  function center_map(map) {
    var bounds = new google.maps.LatLngBounds()

    $.each(map.markers, function (i, marker) {
      var latlng = new google.maps.LatLng(
        marker.position.lat(),
        marker.position.lng()
      )
      bounds.extend(latlng)
    })

    if (map.markers.length == 1) {
      map.setCenter(bounds.getCenter())
      map.setZoom(16)
    } else {
      map.fitBounds(bounds)
    }
  }

  var map = null

  $(document).ready(function () {
    $('.acf-map').each(function () {
      // create map
      map = new_map($(this))
    })
  })

  $('.page-partner-container .partner-body ul li:has(ul) ').click(function () {
    $(this).find('i.fa-plus').toggleClass('rotate')
    $(this).find('i.fa-plus').toggleClass('fa-minus')
    $(this).children('ul').toggle(300)
  })

  $(
    '.page-handbook-container .handbook-container .handbook-collapse-container .handbook-list .container-title '
  ).click(function () {
    $(this).find('i.fa-chevron-down').toggleClass('rotate')
    $(this).find('i.fa-chevron-down').toggleClass('fa-chevron-up')
    $(this).parent().find('.textwidget').toggle(300)
  })

  $(
    '.page-blog-container .blog-container .search-popular .popular-posts .popular-post-list .wpp-list li .wpp-post-title'
  ).after('<hr>')
  $(
    '.page-blog-container .blog-container .search-popular .popular-posts .popular-post-list .wpp-list li .wpp-meta .wpp-date'
  ).each(function () {
    var text = $(this).text()
    $(this).text(text.replace('posted on', ''))
  })

  $(
    '.page-adv-diploma-container .ad-container .diploma-studies .listing-studies .study-content'
  ).hide()
  $(
    '.page-adv-diploma-container .ad-container .diploma-studies .listing-studies .study-content:first'
  ).show()
  $(
    '.page-adv-diploma-container .ad-container .diploma-studies .listing-studies .studies-list .study-title:first'
  ).addClass('active')
  $(
    '.page-adv-diploma-container .ad-container .diploma-studies .listing-studies .studies-list .study-title p'
  ).click(function () {
    $(
      '.page-adv-diploma-container .ad-container .diploma-studies .listing-studies .studies-list .study-title'
    ).removeClass('active')
    $(this).parents('div').addClass('active')
    $(
      '.page-adv-diploma-container .ad-container .diploma-studies .listing-studies .study-content'
    ).fadeOut(0)
    var indexer = $(this).parent('div').index()
    $(
      '.page-adv-diploma-container .ad-container .diploma-studies .listing-studies .study-content:eq(' +
        indexer +
        ')'
    ).fadeIn(200)
  })

  var testimony = $(
    '.page-home-container .home-container .testimonial-container .testimony-list .testimonials'
  )
  var testinow = 0
  testimony.hide().first().show()
  $('.testimonial_navigation #tm-left').click(function () {
    testimony.eq(testinow).hide('fast')
    testinow = testinow + 1 < testimony.length ? testinow + 1 : 0
    testimony.eq(testinow).show('fast') // show next
  })

  $('.testimonial_navigation #tm-right').click(function () {
    testimony.eq(testinow).hide('fast')
    testinow = testinow > 0 ? testinow - 1 : testimony.length - 1
    testimony.eq(testinow).show('fast')
  })

  $('.r-post-diploma_navigation #tm-left').click(function () {
    $('.r-post-slider').animate(
      {
        scrollLeft: '-=300px',
      },
      'slow'
    )
  })

  $('.r-post-diploma_navigation #tm-right').click(function () {
    $('.r-post-slider').animate(
      {
        scrollLeft: '+=300px',
      },
      'slow'
    )
  })
})
