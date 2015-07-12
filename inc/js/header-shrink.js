	jQuery(document).on("scroll", function(){
		if
      (jQuery(document).scrollTop() > 100){
		  jQuery("section.page-title").addClass("shrink");
			//updateSliderMargin();
		}
		else
		{
			jQuery("section.page-title").removeClass("shrink");
			//updateSliderMargin();
		}
	});