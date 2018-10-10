<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
  echo 'fail';
    die;
}

// $books= get_posts( array( 'post_type'=>'book' ) );
// foreach($books as $book){
//   wp_delete_post($book->id);
// }

global $wpdb;
$wpdb->query('DELETE from wp_posts where post_type="book"');
$wpdb->query('DELETE from wp_postmeta where post_id NOT IN(select id from wp_posts)');
$wpdb->query('DELETE from wp_term_relationships where post_id NOT IN(select id from wp_posts)');
