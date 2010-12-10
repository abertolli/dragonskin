<?php get_header(); ?>

<!--include sidebar-->
<?php get_sidebar(); ?>

<div id="content">

<div class="author">
<h2><!-- Author Profile --></h2>

<div class="boxed">
<h3><?php the_author_meta('display_name',$author); ?></h3>

<?php if (trim(get_the_author_meta('description',$author))) { ?>
   <p><?php the_author_meta('description',$author); ?></p>
<?php } ?>

<ul>
<?php
$url = trim(get_the_author_meta('user_url',$author));
if (str_replace("http://","",$url)) { ?>
   <li><span>Website:</span>  <a href="<?php echo $url; ?>"><?php echo $url; ?></a></li>
<?php } ?>

<?php
$aim = trim(get_the_author_meta('aim',$author));
if ($aim) { ?>
   <li><span>AIM:</span> <a href="aim:<?php echo $aim; ?>" alt="aim" title="AIM"><?php echo $aim; ?></a></li>
<?php } ?>

<?php
$yim = trim(get_the_author_meta('yim',$author));
if ($yim) { ?>
   <li><span>Yahoo:</span> <a href="ymsgr:<?php echo $yim; ?>" alt="yahoo" title="Yahoo"><?php echo $yim; ?></a></li>
<?php } ?>

<?php
$jabber = trim(get_the_author_meta('jabber',$author));
if (trim(strpos($jabber,"@gmail.com"))) { 
   // Not sure if gtalk: requires @gmail.com, err on the side against spam
   $gtalk = trim(str_replace("@gmail.com","",$jabber)); ?>
   <li><span>Google:</span> <a href="gtalk:chat?jid=<?php echo $gtalk; ?>" alt="google" title="Google"><?php echo $gtalk; ?></a></li>
<?php } elseif (trim($jabber)) { ?>
   <li><span>Jabber:</span> <a href="xmpp:<?php echo $jabber; ?>" alt="jabber" title="Jabber"><?php echo $jabber; ?></a></li>
<?php } ?>

</ul>
</div>

<div class="boxed">
<h3>Articles by <?php the_author_meta('display_name',$author); ?></h3>
<ul>
<!-- The Loop -->

<?php
query_posts("author=$author&posts_per_page=-1"); // This gets all posts by author
if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
  <li>
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo strip_tags(get_the_excerpt()); ?>">
<?php the_title(); ?></a> 
(<?php the_date(); ?> in <?php the_category(', ');?>)
  </li>

  <?php endwhile; else: ?>
     <p><?php _e('No posts by this author.'); ?></p>

	<?php endif; ?>
<!-- End Loop -->
</ul>

               <!-- navigation-->
		<p>
		<?php previous_posts_link('&laquo; Previous') ?>
		<?php next_posts_link('Next &raquo;') ?>
		</p>

</div>

</div>


		<?php if (have_posts()) :
			query_posts("author=$author&posts_per_page=1");
			$post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

                <!--loop article begin-->

		<?php while (have_posts()) : the_post(); ?>
		                <!--post title as a link-->
<div class="postspace3">
	</div>	
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                <!--post time-->
				<b><?php the_date(); ?></b>
				
			<!--optional excerpt or automatic excerpt of the post-->
				<?php global $more; $more=1; the_content(); ?>
			
	       <!--one post end-->
		<?php endwhile; ?>
                
               <!-- navigation-->
		<p>
		<?php previous_posts_link('&laquo; Previous') ?>
		<?php next_posts_link('Next &raquo;') ?>
		</p>


   <?php else : ?>
      <p>No posts by this author</p>
   <?php endif; ?>

</div>

<!--include footer-->
<?php get_footer(); ?>
