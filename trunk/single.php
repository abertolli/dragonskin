<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<div id="content" class="widecolumn" role="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<h1><a href="<?php the_permalink() ?>" rel="bookmark">
		<?php trim(get_the_title()) == "" ? the_date():the_title(); ?></a>
		</h1>


		<div class="entry">
			<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
		</div>

		<div class="postspace"></div>
		<p> By
		<?php
		if(function_exists('coauthors_posts_links')) {
			// Support for coauthors plugin
			coauthors_posts_links();
		} else {
			// If coauthors isnt installed
			$curauth = $wp_query->get_queried_object();
			if (trim(str_replace("http://","",$curauth->user_url))) {
				the_author_link();
			} else {
				the_author_posts_link();
			}
		} // End coauthors test ?>
		on <?php the_date();
		?>
		<br />
		<?php
		if (get_the_modified_time() != get_the_time()) {
			echo "Last modified on ";
			the_modified_time('F j, Y');
		}
		?>
		</p>

		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		<p><b>Categories:</b> <?php the_category(', ') ?> </p>
		<?php the_tags( '<p><b>Tags:</b> ', ', ', '</p>'); ?>

	</div>

	<div class="postspace"></div>
	<?php comments_template(); ?>

<?php endwhile; else: ?>

	<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>

<?php
get_sidebar(); 
get_footer();
?>
