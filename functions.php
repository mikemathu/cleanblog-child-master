<?php
/**
 * Clean Blog Child Theme Functions
 *
 * @link              http://www.deviodigital.com
 * @since             1.0.0
 * @package           cleanblog-child
 *
 */

/*
 * Enqueue the parent style.css
 *
 */
add_action( 'wp_enqueue_scripts', 'cleanblog_theme_enqueue_styles' );
function cleanblog_theme_enqueue_styles() {

    // Parent style variable
    $parent_style = 'cleanblog-parent-style';
    // Enqueue Parent theme's style
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

    // Enqueue Child theme's style and ensure it is
    // Setting 'parent-style' as a dependency will ensure that the child theme stylesheet loads after it.
    wp_enqueue_style( 'cleanblog-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
}

/*
 * Action hooks
 * 
 * @since  1.0.0
 *
 */

// 404.php TOP
function cleanblogchild_404_top() {
}
add_action('cleanblog_404_top','cleanblogchild_404_top');

// 404.php BOTTOM
function cleanblogchild_404_bottom() {
}
add_action('cleanblog_404_bottom','cleanblogchild_404_bottom');

// archive.php TOP
function cleanblogchild_archive_top() {
}
add_action('cleanblog_archive_top','cleanblogchild_archive_top');

// archive.php BOTTOM
function cleanblogchild_archive_bottom() {
}
add_action('cleanblog_archive_bottom','cleanblogchild_archive_bottom');

// footer.php TOP
function cleanblogchild_footer_top() {
}
add_action('cleanblog_footer_top','cleanblogchild_footer_top');

// footer.php BOTTOM
function cleanblogchild_footer_bottom() {
}
add_action('cleanblog_footer_bottom','cleanblogchild_footer_bottom');

// index.php TOP
function cleanblogchild_index_top() {
}
add_action('cleanblog_index_top','cleanblogchild_index_top');

// index.php BOTTOM
function cleanblogchild_index_bottom() {
}
add_action('cleanblog_index_bottom','cleanblogchild_index_bottom');

// page.php TOP
function cleanblogchild_page_top() {
}
add_action('cleanblog_page_top','cleanblogchild_page_top');

// page.php BOTTOM
function cleanblogchild_page_bottom() {
}
add_action('cleanblog_page_bottom','cleanblogchild_page_bottom');

// search.php TOP
function cleanblogchild_search_top() {
}
add_action('cleanblog_search_top','cleanblogchild_search_top');

// search.php BOTTOM
function cleanblogchild_search_bottom() {
}
add_action('cleanblog_search_top','cleanblogchild_search_bottom');

// single.php TOP
function cleanblogchild_single_top() {
}
add_action('cleanblog_single_top','cleanblogchild_single_top');

// single.php BOTTOM
function cleanblogchild_single_bottom() {
}
add_action('cleanblog_single_bottom','cleanblogchild_single_bottom');



// Custom  sidebar
if ( function_exists('register_sidebar') )
    register_sidebar( array(
   'name' => __( 'My Custom Sidebar'),
   'id' => 'my-custom-sidebar',
   'description' => __( 'An optional widget area for your site footer' ),
   'before_widget' => '
',
   'after_widget' => "
",
   'before_title' => '
',
   'after_title' => '
',
));

// Post thumbnail
set_post_thumbnail_size( 800, 500, true ); // 50 pixels wide by 50 pixels tall, crop mode

// Reading time estimation
function post_read_time() {
 
   // get the post content
   $content = get_post_field( 'post_content' );
    
   // count the words
   $word_count = str_word_count( strip_tags( $content ) );
    
   // reading time itself
   $readingtime = ceil($word_count / 200);
    
   if ($readingtime == 1) {
    $timer = " minute read";
   } else {
    $timer = " minutes read"; // or your version :) I use the same wordings for 1 minute of reading or more
   }
    
   // I'm going to print 'X minute read' above my post
   $totalreadingtime = $readingtime . $timer;
   echo $totalreadingtime;
   return $totalreadingtime;    
   }	
/* **************************************
      Pagination
************************************************  */

$args = array(
   'base'               => '%_%',
   'format'             => '?paged=%#%',
   'total'              => 1,
   'current'            => 0,
   'show_all'           => false,
   'end_size'           => 1,
   'mid_size'           => 2,
   'prev_next'          => true,
   'prev_text'          => __('« Previous'),
   'next_text'          => __('Next »'),
   'type'               => 'plain',
   'add_args'           => false,
   'add_fragment'       => '',
   'before_page_number' => '',
   'after_page_number'  => ''
);
// Number Pagination Function 

function njengah_number_pagination() {

   global $wp_query;
   $big = 9999999; // need an unlikely integer
     echo paginate_links( array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '?paged=%#%',
      'current' => max( 1, get_query_var('paged') ),
      'total' => $wp_query->max_num_pages) );
   }

//  Add defer attribute to script in the header
function defer_parsing_of_js($url)
{
   if (is_admin()) return $url; //don't break WP Admin
   if (false  === strpos($url, '.js')) return $url;
   if(strpos($url, 'jquery.js')) return $url;
   return str_replace(' src', 'defer src', $url);
}
add_filter('script_loader_tag', 'defer_parsing_of_js', 10);