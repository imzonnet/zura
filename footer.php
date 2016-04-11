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
						<div class="col-md-12">
							<?php dynamic_sidebar( 'footer-top-1' ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div><!-- Footer Top -->
		<div id="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<p class="copyright">Xây dựng và Phát triển bởi <a href="http://zuravn.com">Zura</a></p>
					</div>
					<?php if ( is_active_sidebar( 'footer-bottom-1' )  ) : ?>
						<div class="col-md-6">
							<?php dynamic_sidebar( 'footer-bottom-1' ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</footer><!-- #footer-->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
