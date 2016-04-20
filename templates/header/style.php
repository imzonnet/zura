<?php if( zura_theme_data('enable_header_top') ) : ?>
<section id="header-top">
    <div class="container">
        <div class="row">
            <?php if( is_active_sidebar('header-top-1')) : ?>
                <div class="col-md-6">
                    <?php dynamic_sidebar('header-top-1'); ?>
                </div>
            <?php endif; ?>
            <?php if( is_active_sidebar('header-top-2')) : ?>
                <div class="col-md-6">
                    <?php dynamic_sidebar('header-top-2'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!--begin-->
<section id="header" class="site-header <?php if(zura_theme_data('menu_sticky') == 1) esc_html_e('header-sticky', 'zura'); ?>">
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
                <div id="search-form">
                    <form action="#" class="form-search">
                        <input type="text" name="key" class="search-text" placeholder="Search..." />
                        <input type="submit" name="ok" class="search-submit" value="GO" />
                    </form>
                    <span class="btn-search"><i class="fa fa-search"></i></span>
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
</section><!-- End #header -->