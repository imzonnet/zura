<?php

/**
 * Auto create .css file from Theme Options
 * @author Zura
 * @version 1.0.0
 */
class Zura_StaticCss
{

    public $scss;

    function __construct()
    {
        add_action('init', array($this, 'init'));
    }

    public function init() {
        global $smof_data;
        /* scss */
        $this->scss = new scssc();

        /* set paths scss */
        $this->scss->setImportPaths(get_template_directory() . '/assets/scss/');

        /* generate css over time */
        if (isset($smof_data['dev_mode']) && $smof_data['dev_mode']) {
            $this->generate_file();
        } else {
            /* save option generate css */
            add_action("redux/options/smof_data/saved", array(
                $this,
                'generate_file'
            ));
        }
    }

    /**
     * generate css file.
     *
     * @since 1.0.0
     */
    public function generate_file()
    {
        global $smof_data;

        if (! empty($smof_data)) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
            global $wp_filesystem;

            /* write options to scss file */
            
			if ( ! $wp_filesystem->put_contents( get_template_directory() . '/assets/scss/options.scss', $this->css_render(), 0644 ) ) {
				esc_html_e( 'Error saving file!', 'zura' );
			}

            /* minimize CSS styles */
            if (!$smof_data['dev_mode']) {
                $this->scss->setFormatter('scss_formatter_compressed');
            }

            /* compile scss to css */
            $css = $this->scss_render();

            $file = "static.css";

            /* write static.css file */
			if ( ! $wp_filesystem->put_contents( get_template_directory() . '/assets/css/' . $file, $css, 0644) ) {
				esc_html_e( 'Error saving file!', 'zura' );
			}
        }
    }

    /**
     * scss compile
     *
     * @since 1.0.0
     * @return string
     */
    public function scss_render(){
        /* compile scss to css */
        return $this->scss->compile('@import "master.scss"');
    }

    /**
     * main css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $smof_data;
        ob_start();
        /**
        * Set Style Color
        */
        echo "\$primary_color: {$smof_data['primary_color']};\n";
        echo "\$secondary_color: {$smof_data['secondary_color']};\n";
        echo "\$link_color: {$smof_data['link_color']['regular']};\n";
        echo "\$link_hover_color: {$smof_data['link_color']['hover']};\n";
        echo "\$header_height: {$smof_data['header_height']['height']};\n";
        echo "\$header_sticky_height: {$smof_data['menu_sticky_height']['height']};\n";
        /* ==========================================================================
           End Button
        ========================================================================== */
        return ob_get_clean();
    }
}
new Zura_StaticCss();
