<?php

if (!function_exists('wf_vc_registration_form')) {

    function wf_vc_registration_form($atts, $content = null)
    {
        echo do_shortcode('[wp_fundraising_registration_form ]');
        $output = ob_get_clean(); 
        return $output;  
        
    }
}