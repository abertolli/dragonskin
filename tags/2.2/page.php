<?php get_header(); ?>

<!--include sidebar-->
<?php include(TEMPLATEPATH."/sidebar.php"); ?>

<div id="content">
<!--single.php-->

<!--loop-->			
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!--post title-->
			<h1 id="post-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h1>

			<?php edit_post_link("Edit this page", "<div align=\"right\"", "</div>"); ?>

	<div class="postspace2">
	</div>			
                       <!--for paginate posts-->
			<?php wp_link_pages('before=<p align="right"><strong>Pages:</strong> &after= </p>'); ?>

<!--content with more link-->
			<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
	
                       <!--for paginate posts-->
			<?php wp_link_pages('before=<p align="right"><strong>Pages:</strong> &after= </p>'); ?>

<p class="author">Last modified on <?php the_modified_time('F j, Y'); ?></p>

<!-- Post Meta
<?php the_meta(); ?>
-->

<div class="postspace">
	</div>
                                <!--all options over and out-->


        <!--include comments template-->
        <?php comments_template(); ?>

<!--do not delete-->
<?php endwhile; else: ?>
	
Sorry, no posts matched your criteria.

<!--do not delete-->
<?php endif; ?>
	
<!--single.php end-->
</div>


<!--include footer-->
<?php get_footer(); ?>
