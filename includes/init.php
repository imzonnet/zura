<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zura
 * @subpackage ZuraHotel
 * @since ZuraVN.Com 1.0
 */

/**
 * Theme Options
 */
require 'libs/ReduxCore/framework.php';
require 'libs/theme-options.php';


function dd($x) {
    echo '<pre>';
    var_dump($x);
    echo '</pre>';
    die();
}

/**
 * Add Meta Core Options
 */
if(is_admin()){
    if(!class_exists('ZuraMetaCoreControl')){
        /* add mete core */
        require 'libs/metacore/core.options.php';
        /* add meta options */
        require 'options/meta.options.php';
    }
    /* tmp plugins. */
    //require( get_template_directory() . '/inc/options/require.plugins.php' );
}
/**
 * CSS Processor
 */
require 'libs/scss.inc.php';
require 'dynamic/static.css.php';

/**
 * Zura Page Element
 */
require 'libs/page_element.class.php';
require_once 'options/header.php';


/**
 * Custom VC Params.
 */
require 'templates/vc_custom.php';
/**
 * Custom template functions.
 */
require 'templates/functions.php';
/**
 * Custom template tags for this theme.
 */
require 'templates/template-tags.php';
/**
 * Customizer additions.
 */
require 'templates/custom.php';
