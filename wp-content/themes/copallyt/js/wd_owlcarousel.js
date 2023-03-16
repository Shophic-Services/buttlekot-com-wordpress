jQuery(document).ready(function($) {
    "use strict";

    /**  ------------ Maps -------------------
  **/
  /*---------------caro--------------*/
 
 var $direction ;
  if ( $('html').attr('dir') == 'rtl' ) {
  $direction = true;
  }else {
  	$direction = false;
  }
	$('.carousel').owlCarousel({
		items: 1,	
		rtl : $direction,
    	margin:10,
			autoplay:true,
   		autoplayTimeout:5000,
	});
	
	 var $Bitmnumber = $(".carousel_blog").data("numberitem");
	 var $Bmargin = $(".carousel_blog").data("margin");

	$('.carousel_blog').owlCarousel({
		items: $Bitmnumber,
		margin: $Bmargin,
		rtl : $direction,
		navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
		autoplay:true,
   		autoplayTimeout:5000,
   		responsiveClass:true,
    	responsive:{
        0:{
            items:1,
            nav:true,
            rtl : $direction,
        },
        600:{
            items:2,
            rtl : $direction,
            nav:false
        },
        1000:{
            items:$Bitmnumber,
            nav:true,
            rtl : $direction,
            loop:false,
        }
       }
	});
	
	var $Pitmnumber = $(".carousel_portfolio").data("numberitem");
	 var $Pmargin = $(".carousel_portfolio").data("margin");

	$('.carousel_portfolio').owlCarousel({
		items: $Pitmnumber,
		margin: $Pmargin,
		rtl : $direction,
		navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
		autoplay:true,
   		autoplayTimeout:5000,
   		responsiveClass:true,
    	responsive:{
        0:{
            items:1,
            nav:true,
            rtl : $direction,
        },
        600:{
            items:2,
            rtl : $direction,
            nav:true
        },
        1000:{
            items:$Pitmnumber,
            rtl : $direction,
            nav:true,
            loop:true,
        }
       }
	});
	var show = $(".testimonials-box").data("show");
	$('.testimonials').owlCarousel({
		items: show,
		rtl : $direction,
		 pagination : true,
	});
	var client_show = $(".carousel_client").data("clienttoshow");
	$('.carousel_client').owlCarousel({
		items: client_show,
		nav: false,
		rtl: $direction,
  		margin:10,
		autoplay:true,
    	autoplayTimeout:5000,
    	responsiveClass:true,
    	responsive:{
        0:{
            items: 1,
            rtl : $direction,
            nav:false,
        },
        600:{
            items:2,
            rtl : $direction,
            nav:false
        },
        1000:{
            items:client_show,
            rtl : $direction,
            nav:false,
            loop:true,
        }
       }
	});
	
	$('.wd-gallery-images-holder').owlCarousel({
		items: 1,
		nav:true,
		rtl : $direction,
  		margin:10,
  		navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
		autoplay:true,
    	autoplayTimeout:5000,
	});
    $('.shop-carousel').owlCarousel({
        items: 1,
        nav:true,
        rtl : $direction,
        margin:10,
        dots:true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        autoplay:true,
        autoplayTimeout:5000,
    });

    // Clients Shortcode
    var navigation_style_slider =  $('.team-member-slider').data('navigation');
    var navigation_style_carousel =  $('.team-member-carousel').data('navigation');

    var elements_to_show_mobile =  $('.team-member-carousel').data('showmobile');
    var elements_to_show_tablet =  $('.team-member-carousel').data('showtablet');
    var elements_to_show_desktop =  $('.team-member-carousel').data('showdesktop');

    var elements_to_swipe =  $('.team-member-carousel').data('swipe');
    if (navigation_style_slider == "dotts") {
        $(window).load(function() {

          $('.team-member-slider').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            items: 1,
            onInitialize: function (event) {
                if ($('.owl-carousel .item').length <= 1) {
                   this.settings.loop = false;
                }
            }
            });
        });

    } 
    if (navigation_style_slider == "arrows") {
        $(window).load(function() {
          $('.team-member-slider').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            dots: false,
            items: 1,
            onInitialize: function (event) {
                if ($('.owl-carousel .item').length <= 1) {
                   this.settings.loop = false;
                }
            }
          });
        });
    }
    if (navigation_style_carousel == "arrows") {
        $(window).load(function() {
          // Team member Carousel
          $('.team-member-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            dots: false,
            responsive:{
                0:{
                    items: elements_to_show_mobile
                },
                600:{
                    items: elements_to_show_tablet
                },
                1000:{
                    items: elements_to_show_desktop
                }
            },
            slideBy: elements_to_swipe,
            onInitialize: function (event) {
                if ($('.owl-carousel .item').length <= 1) {
                   this.settings.loop = false;
                }
            }
            });
        });
    }

    if (navigation_style_carousel == "dotts") {
        $(window).load(function() {
          // Team member Carousel
          $('.team-member-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            slideBy: elements_to_swipe,
            esponsive:{
                0:{
                    items: elements_to_show_mobile
                },
                600:{
                    items: elements_to_show_tablet
                },
                1000:{
                    items: elements_to_show_desktop
                }
            },
            onInitialize: function (event) {
                if ($('.owl-carousel .item').length <= 1) {
                   this.settings.loop = false;
                }
            }
            });
        });

    }

   // _______________Testimonial
    if ($('.owl-testimonail').length) {
        $('.owl-testimonail').each(function(i, obj) {
            testimonial_slider_setting(this);
        });
    }
    
  

    function testimonial_slider_setting(el) {
        var $data = $(el).data('infinity');
        var owl_testimonial = $(el).owlCarousel({
            items: 1,
            nav: false,
            rtl: $direction,
            margin: 10,
            autoplay: true,
            loop:$data,
            navText: [""],
            autoplayTimeout: 5000,
            thumbs: true,
            thumbsPrerendered: true,
            responsiveClass: true,
            onInitialize: function(event) {
                if ($(el).find('.wd-testimonail-item').length <= 1) {
                    this.settings.loop = false;
                }
            }
        });
        // Custom Navigation Events
        $(".testimonial-next").on("click", function() {
            owl_testimonial.trigger('next.owl.carousel');
        });
        $(".testimonial-prev").on("click", function() {
            owl_testimonial.trigger('prev.owl.carousel');
        });
    }
    if ($('.layout-4-testimonials').length) {
        $('.layout-4-testimonials').each( function(i, obj) {
            testimonial_4_slider_setting(this);
        });
    }
    function testimonial_4_slider_setting(el) {
        var $data = $(el).data('infinity');
        var owl_testimonial = $(el).owlCarousel({
            items: 2,
            nav: false,
            rtl: $direction,
            margin: 50,
            autoplay: true,
            loop: $data,
            navText: [""],
            autoplayTimeout: 5000,
            thumbs: true,
            responsive:{
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                }
            },
            thumbsPrerendered: true,
            responsiveClass: true,
            onInitialize: function (event) {
                if ($(el).find('.wd-testimonail-item').length <= 1) {
                    this.settings.loop = false;
                }
            }
        });
        // Custom Navigation Events
        $(".testimonial-next").on("click",function() {
            owl_testimonial.trigger('next.owl.carousel');
        });
        $(".testimonial-prev").on("click",function() {
            owl_testimonial.trigger('prev.owl.carousel');
        });
    }

});