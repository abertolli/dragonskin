<?php get_header(); ?>
<?php get_sidebar(); ?>

<!--create your own error 404 page-->
<!--include sidebar-->
<div id="content">

<h1>Page Not Found</h1>

<div class="postspace2"> </div>			

<?php

if(function_exists("smart404_has_suggestions") && smart404_has_suggestions()) {
	echo "<p>Maybe you were looking for one of these?</p>";
	smart404_loop();
	while (have_posts()) : the_post();
	?>
	        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <?php
		the_excerpt();
	endwhile;
}

?>

</div>

<!--include footer-->
<?php get_footer(); ?>

