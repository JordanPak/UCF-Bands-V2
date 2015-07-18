<?php
/*
 * Template Name: Section Page (Default)
 */


// REMOVE SIDEBAR //
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );


// Page Header
require_once( CHILD_DIR . '/inc/page-header.php' );


//-- LOAD FRAMEWORK --//
genesis();