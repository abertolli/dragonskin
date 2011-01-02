<!--create the searchfield-->
<br />
<div>
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" alt="search" size="60" />
<input type="submit" id="searchsubmit" value="Search" />
</form>

<?php if (function_exists("matt_random_redirect")) { ?>
<form method="get" id="randompage" action="<?php bloginfo('url'); ?>/">
<input type="hidden" name="random" value="" />
<input type="submit" id="randomsubmit" value="Random" />
</form>
<?php } ?>
</div>
<!--searchform.php end-->
