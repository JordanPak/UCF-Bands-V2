<?php
/**
 *  UCFBands Custom Password Form. Modified from get_the_password_form().
 *  
 *  @author Jordan Pakrosnis
 */

function ucfbands_password_form( $post = 0 ) {
    $post = get_post( $post );
    $label = 'pwbox-' . ( empty($post->ID) ? rand() : $post->ID );
    $output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form ucfbands-password-form" method="post">
    <p>' . __( 'Enter the password, mkay?' ) . '</p>
    <p><label for="' . $label . '">' . __( 'Password:' ) . ' <input name="post_password" id="' . $label . '" type="password" size="20" /></label> <input type="submit" name="Submit" value="' . esc_attr__( 'Submit' ) . '" /></p></form>
    ';
 
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
    return apply_filters( 'the_password_form', $output );

} // ucfbands_password_form()
