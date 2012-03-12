<?php get_header(); ?>


<?php // query_posts($query_string . '&orderby=modified&order=desc' ); ?>

<div id="content">
	<!--index.php-->
        <!--the loop-->
	<?php if (have_posts()) : ?>
		<!--the loop-->
		<?php while (have_posts()) : the_post(); ?>
				<div>
			<!--post title as a link-->
			<h2  <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php
			if (trim(get_the_title()) == "") {
			?>
				<a href="<?php the_permalink(); ?>"><?php the_date(); ?></a>
			<?php
			} else {
			?>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<?php
			}
			?>
			</h2>
	<p class="author"> By
	<?php
	// Support for coauthors plugin
	function_exists("coauthors") ?  coauthors() : the_author();
	?>
	on <?php the_time('F j, Y'); ?>
	</p>


	<div class="postspace2"> </div>	
				<!--post text with the read more link-->
					<p> <?php the_content('See the rest of this entry...'); ?> </p>
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				<!--show categories, edit link ,comments-->
				<p style="clear: left;">
				<b>Topics:</b> <?php the_category(', ') ?> |
				<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> </p>
				</div>
	<div class="postspace"> </div>

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
	

<?php get_sidebar();?>
<?php get_footer(); ?>
