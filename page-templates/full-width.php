<?php
/* Template Name: Full Width */ ?>
<?php
get_header(); ?>

<div id="page-content" class="<?php zura_main_class(); ?>">
    <div class="row">
        <section id="primary" class="col-md-12">
            <?php if (have_posts()) : ?>
                <?php
                // Start the loop.
                while (have_posts()) : the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <?php
                            the_content();
                            wp_link_pages(array(
                                'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'zura') . '</span>',
                                'after' => '</div>',
                                'link_before' => '<span>',
                                'link_after' => '</span>',
                                'pagelink' => '<span class="screen-reader-text">' . __('Page', 'zura') . ' </span>%',
                                'separator' => '<span class="screen-reader-text">, </span>',
                            ));
                            ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                    <?php
                    //// If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                endwhile;
            // End the loop.
            // If no content, include the "No posts found" template.
            else :
                get_template_part('templates/content', 'none');
            endif;
            ?>
        </section><!-- #primary -->
    </div><!--.row-->
</div><!--.content-wrap-->

<?php get_footer(); ?>
