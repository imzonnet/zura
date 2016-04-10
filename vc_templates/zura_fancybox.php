<?php
$icon_name = "icon_" . $atts['icon_type'];
$iconClass = isset($atts[$icon_name]) ? $atts[$icon_name] : '';
$image_url = '';
if (!empty($atts['image'])) {
    $attachment_image = wp_get_attachment_image_src($atts['image'], 'full');
    $image_url = $attachment_image[0];
}
?>
<div class="zura-fancybox-wrapper <?php echo esc_attr($atts['template']); ?>"
     id="<?php echo esc_attr($atts['html_id']); ?>">
    <div class="zura-fancybox-item">
        <?php if ($image_url): ?>
            <div class="fancybox-media fancybox-image">
                <img src="<?php echo esc_attr($image_url); ?>"/>
            </div>
        <?php else: ?>
            <div class="fancybox-media fancybox-icon">
                <i class="<?php echo esc_attr($iconClass); ?>"></i>
            </div>
        <?php endif; ?>

        <?php if ($atts['title']): ?>
            <h3 class="fancybox-title"><?php echo apply_filters('the_title', $atts['title']); ?></h3>
        <?php endif; ?>

        <?php if (isset($atts['description']) && $atts['description']): ?>
            <div class="fancybox-content">
                <?php echo apply_filters('the_content', $atts['description']); ?>
            </div>
        <?php endif; ?>

        <?php if ($atts['button_text'] != ''): ?>
            <div class="zura-fancybox-footer">
                <?php $class_btn = ($atts['button_type'] == 'button') ? 'btn btn-large' : ''; ?>
                <a href="<?php echo esc_url($atts['button_link']); ?>"
                   class="<?php echo esc_attr($class_btn); ?>"><?php echo esc_attr($atts['button_text']); ?></a>
            </div>
        <?php endif; ?>
    </div>
</div>