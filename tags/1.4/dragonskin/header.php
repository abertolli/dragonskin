<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php bloginfo('name'); ?> <?php wp_title('-'); ?></title>
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico">

	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>
<body>

<div id="header">
<div align="center">
<?php
if (is_readable(get_stylesheet_directory()."/images/header.gif")) { ?>
	<a href="<?php bloginfo('url'); ?>/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/header.gif" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" border="0" /></a>
<?php } else { ?>
	<h1><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>
	<p><?php bloginfo('description'); ?></p>
<?php } ?>

<?php
if (is_readable(TEMPLATEPATH."/navbar.php")) {
	// Create the navbar
?>

<!-- Son of Suckerfish -->
<table><tr><td>
<script type="text/javascript"><!--//--><![CDATA[//><!--
sfHover = function() {
	var sfEls = document.getElementById("nav").getElementsByTagName("LI");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);
//--><!]]></script>

<br />
<?php include(TEMPLATEPATH."/navbar.php"); ?>
<br />
</td></tr></table>

<?php
} // End check for navbar.php
?>

<?php include (TEMPLATEPATH . '/searchform.php'); ?>
<br />

</div>

</div>


<div id="container">


<!--header.php end-->
