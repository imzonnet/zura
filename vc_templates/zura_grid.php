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
    <?php if (isset($atts['filter']) && $atts['filter'] == 1 && $atts['layout'] == 'masonry'): ?>
        <div class="zura-grid-filter">
            <ul class="zura-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all"><?php esc_html_e('All', 'zuravn'); ?></a></li>
                <?php foreach ($categories as $category): ?>
                    <?php $term = get_term($category, $taxonomy); ?>
                    <li>
                        <a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>">
                            <?php echo esc_attr($term->name); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="row zura-grid <?php echo esc_attr($atts['grid_class']); ?>">
        <?php
        $posts = $atts['posts'];
        $size = (isset($atts['layout']) && $atts['layout'] == 'basic') ? 'thumbnail' : 'medium';
        while ($posts->have_posts()) {
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach (zura_getCategoriesByPostID(get_the_ID(), $taxonomy) as $category) {
                $groups[] = '"category-' . $category->slug . '"';
            }
            ?>
            <div class="zura-grid-item <?php echo esc_attr($atts['item_class']); ?>"
                 data-groups='[<?php echo implode(',', $groups); ?>]'>
                <?php
                if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                    $class = ' has-thumbnail';
                    $thumbnail = get_the_post_thumbnail(get_the_ID(), $size);
                else:
                    $class = ' no-image';
                    $thumbnail = '<img src="' . ZURA_IMAGES . 'no-image.jpg" alt="' . get_the_title() . '" />';
                endif;
                echo '<div class="zura-grid-media ' . esc_attr($class) . '">' . $thumbnail . '</div>';
                ?>
                <div class="zura-grid-title">
                    <?php the_title(); ?>
                </div>
                <div class="zura-grid-time">
                    <?php the_time('l, F jS, Y'); ?>
                </div>
                <div class="zura-grid-categories">
                    <?php echo get_the_term_list(get_the_ID(), $taxonomy, 'Category: ', ', ', ''); ?>
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