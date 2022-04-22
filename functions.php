<?php

$uphotel_includes = array(
  '/enqueue.php',
  '/setup.php',
  '/blocks.php',
  '/acf-options.php',
  '/class-wp-bootstrap-navwalker.php',
);

foreach ($uphotel_includes as $file) {
  $filepath = locate_template( 'inc' . $file );
  if ( ! $filepath ) {
    trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
  }
  require_once $filepath;
}

?>
