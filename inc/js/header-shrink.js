//	jQuery(document).on("scroll", function(){
//		if
//      (jQuery(document).scrollTop() > 100){
//		  jQuery("section.page-title").addClass("shrink");
//			//updateSliderMargin();
//		}
//		else
//		{
//			jQuery("section.page-title").removeClass("shrink");
//			//updateSliderMargin();
//		}
//	});



jQuery(function(){
 var shrinkHeader = 120;
  jQuery(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {
           jQuery('section.page-title').addClass('shrink');
        }
        else {
            jQuery('section.page-title').removeClass('shrink');
        }
  });
function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
    }
});