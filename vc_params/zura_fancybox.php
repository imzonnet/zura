<?php
$params = array(
	array(
		"type" => "dropdown",
		"heading" => esc_html__("Title Size",'zura'),
		"param_name" => "zura_title_size",
		"value" => array(
				"H2" => "h2",
				"H3" => "h3",
				"H4" => "h4",
				"H5" => "h5",
				"H6" => "h6"
		)
	),
	/**
	 * Style 2
	 */
    array(
        "type" => "dropdown",
        "heading" => esc_html__("Icon Position",'zura'),
        "param_name" => "zura_fancybox_align",
        "value" => array(
            "Left" => "",
            "Right" => "right",
        ),
        "template" => array(
            'zura_fancybox--style-2.php'
        )
    ),

);
