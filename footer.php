<footer class="footer">
  <div class="container large-container">
    <div class="footer-wrapper">
      <div class="logo">
        <a class="brand" href="/"><?php echo file_get_contents(get_stylesheet_directory_uri(). '/assets/svg/tree-logo-white.svg'); ?></a>
      </div>
      <div class="nav">
        <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer-menu' ) ); ?>
      </div>
      <div class="contact">
        <p><?php echo get_field('address', 'options'); ?></p>
        <p><span>T: <?php echo get_field('telephone', 'options'); ?></span><span>E: <?php echo get_field('email', 'options'); ?></span></p>
      </div>
      <div class="socials">
        <div class="social-box">
          <a href="https://facebook.com/" target="_blank"><?php echo file_get_contents(get_stylesheet_directory_uri(). '/assets/svg/facebook.svg'); ?></a>
        </div>
        <div class="social-box">
          <a href="https://twitter.com/" target="_blank"><?php echo file_get_contents(get_stylesheet_directory_uri(). '/assets/svg/twitter.svg'); ?></a>
        </div>
        <div class="social-box">
          <a href="https://linkedin.com/" target="_blank"><?php echo file_get_contents(get_stylesheet_directory_uri(). '/assets/svg/linkedin.svg'); ?></a>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="copyright-footer">
  <div class="container large-container">
    <div class="copyright-footer-wrapper">
      <div class="left">
        <p>&copy;<?php echo date('Y'); ?> The Tree Alliance Ltd.</p>
        <a href="#">Terms & Conditions</a>
        <a href="#">Privacy Policy</a>
      </div>
      <div class="right">
        <p>Website by</p><a href="#">UP Hotel Agency</a>
      </div>
    </div>
  </div>
</div>

<?php wp_footer(); ?>
</body>

</html>
