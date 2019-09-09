// JavaScript Document
jQuery(document).ready(function() {
	
	var business_primaViewPortWidth = '',
		business_primaViewPortHeight = '';

	function business_primaViewport(){

		business_primaViewPortWidth = jQuery(window).width(),
		business_primaViewPortHeight = jQuery(window).outerHeight(true);	
		
		if( business_primaViewPortWidth > 1200 ){
			
			jQuery('.main-navigation').removeAttr('style');
			
			var business_primaSiteHeaderHeight = jQuery('.site-header').outerHeight();
			var business_primaSiteHeaderWidth = jQuery('.site-header').width();
			var business_primaSiteHeaderPadding = ( business_primaSiteHeaderWidth * 2 )/100;
			var business_primaMenuHeight = jQuery('.menu-container').height();
			
			var business_primaMenuButtonsHeight = jQuery('.site-buttons').height();
			
			var business_primaMenuPadding = ( business_primaSiteHeaderHeight - ( (business_primaSiteHeaderPadding * 2) + business_primaMenuHeight ) )/2;
			var business_primaMenuButtonsPadding = ( business_primaSiteHeaderHeight - ( (business_primaSiteHeaderPadding * 2) + business_primaMenuButtonsHeight ) )/2;
		
			
			jQuery('.menu-container').css({'padding-top':business_primaMenuPadding});
			jQuery('.site-buttons').css({'padding-top':business_primaMenuButtonsPadding});
			
			
		}else{

			jQuery('.menu-container, .site-buttons, .header-container-overlay, .site-header').removeAttr('style');

		}	
	
	}

	jQuery(window).on("resize",function(){
		
		business_primaViewport();
		
	});
	
	business_primaViewport();


	jQuery('.site-branding .menu-button').on('click', function(){
				
		if( business_primaViewPortWidth > 1200 ){

		}else{
			jQuery('.main-navigation').slideToggle();
		}				
		
				
	});	

    var owl = jQuery("#business_prima-owl-basic");
         
    owl.owlCarousel({
             
      	slideSpeed : 300,
      	paginationSpeed : 400,
      	singleItem:true,
		navigation : true,
      	pagination : false,
      	navigationText : false,
         
    });			
	
});		