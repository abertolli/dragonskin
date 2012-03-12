<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

	<div id="content" class="widecolumn" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2>
			<a href="<?php the_permalink() ?>" rel="bookmark">
			<?php trim(get_the_title()) == "" ? the_date():the_title(); ?>
			</a>
			</h2>

			<p class="author"> By
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
			</p>


			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
			</div>

			<div class="postspace"></div>
			<div class="postfooter">
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<p class="author">
				<?php
				if (get_the_modified_time() != get_the_time()) {
					echo "Last modified on ";
					the_modified_time('F j, Y');
				}
				?>
				</p>
				<p><b>Categories:</b> <?php the_category(', ') ?> </p>
				<?php the_tags( '<p><b>Tags:</b> ', ', ', '</p>'); ?>

				<div class="postspace"></div>
				<small>
					You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.

					<?php if ( comments_open() && pings_open() ) {
						// Both Comments and Pings are open ?>
						You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

					<?php } elseif ( !comments_open() && pings_open() ) {
						// Only Pings are Open ?>
						Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

					<?php } elseif ( comments_open() && !pings_open() ) {
						// Comments are open, Pings are not ?>
						You can skip to the end and leave a response. Pinging is currently not allowed.

					<?php } elseif ( !comments_open() && !pings_open() ) {
						// Neither Comments, nor Pings are open ?>
						Both comments and pings are currently closed.

					<?php } ?>

				</small>
			</div>

		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>

<?php
get_sidebar(); 
get_footer();
?>
