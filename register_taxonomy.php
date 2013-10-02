<?php
//custom taxonomies
register_taxonomy('categories',array (
  0 => 'portfolios',
),array( 'hierarchical' => true, 'label' => 'Categories','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => 'portfolio-category'),'singular_label' => 'Category') );