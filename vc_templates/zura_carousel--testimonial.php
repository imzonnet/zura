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
            $post_meta = zura_post_meta_data();
            ?>
            <div class="zura-carousel-item">
                <div class="description"><?php the_content(); ?></div>
                <div class="testimonial-header">
                    <?php if( has_post_thumbnail() ) : ?>
                    <div class="image">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                    <?php endif; ?>
                    <h2 class="testimonial-name">
                        <?php the_title(); ?>
                    </h2>
                    <?php if( isset($post_meta->_zura_position) ) : ?>
                    <div class="position">
                        <?php echo esc_attr($post_meta->_zura_position); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>