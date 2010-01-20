<?php get_header(); ?>

<!--include sidebar-->
<?php include(TEMPLATEPATH."/sidebar.php"); ?>

<div id="content">
<!--search.php-->

        <!--loop-->
	<?php if (have_posts()) : ?>

		<h2>Search Results</h2>
		
                <!--loop-->
		<?php while (have_posts()) : the_post(); ?>
				
			        <!--permalink of the post title-->
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
                                <br />(Posted in <?php the_category(', ') ?>)
		
	        <!--loop-->
		<?php endwhile; ?>

		<!--to create links for the previous entries or the next-->
                <p>
		<?php previous_posts_link('&laquo; Previous Entries') ?> ...
		<?php next_posts_link('Next Entries &raquo;') ?>
		</p>
	
        <!--necessary do not delete-->
	<?php else : ?>

		<h2>No articles found</h2>
		<p>
		Try a different search?
                <!--include searchform-->
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</p>
        <!--do not delete-->
	<?php endif; ?>
		
</div>
<!--search.php end-->

<!--include footer-->
<?php get_footer(); ?>
