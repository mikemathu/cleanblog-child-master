<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bullson_Media
 */

if ( ! is_active_sidebar( 'My-Custom-Sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'My-Custom-Sidebar' ); ?>
</aside><!-- #secondary -->

</div>
