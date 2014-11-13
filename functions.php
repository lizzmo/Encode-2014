<?php
// IMAGE SIZES
if (function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( $width = 720, $height = 500, $crop = true );
}
if (function_exists( 'add_image_size' ) ) {
add_image_size( 'fullsize', 1440, 900, true);
}
?>