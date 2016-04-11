<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zura
 * @subpackage ZuraHotel
 * @since ZuraVN.Com 1.0
 */

get_header(); ?>

<div class="<?php zura_main_class(); ?>">
	<div class="row">
		<section id="primary" class="col-md-8">
			<?php if ( have_posts() ) : ?>
				<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
					/**
					 * Include the post format-specific template for the content. If you want to
					 * this in a child theme then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'templates/content/content', get_post_format() );
					// End the loop.
				endwhile;

				// Previous/next page navigation.
				zura_pagination();

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'templates/content', 'none' );
			endif;
			?>
		</section><!-- #primary -->
		<section id="sidebar" class="col-md-4">
			<?php get_sidebar(); ?>
		</section><!-- #sidebar -->
	</div><!--.row-->
</div><!--.content-wrap-->

<?php get_footer(); ?>
