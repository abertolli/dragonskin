<?php get_header(); ?>

<!--include sidebar-->
<?php include(TEMPLATEPATH."/sidebar.php"); ?>

<div id="content">

<?php 
if(isset($_GET['author_name'])) :
	$curauth = get_userdatabylogin($author_name);
else :
	$curauth = get_userdata(intval($author));
endif;
?>

<div class="author">
<h2><?php echo $curauth->nickname; ?></h2>

<div class="boxed">
<h3>About</h3>

<?php if (trim($curauth->description)) { ?>
   <p><?php echo $curauth->description; ?></p>
<?php } else { ?>
   <p><?php echo $curauth->nickname; ?> is an author at <a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a>.</p>
<?php } ?>

<ul>
<?php if (trim(str_replace("http://","",$curauth->user_url))) { ?>
   <li><span>Website:</span>  <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></li>
<?php } ?>

<?php if (trim($curauth->aim)) { ?>
   <li><span>AIM:</span> <a href="aim:<?php echo $curauth->aim; ?>" alt="aim" title="AIM"><?php echo $curauth->aim; ?></a></li>
<?php } ?>

<?php if (trim($curauth->yim)) { ?>
   <li><span>Yahoo:</span> <a href="ymsgr:<?php echo $curauth->yim; ?>" alt="yahoo" title="Yahoo"><?php echo $curauth->yim; ?></a></li>
<?php } ?>

<?php if (trim(strpos($curauth->jabber,"@gmail.com"))) { 
   // Not sure if gtalk: requires @gmail.com, err on the side against spam
   $gtalk = trim(str_replace("@gmail.com","",$curauth->jabber)); ?>
   <li><span>Google:</span> <a href="gtalk:chat?jid=<?php echo $gtalk; ?>" alt="google" title="Google"><?php echo $gtalk; ?></a></li>
<?php } elseif (trim($curauth->jabber)) { ?>
   <li><span>Jabber/Google Talk:</span> <a href="xmpp:<?php echo $curauth->jabber; ?>" alt="jabber" title="Jabber"><?php echo $curauth->jabber; ?></a></li>
<?php } ?>
</ul>
</div>

<div class="boxed">
<h3>Articles by <?php echo $curauth->nickname; ?></h3>
<ul>
<!-- The Loop -->

<?php query_posts("author=$curauth->ID&posts_per_page=50"); // This sets "Articles by" section - set to a high number?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <li>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
<?php the_title(); ?></a>, 
<?php the_time('d M Y'); ?> in <?php the_category('&');?>
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
			query_posts("author=$curauth->ID&posts_per_page=".get_option('posts_per_page'));
			$post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

                <!--loop article begin-->

		<?php while (have_posts()) : the_post(); ?>
		                <!--post title as a link-->
<div class="postspace3">
	</div>	
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                <!--post time-->
				<b><?php the_time('l, F jS, Y') ?></b>
				
			<!--optional excerpt or automatic excerpt of the post-->
				<?php the_excerpt(); ?>
			
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
