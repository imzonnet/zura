<?php

class ZuraPageElement
{
    /**
     * Page title
     * 
     * @since 1.0.0
     */
    public static function getPageTitle(){
        global $zura_meta;
        
        if (!is_archive()){
            /* page. */
            if(is_page()) :
                /* custom title. */
                if(isset($zura_meta->_zo_page_title_text) && !empty($zura_meta->_zo_page_title_text)):
                    echo esc_attr($zura_meta->_zo_page_title_text);
                else :
                    the_title();
                endif;
            /* blog */
            elseif (is_front_page() || is_home()):
                esc_html_e( 'Blog', 'zura' );
            /* search */
            elseif (is_search()):
                printf( esc_html__( 'Search Results for: %s', 'zura' ), '<span>' . get_search_query() . '</span>' );
            /* 404 */ 
            elseif (is_404()):
                esc_html_e( '404', 'zura');
            /* other */
            else :
                the_title();
            endif;
        } else { 
            /* category. */
            if ( is_category() ) :
                single_cat_title();
            elseif ( is_tag() ) :
            /* tag. */
                single_tag_title();
            /* author. */
            elseif ( is_author() ) :
                printf( esc_html__( 'Author: %s', 'zura' ), '<span class="vcard">' . get_the_author() . '</span>' );
            /* date */
            elseif ( is_day() ) :
                printf( esc_html__( 'Day: %s', 'zura' ), '<span>' . get_the_date() . '</span>' );
            elseif ( is_month() ) :
                printf( esc_html__( 'Month: %s', 'zura' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'zura' ) ) . '</span>' );
            elseif ( is_year() ) :
                printf( esc_html__( 'Year: %s', 'zura' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'zura' ) ) . '</span>' );
            /* post format */
            elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                esc_html_e( 'Asides', 'zura' );
            elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                esc_html_e( 'Galleries', 'zura');
            elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                esc_html_e( 'Images', 'zura');
            elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                esc_html_e( 'Videos', 'zura' );
            elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                esc_html_e( 'Quotes', 'zura' );
            elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                esc_html_e( 'Links', 'zura' );
            elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
                esc_html_e( 'Statuses', 'zura' );
            elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
                esc_html_e( 'Audios', 'zura' );
            elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
                esc_html_e( 'Chats', 'zura' );
            /* woocommerce */
            elseif (class_exists('Woocommerce') && is_woocommerce()):
                woocommerce_page_title();
            else :
            /* other */
                the_title();
            endif;
        }
    }
    /**
     * Breadcrumb
     * 
     * @since 1.0.0
     */
    public static function getBreadCrumb($separator = '') {

        if ( function_exists('yoast_breadcrumb') )  {
            return yoast_breadcrumb('<p id="breadcrumbs">','</p>', false);
        }

        global $smof_data, $post;
        $output = '<ul class="breadcrumbs">';
        /* not front_page */
        if ( !is_front_page() ) {
            $output .= '<li><a href="';
            $output .= esc_url(home_url('/'));
            $output .= '">'.$smof_data['breadcrumb_home_prefix'];
            $output .= "</a></li>";
        }

        $params['link_none'] = '';

        /* category */
        if (is_category()) {
            $category = get_the_category();
            $ID = $category[0]->cat_ID;
            $output .= is_wp_error( $cat_parents = get_category_parents($ID, TRUE, '', FALSE ) ) ? '' : '<li>'.$cat_parents.'</li>';
        }
        /* tax */
        if (is_tax()) {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            $link = get_term_link( $term );

            if ( is_wp_error( $link ) ) {
                $output .= sprintf('<li>%s</li>', $term->name );
            } else {
                $output .= sprintf('<li><a href="%s" title="%s">%s</a></li>', $link, $term->name, $term->name );
            }
        }
        /* home */

        /* page not front_page */
        if(is_page() && !is_front_page()) {
            $parents = array();
            $parent_id = $post->post_parent;
            while ( $parent_id ) :
                $page = get_page( $parent_id );
                if ( $params["link_none"] )
                    $parents[]  = get_the_title( $page->ID );
                else
                    $parents[]  = '<li><a href="' . get_permalink( $page->ID ) . '" title="' . get_the_title( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a></li>' . $separator;
                $parent_id  = $page->post_parent;
            endwhile;
            $parents = array_reverse( $parents );
            $output .= join( '', $parents );
            $output .= '<li>'.get_the_title().'</li>';
        }
        /* single */
        if(is_single()) {
            $categories_1 = get_the_category($post->ID);
            if($categories_1):
                foreach($categories_1 as $cat_1):
                    $cat_1_ids[] = $cat_1->term_id;
                endforeach;
                $cat_1_line = implode(',', $cat_1_ids);
            endif;
            if( isset( $cat_1_line ) && $cat_1_line ) {
                $categories = get_categories(array(
                    'include' => $cat_1_line,
                    'orderby' => 'id'
                ));
                if ( $categories ) :
                    foreach ( $categories as $cat ) :
                        $cats[] = '<li><a href="' . get_category_link( $cat->term_id ) . '" title="' . $cat->name . '">' . $cat->name . '</a></li>';
                    endforeach;
                    $output .= join( '', $cats );
                endif;
            }
            $output .= '<li>'.get_the_title().'</li>';
        }
        /* tag */
        if( is_tag() ){ $output .= '<li>'."Tag: ".single_tag_title('',FALSE).'</li>'; }
        /* search */
        if( is_search() ){ $output .= '<li>'.esc_html__("Search", 'zura').'</li>'; }
        /* date */
        if( is_year() ){ $output .= '<li>'.get_the_time('Y').'</li>'; }
        /* 404 */
        if( is_404() ) {
            $output .= '<li>'.esc_html__("404 - Page not Found", 'zura').'</li>';
        }
        /* archive */
        if( is_archive() && is_post_type_archive() ) {
            $title = post_type_archive_title( '', false );
            $output .= '<li>'. $title .'</li>';
        }
        $output .= "</ul>";
        return $output;
    }
    
    /**
     * Get Shortcode From Content
     * 
     * @param string $shortcode
     * @param string $content
     * @return unknown
     */
    public static function getShortcodeFromContent($shortcode = '', $content = ''){
        
        preg_match("/\[".$shortcode."(.*)/", $content , $matches);
        
        return !empty($matches[0]) ? $matches[0] : null ;
    }
    
    /**
     * Get list name local fonts.
     * 
     * @return multitype:unknown Ambigous <string, mixed>
     * @since 1.0.0
     */
    public static function getListLocalFontsName(){
        
        /* array fonts. */
        $localfonts = array();
        
        /* folder fonts. */
        $font_path = get_template_directory() . "/assets/fonts";
        
        if (!$handle = opendir($font_path)) {
        } else {
            while (false !== ($file = readdir($handle))) {
                if (strpos($file, ".ttf") !== false || strpos($file, ".eot") !== false || strpos($file, ".svg") !== false || strpos($file, ".woff") !== false) {
                    $file = str_replace(array('.ttf', '.eot', '.svg', '.woff'), '', $file);
                    $localfonts[$file] = $file;
                }
            }
        }
        closedir($handle);
        
        return $localfonts;
    }

	/**
	 * Set Font Local
	 *
	 * @param string $name
	 * @param string $selecter
	 */
    
    public static function setTypographyLocal($name = '' , $selecter = ''){
        
        $font_part = get_template_directory_uri()."/assets/fonts/".esc_attr($name);        
        /* load font files. */
        if($name){
			echo "@include font-face($name, '{$font_part}.eot', '{$font_part}.woff','{$font_part}.ttf');\n";
            /* add font selecter. */
            if($selecter){
                echo esc_attr($selecter)."{font-family:'".esc_attr($name)."';}\n";
            }
        }
    }
	/**
	 * set google font for selecter.
	 *
	 * @param array $googlefont
	 * @param string $selecter
	 */
	public static function setGoogleFont($googlefont = array(), $selecter){

		if(isset($googlefont['font-family'])){
			/* add font selecter. */
			if($selecter){
				echo esc_attr($selecter)."{font-family:'".esc_attr($googlefont['font-family'])."';}";
			}
		}
	}
    /**
     * minimize CSS styles
     *
     * @since 1.1.0
     */
    public static function compressCss($buffer){
    
        /* remove comments */
        $buffer = preg_replace("!/\*[^*]*\*+([^/][^*]*\*+)*/!", "", $buffer);
        /* remove tabs, spaces, newlines, etc. */
        $buffer = str_replace("	", " ", $buffer); //replace tab with space
        $arr = array("\r\n", "\r", "\n", "\t", "  ", "    ", "    ");
        $rep = array("", "", "", "", " ", " ", " ");
        $buffer = str_replace($arr, $rep, $buffer);
        /* remove whitespaces around {}:, */
        $buffer = preg_replace("/\s*([\{\}:,])\s*/", "$1", $buffer);
        /* remove last ; */
        $buffer = str_replace(';}', "}", $buffer);
    
        return $buffer;
    }
}

global $zura_page_element;
$zura_page_element = new ZuraPageElement();