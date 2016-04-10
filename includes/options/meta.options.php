<?php
/**
 * Meta options
 * 
 * @author ZuraVN
 * @since 1.0.0
 */
class ZuraMetaOptions
{
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
    }

    /* add meta boxs */
    public function add_meta_boxes()
    {
        $this->add_meta_box('template_page_options', esc_html__('Setting', 'zura'), 'page');
        $this->add_meta_box('template_room_options', esc_html__('Info', 'zura'), 'room');
        $this->add_meta_box('template_testimonial_options', esc_html__('Info', 'zura'), 'testimonial');
    }
    
    public function add_meta_box($id, $label, $post_type, $context = 'advanced', $priority = 'default')
    {
        add_meta_box('_zura_' . $id, $label, array($this, $id), $post_type, $context, $priority);
    }
    /* --------------------- PAGE ---------------------- */
    function template_page_options() {
        ?>
        <div class="tab-container clearfix">
	        <ul class='etabs clearfix'>
	           <li class="tab"><a href="#tabs-general"><i class="fa fa-server"></i><?php esc_html_e('General', 'zura'); ?></a></li>
	           <li class="tab"><a href="#tabs-header"><i class="fa fa-diamond"></i><?php esc_html_e('Header', 'zura'); ?></a></li>
	           <li class="tab"><a href="#tabs-page-title"><i class="fa fa-connectdevelop"></i><?php esc_html_e('Page Title', 'zura'); ?></a></li>
	        </ul>
	        <div class='panel-container'>
                <div id="tabs-general">
                <?php
                zura_options(array(
                    'id' => 'full_width',
                    'label' => esc_html__('Full Width','zura'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>'0'),
                ));
                ?>
                </div>
                <div id="tabs-header">
                <?php
                /* header. */
                zura_options(array(
                    'id' => 'header',
                    'label' => esc_html__('Header','zura'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>'0'),
                    'follow' => array('1'=>array('#page_header_enable'))
                ));
                ?>
                </div>
                <div id="tabs-page-title">
                <?php
                /* page title. */
                zura_options(array(
                    'id' => 'page_title',
                    'label' => esc_html__('Page Title','zura'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>'0'),
                    'follow' => array('1'=>array('#page_title_enable'))
                ));
                ?>
                </div>
            </div>
        </div>
        <?php
    }

    function template_room_options() {
        zura_options(array(
            'id' => 'price',
            'label' => esc_html__('Giá Thấp Điểm','zura'),
            'type' => 'text',
        ));
        zura_options(array(
            'id' => 'hot_price',
            'label' => esc_html__('Giá Cao Điểm','zura'),
            'type' => 'text',
        ));
    }
    function template_testimonial_options() {
        zura_options(array(
            'id' => 'position',
            'label' => esc_html__('Chức danh','zura'),
            'type' => 'text',
        ));
    }
}

new ZuraMetaOptions();