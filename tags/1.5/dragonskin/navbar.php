<!-- begin navbar.php -->

<ul id="nav">
   <li><div class="menu"> Pages </div>
      <ul>
         <?php wp_list_pages('title_li=&depth=1'); ?>
      </ul>
   </li>

   <li><div class="menu"> Topics </div>
      <ul>
         <?php wp_list_categories('orderby=name&title_li=0&hierarchical=0'); ?>
      </ul>
   </li>

   <li><div class="menu"> Authors </div>
      <ul>
         <?php wp_list_authors(); ?>
      </ul>
   </li>
   <li><div class="menu"> Recent Articles</div>
      <ul>
         <?php wp_get_archives('type=postbypost&limit=4'); ?>
      </ul>
   </li>
   <li><div class="menu"> User </div>
      <ul>
         <?php wp_register(); ?>
         <li><?php wp_loginout(); ?></li>
         <?php wp_meta(); ?>
      </ul>
   </li>
</ul>

<!-- end navbar.php -->
