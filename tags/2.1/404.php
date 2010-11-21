<?php get_header(); ?>

<!--create your own error 404 page-->
<!--include sidebar-->
<?php include(TEMPLATEPATH."/sidebar.php"); ?>

<div id="content">

<h1>Page Not Found</h1>

<p>Maybe you were looking for one of these?</p>
            <p>&nbsp;</p>
<div class="postspace2">
	</div>			

<?php

if(function_exists("smart404_has_suggestions") && smart404_has_suggestions()) {
	smart404_loop();
	while (have_posts()) : the_post();
	?>
	        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <?php
		the_excerpt();
	endwhile;
} else {

?>

<h3> Pages </h3>
      <ul>
         <?php wp_list_pages('title_li=&depth=1'); ?>
      </ul>

<h3> Topics </h3>
      <ul>
         <?php wp_list_cats('sort_column=name'); ?>
      </ul>

<!--
<h3> Authors </h3>
      <ul>
         <?php wp_list_authors(); ?>
      </ul>

<h3> Recent Articles </h3>
      <ul>
         <?php get_archives('postbypost', 4); ?>
      </ul>

<h3> Site Tools </h3>

      <ul>
         <?php wp_register(); ?>
         <li><?php wp_loginout(); ?></li>
         <?php wp_meta(); ?>
      </ul>
-->


<?php

}

?>

</div>

<!--include footer-->
<?php get_footer(); ?>

