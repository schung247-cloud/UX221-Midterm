<?php
/**
 * @package ChristmasPress
 * @since ChristmasPress 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<!-- Title tag is now handled via add_theme_support('title-tag') in functions.php -->
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
// Site icons are now handled via the WordPress Customizer (Appearance > Customize > Site Identity).
?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'christmaspress' ); ?></a>

<?php wp_body_open(); ?>
<div id="page" class="hfeed site">
	<header id="header-wrapper" role="banner">
		<div id="header">
			<div id="website-name" class="website-name">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>
				<div class="slogan"><?php bloginfo('description'); ?></div>
			</div>
		</div>
	</header>
	<div id="main-nav" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</div>
<div id="main" class="site-main">
