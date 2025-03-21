<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="header">
		<div class="is-flex wrapper">
			<div class="header__logo">
				<?php the_custom_logo(); ?>
			</div>
			<div class="header__links">
				<?php if( get_field('phone_number', 'option') ): ?>
					<div class="header__toplinks headline--md">
						<a href="tel:<?php the_field('phone_number', 'option'); ?>"><?php the_field('phone_number', 'option'); ?></a>
					</div>
				<?php endif; ?>
				<div class="menu-toggle menu-toggle__button not-active">
					<div class="">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
				<nav id="site-navigation" class="main-navigation">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					); ?>
				</nav>
			</div>

		</div>
	</header>
