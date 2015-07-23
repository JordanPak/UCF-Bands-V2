<?php

// Add page header before content_sidebar_wrap
add_action( 'genesis_before_content_sidebar_wrap', 'ucfbands_custom_page_header', 10);
function ucfbands_custom_page_header() {
    
    ?>
    
    <section class="page-header page-header-lg" style="">
                
        <div class="page-header-inner">

            <h1 class="entry-title" itemprop="headline">Announcements</h1>

        </div>

    </section>

    <?php

} // ucfbands_custom_page_header()
