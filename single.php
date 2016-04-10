<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Zura
 * @subpackage ZuraHotel
 * @since ZuraVN.Com 1.0
 */

get_header(); ?>
<div class="<?php zura_main_class(); ?>">
	<div class="row">
		<section id="primary" class="col-md-8">
			<div class="row">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					// Include the single post content template.
					get_template_part( 'templates/single/content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

					if ( is_singular( 'attachment' ) ) {
						// Parent post navigation.
						the_post_navigation( array(
							'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'zura' ),
						) );

					} elseif ( is_singular( 'post' ) ) {
						// Previous/next post navigation.
						the_post_navigation( array(
							'next_text' => '<span class="post-title"><i class="fa fa-angle-right"></i> %title</span>',
							'prev_text' => '<span class="post-title"><i class="fa fa-angle-left"></i> %title</span>',
						) );
					}

					// End of the loop.
				endwhile;
				?>
			</div>
		</section><!-- #primary -->
		<section id="sidebar" class="col-md-4">
			<?php get_sidebar(); ?>
		</section><!-- #sidebar -->
	</div><!--.row-->
</div><!--.content-wrap-->

<?php get_footer(); ?>
