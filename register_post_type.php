<?php
//custom post type
//do a search replace for portfolios, Portfolios and Portfolio

register_post_type('portfolios', array(	'label' => 'Portfolios','description' => 'A list of previous works created.','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'portfolios'),'query_var' => true,'supports' => array('title','editor','excerpt','custom-fields','comments','revisions','thumbnail','author','page-attributes',),'labels' => array (
  'name' => 'Portfolios',
  'singular_name' => 'Portfolio',
  'menu_name' => 'Portfolios',
  'add_new' => 'Add Portfolio',
  'add_new_item' => 'Add New Portfolio',
  'edit' => 'Edit',
  'edit_item' => 'Edit Portfolio',
  'new_item' => 'New Portfolio',
  'view' => 'View Portfolio',
  'view_item' => 'View Portfolio',
  'search_items' => 'Search Portfolios',
  'not_found' => 'No Portfolios Found',
  'not_found_in_trash' => 'No Portfolios Found in Trash',
  'parent' => 'Parent Portfolio',
),) );