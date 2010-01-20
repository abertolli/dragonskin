<div id="sidebar">

<!--sidebar.php-->

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>

<!--
	<h2>About Me</h2>
		<p>Put something about you here by editing the right sidebar.</p>
-->
<ul>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
</ul>

<h2> Site Menu </h2>

	<ul>
		<?php wp_list_pages('title_li=&depth=1'); ?>

	</ul>

<!--list of categories, order by name, without children categories, no number of articles per category-->
		<h2>Categories</h2>			
		<ul><?php wp_list_categories('orderby=name'); ?>
		</ul>

<!--list of authors-->
		<h2>Authors</h2>
		<ul>
		<?php wp_list_authors('show_fullname=1&optioncount=1'); ?>
		</ul>

<!--recent posts-->
	<h2>Recent Articles</h2>
	<ul>
	<?php wp_get_archives('type=postbypost&limit=10'); ?>
	</ul>

<!--archives ordered per month-->
		<h2>Archives</h2>
		<ul>
		<?php wp_get_archives('type=monthly'); ?>
		</ul>

<?php wp_list_bookmarks(); ?>

<?php endif; ?>

</div>
