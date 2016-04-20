<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Zura
 * @subpackage ZuraHotel
 * @since ZuraVN.Com 1.0
 */
?>
		</div><!-- End #main-content -->
	</div><!--.site-inner-->
	<footer id="footer">
		<div id="footer-top">
			<div class="container">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-top-1' )  ) : ?>
						<div class="col-md-3">
							<?php dynamic_sidebar( 'footer-top-1' ); ?>
						</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-top-2' )  ) : ?>
						<div class="col-md-3">
							<?php dynamic_sidebar( 'footer-top-2' ); ?>
						</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-top-3' )  ) : ?>
						<div class="col-md-3">
							<?php dynamic_sidebar( 'footer-top-3' ); ?>
						</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-top-4' )  ) : ?>
						<div class="col-md-3">
							<?php dynamic_sidebar( 'footer-top-4' ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div><!-- Footer Top -->
		<div id="footer-bottom">
			<div class="container">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-bottom-1' )  ) : ?>
						<div class="col-md-6">
							<?php dynamic_sidebar( 'footer-bottom-1' ); ?>
						</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-bottom-2' )  ) : ?>
						<div class="col-md-6">
							<?php dynamic_sidebar( 'footer-bottom-2' ); ?>
						</div>
					<?php endif; ?>
				</div>
				<?php zura_copyright(); ?>
			</div>
		</div>
	</footer><!-- #footer-->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
