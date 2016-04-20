<?php
/**
 * Add custom heading params
 * 
 * @author ZuraVN
 * @since 1.0.0
 */
vc_add_param("vc_custom_heading", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Custom Heading Style", 'zura'),
    "admin_label" => true,
    "param_name" => "heading_type",
    "value" => array(
        "Default" => '',
        "Title Line Bottom" => "line-bottom",
    )
));