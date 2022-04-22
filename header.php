<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
    <?php wp_head(); ?>
  </head>
  <body>

    <header class="header" id="header">
      <div class="container large-container">
        <div class="header-wrapper">
          <a class="brand" href="/"><?php echo file_get_contents(get_stylesheet_directory_uri(). '/assets/svg/tree-logo.svg'); ?></a>
          <nav>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
          </nav>
          <div class="hamburger-icon">
            <div class="bars">
              <div class="bar1"></div>
              <div class="bar2"></div>
              <div class="bar3"></div>
            </div>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'mobile-menu' ) ); ?>
          </div>
        </div>
      </div>
    </header>
