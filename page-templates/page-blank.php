<?php
/**
 * Template name: Full Content
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Zura
 * @subpackage ZuraHotel
 * @since ZuraVN.Com 1.0
 */

get_header(); ?>

<div id="page-content" class="<?php zura_main_class(); ?>">
	<div class="row">
		<section id="primary" class="col-md-12">
			<?php if (have_posts()) : ?>
				<?php
				// Start the loop.
				while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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
					?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->

			<?php
				endwhile;
				// End the loop.
				// Previous/next page navigation.
				zura_pagination();
			// If no content, include the "No posts found" template.
			else :
				get_template_part('templates/content', 'none');
			endif;
			?>
		</section><!-- #primary -->
	</div><!--.row-->
</div><!--.content-wrap-->

<?php get_footer(); ?>
