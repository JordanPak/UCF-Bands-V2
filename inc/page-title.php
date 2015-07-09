<?php

/*
 *  UCFBands Custom Page Title
 */


// PUT PAGE TITLE BEFORE CONTENT //
add_action( 'genesis_before_content_sidebar_wrap', 'show_page_title');
function show_page_title() {

    genesis_do_post_title();
    
} // show_page_title()
