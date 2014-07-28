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

<!--		<img class="header-bg"-->
<!--		     src="--><?php //bloginfo( 'stylesheet_directory' ); ?><!--/images/large2.jpg"-->
<!--		     alt=""/>-->

		<div class="container">
			<div class="site-branding row">
				<div class="col-md-4">
					<a href="<?php echo home_url(); ?>">
						<div style="max-height: 120px;overflow-y:hidden;overflow-x:visible;">
							<img class="header-logo"
							     src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logo-main.png"
							     alt="<?php bloginfo( 'name' ); ?>">
						</div>
					</a>
				</div>
				<div class="col-md-8">
					<nav class="sub-nav">
						<ul>
							<li>
								<a href="<?php echo home_url('about-us'); ?>">About Us</a>
							</li>
							<li>
								<a href="<?php echo home_url('events'); ?>">Events</a>
							</li>
							<li>
								<a href="<?php echo home_url('contact-us'); ?>">Contact Us</a>
							</li>
							<li>
								<?php if($num_products = count($_SESSION['simpleCart'])) : ?>
									<a href="<?php echo home_url('rmcr-store/cart'); ?>">Shopping Cart (<?php echo $num_products; ?>)</a>
								<?php else: ?>
									<a href="<?php echo home_url('rmcr-store/cart'); ?>">Shopping Cart</a>
								<?php endif; ?>
							</li>
						</ul>

					</nav>
					<?php
					wp_nav_menu( array(
						'container'       => 'nav',
						'container_class' => 'navbar navbar-default',
						'theme_location'  => 'primary',
						'menu_class'      => 'nav pull-right',
						'depth'           => 3,
						'fallback_cb'     => false,
						'walker'          => new RMCR_Nav_Walker(),
					) );
					?>

					<!--					<nav class="navbar navbar-default">-->
					<!--						<ul id="menu-main-menu" class="nav nav-pills">-->
					<!--							<li id="menu-item-14425"-->
					<!--							    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-14425 dropdown"-->
					<!--							    data-dropdown="dropdown"><a title="Adopt Cocker Spaniel"-->
					<!--							                                href="http://local.rmcr.org/dog-adoption/"-->
					<!--							                                class="dropdown-toggle" data-toggle="dropdown">Adopt <b-->
					<!--										class="caret"></b></a>-->
					<!--								<ul class="dropdown-menu">-->
					<!--									<li id="menu-item-14426"-->
					<!--									    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14426">-->
					<!--										<a href="http://local.rmcr.org/dog-adoption/adopt-rescued-cocker-spaniels/">Adopt-->
					<!--											Rescued Cocker Spaniels</a></li>-->
					<!--									<li id="menu-item-14427"-->
					<!--									    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14427">-->
					<!--										<a href="http://local.rmcr.org/dog-adoption/cocker-spaniel-sidelined-stars/">Cocker-->
					<!--											Spaniel Sidelined Stars</a></li>-->
					<!--									<li id="menu-item-14428"-->
					<!--									    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14428">-->
					<!--										<a href="http://local.rmcr.org/dog-adoption/successful-cocker-spaniel-adoptions/">Successful-->
					<!--											Cocker Spaniel Adoptions</a></li>-->
					<!--									<li id="menu-item-14429"-->
					<!--									    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14429">-->
					<!--										<a href="http://local.rmcr.org/dog-adoption/adoption-information/">How to Adopt-->
					<!--											A Dog</a></li>-->
					<!--								</ul>-->
					<!--							</li>-->
					<!--							<li id="menu-item-14305"-->
					<!--							    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14305"><a-->
					<!--									href="http://local.rmcr.org/front-page/about-us/">About Us</a></li>-->
					<!--							<li id="menu-item-14307"-->
					<!--							    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14307"><a-->
					<!--									href="http://local.rmcr.org/rmcr-store/">RMCR Store</a></li>-->
					<!--							<li id="menu-item-14430"-->
					<!--							    class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-menu-ancestor current-menu-parent current-page-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-14430 dropdown active"-->
					<!--							    data-dropdown="dropdown"><a href="http://local.rmcr.org/ways-to-help/"-->
					<!--							                                class="dropdown-toggle" data-toggle="dropdown">Ways To Help-->
					<!--									<b class="caret"></b></a>-->
					<!--								<ul class="dropdown-menu">-->
					<!--									<li id="menu-item-14433"-->
					<!--									    class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-14275 current_page_item menu-item-14433 active">-->
					<!--										<a href="http://local.rmcr.org/ways-to-help/donate/">Donate to RMCR</a></li>-->
					<!--									<li id="menu-item-14432"-->
					<!--									    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14432">-->
					<!--										<a href="http://local.rmcr.org/ways-to-help/volunteer/">Volunteer</a></li>-->
					<!--									<li id="menu-item-14431"-->
					<!--									    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14431">-->
					<!--										<a href="http://local.rmcr.org/ways-to-help/foster-home/">Foster Home</a></li>-->
					<!--								</ul>-->
					<!--							</li>-->
					<!--							<li id="menu-item-14308"-->
					<!--							    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14308"><a-->
					<!--									href="http://local.rmcr.org/contact-us/">Contact Us</a></li>-->
					<!--							<li class="pull-right">-->
					<!--								<a href="-->
					<?php //echo get_home_url( null, 'ways-to-help/donate' ); ?><!--">-->
					<!--									<img src="-->
					<?php //bloginfo( 'stylesheet_directory' ); ?><!--/images/donation-button.png"-->
					<!--									     alt=""/>-->
					<!--								</a>-->
					<!--							</li>-->
					<!--						</ul>-->
					<!--					</nav>-->
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
