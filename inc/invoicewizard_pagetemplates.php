<?php
function invoicewizard_change_client_post_type_template($single_template) {
     global $post;
     if ($post->post_type == 'client'){
        $single_template = plugin_dir_path( __FILE__ ) . '../templates/client.php';
     }
     return $single_template;
}

add_filter( 'single_template', 'invoicewizard_change_client_post_type_template' );

function invoicewizard_get_client_archive_type_template( $archive_template ) {
     global $post;
     if ( is_post_type_archive ( 'client' ) ) {
          $archive_template = plugin_dir_path( __FILE__ ) . '../templates/archive-client.php';
     }
     return $archive_template;
}
add_filter( 'archive_template', 'invoicewizard_get_client_archive_type_template' );


function invoicewizard_change_invoice_post_type_template($single_template) {
     global $post;
     if ($post->post_type == 'invoice'){
        $single_template = plugin_dir_path( __FILE__ ) . '../templates/invoice.php';
     }
     return $single_template;
}

add_filter( 'single_template', 'invoicewizard_change_invoice_post_type_template' );

function invoicewizard_get_invoice_archive_type_template( $archive_template ) {
     global $post;
     if ( is_post_type_archive ( 'invoice' ) ) {
          $archive_template = plugin_dir_path( __FILE__ ) . '../templates/archive-invoice.php';
     }
     return $archive_template;
}

add_filter( 'archive_template', 'invoicewizard_get_invoice_archive_type_template' );
