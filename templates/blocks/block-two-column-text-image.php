<?php
$imagePosition = get_field('image_position');
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

<section class="text-image-split">
  <div class="container large-container">
    <div class="text-image-split-wrapper <?php echo $imagePosition; ?>">
      <div class="image">
        <img class="lazyload" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
      </div>
      <div class="content">
        <h3 class="overline"><?php echo $overline; ?></h3>
        <h2 class="heading"><?php echo $heading; ?></h2>
        <h2 class="subheading"><?php echo $subHeading ?></h2>
        <?php echo $content; ?>
        <?php if($buttons == 'yes') { ?>
        <div class="buttons-wrapper">
          <a href="<?php echo $btn1url ?>" class="outline-button"><?php echo $btn1text ?></a>
          <a href="<?php echo $btn2url ?>" class="secondary-button"><?php echo $btn2text ?></a>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
