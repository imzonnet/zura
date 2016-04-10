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
            $post_meta = zura_post_meta_data();
            foreach (zura_getCategoriesByPostID(get_the_ID(), $taxonomy) as $category) {
                $groups[] = 'category-' . $category->slug;
            }
            ?>
            <div class="zura-carousel-item <?php echo implode(' ', $groups); ?>">
                <?php if( has_post_thumbnail() ) : ?>
                <div class="image">
                    <?php the_post_thumbnail('medium'); ?>
                    <div class="price">
                        <?php echo esc_attr($post_meta->_zura_price); ?>
                    </div>
                </div>
                <?php endif; ?>
                <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><a href="http://www.agoda.com/ily-hotel/hotel/da-nang-vn.html?cur=USD" class="btn btn-primary">Đặt Phòng</a></p>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>