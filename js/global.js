

;
(function ($) {


	// Sticky Footer
	var bumpIt = function() {
			$('body').css('padding-bottom', $('.footer').outerHeight(true));
			$('.footer').addClass('sticky-footer');
		},
		didResize = false;

	$(window).resize(function() {
		didResize = true;
	});
	setInterval(function() {
		if(didResize) {
			didResize = false;
			bumpIt();
		}
	}, 250);

	// Scripts which runs after DOM load

	$(document).ready(function () {

		$('.menu-icon').click(function(event) {
         $('.header').toggleClass('opened-menu');
         $('html,body').toggleClass('locked');
      });

      $('.copy'). click(function(event) {
      	$('.copied').css('display', 'block');
      	function hide(){
			  $('.copied').css('display', 'none');
			}
      	setTimeout(hide, 1000);
      });

		// Blog Slider
   	$('.blog_slider').slick({
		  infinite: true,
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  arrows: true,
		  autoplay: true,
		  centerMode: true,
  		  centerPadding: '315px',
  		  responsive: [
  		   {
	      	breakpoint: 1600,
		      	settings: {
		       	centerPadding: '100px',
		      }
	    	},
	    	{
	      	breakpoint: 1025,
		      	settings: {
		       	slidesToShow: 2,
		       	centerPadding: '50px',
		      }
	    	},
	    	{
	     	 	breakpoint: 768,
		      	settings: {
		       	slidesToShow: 1,
		       	centerPadding: '30px',
		      }
	    	},
			]
		});

		$('.main_content_inner h2').first().addClass('first');

		$(".section_updates input[type=email]").attr("placeholder", "Enter your email");

		//Remove placeholder on click
		$("input,textarea").each(function () {
			$(this).data('holder', $(this).attr('placeholder'));

			$(this).focusin(function () {
				$(this).attr('placeholder', '');
			});

			$(this).focusout(function () {
				$(this).attr('placeholder', $(this).data('holder'));
			});
		});

		//Make elements equal height
		$('.matchHeight').matchHeight();


		// Add fancybox to images
		$( '.gallery-item a' ).attr( 'rel', 'gallery' ).attr('data-fancybox','gallery');
		$('a[rel*="album"], .gallery-item a, .fancybox, a[href$="jpg"], a[href$="png"], a[href$="gif"]').fancybox({
			minHeight: 0,
			helpers: {
				overlay: {
					locked: false
				}
			},
		});

		// Sticky footer
		$('.footer').find('img').one('load',function () {
			bumpIt();
		}).each(function () {
			if(this.complete) $(this).load();
		});



		var url = document.location.href;

		new ClipboardJS('.copy', {
		  text: function() {
		    return url;
		  }
		});


		//Change accordion button to expand all or clouse all

		var activeButton = $('.sup-accordion-button');

		$('.accordion-title').on('click' ,function(event) {

			var isActive = $('.accordion-item').hasClass('is-active');

			if (isActive) {
				activeButton.text('Collapse all');
			} else {
				activeButton.text('Expand all');
			};
		});

		activeButton.on('click', function(event) {

			var toExpand = $(this).attr('data-expand'),
				parent = $(this).closest('.sup-accordion');

			if (toExpand == 'false') {
				$(parent).find('.accordion-item').removeClass('is-active');
				$(parent).find('.accordion-content').hide();
				$(this).text('Expand all');
				$(this).attr('data-expand','true');
			} else {
				$(parent).find('.accordion-item').addClass('is-active');
				$(parent).find('.accordion-content').show();
				$(this).text('Collapse all');
				$(this).attr('data-expand','false');
			};
		});

	});


	// Scripts which runs after all elements load

	$(window).on( 'load', function () {

		//jQuery code goes here
		if($('.preloader').length){
			$('.preloader').addClass('preloader--hidden');
		}



	});

	// Scripts which runs at window resize

	$(window).resize(function () {

		//jQuery code goes here


	});

		function parallax(){
		    var scrolled = $(window).scrollTop();
		    $('.slick-slide').css('background-position-y', scrolled * 0.4 + 'px');
		}

		if (/Edge\/\d./i.test(navigator.userAgent)){
		   // This is Microsoft Edge
		   // window.alert('Microsoft Edge');
		}
		else if ($.browser.webkit || $.browser.safari || $.browser.mozilla)  {
			$(window).scroll(function(e){
			    parallax();
			});
		}

		 jQuery('#ubermenu-main-2-header-menu .tab-navigation-top a span').on('click', function(e){
				
				$(document).ready(function () {
			
		    jQuery('#ubermenu-main-2-header-menu .tab-navigation-top a span').on('click', function(e){
				
				localStorage.setItem("asas", "oooooo");
				
				 		
				var link_c = jQuery(this).parent();
				if (link_c.attr('href') == 'http://lifo-pro.flywheelsites.com/offerings/offerings-2/#tab-1') {
					jQuery('ul.tabs_offerings li:nth-child(1)')[0].click();
				}
				if (link_c.attr('href') == 'http://lifo-pro.flywheelsites.com/offerings/offerings-2/#tab-2') {
					jQuery('ul.tabs_offerings li:nth-child(2)')[0].click();
				}
				if (link_c.attr('href') == 'http://lifo-pro.flywheelsites.com/offerings/offerings-2/#tab-3') {
					jQuery('ul.tabs_offerings li:nth-child(3)')[0].click();
				}
				if (link_c.attr('href') == 'http://lifo-pro.flywheelsites.com/offerings/offerings-2/#tab-4') {
					jQuery('ul.tabs_offerings li:nth-child(4)')[0].click();
				}
			});
		});
	});
}(jQuery));

jQuery(document).ready(function () {
	// Make the Offerings & Resources “submenus” sticky
	var header_height = jQuery(".header").height();
	var is_resource = jQuery(".single-resources").length;
	var is_offerings = jQuery(".single-offerings").length;
	var is_about_us = jQuery(".page-template-template-about-us").length;
	var is_page_team =  jQuery('.page-template-template-team').length;
	var is_single_team =  jQuery('.single-our_team').length;

	if (is_resource && is_resource == 1) {
		var class_menu = ".resources_menu";
	}
	if (is_offerings && is_offerings == 1) {
		var class_menu = ".service_menu";
	}
	if (is_about_us && is_about_us == 1) {
		var class_menu = ".service_menu";
	}

	if (is_page_team && is_page_team == 1) {
		var class_menu = ".service_menu";
	}

	if (is_single_team && is_single_team == 1) {
		var class_menu = ".service_menu";
	}

	if (is_single_team && is_single_team == 1 || is_resource && is_resource == 1 || is_offerings && is_offerings == 1 || is_about_us && is_about_us == 1 || is_page_team && is_page_team == 1) {
		jQuery(window).scroll(function(){
		    if (jQuery(window).scrollTop() >= header_height + 180) {
		    	jQuery(class_menu).addClass('sticky-sub-menu');
		        jQuery(class_menu).css('top',header_height);
		        jQuery(".header").css('box-shadow','initial');
		    }else {
		    	jQuery(class_menu).removeClass('sticky-sub-menu');
		        jQuery(class_menu).css('top','initial');
		        jQuery(".header").css('box-shadow','0px 3px 5px 0px rgba(0, 0, 0, 0.5)');
		    }
		});
	}

	// supage menu wrap height fix
	if( jQuery('.subpage-menu-wrap').length > 0 ) {
		var subpageMenu = jQuery('.subpage-menu-wrap .sub_page_menu');
			jQuery('.subpage-menu-wrap').height( subpageMenu.outerHeight() );
		jQuery(window).resize(function() {
			subpageMenu = jQuery('.subpage-menu-wrap .sub_page_menu');
			jQuery('.subpage-menu-wrap').height( subpageMenu.outerHeight() );
		});
	}
	
	// Add Width table
	jQuery("table").each(function() {
		var width_table = jQuery(this).attr('width');
		if (width_table && width_table != '') {
			jQuery(this).css('width',width_table);	
		}
	});
    var p_he = jQuery('.lifo-button.color-blue').length;
	if (p_he && p_he > 0) {
		jQuery('.lifo-button.color-blue').parent().addClass('p_flex');
	}
})