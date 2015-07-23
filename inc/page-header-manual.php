<?php
/*
 *  UCFBands Theme "Manual" Header
 *  @author Jordan Pakrosnis
*/
 

// Add page header before content_sidebar_wrap
add_action( 'genesis_before_content_sidebar_wrap', 'ucfbands_page_header_manual', 10);

/*
 *  UCFBands Theme "Manual" Header
 *
 *  @param title: String with Page Title
 *  @param image: String with Background image url
 *  @param large: Bool which sets section class as "page-header-large" if true
 *
 *  @author Jordan Pakrosnis
*/
function ucfbands_page_header_manual( $title, $image, $large ) {

    // LOGIC //

    // "Large" Class
    if ($large == true) {
        $large = ' page-header-lg';   
    } else 
        $large = '';


    // Background Image
    if ($image != '') {

        if (
            ( strpos( $image, 'http://' ) === true ) || 
            ( strpos( $image, 'https://' ) === true ) 
        ){
            $image = ' style="background-image="' . $image . '"';
        }
        else
            $image = '';
    } else
        $image = '';



    // OUTPUT //
    ?>

    <section class="page-header<?php echo $large; ?>"<?php echo $image; ?>>

        <div class="page-header-inner">

            <h1 class="entry-title" itemprop="headline"><?php echo $title ?></h1>

        </div>

    </section>

    <?php

} // ucfbands_page_header_manual()
