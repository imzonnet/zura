<?php
/* Add custom vc params. */
if(class_exists('Vc_Manager')){

    /* Add theme elements */
    add_action('init', 'zura_vc_params');
    function zura_vc_params() {
        require( get_template_directory() . '/vc_params/vc_custom_heading.php' );
    }
}