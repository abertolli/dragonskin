<!--create the searchfield-->
<br />
<div>
<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" alt="search" size="60" />
<input type="submit" id="searchsubmit" value="Search" />
</form>

<?php if (function_exists("matt_random_redirect")) { ?>
<form method="get" id="randompage" action="<?php bloginfo('home'); ?>/">
<input type="hidden" name="random" value="" />
<input type="submit" id="randomsubmit" value="Random" />
</form>
<?php } ?>
</div>
<!--searchform.php end-->
