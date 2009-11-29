<?php get_header(); ?>

<!--include sidebar-->
<?php include(TEMPLATEPATH."/sidebar.php"); ?>

<div id="content">
<!--single.php-->

<!--loop-->			
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!--post title-->
			<h1 id="post-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h1>


	<?php edit_post_link("Edit this post", "<div align=\"right\">", "</div>"); ?>

	<?php if(function_exists('the_ratings')) { the_ratings(); } ?>

	<?php if(function_exists('coauthors_posts_links')) {
		// Support for coauthors plugin
	?>
		<p class="author">
		By <?php coauthors_posts_links(); ?> on <?php the_time('F j, Y'); ?>
		</p>
	<?php } else {
		// Original section if coauthors isnt installed
		global $wp_query;
		$curauth = get_userdata($wp_query->get_queried_object()->post_author); // Magick
	?>
		<p class="author">
		Posted by
                <?php if (trim(str_replace("http://","",$curauth->user_url))) {
			the_author_link();
		} else {
			the_author_posts_link();
		} ?>
                on <?php the_time('F j, Y'); ?>
		</p>
	<?php } // End coauthors test ?>

	<div class="postspace2">
	</div>


                       <!--for paginate posts-->
			<?php wp_link_pages('before=<p align="right"><strong>Pages:</strong> &after= </p>'); ?>


<!--content with more link-->
			<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
	
                       <!--for paginate posts-->
			<?php wp_link_pages('before=<p align="right"><strong>Pages:</strong> &after= </p>'); ?>

<p class="author">
Last modified on <?php the_modified_time('F j, Y'); ?>
</p>

<p><b>Categories:</b> <?php the_category(', ') ?> <br />
<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

<!-- Post Meta
<?php the_meta(); ?>
-->

<!--navigation-->
<p><?php previous_post_link('&laquo; %link  |') ?>  <a href="<?php bloginfo('url'); ?>">Home</a>  <?php next_post_link('|  %link &raquo;') ?></p>

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
