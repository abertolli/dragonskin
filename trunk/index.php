<?php get_header(); ?>

<!--include sidebar-->
<?php get_sidebar();?>

<?php // query_posts($query_string . '&orderby=modified&order=desc' ); ?>

<div id="content">
	<!--index.php-->
        <!--the loop-->
	<?php if (have_posts()) : ?>
		<!--the loop-->
		<?php while (have_posts()) : the_post(); ?>
				<div>
			<!--post title as a link-->
				<h2 <?php post_class() ?> id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>

	<?php edit_post_link("Edit this post", "<div align=\"right\">", "</div>"); ?>

	<?php if(function_exists("coauthors")) {
		// Support for coauthors plugin
	?>
		<p class="author">By <?php coauthors(); ?> on <?php the_time('F j, Y'); ?> </p>
	<?php } else { ?>
		<p class="author">Posted by <?php the_author(); ?> on <?php the_time('F j, Y'); ?> </p>
	<?php } ?>
		<div class="postspace2">
	</div>	
				<!--post text with the read more link-->
					<p> <?php the_content('See the rest of this entry...'); ?> </p>

				<!--show categories, edit link ,comments-->
				<p>
				<b>Topics:</b> <?php the_category(', ') ?> |
				<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> </p>
				</div>
	<div class="postspace">
	</div>

	        <!--end of one post-->
		<?php endwhile; ?>

		<!--navigation-->
		<?php previous_posts_link('&laquo; Previous Entries') ?>
                <?php next_posts_link('Next Entries &raquo;') ?>
		
	<!--do not delete-->
	<?php else : ?>

		Not Found
		Sorry, but you are looking for something that isn't here.
		<?php get_template_part('searchform'); ?>
        <!--do not delete-->
	<?php endif; ?>

<!--index.php end-->
</div>
	

<!--include footer-->
<?php get_footer(); ?>
