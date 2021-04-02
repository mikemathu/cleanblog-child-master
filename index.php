<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Clean Blog Child
 */

get_header(); ?>

  <div class="push-content-to-left col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-1">

		<?php do_action( 'cleanblog_index_top' ); ?>

		<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				<!-- </div> -->
		<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

			<!-- Pagination -->
			<div class="page-navi meta">
				<?php
						if(get_next_posts_link() ) {
						echo '<div class="prev">'. get_next_posts_link('<i class="budicon-arrow-left-1"></i> '. esc_html__('Older Posts', 'njengah')) .'
						</div>';
						}
						
						njengah_number_pagination(); 

						if (get_previous_posts_link() ){
						echo '<div class="next">'. get_previous_posts_link(esc_html__('Newer Posts', 'njengah'). ' <i class="budicon-arrow-right-1"></i>').'
						</div>';
						}
				?>
</div>
		
	</div>
	<!-- /.col-lg-8.col-lg-offset-2.col-md-10.col-md-offset-1 -->

	<div class="side-bar col-lg-4 col-md-4">
		<?php get_sidebar();?>
	</div> 	<!-- side-bar col-lg-4 -->
<?php get_footer(); ?>
