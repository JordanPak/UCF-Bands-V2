/**
 * UCFBands Genesis Child Theme
 * 
 * Masonry JS Init
 */

// 6-Column Layout
jQuery(document).ready( function() {

    jQuery('.masonry-6col-grid').masonry({
        itemSelector: '.masonry-block',
        columnWidth: '.masonry-6col-grid-sizer',
        gutter: '.masonry-6col-gutter-sizer',
        percentPosition: true,
    });
  
});


// 4-Column Layout
jQuery(document).ready( function() {

    jQuery('.masonry-4col-grid').masonry({
        itemSelector: '.masonry-block',
        columnWidth: '.masonry-4col-grid-sizer',
        gutter: '.masonry-4col-gutter-sizer',
        percentPosition: true,
    });
  
});