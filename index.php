<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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
                <?php if (have_posts()) : ?>
                    <?php
                    // Start the loop.
                    while (have_posts()) : the_post();
                        get_template_part('templates/content/content', get_post_format());
                    endwhile;
                    // End the loop.
                    // Previous/next page navigation.
                    zura_pagination();

                // If no content, include the "No posts found" template.
                else :
                    get_template_part('templates/content', 'none');
                endif;
                ?>
            </div>
        </section><!-- #primary -->
        <section id="sidebar" class="col-md-4">
            <?php get_sidebar(); ?>
        </section><!-- #sidebar -->
    </div><!--.row-->
</div><!--.content-wrap-->

<?php get_footer(); ?>
