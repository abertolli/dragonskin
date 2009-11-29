<div class="clear_content"></div>

</div>

<div id="footer">

<p class="credit">
<!--
<?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds.
<?php echo sprintf(__("Powered by <a href='http://wordpress.org/' title='%s'><strong>WordPress</strong></a>"), __("Powered by WordPress, state-of-the-art semantic personal publishing platform.")); ?>
-->

<?php /*
Please leave the link to let people know where to get this theme, or provide a link in your blogroll.
*/ ?>

<br />

<a href="http://wordpress.org/"><img src="<?php echo bloginfo('template_url'); ?>/images/wordpress-80x15.png" alt="Powered by WordPress" border="0" /></a>
<a href="http://bitfreedom.com/dragonskin/"><img src="<?php echo bloginfo('template_url'); ?>/images/dragonskin-80x15.png" alt="Download the Dragonskin Theme" border="0" /></a>
<!--
<a href="http://heroesonly.com/"><img src="<?php echo bloginfo('template_url'); ?>/images/heroesonly-80x15.png" alt="Theme created by Heroes Only" border="0" /></a>
-->
</p>

</div>

<?php wp_footer(); ?>

<?php if (is_readable(TEMPLATEPATH."/clickheat.php")) include(TEMPLATEPATH."/clickheat.php"); ?>

</body>
</html>
