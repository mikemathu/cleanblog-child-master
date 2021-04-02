<?php
/**
 * The template for displaying all single posts.
 *
 * @package Clean Blog
 */

get_header(); ?>

	<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

		<?php do_action('cleanblog_single_top'); ?>

		<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', 'single' ); ?>

		<div class="postfooter">
			<?php cleanblog_entry_footer(); ?>
		</div>
		<!-- /.postfooter -->

		<!-- Similar posts Suggestion-->
		<h3>Related posts</h3>
		<div class="relatedposts">
				<?php
				$orig_post = $post;
				global $post;
				$categories = get_the_category($post->ID);
				
				// if ($tags) {
				if ($categories) {
					$category_ids = array();
					foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
					$args=array(

					'category__in' => $category_ids,
					'post__not_in' => array($post->ID),
					'posts_per_page'=> 4, // Number of related posts that will be shown.
					'ignore_sticky_posts'=>1
					);
					
					$my_query = new wp_query( $args );
					
					while( $my_query->have_posts() ) {
					$my_query->the_post();
				?>
				
				<div class="relatedthumb">
					<a rel="nofollow" target="_blank" href="<? the_permalink()?>"><?php the_post_thumbnail(array(150,100)); ?><br />
					<?php the_title(); ?>
					</a>
				</div>
				
				<?php }
			}
			$post = $orig_post;
			wp_reset_query();
  				?>
		</div>

		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>

		<?php endwhile; // End of the loop. ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

        <?php do_action( 'cleanblog_single_bottom' ); ?>  

	</div>
    <!-- /.col-lg-8.col-lg-offset-2.col-md-10.col-md-offset-1 -->

<?php get_footer(); ?>