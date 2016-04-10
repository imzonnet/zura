<?php
/**
 * Custom Templates
 *
 * @package Zura
 * @subpackage ZuraHotel
 * @since ZuraVN.Com 1.0
 */

function zura_back_to_top() {
    ?>
    <div id="back-to-top"><i class="fa fa-arrow-up"></i></div>
<?php
}
add_action('wp_footer', 'zura_back_to_top');

/*
 * Limit Words
 */
if (!function_exists('zura_limit_words')) {
    function zura_limit_words($string, $word_limit) {
        $words = explode(' ', strip_tags($string), ($word_limit + 1));
        if (count($words) > $word_limit) {
            array_pop($words);
        }
        return apply_filters('the_excerpt', implode(' ', $words));
    }
}