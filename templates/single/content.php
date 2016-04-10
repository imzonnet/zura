<?php
/**
 * The template part for displaying single posts
 *
 * @package Zura
 * @subpackage ZuraHotel
 * @since ZuraVN.Com 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php zura_post_thumbnail(); ?>

	<?php the_title( '<h2 class="post-title">', '</h2>' ); ?>

	<?php zura_excerpt(); ?>


	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'zura' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'zura' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'templates/content/biography' );
			}
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
