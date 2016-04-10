<?php
/* Get Categories */
$taxonomy = 'category';
$_category = array();
if (!isset($atts['cat']) || $atts['cat'] == '' && taxonomy_exists($taxonomy)) {
    $terms = get_terms($taxonomy);
    foreach ($terms as $cat) {
        $_category[] = $cat->term_id;
    }
} else {
    $_category = explode(',', $atts['cat']);
}
$atts['categories'] = $_category;
?>
<div class="zura-carousel-wrap">
    <?php if ($atts['filter'] == "true" && !$atts['loop']): ?>
        <div class="zura-carousel-filter">
            <ul>
                <li><a class="active" href="#" data-group="all"><?php esc_html_e('All', 'zuravn'); ?></a></li>
                <?php foreach ($atts['categories'] as $category): ?>
                    <?php $term = get_term($category, $taxonomy); ?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>">
                            <?php echo esc_attr($term->name); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="zura-carousel-filter-hidden" style="display: none"></div>
    <?php endif; ?>
    <div class="zura-carousel <?php echo esc_attr($atts['template']); ?>"
         id="<?php echo esc_attr($atts['html_id']); ?>">
        <?php
        $posts = $atts['posts'];
        while ($posts->have_posts()) :
            $posts->the_post();
            $groups = array();
            $groups[] = 'zura-carousel-filter-item all';
            foreach (zura_getCategoriesByPostID(get_the_ID(), $taxonomy) as $category) {
                $groups[] = 'category-' . $category->slug;
            }
            ?>
            <div class="zura-carousel-item <?php echo implode(' ', $groups); ?>">
                <?php
                if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                    $class = ' has-thumbnail';
                    $thumbnail = get_the_post_thumbnail(get_the_ID(), 'medium');
                else:
                    $class = ' no-image';
                    $thumbnail = '<img src="' . ZURA_IMAGES . 'no-image.jpg" alt="' . get_the_title() . '" />';
                endif;
                echo '<div class="zura-grid-media ' . esc_attr($class) . '">' . $thumbnail . '</div>';
                ?>
                <div class="zura-carousel-title">
                    <?php the_title(); ?>
                </div>
                <div class="zura-carousel-time">
                    <?php the_time('l, F jS, Y'); ?>
                </div>
                <div class="zura-carousel-categories">
                    <?php echo get_the_term_list(get_the_ID(), 'category', 'Category: ', ', ', ''); ?>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>