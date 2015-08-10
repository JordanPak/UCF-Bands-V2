<?php

add_filter( 'the_password_form', 'ucfbands_password_form' );
/**
 *  UCFBands Custom Password Form. Modified from get_the_password_form().
 *  
 *  @author Jordan Pakrosnis
 */
function ucfbands_password_form( $post = 0, $do_block = false ) {
    $post = get_post( $post );
    $label = 'pwbox-' . ( empty($post->ID) ? rand() : $post->ID );
    
    // Output String
    $output = '';
    
    // If Block
    if ( $do_block )
        $output .= '<div class="block block-featured masonry-block masonry-block-width--one-third">';
    
    
    // Output Form
    $output .= '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form ucfbands-password-form" method="post">
    <h2 class="form-title"><i class="fa fa-shield"></i> ' . __( 'State the Password' ) . '</h2>
    <p><label for="' . $label . '">' . __( '' ) . ' <input name="post_password" id="' . $label . '" type="password" size="20" /></label> <input type="submit" name="Submit" value="' . esc_attr__( 'Enter' ) . '" /></p></form>
    ';
    
    
    if ( $do_block )
        $output .= '</div>';
 
    /**
     * Filter the HTML output for the protected post password form.
     *
     * If modifying the password field, please note that the core database schema
     * limits the password field to 20 characters regardless of the value of the
     * size attribute in the form input.
     *
     * @since 2.7.0
     *
     * @param string $output The password form HTML output.
     */
    return $output;

} // ucfbands_password_form()

