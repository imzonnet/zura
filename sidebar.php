<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package Zura
 * @subpackage ZuraHotel
 * @since ZuraVN.Com 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<aside class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
