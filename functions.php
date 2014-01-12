<?php
remove_action( ‘wp_head’, ‘feed_links_extra’, 3 ); // Removes the links to the extra feeds such as category feeds
remove_action( ‘wp_head’, ‘feed_links’, 2 ); // Removes links to the general feeds: Post and Comment Feed
remove_action( ‘wp_head’, ‘rsd_link’); // Removes the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( ‘wp_head’, ‘wlwmanifest_link’); // Removes the link to the Windows Live Writer manifest file.
remove_action( ‘wp_head’, ‘index_rel_link’); // Removes the index link
remove_action( ‘wp_head’, ‘parent_post_rel_link_wp_head’, 10, 0); // Removes the prev link
remove_action( ‘wp_head’, ‘adjacent_posts_rel_link_wp_head’, 10, 0); // Removes the relational links for the posts adjacent to the current post.
remove_action( ‘wp_head’, ‘wp_generator’); // Removes the WordPress version i.e. – WordPress 2.8.4
remove_action( ‘wp_head’, ‘wp_shortlink_wp_head’, 10, 0 ); // Removes the shortlink link
remove_action( ‘wp_head’, ‘start_post_rel_link’);
?>
<?php
// IMAGE SIZES
if (function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( $width = 600, $height = 480, $crop = true );
}
if (function_exists( 'add_image_size' ) ) {
add_image_size( 'fullsize', 1440, 900, true);
}
?>