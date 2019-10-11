jQuery(document).ready(function($){

	  /** Variables from Customizer for Slider settings */
    if( business_ezone_data.auto == '1' ){
        var slider_auto = true;
    }else{
        slider_auto = false;
    }
    
    if( business_ezone_data.loop == '1' ){
        var slider_loop = true;
    }else{
        var slider_loop = false;
    }
    
    if( business_ezone_data.pager == '1' ){
        var slider_control = true;
    }else{
        slider_control = false;
    }


    if( business_ezone_data.animation == 'fade' ){
        var slider_animation = 'fade';
    }else{
        slider_animation = '';
    }
    
   
    /** Home Page  Banner Slider */
   
	$('.fadeout').owlCarousel({
		items: 1,
		animateOut: slider_animation,// animation
		loop: slider_loop, // loop
		margin: 10,
		nav: true,
		navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		autoplay: slider_auto, //auto play
		dots:  slider_control, //slider control
		slideSpeed       : business_ezone_data.speed,
		autoplayTimeout: business_ezone_data.pause
	});


	$('.testimonial-slider').owlCarousel({
		items: 1,
		loop: true,
		margin: 10,
		nav: true,
		navText:["<i class='fa fa-chevron-circle-left'></i>","<i class='fa fa-chevron-circle-right'></i>"],
		autoplay: true,

	});

	//scrollup 	button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	});

	//scrollup javascript
    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 800);
        return false;
    });
	
	// responsive menu

	$('#responsive-menu-button').sidr({
		name: 'sidr-main',
		source: '#site-navigation',
		side: 'right'
	});


	$('#responsive-menu-button-top').sidr({
		name: 'sidr-main-top',
		source: '#top-site-navigation',
		side: 'right'
	});

	$('body').on( 'click', '.btn-closed', function(){
        $.sidr('close', 'sidr-main-primary');
        $.sidr('close', 'sidr-main');
    });
    
    $('#sidr-main-primary li').click(function(){        
        $.sidr('close', 'sidr-main-primary');
        $.sidr('close', 'sidr-main');
    });
	
	
	//equl height
    $('.row.latest-activities .col-4.activity-items .activity-text .entry-content').matchHeight();
    $('.skill-items .skill-item .skill-text').matchHeight();

	

});