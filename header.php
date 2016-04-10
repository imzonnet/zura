<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Zura
 * @subpackage ZuraHotel
 * @since ZuraVN.Com 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="zura-site">
	<section class="site-inner">
		<?php if( is_active_sidebar('header-top-1')) : ?>
		<div id="header-top">
			<div class="container">
				<?php dynamic_sidebar('header-top-1'); ?>
 			</div>
		</div>
		<?php endif; ?>
		<!--begin-->
		<header id="header" class="site-header">
			<div class="container">
				<!-- Static navbar -->
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<?php zura_header_logo(); ?>
						</div>
						<div id="navbar" class="navbar-collapse collapse">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_class'     => 'nav navbar-nav main-navigation primary-menu',
							) );
							?>
						</div><!--/.nav-collapse -->
					</div><!--/.container-fluid -->
				</nav>
			</div> <!-- /container -->
		</header><!-- End #header -->

		<?php zura_page_element(); ?>

		<div id="main-content"><!-- #main-content -->