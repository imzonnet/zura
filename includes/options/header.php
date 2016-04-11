<?php

if( !function_exists('zura_page_element') ) {
    /**
     * Create Page Element For Theme
     */
    function zura_page_element()
    {
        global $smof_data, $zura_meta;
        if(is_page()){
            if( !isset($zura_meta->_zura_page_title) || $zura_meta->_zura_page_title == 0 ) {
                /* Page title for page */
                zura_page_element_content();
            }
        } else {
            /* Page title content */
            zura_page_element_content();
        }
    }
}
/**
 * Get Header Layout.
 *
 * @author ZoTheme
 */
function zura_header(){
    global $smof_data, $zura_meta;
    /* header for page */
    if(isset($zura_meta->_zo_header) && $zura_meta->_zo_header){
        if(isset($zura_meta->_zo_header_layout)){
            $smof_data['header_layout'] = $zura_meta->_zo_header_layout;
        }
    }
    /* load template. */
    get_template_part('templates/header/style', $smof_data['header_layout']);
}

if( !function_exists('zura_page_title_content') ) {

    /**
     * Render Page Element Content
     * @param null $layout
     */
    function zura_page_element_content($layout = NULL)
    {
        global $zura_page_element, $smof_data;
        $page_title_before = '<div id="page-title" class="page-title">
        <div class="container">
        <div class="row">';
        $page_title_after = '</div></div></div><!-- #page-title -->';

        $breadcrumb_before = '<div id="page-breadcrumb" class="page-breadcrumb">
        <div class="container">
        <div class="row">';
        $breadcrumb_after = '</div></div></div><!-- #breadcrumb -->';

        $styles = [];
        if( isset($smof_data['page_element_background']) ) {
            $styles[] = "background-image: url('{$smof_data['page_element_background']['url']}')";
        }
        ?>
        <div id="zura-page-element-wrap" style="<?php echo implode(';', $styles) ?>">
            <?php echo wp_kses_post($page_title_before); ?>
            <div class="col-md-12">
                <h1 class="page-title"><?php $zura_page_element->getPageTitle(); ?></h1>
            </div>
            <?php echo wp_kses_post($page_title_after); ?>
            <?php echo wp_kses_post($breadcrumb_before); ?>
            <div class="col-md-12">
                <?php echo $zura_page_element->getBreadCrumb(); ?>
            </div>
            <?php echo wp_kses_post($breadcrumb_after); ?>
        </div><!-- #zura-page-element-wrap-->
        <?php
    }
}