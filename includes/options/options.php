<?php

$this->addSection(array(
    'title' => __( 'General', 'zura' ),
    'id'    => 'general',
    'icon'  => 'el el-home',
    'fields'     => array(

    )
) );

/**
 * Page Title
 *
 * @author ZoTheme
 */

/**
 * Page title settings
 *
 */
$this->addSection(array(
    'title' => esc_html__('Page Elements', 'zura'),
    'icon' => 'el-icon-map-marker',
    'fields' => array(
        array(
            'id' => 'page_title_layout',
            'title' => esc_html__('Layouts', 'zura'),
            'subtitle' => esc_html__('select a layout for page title', 'zura'),
            'default' => '5',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/includes/libs/assets/images/pagetitle/pt-s-0.png',
                '1' => get_template_directory_uri().'/includes/libs/assets/images/pagetitle/pt-s-1.png',
                '2' => get_template_directory_uri().'/includes/libs/assets/images/pagetitle/pt-s-2.png',
                '3' => get_template_directory_uri().'/includes/libs/assets/images/pagetitle/pt-s-3.png',
                '4' => get_template_directory_uri().'/includes/libs/assets/images/pagetitle/pt-s-4.png',
                '5' => get_template_directory_uri().'/includes/libs/assets/images/pagetitle/pt-s-5.png',
                '6' => get_template_directory_uri().'/includes/libs/assets/images/pagetitle/pt-s-6.png',
            )
        ),
        array(
            'id'       => 'page_title_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'zura' ),
            'subtitle' => esc_html__( 'page title background with image, color, etc.', 'zura' ),
            'output'   => array('#zura-page-element-wrap'),
            'default'   => array(
                'background-color'=>'#ffffff',
                'background-image'=> get_template_directory_uri().'/assets/images/pagetitle.jpg',
                'background-repeat'=>'',
                'background-size'=>'cover',
                'background-attachment'=>'',
                'background-position'=>'center center'
            )
        ),
        array(
            'id' => 'page_title_margin',
            'title' => esc_html__('Margin', 'zura'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('#zura-page-element-wrap'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '80px',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'page_title_padding',
            'title' => esc_html__('Padding', 'zura'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('#zura-page-element-wrap'),
            'default' => array(
                'padding-top'     => '100px',
                'padding-right'   => '0',
                'padding-bottom'  => '100px',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
    )
));

/**
 * Page Title
 */
$this->addSection(array(
    'icon' => 'el-icon-podcast',
    'title' => esc_html__('Page Title', 'zura'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'page_title_typography',
            'type' => 'typography',
            'title' => esc_html__('Typography', 'zura'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('#zura-page-element-wrap .page-title h1'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with title text.', 'zura'),
            'default' => array(
                'color' => '#fff',
                'font-style' => 'normal',
                'font-weight' => '300',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '72px',
                'line-height' => '72px',
                'text-align' => 'center'
            )
        )
    )
));
/**
 * Breadcrumb
 */
$this->addSection(array(
    'icon' => 'el-icon-random',
    'title' => esc_html__('Breadcrumb', 'zura'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('The text before the breadcrumb home.', 'zura'),
            'id' => 'breadcrumb_home_prefix',
            'type' => 'text',
            'title' => esc_html__('Breadcrumb Home Prefix', 'zura'),
            'default' => 'Home'
        ),
        array(
            'id' => 'breadcrumb_typography',
            'type' => 'typography',
            'title' => esc_html__('Typography', 'zura'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array(
                '#breadcrumbs',
                '#breadcrumbs li',
                '#breadcrumbs li a',
                '#breadcrumbs a',
                '#breadcrumbs span',
            ),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with title text.', 'zura'),
            'default' => array(
                'color' => '',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '13px',
                'line-height' => '13px',
                'text-align' => 'center'
            )
        ),
    )
));

/**
 * Header Options
 *
 * @author ZoTheme
 */
$this->addSection(array(
    'title' => esc_html__('Header', 'lucian'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'header_layout',
            'title' => esc_html__('Layouts', 'lucian'),
            'subtitle' => esc_html__('select a layout for header', 'lucian'),
            'default' => '',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/includes/libs/assets/images/header/default.png',
                '1' => get_template_directory_uri().'/includes/libs/assets/images/header/style-1.png',
            )
        ),
        array(
            'id'       => 'header_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => esc_html__('Header Height', 'lucian'),
            'output' => array('#header'),
            'width' => false,
            'default'  => array(
                'height'  => '60px'
            ),
        ),
        array(
            'id' => 'header_margin',
            'title' => esc_html__('Margin', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #header'),
            'default' => array(
                'margin-top'     => '100px',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'header_padding',
            'title' => esc_html__('Padding', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #header'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'subtitle' => esc_html__('enable sticky mode for menu.', 'lucian'),
            'id' => 'menu_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Header', 'lucian'),
            'default' => false,
        ),
        array(
            'id'       => 'menu_sticky_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => esc_html__('Sticky Header Height', 'lucian'),
            'width' => false,
            'default'  => array(
                'height'  => '80px'
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'menu_sticky_header_margin',
            'title' => esc_html__('Sticky Header Margin', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #header.header-fixed'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'menu_sticky_header_padding',
            'title' => esc_html__('Sticky Header Padding', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #header.header-fixed'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => esc_html__('enable sticky mode for menu Tablets.', 'lucian'),
            'id' => 'menu_sticky_tablets',
            'type' => 'switch',
            'title' => esc_html__('Sticky Tablets', 'lucian'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => esc_html__('enable sticky mode for menu Mobile.', 'lucian'),
            'id' => 'menu_sticky_mobile',
            'type' => 'switch',
            'title' => esc_html__('Sticky Mobile', 'lucian'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        )
    )
));

/* Header Top */
$this->addSection(array(
    'title' => esc_html__('Header Top', 'lucian'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable header top.', 'lucian'),
            'id' => 'enable_header_top',
            'type' => 'switch',
            'title' => esc_html__('Enable Header Top', 'lucian'),
            'default' => false,
        ),
        array(
            'id' => 'header_top_margin',
            'title' => esc_html__('Margin', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #zo-header-top'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_header_top', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'header_top_padding',
            'title' => esc_html__('Padding', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #zo-header-top'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_header_top', 1 => '=', 2 => 1 )
        ),
    )
));

/* Logo */
$this->addSection(array(
    'title' => esc_html__('Logo', 'lucian'),
    'icon' => 'el-icon-picture',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Select Logo', 'lucian'),
            'subtitle' => esc_html__('Select an image file for your logo.', 'lucian'),
            'id' => 'main_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/logo.png'
            )
        ),
        array(
            'id'       => 'main_logo_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => esc_html__('Logo Height', 'lucian'),
            'width' => false,
            'default'  => array(
                'height'  => '60px'
            ),
        ),
        array(
            'id'       => 'sticky_logo_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => esc_html__('Sticky Logo Height', 'lucian'),
            'width' => false,
            'default'  => array(
                'height'  => '80px'
            ),
        ),
        array(
            'subtitle' => esc_html__('Change Sticky Logo.', 'lucian'),
            'id' => 'sticky_logo_enable',
            'type' => 'switch',
            'title' => esc_html__('Enable Sticky Logo ', 'lucian'),
            'default' => false,
        ),
        array(
            'title' => esc_html__('Select Logo', 'lucian'),
            'subtitle' => esc_html__('Select an image file for your logo.', 'lucian'),
            'id' => 'sticky_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/logo.png'
            ),
            'required' => array( 0 => 'sticky_logo_enable', 1 => '=', 2 => 1 )
        ),
    )
));

/**
 * Settings Color.
 */
$this->addSection(array(
    'title' => esc_html__('Styling', 'zura'),
    'icon' => 'el-icon-adjust',
    'fields' => array(
        array(
            'subtitle' => esc_html__('set color main color.', 'zura'),
            'id' => 'primary_color',
            'type' => 'color',
            'title' => esc_html__('Primary Color', 'zura'),
            'default' => '#ff83a6'
        ),
        array(
            'id' => 'secondary_color',
            'type' => 'color',
            'title' => esc_html__('Secondary Color', 'zura'),
            'default' => '#ff83a6'
        ),
        array(
            'subtitle' => esc_html__('set color for tags <a></a>.', 'zura'),
            'id' => 'link_color',
            'type' => 'link_color',
            'title' => esc_html__('Link Color', 'zura'),
            'output'  => array('a'),
            'default' => array(
                'regular'  => '#3c3c3c',
                'hover'    => '#ff83a6',
            )
        )
    )
));


/**
 * Typography
 *
 * @author ZuraVN
 */
$this->addSection(array(
    'title' => esc_html__('Typography', 'zura'),
    'icon' => 'el-icon-text-width',
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => esc_html__('Body Font', 'zura'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body'),
            'units' => 'px',
            'default' => array(
                'color' => '#676767',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '30px',
                'text-align' => ''
            ),
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'zura'),
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => esc_html__('H1', 'zura'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h1'),
            'units' => 'px',
            'default' => array(
                'color' => '#3c3c3c',
                'font-style' => 'normal',
                'font-weight' => '300',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '36px',
                'line-height' => '40px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => esc_html__('H2', 'zura'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h2'),
            'units' => 'px',
            'default' => array(
                'color' => '#3c3c3c',
                'font-style' => 'normal',
                'font-weight' => '300',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '30px',
                'line-height' => '36px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => esc_html__('H3', 'zura'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h3'),
            'units' => 'px',
            'default' => array(
                'color' => '#3c3c3c',
                'font-style' => 'normal',
                'font-weight' => '300',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '24px',
                'line-height' => '28px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => esc_html__('H4', 'zura'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h4'),
            'units' => 'px',
            'default' => array(
                'color' => '#3c3c3c',
                'font-style' => 'normal',
                'font-weight' => '300',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '20px',
                'line-height' => '24px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => esc_html__('H5', 'zura'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h5'),
            'units' => 'px',
            'default' => array(
                'color' => '#3c3c3c',
                'font-style' => 'normal',
                'font-weight' => '300',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '18px',
                'line-height' => '24px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => esc_html__('H6', 'zura'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h6'),
            'units' => 'px',
            'default' => array(
                'color' => '#3c3c3c',
                'font-style' => 'normal',
                'font-weight' => '300',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '24px',
                'text-align' => ''
            )
        )
    )
));

/**
 * Body
 *
 * @author ZoTheme
 */
$this->addSection(array(
    'title' => esc_html__('Body', 'zura'),
    'icon' => 'el-icon-website',
    'fields' => array(
        array(
            'id' => 'body_layout',
            'type' => 'select',
            'options' => array(
                'zo-wide' => 'Wide',
                'zo-boxed' => 'Boxed',
            ),
            'title' => __('Layout', 'zura'),
            'subtitle' => esc_html__( 'Set layout.', 'zura' ),
            'default' => 'zo-wide',
        ),
        array(
            'id'       => 'body_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'zura' ),
            'subtitle' => esc_html__( 'body background with image, color, etc.', 'zura' ),
            'output'   => array('body'),
        ),
        array(
            'id' => 'body_margin',
            'title' => esc_html__('Margin', 'zura'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #page'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'body_padding',
            'title' => esc_html__('Padding', 'zura'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #page'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
    )
));
/**
 * Optimal Core
 *
 * Optimal options for theme. optimal speed
 * @author ZuraVN
 */
$this->addSection(array(
    'title' => esc_html__('Optimal Core', 'zura'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => esc_html__('no minimize , generate css overtime...', 'zura'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => esc_html__('Dev Mode (not recommended)', 'zura'),
            'default' => false
        )
    )
));