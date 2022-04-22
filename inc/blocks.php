<?php

add_filter('block_categories', 'sams_block_categories', 10, 2);
add_action('acf/init', 'my_acf_init');

function my_acf_init() {
  if(function_exists('acf_register_block')) {

    // Duplicate this code and use it to add/register a new ACF block

    acf_register_block([
      'name'            => 'hero',
      'title'           => 'Hero',
      'description'     => __('Select a hero image and opening text block'),
      'render_callback' => 'sams_block_render_callback',
      'category'        => 'sams-blocks',
      'icon'            => 'admin-comments',
      'keywords'        => ['hero', 'block', 'sams'],
    ]);

    acf_register_block([
      'name'            => 'two_column_text_image',
      'title'           => 'Two Column Text & Image',
      'description'     => __('A brief description'),
      'render_callback' => 'sams_block_render_callback',
      'category'        => 'sams-blocks',
      'icon'            => 'admin-comments',
      'keywords'        => ['text', 'image', 'sams'],
    ]);

    acf_register_block([
      'name'            => 'key_points',
      'title'           => 'Key Points',
      'description'     => __('A brief description'),
      'render_callback' => 'sams_block_render_callback',
      'category'        => 'sams-blocks',
      'icon'            => 'admin-comments',
      'keywords'        => ['text', 'image', 'sams'],
    ]);

    acf_register_block([
      'name'            => 'featured_cta',
      'title'           => 'Featured Call To Acton',
      'description'     => __('A brief description'),
      'render_callback' => 'sams_block_render_callback',
      'category'        => 'sams-blocks',
      'icon'            => 'admin-comments',
      'keywords'        => ['text', 'image', 'sams'],
    ]);



  }
}

function sams_block_categories($categories, $post) {
  return array_merge(
    $categories,
    array(
      array(
        'slug'  => 'sams-blocks',
        'title' => __('Sams', 'sams'),
        'icon'  => 'wordpress',
      ),
    )
  );
}

function sams_block_render_callback($block) {

  $slug = str_replace('acf/', '', $block['name']);

  if( file_exists( get_theme_file_path("/templates/blocks/block-{$slug}.php") ) )
    include( get_theme_file_path("/templates/blocks/block-{$slug}.php") );
}
