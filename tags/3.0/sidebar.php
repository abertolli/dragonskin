<div id="sidebar">

<!--sidebar.php-->

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>

<ul>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
</ul>

<?php endif; ?>

</div>
