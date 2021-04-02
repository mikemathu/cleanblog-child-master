<?php
/**
 * Template part for displaying posts.
 *
 * @package Clean Blog
 */

?>

<div <?php post_class( 'post-preview' ); ?> id="post-<?php the_ID(); ?>">
	<?php the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	
    <?php 
    // check if the post has a Post Thumbnail assigned to it.
        if ( has_post_thumbnail() ) {
            the_post_thumbnail();
        } 
    ?>
   
   
</div>
<!-- /.post-preview -->

<div class="below-thumbnail">
<ul>
  <li><a class="permalink"  href="<?php the_permalink() ?>">Read More</a> </li>
  <li class="read-time"> <?php post_read_time(); ?></li>
</ul>

    

    <?php //echo reading_time(); ?>
   
</div>

<!-- <hr> -->
