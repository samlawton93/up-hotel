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
        <?php if(have_rows('social_links', 'options')) {
          while(have_rows('social_links', 'options')) {
            the_row();
            $logo = get_sub_field('logo');
            $url = get_sub_field('url');
            ?>
            <div class="social-box">
              <a href="<?php echo $url; ?>"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"></a>
            </div>

          <?php }
        } ?>


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
