<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
get_sidebar();

?>

	<div id="content" class="narrowcolumn" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2>
		<?php
		if (trim(get_the_title()) == "") {
		?>
			<a href="<?php the_permalink(); ?>"><?php the_date(); ?></a>
		<?php
		} else {
			the_title();
		}
		?>
		</h2>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>

	<div class="postspace"></div>

	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
	<?php comments_template(); ?>
	
	</div>


<?php get_footer(); ?>
