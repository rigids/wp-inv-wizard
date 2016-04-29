<?php

   /***************************************************************************************************

     Plugin Name: WP Invoice Wizard
     Plugin URI: http://www.twilitgrotto.com/invoice-wizard
     Description: A full featured invoicing time tracking suite for Wordpress.
     Author: Matt Bevilacqua
     Author URI: http://www.mattbev.com
     License: GPL2

   ***************************************************************************************************/

//include acf
require( 'inc/invoicewizard_acf.php');

//  Add custom post types
require( 'inc/invoicewizard_addposttype.php' );

// Add custom fields
require( 'inc/invoicewizard_registerfields.php'); 

// add scripts and styles /ck
require('inc/invoicewizard_enqueue.php');

//invoicewizard options page
require( 'inc/invoicewizard_options.php');