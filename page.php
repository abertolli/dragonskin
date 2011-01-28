<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();

?>

	<div id="content" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2>
			<a href="<?php the_permalink() ?>" rel="bookmark">
			<?php trim(get_the_title()) == "" ? the_date():the_title(); ?>
			</a>
			</h2>

			<?php edit_post_link('Edit','<small>','</small>'); ?>

			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
			</div>

			<div class="postfooter">
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
		</div>
		<?php endwhile; endif; ?>

	<div class="postspace"></div>

	<?php if (comments_open()) comments_template(); ?>
	
	</div>

<?php
get_sidebar();
get_footer();
?>
