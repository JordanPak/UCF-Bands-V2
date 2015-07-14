<?php
/*
 * Template Name: Section Page (Default)
 */


// REMOVE SIDEBAR //
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );


// Page Title
require_once( CHILD_DIR . '/inc/page-title.php' );


//-- LOAD FRAMEWORK --//
genesis();