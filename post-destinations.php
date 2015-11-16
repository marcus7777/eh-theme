<?php
/*
Template Name: Map Archive
*/
?>
 
<?php
global $posts;
$posts = get_posts('numberposts=-1');
?>
 
<?php get_header(); ?>
 
<div id="content">
 
   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 
   <div class="post" id="post-<?php the_ID(); ?>">
      <h2><?php the_title(); ?></h2>
      <div class="entry">
         <?php if ( isset($wpgeo) ) $wpgeo->categoryMap(); ?>
         <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
      </div>
   </div>
 
   <?php endwhile; endif; ?>
 
</div>