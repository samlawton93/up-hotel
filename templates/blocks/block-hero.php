<?php
  $img = get_field('hero_image');
  $title = get_field('title');
  $sub = get_field('subtitle');
  $text = get_field('text');
?>

<section class="hero" style="background-image: linear-gradient(90deg, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0.5) 100%),  url('<?php echo $img; ?>');" <?php if(!empty(get_field('section_identifier'))) { ?> id="<?php echo get_field('section_identifier'); ?>" <?php } ?>>
  <div class="container large-container">
    <div class="hero-wrapper">
      <div class="hero-container">
        <h2 class="hero-subtitle"><?php echo $sub; ?></h2>
        <h1 class="hero-title"><?php echo $title; ?></h1>
        <p class="hero-text"><?php echo $text; ?></p>
        <a href="<?php the_field('button_link'); ?>" class="secondary-button"><?php the_field('button_text'); ?></a>
      </div>
    </div>
  </div>
</section>
