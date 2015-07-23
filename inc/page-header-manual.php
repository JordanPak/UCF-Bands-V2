<?php
/*
 *  UCFBands Theme "Manual" Header
 *  @author Jordan Pakrosnis
*/


// Add page header before content_sidebar_wrap
add_action( 'genesis_before_content_sidebar_wrap', 'ucfbands_custom_page_header', 10);

/*
 *  UCFBands Theme "Manual" Heade
 *
 *  @param title: String with Page Title
 *  @param image: String with Background image url
 *  @param large: Bool which sets section class as "page-header-large" if true
 *
 *  @author Jordan Pakrosnis
*/
function ucfbands_custom_page_header( $title, $image, $size ) {
    
    ?>
    
    <section class="page-header page-header-lg" style="">
                
        <div class="page-header-inner">

            <h1 class="entry-title" itemprop="headline">Announcements</h1>

        </div>

    </section>

    <?php

} // ucfbands_custom_page_header()
