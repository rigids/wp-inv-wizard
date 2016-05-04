<?php

	function invoicewizard_css_and_js(){
		wp_register_style('invoicewizard-styles', plugins_url('../css/styles.css',__FILE__ ));
		wp_register_script('moment', plugins_url('../js/moment.js',__FILE__ ));
		wp_register_script('react', '//fb.me/react-15.0.2.min.js');
		wp_register_script('reactdom', '//fb.me/react-dom-15.0.2.min.js');
		

		wp_enqueue_style('invoicewizard-styles');
		wp_enqueue_script('moment');
		wp_enqueue_script('react');
		wp_enqueue_script('reactdom');

}

	add_action('init', 'invoicewizard_css_and_js');



function invoicewizard_enqueueadmin($hook) {
    if ( 'post-new.php' != $hook ) {
        return;
    }

    wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . '../js/invoicewizard-admin.js' );
}

add_action( 'admin_enqueue_scripts', 'invoicewizard_enqueueadmin' );