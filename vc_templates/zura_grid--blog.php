<?php
/* get categories */
$taxonomy = 'category';
$categories = array();
if (!isset($atts['cat']) || $atts['cat'] == '') {
    $terms = get_terms($taxonomy);
    foreach ($terms as $cat) {
        $categories = $cat->term_id;
    }
} else {
    $categories = explode(',', $atts['cat']);
}
?>
<div class="zura-grid-wrapper <?php echo esc_attr($atts['template']); ?>"
     id="<?php echo esc_attr($atts['html_id']); ?>">
    <div class="row zura-grid <?php echo esc_attr($atts['grid_class']); ?>">
        <?php
        $posts = $atts['posts'];
        $size = (isset($atts['layout']) && $atts['layout'] == 'basic') ? 'thumbnail' : 'medium';
        while ($posts->have_posts()) {
            $posts->the_post();
            ?>
            <div class="post-news <?php echo esc_attr($atts['item_class']); ?>">
                <div class="post-time">
                    <span class="date"><?php the_time('d'); ?></span>
                    <span class="month"><?php the_time('M'); ?></span>
                </div>
                <div class="post-info">
                    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="description"><?php echo zura_limit_words(get_the_excerpt(), 15); ?></div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
    wp_reset_postdata();
    ?>
</div><!-- .zura-grid-wrapper -->