<?php
  $image = get_field('image');
  $overline = get_field('overline');
  $heading = get_field('heading');
  $subHeading = get_field('subheading');
  $content = get_field('content');
  $buttons = get_field('add_buttons');
  $btn1text = get_field('button_1_text');
  $btn1url = get_field('button_1_url');
  $btn2text = get_field('button_2_text');
  $btn2url = get_field('button_2_url');
?>
<section class="featured-cta">
  <div class="container large-container">
    <div class="featured-cta-wrapper">
      <div class="cta" style="background-image: linear-gradient(90deg, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0.5) 100%),  url('<?php echo $image['url']; ?>');">
        <div class="content-wrapper">
          <h3 class="overline"><?php echo $overline; ?></h3>
          <h2 class="heading"><?php echo $heading; ?></h2>
          <h2 class="subheading"><?php echo $subHeading ?></h2>
          <p><?php echo $content; ?></p>
          <?php if($buttons == 'yes') { ?>
          <div class="buttons-wrapper">
            <a href="<?php echo $btn1url ?>" class="outline-button"><?php echo $btn1text ?></a>
            <a href="<?php echo $btn2url ?>" class="secondary-button"><?php echo $btn2text ?></a>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
