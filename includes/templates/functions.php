<?php
/**
 * Theme Functions
 */
if( !function_exists('zura_meta_data') ) {
    /**
     * Get meta data.
     * @author ZuraVN
     * @return mixed|NULL
     */
    function zura_meta_data()
    {
        global $post, $zura_meta;

        if (!isset($post->ID)) return;

        $zura_meta = json_decode(get_post_meta($post->ID, '_zura_meta_data', true));
        if (empty($zura_meta)) return;

        foreach ($zura_meta as $key => $meta) {
            $zura_meta->$key = rawurldecode($meta);
        }
    }
}
add_action('wp', 'zura_meta_data');


if( !function_exists('zura_post_meta_data') ) {
    /**
     * Get post meta data.
     * @author ZuraVN
     * @return mixed|NULL
     */
    function zura_post_meta_data()
    {
        global $post;

        if (!isset($post->ID)) return null;

        $post_meta = json_decode(get_post_meta($post->ID, '_zura_meta_data', true));

        if (empty($post_meta)) return null;

        foreach ($post_meta as $key => $meta) {
            $post_meta->$key = rawurldecode($meta);
        }

        return $post_meta;
    }
}

if( !function_exists('zura_main_class') ) {
    /**
     * Set body boxed or full with
     */
    function zura_main_class() {
        global $zura_meta;
        /* check content full width */
        if(is_page() && isset($zura_meta->_zura_full_width) && $zura_meta->_zura_full_width == 1){
            /* full width */
            $main_class = "container-fluid";
        } else {
            /* boxed */
            $main_class = "container";
        }
        echo apply_filters('zura_main_class', $main_class);
    }
}

if( !function_exists('zura_pagination') ) {
    /**
     * Display navigation to next/previous set of posts when applicable.
     *
     * @since 1.0.0
     * @param null $loop_query
     */
    function zura_pagination($loop_query = null) {
        // Don't print empty markup if there's only one page.
        if($loop_query ){
            $query = $loop_query ;
        }else{
            global $wp_query;
            $query = $wp_query;
        }
        if ( $query->max_num_pages < 2 ) {
            return;
        }

        $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args   = array();
        $url_parts    = explode( '?', $pagenum_link );

        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }

        $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

        $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

        // Set up paginated links.
        $links = paginate_links( array(
            'base'     => $pagenum_link,
            'format'   => $format,
            'total'    => $query->max_num_pages,
            'current'  => $paged,
            'mid_size' => 1,
            'add_args' => array_map( 'urlencode', $query_args ),
            'prev_text' => wp_kses(__( '<i class="fa fa-angle-double-left"></i>', 'zura' ), array('i' => array('class'=>array()))),
            'next_text' => wp_kses(__( '<i class="fa fa-angle-double-right"></i>', 'zura' ), array('i' => array('class'=>array()))),
        ) );

        if ( $links ) :
            ?>
            <nav class="navigation paging-navigation clearfix" role="navigation">
                <div class="pagination loop-pagination">
                    <?php echo do_shortcode($links); ?>
                </div><!-- .pagination -->
            </nav><!-- .navigation -->
            <?php
        endif;
    }
}


if( !function_exists('zura_widget_tag_cloud_args')) {
    /**
     * Modifies tag cloud widget arguments to have all tags in the widget same font size.
     *
     * @since ZuraVN.Com 1.0
     *
     * @param array $args Arguments for tag cloud widget.
     * @return array A new modified arguments.
     */
    function zura_widget_tag_cloud_args($args)
    {
        $args['largest'] = 1;
        $args['smallest'] = 1;
        $args['unit'] = 'em';
        return $args;
    }
}
add_filter( 'widget_tag_cloud_args', 'zura_widget_tag_cloud_args' );

if( !function_exists('zura_custom_admin_styles')) {
    /**
     * Remove Redux ADS
     * @since ZuraVN.Com 1.0
     */
    function zura_custom_admin_styles() {
        ?>
        <style type="text/css">
            #redux_rAds, .rAds {
                display: none !important;
                opacity: 0;
                height: 0;
            }
        </style>
        <?php
    }
}
add_action( 'admin_head', 'zura_custom_admin_styles' );

if( !function_exists('zura_header_logo')) {
    /**
     * Get Header Logo
     */
    function zura_header_logo()
    {
        global $smof_data;
        if (is_front_page()) : ?>
            <h1 id="logo" class="navbar-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <span class="site-title"><?php bloginfo('name'); ?></span>
                    <img src="<?php echo esc_url($smof_data['main_logo']['url']); ?>" alt="<?php bloginfo('name'); ?>">
                </a>
            </h1>
        <?php else : ?>
            <p id="logo" class="navbar-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <span class="site-title"><?php bloginfo('name'); ?></span>
                    <img src="<?php echo esc_url($smof_data['main_logo']['url']); ?>" alt="<?php bloginfo('name'); ?>">
                </a>
            </p>
        <?php endif;
    }
}

if( !function_exists('zura_theme_data')) {
    /**
     * Get Theme Option Data
     */
    function zura_theme_data($key) {
        global $smof_data;
        return isset($smof_data[$key]) ? $smof_data[$key] : NULL;
    }
}