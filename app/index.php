<?php

error_reporting(-1);
ini_set('display_errors', 0);

ini_set("allow_url_fopen", true);

/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
*/
require( dirname( __FILE__ ) .'/header.php' );

require( dirname( __FILE__ ) .'/dashboard.php' );

require( dirname( __FILE__ ) .'/footer.php' );