<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package rmcr
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'rmcr' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<img class="header-bg"
		     src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/large2.jpg"
		     alt=""/>

		<div class="container">
			<div class="site-branding row">
				<div class="col-md-2">
					<a href="<?php echo home_url(); ?>">
						<img class="header-logo"
						     src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logo_main.png"
						     alt="<?php bloginfo( 'name' ); ?>">
					</a>
				</div>
				<div class="col-md-10">
					<?php
					wp_nav_menu( array(
						'container'       => 'nav',
						'container_class' => 'navbar navbar-default',
						'theme_location'  => 'primary',
						'menu_class'      => 'nav nav-pills',
						'depth'           => 3,
						'fallback_cb'     => false,
						'walker'          => new RMCR_Nav_Walker(),
					) ); ?>
				</div>


				<!--				<h1 class="site-title"><a href="-->
				<?php //echo esc_url( home_url( '/' ) ); ?><!--"-->
				<!--				                          rel="home">-->
				<?php //bloginfo( 'name' ); ?><!--</a></h1>-->
			</div>

		</div>
	</header>
	<!-- #masthead -->

	<div id="wrapper" class="site-content container">
