<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php bloginfo('name'); ?> <?php wp_title('-'); ?></title>
	<?php if (is_readable(get_stylesheet_directory()."/favicon.ico")) { ?>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
	<?php } ?>

	<style type="text/css" media="screen">
	@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="header">
<div align="center">
<?php
if (is_readable(get_stylesheet_directory()."/images/header.gif")) { ?>
	<a href="<?php echo home_url(); ?>/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header.gif" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" border="0" /></a>
<?php } elseif (get_header_image() != "") { ?>
	<a href="<?php echo home_url(); ?>/"><img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" border="0" /></a>
<?php } else { ?>
	<h1><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
	<p><?php bloginfo('description'); ?></p>
<?php } ?>

<?php if (is_readable(get_stylesheet_directory()."/navbar.php")) get_template_part('navbar'); ?>

<?php get_search_form(); ?>

<br />

</div>

</div>

<div id="container">

<div class="border"></div>


<!--header.php end-->
