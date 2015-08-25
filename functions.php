<?php //* Don not include this Opening PHP tag

//* Add this code in your functions.php file

add_action('eaplw_before_entry', 'eaplw_slides_wrap', 10, 2);
function eaplw_slides_wrap( $instance, $widget_id ) {
  global $listings;
  
  if( $listings->current_post % 2 == 0 )
    echo '<div class="slides">' . "\n";
}

add_action('eaplw_after_entry', 'eaplw_slides_wrap_close', 10, 2);
function eaplw_slides_wrap_close( $instance, $widget_id ) {
  global $listings;
  
  if( $listings->current_post % 2 == 1 )
    echo '</div>' . "\n";
}
