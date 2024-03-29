<?php

/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if ( ! class_exists( 'Redux' ) ) {
    return;
}

class Zura_Theme_Options {

    protected $opt_name = "smof_data";
    protected $args = array();

    public function __construct()
    {
        //Set Arguments
        $this->setArguments();
        //Register
        Redux::setArgs( $this->opt_name, $this->args );

        //Add list section
        $this->setSection();

        // Custom
        add_action( 'admin_init', array($this, 'setAdminScripts') );
    }

    public function setAdminScripts() {
        // Register our script.
        wp_enqueue_style( 'zura-admin-style', get_template_directory_uri() . '/includes/libs/assets/css/admin.css', array(), 20160411);
    }

    /**
     * Set Arguments
     */
    public function setArguments()
    {
        $theme = wp_get_theme();

        $this->args = array(
            // TYPICAL -> Change these values as you need/desire
            'opt_name'             => $this->opt_name,
            // This is where your data is stored in the database and also becomes your global variable name.
            'display_name'         => $theme->get( 'Name' ),
            // Name that appears at the top of your panel
            'display_version'      => $theme->get( 'Version' ),
            // Version that appears at the top of your panel
            'menu_type'            => 'menu',
            //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
            'allow_sub_menu'       => true,
            // Show the sections below the admin menu item or not
            'menu_title'           => __( 'ZuraVN.Com', 'zura' ),
            'page_title'           => __( 'ZuraVN.Com', 'zura' ),
            // You will need to generate a Google API key to use this feature.
            // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
            'google_api_key'       => '',
            // Set it you want google fonts to update weekly. A google_api_key value is required.
            'google_update_weekly' => false,
            // Must be defined to add google fonts to the typography module
            'async_typography'     => true,
            // Use a asynchronous font on the front end or font string
            //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
            'admin_bar'            => true,
            // Show the panel pages on the admin bar
            'admin_bar_icon'       => 'dashicons-portfolio',
            // Choose an icon for the admin bar menu
            'admin_bar_priority'   => 50,
            // Choose an priority for the admin bar menu
            'global_variable'      => '',
            // Set a different name for your global variable other than the opt_name
            'dev_mode'             => true,
            // Show the time the page took to load, etc
            'update_notice'        => true,
            // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
            'customizer'           => true,
            // Enable basic customizer support
            //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
            //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

            // OPTIONAL -> Give you extra features
            'page_priority'        => null,
            // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
            'page_parent'          => 'themes.php',
            // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
            'page_permissions'     => 'manage_options',
            // Permissions needed to access the options panel.
            'menu_icon'            => '',
            // Specify a custom URL to an icon
            'last_tab'             => '',
            // Force your panel to always open to a specific tab (by id)
            'page_icon'            => 'icon-themes',
            // Icon displayed in the admin panel next to your menu_title
            'page_slug'            => '_options',
            // Page slug used to denote the panel
            'save_defaults'        => true,
            // On load save the defaults to DB before user clicks save or not
            'default_show'         => false,
            // If true, shows the default value next to each field that is not the default value.
            'default_mark'         => '',
            // What to print by the field's title if the value shown is default. Suggested: *
            'show_import_export'   => true,
            // Shows the Import/Export panel when not used as a field.

            // CAREFUL -> These options are for advanced use only
            'transient_time'       => 60 * MINUTE_IN_SECONDS,
            'output'               => true,
            // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
            'output_tag'           => true,
            // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
            'footer_credit'     => '<a href="http://zuravn.com">ZuraVn.Com</a>',
            // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
            'database'             => '',
            // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
            'use_cdn'              => true,
            // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
            //'compiler'             => true,
            // HINTS
            'hints'                => array(
                'icon'          => 'el el-question-sign',
                'icon_position' => 'right',
                'icon_color'    => 'lightgray',
                'icon_size'     => 'normal',
                'tip_style'     => array(
                    'color'   => 'light',
                    'shadow'  => true,
                    'rounded' => false,
                    'style'   => '',
                ),
                'tip_position'  => array(
                    'my' => 'top left',
                    'at' => 'bottom right',
                ),
                'tip_effect'    => array(
                    'show' => array(
                        'effect'   => 'slide',
                        'duration' => '500',
                        'event'    => 'mouseover',
                    ),
                    'hide' => array(
                        'effect'   => 'slide',
                        'duration' => '500',
                        'event'    => 'click mouseleave',
                    ),
                ),
            )
        );

        // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
        $this->args['admin_bar_links'][] = array(
            'id'    => 'zura-docs',
            'href'  => 'http://zuravn.com/',
            'title' => __( 'Visit Zura Team', 'zura' ),
        );

        // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
        $this->args['share_icons'][] = array(
            'url'   => 'http://zuravn.com',
            'title' => 'Like us on Facebook',
            'icon'  => 'el el-facebook'
        );
        $this->args['share_icons'][] = array(
            'url'   => 'http://zuravn.com',
            'title' => 'Follow us on Twitter',
            'icon'  => 'el el-twitter'
        );

        // Panel Intro text -> before the form
        //$this->args['intro_text'] = '';

        // Add content after the form.
        $this->args['footer_text'] = '';
    }

    /**
     * Register Section into Theme Options
     */
    public function setSection()
    {
        require_once get_template_directory() .'/includes/options/options.php';
    }

    /**
     * Set Section
     * @param $data
     */
    public function addSection($data) {
        Redux::setSection($this->opt_name, $data);
    }
}

$zuraThemeOptions = new Zura_Theme_Options();


