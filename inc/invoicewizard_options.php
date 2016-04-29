<?php

function invoicewizard_menu(){
	
	//add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
  add_menu_page ( 
    "WP Invoice Wizard", 
    "Invoice Wizard", 
    "manage_options", 
    "invoicewizard", 
    "invoicewizard_options_page"   
    );
} 

add_action( 'admin_menu', 'invoicewizard_menu' );


function invoicewizard_options_page(){

  global $invoicewizard_url;
  global $options;

  if( !current_user_can('manage_options') ){
     wp_die( 'You do not have sufficient permissions to access this page.' );
  }


  require( 'invoicewizard_pagewrapper.php' );

}