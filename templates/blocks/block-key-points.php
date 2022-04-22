<section class="key-points">
  <div class="container large-container">
    <div class="key-points-wrapper">
      <?php if(have_rows('key_points')) {
        while (have_rows('key_points')) {
          the_row();
          $img = get_sub_field('image');
          $title = get_sub_field('title');
          $content = get_sub_field('content'); ?>

          <div class="key-points-block">
            <div class="key-points-block--image">
              <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
            </div>
            <div class="key-points-block--content">
              <h3><?php echo $title; ?></h3>
              <p><?php echo $content; ?></p>
            </div>
          </div>

      <?php  }
      } ?>
    </div>
  </div>
</section>
